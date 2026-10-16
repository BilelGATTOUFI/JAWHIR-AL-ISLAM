<?php

/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-menu-agenda.html
 * Date :      Mon, 10 Nov 2014 19:36:06 GMT
 * Compile :   Sun, 12 Jun 2016 08:42:22 GMT
 * Boucles :   _art_agenda
 */ 

/* BOUCLE articles  */

 function BOUCLE_art_agendahtml_effdf984dcd00ba3e9a817da667491bb(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_art_agenda';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_mots_articles','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("articles.id_article");
	static $select = array("articles.date_redac",
		"articles.id_article",
		"articles.texte",
		"articles.descriptif",
		"articles.chapo",
		"articles.titre",
		"articles.lang");
	static $orderby = array('articles.date_redac');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'L2.titre', "'Agenda'"), 
			array('<', 'LEAST((UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(articles.date_redac))/86400,
	TO_DAYS(NOW())-TO_DAYS(articles.date_redac),
	DAYOFMONTH(NOW())-DAYOFMONTH(articles.date_redac)+30.4368*(MONTH(NOW())-MONTH(articles.date_redac))+365.2422*(YEAR(NOW())-YEAR(articles.date_redac)))', "1"), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])));
	static $join = array('L1' => array('articles','id_article'), 'L2' => array('L1','id_mot'));
	static $limit = '0,5';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-menu-agenda.html','html_effdf984dcd00ba3e9a817da667491bb','_art_agenda',4,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
				<li>' .
(($t1 = strval(affdate(normaliser_date($Pile[$SP]['date_redac']))))!=='' ?
		('<span>' . $t1 . (	' ' .
	(($t2 = strval(((heures(normaliser_date($Pile[$SP]['date_redac'])) != '0') ? (	(($t3 = strval(heures(normaliser_date($Pile[$SP]['date_redac']))))!=='' ?
				($t3 . ':') :
				'') .
		minutes(normaliser_date($Pile[$SP]['date_redac']))):'')))!=='' ?
			('- ' . $t2) :
			'') .
	'</span>')) :
		'') .
'
					<a class="lien' .
interdire_scripts(@$Pile[0]['exposer']) .
' article" href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']) OR chapo_redirigetil($Pile[$SP]['chapo']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], 500, $connect))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</a>

				</li>
		');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-menu-agenda.html
// Temps de compilation total: 2.229 ms
//

function html_effdf984dcd00ba3e9a817da667491bb($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'

' .
(($t1 = BOUCLE_art_agendahtml_effdf984dcd00ba3e9a817da667491bb($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
<div class="menu" id="menu-agenda">
	<br />
	<h3 class="structure">' .
		_T('public/spip/ecrire:icone_agenda') .
		'</h3>
	<ul>
		<li>
			<a class="lien" href="' .
		interdire_scripts(generer_url_public('agenda')) .
		'" title="' .
		_T('public/spip/ecrire:icone_agenda') .
		'">' .
		_T('public/spip/ecrire:icone_agenda') .
		'</a>
			<ul>
		') . $t1 . '
			</ul>
		</li>
	</ul>
</div>
') :
		'') .
'

');

	return analyse_resultat_skel('html_effdf984dcd00ba3e9a817da667491bb', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-menu-agenda.html');
}
?>