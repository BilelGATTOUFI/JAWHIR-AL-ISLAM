<?php

/*
 * Squelette : ../plugins/auto/enluminures_typographiques_v3/formulaires/configurer_typoenluminee.html
 * Date :      Mon, 10 Nov 2014 19:38:08 GMT
 * Compile :   Sat, 15 Nov 2014 19:57:50 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/enluminures_typographiques_v3/formulaires/configurer_typoenluminee.html
// Temps de compilation total: 2.008 ms
//

function html_e7bf4846a198cd8ae114b82c1a619b64($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="formulaire_spip formulaire_configurer formulaire_' .
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
'"><div>' .
interdire_scripts(form_hidden(entites_html((@$Pile[0]['_cfg_']),true))) .
'</div>
	' .
	'<div>' .
	form_hidden(interdire_scripts(entites_html((@$Pile[0]['action']),true))) .
	'<input name=\'formulaire_action\' type=\'hidden\'
		value=\'' . @$Pile[0]['form'] . '\' />' .
	'<input name=\'formulaire_action_args\' type=\'hidden\'
		value=\'' . @$Pile[0]['formulaire_args']. '\' />' .
	(@$Pile[0]['_hidden']?@$Pile[0]['_hidden']:'') .
	'</div><ul><li class="fieldset"><fieldset><legend>' .
_T('enlumtypo:cfg_puces') .
'</legend></li>
	<?php if (isset($GLOBALS[\'barre_typo_pas_de_fausses_puces\'])) { ?>
	<li><p class="explication">Configuré dans le mes_options par \'barre_typo_pas_de_fausses_puces\'&nbsp;:<br /><?php if ($GLOBALS[\'barre_typo_pas_de_fausses_puces\'] === true) { ?>Remplacement<?php } else { ?>Conserver le traitement par défaut de SPIP<?php } ?></p></li>
	<?php } else { ?>
	<li><label for="sc_puces">Puces</label>
	<p class="explication">Remplacement des fausses puces de SPIP (- en début de ligne) par de vraies listes à puces (-* en début de ligne)</p>
	<select name="puces" id="sc_puces" class="forml">
		<option value="Oui"' .
(($t1 = strval(interdire_scripts(((entites_html(sinon(@$Pile[0]['puces'],'Non'),true) == 'Oui') ? 'selected':''))))!=='' ?
		(' selected="' . $t1 . '"') :
		'') .
'>Remplacement</option>
		<option value="Non"' .
(($t1 = strval(interdire_scripts(((entites_html(sinon(@$Pile[0]['puces'],'Non'),true) == 'Non') ? 'selected':''))))!=='' ?
		(' selected="' . $t1 . '"') :
		'') .
'>Conserver le traitement par défaut de SPIP</option>
	</select></li>
	<?php } ?>
</fieldset></ul>
<fieldset><legend>' .
_T('enlumtypo:cfg_titraille') .
'</legend>
	<p>Les valeurs par défaut sont basées sur la valeur historique de SPIP pour {{{}}} <=> H3. En HTML, il n\'y a pas de H7 ce qui explique la balise choisie pour le niveau 5.</p>
	<p>N\'oubliez pas que la titraille sert à donner un sens dans la hiérarchisation des idées d\'un texte, et <strong>surtout pas</strong> à obtenir un effet de taille de texte !</p>
	<ul><li><p class="explication">Titraille de premier niveau&nbsp;: {{{}}} ou {{{* }}}</p></li>
	<?php if (isset($GLOBALS[\'config_intertitre\'])) { ?>
	<li><p class="explication">Configuré dans le mes_options par \'debut_intertitre\' et \'fin_intertitre\'</p></li>
	<?php } else { ?>
	<li>
	<label for="sc_titraille1open">Balise <strong>ouvrante</strong>&nbsp;:</label>
	<input type="text" name="titraille1open" id="sc_titraille1open" value="' .
interdire_scripts(entites_html(sinon(@$Pile[0]['titraille1open'],'<h3 class="spip">'),true)) .
'" size="30" class="fondl" /><br />
	<label for="sc_titraille1open">Balise <strong>fermante</strong>&nbsp;:</label>
	<input type="text" name="titraille1close" id="sc_titraille1close" value="' .
interdire_scripts(entites_html(sinon(@$Pile[0]['titraille1close'],'</h3>'),true)) .
'" size="30" class="fondl" />
	<?php } ?>
	</li>
	<li><p class="explication">Titraille de deuxième niveau&nbsp;: {{{** }}}</p></li>
	<?php if (isset($GLOBALS[\'config_intertitre\'])) { ?>
	<li><p class="explication">Configuré dans le mes_options par \'debut_intertitre_2\' et \'fin_intertitre_2\'</p></li>
	<?php } else { ?>
	<li>
	<label for="sc_titraille2open">Balise <strong>ouvrante</strong>&nbsp;:</label>
	<input type="text" name="titraille2open" id="sc_titraille2open" value="' .
interdire_scripts(entites_html(sinon(@$Pile[0]['titraille2open'],'<h4 class="spip">'),true)) .
'" size="30" class="fondl" /><br />
	<label for="sc_titraille2open">Balise <strong>fermante</strong>&nbsp;:</label>
	<input type="text" name="titraille2close" id="sc_titraille2close" value="' .
interdire_scripts(entites_html(sinon(@$Pile[0]['titraille2close'],'</h4>'),true)) .
'" size="30" class="fondl" />
	<?php } ?>
	</li>
	<li><p class="explication">Titraille de troisième niveau&nbsp;: {{{*** }}}</p></li>
	<?php if (isset($GLOBALS[\'config_intertitre\'])) { ?>
	<li><p class="explication">Configuré dans le mes_options par \'debut_intertitre_3\' et \'fin_intertitre_3\'</p></li>
	<?php } else { ?>
	<li>
	<label for="sc_titraille3open">Balise <strong>ouvrante</strong>&nbsp;:</label>
	<input type="text" name="titraille3open" id="sc_titraille3open" value="' .
interdire_scripts(entites_html(sinon(@$Pile[0]['titraille3open'],'<h5 class="spip">'),true)) .
'" size="30" class="fondl" /><br />
	<label for="sc_titraille3open">Balise <strong>fermante</strong>&nbsp;:</label>
	<input type="text" name="titraille3close" id="sc_titraille3close" value="' .
interdire_scripts(entites_html(sinon(@$Pile[0]['titraille3close'],'</h5>'),true)) .
'" size="30" class="fondl" />
	<?php } ?>
	</li>
	<li><p class="explication">Titraille de quatrième niveau&nbsp;: {{{**** }}}</p></li>
	<?php if (isset($GLOBALS[\'config_intertitre\'])) { ?>
	<li><p class="explication">Configuré dans le mes_options par \'debut_intertitre_4\' et \'fin_intertitre_4\'</p></li>
	<?php } else { ?>
	<li>
	<label for="sc_titraille4open">Balise <strong>ouvrante</strong>&nbsp;:</label>
	<input type="text" name="titraille4open" id="sc_titraille4open" value="' .
interdire_scripts(entites_html(sinon(@$Pile[0]['titraille4open'],'<h6 class="spip">'),true)) .
'" size="30" class="fondl" /><br />
	<label for="sc_titraille4open">Balise <strong>fermante</strong>&nbsp;:</label>
	<input type="text" name="titraille4close" id="sc_titraille4close" value="' .
interdire_scripts(entites_html(sinon(@$Pile[0]['titraille4close'],'</h6>'),true)) .
'" size="30" class="fondl" />
	<?php } ?>
	</li>
	<li><p class="explication">Titraille de cinquième niveau&nbsp;: {{{***** }}}</p></li>
	<?php if (isset($GLOBALS[\'config_intertitre\'])) { ?>
	<li><p class="explication">Configuré dans le mes_options par \'debut_intertitre_5\' et \'fin_intertitre_5\'</p></li>
	<?php } else { ?>
	<li>
	<label for="sc_titraille5open">Balise <strong>ouvrante</strong>&nbsp;:</label>
	<input type="text" name="titraille5open" id="sc_titraille5open" value="' .
interdire_scripts(entites_html(sinon(@$Pile[0]['titraille5open'],'<strong class="spip titraille5">'),true)) .
'" size="30" class="fondl" /><br />
	<label for="sc_titraille5open">Balise <strong>fermante</strong>&nbsp;:</label>
	<input type="text" name="titraille5close" id="sc_titraille5close" value="' .
interdire_scripts(entites_html(sinon(@$Pile[0]['titraille5close'],'</strong>'),true)) .
'" size="30" class="fondl" />
	<?php } ?>
	</li>
	</ul>
</fieldset>
<ul><li class="fieldset"><fieldset><legend>' .
_T('enlumtypo:cfg_insertcss') .
'</legend></li>
	<?php if (isset($GLOBALS[\'BarreTypoEnrichie_Preserve_Header\'])) { 
?>
	<li><p class="explication">Configuré dans le mes_options par \'BarreTypoEnrichie_Preserve_Header\'
	<?php 
	echo ($GLOBALS[\'BarreTypoEnrichie_Preserve_Header\']==\'Oui\')?"Ne pas faire l\'insertion automatique":"Insertion automatique";
	?>
	</p></li>
	<?php
	} else { ?>
	<li><label for="sc_insertcss">&#35;INSERT_HEAD</label>
	<p class="explication">Insertion automatique des CSS spécifiques à la BTE dans l\'espace public (via &#35;INSERT_HEAD dans les squelettes)</p>
	<select name="insertcss" id="sc_insertcss" class="forml">
		<option value="Oui"' .
(($t1 = strval(interdire_scripts(((entites_html(sinon(@$Pile[0]['insertcss'],'Oui'),true) == 'Oui') ? 'selected':''))))!=='' ?
		(' selected="' . $t1 . '"') :
		'') .
'>Insertion automatique</option>
		<option value="Non"' .
(($t1 = strval(interdire_scripts(((entites_html(sinon(@$Pile[0]['insertcss'],'Oui'),true) == 'Non') ? 'selected':''))))!=='' ?
		(' selected="' . $t1 . '"') :
		'') .
'>Ne pas faire l\'insertion automatique</option>
	</select></li>
	<?php } ?>
</fieldset></ul>


	<p class="boutons">
		<input type="submit" name="reinit" class="submit" value="' .
_T('mediabox:bouton_reinitialiser') .
'" />
		<input type="submit" name="enregistrer" class="submit" value="' .
_T('public/spip/ecrire:bouton_valider') .
'" />
	</p>

</form>
</div>');

	return analyse_resultat_skel('html_e7bf4846a198cd8ae114b82c1a619b64', $Cache, $page, '../plugins/auto/enluminures_typographiques_v3/formulaires/configurer_typoenluminee.html');
}
?>