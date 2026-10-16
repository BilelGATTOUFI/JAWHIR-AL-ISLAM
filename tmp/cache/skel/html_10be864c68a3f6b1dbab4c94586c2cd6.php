<?php

/*
 * Squelette : ../plugins/auto/porte_plume_partout/formulaires/configurer_ppp.html
 * Date :      Mon, 10 Nov 2014 19:40:44 GMT
 * Compile :   Sat, 15 Nov 2014 19:57:50 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/porte_plume_partout/formulaires/configurer_ppp.html
// Temps de compilation total: 3.109 ms
//

function html_10be864c68a3f6b1dbab4c94586c2cd6($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
'<!-- nom=ppp -->

<div class="formulaire_spip formulaire_configurer_ppp">

<h3 class=\'titrem\'>' .
interdire_scripts(inserer_attribut(inserer_attribut(filtrer('image_graver', filtrer('image_reduire',find_in_path('images/configure_toolbars-22.png'),'24')),'class','cadre-icone'),'alt','')) .
_T('ppp:cfg_titre') .
'</h3>

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
				<li class="fieldset">
					<fieldset>
						<h3 class="legend">' .
_T('ppp:legend_barre_typo') .
'</h3>
						<ul>
							' .
recuperer_fond( 'saisies/_base' , array('erreurs' => @$Pile[0]['erreurs'] ,
	'type_saisie' => 'oui_non' ,
	'valeur' => interdire_scripts((@$Pile[0]['descriptif_ppp'])) ,
	'nom' => 'descriptif_ppp' ,
	'label' => _T('ecrire:texte_descriptif_rapide') ,
	'defaut' => 'on' ), array('compil'=>array('../plugins/auto/porte_plume_partout/formulaires/configurer_ppp.html','html_10be864c68a3f6b1dbab4c94586c2cd6','',13,$GLOBALS['spip_lang'])), '') .
'
							' .
recuperer_fond( 'saisies/_base' , array('erreurs' => @$Pile[0]['erreurs'] ,
	'type_saisie' => 'oui_non' ,
	'valeur' => interdire_scripts((@$Pile[0]['chapo_ppp'])) ,
	'nom' => 'chapo_ppp' ,
	'label' => _T('ecrire:info_chapeau') ,
	'defaut' => 'on' ), array('compil'=>array('../plugins/auto/porte_plume_partout/formulaires/configurer_ppp.html','html_10be864c68a3f6b1dbab4c94586c2cd6','',5,$GLOBALS['spip_lang'])), '') .
'
							' .
recuperer_fond( 'saisies/_base' , array('erreurs' => @$Pile[0]['erreurs'] ,
	'type_saisie' => 'oui_non' ,
	'valeur' => interdire_scripts((@$Pile[0]['ps_ppp'])) ,
	'nom' => 'ps_ppp' ,
	'label' => _T('ecrire:info_post_scriptum') ,
	'defaut' => 'on' ), array('compil'=>array('../plugins/auto/porte_plume_partout/formulaires/configurer_ppp.html','html_10be864c68a3f6b1dbab4c94586c2cd6','',5,$GLOBALS['spip_lang'])), '') .
'
						</ul>
					</fieldset>
				</li>	
				<li class="fieldset">
					<fieldset>
						<h3 class="legend">' .
_T('ecrire:titre_config_fonctions') .
'</h3>
						<ul>
							' .
recuperer_fond( 'saisies/_base' , array('erreurs' => @$Pile[0]['erreurs'] ,
	'type_saisie' => 'oui_non' ,
	'valeur' => interdire_scripts((@$Pile[0]['configuration_description_ppp'])) ,
	'nom' => 'configuration_description_ppp' ,
	'label' => _T('ecrire:texte_descriptif_rapide') ,
	'defaut' => 'on' ), array('compil'=>array('../plugins/auto/porte_plume_partout/formulaires/configurer_ppp.html','html_10be864c68a3f6b1dbab4c94586c2cd6','',12,$GLOBALS['spip_lang'])), '') .
'
						</ul>
					</fieldset>
				</li>	
				<li class="fieldset">
					<fieldset>
						<h3 class="legend">' .
_T('spip:icone_auteurs') .
'</h3>
						<ul>
							' .
recuperer_fond( 'saisies/_base' , array('erreurs' => @$Pile[0]['erreurs'] ,
	'type_saisie' => 'oui_non' ,
	'valeur' => interdire_scripts((@$Pile[0]['auteurs_quietesvous_ppp'])) ,
	'nom' => 'auteurs_quietesvous_ppp' ,
	'label' => _T('ecrire:entree_infos_perso') ,
	'defaut' => 'on' ), array('compil'=>array('../plugins/auto/porte_plume_partout/formulaires/configurer_ppp.html','html_10be864c68a3f6b1dbab4c94586c2cd6','',12,$GLOBALS['spip_lang'])), '') .
'
						</ul>
					</fieldset>
				</li>	
				<li class="fieldset">
					<fieldset>
						<h3 class="legend">' .
_T('ppp:legend_hauteur_champ') .
'</h3>
						<ul>
							' .
recuperer_fond( 'saisies/_base' , array('erreurs' => @$Pile[0]['erreurs'] ,
	'type_saisie' => 'oui_non' ,
	'valeur' => interdire_scripts((@$Pile[0]['hauteurtexte_ppp'])) ,
	'nom' => 'hauteurtexte_ppp' ,
	'label' => _T('ppp:label_hauteur_champ') ,
	'defaut' => '' ), array('compil'=>array('../plugins/auto/porte_plume_partout/formulaires/configurer_ppp.html','html_10be864c68a3f6b1dbab4c94586c2cd6','',12,$GLOBALS['spip_lang'])), '') .
'
						</ul>
					</fieldset>
				</li>	
			</ul>
			<p class="boutons">
				<input type="submit" name="_cfg_ok" value="' .
_T('ppp:bouton_mettre_a_jour') .
'" />
				<input type="submit" name="_cfg_delete" value="' .
_T('ppp:supprimer') .
'" />
			</p>
		</div>
	</form>
</div>');

	return analyse_resultat_skel('html_10be864c68a3f6b1dbab4c94586c2cd6', $Cache, $page, '../plugins/auto/porte_plume_partout/formulaires/configurer_ppp.html');
}
?>