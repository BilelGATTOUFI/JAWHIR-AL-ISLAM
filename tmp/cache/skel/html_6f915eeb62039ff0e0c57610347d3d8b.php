<?php

/*
 * Squelette : ../plugins/auto/enluminures_typographiques_v3/editeur/tableau_edit.html
 * Date :      Mon, 10 Nov 2014 19:38:04 GMT
 * Compile :   Mon, 29 Dec 2014 08:43:39 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/enluminures_typographiques_v3/editeur/tableau_edit.html
// Temps de compilation total: 1.103 ms
//

function html_6f915eeb62039ff0e0c57610347d3d8b($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 86400"); ?>' .
'<!DOCTYPE html PUBLIC \'-//W3C//DTD XHTML 1.0 Transitional//EN\' \'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\'>
<html lang=\'' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'\' dir=\'' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'\'>
  <head>
    <title>Editeur de table</title>
	<meta http-equiv="Content-Type" content="text/html; charset=' .
interdire_scripts($GLOBALS['meta']['charset']) .
'" />
	<link rel="stylesheet" href="' .
interdire_scripts(direction_css(find_in_path('editeur/table.css'))) .
'" type="text/css" media="screen" />
	<script type="text/javascript">
		tableau_edit_images_path = "' .
(($t1 = strval(interdire_scripts(dirname(find_in_path('editeur/table.css')))))!=='' ?
		($t1 . '/') :
		'') .
'";
	</script>
    <script src="' .
interdire_scripts(find_in_path('javascript/spip_barre.js')) .
'" type="text/javascript"></script>
    <script src="' .
interdire_scripts(find_in_path((	'editeur/table' .
	((lang_dir(@$Pile[0]['lang'], 'ltr','rtl') == 'rtl') ? '_rtl':'') .
	'.js'))) .
'" type="text/javascript"></script>
	' .
insert_head_css().pipeline('insert_head','<!-- insert_head -->'). '<?php header("X-Spip-Filtre: '.'compacte_head' . '"); ?'.'>
  </head>
  <body onload="init();">

  <form action="table.html" method="post">
  <div><label><span>' .
_T('enlumtypo:tableau_titre') .
'</span><input id=\'titre_t\' value=\'\' onchange=\'ihm_tableau.titre_t=this.value;\' /></label></div>
  <div><label><span>' .
_T('enlumtypo:tableau_resume') .
'</span><input id=\'resume_t\' value=\'\' onchange=\'ihm_tableau.resume_t=this.value;\' /></label></div>
  </form>
  <div id=\'table\'></div>
  <div id=\'debug\'></div>
  <p>' .
_T('enlumtypo:tableau_prem_ligne') .
'</p>
  <a id="enregistrer" href="javascript:enregistre()">' .
_T('enlumtypo:tableau_enregistrer') .
'</a>
  </body>
</html>
');

	return analyse_resultat_skel('html_6f915eeb62039ff0e0c57610347d3d8b', $Cache, $page, '../plugins/auto/enluminures_typographiques_v3/editeur/tableau_edit.html');
}
?>