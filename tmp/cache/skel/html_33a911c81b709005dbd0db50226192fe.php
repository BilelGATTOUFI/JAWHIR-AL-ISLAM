<?php

/*
 * Squelette : ../plugins/auto/palette/formulaires/configurer_palette.html
 * Date :      Mon, 10 Nov 2014 19:39:57 GMT
 * Compile :   Sat, 15 Nov 2014 19:57:50 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/palette/formulaires/configurer_palette.html
// Temps de compilation total: 0.813 ms
//

function html_33a911c81b709005dbd0db50226192fe($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?><!-- autoriser=webmestre -->
<!-- refus=' .
_T('cfg:refus_configuration_webmestre') .
' -->
<!-- nom=palette -->
<div class="formulaire_spip formulaire_config formulaire_' .
interdire_scripts(@$Pile[0]['form']) .
'">
	' .
(($t1 = strval(interdire_scripts((@$Pile[0]['message_ok']))))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_ok">' . $t1 . '</p>') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts((@$Pile[0]['message_erreur']))))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_erreur">' . $t1 . '</p>') :
		'') .
'

	<form method="post" action="' .
interdire_scripts(entites_html((@$Pile[0]['action']),true)) .
'">
		<div>
			' .
	'<div>' .
	form_hidden(interdire_scripts(entites_html((@$Pile[0]['action']),true))) .
	'<input name=\'formulaire_action\' type=\'hidden\'
		value=\'' . @$Pile[0]['form'] . '\' />' .
	'<input name=\'formulaire_action_args\' type=\'hidden\'
		value=\'' . @$Pile[0]['formulaire_args']. '\' />' .
	(@$Pile[0]['_hidden']?@$Pile[0]['_hidden']:'') .
	'</div><ul>
				<li class="editer_palette_public">
					<div class="choix">
						<input type="checkbox" name="palette_public" id="palette_public"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['palette_public']),true) != '') ? 'checked':''))))!=='' ?
		(' checked="' . $t1 . '"') :
		'') .
'  class="checkbox" value="on" />
						<label for="palette_public">' .
_T('palette:palette_public') .
'</label>
					</div>
				</li>
				<li class="editer_palette_ecrire">
					<div class="choix">
						<input type="checkbox" name="palette_ecrire" id="palette_ecrire"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['palette_ecrire']),true) != '') ? 'checked':''))))!=='' ?
		(' checked="' . $t1 . '"') :
		'') .
'  class="checkbox" value="on" />
						<label for="palette_ecrire">' .
_T('palette:palette_ecrire') .
'</label>
					</div>
				</li>
			</ul>
			<div class="boutons">
				<input type="submit" class="submit" name="_cfg_ok" value="' .
_T('public/spip/ecrire:bouton_enregistrer') .
'" />
			</div>
		</div>
	</form>
</div>');

	return analyse_resultat_skel('html_33a911c81b709005dbd0db50226192fe', $Cache, $page, '../plugins/auto/palette/formulaires/configurer_palette.html');
}
?>