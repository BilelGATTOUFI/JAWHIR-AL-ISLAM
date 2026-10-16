<?php

/*
 * Squelette : ../prive/editer/breve.html
 * Date :      Mon, 10 Nov 2014 19:48:56 GMT
 * Compile :   Thu, 04 Jun 2015 16:30:12 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/editer/breve.html
// Temps de compilation total: 1.501 ms
//

function html_16beb4e873ca257c8101a009ca9c5a56($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class=\'cadre-formulaire-editer\'>
<div class="entete-formulaire">
	' .
(@$Pile[0]['icone_retour']) .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['titre']),true))))!=='' ?
		((	_T('public/spip/ecrire:info_modifier_breve') .
	'
	<h1>') . $t1 . '</h1>') :
		'') .
'
</div>
' .
executer_balise_dynamique('FORMULAIRE_EDITER_BREVE',
	array(interdire_scripts(entites_html((@$Pile[0]['new']),true)),interdire_scripts(entites_html((@$Pile[0]['id_rubrique']),true)),interdire_scripts(entites_html((@$Pile[0]['redirect']),true)),interdire_scripts(entites_html((@$Pile[0]['lier_trad']),true)),interdire_scripts(entites_html((@$Pile[0]['config_fonc']),true))),
	array('../prive/editer/breve.html','html_16beb4e873ca257c8101a009ca9c5a56','',6,$GLOBALS['spip_lang'])) .
'</div>
');

	return analyse_resultat_skel('html_16beb4e873ca257c8101a009ca9c5a56', $Cache, $page, '../prive/editer/breve.html');
}
?>