<?php

/*
 * Squelette : plugins/auto/ahuntsic/mot.html
 * Date :      Mon, 10 Nov 2014 19:34:40 GMT
 * Compile :   Thu, 04 Dec 2014 19:02:43 GMT
 * Boucles :   _meme_groupe, _auteurs, _articles, _mots_freres, _groupe, _mots_eclus, _mot_cousin, _groupes_freres, _rubriques, _breves, _sites, _mot_principal
 */ 

/* BOUCLE groupes_mots  */

 function BOUCLE_meme_groupehtml_c98aa234470c7768125b2c34967a29d2(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'groupes_mots';
	static $id = '_meme_groupe';
	static $from = array('groupes_mots' => 'spip_groupes_mots');
	static $type = array();
	static $groupby = array();
	static $select = array("groupes_mots.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'groupes_mots.id_groupe', sql_quote($Pile[$SP]['id_groupe'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/mot.html','html_c98aa234470c7768125b2c34967a29d2','_meme_groupe',29,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))));
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE auteurs  */

 function BOUCLE_auteurshtml_c98aa234470c7768125b2c34967a29d2(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_auteurs';
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
		 array('plugins/auto/ahuntsic/mot.html','html_c98aa234470c7768125b2c34967a29d2','_auteurs',42,$GLOBALS['spip_lang']));
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

 function BOUCLE_articleshtml_c98aa234470c7768125b2c34967a29d2(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['lang']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	static $table = 'articles';
	static $id = '_articles';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_mots_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.titre",
		"articles.descriptif",
		"articles.date",
		"articles.lang");
	static $orderby = array('articles.titre');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'L1.id_mot', sql_quote($Pile[$SP]['id_mot'])), (!(is_array(@$Pile[0]['lang'])?count(@$Pile[0]['lang']):strlen(@$Pile[0]['lang'])) ? '' : ((is_array(@$Pile[0]['lang'])) ? sql_in('articles.lang',sql_quote($in)) : 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])))));
	static $join = array('L1' => array('articles','id_article'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/mot.html','html_c98aa234470c7768125b2c34967a29d2','_articles',38,$GLOBALS['spip_lang']));
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
interdire_scripts(nom_jour(normaliser_date($Pile[$SP]['date']))) .
' ' .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
'
				' .
(($t1 = BOUCLE_auteurshtml_c98aa234470c7768125b2c34967a29d2($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	_T('public/spip/ecrire:par_auteur') .
		' ') . $t1) :
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



/* BOUCLE mots  */

 function BOUCLE_mots_frereshtml_c98aa234470c7768125b2c34967a29d2(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_mots_freres';
	static $from = array('mots' => 'spip_mots');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre",
		"mots.id_mot",
		"mots.descriptif");
	static $orderby = array('mots.titre');
	$where = 
			array(
			array('=', 'mots.type', sql_quote($Pile[$SP]['type'])));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/mot.html','html_c98aa234470c7768125b2c34967a29d2','_mots_freres',62,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
            <li>
              <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_mot'], 'mot', '', '', true))) .
'" title="' .
interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect)))) .
'">' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</a>
            </li>
            ');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE groupes_mots  */

 function BOUCLE_groupehtml_c98aa234470c7768125b2c34967a29d2(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'groupes_mots';
	static $id = '_groupe';
	static $from = array('groupes_mots' => 'spip_groupes_mots');
	static $type = array();
	static $groupby = array();
	static $select = array("groupes_mots.titre",
		"groupes_mots.id_groupe");
	static $orderby = array();
	$where = 
			array(
			array('=', 'groupes_mots.id_groupe', sql_quote($Pile[$SP]['id_groupe'],'','int')), 
			array(sql_in('groupes_mots.id_groupe', $doublons[$doublons_index[]= ('groupes_mots')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/mot.html','html_c98aa234470c7768125b2c34967a29d2','_groupe',54,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_groupe']; // doublons

		$t0 .= interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))));
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE groupes_mots  */

 function BOUCLE_mots_eclushtml_c98aa234470c7768125b2c34967a29d2(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'groupes_mots';
	static $id = '_mots_eclus';
	static $from = array('groupes_mots' => 'spip_groupes_mots');
	static $type = array();
	static $groupby = array();
	static $select = array("groupes_mots.id_groupe");
	static $orderby = array();
	$where = 
			array(
			array('=', 'groupes_mots.titre', "'_config_'"), 
			array(sql_in('groupes_mots.id_groupe', $doublons[$doublons_index[]= ('groupes_mots')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/mot.html','html_c98aa234470c7768125b2c34967a29d2','_mots_eclus',74,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_groupe']; // doublons

	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE mots  */

 function BOUCLE_mot_cousinhtml_c98aa234470c7768125b2c34967a29d2(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_mot_cousin';
	static $from = array('mots' => 'spip_mots');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre",
		"mots.id_mot",
		"mots.type");
	static $orderby = array('mots.titre');
	$where = 
			array(
			array('=', 'mots.id_groupe', sql_quote($Pile[$SP]['id_groupe'],'','int')));
	static $join = array();
	static $limit = '0,1';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/mot.html','html_c98aa234470c7768125b2c34967a29d2','_mot_cousin',82,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
            <li>
              <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_mot'], 'mot', '', '', true))) .
'">' .
interdire_scripts(supprimer_numero(typo($Pile[$SP]['type'], "TYPO", $connect))) .
'</a>
            </li>
              ');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE groupes_mots  */

 function BOUCLE_groupes_frereshtml_c98aa234470c7768125b2c34967a29d2(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'groupes_mots';
	static $id = '_groupes_freres';
	static $from = array('groupes_mots' => 'spip_groupes_mots');
	static $type = array();
	static $groupby = array();
	static $select = array("groupes_mots.id_groupe",
		"groupes_mots.titre");
	static $orderby = array('groupes_mots.titre');
	$where = 
			array(
			array(sql_in('groupes_mots.id_groupe', $doublons[$doublons_index[]= ('groupes_mots')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/mot.html','html_c98aa234470c7768125b2c34967a29d2','_groupes_freres',75,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_groupe']; // doublons

		$t0 .= (
'
              ' .
BOUCLE_mot_cousinhtml_c98aa234470c7768125b2c34967a29d2($Cache, $Pile, $doublons, $Numrows, $SP) .
'
            ');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_rubriqueshtml_c98aa234470c7768125b2c34967a29d2(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_rubriques';
	static $from = array('rubriques' => 'spip_rubriques','L1' => 'spip_mots_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.descriptif",
		"rubriques.lang");
	static $orderby = array('rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'L1.id_mot', sql_quote($Pile[$SP]['id_mot'])));
	static $join = array('L1' => array('rubriques','id_rubrique'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/mot.html','html_c98aa234470c7768125b2c34967a29d2','_rubriques',95,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
            <li>
              <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
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

 function BOUCLE_breveshtml_c98aa234470c7768125b2c34967a29d2(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_breves';
	static $from = array('breves' => 'spip_breves','L1' => 'spip_mots_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.titre",
		"breves.id_breve",
		"breves.lang");
	static $orderby = array('breves.titre');
	$where = 
			array(
			array('=', 'breves.statut', '\'publie\''), 
			array('=', 'L1.id_mot', sql_quote($Pile[$SP]['id_mot'])));
	static $join = array('L1' => array('breves','id_breve'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/mot.html','html_c98aa234470c7768125b2c34967a29d2','_breves',113,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
            <li >
              <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_breve'], 'breve', '', '', true))) .
'">' .
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



/* BOUCLE syndication  */

 function BOUCLE_siteshtml_c98aa234470c7768125b2c34967a29d2(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic';
	static $id = '_sites';
	static $from = array('syndic' => 'spip_syndic','L1' => 'spip_mots_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("syndic.nom_site",
		"syndic.url_site");
	static $orderby = array('syndic.nom_site');
	$where = 
			array(
			array('=', 'syndic.statut', '\'publie\''), 
			array('=', 'L1.id_mot', sql_quote($Pile[$SP]['id_mot'])));
	static $join = array('L1' => array('syndic','id_syndic'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/mot.html','html_c98aa234470c7768125b2c34967a29d2','_sites',131,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
            <li>
              <a href="' .
calculer_url($Pile[$SP]['url_site'],'','url', $connect) .
'">' .
interdire_scripts(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)) .
'</a>
            </li>
            ');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE mots  */

 function BOUCLE_mot_principalhtml_c98aa234470c7768125b2c34967a29d2(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'mots';
	static $id = '_mot_principal';
	static $from = array('mots' => 'spip_mots');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.id_groupe",
		"mots.id_mot",
		"mots.type",
		"mots.titre",
		"mots.texte");
	static $orderby = array();
	$where = 
			array(
			array('=', 'mots.id_mot', sql_quote($Pile[0]['id_mot'],'','int')), 
			array(sql_in('mots.id_mot', $doublons[$doublons_index[]= ('mots')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/mot.html','html_c98aa234470c7768125b2c34967a29d2','_mot_principal',1,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_mot']; // doublons

		$t0 .= (
'
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">
<head>
	<title>' .
interdire_scripts(textebrut(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))) .
' - [' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
']</title>
		' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-meta') . ', array(\'id_mot\' => ' . argumenter_squelette($Pile[$SP]['id_mot']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/mot.html\',\'html_c98aa234470c7768125b2c34967a29d2\',\'\',8,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
		' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('styles') . ', array(\'id_mot\' => ' . argumenter_squelette($Pile[$SP]['id_mot']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/mot.html\',\'html_c98aa234470c7768125b2c34967a29d2\',\'\',9,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</head>
<body dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'" class="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
' mot groupe' .
$Pile[$SP]['id_groupe'] .
' mot' .
$Pile[$SP]['id_mot'] .
'">
<div id="page">

<!-- *****************************************************************
	Bandeau, titre du site et menu langue
	Header and main menu (top and right) 
    ************************************************************* -->
	
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bandeau') . ', array(\'id_mot\' => ' . argumenter_squelette($Pile[$SP]['id_mot']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/mot.html\',\'html_c98aa234470c7768125b2c34967a29d2\',\'\',19,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

<!-- *****************************************************************
	Contenu principal (centre)
	Main content (center) 
    ************************************************************* -->
	<div id="bloc-contenu">
		<div class="cartouche">
			' .

((!is_array($l = quete_logo('id_mot', 'ON', $Pile[$SP]['id_mot'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" align=\"right\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')) .
'
			' .
(($t1 = strval(interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))))!=='' ?
		('<h1 class="titre-article">' . $t1 . '</h1>') :
		'') .
'
			<div class="surtitre">' .
_T('public/spip/ecrire:info_dans_groupe') .
' ' .
BOUCLE_meme_groupehtml_c98aa234470c7768125b2c34967a29d2($Cache, $Pile, $doublons, $Numrows, $SP) .
'</div>
			<br />
			<div class="sous-titre">' .
_T('public/spip/ecrire:info_articles_lies_mot') .
'</div>
		</div><!-- cartouche -->
		' .
(($t1 = strval(interdire_scripts(propre($Pile[$SP]['texte'], $connect))))!=='' ?
		((	'<h4 class="">') . $t1 . '</h4>') :
		'') .
'
		' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		('<h6>' . $t1 . '</h6>') :
		'') .
'
		
		<!-- Articles lies au mot-cle -->
		<h1 class="structure">' .
_T('public/spip/ecrire:articles') .
'</h1>
		' .
BOUCLE_articleshtml_c98aa234470c7768125b2c34967a29d2($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	</div><!-- bloc-contenu -->
<!-- *****************************************************************
	Menus contextuels (droite)
	Contextual menus (right) 
    ************************************************************* -->
	<div id="encart">
	
      <!-- Menu de navigation mots-cles : les autres mots cles du meme groupe -->
      ' .
(($t1 = BOUCLE_groupehtml_c98aa234470c7768125b2c34967a29d2($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
      <h2 class="structure">' .
		_T('public/spip/ecrire:mots_clefs_meme_groupe') .
		'</h2>
      <div class="menu">
      <ul>
        <li>
          <b>') . $t1 . (	'</b>
          <span>(' .
		_T('public/spip/ecrire:mots_clefs_meme_groupe') .
		')</span>
          <ul>
            ' .
		BOUCLE_mots_frereshtml_c98aa234470c7768125b2c34967a29d2($Cache, $Pile, $doublons, $Numrows, $SP) .
		'
          </ul>
        </li>
      </ul>
      </div><!-- menu -->
      ')) :
		'') .
'
	
      <!-- Menu de navigation mots-cles : les autres groupes avec un lien sur le premier mot du groupe -->
      ' .
BOUCLE_mots_eclushtml_c98aa234470c7768125b2c34967a29d2($Cache, $Pile, $doublons, $Numrows, $SP) .
'
      ' .
(($t1 = BOUCLE_groupes_frereshtml_c98aa234470c7768125b2c34967a29d2($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
      <h2 class="structure">' .
		_T('public/spip/ecrire:autres_groupes_mots_clefs') .
		'</h2>
      <div class="menu">
      <ul>
        <li><b>' .
		_T('public/spip/ecrire:autres_groupes_mots_clefs') .
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
		
      <!-- Rubriques liees au mot-cle -->
      ' .
(($t1 = BOUCLE_rubriqueshtml_c98aa234470c7768125b2c34967a29d2($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
      <h2 class="structure">' .
		_T('public/spip/ecrire:rubriques') .
		'</h2>
      <div class="menu">
      <ul>
        <li><b>' .
		_T('public/spip/ecrire:info_rubriques_liees_mot') .
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

      <!-- Breves liees au mot-cle -->
      ' .
(($t1 = BOUCLE_breveshtml_c98aa234470c7768125b2c34967a29d2($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
      <h2 class="structure">' .
		_T('public/spip/ecrire:breves') .
		'</h2>
      <div class="menu">
      <ul>
        <li><b>' .
		_T('public/spip/ecrire:info_breves_liees_mot') .
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

      <!-- Sites Web lies au mot-cle -->
      ' .
(($t1 = BOUCLE_siteshtml_c98aa234470c7768125b2c34967a29d2($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
      <div class="menu">
      <h2 class="structure">' .
		_T('public/spip/ecrire:sites_web') .
		'</h2>
      <ul>
        <li><b>' .
		_T('public/spip/ecrire:info_sites_lies_mot') .
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

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-menu') . ', array(\'id_mot\' => ' . argumenter_squelette($Pile[$SP]['id_mot']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/mot.html\',\'html_c98aa234470c7768125b2c34967a29d2\',\'\',150,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bas') . ', array(\'id_mot\' => ' . argumenter_squelette($Pile[$SP]['id_mot']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/mot.html\',\'html_c98aa234470c7768125b2c34967a29d2\',\'\',151,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</div>	<!-- page -->

</body>
</html>
');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/ahuntsic/mot.html
// Temps de compilation total: 29.756 ms
//

function html_c98aa234470c7768125b2c34967a29d2($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = BOUCLE_mot_principalhtml_c98aa234470c7768125b2c34967a29d2($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
' .
	
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('404') . ', array(\'id_mot\' => ' . argumenter_squelette(@$Pile[0]['id_mot']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/mot.html\',\'html_c98aa234470c7768125b2c34967a29d2\',\'\',157,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
'))) .
'
');

	return analyse_resultat_skel('html_c98aa234470c7768125b2c34967a29d2', $Cache, $page, 'plugins/auto/ahuntsic/mot.html');
}
?>