<?php

/*
 * Squelette : plugins/auto/palette/palette.css.html
 * Date :      Sat, 20 Nov 2010 20:08:54 GMT
 * Compile :   Fri, 31 Oct 2014 05:34:01 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette plugins/auto/palette/palette.css.html
// Temps de compilation total: 1.066 ms
//

function html_672a4cf6b58560277dead7bd3d08cd4c($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 14515200"); ?>'.'<?php header("Cache-Control: max-age=14515200"); ?>'.'<?php header("X-Spip-Statique: oui"); ?>' .
'<'.'?php header("' . 'Content-Type: text/css; charset=iso-8859-15' . '"); ?'.'>' .
'<'.'?php header("' . 'Vary: Accept-Encoding' . '"); ?'.'>' .
recuperer_fond( 'prive/style_prive_plugin_palette' , array(), array('compil'=>array('plugins/auto/palette/palette.css.html','html_672a4cf6b58560277dead7bd3d08cd4c','',4,$GLOBALS['spip_lang'])), ''));

	return analyse_resultat_skel('html_672a4cf6b58560277dead7bd3d08cd4c', $Cache, $page, 'plugins/auto/palette/palette.css.html');
}
?>