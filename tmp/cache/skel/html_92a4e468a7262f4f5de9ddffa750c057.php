<?php

/*
 * Squelette : ../plugins/auto/palette/prive/style_prive_plugin_palette.html
 * Date :      Sat, 20 Nov 2010 20:10:46 GMT
 * Compile :   Fri, 31 Oct 2014 05:26:06 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/palette/prive/style_prive_plugin_palette.html
// Temps de compilation total: 22.654 ms
//

function html_92a4e468a7262f4f5de9ddffa750c057($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
'<?php header("X-Spip-Cache: 14515200"); ?>'.'<?php header("Cache-Control: max-age=14515200"); ?>'.'<?php header("X-Spip-Statique: oui"); ?>' .
'<'.'?php header("' . 'Content-Type: text/css; charset=iso-8859-15' . '"); ?'.'>' .
'<'.'?php header("' . 'Vary: Accept-Encoding' . '"); ?'.'>' .
vide($Pile['vars']['claire'] = (	'#' .
	interdire_scripts(entites_html(sinon(@$Pile[0]['couleur_claire'],'edf3fe'),true)))) .
vide($Pile['vars']['foncee'] = (	'#' .
	interdire_scripts(entites_html(sinon(@$Pile[0]['couleur_foncee'],'3874b0'),true)))) .
vide($Pile['vars']['left'] = interdire_scripts(choixsiegal(entites_html((@$Pile[0]['ltr']),true),'left','left','right'))) .
vide($Pile['vars']['right'] = interdire_scripts(choixsiegal(entites_html((@$Pile[0]['ltr']),true),'left','right','left'))) .
'.colorpicker {
	border:thin solid ' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';
	background: #fff6f6;
	text-align:center; height:auto; width: 200px;
	position: absolute;
	display: block;
	z-index: 99999009; /* ne PAS modifier */
}
.colorpicker_bar {
	background-color:' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';
	color:white;
	height:16px; font-size: 12px; font-weight:bold; margin: 0; padding: 2px;
	text-align: left;
}
.colorpicker_close {
	float:right;
	font-size: 8px;
	font-weight:bold;
	margin: 2px;
	border:thin solid transparent;
	color:white;
	-moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  border-radius: 2px;
}
.colorpicker_close:hover {
	border:thin outset ' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';
	background:' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';color:black
}
.hover {
	cursor:pointer;
}
#colorpicker {
	display: block;
}');

	return analyse_resultat_skel('html_92a4e468a7262f4f5de9ddffa750c057', $Cache, $page, '../plugins/auto/palette/prive/style_prive_plugin_palette.html');
}
?>