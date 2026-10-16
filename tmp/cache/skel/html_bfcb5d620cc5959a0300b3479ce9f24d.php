<?php

/*
 * Squelette : ../plugins/auto/socialtags/prive/exec/configurer_socialtags.html
 * Date :      Mon, 10 Nov 2014 19:45:02 GMT
 * Compile :   Wed, 27 Jan 2016 20:54:13 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/socialtags/prive/exec/configurer_socialtags.html
// Temps de compilation total: 4.046 ms
//

function html_bfcb5d620cc5959a0300b3479ce9f24d($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
(($t1 = strval(invalideur_session($Cache, (((include_spip("inc/autoriser")&&autoriser('configurer', 'socialtags')?" ":"")) ?' ' :''))))!=='' ?
		($t1 . (	'
<h1 class="grostitre">' .
	_T('socialtags:cfg_titre_socialtags') .
	'</h1>
<p>' .
	_T('socialtags:cfg_titre_boite_info') .
	'</p>
<p>' .
	_T('socialtags:cfg_explication_boite_info') .
	'</p>

<div class="ajax">
	' .
	executer_balise_dynamique('FORMULAIRE_CONFIGURER_SOCIALTAGS',
	array(),
	array('../plugins/auto/socialtags/prive/exec/configurer_socialtags.html','html_bfcb5d620cc5959a0300b3479ce9f24d','',8,$GLOBALS['spip_lang'])) .
	'
</div>
')) :
		''));

	return analyse_resultat_skel('html_bfcb5d620cc5959a0300b3479ce9f24d', $Cache, $page, '../plugins/auto/socialtags/prive/exec/configurer_socialtags.html');
}
?>