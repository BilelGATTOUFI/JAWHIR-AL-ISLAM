<?php

/*
 * Squelette : ../plugins/auto/spip-bonux/prive/style_prive_plugin_bonux_recherche.html
 * Date :      Mon, 08 Nov 2010 17:00:06 GMT
 * Compile :   Fri, 31 Oct 2014 05:26:06 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/spip-bonux/prive/style_prive_plugin_bonux_recherche.html
// Temps de compilation total: 1.715 ms
//

function html_948f7048d64d6a25434c2dcaa5792acc($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
'<?php header("X-Spip-Cache: 360000"); ?>'.'<?php header("Cache-Control: max-age=360000"); ?>'.'<?php header("X-Spip-Statique: oui"); ?>' .
'<'.'?php header("' . 'Content-Type: text/css; charset=iso-8859-15' . '"); ?'.'>' .
'<'.'?php header("' . 'Vary: Accept-Encoding' . '"); ?'.'>' .
vide($Pile['vars']['claire'] = (	'#' .
	interdire_scripts(entites_html(sinon(@$Pile[0]['couleur_claire'],'edf3fe'),true)))) .
vide($Pile['vars']['foncee'] = (	'#' .
	interdire_scripts(entites_html(sinon(@$Pile[0]['couleur_foncee'],'3874b0'),true)))) .
vide($Pile['vars']['left'] = interdire_scripts(choixsiegal(entites_html((@$Pile[0]['ltr']),true),'left','left','right'))) .
vide($Pile['vars']['right'] = interdire_scripts(choixsiegal(entites_html((@$Pile[0]['ltr']),true),'left','right','left'))) .
'/* formulaire_recherche_ecrire */

.formulaire_recherche { margin: 0; padding: 0; background: none; text-align:' .
(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
';border:0; }
.formulaire_recherche * { display: inline; vertical-align: middle; }
.formulaire_recherche label {display:none;}
.formulaire_recherche input.text { width: 17em;color:#fff;border:1px solid #fff;background:' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';padding:3px;}
.formulaire_recherche input.image {}
.formulaire_recherche img {padding:0 0 3px;}');

	return analyse_resultat_skel('html_948f7048d64d6a25434c2dcaa5792acc', $Cache, $page, '../plugins/auto/spip-bonux/prive/style_prive_plugin_bonux_recherche.html');
}
?>