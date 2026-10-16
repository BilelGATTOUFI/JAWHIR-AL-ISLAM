<?php

/*
 * Squelette : ../prive/stats/echelle.html
 * Date :      Mon, 10 Nov 2014 19:51:50 GMT
 * Compile :   Thu, 04 Dec 2014 12:40:59 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/stats/echelle.html
// Temps de compilation total: 1.360 ms
//

function html_b464314f31a4e5a7d105a98fd59adf33($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class=\'verdana1 spip_x-small\'>
<table cellpadding=\'0\' cellspacing=\'0\' border=\'0\'>
<tr><td style=\'height: 15\' valign=\'top\'>
<span class=\'arial1 spip_x-small\'><b>' .
interdire_scripts(regledetrois(entites_html((@$Pile[0]['echelle']),true),'8','8')) .
'</b></span>
</td></tr>
<tr><td valign=\'middle\'  class=\'arial1 spip_x-small\' style=\'color: #a0a0a0;height: 25px\'>
 ' .
interdire_scripts(regledetrois(entites_html((@$Pile[0]['echelle']),true),'7','8')) .
'</td></tr>
<tr><td style=\'height: 25px\' valign=\'middle\'>
<span class=\'arial1 spip_x-small\'>' .
interdire_scripts(regledetrois(entites_html((@$Pile[0]['echelle']),true),'6','8')) .
'</span>
</td></tr>
<tr><td valign=\'middle\'  class=\'arial1 spip_x-small\' style=\'color: #a0a0a0;height: 25px\'> ' .
interdire_scripts(regledetrois(entites_html((@$Pile[0]['echelle']),true),'5','8')) .
'</td></tr>
<tr><td style=\'height: 25px\' valign=\'middle\'>
<span class=\'arial1 spip_x-small\'><b>' .
interdire_scripts(regledetrois(entites_html((@$Pile[0]['echelle']),true),'4','8')) .
'</b></span>
</td></tr>
<tr><td valign=\'middle\'  class=\'arial1 spip_x-small\' style=\'color: #a0a0a0;height: 25px\'>' .
interdire_scripts(regledetrois(entites_html((@$Pile[0]['echelle']),true),'3','8')) .
'</td></tr>
<tr><td style=\'height: 25px\' valign=\'middle\'>
<span class=\'arial1 spip_x-small\'>' .
interdire_scripts(regledetrois(entites_html((@$Pile[0]['echelle']),true),'2','8')) .
'</span>
</td></tr>
<tr><td valign=\'middle\'  class=\'arial1 spip_x-small\' style=\'color: #a0a0a0;height: 25px\'>' .
interdire_scripts(regledetrois(entites_html((@$Pile[0]['echelle']),true),'1','8')) .
'</td></tr>
<tr><td style=\'height: 10px\' valign=\'bottom\'>
<span class=\'arial1 spip_x-small\'><b>0</b></span>
</td>
</tr>
</table></div>

');

	return analyse_resultat_skel('html_b464314f31a4e5a7d105a98fd59adf33', $Cache, $page, '../prive/stats/echelle.html');
}
?>