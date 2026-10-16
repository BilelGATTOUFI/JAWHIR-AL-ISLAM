<?php

/*
 * Squelette : squelettes-dist/formulaires/signature.html
 * Date :      Mon, 10 Nov 2014 19:52:55 GMT
 * Compile :   Thu, 04 Dec 2014 12:39:57 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette squelettes-dist/formulaires/signature.html
// Temps de compilation total: 2.813 ms
//

function html_33df905667f4992af37cc617e206b53c($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="formulaire_spip formulaire_signature ajax" id="sp' .
interdire_scripts(entites_html((@$Pile[0]['id_article']),true)) .
'">

' .
(($t1 = strval(interdire_scripts(sinon(@$Pile[0]['message_ok'],interdire_scripts(affiche_reponse_confirmation((@$Pile[0]['_confirm'])))))))!=='' ?
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
<form method="post" action="' .
	interdire_scripts(entites_html((@$Pile[0]['action']),true)) .
	'#sp' .
	interdire_scripts(entites_html((@$Pile[0]['id_article']),true)) .
	'"><div>
	' .
		'<div>' .
	form_hidden(interdire_scripts(entites_html((@$Pile[0]['action']),true))) .
	'<input name=\'formulaire_action\' type=\'hidden\'
		value=\'' . @$Pile[0]['form'] . '\' />' .
	'<input name=\'formulaire_action_args\' type=\'hidden\'
		value=\'' . @$Pile[0]['formulaire_args']. '\' />' .
	(@$Pile[0]['_hidden']?@$Pile[0]['_hidden']:'') .
	'</div><input type="hidden" name="url_page" value="' .
	url_absolue(self()) .
	'" />
	' .
	(($t2 = strval(interdire_scripts(propre((@$Pile[0]['_texte'])))))!=='' ?
			((	'<fieldset>
		<legend>' .
		_T('public/spip/ecrire:info_descriptif') .
		'</legend>
		<div class=\'explication\'>') . $t2 . '</div>
	</fieldset>') :
			'') .
	'
	<fieldset>
		<legend>' .
	_T('public/spip/ecrire:form_forum_identifiants') .
	'</legend>
		<ul>
			<li class=\'saisie_nom_email' .
	(($t2 = strval(interdire_scripts(((table_valeur((@$Pile[0]['erreurs']),'session_nom')) ?' ' :''))))!=='' ?
			(' ' . $t2 . 'erreur') :
			'') .
	' obligatoire\'>
				<label for="session_nom">' .
	_T('public/spip/ecrire:form_pet_votre_nom') .
	'</label>
				' .
	(($t2 = strval(interdire_scripts(table_valeur((@$Pile[0]['erreurs']),'session_nom'))))!=='' ?
			('<span class="erreur_message">' . $t2 . '</span>') :
			'') .
	'
				<input type="text" class="text" name="session_nom" id="session_nom" value="' .
	interdire_scripts(entites_html((@$Pile[0]['session_nom']),true)) .
	'" size="30" />
			</li>
			<li class=\'saisie_adresse_email' .
	(($t2 = strval(interdire_scripts(((table_valeur((@$Pile[0]['erreurs']),'session_email')) ?' ' :''))))!=='' ?
			(' ' . $t2 . 'erreur') :
			'') .
	' obligatoire\'>
				<label for="session_email">' .
	_T('public/spip/ecrire:form_pet_votre_email') .
	'</label>
				' .
	(($t2 = strval(interdire_scripts(table_valeur((@$Pile[0]['erreurs']),'session_email'))))!=='' ?
			('<span class="erreur_message">' . $t2 . '</span>') :
			'') .
	'
				<input type="text" class="text" name="session_email" id="session_email" value="' .
	interdire_scripts(entites_html((@$Pile[0]['session_email']),true)) .
	'" size="30" />
			</li>
		</ul>
	</fieldset>
	<fieldset>
		<legend>' .
	_T('public/spip/ecrire:info_lien_hypertexte') .
	'</legend>
		' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['site_obli']),true))))!=='' ?
			('<p class=\'explication\'>' . $t2 . (	_T('public/spip/ecrire:form_pet_votre_site') .
		'</p>')) :
			'') .
	'
		<ul>
			<li class=\'saisie_signature_nom_site' .
	(($t2 = strval(interdire_scripts(((table_valeur((@$Pile[0]['erreurs']),'signature_nom_site')) ?' ' :''))))!=='' ?
			(' ' . $t2 . 'erreur') :
			'') .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['site_obli']),true))))!=='' ?
			($t2 . 'obligatoire') :
			'') .
	'\'>
				<label for="signature_nom_site">' .
	_T('public/spip/ecrire:form_pet_nom_site2') .
	'</label>
				' .
	(($t2 = strval(interdire_scripts(table_valeur((@$Pile[0]['erreurs']),'signature_nom_site'))))!=='' ?
			('<span class="erreur_message">' . $t2 . '</span>') :
			'') .
	'
				<input type="text" class="text" name="signature_nom_site" id="signature_nom_site" value="' .
	interdire_scripts(entites_html((@$Pile[0]['signature_nom_site']),true)) .
	'" size="30" />
			</li>
				<li class=\'saisie_signature_url_site' .
	(($t2 = strval(interdire_scripts(((table_valeur((@$Pile[0]['erreurs']),'signature_url_site')) ?' ' :''))))!=='' ?
			(' ' . $t2 . 'erreur') :
			'') .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['site_obli']),true))))!=='' ?
			($t2 . 'obligatoire') :
			'') .
	'\'>
				<label for="signature_url_site">' .
	_T('public/spip/ecrire:form_pet_adresse_site') .
	'</label>
				' .
	(($t2 = strval(interdire_scripts(table_valeur((@$Pile[0]['erreurs']),'signature_url_site'))))!=='' ?
			('<span class="erreur_message">' . $t2 . '</span>') :
			'') .
	'
				<input type="text" class="text" name="signature_url_site" id="signature_url_site" value="' .
	interdire_scripts(entites_html((@$Pile[0]['signature_url_site']),true)) .
	'" size="30" />
			</li>
		</ul>
	</fieldset>

	
	<p style="display: none;">
		<label for="nobot_signature' .
	interdire_scripts(entites_html((@$Pile[0]['id_article']),true)) .
	'">' .
	_T('public/spip/ecrire:antispam_champ_vide') .
	'</label>
		<input type="text" class="text" name="nobot" id="nobot_signature' .
	interdire_scripts(entites_html((@$Pile[0]['id_article']),true)) .
	'" value="' .
	interdire_scripts(entites_html((@$Pile[0]['nobot']),true)) .
	'" size="10" />
	</p>

	' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['_message']),true))))!=='' ?
			($t2 . (	'
	<fieldset>
		<legend>' .
		_T('public/spip/ecrire:form_pet_message_commentaire') .
		'</legend>
		<ul>
			<li class=\'saisie_message\'>
				<label for="message">' .
		_T('public/spip/ecrire:info_texte_message') .
		'</label>
				<textarea name="message" id="message" rows="6" cols="60">' .
		interdire_scripts(entites_html((@$Pile[0]['message']),true)) .
		'</textarea>
			</li>
		</ul>
	</fieldset>')) :
			'') .
	'

	<p class="boutons"><input type="submit" class="submit" value="' .
	_T('public/spip/ecrire:bouton_valider') .
	'" /></p>
</div>
</form>
')) :
		'') .
'
</div>');

	return analyse_resultat_skel('html_33df905667f4992af37cc617e206b53c', $Cache, $page, 'squelettes-dist/formulaires/signature.html');
}
?>