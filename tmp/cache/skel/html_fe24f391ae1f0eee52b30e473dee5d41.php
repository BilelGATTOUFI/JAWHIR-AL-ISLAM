<?php

/*
 * Squelette : plugins/auto/ahuntsic/statistiques.html
 * Date :      Mon, 10 Nov 2014 19:34:43 GMT
 * Compile :   Tue, 07 Jun 2016 15:44:42 GMT
 * Boucles :   _tous_articles, _tous_breves, _tous_sites, _tous_auteurs, _articles_populaires
 */ 

/* BOUCLE articles  */

 function BOUCLE_tous_articleshtml_fe24f391ae1f0eee52b30e473dee5d41(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_tous_articles';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	$select = array("count(*)");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/statistiques.html','html_fe24f391ae1f0eee52b30e473dee5d41','_tous_articles',30,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_tous_articles']['total'] = @intval(($cc=sql_fetch($result))?array_shift($cc):0);
	$SP++;
	// RESULTATS
	
	$t0 = str_repeat(' ', $Numrows['_tous_articles']['total']);
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE breves  */

 function BOUCLE_tous_breveshtml_fe24f391ae1f0eee52b30e473dee5d41(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_tous_breves';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	$select = array("count(*)");
	static $orderby = array();
	static $where = 
			array(
			array('=', 'breves.statut', '\'publie\''));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/statistiques.html','html_fe24f391ae1f0eee52b30e473dee5d41','_tous_breves',32,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_tous_breves']['total'] = @intval(($cc=sql_fetch($result))?array_shift($cc):0);
	$SP++;
	// RESULTATS
	
	$t0 = str_repeat(' ', $Numrows['_tous_breves']['total']);
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE syndication  */

 function BOUCLE_tous_siteshtml_fe24f391ae1f0eee52b30e473dee5d41(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic';
	static $id = '_tous_sites';
	static $from = array('syndic' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	$select = array("count(*)");
	static $orderby = array();
	static $where = 
			array(
			array('=', 'syndic.statut', '\'publie\''));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/statistiques.html','html_fe24f391ae1f0eee52b30e473dee5d41','_tous_sites',34,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_tous_sites']['total'] = @intval(($cc=sql_fetch($result))?array_shift($cc):0);
	$SP++;
	// RESULTATS
	
	$t0 = str_repeat(' ', $Numrows['_tous_sites']['total']);
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE auteurs  */

 function BOUCLE_tous_auteurshtml_fe24f391ae1f0eee52b30e473dee5d41(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_tous_auteurs';
	static $from = array('auteurs' => 'spip_auteurs');
	static $type = array();
	static $groupby = array();
	$select = array("count(*)");
	static $orderby = array();
	static $where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/statistiques.html','html_fe24f391ae1f0eee52b30e473dee5d41','_tous_auteurs',36,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_tous_auteurs']['total'] = @intval(($cc=sql_fetch($result))?array_shift($cc):0);
	$SP++;
	// RESULTATS
	
	$t0 = str_repeat(' ', $Numrows['_tous_auteurs']['total']);
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_articles_populaireshtml_fe24f391ae1f0eee52b30e473dee5d41(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[0]['lang']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	static $table = 'articles';
	static $id = '_articles_populaires';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.popularite",
		"articles.id_article",
		"articles.descriptif",
		"articles.titre",
		"articles.date",
		"articles.lang");
	static $orderby = array('articles.popularite DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), (!(is_array($Pile[0]['lang'])?count($Pile[0]['lang']):strlen($Pile[0]['lang'])) ? '' : ((is_array($Pile[0]['lang'])) ? sql_in('articles.lang',sql_quote($in)) : 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])))));
	static $join = array();
	static $limit = '0,10';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/statistiques.html','html_fe24f391ae1f0eee52b30e473dee5d41','_articles_populaires',43,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
			<h3><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</a></h3>
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
(($t1 = strval(recuperer_fond('modeles/lesauteurs', array('id_article' => $Pile[$SP]['id_article']), array('trim'=>true, 'compil'=>array('plugins/auto/ahuntsic/statistiques.html','html_fe24f391ae1f0eee52b30e473dee5d41','_articles_populaires',45,$GLOBALS['spip_lang'])), '')))!=='' ?
		((	'<span class="auteurs">' .
	_T('public/spip/ecrire:par_auteur') .
	' ') . $t1 . '</span>') :
		'') .
'				
				' .
(($t1 = strval((ceil(min(100, 100 * $Pile[$SP]['popularite']
	/ max(1 , 0 + $GLOBALS['meta']['popularite_max']))))))!=='' ?
		((	_T('public/spip/ecrire:popularite') .
	'&nbsp;: <span class="important">') . $t1 . '</span> %') :
		'') .
'
			</div><!-- detail -->
			<br />
		');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/ahuntsic/statistiques.html
// Temps de compilation total: 34.855 ms
//

function html_fe24f391ae1f0eee52b30e473dee5d41($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


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
_T('public/spip/ecrire:en_resume') .
'</title>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-meta') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/statistiques.html\',\'html_fe24f391ae1f0eee52b30e473dee5d41\',\'\',6,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('styles') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/statistiques.html\',\'html_fe24f391ae1f0eee52b30e473dee5d41\',\'\',7,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</head>

<body dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'" class="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
' resume">
<div id="page">

<!-- *****************************************************************
	Bandeau, titre du site et menu langue
	Header and main menu (top and right) 
    ************************************************************* -->
	
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bandeau') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/statistiques.html\',\'html_fe24f391ae1f0eee52b30e473dee5d41\',\'\',18,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

<!-- *****************************************************************
	Contenu principal (centre)
	Main content (center) 
    ************************************************************* -->
	<div id="bloc-contenu">
		<div class="cartouche">
			<div class="surtitre">' .
_T('public/spip/ecrire:titre_statistiques') .
'</div>
		</div><!-- cartouche -->
			
    <div class="bande-stats">
' .
(($t1 = BOUCLE_tous_articleshtml_fe24f391ae1f0eee52b30e473dee5d41($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . (	'
        <b>' .
		$Numrows['_tous_articles']['total'] .
		' ' .
		_T('public/spip/ecrire:articles') .
		'</b>')) :
		'') .
'
' .
(($t1 = BOUCLE_tous_breveshtml_fe24f391ae1f0eee52b30e473dee5d41($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . (	'
        | <b>' .
		$Numrows['_tous_breves']['total'] .
		' ' .
		_T('public/spip/ecrire:nouvelles_breves') .
		'</b>')) :
		'') .
'
' .
(($t1 = BOUCLE_tous_siteshtml_fe24f391ae1f0eee52b30e473dee5d41($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . (	'
        | <b>' .
		$Numrows['_tous_sites']['total'] .
		' ' .
		_T('public/spip/ecrire:info_sites') .
		'</b>')) :
		'') .
'
' .
(($t1 = BOUCLE_tous_auteurshtml_fe24f391ae1f0eee52b30e473dee5d41($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . (	'
        | <b>' .
		$Numrows['_tous_auteurs']['total'] .
		' ' .
		_T('public/spip/ecrire:info_auteurs_nombre') .
		' </b>')) :
		'') .
'
        | <b>' .
_T('public/spip/ecrire:info_visiteurs') .
' ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-affvisit') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/statistiques.html\',\'html_fe24f391ae1f0eee52b30e473dee5d41\',\'\',38,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'></b>
    </div>

		<!-- Articles les plus populaires -->
			<h1 class="titre-article">' .
_T('public/spip/ecrire:articles_populaires') .
'</h1>
		' .
BOUCLE_articles_populaireshtml_fe24f391ae1f0eee52b30e473dee5d41($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	</div><!-- bloc-contenu -->
	
<!-- *****************************************************************
	Menus contextuels (droite)
	Contextual menus (right) 
    ************************************************************* -->
  <div id="encart">  
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-annonces') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/statistiques.html\',\'html_fe24f391ae1f0eee52b30e473dee5d41\',\'\',59,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-breves') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/statistiques.html\',\'html_fe24f391ae1f0eee52b30e473dee5d41\',\'\',61,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-syndic') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/statistiques.html\',\'html_fe24f391ae1f0eee52b30e473dee5d41\',\'\',63,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

 ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-forums') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/statistiques.html\',\'html_fe24f391ae1f0eee52b30e473dee5d41\',\'\',65,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
 
  </div><!-- encart -->
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-menu') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/statistiques.html\',\'html_fe24f391ae1f0eee52b30e473dee5d41\',\'\',68,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bas') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/statistiques.html\',\'html_fe24f391ae1f0eee52b30e473dee5d41\',\'\',69,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'></div><!-- page -->

</body>
</html>  ');

	return analyse_resultat_skel('html_fe24f391ae1f0eee52b30e473dee5d41', $Cache, $page, 'plugins/auto/ahuntsic/statistiques.html');
}
?>