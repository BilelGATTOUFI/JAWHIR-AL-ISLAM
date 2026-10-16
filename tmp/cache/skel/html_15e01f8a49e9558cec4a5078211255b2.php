<?php

/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-menu-principal.html
 * Date :      Mon, 10 Nov 2014 19:36:07 GMT
 * Compile :   Sun, 12 Jun 2016 08:42:22 GMT
 * Boucles :   _article, _rubrique, _art_agenda, _site
 */ 

/* BOUCLE articles  */

 function BOUCLE_articlehtml_15e01f8a49e9558cec4a5078211255b2(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_article';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_mots_articles','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("articles.id_article");
	static $select = array("0+articles.titre AS num",
		"articles.titre",
		"articles.id_article",
		"articles.lang");
	static $orderby = array('num', 'articles.titre');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'L2.titre', "'inclu_menu_principal'"), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])));
	static $join = array('L1' => array('articles','id_article'), 'L2' => array('L1','id_mot'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-menu-principal.html','html_15e01f8a49e9558cec4a5078211255b2','_article',5,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
			' .
(($t1 = strval(interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))))!=='' ?
		((	'<li class="menu-principal-rubriques"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'">') . $t1 . '</a></li>') :
		'') .
'
			');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_rubriquehtml_15e01f8a49e9558cec4a5078211255b2(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_rubrique';
	static $from = array('rubriques' => 'spip_rubriques','L1' => 'spip_mots_rubriques','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("rubriques.id_rubrique");
	static $select = array("0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'L2.titre', "'inclu_menu_principal'"), 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'])));
	static $join = array('L1' => array('rubriques','id_rubrique'), 'L2' => array('L1','id_mot'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-menu-principal.html','html_15e01f8a49e9558cec4a5078211255b2','_rubrique',8,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
			' .
(($t1 = strval(interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))))!=='' ?
		((	'<li class="menu-principal-rubriques"><a href="' .
	(($t2 = strval(htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.'))))!=='' ?
			($t2 . '/') :
			'') .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
	'">') . $t1 . '</a></li>') :
		'') .
'
			');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_art_agendahtml_15e01f8a49e9558cec4a5078211255b2(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_art_agenda';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_mots_articles','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("articles.id_article");
	static $select = array("articles.lang",
		"articles.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'L2.titre', "'Agenda'"), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])));
	static $join = array('L1' => array('articles','id_article'), 'L2' => array('L1','id_mot'));
	static $limit = '0,1';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-menu-principal.html','html_15e01f8a49e9558cec4a5078211255b2','_art_agenda',14,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
			<li id="menu-principal-agenda"><a class="lien" href="' .
interdire_scripts(generer_url_public('agenda')) .
'" title="' .
_T('public/spip/ecrire:icone_agenda') .
'"  accesskey="2">' .
_T('public/spip/ecrire:icone_agenda') .
'</a></li>
			');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE syndication  */

 function BOUCLE_sitehtml_15e01f8a49e9558cec4a5078211255b2(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic';
	static $id = '_site';
	static $from = array('syndic' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("1");
	static $orderby = array();
	static $where = 
			array(
			array('=', 'syndic.statut', '\'publie\''));
	static $join = array();
	static $limit = '0,1';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-menu-principal.html','html_15e01f8a49e9558cec4a5078211255b2','_site',20,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('public/spip/ecrire:nouveautes_web');
	$l2 = _T('public/spip/ecrire:sites_web');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'<li id="menu-principal-sites"><a href="' .
interdire_scripts(generer_url_public('site')) .
'" title="' .
$l1 .
'">' .
$l2 .
'</a></li>');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-menu-principal.html
// Temps de compilation total: 7.280 ms
//

function html_15e01f8a49e9558cec4a5078211255b2($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'	<div class="menu" id="menu-principal">
		<ul>
			<li id="menu-principal-accueil"><a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'" title="' .
_T('public/spip/ecrire:accueil_site') .
' : ' .
interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)) .
'" accesskey="0">' .
_T('public/spip/ecrire:accueil_site') .
'</a></li>

			' .
BOUCLE_articlehtml_15e01f8a49e9558cec4a5078211255b2($Cache, $Pile, $doublons, $Numrows, $SP) .
'
			' .
BOUCLE_rubriquehtml_15e01f8a49e9558cec4a5078211255b2($Cache, $Pile, $doublons, $Numrows, $SP) .
'

			<li id="menu-principal-contact"><a href="' .
vider_url(urlencode_1738(generer_url_entite('1', 'auteur', '', '', true))) .
'" title="' .
_T('public/spip/ecrire:info_contact') .
'"  accesskey="7">' .
_T('public/spip/ecrire:info_contact') .
'</a></li>
			
			' .
BOUCLE_art_agendahtml_15e01f8a49e9558cec4a5078211255b2($Cache, $Pile, $doublons, $Numrows, $SP) .
'			

			<li id="menu-principal-plan"><a href="' .
interdire_scripts(generer_url_public('plan')) .
'" title="' .
_T('public/spip/ecrire:plan_site') .
'" accesskey="3">' .
_T('public/spip/ecrire:plan_site') .
'</a></li>

			' .
BOUCLE_sitehtml_15e01f8a49e9558cec4a5078211255b2($Cache, $Pile, $doublons, $Numrows, $SP) .
'

			<li id="menu-principal-resume"><a href="' .
interdire_scripts(generer_url_public('resume')) .
'" title="' .
_T('public/spip/ecrire:en_resume') .
'" accesskey="5">' .
_T('public/spip/ecrire:en_resume') .
'</a></li>
			
	
			' .
(($t1 = strval(executer_balise_dynamique('FORMULAIRE_RECHERCHE',
	array(),
	array('plugins/auto/ahuntsic/inc/inc-menu-principal.html','html_15e01f8a49e9558cec4a5078211255b2','',0,$GLOBALS['spip_lang']))))!=='' ?
		((	'<li id="menu-principal-recherche">
			<div class="menu" id="menu-recherche">
				<h3 class="structure">' .
	_T('public/spip/ecrire:info_rechercher') .
	'</h3>
					<ul>
						<li>
					') . $t1 . (	'			
						</li>			
					</ul>
			</div><!-- menu-recherche -->
			</li>')) :
		'') .
'
		</ul>
	</div>');

	return analyse_resultat_skel('html_15e01f8a49e9558cec4a5078211255b2', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-menu-principal.html');
}
?>