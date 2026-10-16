<?php

/*
 * Squelette : prive/formulaires/menu_lang.html
 * Date :      Mon, 10 Nov 2014 19:49:22 GMT
 * Compile :   Tue, 11 Nov 2014 12:09:05 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette prive/formulaires/menu_lang.html
// Temps de compilation total: 0.431 ms
//

function html_8cd070bd2532ece23938dec9302dec97($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="formulaire_spip formulaire_menu_lang" id="formulaire_menu_lang">
	<form method="post" action="' .
interdire_scripts(entites_html((@$Pile[0]['url']),true)) .
'"><div>
		' .
interdire_scripts(form_hidden(entites_html((@$Pile[0]['url']),true))) .
'
		<label for="' .
interdire_scripts(entites_html((@$Pile[0]['nom']),true)) .
'">' .
_T('public/spip/ecrire:info_langues') .
'</label>
		<select name="' .
interdire_scripts(entites_html((@$Pile[0]['nom']),true)) .
'" id="' .
interdire_scripts(entites_html((@$Pile[0]['nom']),true)) .
'" onchange="this.parentNode.parentNode.submit()">' .
interdire_scripts((@$Pile[0]['langues'])) .
'</select>
		<noscript><p class="boutons"><input type="submit" class="submit" value="&gt;&gt;" /></p></noscript>
	</div></form>
</div>');

	return analyse_resultat_skel('html_8cd070bd2532ece23938dec9302dec97', $Cache, $page, 'prive/formulaires/menu_lang.html');
}
?>