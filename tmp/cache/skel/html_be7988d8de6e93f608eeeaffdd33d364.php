<?php

/*
 * Squelette : squelettes/sommaire.html
 * Date :      Wed, 16 Mar 2011 17:56:11 GMT
 * Compile :   Fri, 31 Oct 2014 05:40:38 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette squelettes/sommaire.html
// Temps de compilation total: 24.210 ms
//

function html_be7988d8de6e93f608eeeaffdd33d364($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 7200"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">
<head>
	<title>[' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
']</title>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-meta') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/sommaire.html\',\'html_be7988d8de6e93f608eeeaffdd33d364\',\'\',7,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('styles') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/sommaire.html\',\'html_be7988d8de6e93f608eeeaffdd33d364\',\'\',8,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

	' .
(($t1 = strval(interdire_scripts(generer_url_public('ispip'))))!=='' ?
		('<script type="text/javascript">
function iPhoneAlert() {
if((navigator.userAgent.match(/iPhone/i))||(navigator.userAgent.
match(/iPod/i))){
var question = confirm("Souhaitez-vous naviguer sur le site optimisé pour iPhone?")
if (question){
window.location = "' . $t1 . '";
}else{

}
}
}
</script><!-- fin script -->') :
		'') .
'

</head>
<body dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'" class="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
' sommaire"' .
(($t1 = strval(interdire_scripts(((filtre_info_plugin_dist("ispip", "est_actif") == '1') ? 'onload="iPhoneAlert();"':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>
<div id="page" class="sommaire">

<!-- *****************************************************************
	Bandeau, titre du site et menu langue
	Header and main menu (top and right) 
    ************************************************************* -->

  ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bandeau') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/sommaire.html\',\'html_be7988d8de6e93f608eeeaffdd33d364\',\'\',21,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

<!-- *****************************************************************
	Contenu principal (centre)
	Main content (center) 
    ************************************************************* -->
	
  <div id="bloc-contenu">
  
    <div class="edito">
		' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-sommaire-edito') . ', array_merge('.var_export($Pile[0],1).',array(\'self\' => ' . argumenter_squelette(self()) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'squelettes/sommaire.html\',\'html_be7988d8de6e93f608eeeaffdd33d364\',\'\',31,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
		<div id="socialtags"></div>
    </div><!-- edito -->
    
    <h2 class="structure">' .
_T('public/spip/ecrire:articles_recents') .
'</h2>
    ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-sommaire-articles') . ', array_merge('.var_export($Pile[0],1).',array(\'self\' => ' . argumenter_squelette(self()) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'squelettes/sommaire.html\',\'html_be7988d8de6e93f608eeeaffdd33d364\',\'\',36,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
    
     
  </div><!-- bloc-contenu-->

<!-- *****************************************************************
	Menus contextuels (droite)
	Contextual menus (right) 
    ************************************************************* -->
  <div id="encart">  

' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-trad') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/sommaire.html\',\'html_be7988d8de6e93f608eeeaffdd33d364\',\'\',47,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-annonces') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/sommaire.html\',\'html_be7988d8de6e93f608eeeaffdd33d364\',\'\',49,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-breves') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/sommaire.html\',\'html_be7988d8de6e93f608eeeaffdd33d364\',\'\',51,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-syndic') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/sommaire.html\',\'html_be7988d8de6e93f608eeeaffdd33d364\',\'\',53,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

    <!-- Inscription au site -->
    ' .
(($t1 = strval(executer_balise_dynamique('FORMULAIRE_INSCRIPTION',
	array(),
	array('squelettes/sommaire.html','html_be7988d8de6e93f608eeeaffdd33d364','',54,$GLOBALS['spip_lang']))))!=='' ?
		((	'<div class="menu" id="inscription">
        <ul>
          <li><b>' .
	_T('public/spip/ecrire:pass_vousinscrire') .
	'</b>            
            <ul>
              <li>
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

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-menu') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/sommaire.html\',\'html_be7988d8de6e93f608eeeaffdd33d364\',\'\',60,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bas') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/sommaire.html\',\'html_be7988d8de6e93f608eeeaffdd33d364\',\'\',61,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

</div><!-- page-->
</body>
</html>');

	return analyse_resultat_skel('html_be7988d8de6e93f608eeeaffdd33d364', $Cache, $page, 'squelettes/sommaire.html');
}
?>