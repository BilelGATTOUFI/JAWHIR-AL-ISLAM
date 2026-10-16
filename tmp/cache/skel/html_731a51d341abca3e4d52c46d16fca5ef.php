<?php

/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-bas_cc.html
 * Date :      Mon, 10 Nov 2014 19:36:04 GMT
 * Compile :   Sun, 12 Jun 2016 08:42:22 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-bas_cc.html
// Temps de compilation total: 0.132 ms
//

function html_731a51d341abca3e4d52c46d16fca5ef($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!-- Creative Commons License -->

<p>
<a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" accesskey="8"><img alt="Creative Commons License" style="border: 0;" src="http://i.creativecommons.org/l/by-sa/3.0/88x31.png" /></a> 
</p>');

	return analyse_resultat_skel('html_731a51d341abca3e4d52c46d16fca5ef', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-bas_cc.html');
}
?>