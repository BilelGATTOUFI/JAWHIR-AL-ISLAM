<?php

/*
 * Squelette : ../plugins/auto/socialtags/fonds/cfg_socialtags.html
 * Date :      Mon, 10 Nov 2014 19:41:53 GMT
 * Compile :   Sat, 15 Nov 2014 19:57:50 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/socialtags/fonds/cfg_socialtags.html
// Temps de compilation total: 0.264 ms
//

function html_396396849f40a23d3747218ccabbb535($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!-- titre=' .
_T('socialtags:cfg_titre_socialtags') .
' -->
<!-- descriptif= <h4>' .
_T('socialtags:cfg_titre_boite_info') .
'</h4>
<p>' .
_T('socialtags:cfg_explication_boite_info') .
'</p>
<a href="http://www.spip-contrib.net/Social-tags" class="spip_out">Documentation</a>-->
<!-- logo=prive/themes/spip/images/socialtags-64.png -->
<!-- icone=prive/themes/spip/images/socialtags-24.png -->

<div class="ajax">
' .
executer_balise_dynamique('FORMULAIRE_CONFIGURER_SOCIALTAGS',
	array(),
	array('../plugins/auto/socialtags/fonds/cfg_socialtags.html','html_396396849f40a23d3747218ccabbb535','',9,$GLOBALS['spip_lang'])) .
'
</div>');

	return analyse_resultat_skel('html_396396849f40a23d3747218ccabbb535', $Cache, $page, '../plugins/auto/socialtags/fonds/cfg_socialtags.html');
}
?>