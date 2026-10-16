<?php

/*
 * Squelette : ../plugins/auto/saisies/saisies/oui_non.html
 * Date :      Mon, 10 Nov 2014 19:41:32 GMT
 * Compile :   Sat, 15 Nov 2014 19:57:50 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/saisies/saisies/oui_non.html
// Temps de compilation total: 2.250 ms
//

function html_0d0dbb5466fd5e9f788a72e8a045fb0c($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
vide($Pile['vars']['valeur'] = interdire_scripts((is_null(entites_html(sinon(@$Pile[0]['valeur_forcee'],interdire_scripts(entites_html((@$Pile[0]['valeur']),true))),true)) ? interdire_scripts(entites_html((@$Pile[0]['defaut']),true)):interdire_scripts(entites_html(sinon(@$Pile[0]['valeur_forcee'],interdire_scripts(entites_html((@$Pile[0]['valeur']),true))),true))))) .
'<div class="choix">
	<input type="radio" name="' .
interdire_scripts(entites_html((@$Pile[0]['nom']),true)) .
'" class="radio" id="champ_' .
interdire_scripts(saisie_nom2classe(entites_html((@$Pile[0]['nom']),true))) .
'_oui"' .
((((is_array($a = ($Pile["vars"])) ? $a['valeur'] : "") == interdire_scripts(entites_html(sinon(@$Pile[0]['valeur_oui'],'on'),true))))  ?
		(' ' . ' ' . 'checked="checked"') :
		'') .
' value="' .
interdire_scripts(entites_html(sinon(@$Pile[0]['valeur_oui'],'on'),true)) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['disable']),true))))!=='' ?
		(' disabled="' . $t1 . '"') :
		'') .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['readonly']),true))))!=='' ?
		(' readonly="' . $t1 . '"') :
		'') .
' />
	<label for="champ_' .
interdire_scripts(saisie_nom2classe(entites_html((@$Pile[0]['nom']),true))) .
'_oui">' .
_T('public/spip/ecrire:item_oui') .
'</label>
</div>
<div class="choix">
	<input type="radio" name="' .
interdire_scripts(entites_html((@$Pile[0]['nom']),true)) .
'" class="radio" id="champ_' .
interdire_scripts(saisie_nom2classe(entites_html((@$Pile[0]['nom']),true))) .
'_non"' .
(((((is_array($a = ($Pile["vars"])) ? $a['valeur'] : "") == interdire_scripts(entites_html(sinon(@$Pile[0]['valeur_non'],''),true)))) OR ((((is_array($a = ($Pile["vars"])) ? $a['valeur'] : "")) ?'' :' ')))  ?
		(' ' . ' ' . 'checked="checked"') :
		'') .
' value="' .
interdire_scripts(entites_html(sinon(@$Pile[0]['valeur_non'],''),true)) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['disable']),true))))!=='' ?
		(' disabled="' . $t1 . '"') :
		'') .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['readonly']),true))))!=='' ?
		(' readonly="' . $t1 . '"') :
		'') .
' />
	<label for="champ_' .
interdire_scripts(saisie_nom2classe(entites_html((@$Pile[0]['nom']),true))) .
'_non">' .
_T('public/spip/ecrire:item_non') .
'</label>
</div>
');

	return analyse_resultat_skel('html_0d0dbb5466fd5e9f788a72e8a045fb0c', $Cache, $page, '../plugins/auto/saisies/saisies/oui_non.html');
}
?>