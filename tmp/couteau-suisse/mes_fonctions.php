<?php
// Code d'inclusion pour le plugin 'Couteau Suisse'
++$GLOBALS['cs_fonctions'];
// Ce fichier contient des fonctions toujours compilees dans tmp/couteau-suisse/mes_fonctions.php
if (!defined("_ECRIRE_INC_VERSION")) return;

// compatibilite SPIP < 2.00
if(!defined('_SPIP19300')) {
	// #VAL{x} renvoie 'x' (permet d'appliquer un filtre a une chaine)
	// Attention #VAL{1,2} renvoie '1', indiquer #VAL{'1,2'}
	function balise_VAL($p){
		$p->code = interprete_argument_balise(1,$p);
		if (!strlen($p->code)) $p->code = "''";
		$p->interdire_scripts = false;
		return $p;
	}
	if(!function_exists('oui')) { function oui($code) { return $code?' ':''; } }
	if(!function_exists('non')) { function non($code) { return $code?'':' '; } }
}

// fonction appelant une liste de fonctions qui permettent de nettoyer un texte original de ses raccourcis indesirables
function cs_introduire($texte) {
	// liste de filtres qui sert a la balise #INTRODUCTION
	if(!is_array($GLOBALS['cs_introduire'])) return $texte;
	$liste = array_unique($GLOBALS['cs_introduire']);
	foreach($liste as $f)
		if (function_exists($f)) $texte = $f($texte);
	return $texte;
}

// Fonction propre() sans paragraphage
function cs_propre($texte) {
	include_spip('inc/texte');
	return trim(PtoBR(propre($texte)));
}

// Filtre creant un lien <a> sur un texte
// Exemple d'utilisation : [(#EMAIL*|cs_lien{#NOM})]
function cs_lien($lien, $texte='') {
	if(!$lien) return $texte;
	return cs_propre("[{$texte}->{$lien}]");
}

// filtre pour ajouter un <span> autour d'un texte
function cs_span($texte, $attr='') { return "<span $attr>$texte</span>"; }

// Controle (basique!) des 3 balises usuelles p|div|span eventuellement coupees
// Attention : simple traitement pour des balises non imbriquees
function cs_safebalises($texte) {
	$texte = trim($texte);
	// ouvre/supprime la premiere balise trouvee fermee (attention aux modeles SPIP)
	if(preg_match(',^(.*)</([a-z]+)>,Ums', $texte, $m) && !preg_match(",<$m[2][ >],", $m[1])) 
		$texte = strlen($m[1])?"<$m[2]>$texte":trim(substr($texte, strlen($m[2])+3));
	// referme/supprime la derniere balise laissee ouverte (attention aux modeles SPIP)
	if(preg_match(',^(.*)[ >]([a-z]+)<,Ums', $rev = strrev($texte), $m) && !preg_match(",>$m[2]/<,", $m[1])) 
		$texte = strrev(strlen($m[1])?">$m[2]/<$rev":trim(substr($rev, strlen($m[2])+2)));
	// balises <p|span|div> a traiter
	foreach(array('span', 'div', 'p') as $b) {
		// ouvrante manquante
		if(($fin = strpos($texte, "</$b>")) !== false)
			if(!preg_match(",<{$b}[ >],", substr($texte, 0, $fin)))
				$texte = "<$b>$texte";
		// fermante manquante
		$texte = strrev($texte);
		if(preg_match(',[ >]'.strrev("<{$b}").',', $texte, $reg)) {
			$fin = strpos(substr($texte, 0, $deb = strpos($texte, $reg[0])), strrev("</$b>"));
			if($fin===false || $fin>$deb) $texte = strrev("</$b>").$texte;
		}
		$texte = strrev($texte);
	}
	return $texte;
}

// fonction de suppression de notes. Utile pour #CS_SOMMAIRE ou #CS_DECOUPE
function cs_supprime_notes($texte) {
	return preg_replace(', *\[\[(.*?)\]\],msS', '', $texte);
}

// filtre appliquant les traitements SPIP d'un champ (et eventuellement d'un type d'objet) sur un texte
// (voir la fonction champs_traitements($p) dans : public/references.php)
// => permet d'utiliser les balises etoilees : #TEXTE*|mon_filtre|cs_traitements{TEXTE,articles}
// ce mecanisme est a preferer au traditionnel #TEXTE*|mon_filtre|propre
// cs_traitements() consulte simplement la globale $table_des_traitements et applique le traitement adequat
// $exclusions est une chaine ou un tableau de filtres a exclure du traitement
function cs_traitements($texte, $nom_champ='NULL', $type_objet='NULL', $exclusions=NULL) {
	global $table_des_traitements;
	if(!isset($table_des_traitements[$nom_champ])) return $texte;
	$ps = $table_des_traitements[$nom_champ];
	if(is_array($ps)) $ps = $ps[isset($ps[$type_objet]) ? $type_objet : 0];
	if(!$ps) return $texte;
	// retirer les filtres a exclure
	if($exclusions!==NULL) $ps = str_replace($exclusions, 'cs_noop', $ps);
	// remplacer le placeholder %s par le texte fourni
	eval('$texte=' . str_replace('%s', '$texte', $ps) . ';');
	return $texte;
}
function cs_noop($t='',$a=NULL,$b=NULL,$c=NULL) { return $t; }

// liste des docs sur spip-contrib (outils actifs)
function cs_liste_contribs($coupe = 999, $join = "</li><li>") {
	global $metas_outils;
	$contribs = array();
	foreach($metas_outils as $o=>$v) if(isset($v['contrib']) && isset($v['actif']) && $v['actif'])
		$contribs[] =  '[' . couper(couteauprive_T($o.':nom'), $coupe) . '->' . (is_numeric($v['contrib']) ?_URL_CONTRIB.$v['contrib']:$v['contrib']) . ']';
	sort($contribs);
	return '[{{' . couteauprive_T('docgen') . '}}->' . _URL_CONTRIB . '2166]' 
		. $join . '[{{' . couteauprive_T('docwiki') . '}}->' . _URL_CONTRIB . '2793]'
		. $join . join($join, $contribs);
}

// renvoie un champ d'un objet en base
function cs_champ_sql($id, $champ='texte', $objet='article') {
	// Utiliser la bonne requete en fonction de la version de SPIP
	if(function_exists('sql_getfetsel')) {
		// SPIP 2.0
		// TODO : fonctions SPIP pour trouver la table et l'id_objet
		if($r = sql_getfetsel($champ, 'spip_'.$objet.'s', 'id_'.$objet.'='.intval($id)))
			return $r;
	} else {
		if($r = spip_query('SELECT '.$champ.' FROM spip_'.$objet.'s WHERE id_'.$objet.'='.intval($id)))
			// s'il existe un champ, on le retourne
			if($row = spip_fetch_array($r)) return $row[$champ];
	}
	// sinon rien !
	return '';
}
// {portrait}
function critere_portrait($idb, &$boucles, $crit) {
	$boucle = &$boucles[$idb];
	$table = $boucle->id_table;
	$boucle->where[] = $crit->not
		?"'($table.largeur>0 AND $table.hauteur <= $table.largeur)'"
		:"'($table.largeur>0 AND $table.hauteur > $table.largeur)'";
}

// {paysage}
function critere_paysage($idb, &$boucles, $crit) {
	$boucle = &$boucles[$idb];
	$table = $boucle->id_table;
	$boucle->where[] = $crit->not
		?"'($table.largeur>0 AND $table.largeur <= $table.hauteur)'"
		:"'($table.largeur>0 AND $table.largeur > $table.hauteur)'";
}

// {carre}
function critere_carre($idb, &$boucles, $crit) {
	$boucle = &$boucles[$idb];
	$table = $boucle->id_table;
	$boucle->where[] = $crit->not
		?"'($table.largeur != $table.hauteur)'"
		:"'($table.largeur>0 AND $table.largeur = $table.hauteur)'";
}
@define('_sommaire_NB_TITRES_MINI', 2);
@define('_sommaire_SANS_FOND', '[!fond]');

// aide le Couteau Suisse a calculer la balise #INTRODUCTION
$GLOBALS['cs_introduire'][] = 'sommaire_nettoyer_raccourcis';

// renvoie le sommaire d'une page d'article
// $page=false reinitialise le compteur interne des ancres
function sommaire_d_une_page(&$texte, &$nbh3, $page=0, $num_pages=0) {
	static $index = 0;
	if($page===false) $index = 0;
	static $self = NULL; 
	if(!isset($self)) 
		$self = str_replace('&', '&amp;', nettoyer_uri());//self();//$GLOBALS['REQUEST_URI'];
	if($page===false) return;
	// trouver quel <hx> est utilise
	include_spip('outils/sommaire');
	$root = $niveau = $match = sommaire_niveau_intertitres();
	@define('_sommaire_NB_CARACTERES', 30);
	@define('_sommaire_PROFONDEUR', 1);
	if(_sommaire_PROFONDEUR>1)
		$match = $match .'-' . ($match+_sommaire_PROFONDEUR-1);
	// traitement des intertitres <hx>
	preg_match_all(",(<h([$match])[^>]*)>(.*)</h\\2>,Umsi", $texte, $regs);
	$nbh3 += count($regs[0]);
	$pos = 0; $sommaire = '';
	// calcul de la page
	$fct_lien_retour = function_exists('sommaire_lien_retour')?'sommaire_lien_retour':'sommaire_lien_retour_dist';
	$fct_id_ancre = defined('_sommaire_JOLIES_ANCRES')?'sommaire_id_ancre_ex'
		:(function_exists('sommaire_id_ancre')?'sommaire_id_ancre':'sommaire_id_ancre_dist');
	$nb = count($regs[0]);
	for($i=0;$i<$nb;$i++,$index++){
		$w = &$regs[0][$i]; $h = &$regs[1][$i]; $n = &$regs[2][$i];
		if (($pos2 = strpos($texte, $w, $pos))!==false) {
			$t = $regs[3][$i];
			// calcul de l'ancre, $t peut etre modifie
			$ancre = $fct_id_ancre($index, $t, $n);
			$id = " id=\"$ancre\">";
			//$titre = preg_replace(',^<p[^>]*>(.*)</p>$,Umsi', '\\1', trim($t));
			// ancre 'retour au sommaire', sauf :
			// si on imprime, ou si les blocs depliables utilisent h{$n}...
			$titre = (defined('_CS_PRINT') OR (strpos($w, 'blocs_titre')!==false))
				?$t//$titre
				:$fct_lien_retour($self, $t);//$titre);
			$texte = substr($texte, 0, $pos2) . $h . $id . $titre
				. substr($texte, $pos2 + strlen($h)+1 + strlen($regs[3][$i]));
			$pos = $pos2 + strlen($id) + strlen($w);
			$brut = sommaire_nettoyer_titre($t);
			// pas trop long quand meme...
			$lien = cs_propre(couper($brut, _sommaire_NB_CARACTERES));
			// eviter une ponctuation a la fin, surtout si la page est precisee
			$lien = preg_replace('/(&nbsp;|\s)*'.($page?'[!?,;.:]+$/':'[,;.:]+$/'), '', $lien);
			$titre = attribut_html(couper($brut, 100));
			// si la decoupe en page est active...
			$artpage = (function_exists('decoupe_url') && (strlen(_request('artpage')) || $page>1) )
				?decoupe_url($self, $page, $num_pages):$self;
			$artpage = "<a $st title=\"$titre\" href=\"{$artpage}#$ancre\">$lien</a>";
			$artpage = "\n<li>" . ( function_exists('sommaire_id_page')
				?sommaire_id_page($artpage, $page):sommaire_id_page_dist($artpage, $page) );
			if($niveau==$n) $sommaire .= ($sommaire?'</li>':'').$artpage;
			elseif($niveau<$n) $sommaire .= "\n<ul>".$artpage;
			else $sommaire .= '</li></ul></li>'.$artpage;
			$niveau = $n;
		}
	}
	return $sommaire?$sommaire.'</li>'.($niveau!=$root?'</ul>':''):'';
}

function sommaire_nettoyer_titre($t) {
	// pas de notes
	$brut = preg_replace(',\[<a href=["\']#nb.*?</a>\],','', echappe_retour($t,'CS'));
	// pas de glossaire
	if(function_exists('cs_retire_glossaire')) $brut = cs_retire_glossaire($brut);
	// texte brut
	$brut2 = trim(preg_replace(',[\n\r]+,',' ',textebrut($brut)));
	// cas des intertitres en image_typo
	if(!strlen($brut2)) $brut2 = trim(extraire_attribut($brut, 'alt'));
	return $brut2;
}

/*
 Fonction surchargeable qui reconstruit les titres de la page 
 en ajoutant une ancre de retour au sommaire.
 La fonction de surcharge a placer dans config/mes_options.php est : 
   sommaire_lien_retour($self, $titre)
 Exemple sans lien de retour : 
   function sommaire_lien_retour($self, $titre) { return $titre; }
*/
function sommaire_lien_retour_dist($self, $titre) {
	static $haut = NULL;
	if(!isset($haut)) 
		$haut = '<a title="'._T('couteau:sommaire_titre').'" href="'.$self.'#outil_sommaire" class="sommaire_ancre">&nbsp;</a>';
	return $haut . $titre;
}

/*
 Fonction surchargeable qui ajoute au sommaire l'information d'une page en cas de decoupe
 Exemple : "<a ...>Mon titre</a>, page 4"
 La fonction de surcharge a placer dans config/mes_options.php est : 
   sommaire_id_page($element, $page)
 $element est le lien cliquable du sommaire
*/
function sommaire_id_page_dist($element, $page) {
	return $page ? $element . _T('couteau:sommaire_page', array('page'=>$page)) : $element;
}

/*
 Fonction surchargeable qui calcule l'ancre d'un intertitre 
 La fonction de surcharge a placer dans config/mes_options.php est : 
   sommaire_id_ancre($index, &$titre, $hn)
 $titre peut etre modifie par cette fonction : utile pour traiter le format {{{Mon titre<mon_ancre>}}}
*/
function sommaire_id_ancre_dist($index, &$titre, $hn) {
	return 'outil_sommaire_'.$index;
}

// Surcharge compatible avec les intertitres en image : jolies ancres
function sommaire_id_ancre_ex($index, &$titre, $hn) {
	// traiter le format {{{Mon titre<mon_ancre>}}} (ou alt='Mon titre&lt;mon_ancre&gt;')
	if(preg_match(',<(\w+)>$,', $titre, $r) || preg_match(',&lt;(\w+)&gt;(?=\'),', $titre, $r)) {
		$titre = str_replace($r[0], '', $titre);
		return $r[1];
	}
	// calculer les ancres d'apres le titre
	$a = strtolower(translitteration(sommaire_nettoyer_titre($titre)));
	$a = trim(preg_replace(',[^a-z0-9_]+,', '_', $a), '_');
	return strlen($a)>2?$a:"sommaire_$index";
}

// fonction appellee sur les parties du textes non comprises entre les balises : html|code|cadre|frame|script|acronym|cite
function sommaire_d_article_rempl($texte0, $sommaire_seul=false) {
	// pour sommaire_nettoyer_raccourcis()
	include_spip('outils/sommaire');
	// si le sommaire est malvenu ou s'il n'y a pas de balise <hx>, alors on laisse tomber
	$inserer_sommaire =  defined('_sommaire_AUTOMATIQUE')
		?strpos($texte0, _CS_SANS_SOMMAIRE)===false
		:strpos($texte0, _CS_AVEC_SOMMAIRE)!==false;
	if (!$inserer_sommaire || strpos($texte0, '<h')===false) 
		return $sommaire_seul?'':sommaire_nettoyer_raccourcis($texte0);
	// on retire les raccourcis du texte
	$texte = sommaire_nettoyer_raccourcis($texte0);
	// on masque les onglets s'il y en a
	if(defined('_onglets_FIN'))
		$texte = preg_replace_callback(',<div class="onglets_bloc_initial.*'._onglets_FIN.',Ums',
			create_function('$matches','return cs_code_echappement($matches[0], \'SOMM\');'), $texte);
	// et la, on y va...
	$sommaire = ''; $i = 1; $nbh3 = 0;
	// reinitialisation de l'index interne de la fonction
	sommaire_d_une_page($texte, $nbh3, false);
	// couplage avec l'outil 'decoupe_article'
	if(defined('_decoupe_SEPARATEUR') && !defined('_CS_PRINT')) {
		$pages = explode(_decoupe_SEPARATEUR, $texte);
		if (($num_page=count($pages)) == 1) $sommaire = sommaire_d_une_page($texte, $nbh3);
		else {
			foreach($pages as $p=>$page) { $sommaire .= sommaire_d_une_page($page, $nbh3, $i++, $num_page); $pages[$p] = $page; }
			$texte = join(_decoupe_SEPARATEUR, $pages);
		}
	} else $sommaire = sommaire_d_une_page($texte, $nbh3);
	if(!strlen($sommaire) || $nbh3<_sommaire_NB_TITRES_MINI)
		return $sommaire_seul?'':sommaire_nettoyer_raccourcis($texte0);

	// calcul du sommaire
	include_spip('public/assembler');
	$sommaire = recuperer_fond('fonds/sommaire', array(
		'sommaire'=>$sommaire,
		'fond_css'=>strpos($texte0, _sommaire_SANS_FOND)===false ?'avec':'sans',
	));

	// si on ne veut que le sommaire, on renvoie le sommaire
	// sinon, on n'insere ce sommaire en tete de texte que si la balise #CS_SOMMAIRE n'est pas activee
	if($sommaire_seul) return $sommaire;
	if(defined('_onglets_FIN')) $texte = echappe_retour($texte, 'SOMM');
	if(defined('_sommaire_BALISE')) return $texte;
	return _sommaire_REM.$sommaire._sommaire_REM.$texte;
}

// fonction appelee par le traitement de #TEXTE/articles
function sommaire_d_article($texte) {
	// s'il n'y a aucun intertitre, on ne fait rien
	// si la balise est utilisee, il faut quand meme inserer les ancres de retour
	if((strpos($texte, '<h')===false)) return $texte;
	return cs_echappe_balises('html|code|cadre|frame|script|acronym|cite|onglets|table', 'sommaire_d_article_rempl', $texte, false);
}

// fonction appelee par le traitement post_propre de #CS_SOMMAIRE
function sommaire_d_article_balise($texte) {
	// si la balise n'est pas utilisee ou s'il n'y a aucun intertitre, on ne fait rien
	if(!defined('_sommaire_BALISE') || (strpos($texte, '<h')===false)) return '';
	return cs_echappe_balises('html|code|cadre|frame|script|acronym|cite|onglets|table', 'sommaire_d_article_rempl', $texte, true);
}

// si on veut la balise #CS_SOMMAIRE
if (defined('_sommaire_BALISE')) {
	// fonction traitant la balise
	function balise_CS_SOMMAIRE_dist($p) {
		// id de l'article a trouver pour retourner son texte
		$texte = ($v = interprete_argument_balise(1,$p))!==NULL ? 'cs_champ_sql('.$v.')' : champ_sql('texte', $p);
		if ($p->type_requete == 'articles' || $v!==NULL) {
			$p->code = 'cs_supprime_notes('.$texte.')';
		} else {
			$p->code = "''";
		}
		$p->interdire_scripts = true;
		return $p;
	}
}
// aide le Couteau Suisse a calculer la balise #INTRODUCTION
include_spip('outils/couleurs');
$GLOBALS['cs_introduire'][] = 'couleurs_nettoyer_raccourcis';

function mailcrypt_init() {
	static $ok = NULL;
	if(is_null($ok)) {
		$ok = true;
		// pour _cs_liens_AUTORISE
		include_spip('outils/inc_cs_liens');
		// tip visible onMouseOver (title)
		// jQuery replacera ensuite le '@' comme ceci : title.replace(/\.\..t\.\./,'[\x40]')
		@define('_mailcrypt_AROBASE_JS', '..&aring;t..');
		@define('_mailcrypt_AROBASE_JSQ', preg_quote(_mailcrypt_AROBASE_JS,','));
		// span ayant l'arobase en background
		@define('_mailcrypt_AROBASE', '<span class=\'spancrypt\'>&nbsp;</span>');
//		@define('_mailcrypt_REGEXPR1', ',\b['._cs_liens_AUTORISE.']*@[a-zA-Z][a-zA-Z0-9-.]*\.[a-zA-Z]+(\?['._cs_liens_AUTORISE.']*)?,');
		@define('_mailcrypt_REGEXPR2', ',\b(['._cs_liens_AUTORISE.']+)@([a-zA-Z][a-zA-Z0-9-.]*\.[a-zA-Z]+(\?['._cs_liens_AUTORISE.']*)?),');
	}
}

// filtre surchargeable pour la balise #EMAIL protegee en public mais pas en prive
function mailcrypt_email_dist($texte) {
	if(strpos($texte, '@')===false) return $texte;
	if(function_exists('mailcrypt_email')) return mailcrypt_email($texte);
	return test_espace_prive()?$texte:mailcrypt($texte);
}

function mailcrypt($texte) {
	if(strpos($texte, '@')===false) return $texte;
	mailcrypt_init();

	// echappement des 'input' au cas ou le serveur y injecte des mails persos
	if (strpos($texte, '<in')!==false) 
		$texte = preg_replace_callback(',<input [^<]+/>,Umsi', 'cs_liens_echappe_callback', $texte);
	// echappement des 'protoc://login:mdp@site.ici' afin ne pas les confondre avec un mail
	if(strpos($texte, '://')!==false) 
		$texte = preg_replace_callback(',[a-z0-9]+://['._cs_liens_AUTORISE.']+:['._cs_liens_AUTORISE.']+@,Umsi', 'cs_liens_echappe_callback', $texte);
	// echappement des domaines .htm/.html : ce ne sont pas des mails
	if(strpos($texte, '.htm')!==false)
		$texte = preg_replace_callback(',href=(["\'])[^>]*@[^>]*\.html?\\1,', 'cs_liens_echappe_callback', $texte);

	// protection des liens HTML
	$texte = preg_replace(",[\"\']mailto:([^@\"']+)@([^\"']+)[\"\'],", 
		'"#" title="$1' . _mailcrypt_AROBASE_JS . '$2" onclick="location.href=lancerlien(\'$1\',\'$2\'); return false;"', $texte);
	// retrait des titles en doublon... un peu sale, mais en attendant mieux ?
	$texte = preg_replace(',title="[^"]+'._mailcrypt_AROBASE_JSQ.'[^"]+"([^>]+title=[\"\']),', '$1', $texte);

	if(strpos($texte, '@')===false) return echappe_retour($texte, 'LIENS');
	// protection de tout le reste...
	$texte = preg_replace(_mailcrypt_REGEXPR2, '$1'._mailcrypt_AROBASE.'$2', $texte);
	return echappe_retour($texte, 'LIENS');
}

function maildecrypt($texte) {
	if(strpos($texte, 'spancrypt')===false && strpos($texte, 'lancerlien')===false) return $texte;
	mailcrypt_init();

	// traiter les <span class='spancrypt'>chez</span>
	$texte = preg_replace(',<span class=[\'"]spancrypt[\'"]>(.*)</span>,U','@',$texte);
	// traiter les liens
	$texte = preg_replace(
		',href="#" (title=["\'].*?["\']) onclick="location.href=lancerlien\(\'(\S*?)\'\,\'(\S*?)\'\); return false;",',
		'$1 href="mailto:$2@$3"', $texte);
	// traiter les title
	return str_replace(_mailcrypt_AROBASE_JS, '@', $texte);
}
?>