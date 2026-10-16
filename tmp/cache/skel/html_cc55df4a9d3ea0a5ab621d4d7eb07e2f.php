<?php

/*
 * Squelette : plugins/auto/ahuntsic/resume.html
 * Date :      Mon, 10 Nov 2014 19:34:41 GMT
 * Compile :   Tue, 11 Nov 2014 11:11:41 GMT
 * Boucles :   _langue_contexte_exclus, _langues, _archive
 */ 

/* BOUCLE articles  */

 function BOUCLE_langue_contexte_exclushtml_cc55df4a9d3ea0a5ab621d4d7eb07e2f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'articles';
	static $id = '_langue_contexte_exclus';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles' . 'contexte')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/resume.html','html_cc55df4a9d3ea0a5ab621d4d7eb07e2f','_langue_contexte_exclus',26,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons

	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_langueshtml_cc55df4a9d3ea0a5ab621d4d7eb07e2f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'articles';
	static $id = '_langues';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.lang",
		"articles.id_article",
		"articles.titre");
	static $orderby = array('articles.lang');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles' . 'contexte')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/resume.html','html_cc55df4a9d3ea0a5ab621d4d7eb07e2f','_langues',27,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (($t1 = strval(traduire_nom_langue(unique(htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])),'lang')))!=='' ?
		((	'
				<li lang="' .
	htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'" xml:lang="' .
	htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'" dir="' .
	lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
	'">
					<a href="spip.php?action=converser&amp;redirect=' .
	self() .
	'&amp;var_lang=' .
	htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'" hreflang="' .
	htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'">') . $t1 . '</a>
				</li>
			') :
		'');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_archivehtml_cc55df4a9d3ea0a5ab621d4d7eb07e2f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_archive';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.date",
		"articles.id_article",
		"articles.titre",
		"articles.lang");
	static $orderby = array('articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/resume.html','html_cc55df4a9d3ea0a5ab621d4d7eb07e2f','_archive',45,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_archive']['compteur_boucle'] = 0;
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_archive']['compteur_boucle']++;
		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
		' .
(($t1 = strval(interdire_scripts(unique(annee(normaliser_date($Pile[$SP]['date']))))))!=='' ?
		((	'
			' .
	(($Numrows['_archive']['compteur_boucle'] > '1') ? '</ul></li></ul></div>':'') .
	'
			<div id="plan">
			<h3>') . $t1 . '</h3>

			<ul>
		') :
		'') .
'
		' .
(($t1 = strval(interdire_scripts(nom_mois(unique(affdate(normaliser_date($Pile[$SP]['date']),'Y-m'))))))!=='' ?
		((	'
			' .
	interdire_scripts((unique(annee(normaliser_date($Pile[$SP]['date'])),'nouvelle') ? '':'</ul></li>')) .
	'
			  <li>') . $t1 . '
  				<ul>
		') :
		'') .
'
				  <li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'">' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</a></li>
	');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/ahuntsic/resume.html
// Temps de compilation total: 6.031 ms
//

function html_cc55df4a9d3ea0a5ab621d4d7eb07e2f($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


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
'] : Archives</title>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-meta') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/resume.html\',\'html_cc55df4a9d3ea0a5ab621d4d7eb07e2f\',\'\',6,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('styles') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/resume.html\',\'html_cc55df4a9d3ea0a5ab621d4d7eb07e2f\',\'\',7,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

</head>
<body dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'" class="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
' plan">
<div id="page">

<!-- *****************************************************************
	Bandeau, titre du site et menu langue
	Header and main menu (top and right) 
    ************************************************************* -->
	
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bandeau') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/resume.html\',\'html_cc55df4a9d3ea0a5ab621d4d7eb07e2f\',\'\',18,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

<!-- *****************************************************************
	Contenu principal (centre)
	Main content (center) 
    ************************************************************* -->

	<div id="bloc-contenu">
		' .
BOUCLE_langue_contexte_exclushtml_cc55df4a9d3ea0a5ab621d4d7eb07e2f($Cache, $Pile, $doublons, $Numrows, $SP) .
'
		' .
(($t1 = BOUCLE_langueshtml_cc55df4a9d3ea0a5ab621d4d7eb07e2f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<div id="sommaire">
			<h4>' .
		_T('public/spip/ecrire:info_langues') .
		'</h4>
			<ul>
			') . $t1 . '
			</ul>
		</div>
		') :
		'') .
'
		
		<h2>' .
_T('public/spip/ecrire:en_resume') .
'</h2>
		<h3>' .
_T('public/spip/ecrire:info_visites_par_mois') .
' ' .
(($t1 = strval(traduire_nom_langue(unique(htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang'])),'langues')))!=='' ?
		('<em>' . $t1 . '</em>') :
		'') .
'</h3>
	
	' .
(($t1 = BOUCLE_archivehtml_cc55df4a9d3ea0a5ab621d4d7eb07e2f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . '
				</ul>
			  </li>
			</ul>
			</div><!-- plan -->
	') :
		'') .
'
	</div><!-- bloc-contenu -->

	
        

<!-- *****************************************************************
	Menus contextuels (droite)
	Contextual menus (right) 
    ************************************************************* -->
	<div id="encart">
    ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-annonces') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/resume.html\',\'html_cc55df4a9d3ea0a5ab621d4d7eb07e2f\',\'\',75,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
    ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-breves') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/resume.html\',\'html_cc55df4a9d3ea0a5ab621d4d7eb07e2f\',\'\',76,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
    ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-syndic') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/resume.html\',\'html_cc55df4a9d3ea0a5ab621d4d7eb07e2f\',\'\',77,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

	</div><!-- encart -->
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-menu') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/resume.html\',\'html_cc55df4a9d3ea0a5ab621d4d7eb07e2f\',\'\',80,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bas') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/resume.html\',\'html_cc55df4a9d3ea0a5ab621d4d7eb07e2f\',\'\',81,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</div><!-- page -->

</body>
</html>


');

	return analyse_resultat_skel('html_cc55df4a9d3ea0a5ab621d4d7eb07e2f', $Cache, $page, 'plugins/auto/ahuntsic/resume.html');
}
?>