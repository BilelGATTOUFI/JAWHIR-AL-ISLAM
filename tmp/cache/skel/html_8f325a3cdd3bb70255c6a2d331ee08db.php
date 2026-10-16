<?php

/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-meta.html
 * Date :      Mon, 10 Nov 2014 19:36:08 GMT
 * Compile :   Sun, 12 Jun 2016 08:42:13 GMT
 * Boucles :   _lien_webfonts, _keywords_recap, _author_recap, _recap_auteursDC, _recap_subjectDC, _keywords_site, _site_head, _keywords_rubrique, _subjectDC_rub, _rubrique_head, _keywords_mot, _mot_head, _keywords_breve, _breve_head, _author, _keywords_article, _auteursDC, _subjectDC, _article_head
 */ 

/* BOUCLE mots  */

 function BOUCLE_lien_webfontshtml_8f325a3cdd3bb70255c6a2d331ee08db(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_lien_webfonts';
	static $from = array('mots' => 'spip_mots');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.descriptif");
	static $orderby = array();
	static $where = 
			array(
			array('=', 'mots.titre', "'polices'"));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-meta.html','html_8f325a3cdd3bb70255c6a2d331ee08db','_lien_webfonts',1,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= interdire_scripts(replace($Pile[$SP]['descriptif'],'&','%26'));
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_keywords_recaphtml_8f325a3cdd3bb70255c6a2d331ee08db(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_keywords_recap';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.titre",
		"rubriques.lang");
	static $orderby = array();
	static $where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', 0));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-meta.html','html_8f325a3cdd3bb70255c6a2d331ee08db','_keywords_recap',55,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t1 = interdire_scripts(attribut_html(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))));
		$t0 .= (($t1 && $t0) ? ',' : '') . $t1;
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE auteurs  */

 function BOUCLE_author_recaphtml_8f325a3cdd3bb70255c6a2d331ee08db(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_author_recap';
	static $from = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_articles','L2' => 'spip_articles');
	static $type = array();
	static $groupby = array("auteurs.id_auteur");
	static $select = array("auteurs.nom");
	static $orderby = array();
	$where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('<=', 'L2.date', sql_quote(quete_date_postdates())), 
			array('=', 'L2.statut', '\'publie\''), 
			array('=', 'auteurs.id_auteur', "1"));
	static $join = array('L1' => array('auteurs','id_auteur'), 'L2' => array('L1','id_article'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-meta.html','html_8f325a3cdd3bb70255c6a2d331ee08db','_author_recap',58,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= interdire_scripts(entites_html(textebrut(typo($Pile[$SP]['nom'], "TYPO", $connect))));
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE auteurs  */

 function BOUCLE_recap_auteursDChtml_8f325a3cdd3bb70255c6a2d331ee08db(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_recap_auteursDC';
	static $from = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_articles','L2' => 'spip_articles');
	static $type = array();
	static $groupby = array("auteurs.id_auteur");
	static $select = array("auteurs.nom");
	static $orderby = array();
	$where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('<=', 'L2.date', sql_quote(quete_date_postdates())), 
			array('=', 'L2.statut', '\'publie\''), 
			array('=', 'auteurs.id_auteur', "1"));
	static $join = array('L1' => array('auteurs','id_auteur'), 'L2' => array('L1','id_article'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-meta.html','html_8f325a3cdd3bb70255c6a2d331ee08db','_recap_auteursDC',63,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
  <meta name="DC.creator" content="' .
interdire_scripts(entites_html(textebrut(typo($Pile[$SP]['nom'], "TYPO", $connect)))) .
'" />');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_recap_subjectDChtml_8f325a3cdd3bb70255c6a2d331ee08db(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_recap_subjectDC';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.titre",
		"rubriques.lang");
	static $orderby = array();
	static $where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', 0));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-meta.html','html_8f325a3cdd3bb70255c6a2d331ee08db','_recap_subjectDC',65,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t1 = interdire_scripts(entites_html(textebrut(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))));
		$t0 .= (($t1 && $t0) ? ',' : '') . $t1;
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE mots  */

 function BOUCLE_keywords_sitehtml_8f325a3cdd3bb70255c6a2d331ee08db(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_keywords_site';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'L1.id_syndic', sql_quote($Pile[$SP]['id_syndic'])));
	static $join = array('L1' => array('mots','id_mot'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-meta.html','html_8f325a3cdd3bb70255c6a2d331ee08db','_keywords_site',52,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t1 = interdire_scripts(entites_html(textebrut(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))));
		$t0 .= (($t1 && $t0) ? ',' : '') . $t1;
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE syndication  */

 function BOUCLE_site_headhtml_8f325a3cdd3bb70255c6a2d331ee08db(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic';
	static $id = '_site_head';
	static $from = array('syndic' => 'spip_syndic','L1' => 'spip_mots_syndic','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("syndic.id_syndic");
	static $select = array("syndic.id_syndic",
		"syndic.descriptif");
	static $orderby = array();
	$where = 
			array(
			array('=', 'syndic.statut', '\'publie\''), 
			array('=', 'syndic.id_syndic', sql_quote($Pile[0]['id_syndic'],'','int')), 
			array('NOT', 
			array('IN', 'syndic.id_syndic', 
			array('SELF', 'syndic.id_syndic', 
			array('REGEXP', 'L2.type', "'^_config'")))));
	static $join = array('L1' => array('syndic','id_syndic'), 'L2' => array('L1','id_mot'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-meta.html','html_8f325a3cdd3bb70255c6a2d331ee08db','_site_head',49,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
  <!-- META site -->
  ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
		('<meta name="Description" content="' . $t1 . '" />') :
		'') .
'
	' .
(($t1 = BOUCLE_keywords_sitehtml_8f325a3cdd3bb70255c6a2d331ee08db($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('<meta name="Keywords" content="' . $t1 . '" />') :
		'') .
'
');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE mots  */

 function BOUCLE_keywords_rubriquehtml_8f325a3cdd3bb70255c6a2d331ee08db(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_keywords_rubrique';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'L1.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'])));
	static $join = array('L1' => array('mots','id_mot'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-meta.html','html_8f325a3cdd3bb70255c6a2d331ee08db','_keywords_rubrique',40,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t1 = interdire_scripts(entites_html(textebrut(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))));
		$t0 .= (($t1 && $t0) ? ',' : '') . $t1;
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE mots  */

 function BOUCLE_subjectDC_rubhtml_8f325a3cdd3bb70255c6a2d331ee08db(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_subjectDC_rub';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'L1.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'])));
	static $join = array('L1' => array('mots','id_mot'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-meta.html','html_8f325a3cdd3bb70255c6a2d331ee08db','_subjectDC_rub',46,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t1 = interdire_scripts(entites_html(textebrut(supprimer_numero(typo($Pile[$SP]['titre'])))));
		$t0 .= (($t1 && $t0) ? '; ' : '') . $t1;
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_rubrique_headhtml_8f325a3cdd3bb70255c6a2d331ee08db(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_rubrique_head';
	static $from = array('rubriques' => 'spip_rubriques','L1' => 'spip_mots_rubriques','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("rubriques.id_rubrique");
	static $select = array("rubriques.id_rubrique",
		"rubriques.descriptif",
		"rubriques.titre",
		"rubriques.lang",
		"rubriques.texte",
		"rubriques.date");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_rubrique', sql_quote($Pile[0]['id_rubrique'],'','int')), 
			array('NOT', 
			array('IN', 'rubriques.id_rubrique', 
			array('SELF', 'rubriques.id_rubrique', 
			array('REGEXP', 'L2.type', "'^_config'")))));
	static $join = array('L1' => array('rubriques','id_rubrique'), 'L2' => array('L1','id_mot'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-meta.html','html_8f325a3cdd3bb70255c6a2d331ee08db','_rubrique_head',37,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	<!-- META rubrique - META section -->
	' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
		('<meta name="Description" content="' . $t1 . '" />') :
		'') .
'
	' .
(($t1 = BOUCLE_keywords_rubriquehtml_8f325a3cdd3bb70255c6a2d331ee08db($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('<meta name="Keywords" content="' . $t1 . '" />') :
		'') .
'
  <!-- META Dublin Core - voir: http://uk.dublincore.org/documents/dcq-html/  -->
  ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))))))!=='' ?
		('<meta name="DC.title" content="' . $t1 . '" />
  ') :
		'') .
(($t1 = strval(htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
		('<meta name="DC.language" scheme="ISO639-1" content="' . $t1 . '" />
  ') :
		'') .
(($t1 = strval(htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.'))))!=='' ?
		('<meta name="DC.identifier" scheme="DCTERMS.URI" content="' . $t1 . '/') :
		'') .
(($t1 = strval(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true)))))!=='' ?
		($t1 . '" />
  ') :
		'') .
(($t1 = strval(htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.'))))!=='' ?
		('<meta name="DC.source" scheme="DCTERMS.URI" content="' . $t1 . '" />
  ') :
		'') .
(($t1 = strval(interdire_scripts(attribut_html(entites_html(textebrut(filtre_introduction_dist($Pile[$SP]['descriptif'], $Pile[$SP]['texte'], 600, $connect)))))))!=='' ?
		('<meta name="DC.description" content="' . $t1 . '" />') :
		'') .
(($t1 = BOUCLE_subjectDC_rubhtml_8f325a3cdd3bb70255c6a2d331ee08db($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
  <meta name="DC.subject" content="' . $t1 . '" />') :
		'') .
(($t1 = strval(interdire_scripts(date_iso(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('
  <meta name="DC.date" scheme="ISO8601" content="' . $t1 . '" />') :
		'') .
'
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE mots  */

 function BOUCLE_keywords_mothtml_8f325a3cdd3bb70255c6a2d331ee08db(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_keywords_mot';
	static $from = array('mots' => 'spip_mots');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'mots.id_mot', sql_quote($Pile[$SP]['id_mot'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-meta.html','html_8f325a3cdd3bb70255c6a2d331ee08db','_keywords_mot',36,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t1 = interdire_scripts(entites_html(textebrut(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))));
		$t0 .= (($t1 && $t0) ? ',' : '') . $t1;
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE mots  */

 function BOUCLE_mot_headhtml_8f325a3cdd3bb70255c6a2d331ee08db(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_mot_head';
	static $from = array('mots' => 'spip_mots');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.id_mot",
		"mots.descriptif");
	static $orderby = array();
	$where = 
			array(
			array('=', 'mots.id_mot', sql_quote($Pile[0]['id_mot'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-meta.html','html_8f325a3cdd3bb70255c6a2d331ee08db','_mot_head',32,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'

	<!-- META mot-cle - META keyword -->
	' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
		('<meta name="Description" content="' . $t1 . '" />') :
		'') .
'
	' .
(($t1 = BOUCLE_keywords_mothtml_8f325a3cdd3bb70255c6a2d331ee08db($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('<meta name="Keywords" content="' . $t1 . '" />') :
		'') .
'
');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE mots  */

 function BOUCLE_keywords_brevehtml_8f325a3cdd3bb70255c6a2d331ee08db(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_keywords_breve';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'L1.id_breve', sql_quote($Pile[$SP]['id_breve'])));
	static $join = array('L1' => array('mots','id_mot'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-meta.html','html_8f325a3cdd3bb70255c6a2d331ee08db','_keywords_breve',31,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t1 = interdire_scripts(entites_html(textebrut(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))));
		$t0 .= (($t1 && $t0) ? ',' : '') . $t1;
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE breves  */

 function BOUCLE_breve_headhtml_8f325a3cdd3bb70255c6a2d331ee08db(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_breve_head';
	static $from = array('breves' => 'spip_breves','L1' => 'spip_mots_breves','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("breves.id_breve");
	static $select = array("breves.id_breve",
		"breves.titre",
		"breves.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'breves.statut', '\'publie\''), 
			array('=', 'breves.id_breve', sql_quote($Pile[0]['id_breve'],'','int')), 
			array('NOT', 
			array('IN', 'breves.id_breve', 
			array('SELF', 'breves.id_breve', 
			array('REGEXP', 'L2.type', "'^_config'")))));
	static $join = array('L1' => array('breves','id_breve'), 'L2' => array('L1','id_mot'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-meta.html','html_8f325a3cdd3bb70255c6a2d331ee08db','_breve_head',28,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	<!-- META breve - META news item -->
	' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))))))!=='' ?
		('<meta name="Description" content="' . $t1 . '" />') :
		'') .
'
	' .
(($t1 = BOUCLE_keywords_brevehtml_8f325a3cdd3bb70255c6a2d331ee08db($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('<meta name="Keywords" content="' . $t1 . '" />') :
		'') .
'
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE auteurs  */

 function BOUCLE_authorhtml_8f325a3cdd3bb70255c6a2d331ee08db(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_author';
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
		 array('plugins/auto/ahuntsic/inc/inc-meta.html','html_8f325a3cdd3bb70255c6a2d331ee08db','_author',16,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t1 = interdire_scripts(entites_html(textebrut(typo($Pile[$SP]['nom'], "TYPO", $connect))));
		$t0 .= (($t1 && $t0) ? ', ' : '') . $t1;
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE mots  */

 function BOUCLE_keywords_articlehtml_8f325a3cdd3bb70255c6a2d331ee08db(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_keywords_article';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'L1.id_article', sql_quote($Pile[$SP]['id_article'])));
	static $join = array('L1' => array('mots','id_mot'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-meta.html','html_8f325a3cdd3bb70255c6a2d331ee08db','_keywords_article',17,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t1 = interdire_scripts(entites_html(textebrut(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))));
		$t0 .= (($t1 && $t0) ? ', ' : '') . $t1;
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE auteurs  */

 function BOUCLE_auteursDChtml_8f325a3cdd3bb70255c6a2d331ee08db(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_auteursDC';
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
		 array('plugins/auto/ahuntsic/inc/inc-meta.html','html_8f325a3cdd3bb70255c6a2d331ee08db','_auteursDC',22,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t1 = (
'
  <meta name="DC.creator" content="' .
interdire_scripts(entites_html(textebrut(typo($Pile[$SP]['nom'], "TYPO", $connect)))) .
'" />');
		$t0 .= (($t1 && $t0) ? ' ' : '') . $t1;
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE mots  */

 function BOUCLE_subjectDChtml_8f325a3cdd3bb70255c6a2d331ee08db(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_subjectDC';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'L1.id_article', sql_quote($Pile[$SP]['id_article'])));
	static $join = array('L1' => array('mots','id_mot'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-meta.html','html_8f325a3cdd3bb70255c6a2d331ee08db','_subjectDC',24,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t1 = interdire_scripts(entites_html(textebrut(supprimer_numero(typo($Pile[$SP]['titre'])))));
		$t0 .= (($t1 && $t0) ? '; ' : '') . $t1;
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_article_headhtml_8f325a3cdd3bb70255c6a2d331ee08db(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_article_head';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_mots_articles','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("articles.id_article");
	static $select = array("articles.id_article",
		"articles.texte",
		"articles.descriptif",
		"articles.chapo",
		"articles.titre",
		"articles.lang",
		"articles.date");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_article', sql_quote($Pile[0]['id_article'],'','int')), 
			array('NOT', 
			array('IN', 'articles.id_article', 
			array('SELF', 'articles.id_article', 
			array('REGEXP', 'L2.type', "'^_config'")))));
	static $join = array('L1' => array('articles','id_article'), 'L2' => array('L1','id_mot'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-meta.html','html_8f325a3cdd3bb70255c6a2d331ee08db','_article_head',13,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
  <!-- META article -->
  ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']) OR chapo_redirigetil($Pile[$SP]['chapo']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], 500, $connect))))))!=='' ?
		('<meta name="Description" content="' . $t1 . '" />') :
		'') .
'
' .
(($t1 = BOUCLE_authorhtml_8f325a3cdd3bb70255c6a2d331ee08db($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('  <meta name="Author" content="' . $t1 . '" />') :
		'') .
'
' .
(($t1 = BOUCLE_keywords_articlehtml_8f325a3cdd3bb70255c6a2d331ee08db($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('  <meta name="Keywords" content="' . $t1 . '" />') :
		'') .
'
  <!-- META Dublin Core - voir: http://uk.dublincore.org/documents/dcq-html/  -->
  ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))))))!=='' ?
		('<meta name="DC.title" content="' . $t1 . '" />
  ') :
		'') .
(($t1 = strval(htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
		('<meta name="DC.language" scheme="ISO639-1" content="' . $t1 . '" />
  ') :
		'') .
(($t1 = strval(htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.'))))!=='' ?
		('<meta name="DC.identifier" scheme="DCTERMS.URI" content="' . $t1 . '/') :
		'') .
(($t1 = strval(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true)))))!=='' ?
		($t1 . '" />
  ') :
		'') .
(($t1 = strval(htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.'))))!=='' ?
		('<meta name="DC.source" scheme="DCTERMS.URI" content="' . $t1 . '" />') :
		'') .
BOUCLE_auteursDChtml_8f325a3cdd3bb70255c6a2d331ee08db($Cache, $Pile, $doublons, $Numrows, $SP) .
(($t1 = strval(interdire_scripts(attribut_html(entites_html(textebrut(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']) OR chapo_redirigetil($Pile[$SP]['chapo']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], 500, $connect)))))))!=='' ?
		('
  <meta name="DC.description" content="' . $t1 . '" />') :
		'') .
(($t1 = BOUCLE_subjectDChtml_8f325a3cdd3bb70255c6a2d331ee08db($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
  <meta name="DC.subject" content="' . $t1 . '" />') :
		'') .
(($t1 = strval(interdire_scripts(date_iso(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('
  <meta name="DC.date" scheme="ISO8601" content="' . $t1 . '" />') :
		'') .
'
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-meta.html
// Temps de compilation total: 71.095 ms
//

function html_8f325a3cdd3bb70255c6a2d331ee08db($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_lien_webfontshtml_8f325a3cdd3bb70255c6a2d331ee08db($Cache, $Pile, $doublons, $Numrows, $SP) .
'

<!-- META DATA -->
	<meta http-equiv="Content-Type" content="text/html; charset=' .
interdire_scripts($GLOBALS['meta']['charset']) .
'" />
	<meta http-equiv="Content-language" content="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" />
	<meta name="language" content="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<meta name="generator" content="SPIP' .
(($t1 = strval(spip_version()))!=='' ?
		(' ' . $t1) :
		'') .
'" />
	<meta name="robots" content="index,follow" />
	<link rel="schema.DCTERMS"  href="http://purl.org/dc/terms/" />
	<link rel="schema.DC"       href="http://purl.org/dc/elements/1.1/" />
' .
(($t1 = BOUCLE_article_headhtml_8f325a3cdd3bb70255c6a2d331ee08db($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
' .
	(($t2 = BOUCLE_breve_headhtml_8f325a3cdd3bb70255c6a2d331ee08db($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			$t2 :
			((($t3 = BOUCLE_mot_headhtml_8f325a3cdd3bb70255c6a2d331ee08db($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
				$t3 :
				((($t4 = BOUCLE_rubrique_headhtml_8f325a3cdd3bb70255c6a2d331ee08db($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
					$t4 :
					((($t5 = BOUCLE_site_headhtml_8f325a3cdd3bb70255c6a2d331ee08db($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
						$t5 :
						((	'  
	<!-- META pages recapitulatives - META summary pages -->
' .
					(($t6 = BOUCLE_keywords_recaphtml_8f325a3cdd3bb70255c6a2d331ee08db($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
							('
  <meta name="keywords" content="' . $t6 . '" />') :
							'') .
					'
  ' .
					(($t6 = strval(interdire_scripts(attribut_html(propre($GLOBALS['meta']['descriptif_site'], $connect)))))!=='' ?
							('<meta name="description" content="' . $t6 . '" />') :
							'') .
					'
  <meta name="author" content="' .
					BOUCLE_author_recaphtml_8f325a3cdd3bb70255c6a2d331ee08db($Cache, $Pile, $doublons, $Numrows, $SP) .
					'" />
  <!-- META Dublin Core - voir: http://uk.dublincore.org/documents/dcq-html/  -->
  ' .
					(($t6 = strval(interdire_scripts(entites_html(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))))))!=='' ?
							('<meta name="DC.title" content="' . $t6 . '" />
  ') :
							'') .
					(($t6 = strval(htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
							('<meta name="DC.language" scheme="ISO639-1" content="' . $t6 . '" />
  ') :
							'') .
					(($t6 = strval(htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.'))))!=='' ?
							('<meta name="DC.identifier" scheme="DCTERMS.URI" content="' . $t6 . '" />
  ') :
							'') .
					(($t6 = strval(htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.'))))!=='' ?
							('<meta name="DC.source" scheme="DCTERMS.URI" content="' . $t6 . '" />') :
							'') .
					BOUCLE_recap_auteursDChtml_8f325a3cdd3bb70255c6a2d331ee08db($Cache, $Pile, $doublons, $Numrows, $SP) .
					(($t6 = strval(interdire_scripts(attribut_html(couper(propre($GLOBALS['meta']['descriptif_site'], $connect),'150')))))!=='' ?
							('
  <meta name="DC.description" content="' . $t6 . '" />') :
							'') .
					(($t6 = BOUCLE_recap_subjectDChtml_8f325a3cdd3bb70255c6a2d331ee08db($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
							('
  <meta name="DC.subject" content="' . $t6 . '" />') :
							'') .
					(($t6 = strval(interdire_scripts(date_iso(normaliser_date(@$Pile[0]['date'])))))!=='' ?
							('
  <meta name="DC.date" scheme="ISO8601" content="' . $t6 . '" />') :
							'') .
					'

')))))))))))) .
'

' .
(($t1 = strval(interdire_scripts(((($a = extraire_attribut(filtrer('image_graver', filtrer('image_format',filtrer('image_recadre',filtrer('image_passe_partout',((($a = ((($a = (@$Pile[0]['favicon'])) OR (!is_array($a) AND strlen($a))) ? $a : interdire_scripts(find_in_path('favicon.ico')))) OR (!is_array($a) AND strlen($a))) ? $a : 
((!is_array($l = quete_logo('id_syndic', 'ON', "'0'",'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />'))),'32','32'),'32','32','center'),'ico')),'src')) OR (!is_array($a) AND strlen($a))) ? $a : interdire_scripts(find_in_path('spip.ico'))))))!=='' ?
		('  <link rel="shortcut icon" href="' . $t1 . '" type="image/x-icon" />') :
		'') .
'

' .
(($t1 = strval(interdire_scripts(generer_url_public('backend'))))!=='' ?
		((	'  <link rel="alternate" type="application/rss+xml" title="' .
	_T('public/spip/ecrire:syndiquer_site') .
	' : ' .
	interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
	'" href="') . $t1 . '" />') :
		'') .
'

');

	return analyse_resultat_skel('html_8f325a3cdd3bb70255c6a2d331ee08db', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-meta.html');
}
?>