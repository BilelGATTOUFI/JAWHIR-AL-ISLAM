<?php

/*
 * Squelette : plugins/auto/ahuntsic/forum.html
 * Date :      Mon, 10 Nov 2014 19:34:39 GMT
 * Compile :   Thu, 04 Dec 2014 09:58:51 GMT
 * Boucles :   _auteurs_un, _article, _breve, _forum_parent
 */ 

/* BOUCLE auteurs  */

 function BOUCLE_auteurs_unhtml_bfa416db517e672b02ef4b3eb3e6a563(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_auteurs_un';
	static $from = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("auteurs.nom");
	static $orderby = array();
	$where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('=', 'L1.id_article', sql_quote($Pile[$SP]['id_article'])));
	static $join = array('L1' => array('auteurs','id_auteur'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/forum.html','html_bfa416db517e672b02ef4b3eb3e6a563','_auteurs_un',33,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t1 = interdire_scripts(typo($Pile[$SP]['nom'], "TYPO", $connect));
		$t0 .= (($t1 && $t0) ? ', ' : '') . $t1;
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_articlehtml_bfa416db517e672b02ef4b3eb3e6a563(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_article';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.surtitre",
		"articles.titre",
		"articles.soustitre",
		"articles.date",
		"articles.texte",
		"articles.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_article', sql_quote($Pile[0]['id_article'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/forum.html','html_bfa416db517e672b02ef4b3eb3e6a563','_article',25,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
			<h2>' .
_T('public/spip/ecrire:en_reponse') .
'</h2>
			' .
filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" align=\"right\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'120','0')) .
'
			' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['surtitre'], "TYPO", $connect))))!=='' ?
		('<div class="surtitre">' . $t1 . '</div>') :
		'') .
'
			<h3 class="titre-extrait"><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'">' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</a></h3>
			' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['soustitre'], "TYPO", $connect))))!=='' ?
		('<div class="surtitre">' . $t1 . '</div>') :
		'') .
'
			<div class="detail">
				' .
interdire_scripts(nom_jour(normaliser_date($Pile[$SP]['date']))) .
' ' .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
'
				' .
(($t1 = BOUCLE_auteurs_unhtml_bfa416db517e672b02ef4b3eb3e6a563($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	_T('public/spip/ecrire:par_auteur') .
		' ') . $t1) :
		'') .
'
			</div><!-- detail -->
			' .
(($t1 = strval(interdire_scripts(cs_nettoie(sommaire_d_article(propre($Pile[$SP]['texte'],$connect))))))!=='' ?
		('<div class="texte"><div class="extrait">' . $t1 . '</div></div>') :
		'') .
'
			<br />
		');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE breves  */

 function BOUCLE_brevehtml_bfa416db517e672b02ef4b3eb3e6a563(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_breve';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.id_breve",
		"breves.titre",
		"breves.date_heure AS date",
		"breves.texte",
		"breves.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'breves.statut', '\'publie\''), 
			array('=', 'breves.id_breve', sql_quote($Pile[0]['id_breve'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/forum.html','html_bfa416db517e672b02ef4b3eb3e6a563','_breve',38,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
			<h2>' .
_T('public/spip/ecrire:en_reponse') .
'</h2>
			' .

((!is_array($l = quete_logo('id_breve', 'ON', $Pile[$SP]['id_breve'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" align=\"right\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')) .
'

			<h3><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_breve'], 'breve', '', '', true))) .
'">' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</a></h3>
			<div class="detail">
				' .
interdire_scripts(nom_jour(normaliser_date($Pile[$SP]['date']))) .
' ' .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
'
			</div>
			' .
(($t1 = strval(interdire_scripts(cs_nettoie(sommaire_d_article(propre($Pile[$SP]['texte'],$connect))))))!=='' ?
		('<div class="texte"><div class="extrait">' . $t1 . '</div></div>') :
		'') .
'
			<br /><!-- detail -->
		');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE forums  */

 function BOUCLE_forum_parenthtml_bfa416db517e672b02ef4b3eb3e6a563(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forum';
	static $id = '_forum_parent';
	static $from = array('forum' => 'spip_forum');
	static $type = array();
	static $groupby = array();
	static $select = array("forum.id_forum",
		"forum.titre",
		"forum.date_heure AS date",
		"forum.auteur AS nom",
		"forum.texte");
	static $orderby = array();
	$where = 
			array(
			array('=', 'forum.statut', '\'publie\''), 
			array('=', 'forum.id_forum', sql_quote($Pile[0]['id_forum'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/forum.html','html_bfa416db517e672b02ef4b3eb3e6a563','_forum_parent',49,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('public/spip/ecrire:en_reponse');
	$l2 = _T('public/spip/ecrire:par_auteur');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
			<h2>' .
$l1 .
'</h2>
			<h3><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_forum'], 'forum', '', '', true))) .
'">' .
interdire_scripts(supprimer_numero(safehtml(typo($Pile[$SP]['titre'], "TYPO", $connect)))) .
'</a></h3>
			<div class="detail">
				' .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
interdire_scripts(heures(normaliser_date($Pile[$SP]['date']))) .
(($t1 = strval(interdire_scripts(minutes(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		(':' . $t1) :
		'') .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['nom'], "TYPO", $connect))))!=='' ?
		((	', ' .
	$l2 .
	' ') . $t1) :
		'') .
'
			</div><!-- detail -->
			' .
(($t1 = strval(interdire_scripts(lignes_longues(filtre_introduction_dist('', $Pile[$SP]['texte'], 600, $connect)))))!=='' ?
		('<div class="texte"><div class="extrait">' . $t1 . '</div></div>') :
		'') .
'
			<br />
		');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/ahuntsic/forum.html
// Temps de compilation total: 67.559 ms
//

function html_bfa416db517e672b02ef4b3eb3e6a563($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">
<head>
	<title>[' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
'] : ' .
_T('public/spip/ecrire:poster_message') .
'</title>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-meta') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/forum.html\',\'html_bfa416db517e672b02ef4b3eb3e6a563\',\'\',6,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('page') . ', array(\'fond\' => ' . argumenter_squelette('styles') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/forum.html\',\'html_bfa416db517e672b02ef4b3eb3e6a563\',\'\',7,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</head>
<body dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">
<div id="page" class="forum">

<!-- *****************************************************************
	Bandeau, titre du site et menu langue
	Header and main menu (top and right) 
    ************************************************************* -->
	
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bandeau') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/forum.html\',\'html_bfa416db517e672b02ef4b3eb3e6a563\',\'\',17,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

<!-- *****************************************************************
	Contenu principal (centre)
	Main content (center) 
    ************************************************************* -->
	<div id="bloc-contenu">
		<h1 class="structure">' .
_T('public/spip/ecrire:poster_message') .
'</h1>
		' .
BOUCLE_articlehtml_bfa416db517e672b02ef4b3eb3e6a563($Cache, $Pile, $doublons, $Numrows, $SP) .
'
		' .
BOUCLE_brevehtml_bfa416db517e672b02ef4b3eb3e6a563($Cache, $Pile, $doublons, $Numrows, $SP) .
'
		' .
BOUCLE_forum_parenthtml_bfa416db517e672b02ef4b3eb3e6a563($Cache, $Pile, $doublons, $Numrows, $SP) .
'
		
		<!--*****************************************************************
			Forum
		******************************************************************-->
		' .
executer_balise_dynamique('FORMULAIRE_FORUM',
	array(@$Pile[0]['id_rubrique'],@$Pile[0]['id_forum'],@$Pile[0]['id_article'],@$Pile[0]['id_breve'],@$Pile[0]['id_syndic'],@$Pile[0]['ajouter_mot'],@$Pile[0]['ajouter_groupe'],@$Pile[0]['afficher_texte']),
	array('plugins/auto/ahuntsic/forum.html','html_bfa416db517e672b02ef4b3eb3e6a563','',62,$GLOBALS['spip_lang'])) .
'
	</div><!-- bloc-contenu -->
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-menu') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/forum.html\',\'html_bfa416db517e672b02ef4b3eb3e6a563\',\'\',64,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bas') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/forum.html\',\'html_bfa416db517e672b02ef4b3eb3e6a563\',\'\',65,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</div><!-- page -->

</body>
</html>


');

	return analyse_resultat_skel('html_bfa416db517e672b02ef4b3eb3e6a563', $Cache, $page, 'plugins/auto/ahuntsic/forum.html');
}
?>