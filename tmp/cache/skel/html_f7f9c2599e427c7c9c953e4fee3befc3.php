<?php

/*
 * Squelette : ../tmp/couteau-suisse/b9e228d98bde0ce50db0ee2ddb9bdfc4.html
 * Date :      Mon, 08 Aug 2016 09:52:16 GMT
 * Compile :   Tue, 09 Aug 2016 15:44:08 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../tmp/couteau-suisse/b9e228d98bde0ce50db0ee2ddb9bdfc4.html
// Temps de compilation total: 0.080 ms
//

function html_f7f9c2599e427c7c9c953e4fee3befc3($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = interdire_scripts(find_in_path('javascript/jquery.cookie.js'));

	return analyse_resultat_skel('html_f7f9c2599e427c7c9c953e4fee3befc3', $Cache, $page, '../tmp/couteau-suisse/b9e228d98bde0ce50db0ee2ddb9bdfc4.html');
}
?>