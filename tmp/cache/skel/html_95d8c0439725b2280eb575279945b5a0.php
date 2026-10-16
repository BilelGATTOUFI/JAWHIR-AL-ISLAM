<?php

/*
 * Squelette : ../plugins/auto/saisies/saisies.css.html
 * Date :      Fri, 04 Feb 2011 09:00:04 GMT
 * Compile :   Fri, 31 Oct 2014 05:26:12 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/saisies/saisies.css.html
// Temps de compilation total: 15.884 ms
//

function html_95d8c0439725b2280eb575279945b5a0($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 360000"); ?>'.'<?php header("Cache-Control: max-age=360000"); ?>'.'<?php header("X-Spip-Statique: oui"); ?>' .
'<'.'?php header("' . 'Content-Type: text/css; charset=iso-8859-15' . '"); ?'.'>' .
'<'.'?php header("' . 'Vary: Accept-Encoding' . '"); ?'.'>' .
vide($Pile['vars']['left'] = choixsiegal(lang_dir(@$Pile[0]['lang'], 'ltr','rtl'),'ltr','left','right')) .
vide($Pile['vars']['right'] = choixsiegal(lang_dir(@$Pile[0]['lang'], 'ltr','rtl'),'ltr','right','left')) .
vide($Pile['vars']['fleche'] = choixsiegal(lang_dir(@$Pile[0]['lang'], 'ltr','rtl'),'ltr',interdire_scripts(find_in_path('images/deplierhaut.gif')),interdire_scripts(find_in_path('images/deplierhaut_rtl.gif')))) .
'li.fieldset.pliable > fieldset > h3{
	cursor:pointer;
}

li.fieldset.pliable > fieldset > h3 span{
	padding-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
':15px;
	background:transparent url(' .
interdire_scripts(find_in_path('images/deplierbas.gif')) .
') ' .
(($t1 = strval((is_array($a = ($Pile["vars"])) ? $a['left'] : "")))!=='' ?
		($t1 . ' ') :
		'') .
'center no-repeat;
}

li.fieldset.plie > fieldset > h3 span{
	background-image:url(' .
(is_array($a = ($Pile["vars"])) ? $a['fleche'] : "") .
');
}


.saisie_date_jour_mois_annee .choix {float:left;}
.saisie_date_jour_mois_annee .choix+.choix {margin-left:1em;}
.saisie_date_jour_mois_annee .choix label{display:block; width:auto;}
.saisie_date_jour_mois_annee .choix .text{width:auto;}


' .
(($t1 = strval(interdire_scripts(((find_in_path('prive/style_prive_plugin_bonux.html')) ?' ' :''))))!=='' ?
		($t1 . (	' 
  ' .
	recuperer_fond( 'prive/style_prive_plugin_bonux' , array('ltr' => lang_dir(@$Pile[0]['lang'], 'left','right') ), array('compil'=>array('../plugins/auto/saisies/saisies.css.html','html_95d8c0439725b2280eb575279945b5a0','',17,$GLOBALS['spip_lang'])), '') .
	'
')) :
		'') .
'


.formulaire_spip li.selecteur_item > label {
	float:none;
}

.formulaire_spip li.selecteur_item div.choix label {
	float:none;
   display:inline;
}');

	return analyse_resultat_skel('html_95d8c0439725b2280eb575279945b5a0', $Cache, $page, '../plugins/auto/saisies/saisies.css.html');
}
?>