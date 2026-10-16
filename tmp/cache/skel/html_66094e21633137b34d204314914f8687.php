<?php

/*
 * Squelette : prive/modeles/pagination_page_precedent_suivant.html
 * Date :      Mon, 07 May 2012 10:41:37 GMT
 * Compile :   Fri, 31 Oct 2014 05:40:41 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette prive/modeles/pagination_page_precedent_suivant.html
// Temps de compilation total: 120.632 ms
//

function html_66094e21633137b34d204314914f8687($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
interdire_scripts((@$Pile[0]['bloc_ancre'])) .
vide($Pile['vars']['bornes'] = interdire_scripts(filtre_bornes_pagination_dist(entites_html((@$Pile[0]['page_courante']),true),interdire_scripts(entites_html((@$Pile[0]['nombre_pages']),true)),'10'))) .
vide($Pile['vars']['premiere'] = filtre_reset((is_array($a = ($Pile["vars"])) ? $a['bornes'] : ""))) .
vide($Pile['vars']['derniere'] = filtre_end((is_array($a = ($Pile["vars"])) ? $a['bornes'] : ""))) .
vide($Pile['vars']['separateur'] = interdire_scripts(entites_html(sinon(@$Pile[0]['separateur'],'|'),true))) .
(((is_array($a = ($Pile["vars"])) ? $a['premiere'] : "") > '1')  ?
		((	'<a href=\'' .
	interdire_scripts(parametre_url(entites_html((@$Pile[0]['url']),true),interdire_scripts(entites_html((@$Pile[0]['debut']),true)),'')) .
	'#' .
	interdire_scripts(entites_html((@$Pile[0]['ancre']),true)) .
	'\' class=\'lien_pagination\' rel=\'nofollow\'>') . '...' . (	'</a> ' .
	(is_array($a = ($Pile["vars"])) ? $a['separateur'] : ""))) :
		'') .
'
' .
vide($Pile['vars']['i'] = interdire_scripts(moins(entites_html((@$Pile[0]['page_courante']),true),'1'))) .
(((is_array($a = ($Pile["vars"])) ? $a['i'] : "") > '0')  ?
		(' ' . (	(($t2 = strval(vide($Pile['vars']['item'] = mult(moins((is_array($a = ($Pile["vars"])) ? $a['i'] : ""),'1'),interdire_scripts(entites_html((@$Pile[0]['pas']),true))))))!=='' ?
			('
	' . $t2 . '
	') :
			'') .
	recuperer_fond( 'modeles/paginationitem' , array('num' => (is_array($a = ($Pile["vars"])) ? $a['i'] : "") ,
	'texte' => '&lt;' ,
	'separateur' => (is_array($a = ($Pile["vars"])) ? $a['separateur'] : "") ,
	'url' => interdire_scripts(ancre_url(parametre_url(entites_html((@$Pile[0]['url']),true),interdire_scripts(entites_html((@$Pile[0]['debut']),true)),(is_array($a = ($Pile["vars"])) ? $a['item'] : "")),interdire_scripts(entites_html((@$Pile[0]['ancre']),true)))) ,
	'page_courante' => interdire_scripts(entites_html((@$Pile[0]['page_courante']),true)) ,
	'derniere' => interdire_scripts(entites_html((@$Pile[0]['derniere']),true)) ), array('compil'=>array('prive/modeles/pagination_page_precedent_suivant.html','html_66094e21633137b34d204314914f8687','',3,$GLOBALS['spip_lang'])), '') .
	'
')) :
		'') .
'

' .
vide($Pile['vars']['i'] = (is_array($a = ($Pile["vars"])) ? $a['premiere'] : "")) .
(((is_array($a = ($Pile["vars"])) ? $a['i'] : "") <= (is_array($a = ($Pile["vars"])) ? $a['derniere'] : ""))  ?
		(' ' . (	(($t2 = strval(vide($Pile['vars']['item'] = mult(moins((is_array($a = ($Pile["vars"])) ? $a['i'] : ""),'1'),interdire_scripts(entites_html((@$Pile[0]['pas']),true))))))!=='' ?
			('
	' . $t2 . '
	') :
			'') .
	recuperer_fond( 'modeles/paginationitem' , array('num' => (is_array($a = ($Pile["vars"])) ? $a['i'] : "") ,
	'texte' => (is_array($a = ($Pile["vars"])) ? $a['i'] : "") ,
	'separateur' => (is_array($a = ($Pile["vars"])) ? $a['separateur'] : "") ,
	'url' => interdire_scripts(ancre_url(parametre_url(entites_html((@$Pile[0]['url']),true),interdire_scripts(entites_html((@$Pile[0]['debut']),true)),(is_array($a = ($Pile["vars"])) ? $a['item'] : "")),interdire_scripts(entites_html((@$Pile[0]['ancre']),true)))) ,
	'page_courante' => interdire_scripts(entites_html((@$Pile[0]['page_courante']),true)) ,
	'derniere' => (is_array($a = ($Pile["vars"])) ? $a['derniere'] : "") ), array('compil'=>array('prive/modeles/pagination_page_precedent_suivant.html','html_66094e21633137b34d204314914f8687','',7,$GLOBALS['spip_lang'])), '') .
	'
')) :
		'') .
'
' .
vide($Pile['vars']['i'] = plus((is_array($a = ($Pile["vars"])) ? $a['i'] : ""),'1')) .
(((is_array($a = ($Pile["vars"])) ? $a['i'] : "") <= (is_array($a = ($Pile["vars"])) ? $a['derniere'] : ""))  ?
		(' ' . (	(($t2 = strval(vide($Pile['vars']['item'] = mult(moins((is_array($a = ($Pile["vars"])) ? $a['i'] : ""),'1'),interdire_scripts(entites_html((@$Pile[0]['pas']),true))))))!=='' ?
			('
	' . $t2 . '
	') :
			'') .
	recuperer_fond( 'modeles/paginationitem' , array('num' => (is_array($a = ($Pile["vars"])) ? $a['i'] : "") ,
	'texte' => (is_array($a = ($Pile["vars"])) ? $a['i'] : "") ,
	'separateur' => (is_array($a = ($Pile["vars"])) ? $a['separateur'] : "") ,
	'url' => interdire_scripts(ancre_url(parametre_url(entites_html((@$Pile[0]['url']),true),interdire_scripts(entites_html((@$Pile[0]['debut']),true)),(is_array($a = ($Pile["vars"])) ? $a['item'] : "")),interdire_scripts(entites_html((@$Pile[0]['ancre']),true)))) ,
	'page_courante' => interdire_scripts(entites_html((@$Pile[0]['page_courante']),true)) ,
	'derniere' => (is_array($a = ($Pile["vars"])) ? $a['derniere'] : "") ), array('compil'=>array('prive/modeles/pagination_page_precedent_suivant.html','html_66094e21633137b34d204314914f8687','',10,$GLOBALS['spip_lang'])), '') .
	'
')) :
		'') .
'
' .
vide($Pile['vars']['i'] = plus((is_array($a = ($Pile["vars"])) ? $a['i'] : ""),'1')) .
(((is_array($a = ($Pile["vars"])) ? $a['i'] : "") <= (is_array($a = ($Pile["vars"])) ? $a['derniere'] : ""))  ?
		(' ' . (	(($t2 = strval(vide($Pile['vars']['item'] = mult(moins((is_array($a = ($Pile["vars"])) ? $a['i'] : ""),'1'),interdire_scripts(entites_html((@$Pile[0]['pas']),true))))))!=='' ?
			('
	' . $t2 . '
	') :
			'') .
	recuperer_fond( 'modeles/paginationitem' , array('num' => (is_array($a = ($Pile["vars"])) ? $a['i'] : "") ,
	'texte' => (is_array($a = ($Pile["vars"])) ? $a['i'] : "") ,
	'separateur' => (is_array($a = ($Pile["vars"])) ? $a['separateur'] : "") ,
	'url' => interdire_scripts(ancre_url(parametre_url(entites_html((@$Pile[0]['url']),true),interdire_scripts(entites_html((@$Pile[0]['debut']),true)),(is_array($a = ($Pile["vars"])) ? $a['item'] : "")),interdire_scripts(entites_html((@$Pile[0]['ancre']),true)))) ,
	'page_courante' => interdire_scripts(entites_html((@$Pile[0]['page_courante']),true)) ,
	'derniere' => (is_array($a = ($Pile["vars"])) ? $a['derniere'] : "") ), array('compil'=>array('prive/modeles/pagination_page_precedent_suivant.html','html_66094e21633137b34d204314914f8687','',13,$GLOBALS['spip_lang'])), '') .
	'
')) :
		'') .
'
' .
vide($Pile['vars']['i'] = plus((is_array($a = ($Pile["vars"])) ? $a['i'] : ""),'1')) .
(((is_array($a = ($Pile["vars"])) ? $a['i'] : "") <= (is_array($a = ($Pile["vars"])) ? $a['derniere'] : ""))  ?
		(' ' . (	(($t2 = strval(vide($Pile['vars']['item'] = mult(moins((is_array($a = ($Pile["vars"])) ? $a['i'] : ""),'1'),interdire_scripts(entites_html((@$Pile[0]['pas']),true))))))!=='' ?
			('
	' . $t2 . '
	') :
			'') .
	recuperer_fond( 'modeles/paginationitem' , array('num' => (is_array($a = ($Pile["vars"])) ? $a['i'] : "") ,
	'texte' => (is_array($a = ($Pile["vars"])) ? $a['i'] : "") ,
	'separateur' => (is_array($a = ($Pile["vars"])) ? $a['separateur'] : "") ,
	'url' => interdire_scripts(ancre_url(parametre_url(entites_html((@$Pile[0]['url']),true),interdire_scripts(entites_html((@$Pile[0]['debut']),true)),(is_array($a = ($Pile["vars"])) ? $a['item'] : "")),interdire_scripts(entites_html((@$Pile[0]['ancre']),true)))) ,
	'page_courante' => interdire_scripts(entites_html((@$Pile[0]['page_courante']),true)) ,
	'derniere' => (is_array($a = ($Pile["vars"])) ? $a['derniere'] : "") ), array('compil'=>array('prive/modeles/pagination_page_precedent_suivant.html','html_66094e21633137b34d204314914f8687','',16,$GLOBALS['spip_lang'])), '') .
	'
')) :
		'') .
'
' .
vide($Pile['vars']['i'] = plus((is_array($a = ($Pile["vars"])) ? $a['i'] : ""),'1')) .
(((is_array($a = ($Pile["vars"])) ? $a['i'] : "") <= (is_array($a = ($Pile["vars"])) ? $a['derniere'] : ""))  ?
		(' ' . (	(($t2 = strval(vide($Pile['vars']['item'] = mult(moins((is_array($a = ($Pile["vars"])) ? $a['i'] : ""),'1'),interdire_scripts(entites_html((@$Pile[0]['pas']),true))))))!=='' ?
			('
	' . $t2 . '
	') :
			'') .
	recuperer_fond( 'modeles/paginationitem' , array('num' => (is_array($a = ($Pile["vars"])) ? $a['i'] : "") ,
	'texte' => (is_array($a = ($Pile["vars"])) ? $a['i'] : "") ,
	'separateur' => (is_array($a = ($Pile["vars"])) ? $a['separateur'] : "") ,
	'url' => interdire_scripts(ancre_url(parametre_url(entites_html((@$Pile[0]['url']),true),interdire_scripts(entites_html((@$Pile[0]['debut']),true)),(is_array($a = ($Pile["vars"])) ? $a['item'] : "")),interdire_scripts(entites_html((@$Pile[0]['ancre']),true)))) ,
	'page_courante' => interdire_scripts(entites_html((@$Pile[0]['page_courante']),true)) ,
	'derniere' => (is_array($a = ($Pile["vars"])) ? $a['derniere'] : "") ), array('compil'=>array('prive/modeles/pagination_page_precedent_suivant.html','html_66094e21633137b34d204314914f8687','',19,$GLOBALS['spip_lang'])), '') .
	'
')) :
		'') .
'
' .
vide($Pile['vars']['i'] = plus((is_array($a = ($Pile["vars"])) ? $a['i'] : ""),'1')) .
(((is_array($a = ($Pile["vars"])) ? $a['i'] : "") <= (is_array($a = ($Pile["vars"])) ? $a['derniere'] : ""))  ?
		(' ' . (	(($t2 = strval(vide($Pile['vars']['item'] = mult(moins((is_array($a = ($Pile["vars"])) ? $a['i'] : ""),'1'),interdire_scripts(entites_html((@$Pile[0]['pas']),true))))))!=='' ?
			('
	' . $t2 . '
	') :
			'') .
	recuperer_fond( 'modeles/paginationitem' , array('num' => (is_array($a = ($Pile["vars"])) ? $a['i'] : "") ,
	'texte' => (is_array($a = ($Pile["vars"])) ? $a['i'] : "") ,
	'separateur' => (is_array($a = ($Pile["vars"])) ? $a['separateur'] : "") ,
	'url' => interdire_scripts(ancre_url(parametre_url(entites_html((@$Pile[0]['url']),true),interdire_scripts(entites_html((@$Pile[0]['debut']),true)),(is_array($a = ($Pile["vars"])) ? $a['item'] : "")),interdire_scripts(entites_html((@$Pile[0]['ancre']),true)))) ,
	'page_courante' => interdire_scripts(entites_html((@$Pile[0]['page_courante']),true)) ,
	'derniere' => (is_array($a = ($Pile["vars"])) ? $a['derniere'] : "") ), array('compil'=>array('prive/modeles/pagination_page_precedent_suivant.html','html_66094e21633137b34d204314914f8687','',22,$GLOBALS['spip_lang'])), '') .
	'
')) :
		'') .
'
' .
vide($Pile['vars']['i'] = plus((is_array($a = ($Pile["vars"])) ? $a['i'] : ""),'1')) .
(((is_array($a = ($Pile["vars"])) ? $a['i'] : "") <= (is_array($a = ($Pile["vars"])) ? $a['derniere'] : ""))  ?
		(' ' . (	(($t2 = strval(vide($Pile['vars']['item'] = mult(moins((is_array($a = ($Pile["vars"])) ? $a['i'] : ""),'1'),interdire_scripts(entites_html((@$Pile[0]['pas']),true))))))!=='' ?
			('
	' . $t2 . '
	') :
			'') .
	recuperer_fond( 'modeles/paginationitem' , array('num' => (is_array($a = ($Pile["vars"])) ? $a['i'] : "") ,
	'texte' => (is_array($a = ($Pile["vars"])) ? $a['i'] : "") ,
	'separateur' => (is_array($a = ($Pile["vars"])) ? $a['separateur'] : "") ,
	'url' => interdire_scripts(ancre_url(parametre_url(entites_html((@$Pile[0]['url']),true),interdire_scripts(entites_html((@$Pile[0]['debut']),true)),(is_array($a = ($Pile["vars"])) ? $a['item'] : "")),interdire_scripts(entites_html((@$Pile[0]['ancre']),true)))) ,
	'page_courante' => interdire_scripts(entites_html((@$Pile[0]['page_courante']),true)) ,
	'derniere' => (is_array($a = ($Pile["vars"])) ? $a['derniere'] : "") ), array('compil'=>array('prive/modeles/pagination_page_precedent_suivant.html','html_66094e21633137b34d204314914f8687','',25,$GLOBALS['spip_lang'])), '') .
	'
')) :
		'') .
'
' .
vide($Pile['vars']['i'] = plus((is_array($a = ($Pile["vars"])) ? $a['i'] : ""),'1')) .
(((is_array($a = ($Pile["vars"])) ? $a['i'] : "") <= (is_array($a = ($Pile["vars"])) ? $a['derniere'] : ""))  ?
		(' ' . (	(($t2 = strval(vide($Pile['vars']['item'] = mult(moins((is_array($a = ($Pile["vars"])) ? $a['i'] : ""),'1'),interdire_scripts(entites_html((@$Pile[0]['pas']),true))))))!=='' ?
			('
	' . $t2 . '
	') :
			'') .
	recuperer_fond( 'modeles/paginationitem' , array('num' => (is_array($a = ($Pile["vars"])) ? $a['i'] : "") ,
	'texte' => (is_array($a = ($Pile["vars"])) ? $a['i'] : "") ,
	'separateur' => (is_array($a = ($Pile["vars"])) ? $a['separateur'] : "") ,
	'url' => interdire_scripts(ancre_url(parametre_url(entites_html((@$Pile[0]['url']),true),interdire_scripts(entites_html((@$Pile[0]['debut']),true)),(is_array($a = ($Pile["vars"])) ? $a['item'] : "")),interdire_scripts(entites_html((@$Pile[0]['ancre']),true)))) ,
	'page_courante' => interdire_scripts(entites_html((@$Pile[0]['page_courante']),true)) ,
	'derniere' => (is_array($a = ($Pile["vars"])) ? $a['derniere'] : "") ), array('compil'=>array('prive/modeles/pagination_page_precedent_suivant.html','html_66094e21633137b34d204314914f8687','',28,$GLOBALS['spip_lang'])), '') .
	'
')) :
		'') .
'
' .
vide($Pile['vars']['i'] = plus((is_array($a = ($Pile["vars"])) ? $a['i'] : ""),'1')) .
(((is_array($a = ($Pile["vars"])) ? $a['i'] : "") <= (is_array($a = ($Pile["vars"])) ? $a['derniere'] : ""))  ?
		(' ' . (	(($t2 = strval(vide($Pile['vars']['item'] = mult(moins((is_array($a = ($Pile["vars"])) ? $a['i'] : ""),'1'),interdire_scripts(entites_html((@$Pile[0]['pas']),true))))))!=='' ?
			('
	' . $t2 . '
	') :
			'') .
	recuperer_fond( 'modeles/paginationitem' , array('num' => (is_array($a = ($Pile["vars"])) ? $a['i'] : "") ,
	'texte' => (is_array($a = ($Pile["vars"])) ? $a['i'] : "") ,
	'separateur' => (is_array($a = ($Pile["vars"])) ? $a['separateur'] : "") ,
	'url' => interdire_scripts(ancre_url(parametre_url(entites_html((@$Pile[0]['url']),true),interdire_scripts(entites_html((@$Pile[0]['debut']),true)),(is_array($a = ($Pile["vars"])) ? $a['item'] : "")),interdire_scripts(entites_html((@$Pile[0]['ancre']),true)))) ,
	'page_courante' => interdire_scripts(entites_html((@$Pile[0]['page_courante']),true)) ,
	'derniere' => (is_array($a = ($Pile["vars"])) ? $a['derniere'] : "") ), array('compil'=>array('prive/modeles/pagination_page_precedent_suivant.html','html_66094e21633137b34d204314914f8687','',31,$GLOBALS['spip_lang'])), '') .
	'
')) :
		'') .
'
' .
vide($Pile['vars']['i'] = plus((is_array($a = ($Pile["vars"])) ? $a['i'] : ""),'1')) .
(((is_array($a = ($Pile["vars"])) ? $a['i'] : "") <= (is_array($a = ($Pile["vars"])) ? $a['derniere'] : ""))  ?
		(' ' . (	(($t2 = strval(vide($Pile['vars']['item'] = mult(moins((is_array($a = ($Pile["vars"])) ? $a['i'] : ""),'1'),interdire_scripts(entites_html((@$Pile[0]['pas']),true))))))!=='' ?
			('
	' . $t2 . '
	') :
			'') .
	recuperer_fond( 'modeles/paginationitem' , array('num' => (is_array($a = ($Pile["vars"])) ? $a['i'] : "") ,
	'texte' => (is_array($a = ($Pile["vars"])) ? $a['i'] : "") ,
	'separateur' => (is_array($a = ($Pile["vars"])) ? $a['separateur'] : "") ,
	'url' => interdire_scripts(ancre_url(parametre_url(entites_html((@$Pile[0]['url']),true),interdire_scripts(entites_html((@$Pile[0]['debut']),true)),(is_array($a = ($Pile["vars"])) ? $a['item'] : "")),interdire_scripts(entites_html((@$Pile[0]['ancre']),true)))) ,
	'page_courante' => interdire_scripts(entites_html((@$Pile[0]['page_courante']),true)) ,
	'derniere' => (is_array($a = ($Pile["vars"])) ? $a['derniere'] : "") ), array('compil'=>array('prive/modeles/pagination_page_precedent_suivant.html','html_66094e21633137b34d204314914f8687','',34,$GLOBALS['spip_lang'])), '') .
	'
')) :
		'') .
'

' .
vide($Pile['vars']['i'] = interdire_scripts(plus(entites_html((@$Pile[0]['page_courante']),true),'1'))) .
(((is_array($a = ($Pile["vars"])) ? $a['i'] : "") <= interdire_scripts(entites_html((@$Pile[0]['nombre_pages']),true)))  ?
		(' ' . (	(($t2 = strval(vide($Pile['vars']['item'] = mult(moins((is_array($a = ($Pile["vars"])) ? $a['i'] : ""),'1'),interdire_scripts(entites_html((@$Pile[0]['pas']),true))))))!=='' ?
			('
	' . $t2 . '
	') :
			'') .
	(($t2 = strval(recuperer_fond( 'modeles/paginationitem' , array('num' => (is_array($a = ($Pile["vars"])) ? $a['i'] : "") ,
	'texte' => '&gt;' ,
	'separateur' => '' ,
	'url' => interdire_scripts(ancre_url(parametre_url(entites_html((@$Pile[0]['url']),true),interdire_scripts(entites_html((@$Pile[0]['debut']),true)),(is_array($a = ($Pile["vars"])) ? $a['item'] : "")),interdire_scripts(entites_html((@$Pile[0]['ancre']),true)))) ,
	'page_courante' => interdire_scripts(entites_html((@$Pile[0]['page_courante']),true)) ,
	'derniere' => interdire_scripts(entites_html((@$Pile[0]['derniere']),true)) ), array('compil'=>array('prive/modeles/pagination_page_precedent_suivant.html','html_66094e21633137b34d204314914f8687','',38,$GLOBALS['spip_lang'])), '')))!=='' ?
			((is_array($a = ($Pile["vars"])) ? $a['separateur'] : "") . $t2) :
			'') .
	'
')) :
		'') .
'
' .
(((is_array($a = ($Pile["vars"])) ? $a['derniere'] : "") < interdire_scripts(entites_html((@$Pile[0]['nombre_pages']),true)))  ?
		((	(is_array($a = ($Pile["vars"])) ? $a['separateur'] : "") .
	'<a href=\'' .
	interdire_scripts(parametre_url(entites_html((@$Pile[0]['url']),true),interdire_scripts(entites_html((@$Pile[0]['debut']),true)),interdire_scripts(mult(moins(entites_html((@$Pile[0]['nombre_pages']),true),'1'),interdire_scripts(entites_html((@$Pile[0]['pas']),true)))))) .
	'#' .
	interdire_scripts(entites_html((@$Pile[0]['ancre']),true)) .
	'\' class=\'lien_pagination\' rel=\'nofollow\'>') . '...' . '</a>') :
		'') .
'
');

	return analyse_resultat_skel('html_66094e21633137b34d204314914f8687', $Cache, $page, 'prive/modeles/pagination_page_precedent_suivant.html');
}
?>