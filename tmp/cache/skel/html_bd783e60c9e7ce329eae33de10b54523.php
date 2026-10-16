<?php

/*
 * Squelette : ../plugins/auto/porte_plume_partout/fonds/cfg_ppp.html
 * Date :      Mon, 10 Nov 2014 19:40:43 GMT
 * Compile :   Sat, 15 Nov 2014 19:57:50 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/porte_plume_partout/fonds/cfg_ppp.html
// Temps de compilation total: 0.891 ms
//

function html_bd783e60c9e7ce329eae33de10b54523($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?><!-- titre=' .
_T('ppp:cfg_titre') .
'-->
<!-- icone=images/configure_toolbars-22.png-->
<!-- logo=images/configure_toolbars-48.png-->
<!-- descriptif=
<p><b>' .
_T('ppp:cfg_attention') .
' : </b>' .
_T('ppp:cfg_description') .
'</p>
-->
<div class="ajax">
' .
executer_balise_dynamique('FORMULAIRE_CONFIGURER_PPP',
	array(),
	array('../plugins/auto/porte_plume_partout/fonds/cfg_ppp.html','html_bd783e60c9e7ce329eae33de10b54523','',9,$GLOBALS['spip_lang'])) .
'
</div>
');

	return analyse_resultat_skel('html_bd783e60c9e7ce329eae33de10b54523', $Cache, $page, '../plugins/auto/porte_plume_partout/fonds/cfg_ppp.html');
}
?>