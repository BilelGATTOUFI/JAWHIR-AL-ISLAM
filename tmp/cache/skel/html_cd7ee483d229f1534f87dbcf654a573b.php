<?php

/*
 * Squelette : squelettes-dist/robots.txt.html
 * Date :      Mon, 10 Nov 2014 19:52:45 GMT
 * Compile :   Thu, 04 Dec 2014 10:07:59 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette squelettes-dist/robots.txt.html
// Temps de compilation total: 1.131 ms
//

function html_cd7ee483d229f1534f87dbcf654a573b($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<'.'?php header("' . (	'Content-Type: text/plain; charset=' .
	interdire_scripts($GLOBALS['meta']['charset'])) . '"); ?'.'># robots.txt
# @url: ' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'
# @generator: SPIP ' .
spip_version() .
'
# @template: squelettes-dist/robots.txt.html

User-agent: *
Disallow: /local/
Disallow: /ecrire/
Disallow: /extensions/
Disallow: /lib/
Disallow: /plugins/
Disallow: /prive/
Disallow: /squelettes-dist/
Disallow: /squelettes/


Sitemap: ' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/sitemap.xml
');

	return analyse_resultat_skel('html_cd7ee483d229f1534f87dbcf654a573b', $Cache, $page, 'squelettes-dist/robots.txt.html');
}
?>