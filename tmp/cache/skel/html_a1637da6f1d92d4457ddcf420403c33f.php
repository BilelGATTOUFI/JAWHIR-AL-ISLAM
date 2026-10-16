<?php

/*
 * Squelette : ../plugins/auto/saisies/saisies/_base.html
 * Date :      Mon, 10 Nov 2014 19:41:41 GMT
 * Compile :   Sat, 15 Nov 2014 19:57:50 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/saisies/saisies/_base.html
// Temps de compilation total: 4.958 ms
//

function html_a1637da6f1d92d4457ddcf420403c33f($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'

' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['nom']),true)) ?' ' :''))))!=='' ?
		($t1 . (	'
	' .
	vide($Pile['vars']['obligatoire'] = interdire_scripts(((((entites_html((@$Pile[0]['obligatoire']),true)) AND (interdire_scripts((entites_html((@$Pile[0]['obligatoire']),true) != 'non')))) ?' ' :'') ? 'obligatoire':''))) .
	vide($Pile['vars']['disable'] = interdire_scripts(((((entites_html(sinon(@$Pile[0]['disable'],interdire_scripts(entites_html((@$Pile[0]['disable_avec_post']),true))),true)) AND (interdire_scripts((entites_html(sinon(@$Pile[0]['disable'],interdire_scripts(entites_html((@$Pile[0]['disable_avec_post']),true))),true) != 'non')))) ?' ' :'') ? interdire_scripts((is_array(entites_html((@$Pile[0]['disable']),true)) ? interdire_scripts(entites_html(sinon(@$Pile[0]['disable'],array()),true)):'disabled')):''))) .
	vide($Pile['vars']['readonly'] = interdire_scripts(((((entites_html((@$Pile[0]['readonly']),true)) AND ((	interdire_scripts(entites_html((@$Pile[0]['readonly']),true)) .
			'!={non}'))) ?' ' :'') ? 'readonly':''))) .
	vide($Pile['vars']['saisies_autonomes'] = saisies_autonomes('')) .
	(($t2 = strval(interdire_scripts(((in_array(entites_html((@$Pile[0]['type_saisie']),true),(is_array($a = ($Pile["vars"])) ? $a['saisies_autonomes'] : ""))) ?' ' :''))))!=='' ?
			($t2 . (	'
		' .
		recuperer_fond( (	'saisies/' .
			interdire_scripts(entites_html((@$Pile[0]['type_saisie']),true))) , array_merge($Pile[0],array('obligatoire' => (is_array($a = ($Pile["vars"])) ? $a['obligatoire'] : "") ,
	'disable' => (is_array($a = ($Pile["vars"])) ? $a['disable'] : "") ,
	'readonly' => (is_array($a = ($Pile["vars"])) ? $a['readonly'] : "") )), array('compil'=>array('../plugins/auto/saisies/saisies/_base.html','html_a1637da6f1d92d4457ddcf420403c33f','',12,$GLOBALS['spip_lang'])), '') .
		'
	')) :
			'') .
	'
	' .
	(($t2 = strval(interdire_scripts(((in_array(entites_html((@$Pile[0]['type_saisie']),true),(is_array($a = ($Pile["vars"])) ? $a['saisies_autonomes'] : ""))) ?'' :' '))))!=='' ?
			($t2 . (	'
		' .
		vide($Pile['vars']['erreurs'] = table_valeur((@$Pile[0]['erreurs']),interdire_scripts(entites_html((@$Pile[0]['nom']),true)))) .
		vide($Pile['vars']['li_class'] = interdire_scripts(((substr(entites_html((@$Pile[0]['type_saisie']),true),'0','9') == 'selecteur') ? 'selecteur_item':''))) .
		'<!--!inserer_saisie_editer-->
		<li class="editer editer_' .
		interdire_scripts(saisie_nom2classe(entites_html((@$Pile[0]['nom']),true))) .
		(($t3 = strval((is_array($a = ($Pile["vars"])) ? $a['obligatoire'] : "")))!=='' ?
				(' ' . $t3) :
				'') .
		(((is_array($a = ($Pile["vars"])) ? $a['erreurs'] : ""))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		(($t3 = strval((is_array($a = ($Pile["vars"])) ? $a['li_class'] : "")))!=='' ?
				(' ' . $t3) :
				'') .
		(($t3 = strval(interdire_scripts(entites_html((@$Pile[0]['li_class']),true))))!=='' ?
				(' ' . $t3) :
				'') .
		(($t3 = strval(interdire_scripts(entites_html((@$Pile[0]['type_saisie']),true))))!=='' ?
				(' saisie_' . $t3) :
				'') .
		'"' .
		(($t3 = strval(interdire_scripts(entites_html((@$Pile[0]['id_saisie']),true))))!=='' ?
				(' data-id="' . $t3 . '"') :
				'') .
		'>
			' .
		interdire_scripts((@$Pile[0]['inserer_debut'])) .
		(($t3 = strval(interdire_scripts((@$Pile[0]['label']))))!=='' ?
				((	'<label' .
			(($t4 = strval(interdire_scripts(((match(entites_html((@$Pile[0]['type_saisie']),true),'oui_non|radio|checkbox')) ?'' :' '))))!=='' ?
					($t4 . (	' for="champ_' .
				interdire_scripts(entites_html((@$Pile[0]['nom']),true)) .
				'"')) :
					'') .
			'>') . $t3 . (	(((is_array($a = ($Pile["vars"])) ? $a['obligatoire'] : ""))  ?
					('<span class=\'obligatoire\'>' . ' ' . (	interdire_scripts((is_null((@$Pile[0]['info_obligatoire'])) ? _T('public/spip/ecrire:info_obligatoire_02'):interdire_scripts((@$Pile[0]['info_obligatoire'])))) .
				'</span>')) :
					'') .
			'</label>')) :
				'') .
		'
			' .
		(($t3 = strval((is_array($a = ($Pile["vars"])) ? $a['erreurs'] : "")))!=='' ?
				('<span class=\'erreur_message\'>' . $t3 . '</span>') :
				'') .
		'
			' .
		(($t3 = strval(interdire_scripts((@$Pile[0]['explication']))))!=='' ?
				('<p class=\'explication\'>' . $t3 . '</p>') :
				'') .
		'
			' .
		(($t3 = strval(interdire_scripts((@$Pile[0]['attention']))))!=='' ?
				('<em class=\'attention\'>' . $t3 . '</em>') :
				'') .
		'
			' .
		recuperer_fond( (	'saisies/' .
			interdire_scripts(entites_html((@$Pile[0]['type_saisie']),true))) , array_merge($Pile[0],array('nom' => interdire_scripts(saisie_nom2name(entites_html((@$Pile[0]['nom']),true))) ,
	'disable' => (is_array($a = ($Pile["vars"])) ? $a['disable'] : "") ,
	'readonly' => (is_array($a = ($Pile["vars"])) ? $a['readonly'] : "") )), array('compil'=>array('../plugins/auto/saisies/saisies/_base.html','html_a1637da6f1d92d4457ddcf420403c33f','',0,$GLOBALS['spip_lang'])), '') .
		'
			' .
		(($t3 = strval(interdire_scripts((((((entites_html((@$Pile[0]['disable_avec_post']),true)) AND (interdire_scripts((entites_html((@$Pile[0]['disable_avec_post']),true) != 'non')))) ?' ' :'')) ?' ' :''))))!=='' ?
				($t3 . (	'<input type=\'hidden\' name=\'' .
			interdire_scripts(saisie_nom2name(entites_html((@$Pile[0]['nom']),true))) .
			'\' value="' .
			interdire_scripts(entites_html(sinon(@$Pile[0]['valeur'],interdire_scripts(entites_html((@$Pile[0]['defaut']),true))),true)) .
			'" />')) :
				'') .
		'
			' .
		(@$Pile[0]['inserer_fin']) .
		'</li>
	')) :
			'') .
	'
')) :
		'') .
'
');

	return analyse_resultat_skel('html_a1637da6f1d92d4457ddcf420403c33f', $Cache, $page, '../plugins/auto/saisies/saisies/_base.html');
}
?>