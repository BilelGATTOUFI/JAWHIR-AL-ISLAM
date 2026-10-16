<?php

/*
 * Squelette : ../prive/modeles/cfg.html
 * Date :      Mon, 10 Nov 2014 19:51:41 GMT
 * Compile :   Sat, 15 Nov 2014 19:57:50 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/modeles/cfg.html
// Temps de compilation total: 0.574 ms
//

function html_6517183506bcb7ed28fab9fee1ff9a93($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class=\'cfg_link cfg_exec\'>' .
(($t1 = strval(interdire_scripts((tester_url_ecrire(($f = interdire_scripts(@$Pile[0]['script']))) ?generer_url_ecrire($f)  : ""))))!=='' ?
		('<a href="' . $t1 . (	'"><img
	src="' .
	interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
	'/cfg-16.png" width="16" height="16"
	alt="' .
	_T('public/spip/ecrire:icone_configuration_site') .
	' ' .
	interdire_scripts(attribut_html(typo(@$Pile[0]['nom'], "TYPO", $connect))) .
	'"
	title="' .
	_T('public/spip/ecrire:icone_configuration_site') .
	' ' .
	interdire_scripts(attribut_html(typo(@$Pile[0]['nom'], "TYPO", $connect))) .
	'" /></a>')) :
		'') .
'
</div>
');

	return analyse_resultat_skel('html_6517183506bcb7ed28fab9fee1ff9a93', $Cache, $page, '../prive/modeles/cfg.html');
}
?>