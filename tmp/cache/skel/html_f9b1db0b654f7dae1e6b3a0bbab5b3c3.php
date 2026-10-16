<?php

/*
 * Squelette : ../squelettes-dist/nouveautes.html
 * Date :      Mon, 10 Nov 2014 19:52:42 GMT
 * Compile :   Sun, 30 Nov 2014 19:03:48 GMT
 * Boucles :   _nv1, _nv2, _test_contenu
 */ 

/* BOUCLE articles  */

 function BOUCLE_nv1html_f9b1db0b654f7dae1e6b3a0bbab5b3c3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_nv1';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.date",
		"articles.titre",
		"articles.id_article",
		"articles.texte",
		"articles.descriptif",
		"articles.chapo",
		"articles.lang");
	static $orderby = array('articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('<=', 'LEAST((UNIX_TIMESTAMP("' . normaliser_date(@$Pile[0]['date']) . '")-UNIX_TIMESTAMP(articles.date))/86400,
	TO_DAYS("' . normaliser_date(@$Pile[0]['date']) . '")-TO_DAYS(articles.date),
	DAYOFMONTH("' . normaliser_date(@$Pile[0]['date']) . '")-DAYOFMONTH(articles.date)+30.4368*(MONTH("' . normaliser_date(@$Pile[0]['date']) . '")-MONTH(articles.date))+365.2422*(YEAR("' . normaliser_date(@$Pile[0]['date']) . '")-YEAR(articles.date)))', "0"));
	static $join = array();
	static $limit = '0,30';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../squelettes-dist/nouveautes.html','html_f9b1db0b654f7dae1e6b3a0bbab5b3c3','_nv1',8,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
' .
(($t1 = strval(interdire_scripts(textebrut(supprimer_numero(typo($Pile[$SP]['titre']))))))!=='' ?
		('** ' . $t1 . ' **') :
		'') .
'
' .
(($t1 = strval(textebrut(recuperer_fond('modeles/lesauteurs', array('id_article' => $Pile[$SP]['id_article']), array('trim'=>true, 'compil'=>array('../squelettes-dist/nouveautes.html','html_f9b1db0b654f7dae1e6b3a0bbab5b3c3','_nv1',15,$GLOBALS['spip_lang'])), ''))))!=='' ?
		((	_T('public/spip/ecrire:par_auteur') .
	' ') . $t1) :
		'') .
'
' .
(($t1 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('- ' . $t1) :
		'') .
'
' .
(($t1 = strval(interdire_scripts(textebrut(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']) OR chapo_redirigetil($Pile[$SP]['chapo']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], 500, $connect)))))!=='' ?
		('
' . $t1 . '
') :
		'') .
'
-> ' .
url_absolue(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true)))) .
'

');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE breves  */

 function BOUCLE_nv2html_f9b1db0b654f7dae1e6b3a0bbab5b3c3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_nv2';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.date_heure",
		"breves.titre",
		"breves.date_heure AS date",
		"breves.texte",
		"breves.id_breve",
		"breves.lang");
	static $orderby = array('breves.date_heure DESC');
	$where = 
			array(
			array('=', 'breves.statut', '\'publie\''), 
			array('<=', 'LEAST((UNIX_TIMESTAMP("' . normaliser_date(@$Pile[0]['date']) . '")-UNIX_TIMESTAMP(breves.date_heure))/86400,
	TO_DAYS("' . normaliser_date(@$Pile[0]['date']) . '")-TO_DAYS(breves.date_heure),
	DAYOFMONTH("' . normaliser_date(@$Pile[0]['date']) . '")-DAYOFMONTH(breves.date_heure)+30.4368*(MONTH("' . normaliser_date(@$Pile[0]['date']) . '")-MONTH(breves.date_heure))+365.2422*(YEAR("' . normaliser_date(@$Pile[0]['date']) . '")-YEAR(breves.date_heure)))', "0"));
	static $join = array();
	static $limit = '0,30';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../squelettes-dist/nouveautes.html','html_f9b1db0b654f7dae1e6b3a0bbab5b3c3','_nv2',22,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
' .
(($t1 = strval(interdire_scripts(textebrut(supprimer_numero(typo($Pile[$SP]['titre']))))))!=='' ?
		('* ' . $t1 . ' *') :
		'') .
'
' .
(($t1 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		(' - ' . $t1) :
		'') .
'
' .
(($t1 = strval(interdire_scripts(textebrut(filtre_introduction_dist('', $Pile[$SP]['texte'], 300, $connect)))))!=='' ?
		('
' . $t1 . '
') :
		'') .
'
-> ' .
url_absolue(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_breve'], 'breve', '', '', true)))) .
'

');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE auteurs  */

 function BOUCLE_test_contenuhtml_f9b1db0b654f7dae1e6b3a0bbab5b3c3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_test_contenu';
	static $from = array('auteurs' => 'spip_auteurs');
	static $type = array();
	static $groupby = array();
	static $select = array("1");
	static $orderby = array();
	static $where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''));
	static $join = array();
	static $limit = '0,1';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../squelettes-dist/nouveautes.html','html_f9b1db0b654f7dae1e6b3a0bbab5b3c3','_test_contenu',1,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('public/spip/ecrire:nouveaux_articles');
	$l2 = _T('public/spip/ecrire:nouvelles_breves');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
(($t1 = BOUCLE_nv1html_f9b1db0b654f7dae1e6b3a0bbab5b3c3($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'

          ' .
		$l1 .
		'
          --------------------------

') . $t1) :
		'') .
(($t1 = BOUCLE_nv2html_f9b1db0b654f7dae1e6b3a0bbab5b3c3($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'

          ' .
		$l2 .
		'
          --------------------------

') . $t1) :
		''));
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette ../squelettes-dist/nouveautes.html
// Temps de compilation total: 23.203 ms
//

function html_f9b1db0b654f7dae1e6b3a0bbab5b3c3($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (($t1 = BOUCLE_test_contenuhtml_f9b1db0b654f7dae1e6b3a0bbab5b3c3($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'[' .
		interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
		'] ' .
		_T('public/spip/ecrire:nouveautes') .
		'


' .
		_T('public/spip/ecrire:bonjour') .
		'

' .
		_T('public/spip/ecrire:texte_lettre_information') .
		' "' .
		interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
		'" (' .
		htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
		').
' .
		_T('public/spip/ecrire:texte_lettre_information_2') .
		' ' .
		interdire_scripts(entites_html((@$Pile[0]['jours_neuf']),true)) .
		' ' .
		_T('public/spip/ecrire:jours') .
		'.
') . $t1 . '

') :
		'');

	return analyse_resultat_skel('html_f9b1db0b654f7dae1e6b3a0bbab5b3c3', $Cache, $page, '../squelettes-dist/nouveautes.html');
}
?>