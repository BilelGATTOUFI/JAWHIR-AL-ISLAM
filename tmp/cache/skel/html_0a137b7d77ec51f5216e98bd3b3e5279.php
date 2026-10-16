<?php

/*
 * Squelette : plugins/auto/ahuntsic/breve.html
 * Date :      Mon, 10 Nov 2014 19:34:38 GMT
 * Compile :   Wed, 30 Mar 2016 12:24:21 GMT
 * Boucles :   _Forums_Boucle, _forums_fils, _forums, _breves_rubrique, _breve_principal
 */ 

/* BOUCLE boucle  */

 function BOUCLE_Forums_Bouclehtml_0a137b7d77ec51f5216e98bd3b3e5279(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$save_numrows = ($Numrows['_forums_fils']);
	$t0 = (($t1 = BOUCLE_forums_filshtml_0a137b7d77ec51f5216e98bd3b3e5279($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
						<ul>
							' . $t1 . '
						</ul>
						') :
		'');
	$Numrows['_forums_fils'] = ($save_numrows);
	return $t0;
}



/* BOUCLE forums  */

 function BOUCLE_forums_filshtml_0a137b7d77ec51f5216e98bd3b3e5279(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forum';
	static $id = '_forums_fils';
	static $from = array('forum' => 'spip_forum');
	static $type = array();
	static $groupby = array();
	static $select = array("forum.id_forum",
		"forum.date_heure",
		"forum.titre",
		"forum.date_heure AS date",
		"forum.auteur AS nom",
		"forum.email_auteur AS email",
		"forum.texte",
		"forum.url_site",
		"forum.nom_site",
		"forum.id_article",
		"forum.id_breve",
		"forum.id_rubrique",
		"forum.id_syndic");
	static $orderby = array('forum.date_heure');
	$where = 
			array(
			array('=', 'forum.statut', '\'publie\''), 
			array('=', 'forum.id_parent', sql_quote($Pile[$SP]['id_forum'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/breve.html','html_0a137b7d77ec51f5216e98bd3b3e5279','_forums_fils',59,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('public/spip/ecrire:par_auteur');
	$l2 = _T('public/spip/ecrire:repondre_message');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
								<li>
									<div class="forum">
										<a name="forum' .
$Pile[$SP]['id_forum'] .
'"></a>
										<div class="forum-chapo">
										<div class="forum-titre">' .
interdire_scripts(supprimer_numero(safehtml(typo($Pile[$SP]['titre'], "TYPO", $connect)))) .
'</div>
											' .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['nom'], "TYPO", $connect))))!=='' ?
		((	', ' .
	$l1 .
	' <a href="mailto:' .
	interdire_scripts(mailcrypt_email_dist($Pile[$SP]['email'])) .
	'">') . $t1 . '</a>') :
		'') .
'
										</div><!-- forum-titre -->
										<div class="forum-item">
											' .
interdire_scripts(safehtml(propre(post_autobr($Pile[$SP]['texte']), $connect))) .
'
											' .
(($t1 = strval(safehtml(vider_url(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))))!=='' ?
		('<div class="forum-titre"><a href="' . $t1 . (	'" class="spip_out">' .
	interdire_scripts(safehtml(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect))) .
	'</a></div>')) :
		'') .
'
											' .
(($t1 = strval(url_reponse_forum(htmlspecialchars(
		// refus des forums ?
		(quete_accepter_forum($Pile[$SP]['id_article'])=="non" OR
		($GLOBALS["meta"]["forums_publics"] == "non"
		AND quete_accepter_forum($Pile[$SP]['id_article']) == ""))
		? "" : // sinon:
		(lang_parametres_forum(substr(((!$Pile[$SP]['id_article']) ? '' : ('&id_article='.$Pile[$SP]['id_article'])).
((!$Pile[$SP]['id_breve']) ? '' : ('&id_breve='.$Pile[$SP]['id_breve'])).
((!$Pile[$SP]['id_rubrique']) ? '' : ('&id_rubrique='.$Pile[$SP]['id_rubrique'])).
((!$Pile[$SP]['id_syndic']) ? '' : ('&id_syndic='.$Pile[$SP]['id_syndic'])).
((!$Pile[$SP]['id_forum']) ? '' : ('&id_forum='.$Pile[$SP]['id_forum'])),1),array('id_article' => 'spip_articles','id_breve' => 'spip_breves','id_rubrique' => 'spip_rubriques','id_syndic' => 'spip_syndic')).
	(($lien = (_request("retour") ? _request("retour") : str_replace("&amp;", "&", ''))) ? "&retour=".rawurlencode($lien) : ""))))))!=='' ?
		('<div class="forum-repondre-message"><a href="' . $t1 . (	'">' .
	$l2 .
	'</a></div>')) :
		'') .
'
										</div><!-- forum-item -->
									</div><!-- forum -->
									' .
BOUCLE_Forums_Bouclehtml_0a137b7d77ec51f5216e98bd3b3e5279($Cache, $Pile, $doublons, $Numrows, $SP) .
'
								</li>
							');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE forums  */

 function BOUCLE_forumshtml_0a137b7d77ec51f5216e98bd3b3e5279(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forum';
	static $id = '_forums';
	static $from = array('forum' => 'spip_forum');
	static $type = array();
	static $groupby = array();
	static $select = array("forum.id_forum",
		"forum.date_heure",
		"forum.titre",
		"forum.date_heure AS date",
		"forum.auteur AS nom",
		"forum.email_auteur AS email",
		"forum.texte",
		"forum.url_site",
		"forum.nom_site",
		"forum.id_article",
		"forum.id_breve",
		"forum.id_rubrique",
		"forum.id_syndic");
	static $orderby = array('forum.date_heure DESC');
	$where = 
			array(
			array('=', 'forum.statut', '\'publie\''), 
			array('=', 'forum.id_parent', 0), 
			array('=', 'forum.id_breve', sql_quote($Pile[$SP]['id_breve'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/breve.html','html_0a137b7d77ec51f5216e98bd3b3e5279','_forums',41,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('public/spip/ecrire:par_auteur');
	$l2 = _T('public/spip/ecrire:repondre_message');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
				<li>
					<div class="forum-fil">
						<div class="forum">
							<a name="forum' .
$Pile[$SP]['id_forum'] .
'"></a>
							<div class="forum-chapo">
								<div class="forum-titre">' .
interdire_scripts(supprimer_numero(safehtml(typo($Pile[$SP]['titre'], "TYPO", $connect)))) .
'</div>
								' .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['nom'], "TYPO", $connect))))!=='' ?
		((	', ' .
	$l1 .
	' <a href="mailto:' .
	interdire_scripts(mailcrypt_email_dist($Pile[$SP]['email'])) .
	'">') . $t1 . '</a>') :
		'') .
'
							</div><!-- forum-chapo -->
							<div class="forum-item">
								' .
interdire_scripts(safehtml(propre(post_autobr($Pile[$SP]['texte']), $connect))) .
'
								' .
(($t1 = strval(safehtml(vider_url(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))))!=='' ?
		('<div class="forum-titre"><a href="' . $t1 . (	'" class="spip_out">' .
	interdire_scripts(safehtml(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect))) .
	'</a></div>')) :
		'') .
'
								' .
(($t1 = strval(url_reponse_forum(htmlspecialchars(
		// refus des forums ?
		(quete_accepter_forum($Pile[$SP]['id_article'])=="non" OR
		($GLOBALS["meta"]["forums_publics"] == "non"
		AND quete_accepter_forum($Pile[$SP]['id_article']) == ""))
		? "" : // sinon:
		(lang_parametres_forum(substr(((!$Pile[$SP]['id_article']) ? '' : ('&id_article='.$Pile[$SP]['id_article'])).
((!$Pile[$SP]['id_breve']) ? '' : ('&id_breve='.$Pile[$SP]['id_breve'])).
((!$Pile[$SP]['id_rubrique']) ? '' : ('&id_rubrique='.$Pile[$SP]['id_rubrique'])).
((!$Pile[$SP]['id_syndic']) ? '' : ('&id_syndic='.$Pile[$SP]['id_syndic'])).
((!$Pile[$SP]['id_forum']) ? '' : ('&id_forum='.$Pile[$SP]['id_forum'])),1),array('id_article' => 'spip_articles','id_breve' => 'spip_breves','id_rubrique' => 'spip_rubriques','id_syndic' => 'spip_syndic')).
	(($lien = (_request("retour") ? _request("retour") : str_replace("&amp;", "&", ''))) ? "&retour=".rawurlencode($lien) : ""))))))!=='' ?
		('<div class="forum-repondre-message"><a href="' . $t1 . (	'">' .
	$l2 .
	'</a></div>')) :
		'') .
'
							</div><!-- forum-item -->
						</div><!-- forum -->
						' .
(($t1 = BOUCLE_forums_filshtml_0a137b7d77ec51f5216e98bd3b3e5279($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
						<ul>
							' . $t1 . '
						</ul>
						') :
		'') .
'
					</div><!-- forum-fil -->
				</li>
			');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE breves  */

 function BOUCLE_breves_rubriquehtml_0a137b7d77ec51f5216e98bd3b3e5279(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'breves';
	static $id = '_breves_rubrique';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.date_heure",
		"breves.date_heure AS date",
		"breves.id_breve",
		"breves.texte",
		"breves.titre",
		"breves.lang");
	static $orderby = array('breves.date_heure DESC');
	$where = 
			array(
			array('=', 'breves.statut', '\'publie\''), 
			array(sql_in('breves.id_breve', $doublons[$doublons_index[]= ('breves')], 'NOT')));
	static $join = array();
	static $limit = '0,20';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/breve.html','html_0a137b7d77ec51f5216e98bd3b3e5279','_breves_rubrique',94,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_breve']; // doublons

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
          	<li>' .
(($t1 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('<span>' . $t1 . '</span>') :
		'') .
'
              <a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_breve'], 'breve', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist('', $Pile[$SP]['texte'], 300, $connect))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</a>
          	</li>
					');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE breves  */

 function BOUCLE_breve_principalhtml_0a137b7d77ec51f5216e98bd3b3e5279(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'breves';
	static $id = '_breve_principal';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.id_breve",
		"breves.lang",
		"breves.titre",
		"breves.id_rubrique AS id_secteur",
		"breves.id_rubrique",
		"breves.date_heure AS date",
		"breves.texte",
		"breves.lien_url AS url_site",
		"breves.lien_titre AS nom_site");
	static $orderby = array();
	$where = 
			array(
			array('=', 'breves.statut', '\'publie\''), 
			array('=', 'breves.id_breve', sql_quote($Pile[0]['id_breve'],'','int')), 
			array(sql_in('breves.id_breve', $doublons[$doublons_index[]= ('breves')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/breve.html','html_0a137b7d77ec51f5216e98bd3b3e5279','_breve_principal',1,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_breve']; // doublons

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'">
<head>
	<title>[' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
'] : ' .
interdire_scripts(textebrut(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))) .
'</title>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-meta') . ', array(\'id_breve\' => ' . argumenter_squelette($Pile[$SP]['id_breve']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/breve.html\',\'html_0a137b7d77ec51f5216e98bd3b3e5279\',\'\',7,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('styles') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/breve.html\',\'html_0a137b7d77ec51f5216e98bd3b3e5279\',\'\',8,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>


</head>
<body dir="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'" class="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
' breve sect' .
$Pile[$SP]['id_secteur'] .
' rub' .
$Pile[$SP]['id_rubrique'] .
' br' .
$Pile[$SP]['id_breve'] .
'">
<div id="page" class="breve">

<!-- *****************************************************************
	Bandeau, titre du site et menu langue
	Header and main menu (top and right) 
    ************************************************************* -->
	
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bandeau') . ', array(\'id_breve\' => ' . argumenter_squelette($Pile[$SP]['id_breve']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/breve.html\',\'html_0a137b7d77ec51f5216e98bd3b3e5279\',\'\',20,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

<!-- *****************************************************************
	Contenu principal (centre)
	Main content (center) 
    ************************************************************* -->
	<div id="bloc-contenu">
		<div id="cartouche">
			' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_breve', 'ON', $Pile[$SP]['id_breve'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'120','0'))))!=='' ?
		('<span style="float:right;">' . $t1 . '</span>') :
		'') .
'
			<h2 class="titre-article">' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</h2>
			<h6>' .
interdire_scripts(nom_jour(normaliser_date($Pile[$SP]['date']))) .
' ' .
(($t1 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		($t1 . '.') :
		'') .
'</h6>
		</div><!-- cartouche -->
		<br />
		' .
(($t1 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',cs_nettoie(sommaire_d_article(propre($Pile[$SP]['texte'],$connect))),'440','0')))))!=='' ?
		((	'<div class="texte">') . $t1 . '</div>') :
		'') .
'
		' .
(($t1 = strval(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))!=='' ?
		((	'<div class="chapo">' .
	_T('public/spip/ecrire:voir_en_ligne') .
	' : <a href="') . $t1 . (	'">' .
	interdire_scripts(((($a = typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)) OR (!is_array($a) AND strlen($a))) ? $a : calculer_url($Pile[$SP]['url_site'],'','url', $connect))) .
	'</a></div>')) :
		'') .
'
		' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		('<div class="notes">' . $t1 . '</div>') :
		'') .
'
		<br />

		<!-- Forums -->
		' .
(($t1 = strval(url_reponse_forum(htmlspecialchars(
		// refus des forums ?
		(quete_accepter_forum(@$Pile[0]['id_article'])=="non" OR
		($GLOBALS["meta"]["forums_publics"] == "non"
		AND quete_accepter_forum(@$Pile[0]['id_article']) == ""))
		? "" : // sinon:
		(lang_parametres_forum("id_breve=".$Pile[$SP]['id_breve'],$Pile[$SP]['lang']).
	(($lien = (_request("retour") ? _request("retour") : str_replace("&amp;", "&", ''))) ? "&retour=".rawurlencode($lien) : ""))))))!=='' ?
		('<div class="forum-repondre"><h5><a href="' . $t1 . (	'">' .
	_T('public/spip/ecrire:repondre_breve') .
	'</a></h5></div>')) :
		'') .
'

		' .
(($t1 = BOUCLE_forumshtml_0a137b7d77ec51f5216e98bd3b3e5279($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<h1 class="structure">' .
		_T('public/spip/ecrire:forum') .
		'</h1>
		<ul class="forum-total">
			') . $t1 . '
		</ul>
		') :
		'') .
'
	</div><!-- bloc-contenu -->

<!-- *****************************************************************
	Menus contextuels (droite)
	Contextual menus (right) 
    ************************************************************* -->
	<div id="encart">

		<!-- Breves dans la meme rubrique -->
		' .
(($t1 = BOUCLE_breves_rubriquehtml_0a137b7d77ec51f5216e98bd3b3e5279($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<div class="menu">
		<h2 class="structure">' .
		_T('public/spip/ecrire:breves') .
		'</h2>
      <ul>
        <li><b>' .
		_T('public/spip/ecrire:autres_breves') .
		'</b>
					<ul>
					') . $t1 . '
          </ul>
        </li>
      </ul>
		</div><!-- menu -->
		') :
		'') .
'

	</div><!-- encart -->
	
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-menu') . ', array(\'id_breve\' => ' . argumenter_squelette($Pile[$SP]['id_breve']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/breve.html\',\'html_0a137b7d77ec51f5216e98bd3b3e5279\',\'\',113,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bas') . ', array(\'id_breve\' => ' . argumenter_squelette($Pile[$SP]['id_breve']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/breve.html\',\'html_0a137b7d77ec51f5216e98bd3b3e5279\',\'\',114,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</div><!-- page -->

</body>
</html>
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/ahuntsic/breve.html
// Temps de compilation total: 54.923 ms
//

function html_0a137b7d77ec51f5216e98bd3b3e5279($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = BOUCLE_breve_principalhtml_0a137b7d77ec51f5216e98bd3b3e5279($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
' .
	
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('404') . ', array(\'id_breve\' => ' . argumenter_squelette(@$Pile[0]['id_breve']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/breve.html\',\'html_0a137b7d77ec51f5216e98bd3b3e5279\',\'\',120,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
'))) .
'
');

	return analyse_resultat_skel('html_0a137b7d77ec51f5216e98bd3b3e5279', $Cache, $page, 'plugins/auto/ahuntsic/breve.html');
}
?>