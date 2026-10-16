<?php

/*
 * Squelette : plugins/auto/couteau_suisse/fonds/sommaire.html
 * Date :      Tue, 27 Jul 2010 09:37:14 GMT
 * Compile :   Fri, 31 Oct 2014 05:34:22 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette plugins/auto/couteau_suisse/fonds/sommaire.html
// Temps de compilation total: 0.402 ms
//

function html_8c6455a20fcc19a85b837443d0dcacb1($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="cs_sommaire cs_sommaire_' .
interdire_scripts((@$Pile[0]['fond_css'])) .
'_fond" id="outil_sommaire">
  <div class="cs_sommaire_inner">
    <div class="cs_sommaire_titre_' .
interdire_scripts((@$Pile[0]['fond_css'])) .
'_fond">&nbsp; ' .
_T('couteau:sommaire_titre') .
' &nbsp;</div>
    <ul>
      ' .
interdire_scripts((@$Pile[0]['sommaire'])) .
'
    </ul>
  </div>
</div>');

	return analyse_resultat_skel('html_8c6455a20fcc19a85b837443d0dcacb1', $Cache, $page, 'plugins/auto/couteau_suisse/fonds/sommaire.html');
}
?>