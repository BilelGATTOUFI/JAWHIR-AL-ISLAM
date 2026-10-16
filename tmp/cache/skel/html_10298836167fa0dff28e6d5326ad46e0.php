<?php

/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-menu.html
 * Date :      Mon, 10 Nov 2014 19:36:07 GMT
 * Compile :   Sun, 12 Jun 2016 08:42:22 GMT
 * Boucles :   _RubExclues_sect, _ArtExclus, _art_sommaire, _sousrub_sommaire, _sommaire, _filles, _parents, _hierarchie_courante, _tout, _art_secteur, _sousousrub2, _sousrub2, _secteurs2, _rub_menu
 */ 

/* BOUCLE rubriques  */

 function BOUCLE_RubExclues_secthtml_10298836167fa0dff28e6d5326ad46e0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'rubriques';
	static $id = '_RubExclues_sect';
	static $from = array('rubriques' => 'spip_rubriques','L1' => 'spip_mots_rubriques','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("rubriques.id_rubrique");
	static $select = array("rubriques.id_rubrique");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'L2.titre', "'exclu_menu_rub'"), 
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques')], 'NOT')));
	static $join = array('L1' => array('rubriques','id_rubrique'), 'L2' => array('L1','id_mot'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-menu.html','html_10298836167fa0dff28e6d5326ad46e0','_RubExclues_sect',15,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_rubrique']; // doublons

	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_ArtExclushtml_10298836167fa0dff28e6d5326ad46e0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'articles';
	static $id = '_ArtExclus';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_mots_articles','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("articles.id_article");
	static $select = array("articles.id_article");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'L2.titre', "'exclu_menu_rub'"), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
	static $join = array('L1' => array('articles','id_article'), 'L2' => array('L1','id_mot'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-menu.html','html_10298836167fa0dff28e6d5326ad46e0','_ArtExclus',16,$GLOBALS['spip_lang']));
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

 function BOUCLE_art_sommairehtml_10298836167fa0dff28e6d5326ad46e0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'articles';
	static $id = '_art_sommaire';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("0+articles.titre AS num",
		"articles.titre",
		"articles.id_article",
		"articles.texte",
		"articles.descriptif",
		"articles.chapo",
		"articles.lang");
	static $orderby = array('num', 'articles.titre');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','int')), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-menu.html','html_10298836167fa0dff28e6d5326ad46e0','_art_sommaire',75,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
				<li class="article art' .
$Pile[$SP]['id_article'] .
'">
					<a class="lien' .
interdire_scripts(@$Pile[0]['exposer']) .
' article" href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']) OR chapo_redirigetil($Pile[$SP]['chapo']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], 500, $connect))))))!=='' ?
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



/* BOUCLE rubriques  */

 function BOUCLE_sousrub_sommairehtml_10298836167fa0dff28e6d5326ad46e0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'rubriques';
	static $id = '_sousrub_sommaire';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.texte",
		"rubriques.descriptif",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_rubrique'],'','int')), 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'])), 
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-menu.html','html_10298836167fa0dff28e6d5326ad46e0','_sousrub_sommaire',85,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_rubrique']; // doublons

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
				<li class="rubrique rub' .
$Pile[$SP]['id_rubrique'] .
'">
					<a class="lien' .
interdire_scripts(@$Pile[0]['exposer']) .
'" href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist($Pile[$SP]['descriptif'], $Pile[$SP]['texte'], 600, $connect))))))!=='' ?
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



/* BOUCLE rubriques  */

 function BOUCLE_sommairehtml_10298836167fa0dff28e6d5326ad46e0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'rubriques';
	static $id = '_sommaire';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.id_secteur",
		"rubriques.texte",
		"rubriques.descriptif",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', 0), 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'])), 
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-menu.html','html_10298836167fa0dff28e6d5326ad46e0','_sommaire',69,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_rubrique']; // doublons

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
		<li class="secteur rub' .
$Pile[$SP]['id_secteur'] .
'">
			<a class="lien' .
interdire_scripts(@$Pile[0]['exposer']) .
'" href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist($Pile[$SP]['descriptif'], $Pile[$SP]['texte'], 600, $connect))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</a>
' .
(($t1 = BOUCLE_art_sommairehtml_10298836167fa0dff28e6d5326ad46e0($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		
			<ul>
		') . $t1 . '
			</ul>
') :
		'') .
'
		' .
(($t1 = BOUCLE_sousrub_sommairehtml_10298836167fa0dff28e6d5326ad46e0($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
			<ul>
		' . $t1 . '
			</ul>
		') :
		'') .
'
		</li>
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_filleshtml_10298836167fa0dff28e6d5326ad46e0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'rubriques';
	static $id = '_filles';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_rubrique'],'','int')), 
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques' . 'filles')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-menu.html','html_10298836167fa0dff28e6d5326ad46e0','_filles',18,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_rubrique']; // doublons

	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_parentshtml_10298836167fa0dff28e6d5326ad46e0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'rubriques';
	static $id = '_parents';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_parent'])), 
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques' . 'parents')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-menu.html','html_10298836167fa0dff28e6d5326ad46e0','_parents',22,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_rubrique']; // doublons

	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE hierarchie  */

 function BOUCLE_hierarchie_courantehtml_10298836167fa0dff28e6d5326ad46e0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	if (!($id_rubrique = intval($Pile[$SP]['id_rubrique'])))
		return '';
	$hierarchie = ",$id_rubrique";
	while ($id_rubrique = sql_getfetsel("id_parent","spip_rubriques","id_rubrique=" . $id_rubrique,"","","", "", $connect)) { 
		$hierarchie = ",$id_rubrique$hierarchie";
	}
	if (!$hierarchie) return "";
	$hierarchie = substr($hierarchie,1);
	static $table = 'rubriques';
	static $id = '_hierarchie_courante';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_parent",
		"rubriques.lang",
		"rubriques.titre");
	$orderby = array("FIELD(rubriques.id_rubrique, $hierarchie)");
	$where = 
			array(
			array('IN', 'rubriques.id_rubrique', "($hierarchie)"));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-menu.html','html_10298836167fa0dff28e6d5326ad46e0','_hierarchie_courante',21,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
        ' .
BOUCLE_parentshtml_10298836167fa0dff28e6d5326ad46e0($Cache, $Pile, $doublons, $Numrows, $SP) .
'
   ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_touthtml_10298836167fa0dff28e6d5326ad46e0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'rubriques';
	static $id = '_tout';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique");
	static $orderby = array();
	$where = 
			array(
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques' . 'exclus')] . $doublons[$doublons_index[]= ('rubriques' . 'filles')] . $doublons[$doublons_index[]= ('rubriques' . 'parents')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-menu.html','html_10298836167fa0dff28e6d5326ad46e0','_tout',28,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_rubrique']; // doublons

	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_art_secteurhtml_10298836167fa0dff28e6d5326ad46e0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'articles';
	static $id = '_art_secteur';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("0+articles.titre AS num",
		"articles.titre",
		"articles.id_article",
		"articles.texte",
		"articles.descriptif",
		"articles.chapo",
		"articles.lang");
	static $orderby = array('num', 'articles.titre');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','int')), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-menu.html','html_10298836167fa0dff28e6d5326ad46e0','_art_secteur',38,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
				<li class="article art' .
$Pile[$SP]['id_article'] .
'">
					<a class="lien' .
interdire_scripts(@$Pile[0]['exposer']) .
' article" href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']) OR chapo_redirigetil($Pile[$SP]['chapo']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], 500, $connect))))))!=='' ?
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



/* BOUCLE boucle  */

 function BOUCLE_sousousrub2html_10298836167fa0dff28e6d5326ad46e0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$save_numrows = ($Numrows['_sousrub2']);
	$t0 = (($t1 = BOUCLE_sousrub2html_10298836167fa0dff28e6d5326ad46e0($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
			<ul>
		' . $t1 . '
			</ul>
		') :
		'');
	$Numrows['_sousrub2'] = ($save_numrows);
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_sousrub2html_10298836167fa0dff28e6d5326ad46e0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'rubriques';
	static $id = '_sousrub2';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.texte",
		"rubriques.descriptif",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_rubrique'],'','int')), 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'])), 
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques')] . $doublons[$doublons_index[]= ('rubriques' . 'exclus')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-menu.html','html_10298836167fa0dff28e6d5326ad46e0','_sousrub2',48,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_rubrique']; // doublons

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
				<li class="rubrique rub' .
$Pile[$SP]['id_rubrique'] .
'">
					<a class="lien' .
interdire_scripts(@$Pile[0]['exposer']) .
'" href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist($Pile[$SP]['descriptif'], $Pile[$SP]['texte'], 600, $connect))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</a>
		' .
BOUCLE_sousousrub2html_10298836167fa0dff28e6d5326ad46e0($Cache, $Pile, $doublons, $Numrows, $SP) .
'
				</li>
		');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_secteurs2html_10298836167fa0dff28e6d5326ad46e0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'rubriques';
	static $id = '_secteurs2';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.id_secteur",
		"rubriques.texte",
		"rubriques.descriptif",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', 0), 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'])), 
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-menu.html','html_10298836167fa0dff28e6d5326ad46e0','_secteurs2',35,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_rubrique']; // doublons

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
		<li class="secteur rub' .
$Pile[$SP]['id_secteur'] .
'">
				<a class="lien' .
interdire_scripts(@$Pile[0]['exposer']) .
'" href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist($Pile[$SP]['descriptif'], $Pile[$SP]['texte'], 600, $connect))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</a>
		' .
(($t1 = BOUCLE_art_secteurhtml_10298836167fa0dff28e6d5326ad46e0($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		
			<ul>
		') . $t1 . '
			</ul>
		') :
		'') .
'
		' .
(($t1 = BOUCLE_sousrub2html_10298836167fa0dff28e6d5326ad46e0($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
			<ul>
		' . $t1 . '
			</ul>
		') :
		'') .
'
		</li>
	');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_rub_menuhtml_10298836167fa0dff28e6d5326ad46e0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_rub_menu';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.lang",
		"rubriques.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_rubrique', sql_quote($Pile[0]['id_rubrique'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-menu.html','html_10298836167fa0dff28e6d5326ad46e0','_rub_menu',17,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
' .
BOUCLE_filleshtml_10298836167fa0dff28e6d5326ad46e0($Cache, $Pile, $doublons, $Numrows, $SP) .
'


   ' .
BOUCLE_hierarchie_courantehtml_10298836167fa0dff28e6d5326ad46e0($Cache, $Pile, $doublons, $Numrows, $SP) .
'



' .
BOUCLE_touthtml_10298836167fa0dff28e6d5326ad46e0($Cache, $Pile, $doublons, $Numrows, $SP) .
'



	<h3 class="structure">' .
_T('public/spip/ecrire:rubriques') .
'</h3>
	<ul>
		' .
BOUCLE_secteurs2html_10298836167fa0dff28e6d5326ad46e0($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	</ul>
 ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-menu.html
// Temps de compilation total: 9.310 ms
//

function html_10298836167fa0dff28e6d5326ad46e0($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div id="navigation">
    <h2 class="structure">' .
_T('public/spip/ecrire:navigation') .
'</h2>

' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-menu-principal') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/inc/inc-menu.html\',\'html_10298836167fa0dff28e6d5326ad46e0\',\'\',4,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>


<div class="menu" id="menu-rubriques">
' .
BOUCLE_RubExclues_secthtml_10298836167fa0dff28e6d5326ad46e0($Cache, $Pile, $doublons, $Numrows, $SP) .
'
' .
BOUCLE_ArtExclushtml_10298836167fa0dff28e6d5326ad46e0($Cache, $Pile, $doublons, $Numrows, $SP) .
'
' .
(($t1 = BOUCLE_rub_menuhtml_10298836167fa0dff28e6d5326ad46e0($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'




' .
	(($t2 = BOUCLE_sommairehtml_10298836167fa0dff28e6d5326ad46e0($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			((	'
	<h3 class="structure">' .
			_T('public/spip/ecrire:rubriques') .
			'</h3>
	<ul>
') . $t2 . '
	</ul>
') :
			'') .
	'

'))) .
'

' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-menu-agenda') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/inc/inc-menu.html\',\'html_10298836167fa0dff28e6d5326ad46e0\',\'\',101,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

</div>

</div>
');

	return analyse_resultat_skel('html_10298836167fa0dff28e6d5326ad46e0', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-menu.html');
}
?>