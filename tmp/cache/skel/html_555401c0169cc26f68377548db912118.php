<?php

/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-bas_menu-lang.html
 * Date :      Mon, 10 Nov 2014 19:36:05 GMT
 * Compile :   Sun, 12 Jun 2016 08:42:22 GMT
 * Boucles :   _langues
 */ 

/* BOUCLE rubriques  */

 function BOUCLE_langueshtml_555401c0169cc26f68377548db912118(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_langues';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.lang",
		"rubriques.titre");
	static $orderby = array('rubriques.lang');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', 0), 
			array('NOT', 
			array('=', 'rubriques.lang', sql_quote(interdire_scripts(entites_html((@$Pile[0]['lang']),true))))));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-bas_menu-lang.html','html_555401c0169cc26f68377548db912118','_langues',18,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (($t1 = strval(traduire_nom_langue(unique(htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])))))!=='' ?
		((	'
		<span lang="' .
	htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'" xml:lang="' .
	htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'">| 
		<a href="spip.php?action=converser&amp;var_lang=' .
	htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'&amp;redirect=/" rel="alternate"  title="' .
	_T('public/spip/ecrire:accueil_site') .
	' : ' .
	traduire_nom_langue(htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])) .
	'" dir="' .
	lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
	'">') . $t1 . '</a>
		</span>
') :
		'');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-bas_menu-lang.html
// Temps de compilation total: 1.259 ms
//

function html_555401c0169cc26f68377548db912118($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'

' .
(($t1 = BOUCLE_langueshtml_555401c0169cc26f68377548db912118($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
	<div id="menu-lang">
		<span class="structure">' .
		_T('public/spip/ecrire:info_langues') .
		' : </span>
		' .
		(($t3 = strval(traduire_nom_langue(htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']))))!=='' ?
				('<strong class="langue_contexte">' . $t3 . '</strong>') :
				'') .
		'
') . $t1 . '
	</div>
') :
		'') .
'

');

	return analyse_resultat_skel('html_555401c0169cc26f68377548db912118', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-bas_menu-lang.html');
}
?>