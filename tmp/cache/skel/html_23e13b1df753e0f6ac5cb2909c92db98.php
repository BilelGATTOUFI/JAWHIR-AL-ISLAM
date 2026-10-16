<?php

/*
 * Squelette : extensions/filtres_images/favicon.ico.html
 * Date :      Mon, 10 Nov 2014 19:22:02 GMT
 * Compile :   Tue, 11 Nov 2014 12:09:36 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette extensions/filtres_images/favicon.ico.html
// Temps de compilation total: 1.124 ms
//

function html_23e13b1df753e0f6ac5cb2909c92db98($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<'.'?php header("' . 'Content-Type: image/x-icon' . '"); ?'.'>' .
interdire_scripts(spip_file_get_contents(((($a = ((($a = find_in_path('favicon.ico')) OR (!is_array($a) AND strlen($a))) ? $a : extraire_attribut(filtrer('image_graver', filtrer('image_format',filtrer('image_recadre',filtrer('image_passe_partout',
((!is_array($l = quete_logo('id_syndic', 'ON', "'0'",'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'32','32'),'32','32','center'),'ico')),'src'))) OR (!is_array($a) AND strlen($a))) ? $a : interdire_scripts(find_in_path('spip.ico'))))) .
'
');

	return analyse_resultat_skel('html_23e13b1df753e0f6ac5cb2909c92db98', $Cache, $page, 'extensions/filtres_images/favicon.ico.html');
}
?>