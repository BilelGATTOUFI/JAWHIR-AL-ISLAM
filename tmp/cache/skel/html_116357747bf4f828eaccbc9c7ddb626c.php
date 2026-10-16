<?php

/*
 * Squelette : ../plugins/auto/socialtags/formulaires/configurer_socialtags.html
 * Date :      Mon, 10 Nov 2014 19:41:54 GMT
 * Compile :   Sat, 15 Nov 2014 19:57:50 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/socialtags/formulaires/configurer_socialtags.html
// Temps de compilation total: 1.649 ms
//

function html_116357747bf4f828eaccbc9c7ddb626c($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?><!-- autoriser=webmestre -->
<!-- refus=' .
_T('cfg:refus_configuration_webmestre') .
' -->
<!-- nom=socialtags -->
<div class="formulaire_spip formulaire_cfg formulaire_configurer formulaire_' .
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
'"><div>
	' .
	'<div>' .
	form_hidden(interdire_scripts(entites_html((@$Pile[0]['action']),true))) .
	'<input name=\'formulaire_action\' type=\'hidden\'
		value=\'' . @$Pile[0]['form'] . '\' />' .
	'<input name=\'formulaire_action_args\' type=\'hidden\'
		value=\'' . @$Pile[0]['formulaire_args']. '\' />' .
	(@$Pile[0]['_hidden']?@$Pile[0]['_hidden']:'') .
	'</div><ul>
		<li class="editer_tags" id="sc_list">
			<label>' .
_T('socialtags:cfg_liste_site') .
'</label>
			<input type="hidden" name="tags[]" value="" />
			' .
socialtags_choix('') .
'
			<script type=\'text/javascript\'>
			//<![CDATA[
				jQuery.extend({
					sc_cocher_decocher_tout: function(b) {
						$(\'#sc_list input[type=checkbox]\').attr(\'checked\', b);
					}
				});
			//]]>
			</script>
			<noscript>
				' .
_T('socialtags:cfg_activer_javascript') .
'
			</noscript>
			<p>
				<small>
					<a href="#sc_list" onclick="$.sc_cocher_decocher_tout(true);">' .
_T('socialtags:cfg_tout_cocher') .
'</a> /
					<a href="#sc_list" onclick="$.sc_cocher_decocher_tout(false);">' .
_T('socialtags:cfg_tout_decocher') .
'</a>
				</small>
			</p>
		</li>
		<li class="fieldset" id="plusone">
			<fieldset>
				<legend>' .
_T('socialtags:cfg_plusone') .
'</legend>
				<ul>
					<li class="editer_plusone">
						<div class="choix">
							' .
interdire_scripts((filtre_info_plugin_dist("googleplus1", "est_actif") ? (	'<input type="checkbox" name="plusone" class="checkbox" id="plusone" ' .
	(($t2 = strval(interdire_scripts((entites_html((@$Pile[0]['plusone']),true) ? 'checked':''))))!=='' ?
			('checked="' . $t2 . '"') :
			'') .
	'/>
							<label for="choix_plusone">
								<img src="' .
	interdire_scripts(find_in_path('images/plusone-normal.png')) .
	'" title="plusone" alt=" " /><span style="font-size:90%">&nbsp;' .
	interdire_scripts((entites_html((@$Pile[0]['plusone']),true) ? '<strong>':'')) .
	_T('socialtags:cfg_plusone') .
	interdire_scripts((entites_html((@$Pile[0]['plusone']),true) ? '</strong>':'')) .
	'</span>
							</label>'):(	'<li><p class="explication">' .
	_T('socialtags:cfg_plusone_existe') .
	'</p></li>'))) .
'
						</div>
					</li>
				</ul>
			</fieldset>
		</li>
		<li class="fieldset" id="sc_insertion">
			<fieldset>
				<legend>' .
_T('socialtags:cfg_insertion') .
'</legend>
				<ul>
					<li class="editer_jsselector">
						<label for="jsselector">' .
_T('socialtags:cfg_selector') .
'</label>
						<p class="explication">' .
_T('socialtags:cfg_inserer') .
'</p>
						<input type="text" name="jsselector" class="text" id="jsselector" value="' .
interdire_scripts(((($a = entites_html((@$Pile[0]['jsselector']),true)) OR (!is_array($a) AND strlen($a))) ? $a : '#contenu')) .
'" size="50" />
						<div class="explication">
							<strong>' .
_T('socialtags:cfg_exemples') .
'</strong>
							<dl>
								<dt><tt>#contenu</tt></dt>
								<dd>' .
_T('socialtags:cfg_en_bas') .
'</dd>
								<dt><tt>.page_article .cartouche:first</tt></dt>
								<dd>' .
_T('socialtags:cfg_sous_bloc') .
'</dd>
								<dt><tt>#socialtags</tt></dt>
								<dd>' .
_T('socialtags:cfg_sous_div') .
'</dd>
							</dl>
						</div>
					</li>
				</ul>
			</fieldset>
		</li>
		<li class="fieldset" id="sc_fanbadge">
			<fieldset id="fanbadge">
				<legend>' .
_T('socialtags:cfg_badge_fb') .
'</legend>
				<ul>
					<li>
						<p class="explication">' .
_T('socialtags:cfg_badge_fb_existe') .
'</p>
					</li>
					<li class="editer_badge">
						<label for="badge">' .
_T('socialtags:cfg_badge_html') .
'</label>
						<p class="explication">' .
_T('socialtags:cfg_badge_html_ajouter_1') .
'
							<code>&#35;MODELE{socialtags_badge}</code>' .
_T('socialtags:cfg_badge_html_ajouter_2') .
'
							<code>&lt;socialtags|badge&gt;)</code></p>
							<textarea name="badge" id="badge" class="textarea" rows="6" cols="40">' .
interdire_scripts(entites_html((@$Pile[0]['badge']),true)) .
'</textarea>
					</li>
					<li class="editer_badgejs">
						<label for="badgejs">' .
_T('socialtags:cfg_badge_js') .
'</label>
						<p class="explication">' .
_T('socialtags:cfg_badge_js_1', array('code' => '?page')) .
'</p>
						<textarea name="badgejs" id="badgejs" class="textarea" rows="8" cols="40">' .
interdire_scripts(entites_html((@$Pile[0]['badgejs']),true)) .
'</textarea>
					</li>
				</ul>
			</fieldset>
		</li>
		<li class="editer_ifreferer">
			<div class="choix">
				<input type="checkbox" name="ifreferer"  class="checkbox" id="ifreferer"' .
(($t1 = strval(interdire_scripts((entites_html((@$Pile[0]['ifreferer']),true) ? 'checked':''))))!=='' ?
		(' checked="' . $t1 . '"') :
		'') .
' />
				<label for="ifreferer">' .
_T('socialtags:cfg_referer') .
'</label>
			</div>
		</li>
	</ul>
	<p class="boutons">
		<input type="submit" class="submit" name="_cfg_ok" value="' .
_T('public/spip/ecrire:bouton_valider') .
'" />
	</p>
	</div>
</form>
</div>
');

	return analyse_resultat_skel('html_116357747bf4f828eaccbc9c7ddb626c', $Cache, $page, '../plugins/auto/socialtags/formulaires/configurer_socialtags.html');
}
?>