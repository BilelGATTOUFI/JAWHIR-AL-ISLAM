<?php

/*
 * Squelette : ../plugins/auto/enluminures_typographiques_v3/fonds/cfg_bte.html
 * Date :      Mon, 10 Nov 2014 19:38:07 GMT
 * Compile :   Sat, 15 Nov 2014 19:57:50 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/enluminures_typographiques_v3/fonds/cfg_bte.html
// Temps de compilation total: 0.489 ms
//

function html_ae6f82c926969157b17defc346ea8419($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!-- titre=Enluminures Typo V3-->
<!-- icone=img_pack/e.gif-->
' .
vide($Pile['vars']['logo'] = (	'<img src=\'' .
	_DIR_RACINE . 'plugins/auto/enluminures_typographiques_v3/fonds' .
	'/../img_pack/moinecopiste.gif\' width=\'59\' height=\'85\' alt=\'Logo Enluminures Typographiques\' style="float:' .
	lang_dir(@$Pile[0]['lang'], 'right','left') .
	';" />
')) .
'
<!-- descriptif=
' .
(is_array($a = ($Pile["vars"])) ? $a['logo'] : "") .
'<h4>Configuration des Enluminures Typographique V3</h4>
-->
' .
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?><div class="ajax">
	' .
executer_balise_dynamique('FORMULAIRE_CONFIGURER_TYPOENLUMINEE',
	array(),
	array('../plugins/auto/enluminures_typographiques_v3/fonds/cfg_bte.html','html_ae6f82c926969157b17defc346ea8419','',8,$GLOBALS['spip_lang'])) .
'
</div>
');

	return analyse_resultat_skel('html_ae6f82c926969157b17defc346ea8419', $Cache, $page, '../plugins/auto/enluminures_typographiques_v3/fonds/cfg_bte.html');
}
?>