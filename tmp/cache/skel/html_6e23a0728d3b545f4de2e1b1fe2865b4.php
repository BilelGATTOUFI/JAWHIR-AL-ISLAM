<?php

/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-rub-articles.html
 * Date :      Mon, 10 Nov 2014 19:36:09 GMT
 * Compile :   Sun, 12 Jun 2016 08:42:17 GMT
 * Boucles :   _articles_rubrique_nom, _articles_rubrique
 */ 

/* BOUCLE rubriques  */

 function BOUCLE_articles_rubrique_nomhtml_6e23a0728d3b545f4de2e1b1fe2865b4(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_articles_rubrique_nom';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.descriptif",
		"rubriques.titre",
		"rubriques.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-rub-articles.html','html_6e23a0728d3b545f4de2e1b1fe2865b4','_articles_rubrique_nom',12,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
				<b class="petit-info"><a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>(' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
')</a></b>
			');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_articles_rubriquehtml_6e23a0728d3b545f4de2e1b1fe2865b4(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_articles_rubrique';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_rubrique",
		"0+articles.titre AS num",
		"articles.date",
		"articles.id_article",
		"articles.surtitre",
		"articles.descriptif",
		"articles.titre",
		"articles.soustitre",
		"articles.chapo",
		"articles.texte",
		"articles.lang");
	static $orderby = array('num', 'articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), sql_in('articles.id_rubrique', calcul_branche_in($Pile[0]['id_rubrique'])));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-rub-articles.html','html_6e23a0728d3b545f4de2e1b1fe2865b4','_articles_rubrique',1,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_articles_rubrique']['compteur_boucle'] = 0;
	$Numrows['_articles_rubrique']['total'] = @intval(sql_count($result));
	$debut_boucle = isset($Pile[0]['debut_articles_rubrique']) ? $Pile[0]['debut_articles_rubrique'] : _request('debut_articles_rubrique');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_articles_rubrique'] = quete_debut_pagination('id_article',$Pile[0]['@id_article'] = substr($debut_boucle,1),10,$result,'');
		if (!sql_seek($result,0,'')){
			@sql_free($result,'');
			$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
		}
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_articles_rubrique']['total']-1)/(10))*(10)));
	$fin_boucle = min(($tout ? $Numrows['_articles_rubrique']['total'] : $debut_boucle + 9), $Numrows['_articles_rubrique']['total'] - 1);
	$Numrows['_articles_rubrique']['grand_total'] = $Numrows['_articles_rubrique']['total'];
	$Numrows['_articles_rubrique']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_articles_rubrique']['grand_total'] AND sql_seek($result,$debut_boucle,'','continue'))
		$Numrows['_articles_rubrique']['compteur_boucle'] = $debut_boucle;
	
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_articles_rubrique']['compteur_boucle']++;
		if ($Numrows['_articles_rubrique']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_articles_rubrique']['compteur_boucle']-1 > $fin_boucle) break;
		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
			<br class="nettoyeur" />
			' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',(strlen($logo=
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')))?'<a href="' .vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) . '">' . $logo . '</a>':''),'120','0'))))!=='' ?
		('<div class="logo-liste-art">
				' . $t1 . '
			</div>') :
		'') .
'
			' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['surtitre'], "TYPO", $connect))))!=='' ?
		('<div class="surtitre">' . $t1 . '</div>') :
		'') .
'
			<h3>
			<a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</a>
			' .
BOUCLE_articles_rubrique_nomhtml_6e23a0728d3b545f4de2e1b1fe2865b4($Cache, $Pile, $doublons, $Numrows, $SP) .
'
			</h3>
      	' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['soustitre'], "TYPO", $connect))))!=='' ?
		('<div class="sous-titre">' . $t1 . '</div>') :
		'') .
'
		<div class="detail">
			' .
(($t1 = strval(interdire_scripts(nom_jour(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('<span class="date">' . $t1) :
		'') .
' ' .
(($t1 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		($t1 . '</span>') :
		'') .
' 
			' .
(($t1 = strval(recuperer_fond('modeles/lesauteurs', array('id_article' => $Pile[$SP]['id_article']), array('trim'=>true, 'compil'=>array('plugins/auto/ahuntsic/inc/inc-rub-articles.html','html_6e23a0728d3b545f4de2e1b1fe2865b4','_articles_rubrique',17,$GLOBALS['spip_lang'])), '')))!=='' ?
		((	'<span class="auteurs">' .
	_T('public/spip/ecrire:par_auteur') .
	' ') . $t1 . '</span>') :
		'') .
'				
		</div><!-- detail -->
      <div class="texte">
	' .
(($t1 = strval(interdire_scripts((filtrer('image_graver', filtrer('image_reduire',propre($Pile[$SP]['descriptif'], $connect),'552','0')) ? (	(($t2 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre($Pile[$SP]['descriptif'], $connect),'552','0')))))!=='' ?
			((	'<div class="">') . $t2 . (	'</div>
		<div class="suite"><a href="' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
		'" title="...' .
		_T('public/spip/ecrire:suite') .
		' : ' .
		interdire_scripts(attribut_html(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))) .
		'" >' .
		_T('public/spip/ecrire:suite') .
		'</a></div>')) :
			'') .
	'
		'):(	interdire_scripts((propre(nettoyer_chapo($Pile[$SP]['chapo']), $connect) ? (	(($t3 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre(nettoyer_chapo($Pile[$SP]['chapo']), $connect),'552','0')))))!=='' ?
				((	'<div class="">') . $t3 . (	'</div>
      	<div class="suite"><a href="' .
			vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
			'" title="...' .
			_T('public/spip/ecrire:suite') .
			' : ' .
			interdire_scripts(attribut_html(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))) .
			'" >' .
			_T('public/spip/ecrire:suite') .
			'</a></div>')) :
				'') .
		'
      		'):(	(($t3 = strval(interdire_scripts(couper(cs_nettoie(sommaire_d_article(propre($Pile[$SP]['texte'],$connect))),'300'))))!=='' ?
				((	'<div class="">') . $t3 . (	'</div>
      	<div class="suite"><a href="' .
			vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
			'" title="...' .
			_T('public/spip/ecrire:suite') .
			' : ' .
			interdire_scripts(attribut_html(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))) .
			'" >' .
			_T('public/spip/ecrire:suite') .
			'</a></div>')) :
				'') .
		'
		'))) .
	'
	')))))!=='' ?
		('<div class="extrait">' . $t1 . '</div><!-- fin extrait -->') :
		'') .
'
      </div><!-- fin texte -->
      <br class="nettoyeur" />
		');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-rub-articles.html
// Temps de compilation total: 4.359 ms
//

function html_6e23a0728d3b545f4de2e1b1fe2865b4($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'		' .
(($t1 = BOUCLE_articles_rubriquehtml_6e23a0728d3b545f4de2e1b1fe2865b4($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<h2 class="structure">' .
		_T('public/spip/ecrire:articles_rubrique') .
		'</h2>
		 ' .
		filtre_pagination_dist($Numrows["_articles_rubrique"]["grand_total"],
 		'_articles_rubrique',
		isset($Pile[0]['debut_articles_rubrique'])?$Pile[0]['debut_articles_rubrique']:intval(_request('debut_articles_rubrique')),
		10, false, '', '', array()) .
		'
		') . $t1 . (	'
		
		' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_articles_rubrique"]["grand_total"],
 		'_articles_rubrique',
		isset($Pile[0]['debut_articles_rubrique'])?$Pile[0]['debut_articles_rubrique']:intval(_request('debut_articles_rubrique')),
		10, true, '', '', array())))!=='' ?
				((	'<div class="pagination">
			<div class="ligne1">
				<div dir="' .
			lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
			'">' .
			$Numrows['_articles_rubrique']['total'] .
			'/' .
			(isset($Numrows['_articles_rubrique']['grand_total'])
			? $Numrows['_articles_rubrique']['grand_total'] : $Numrows['_articles_rubrique']['total']) .
			' ' .
			_T('public/spip/ecrire:articles') .
			'</div>
			</div>
			<div class="ligne2">
        ') . $t3 . '
			</div>
		</div>') :
				'') .
		'

		')) :
		''));

	return analyse_resultat_skel('html_6e23a0728d3b545f4de2e1b1fe2865b4', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-rub-articles.html');
}
?>