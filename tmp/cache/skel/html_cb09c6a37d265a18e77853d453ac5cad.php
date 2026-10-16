<?php

/*
 * Squelette : squelettes/inc/inc-bas.html
 * Date :      Mon, 10 Nov 2014 19:52:23 GMT
 * Compile :   Sun, 12 Jun 2016 08:42:22 GMT
 * Boucles :   _rubriques_chemin, _syndic_rub
 */ 

/* BOUCLE hierarchie  */

 function BOUCLE_rubriques_cheminhtml_cb09c6a37d265a18e77853d453ac5cad(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	if (!($id_rubrique = intval($Pile[0]['id_rubrique'])))
		return '';
	$hierarchie = '';
	while ($id_rubrique = sql_getfetsel("id_parent","spip_rubriques","id_rubrique=" . $id_rubrique,"","","", "", $connect)) { 
		$hierarchie = ",$id_rubrique$hierarchie";
	}
	if (!$hierarchie) return "";
	$hierarchie = substr($hierarchie,1);
	static $table = 'rubriques';
	static $id = '_rubriques_chemin';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.lang");
	$orderby = array("FIELD(rubriques.id_rubrique, $hierarchie)");
	$where = 
			array(
			array('IN', 'rubriques.id_rubrique', "($hierarchie)"));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/inc/inc-bas.html','html_cb09c6a37d265a18e77853d453ac5cad','_rubriques_chemin',15,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t1 = (
'
		<a href="' .
interdire_scripts(generer_url_public('backend',(	'id_rubrique=' .
	$Pile[$SP]['id_rubrique']))) .
'" rel="nofollow" title="' .
_T('public/spip/ecrire:syndiquer_rubrique') .
'"><img src="' .
interdire_scripts(find_in_path('feed.png')) .
'" alt="' .
_T('public/spip/ecrire:icone_suivi_activite') .
'" style="position:relative;bottom:-0.3em;" width="16" height="16" class="format_png" /><span>&nbsp;' .
interdire_scripts(couper(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))),'60')) .
'&nbsp;</span></a>
');
		$t0 .= (($t1 && $t0) ? ' ' : '') . $t1;
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_syndic_rubhtml_cb09c6a37d265a18e77853d453ac5cad(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_syndic_rub';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_rubrique', sql_quote($Pile[0]['id_rubrique'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/inc/inc-bas.html','html_cb09c6a37d265a18e77853d453ac5cad','_syndic_rub',19,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
		<a href="' .
interdire_scripts(generer_url_public('backend',(	'id_rubrique=' .
	$Pile[$SP]['id_rubrique']))) .
'" rel="nofollow" title="' .
_T('public/spip/ecrire:syndiquer_rubrique') .
'"><img src="' .
interdire_scripts(find_in_path('feed.png')) .
'" alt="' .
_T('public/spip/ecrire:icone_suivi_activite') .
'" style="position:relative;bottom:-0.3em;" width="16" height="16" class="format_png" /><span>&nbsp;' .
interdire_scripts(couper(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))),'60')) .
'</span></a>
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette squelettes/inc/inc-bas.html
// Temps de compilation total: 2.641 ms
//

function html_cb09c6a37d265a18e77853d453ac5cad($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
<div id="bas">
	<a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'" title="' .
_T('public/spip/ecrire:accueil_site') .
'">' .
_T('public/spip/ecrire:accueil_site') .
'</a> | 
	<a href="' .
vider_url(urlencode_1738(generer_url_entite('2', 'auteur', '', '', true))) .
'" title="' .
_T('public/spip/ecrire:info_contact') .
'">' .
_T('public/spip/ecrire:info_contact') .
'</a> | <a href="' .
interdire_scripts(generer_url_public('plan')) .
'" title="' .
_T('public/spip/ecrire:plan_site') .
'">' .
_T('public/spip/ecrire:plan_site') .
'</a> | 
 
	<a href="' .
interdire_scripts(generer_url_public('statistiques')) .
'" title="' .
_T('public/spip/ecrire:titre_statistiques') .
'">' .
_T('public/spip/ecrire:icone_statistiques_visites') .
'</a> | 
	<span style="white-space: nowrap;">' .
_T('public/spip/ecrire:info_visites') .
' ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-affvisit') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/inc/inc-bas.html\',\'html_cb09c6a37d265a18e77853d453ac5cad\',\'\',7,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'></span>

	<p>
		<a href="' .
interdire_scripts(generer_url_public('backend')) .
'" rel="nofollow" title="' .
_T('public/spip/ecrire:bouton_radio_syndication') .
' ' .
traduire_nom_langue(htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang'])) .
'"><img src="' .
interdire_scripts(find_in_path('feed.png')) .
'" alt="' .
_T('public/spip/ecrire:icone_suivi_activite') .
'" style="position:relative;bottom:-0.3em;" width="16" height="16" class="format_png" /><span style="text-transform: uppercase;">&nbsp;' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'&nbsp;</span></a>

' .
BOUCLE_rubriques_cheminhtml_cb09c6a37d265a18e77853d453ac5cad($Cache, $Pile, $doublons, $Numrows, $SP) .
'

' .
BOUCLE_syndic_rubhtml_cb09c6a37d265a18e77853d453ac5cad($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	<big>&nbsp;
		<b><a href="http://' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'.wikipedia.org/wiki/Really_Simple_Syndication">?</a></b>
	</big>
	<center>
		<iframe src="http://www.facebook.com/plugins/like.php?href=' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/' .
vider_url(urlencode_1738(generer_url_entite(@$Pile[0]['id_article'], 'article', '', '', true))) .
'&amp;layout=button_count&amp;show_faces=true&amp;width=450&amp;action=recommend&amp;font=segoe+ui&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowTransparency="true"></iframe> 
		<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="Tariqa_Madaniyya" data-lang="fr">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
		</center>
	
	</p>
	
	<p>
 <center><div id="socialtags"></div>

</center>
	</p>

' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bas_cc') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/inc/inc-bas.html\',\'html_cb09c6a37d265a18e77853d453ac5cad\',\'\',38,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

</div><!-- fin bas -->

' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bas_menu-lang') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/inc/inc-bas.html\',\'html_cb09c6a37d265a18e77853d453ac5cad\',\'\',42,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

	' .
"<!-- SPIP-CRON --><div style=\"background-image: url('http://www.mestaoui.tn/spip.php?action=cron');\"></div>" .
'

');

	return analyse_resultat_skel('html_cb09c6a37d265a18e77853d453ac5cad', $Cache, $page, 'squelettes/inc/inc-bas.html');
}
?>