<?php

/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-affvisit.html
 * Date :      Mon, 10 Nov 2014 19:36:03 GMT
 * Compile :   Sun, 12 Jun 2016 08:42:22 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-affvisit.html
// Temps de compilation total: 0.046 ms
//

function html_47dd913a830fbbde3cb5f0e6823f6f05($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = '<?php
$query = "SELECT SUM(visites) AS total_absolu FROM spip_visites";
	$result = spip_query($query);

	if ($row = spip_fetch_array($result)) {
		$total_absolu = $row[\'total_absolu\'];
	}


$query = "SELECT visites FROM spip_visites WHERE date=NOW()";
		$result = spip_query($query);
	
	if ($row = @spip_fetch_array($result)) {
		$visites_today = $row[\'visites\'];
}

$total_gen = $total_absolu + $visites_today;

echo "<strong>".$total_gen."</strong>";

?>';

	return analyse_resultat_skel('html_47dd913a830fbbde3cb5f0e6823f6f05', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-affvisit.html');
}
?>