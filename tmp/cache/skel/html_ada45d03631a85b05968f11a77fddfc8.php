<?php

/*
 * Squelette : plugins/auto/ahuntsic/404.html
 * Date :      Mon, 10 Nov 2014 19:34:36 GMT
 * Compile :   Thu, 27 Nov 2014 16:07:28 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette plugins/auto/ahuntsic/404.html
// Temps de compilation total: 34.957 ms
//

function html_ada45d03631a85b05968f11a77fddfc8($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<'.'?php header("' . 'Cache-Control: no-store, no-cache, must-revalidate' . '"); ?'.'>' .
'<'.'?php header("' . 'Pragma: no-cache' . '"); ?'.'><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">
<head>
	<title>' .
_T('public/spip/ecrire:pass_erreur') .
' 404 - ' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
'</title>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-meta') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/404.html\',\'html_ada45d03631a85b05968f11a77fddfc8\',\'\',8,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('styles') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/404.html\',\'html_ada45d03631a85b05968f11a77fddfc8\',\'\',9,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</head>
<body dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">
<div id="page">

<!-- *****************************************************************
	Entete et menu principal (haut et droite)
	Header and main menu (top and right) 
    ************************************************************* -->
	
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bandeau') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/404.html\',\'html_ada45d03631a85b05968f11a77fddfc8\',\'\',19,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

<div id="principal">
	
<!-- *****************************************************************
	Contenu principal (centre)
	Main content (center) 
    ************************************************************* -->
	<div id="bloc-contenu">		
		<div class="cartouche">
			<h1 class="titre-article">' .
_T('public/spip/ecrire:pass_erreur') .
' 404</h1>
      <h2>' .
_T('public/spip/ecrire:info_erreur_requete') .
' ' .
_T('public/spip/ecrire:avis_aucun_resultat') .
'</h2>
      ' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['erreur']),true))))!=='' ?
		('<p>' . $t1 . '</p>') :
		'') .
'
		</div><!-- cartouche -->
		<div class="chapo">
			' .
_T('public/spip/ecrire:avis_chemin_invalide_1') .
'
			' .
_T('public/spip/ecrire:avis_chemin_invalide_2') .
'
		</div>
		<div class="texte">

			<h2>' .
_T('public/spip/ecrire:bouton_choisir') .
'</h2> 
			<ul>
				<li>
					<a href="javascript:history.back()">' .
_T('public/spip/ecrire:page_precedente') .
'</a> 
				</li>
				<li>
					<a href="' .
interdire_scripts(generer_url_public('recherche')) .
'">' .
_T('public/spip/ecrire:info_rechercher') .
'</a> 
				</li>
				<li>
					<a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'">' .
_T('public/spip/ecrire:accueil_site') .
'</a> 
				</li>
				<li>
					<a href="' .
interdire_scripts(generer_url_public('plan')) .
'">' .
_T('public/spip/ecrire:plan_site') .
'</a> 
				</li>
			</ul>
		</div>
	</div><!-- bloc-contenu -->


<!-- *****************************************************************
	Menus contextuels (gauche)
	Contextual menus (left) 
    ************************************************************* -->
	<div id="encart">	

' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-breves') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/404.html\',\'html_ada45d03631a85b05968f11a77fddfc8\',\'\',64,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-syndic') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/404.html\',\'html_ada45d03631a85b05968f11a77fddfc8\',\'\',66,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

    <!-- Inscription au site -->
    ' .
(($t1 = strval(executer_balise_dynamique('FORMULAIRE_INSCRIPTION',
	array(),
	array('plugins/auto/ahuntsic/404.html','html_ada45d03631a85b05968f11a77fddfc8','',63,$GLOBALS['spip_lang']))))!=='' ?
		((	'<div class="menu">
        <ul>
          <li><b>' .
	_T('public/spip/ecrire:pass_vousinscrire') .
	'</b>            
            <ul>
              <li>
                <span>' .
	_T('public/spip/ecrire:participer_site') .
	'</span>
                ') . $t1 . '
              </li>
            </ul>
          </li>
        </ul>
    </div><!-- menu -->') :
		'') .
'

	</div><!-- encart -->
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-menu') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/404.html\',\'html_ada45d03631a85b05968f11a77fddfc8\',\'\',72,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</div><!-- principal -->

<!-- *****************************************************************
	Pied-de-page (bas)
	Footer (bottom) 
    ************************************************************* -->
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bas') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/404.html\',\'html_ada45d03631a85b05968f11a77fddfc8\',\'\',79,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</div><!-- page -->

</body>
</html>');

	return analyse_resultat_skel('html_ada45d03631a85b05968f11a77fddfc8', $Cache, $page, 'plugins/auto/ahuntsic/404.html');
}
?>