<?php

/*
 * Squelette : squelettes-dist/identifiants.html
 * Date :      Mon, 10 Nov 2014 19:52:40 GMT
 * Compile :   Wed, 10 Dec 2014 16:41:17 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette squelettes-dist/identifiants.html
// Temps de compilation total: 1.338 ms
//

function html_3d9bc366da97fa81101c6b3605c9b0e4($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
'<'.'?php header("' . (	'Content-Type: text/html' .
	(($t2 = strval(interdire_scripts($GLOBALS['meta']['charset'])))!=='' ?
			('; charset=' . $t2) :
			'')) . '"); ?'.'>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">
<head>
<title>' .
_T('public/spip/ecrire:pass_vousinscrire') .
'</title>
' .
(($t1 = strval(interdire_scripts(attribut_html(couper(propre($GLOBALS['meta']['descriptif_site'], $connect),'150')))))!=='' ?
		('<meta name="description" content="' . $t1 . '" />') :
		'') .
'
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-head') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/identifiants.html\',\'html_3d9bc366da97fa81101c6b3605c9b0e4\',\'\',8,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</head>
<body class="page_sommaire">
' .
executer_balise_dynamique('FORMULAIRE_INSCRIPTION',
	array(interdire_scripts(entites_html((@$Pile[0]['mode']),true)),interdire_scripts(entites_html((@$Pile[0]['focus']),true)),interdire_scripts(entites_html((@$Pile[0]['id_rubrique']),true))),
	array('squelettes-dist/identifiants.html','html_3d9bc366da97fa81101c6b3605c9b0e4','',11,$GLOBALS['spip_lang'])) .
'</body>
</html>
');

	return analyse_resultat_skel('html_3d9bc366da97fa81101c6b3605c9b0e4', $Cache, $page, 'squelettes-dist/identifiants.html');
}
?>