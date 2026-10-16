<?php

/*
 * Squelette : ../plugins/auto/palette/palette.js.html
 * Date :      Sat, 20 Nov 2010 20:08:54 GMT
 * Compile :   Fri, 31 Oct 2014 05:26:17 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/palette/palette.js.html
// Temps de compilation total: 0.570 ms
//

function html_fb639c5f9cdd1276a79645ede80ae8fb($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 14515200"); ?>' .
'<'.'?php header("' . 'Content-Type: text/javascript' . '"); ?'.'>' .
(($c = find_in_path((	interdire_scripts(eval('return '.'_DIR_LIB_PALETTE'.';')) .
	'farbtastic.js'))) ? spip_file_get_contents($c) : "") .
'
' .
recuperer_fond( 'javascript/palette2.js' , array(), array('compil'=>array('../plugins/auto/palette/palette.js.html','html_fb639c5f9cdd1276a79645ede80ae8fb','',2,$GLOBALS['spip_lang'])), '') .
'
');

	return analyse_resultat_skel('html_fb639c5f9cdd1276a79645ede80ae8fb', $Cache, $page, '../plugins/auto/palette/palette.js.html');
}
?>