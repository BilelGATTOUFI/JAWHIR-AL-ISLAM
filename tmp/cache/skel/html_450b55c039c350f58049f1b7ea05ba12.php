<?php

/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-sommaire-edito.html
 * Date :      Tue, 27 Jul 2010 09:45:34 GMT
 * Compile :   Fri, 31 Oct 2014 05:40:39 GMT
 * Boucles :   _articles_edito, _articles_edito2, _rub_first, _rubriques_edito
 */ 

/* BOUCLE articles  */

 function BOUCLE_articles_editohtml_450b55c039c350f58049f1b7ea05ba12(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[0]['lang']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	static $table = 'articles';
	static $id = '_articles_edito';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_mots_articles','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("articles.id_article");
	static $select = array("articles.date",
		"articles.titre",
		"articles.id_article",
		"articles.id_rubrique",
		"articles.descriptif",
		"articles.chapo",
		"articles.texte",
		"articles.lang");
	static $orderby = array('articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), (!(is_array($Pile[0]['lang'])?count($Pile[0]['lang']):strlen($Pile[0]['lang'])) ? '' : ((is_array($Pile[0]['lang'])) ? sql_in('articles.lang',sql_quote($in)) : 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])))), 
			array('=', 'L2.titre', "'Editorial'"));
	static $join = array('L1' => array('articles','id_article'), 'L2' => array('L1','id_mot'));
	static $limit = '0,10';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-sommaire-edito.html','html_450b55c039c350f58049f1b7ea05ba12','_articles_edito',20,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	  <br class="nettoyeur" />
      ' .
(($t1 = strval(interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))))!=='' ?
		((	'<h3 class="edito-titre"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'">') . $t1 . '</a></h3>') :
		'') .
'
	  ' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',(strlen($logo=
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],$Pile[$SP]['id_rubrique'], 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')))?'<a href="' .vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) . '">' . $logo . '</a>':''),'150','0'))))!=='' ?
		('<div class="logo-liste-art">
		' . $t1 . '
	  </div>') :
		'') .
'

	  ' .
(($t1 = strval(interdire_scripts((propre($Pile[$SP]['descriptif'], $connect) ? (	(($t2 = strval(interdire_scripts(propre($Pile[$SP]['descriptif'], $connect))))!=='' ?
			((	'<div class="">') . $t2 . '</div>') :
			'') .
	'
		'):(	interdire_scripts((propre(nettoyer_chapo($Pile[$SP]['chapo']), $connect) ? (	(($t3 = strval(interdire_scripts(propre(nettoyer_chapo($Pile[$SP]['chapo']), $connect))))!=='' ?
				((	'<div class="">') . $t3 . '</div>') :
				'') .
		'
      		'):(	(($t3 = strval(interdire_scripts(couper(cs_nettoie(sommaire_d_article(propre($Pile[$SP]['texte'],$connect))),'300'))))!=='' ?
				((	'<div class="">') . $t3 . '</div>') :
				'') .
		'
		'))) .
	'
	')))))!=='' ?
		('<div class="chapo">' . $t1 . (	'	<div class="suite"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'" title="...' .
	_T('public/spip/ecrire:suite') .
	' : ' .
	interdire_scripts(attribut_html(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))) .
	'" >' .
	_T('public/spip/ecrire:suite') .
	'</a></div>
	</div><!-- fin chapo -->')) :
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

 function BOUCLE_articles_edito2html_450b55c039c350f58049f1b7ea05ba12(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[0]['lang']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	static $table = 'articles';
	static $id = '_articles_edito2';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_mots_articles','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("articles.id_article");
	static $select = array("articles.date",
		"articles.titre",
		"articles.id_article",
		"articles.id_rubrique",
		"articles.descriptif",
		"articles.chapo",
		"articles.texte",
		"articles.lang");
	static $orderby = array('articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), (!(is_array($Pile[0]['lang'])?count($Pile[0]['lang']):strlen($Pile[0]['lang'])) ? '' : ((is_array($Pile[0]['lang'])) ? sql_in('articles.lang',sql_quote($in)) : 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])))), 
			array('=', 'L2.titre', "'Editorial'"));
	static $join = array('L1' => array('articles','id_article'), 'L2' => array('L1','id_mot'));
	static $limit = '0,10';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-sommaire-edito.html','html_450b55c039c350f58049f1b7ea05ba12','_articles_edito2',60,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	  <br class="nettoyeur" />
      ' .
(($t1 = strval(interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))))!=='' ?
		((	'<h3 class="edito-titre"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'">') . $t1 . '</a></h3>') :
		'') .
'
	  ' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',(strlen($logo=
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],$Pile[$SP]['id_rubrique'], 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')))?'<a href="' .vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) . '">' . $logo . '</a>':''),'150','0'))))!=='' ?
		('<div class="logo-liste-art">
		' . $t1 . '
	  </div>') :
		'') .
'

	  ' .
(($t1 = strval(interdire_scripts((propre($Pile[$SP]['descriptif'], $connect) ? (	(($t2 = strval(interdire_scripts(propre($Pile[$SP]['descriptif'], $connect))))!=='' ?
			((	'<div class="">') . $t2 . '</div>') :
			'') .
	'
		'):(	interdire_scripts((propre(nettoyer_chapo($Pile[$SP]['chapo']), $connect) ? (	(($t3 = strval(interdire_scripts(propre(nettoyer_chapo($Pile[$SP]['chapo']), $connect))))!=='' ?
				((	'<div class="">') . $t3 . '</div>') :
				'') .
		'
      		'):(	(($t3 = strval(interdire_scripts(couper(cs_nettoie(sommaire_d_article(propre($Pile[$SP]['texte'],$connect))),'300'))))!=='' ?
				((	'<div class="">') . $t3 . '</div>') :
				'') .
		'
		'))) .
	'
	')))))!=='' ?
		('<div class="chapo">' . $t1 . (	'	<div class="suite"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'" title="...' .
	_T('public/spip/ecrire:suite') .
	' : ' .
	interdire_scripts(attribut_html(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))) .
	'" >' .
	_T('public/spip/ecrire:suite') .
	'</a></div>
	</div><!-- fin chapo -->')) :
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

 function BOUCLE_rub_firsthtml_450b55c039c350f58049f1b7ea05ba12(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[0]['lang']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	static $table = 'rubriques';
	static $id = '_rub_first';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.descriptif",
		"rubriques.texte",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', 0), (!(is_array($Pile[0]['lang'])?count($Pile[0]['lang']):strlen($Pile[0]['lang'])) ? '' : ((is_array($Pile[0]['lang'])) ? sql_in('rubriques.lang',sql_quote($in)) : 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'])))));
	static $join = array();
	static $limit = '0,1';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-sommaire-edito.html','html_450b55c039c350f58049f1b7ea05ba12','_rub_first',44,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'

' .
interdire_scripts((propre($GLOBALS['meta']['descriptif_site'], $connect) ? (	(($t2 = strval(interdire_scripts(propre($GLOBALS['meta']['descriptif_site'], $connect))))!=='' ?
			((	'<h3 class="edito-titre descriptif-site">' .
		interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)) .
		'</h3>
		<div class="chapo descriptif_site">') . $t2 . '</div>') :
			'') .
	'
	'):(	(($t2 = strval(interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))))!=='' ?
			((	'<h3 class="edito-titre"><a href="' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
		'">') . $t2 . '</a></h3>') :
			'') .
	'
        ' .
	(($t2 = strval(filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'120','0'))))!=='' ?
			((	'<span style="float:right;"><a href="' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
		'">') . $t2 . '</a></span>') :
			'') .
	'
        ' .
	(($t2 = strval(interdire_scripts(((($a = propre($Pile[$SP]['descriptif'], $connect)) OR (!is_array($a) AND strlen($a))) ? $a : interdire_scripts(cs_nettoie(sommaire_d_article(propre($Pile[$SP]['texte'],$connect))))))))!=='' ?
			((	'<div class="chapo ' .
		interdire_scripts(($Pile[$SP]['descriptif'] ? '':'')) .
		'">
        	') . $t2 . '
        	<div style="clear: both; height: .1em;">&nbsp;</div>
        </div>') :
			'') .
	'
'))) .
'
	');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_rubriques_editohtml_450b55c039c350f58049f1b7ea05ba12(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[0]['lang']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	static $table = 'rubriques';
	static $id = '_rubriques_edito';
	static $from = array('rubriques' => 'spip_rubriques','L1' => 'spip_mots_rubriques','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("rubriques.id_rubrique");
	static $select = array("0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.descriptif",
		"rubriques.texte",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), (!(is_array($Pile[0]['lang'])?count($Pile[0]['lang']):strlen($Pile[0]['lang'])) ? '' : ((is_array($Pile[0]['lang'])) ? sql_in('rubriques.lang',sql_quote($in)) : 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'])))), 
			array('=', 'L2.titre', "'Editorial'"));
	static $join = array('L1' => array('rubriques','id_rubrique'), 'L2' => array('L1','id_mot'));
	static $limit = '0,10';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-sommaire-edito.html','html_450b55c039c350f58049f1b7ea05ba12','_rubriques_edito',8,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	  <br class="nettoyeur" />
      ' .
(($t1 = strval(interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))))!=='' ?
		((	'<h3 class="edito-titre"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
	'">') . $t1 . '</a></h3>') :
		'') .
'
	  ' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',(strlen($logo=
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')))?'<a href="' .vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) . '">' . $logo . '</a>':''),'150','0'))))!=='' ?
		('<div class="logo-liste-art">
		' . $t1 . '
	  </div>') :
		'') .
'
      ' .
(($t1 = strval(interdire_scripts(((($a = propre($Pile[$SP]['descriptif'], $connect)) OR (!is_array($a) AND strlen($a))) ? $a : interdire_scripts(cs_nettoie(sommaire_d_article(propre($Pile[$SP]['texte'],$connect))))))))!=='' ?
		((	'<div class="chapo ' .
	interdire_scripts(($Pile[$SP]['descriptif'] ? '':'')) .
	'">') . $t1 . '
        	<div style="clear: both; height: .1em;">&nbsp;</div>
       </div>') :
		'') .
'
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-sommaire-edito.html
// Temps de compilation total: 52.313 ms
//

function html_450b55c039c350f58049f1b7ea05ba12($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'   
' .
(($t1 = BOUCLE_rubriques_editohtml_450b55c039c350f58049f1b7ea05ba12($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
' . $t1 . (	'

	' .
		(($t3 = BOUCLE_articles_editohtml_450b55c039c350f58049f1b7ea05ba12($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
				('
	' . $t3 . '
	') :
				'') .
		'

')) :
		((	'

	' .
	(($t2 = BOUCLE_rub_firsthtml_450b55c039c350f58049f1b7ea05ba12($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			('
	' . $t2 . (	'

	' .
			(($t4 = BOUCLE_articles_edito2html_450b55c039c350f58049f1b7ea05ba12($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
					('
	' . $t4 . '
	') :
					'') .
			'

	')) :
			((	'
	' .
		
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-install') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/inc/inc-sommaire-edito.html\',\'html_450b55c039c350f58049f1b7ea05ba12\',\'\',83,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	'))) .
	'
	'))) .
'
    ');

	return analyse_resultat_skel('html_450b55c039c350f58049f1b7ea05ba12', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-sommaire-edito.html');
}
?>