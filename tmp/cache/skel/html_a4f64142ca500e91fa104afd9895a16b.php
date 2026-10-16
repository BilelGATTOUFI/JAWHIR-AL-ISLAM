<?php

/*
 * Squelette : ../plugins/auto/porte_plume_partout/barre_generalisee.js.html
 * Date :      Tue, 27 Jul 2010 09:42:40 GMT
 * Compile :   Fri, 31 Oct 2014 05:26:17 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/porte_plume_partout/barre_generalisee.js.html
// Temps de compilation total: 0.999 ms
//

function html_a4f64142ca500e91fa104afd9895a16b($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<'.'?php header("' . (	'Content-Type: text/javascript; charset=' .
	interdire_scripts($GLOBALS['meta']['charset'])) . '"); ?'.'>' .
'(function($){
$(document).ready(function(){
	function addbarre(){
	$(\'.formulaire_spip\').not(\'.formulaire_spip_compact\')
		.find(\'' .
(($t1 = strval(interdire_scripts(((lire_config('ppp/ps_ppp','on',false)) ?' ' :''))))!=='' ?
		($t1 . '.editer_ps,') :
		'') .
(($t1 = strval(interdire_scripts(((lire_config('ppp/descriptif_ppp','on',false)) ?' ' :''))))!=='' ?
		($t1 . '.editer_descriptif,') :
		'') .
(($t1 = strval(interdire_scripts(((lire_config('ppp/chapo_ppp','on',false)) ?' ' :''))))!=='' ?
		($t1 . '.editer_chapo,') :
		'') .
(($t1 = strval(interdire_scripts(((lire_config('ppp/auteurs_quietesvous_ppp','on',false)) ?' ' :''))))!=='' ?
		($t1 . '.editer_bio') :
		'') .
'\')
		.find(\'textarea\')
		.barre_outils(\'edition\');
	' .
(($t1 = strval(interdire_scripts(((lire_config('ppp/configuration_description_ppp','on',false)) ?' ' :''))))!=='' ?
		($t1 . '$(\'#descriptif_site\')
		.barre_outils(\'edition\');') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(((lire_config('ppp/hauteurtexte_ppp','on',false)) ?' ' :''))))!=='' ?
		($t1 . '$(\'#text_area\').height(($(window).height()/2.2)+\'px\');') :
		'') .
'
   $(\'textarea[class~=porte_plume_partout]\').barre_outils(\'edition\');
	}
	addbarre();
	onAjaxLoad(addbarre);
});
})(jQuery);
');

	return analyse_resultat_skel('html_a4f64142ca500e91fa104afd9895a16b', $Cache, $page, '../plugins/auto/porte_plume_partout/barre_generalisee.js.html');
}
?>