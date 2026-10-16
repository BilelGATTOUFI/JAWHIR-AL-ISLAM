<?php

/*
 * Squelette : ../plugins/auto/palette/fonds/cfg_palette.html
 * Date :      Mon, 10 Nov 2014 19:39:57 GMT
 * Compile :   Sat, 15 Nov 2014 19:57:50 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/palette/fonds/cfg_palette.html
// Temps de compilation total: 0.348 ms
//

function html_ffa66344cfb6433521a9d443f6a37376($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?><!-- titre=' .
_T('palette:palette') .
'-->
<!-- icone=images/palette-22.png-->
<!-- logo=images/palette-128.png-->
<!-- descriptif=
' .
propre(_T('palette:config_desc')) .
'
' .
_T('palette:config_exemple') .
'
<p><input class="palette" name="couleur" value="#dfdfdf" style="width:5em" /><br />
&lt;input <strong>class="palette"</strong> name="couleur" value="#dfdfdf" /&gt;</p>

' .
_T('palette:config_lien_doc') .
'
-->

<div class="ajax">
	' .
executer_balise_dynamique('FORMULAIRE_CONFIGURER_PALETTE',
	array(),
	array('../plugins/auto/palette/fonds/cfg_palette.html','html_ffa66344cfb6433521a9d443f6a37376','',15,$GLOBALS['spip_lang'])) .
'
</div>

');

	return analyse_resultat_skel('html_ffa66344cfb6433521a9d443f6a37376', $Cache, $page, '../plugins/auto/palette/fonds/cfg_palette.html');
}
?>