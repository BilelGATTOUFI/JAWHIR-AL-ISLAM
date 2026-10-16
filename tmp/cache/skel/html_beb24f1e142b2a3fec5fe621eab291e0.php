<?php

/*
 * Squelette : plugins/auto/ahuntsic/styles.html
 * Date :      Mon, 10 Nov 2014 19:34:43 GMT
 * Compile :   Sun, 12 Jun 2016 08:42:13 GMT
 * Boucles :   _polices_webfonts
 */ 

/* BOUCLE mots  */

 function BOUCLE_polices_webfontshtml_beb24f1e142b2a3fec5fe621eab291e0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_polices_webfonts';
	static $from = array('mots' => 'spip_mots');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.texte");
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
		 array('plugins/auto/ahuntsic/styles.html','html_beb24f1e142b2a3fec5fe621eab291e0','_polices_webfonts',72,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (($t1 = strval(interdire_scripts($Pile[$SP]['texte'])))!=='' ?
		('
<style type="text/css">
	' . $t1 . '
</style>
') :
		'');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/ahuntsic/styles.html
// Temps de compilation total: 2.318 ms
//

function html_beb24f1e142b2a3fec5fe621eab291e0($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
	' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('spip_style.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="all" />') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('spip_formulaires.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('styles/base.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(find_in_path('styles/alter.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(find_in_path('styles/habillages.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(find_in_path('styles/perso.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(find_in_path('styles/color.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('styles/print.css')))))!=='' ?
		((	'<link rel="stylesheet" href="' .
	htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
	'/') . $t1 . '" type="text/css" media="print" />') :
		'') .
'


' .
insert_head_css().pipeline('insert_head','<!-- insert_head -->'). '<?php header("X-Spip-Filtre: '.'compacte_head' . '"); ?'.'>
' .
(($t1 = strval(interdire_scripts(find_in_path('js/base.js'))))!=='' ?
		((	'<script src="' .
	htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
	'/') . $t1 . '"  type="text/javascript"></script>') :
		'') .
'
' .
(($t1 = strval(interdire_scripts(find_in_path('js/perso.js'))))!=='' ?
		((	'<script src="' .
	htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
	'/') . $t1 . '"  type="text/javascript"></script>') :
		'') .
'
	


<!--[if lte IE 6]>
	<style>
		#menu-rubriques a, #extra a { height: 1em; }
		#menu-rubriques li, #extra li { height: 1em; float: left; clear: both;width: 100%; }
	</style>
<![endif]-->

<!--[if IE]>
	<style>
		body * {zoom:1}
		#menu-principal *,
		#bloc-contenu * {zoom: 0}
		#menu-rubriques li { clear: none;}
	</style>
<![endif]-->

' .
BOUCLE_polices_webfontshtml_beb24f1e142b2a3fec5fe621eab291e0($Cache, $Pile, $doublons, $Numrows, $SP));

	return analyse_resultat_skel('html_beb24f1e142b2a3fec5fe621eab291e0', $Cache, $page, 'plugins/auto/ahuntsic/styles.html');
}
?>