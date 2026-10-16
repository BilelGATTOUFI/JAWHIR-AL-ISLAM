<?php

/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-bandeau.html
 * Date :      Mon, 10 Nov 2014 19:36:04 GMT
 * Compile :   Sun, 12 Jun 2016 08:42:17 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-bandeau.html
// Temps de compilation total: 537.046 ms
//

function html_f3a84e44584a15dcd7e7871fea6c0704($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!-- L\'entete du site -->
<div id="entete" class="pas_surlignable">
	<a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'" title="' .
_T('public/spip/ecrire:accueil_site') .
' : ' .
interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)) .
'" class="nom-site"><span>' .
interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)) .
'</span></a>


  
</div><!-- entete -->');

	return analyse_resultat_skel('html_f3a84e44584a15dcd7e7871fea6c0704', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-bandeau.html');
}
?>