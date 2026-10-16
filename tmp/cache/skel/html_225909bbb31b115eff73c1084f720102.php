<?php

/*
 * Squelette : ../prive/formulaires/editer_mot.html
 * Date :      Mon, 10 Nov 2014 19:49:10 GMT
 * Compile :   Wed, 27 Jan 2016 20:49:29 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/formulaires/editer_mot.html
// Temps de compilation total: 2.883 ms
//

function html_225909bbb31b115eff73c1084f720102($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class=\'formulaire_spip formulaire_editer formulaire_editer_mot formulaire_editer_mot-' .
interdire_scripts(entites_html(sinon(@$Pile[0]['id_mot'],'nouveau'),true)) .
'\'>
	' .
(($t1 = strval((@$Pile[0]['message_ok'])))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_ok">' . $t1 . '</p>') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts((@$Pile[0]['message_erreur']))))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_erreur">' . $t1 . '</p>') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['editable']),true))))!=='' ?
		($t1 . (	'
	<form method=\'post\' action=\'' .
	interdire_scripts(entites_html((@$Pile[0]['action']),true)) .
	'\' enctype=\'multipart/form-data\'><div>
		
		' .
		'<div>' .
	form_hidden(interdire_scripts(entites_html((@$Pile[0]['action']),true))) .
	'<input name=\'formulaire_action\' type=\'hidden\'
		value=\'' . @$Pile[0]['form'] . '\' />' .
	'<input name=\'formulaire_action_args\' type=\'hidden\'
		value=\'' . @$Pile[0]['formulaire_args']. '\' />' .
	(@$Pile[0]['_hidden']?@$Pile[0]['_hidden']:'') .
	'</div>' .
	'<input type=\'hidden\' name=\'id_mot\' value=\'' .
	interdire_scripts(entites_html((@$Pile[0]['id_mot']),true)) .
	'\' />
	  <ul>
	    <li class="editer_titre obligatoire' .
	((table_valeur((@$Pile[0]['erreurs']),'titre'))  ?
			(' ' . ' ' . 'erreur') :
			'') .
	'">
				<label for="titre">' .
	_T('public/spip/ecrire:info_titre_mot_cle') .
	'<em class="aide">' .
	interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('titre','../prive/formulaires/editer_mot.html', $Pile[0]):'')) .
	'</em></label>' .
	(($t2 = strval(table_valeur((@$Pile[0]['erreurs']),'titre')))!=='' ?
			('
				<span class=\'erreur_message\'>' . $t2 . '</span>
				') :
			'') .
	'<input type=\'text\' class=\'text\' name=\'titre\' id=\'titre\' value="' .
	sinon(@$Pile[0]['titre'],_T('public/spip/ecrire:texte_nouveau_mot')) .
	'"
				' .
	(($t2 = strval(interdire_scripts((strlen(entites_html((@$Pile[0]['titre']),true)) ? '':' '))))!=='' ?
			($t2 . 'onfocus="if(!antifocus){this.value=\'\';antifocus=true;}"') :
			'') .
	'/>
	    </li>	
	    <li class="editer_groupe_mot obligatoire' .
	((table_valeur((@$Pile[0]['erreurs']),'id_groupe'))  ?
			(' ' . ' ' . 'erreur') :
			'') .
	'">
				<label for="id_groupe">' .
	_T('public/spip/ecrire:info_dans_groupe') .
	'<em class="aide">' .
	interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('id_groupe','../prive/formulaires/editer_mot.html', $Pile[0]):'')) .
	'</em></label>' .
	(($t2 = strval(table_valeur((@$Pile[0]['erreurs']),'id_groupe')))!=='' ?
			('
				<span class=\'erreur_message\'>' . $t2 . '</span>
				') :
			'') .
	recuperer_fond( 'formulaires/selecteur_groupe_mot' , array('id_groupe' => interdire_scripts(entites_html((@$Pile[0]['id_groupe']),true)) ,
	'table' => interdire_scripts(entites_html(sinon(@$Pile[0]['table'],''),true)) ,
	'name' => 'id_groupe' ,
	'id' => 'id_groupe' ), array('compil'=>array('../prive/formulaires/editer_mot.html','html_225909bbb31b115eff73c1084f720102','',17,$GLOBALS['spip_lang'])), '') .
	'
	    </li>
	    <li class="editer_descriptif' .
	((table_valeur((@$Pile[0]['erreurs']),'descriptif'))  ?
			(' ' . ' ' . 'erreur') :
			'') .
	'">
				<label for="descriptif">' .
	_T('public/spip/ecrire:texte_descriptif_rapide') .
	'</label>' .
	(($t2 = strval(table_valeur((@$Pile[0]['erreurs']),'descriptif')))!=='' ?
			('
				<span class=\'erreur_message\'>' . $t2 . '</span>
				') :
			'') .
	'<textarea name=\'descriptif\' id=\'descriptif\' rows=\'4\' cols=\'40\'>' .
	(@$Pile[0]['descriptif']) .
	'</textarea>
	    </li>
	    <li class="editer_texte' .
	((table_valeur((@$Pile[0]['erreurs']),'texte'))  ?
			(' ' . ' ' . 'erreur') :
			'') .
	'">
				<label for="text_area">' .
	_T('public/spip/ecrire:info_texte_explicatif') .
	'</label>' .
	(($t2 = strval(table_valeur((@$Pile[0]['erreurs']),'texte')))!=='' ?
			('
				<span class=\'erreur_message\'>' . $t2 . '</span>
				') :
			'') .
	(($t2 = strval(sinon(@$Pile[0]['_texte_trop_long'],'')))!=='' ?
			($t2 . '
				') :
			'') .
	'<textarea name=\'texte\' id=\'text_area\' cols=\'40\' rows=\'' .
	plus(table_valeur((@$Pile[0]['config']),'lignes'),'2') .
	'\'>' .
	(@$Pile[0]['texte']) .
	'</textarea>
	    </li>
	  </ul>
	  ' .
	'
	  <!--extra-->
	  <p class="boutons"><input type=\'submit\' class=\'submit\' value=\'' .
	_T('public/spip/ecrire:bouton_enregistrer') .
	'\' /></p>
	</div></form>
	')) :
		'') .
'
</div>
');

	return analyse_resultat_skel('html_225909bbb31b115eff73c1084f720102', $Cache, $page, '../prive/formulaires/editer_mot.html');
}
?>