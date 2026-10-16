<?php

/*
 * Squelette : prive/modeles/paginationitem.html
 * Date :      Mon, 07 May 2012 10:41:37 GMT
 * Compile :   Fri, 31 Oct 2014 05:40:41 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette prive/modeles/paginationitem.html
// Temps de compilation total: 0.958 ms
//

function html_0fd7b59b3cfa255b69e6787bd5ffe05b($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['num']),true) == interdire_scripts(entites_html((@$Pile[0]['page_courante']),true))) ? ' ':''))))!=='' ?
		($t1 . (	'
		' .
	(($t2 = strval(interdire_scripts((@$Pile[0]['texte']))))!=='' ?
			('<span class="on">' . $t2 . '</span>') :
			'') .
	'
	')) :
		'') .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['num']),true) == interdire_scripts(entites_html((@$Pile[0]['page_courante']),true))) ? '':' '))))!=='' ?
		($t1 . (	'
		' .
	(($t2 = strval(interdire_scripts((@$Pile[0]['texte']))))!=='' ?
			((	'<a href=\'' .
		interdire_scripts(entites_html((@$Pile[0]['url']),true)) .
		'\' class=\'lien_pagination\' rel=\'nofollow\'>') . $t2 . '</a>') :
			'') .
	'
	')) :
		'') .
interdire_scripts(((entites_html((@$Pile[0]['num']),true) < interdire_scripts(entites_html((@$Pile[0]['derniere']),true))) ? interdire_scripts((@$Pile[0]['separateur'])):'')));

	return analyse_resultat_skel('html_0fd7b59b3cfa255b69e6787bd5ffe05b', $Cache, $page, 'prive/modeles/paginationitem.html');
}
?>