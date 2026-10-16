<?php

/*
 * Squelette : squelettes-dist/sitemap.xml.html
 * Date :      Mon, 10 Nov 2014 19:52:47 GMT
 * Compile :   Thu, 04 Dec 2014 12:58:25 GMT
 * Boucles :   _r, _a, _b
 */ 

/* BOUCLE rubriques  */

 function BOUCLE_rhtml_c22794786902f81178192107733487a6(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_r';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.date",
		"rubriques.id_rubrique",
		"rubriques.lang",
		"rubriques.titre");
	static $orderby = array('rubriques.date DESC');
	static $where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''));
	static $join = array();
	static $limit = '0,1000';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/sitemap.xml.html','html_c22794786902f81178192107733487a6','_r',29,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (($t1 = strval(url_absolue(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))))))!=='' ?
		('
<url><loc>' . $t1 . '</loc></url>') :
		'');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_ahtml_c22794786902f81178192107733487a6(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_a';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.date_modif",
		"articles.date",
		"articles.id_article",
		"articles.lang",
		"articles.titre");
	static $orderby = array('articles.date_modif DESC', 'articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())));
	static $join = array();
	static $limit = '0,2000';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/sitemap.xml.html','html_c22794786902f81178192107733487a6','_a',34,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (($t1 = strval(url_absolue(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))))))!=='' ?
		('
<url><loc>' . $t1 . (	'</loc>' .
	(($Pile[$SP]['date_modif'] > (is_array($a = ($Pile["vars"])) ? $a['recent'] : "")) ? (($t3 = strval(date_iso($Pile[$SP]['date_modif'])))!=='' ?
				('<lastmod>' . $t3 . '</lastmod>') :
				''):'') .
	'</url>')) :
		'');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE breves  */

 function BOUCLE_bhtml_c22794786902f81178192107733487a6(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_b';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.date_heure",
		"breves.id_breve",
		"breves.lang",
		"breves.titre");
	static $orderby = array('breves.date_heure DESC');
	static $where = 
			array(
			array('=', 'breves.statut', '\'publie\''));
	static $join = array();
	static $limit = '0,1000';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/sitemap.xml.html','html_c22794786902f81178192107733487a6','_b',39,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (($t1 = strval(url_absolue(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_breve'], 'breve', '', '', true))))))!=='' ?
		('
<url><loc>' . $t1 . '</loc></url>') :
		'');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette squelettes-dist/sitemap.xml.html
// Temps de compilation total: 4.964 ms
//

function html_c22794786902f81178192107733487a6($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
'<'.'?php header("' . 'Content-Type: text/xml; charset=utf-8' . '"); ?'.'><?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">


<url>
	<loc>' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/</loc>
	<changefreq>hourly</changefreq>
</url>


' .
BOUCLE_rhtml_c22794786902f81178192107733487a6($Cache, $Pile, $doublons, $Numrows, $SP) .
'


' .
vide($Pile['vars']['recent'] = date('Y-m-d H:i:s',strtotime('-1 day'))) .
'
' .
BOUCLE_ahtml_c22794786902f81178192107733487a6($Cache, $Pile, $doublons, $Numrows, $SP) .
'


' .
BOUCLE_bhtml_c22794786902f81178192107733487a6($Cache, $Pile, $doublons, $Numrows, $SP) .
'

</urlset>
');

	return analyse_resultat_skel('html_c22794786902f81178192107733487a6', $Cache, $page, 'squelettes-dist/sitemap.xml.html');
}
?>