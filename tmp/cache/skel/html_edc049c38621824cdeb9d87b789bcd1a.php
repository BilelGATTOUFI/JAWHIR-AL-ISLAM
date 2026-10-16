<?php

/*
 * Squelette : ../prive/editer/mot.html
 * Date :      Mon, 10 Nov 2014 19:48:58 GMT
 * Compile :   Wed, 27 Jan 2016 20:49:29 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/editer/mot.html
// Temps de compilation total: 2.906 ms
//

function html_edc049c38621824cdeb9d87b789bcd1a($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class=\'cadre-formulaire-editer\'>
<div class="entete-formulaire">
	' .
(@$Pile[0]['icone_retour']) .
(($t1 = strval(interdire_scripts(entites_html(sinon(@$Pile[0]['titre'],_T('public/spip/ecrire:texte_nouveau_mot')),true))))!=='' ?
		((	_T('public/spip/ecrire:info_modifier_mot') .
	'
	<h1>') . $t1 . '</h1>') :
		'') .
'
</div>
' .
executer_balise_dynamique('FORMULAIRE_EDITER_MOT',
	array(interdire_scripts(entites_html((@$Pile[0]['new']),true)),interdire_scripts(entites_html((@$Pile[0]['id_groupe']),true)),interdire_scripts(entites_html((@$Pile[0]['redirect']),true)),interdire_scripts(entites_html((@$Pile[0]['ajouter_id_article']),true)),interdire_scripts(entites_html((@$Pile[0]['table']),true)),interdire_scripts(entites_html((@$Pile[0]['table_id']),true)),interdire_scripts(entites_html((@$Pile[0]['config_fonc']),true))),
	array('../prive/editer/mot.html','html_edc049c38621824cdeb9d87b789bcd1a','',6,$GLOBALS['spip_lang'])) .
'</div>
');

	return analyse_resultat_skel('html_edc049c38621824cdeb9d87b789bcd1a', $Cache, $page, '../prive/editer/mot.html');
}
?>