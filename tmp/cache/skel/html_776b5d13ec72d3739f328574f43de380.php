<?php

/*
 * Squelette : squelettes/article.html
 * Date :      Mon, 10 Nov 2014 19:52:21 GMT
 * Compile :   Sat, 15 Aug 2015 09:59:18 GMT
 * Boucles :   _rubriques_body, _rubriques_chemin, _traductions, _articles_auteur, _auteurs, _mots_eclus, _articles_mots, _mots, _Forums_Boucle, _forums_fils, _forums, _articles_rubrique, _rub_en_cours, _article_principal
 */ 

/* BOUCLE hierarchie  */

 function BOUCLE_rubriques_bodyhtml_776b5d13ec72d3739f328574f43de380(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	if (!($id_rubrique = intval($Pile[$SP]['id_rubrique'])))
		return '';
	$hierarchie = ",$id_rubrique";
	while ($id_rubrique = sql_getfetsel("id_parent","spip_rubriques","id_rubrique=" . $id_rubrique,"","","", "", $connect)) { 
		$hierarchie = ",$id_rubrique$hierarchie";
	}
	if (!$hierarchie) return "";
	$hierarchie = substr($hierarchie,1);
	static $table = 'rubriques';
	static $id = '_rubriques_body';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.lang",
		"rubriques.titre");
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
		 array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_rubriques_body',12,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t1 = (
'rub' .
$Pile[$SP]['id_rubrique']);
		$t0 .= (($t1 && $t0) ? ' ' : '') . $t1;
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE hierarchie  */

 function BOUCLE_rubriques_cheminhtml_776b5d13ec72d3739f328574f43de380(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	if (!($id_rubrique = intval($Pile[$SP]['id_rubrique'])))
		return '';
	$hierarchie = ",$id_rubrique";
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
		 array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_rubriques_chemin',31,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
              <b class=\'separateur\'>&gt;</b> 
              <a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(couper(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))),'60')) .
'</a>
            ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_traductionshtml_776b5d13ec72d3739f328574f43de380(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_traductions';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.lang",
		"articles.id_article",
		"articles.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('OR', 
			array('AND', 
			array('=', 'articles.id_trad', 0), 
			array('=', 'articles.id_article', sql_quote($Pile[$SP]['id_article']))), 
			array('AND', 
			array('>', 'articles.id_trad', 0), 
			array('=', 'articles.id_trad', sql_quote($Pile[$SP]['id_trad'])))), 
			array('!=', 'articles.id_article', sql_quote($Pile[$SP]['id_article'])));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_traductions',38,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t1 = (
'
              ' .
(($t1 = strval(traduire_nom_langue(htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']))))!=='' ?
		((	'<div dir="' .
	lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
	'">') . $t1 . (	' : <a href="' .
	htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
	'/spip.php?action=converser&amp;redirect=' .
	htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
	'%2F' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'&amp;var_lang=' .
	htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'" dir="' .
	lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
	'">')) :
		'') .
(($t1 = strval(interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))))!=='' ?
		($t1 . '</a></div>') :
		'') .
'
            ');
		$t0 .= (($t1 && $t0) ? '<br />' : '') . $t1;
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_articles_auteurhtml_776b5d13ec72d3739f328574f43de380(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_articles_auteur';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_auteurs_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.date",
		"articles.id_article",
		"articles.descriptif",
		"articles.titre",
		"articles.lang");
	static $orderby = array('articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'L1.id_auteur', sql_quote($Pile[$SP]['id_auteur'])), 
			array('!=', 'articles.id_article', sql_quote($Pile[$SP-1]['id_article'])));
	static $join = array('L1' => array('articles','id_article'));
	static $limit = '0,5';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_articles_auteur',87,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
						<li>	
							<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
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



/* BOUCLE auteurs  */

 function BOUCLE_auteurshtml_776b5d13ec72d3739f328574f43de380(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_auteurs';
	static $from = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("auteurs.id_auteur",
		"auteurs.nom");
	static $orderby = array('auteurs.nom');
	$where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('=', 'L1.id_article', sql_quote($Pile[$SP]['id_article'])));
	static $join = array('L1' => array('auteurs','id_auteur'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_auteurs',83,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('public/spip/ecrire:articles_auteur');
	$l2 = _T('public/spip/ecrire:suite');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
				<h4><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_auteur'], 'auteur', '', '', true))) .
'" title="' .
interdire_scripts(typo($Pile[$SP]['nom'], "TYPO", $connect)) .
'">' .
interdire_scripts(typo($Pile[$SP]['nom'], "TYPO", $connect)) .
'</a></h4>	
					' .
(($t1 = BOUCLE_articles_auteurhtml_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
					<h3><em>' .
		$l1 .
		'</em></h3>
					<ul>
						') . $t1 . (	'
						<li><a href="' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_auteur'], 'auteur', '', '', true))) .
		'" title="' .
		$l2 .
		'">[...]</a></li>
					</ul>
					')) :
		'') .
'
				');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE mots  */

 function BOUCLE_mots_eclushtml_776b5d13ec72d3739f328574f43de380(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'mots';
	static $id = '_mots_eclus';
	static $from = array('mots' => 'spip_mots');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.id_mot");
	static $orderby = array();
	$where = 
			array(
			array('REGEXP', 'mots.type', "'^_config'"), 
			array(sql_in('mots.id_mot', $doublons[$doublons_index[]= ('mots')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_mots_eclus',103,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_mot']; // doublons

	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_articles_motshtml_776b5d13ec72d3739f328574f43de380(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_articles_mots';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_mots_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.date",
		"articles.id_article",
		"articles.descriptif",
		"articles.titre",
		"articles.lang");
	static $orderby = array('articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'L1.id_mot', sql_quote($Pile[$SP]['id_mot'])));
	static $join = array('L1' => array('articles','id_article'));
	static $limit = '0,5';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_articles_mots',111,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
								<li>
									<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" title="' .
interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect)))) .
'">' .
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



/* BOUCLE mots  */

 function BOUCLE_motshtml_776b5d13ec72d3739f328574f43de380(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'mots';
	static $id = '_mots';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.id_mot",
		"mots.titre");
	static $orderby = array('mots.titre');
	$where = 
			array(
			array('=', 'L1.id_article', sql_quote($Pile[$SP]['id_article'])), 
			array(sql_in('mots.id_mot', $doublons[$doublons_index[]= ('mots')], 'NOT')));
	static $join = array('L1' => array('mots','id_mot'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_mots',104,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('public/spip/ecrire:info_articles_lies_mot');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_mot']; // doublons

		$t0 .= (
'
					<li>
							<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_mot'], 'mot', '', '', true))) .
'" title="' .
$l1 .
'">' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</a>
						' .
(($t1 = BOUCLE_articles_motshtml_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
						<ul>
							' . $t1 . '
						</ul>
						') :
		'') .
'						
					</li>
				');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE boucle  */

 function BOUCLE_Forums_Bouclehtml_776b5d13ec72d3739f328574f43de380(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$save_numrows = ($Numrows['_forums_fils']);
	$t0 = (($t1 = BOUCLE_forums_filshtml_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
						' . $t1 . '
						') :
		'');
	$Numrows['_forums_fils'] = ($save_numrows);
	return $t0;
}



/* BOUCLE forums  */

 function BOUCLE_forums_filshtml_776b5d13ec72d3739f328574f43de380(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forum';
	static $id = '_forums_fils';
	static $from = array('forum' => 'spip_forum');
	static $type = array();
	static $groupby = array();
	static $select = array("forum.id_forum",
		"forum.date_heure",
		"forum.titre",
		"forum.date_heure AS date",
		"forum.auteur AS nom",
		"forum.texte",
		"forum.url_site",
		"forum.nom_site",
		"forum.id_article",
		"forum.id_breve",
		"forum.id_rubrique",
		"forum.id_syndic");
	static $orderby = array('forum.date_heure');
	$where = 
			array(
			array('=', 'forum.statut', '\'publie\''), 
			array('=', 'forum.id_parent', sql_quote($Pile[$SP]['id_forum'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_forums_fils',149,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('public/spip/ecrire:par_auteur');
	$l2 = _T('public/spip/ecrire:repondre_message');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
						<ul>
							<li>
								<div class="forum">
									<a name="forum' .
$Pile[$SP]['id_forum'] .
'"></a>
									<div class="forum-chapo">
										<div class=" forum-titre">' .
interdire_scripts(supprimer_numero(safehtml(typo($Pile[$SP]['titre'], "TYPO", $connect)))) .
'</div>
										' .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['nom'], "TYPO", $connect))))!=='' ?
		((	', ' .
	$l1 .
	' <strong>') . $t1 . '</strong>') :
		'') .
'
									</div><!-- forum-chapo -->
									<div class=" forum-item">
										' .
interdire_scripts(safehtml(propre(post_autobr($Pile[$SP]['texte']), $connect))) .
'
										' .
(($t1 = strval(safehtml(vider_url(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))))!=='' ?
		('<div class="forum-titre"><a href="' . $t1 . (	'" class="spip_out">' .
	interdire_scripts(safehtml(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect))) .
	'</a></div>')) :
		'') .
'
										' .
(($t1 = strval(url_reponse_forum(htmlspecialchars(
		// refus des forums ?
		(quete_accepter_forum($Pile[$SP]['id_article'])=="non" OR
		($GLOBALS["meta"]["forums_publics"] == "non"
		AND quete_accepter_forum($Pile[$SP]['id_article']) == ""))
		? "" : // sinon:
		(lang_parametres_forum(substr(((!$Pile[$SP]['id_article']) ? '' : ('&id_article='.$Pile[$SP]['id_article'])).
((!$Pile[$SP]['id_breve']) ? '' : ('&id_breve='.$Pile[$SP]['id_breve'])).
((!$Pile[$SP]['id_rubrique']) ? '' : ('&id_rubrique='.$Pile[$SP]['id_rubrique'])).
((!$Pile[$SP]['id_syndic']) ? '' : ('&id_syndic='.$Pile[$SP]['id_syndic'])).
((!$Pile[$SP]['id_forum']) ? '' : ('&id_forum='.$Pile[$SP]['id_forum'])),1),array('id_article' => 'spip_articles','id_breve' => 'spip_breves','id_rubrique' => 'spip_rubriques','id_syndic' => 'spip_syndic')).
	(($lien = (_request("retour") ? _request("retour") : str_replace("&amp;", "&", ''))) ? "&retour=".rawurlencode($lien) : ""))))))!=='' ?
		('<div class="forum-repondre-message"><a href="' . $t1 . (	'">' .
	$l2 .
	'</a></div>')) :
		'') .
'
									</div><!-- forum-item -->
								</div><!-- forum -->
							</li>
						</ul>
							' .
BOUCLE_Forums_Bouclehtml_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons, $Numrows, $SP) .
'
						');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE forums  */

 function BOUCLE_forumshtml_776b5d13ec72d3739f328574f43de380(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forum';
	static $id = '_forums';
	static $from = array('forum' => 'spip_forum');
	static $type = array();
	static $groupby = array();
	static $select = array("forum.id_forum",
		"forum.date_heure",
		"forum.titre",
		"forum.date_heure AS date",
		"forum.auteur AS nom",
		"forum.texte",
		"forum.url_site",
		"forum.nom_site",
		"forum.id_article",
		"forum.id_breve",
		"forum.id_rubrique",
		"forum.id_syndic");
	static $orderby = array('forum.date_heure DESC');
	$where = 
			array(
			array('=', 'forum.statut', '\'publie\''), 
			array('=', 'forum.id_parent', 0), 
			array('=', 'forum.id_article', sql_quote($Pile[$SP]['id_article'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_forums',130,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_forums']['compteur_boucle'] = 0;
	$Numrows['_forums']['total'] = @intval(sql_count($result));
	$debut_boucle = isset($Pile[0]['debut_forums']) ? $Pile[0]['debut_forums'] : _request('debut_forums');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_forums'] = quete_debut_pagination('id_forum',$Pile[0]['@id_forum'] = substr($debut_boucle,1),20,$result,'');
		if (!sql_seek($result,0,'')){
			@sql_free($result,'');
			$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
		}
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_forums']['total']-1)/(20))*(20)));
	$fin_boucle = min(($tout ? $Numrows['_forums']['total'] : $debut_boucle + 19), $Numrows['_forums']['total'] - 1);
	$Numrows['_forums']['grand_total'] = $Numrows['_forums']['total'];
	$Numrows['_forums']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_forums']['grand_total'] AND sql_seek($result,$debut_boucle,'','continue'))
		$Numrows['_forums']['compteur_boucle'] = $debut_boucle;
	
	
	$l1 = _T('public/spip/ecrire:par_auteur');
	$l2 = _T('public/spip/ecrire:repondre_message');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_forums']['compteur_boucle']++;
		if ($Numrows['_forums']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_forums']['compteur_boucle']-1 > $fin_boucle) break;
		$t0 .= (
'
				<li>
					<div class="forum-fil">
						<div class="forum">
							<a name="forum' .
$Pile[$SP]['id_forum'] .
'"></a>
							<div class="forum-chapo">
								<div class=" forum-titre">' .
interdire_scripts(supprimer_numero(safehtml(typo($Pile[$SP]['titre'], "TYPO", $connect)))) .
'</div>
								' .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['nom'], "TYPO", $connect))))!=='' ?
		((	', ' .
	$l1 .
	' <strong>') . $t1 . '</strong>') :
		'') .
'
							</div><!-- forum-chapo -->
							<div class=" forum-item" style="background-color: #ffe;">
								' .
interdire_scripts(safehtml(propre(post_autobr($Pile[$SP]['texte']), $connect))) .
'
								' .
(($t1 = strval(safehtml(vider_url(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))))!=='' ?
		('<div class="forum-titre"><a href="' . $t1 . (	'" class="spip_out">' .
	interdire_scripts(safehtml(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect))) .
	'</a></div>')) :
		'') .
'
								' .
(($t1 = strval(url_reponse_forum(htmlspecialchars(
		// refus des forums ?
		(quete_accepter_forum($Pile[$SP]['id_article'])=="non" OR
		($GLOBALS["meta"]["forums_publics"] == "non"
		AND quete_accepter_forum($Pile[$SP]['id_article']) == ""))
		? "" : // sinon:
		(lang_parametres_forum(substr(((!$Pile[$SP]['id_article']) ? '' : ('&id_article='.$Pile[$SP]['id_article'])).
((!$Pile[$SP]['id_breve']) ? '' : ('&id_breve='.$Pile[$SP]['id_breve'])).
((!$Pile[$SP]['id_rubrique']) ? '' : ('&id_rubrique='.$Pile[$SP]['id_rubrique'])).
((!$Pile[$SP]['id_syndic']) ? '' : ('&id_syndic='.$Pile[$SP]['id_syndic'])).
((!$Pile[$SP]['id_forum']) ? '' : ('&id_forum='.$Pile[$SP]['id_forum'])),1),array('id_article' => 'spip_articles','id_breve' => 'spip_breves','id_rubrique' => 'spip_rubriques','id_syndic' => 'spip_syndic')).
	(($lien = (_request("retour") ? _request("retour") : str_replace("&amp;", "&", ''))) ? "&retour=".rawurlencode($lien) : ""))))))!=='' ?
		('<div class="forum-repondre-message"><a href="' . $t1 . (	'">' .
	$l2 .
	'</a></div>')) :
		'') .
'
							</div><!-- forum-item -->
						</div><!-- forum -->
						' .
(($t1 = BOUCLE_forums_filshtml_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
						' . $t1 . '
						') :
		'') .
'
					</div><!-- forum-fil -->
				</li>
			');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_articles_rubriquehtml_776b5d13ec72d3739f328574f43de380(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'articles';
	static $id = '_articles_rubrique';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("0+articles.titre AS num",
		"articles.date",
		"articles.id_article",
		"articles.descriptif",
		"articles.titre",
		"articles.lang");
	static $orderby = array('num', 'articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','int')), 
			array('NOT', 
			array('=', 'articles.id_article', sql_quote($Pile[$SP]['id_article'],'','int'))), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_articles_rubrique',194,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_articles_rubrique']['compteur_boucle'] = 0;
	$Numrows['_articles_rubrique']['total'] = @intval(sql_count($result));
	$debut_boucle = isset($Pile[0]['debut_articles_rubrique']) ? $Pile[0]['debut_articles_rubrique'] : _request('debut_articles_rubrique');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_articles_rubrique'] = quete_debut_pagination('id_article',$Pile[0]['@id_article'] = substr($debut_boucle,1),15,$result,'');
		if (!sql_seek($result,0,'')){
			@sql_free($result,'');
			$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
		}
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_articles_rubrique']['total']-1)/(15))*(15)));
	$fin_boucle = min(($tout ? $Numrows['_articles_rubrique']['total'] : $debut_boucle + 14), $Numrows['_articles_rubrique']['total'] - 1);
	$Numrows['_articles_rubrique']['grand_total'] = $Numrows['_articles_rubrique']['total'];
	$Numrows['_articles_rubrique']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_articles_rubrique']['grand_total'] AND sql_seek($result,$debut_boucle,'','continue'))
		$Numrows['_articles_rubrique']['compteur_boucle'] = $debut_boucle;
	
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_articles_rubrique']['compteur_boucle']++;
		if ($Numrows['_articles_rubrique']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_articles_rubrique']['compteur_boucle']-1 > $fin_boucle) break;
			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
							<li>
								<a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
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



/* BOUCLE articles  */

 function BOUCLE_rub_en_courshtml_776b5d13ec72d3739f328574f43de380(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_rub_en_cours';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_rubrique",
		"articles.lang",
		"articles.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_article', sql_quote($Pile[$SP]['id_article'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_rub_en_cours',216,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], 'oui', $Pile[$SP]['titre']);
		$t0 .= (
'
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-menu') . ', array(\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/article.html\',\'html_776b5d13ec72d3739f328574f43de380\',\'\',217,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_article_principalhtml_776b5d13ec72d3739f328574f43de380(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'articles';
	static $id = '_article_principal';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_trad",
		"articles.id_article",
		"articles.id_rubrique",
		"articles.lang",
		"articles.titre",
		"articles.id_secteur",
		"articles.surtitre",
		"articles.soustitre",
		"articles.date",
		"articles.chapo",
		"articles.texte",
		"articles.ps",
		"articles.url_site",
		"articles.nom_site");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_article', sql_quote($Pile[0]['id_article'],'','int')), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_article_principal',2,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons

		lang_select_public($Pile[$SP]['lang'], 'oui', $Pile[$SP]['titre']);
		$t0 .= (
'
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'">
<head>
	<title>' .
interdire_scripts(textebrut(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))) .
' - [' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
']</title>
		' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-meta') . ', array(\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/article.html\',\'html_776b5d13ec72d3739f328574f43de380\',\'\',8,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
		' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('styles') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/article.html\',\'html_776b5d13ec72d3739f328574f43de380\',\'\',9,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	
</head>
<body dir="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'" class="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
' article sect' .
$Pile[$SP]['id_secteur'] .
' ' .
BOUCLE_rubriques_bodyhtml_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons, $Numrows, $SP) .
' art' .
$Pile[$SP]['id_article'] .
'">
<div id="page" class="article art' .
$Pile[$SP]['id_article'] .
'">
<!-- *****************************************************************
	Bandeau, titre du site et menu langue
	Header and main menu (top and right) 
    ************************************************************* -->
	
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bandeau') . ', array(\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/article.html\',\'html_776b5d13ec72d3739f328574f43de380\',\'\',19,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>


<!-- *****************************************************************
	Contenu principal (centre)
	Main content (center) 
    ************************************************************* -->

    <div id="bloc-contenu">
      <div class="article-info-rubrique">
        <h5>
        <a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'" title="' .
_T('public/spip/ecrire:accueil_site') .
' : ' .
interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)) .
'">' .
_T('public/spip/ecrire:accueil_site') .
'</a>
        ' .
(($t1 = BOUCLE_rubriques_cheminhtml_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
            ' . $t1) :
		'') .
'
        </h5>

        ' .
(($t1 = BOUCLE_traductionshtml_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
            <div class="petit-info" style="text-align:right">' .
		_T('public/spip/ecrire:titre_langue_trad_article') .
		' 
            ') . $t1 . '
            </div>
        ') :
		'') .
'
        
        <div class="ligne-debut"></div><!-- ligne-debut -->
      </div><!-- article-info-rubrique -->
      
      <div class="cartouche">
			' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'160','0'))))!=='' ?
		('<span style="float:right;">' . $t1 . '</span>') :
		'') .
'
			' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['surtitre'], "TYPO", $connect))))!=='' ?
		((	'<div  class="surtitre">') . $t1 . '</div>') :
		'') .
'
			<h1 class="titre-article">' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</h1>
            ' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['soustitre'], "TYPO", $connect))))!=='' ?
		((	'<div class="sous-titre">') . $t1 . '</div>') :
		'') .
'
      		<div class="detail">
				' .
(($t1 = strval(interdire_scripts(nom_jour(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('<span class="date">' . $t1) :
		'') .
' ' .
(($t1 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		($t1 . '</span>') :
		'') .
' 
				' .
(($t1 = strval(recuperer_fond('modeles/lesauteurs', array('id_article' => $Pile[$SP]['id_article']), array('trim'=>true, 'compil'=>array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_article_principal',53,$GLOBALS['spip_lang'])), '')))!=='' ?
		('<span class="auteurs">par ' . $t1 . '</span>') :
		'') .
'				
     		 </div><!-- detail -->
				
      </div><!-- cartouche -->


		' .
(($t1 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre(nettoyer_chapo($Pile[$SP]['chapo']), $connect),'560','0')))))!=='' ?
		((	'<div class="chapo">') . $t1 . '</div>') :
		'') .
'
		' .
(($t1 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',cs_nettoie(sommaire_d_article(propre($Pile[$SP]['texte'],$connect))),'560','0')))))!=='' ?
		((	'<div class="texte">') . $t1 . '</div>') :
		'') .
'
		' .
(($t1 = strval(interdire_scripts(propre($Pile[$SP]['ps'], $connect))))!=='' ?
		((	'<div class="ps">') . $t1 . '</div>') :
		'') .
'
		
		<iframe src="http://www.facebook.com/plugins/like.php?href=' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'&amp;layout=standard&amp;show_faces=true&amp;width=450&amp;action=like&amp;font=arial&amp;colorscheme=evil" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:450px; height:px"></iframe>
		
		' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		('<div class="notes">' . $t1 . '</div>') :
		'') .
'
		' .
(($t1 = strval(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))!=='' ?
		((	'<div class="chapo">' .
	_T('public/spip/ecrire:voir_en_ligne') .
	' : <a href="') . $t1 . (	'">' .
	interdire_scripts(((($a = typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)) OR (!is_array($a) AND strlen($a))) ? $a : calculer_url($Pile[$SP]['url_site'],'','url', $connect))) .
	'</a></div>')) :
		'') .
'
		<br class="nettoyeur" />


		' .
recuperer_fond( 'inc/inc-art-documents' , array_merge($Pile[0],array('id_article' => $Pile[$SP]['id_article'] )), array('compil'=>array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_article_principal',64,$GLOBALS['spip_lang'])), '') .
'

		' .
(quete_petitions($Pile[$SP]['id_article'],'articles','_article_principal','', $Cache)  ?
		(' ' . 
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-petition') . ', array_merge('.var_export($Pile[0],1).',array(\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'squelettes/article.html\',\'html_776b5d13ec72d3739f328574f43de380\',\'\',65,$GLOBALS[\'spip_lang\']),"ajax"=>true), _request("connect"));
?'.'>') :
		'') .
'
		
		<!-- Derniers articles des auteurs de l\'article -->
		' .
(($t1 = BOUCLE_auteurshtml_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
			<div class="ps" id="articles-recents-auteur">
				' . $t1 . '
			</div><!-- notes chapo -->
		') :
		'') .
'

		<!-- Mots cles -->
		' .
BOUCLE_mots_eclushtml_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons, $Numrows, $SP) .
'
		' .
(($t1 = BOUCLE_motshtml_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<div class="ps" id="mots-cles_associes">
			<h2>' .
		_T('public/spip/ecrire:mots_clefs') .
		'</h2>
			<ul title="' .
		_T('public/spip/ecrire:mots_clefs') .
		'">
				') . $t1 . '
			</ul>
		</div><!-- menu -->
		') :
		'') .
'

		<!-- Forums -->
		' .
(($t1 = strval(url_reponse_forum(htmlspecialchars(
		// refus des forums ?
		(quete_accepter_forum($Pile[$SP]['id_article'])=="non" OR
		($GLOBALS["meta"]["forums_publics"] == "non"
		AND quete_accepter_forum($Pile[$SP]['id_article']) == ""))
		? "" : // sinon:
		(lang_parametres_forum("id_article=".$Pile[$SP]['id_article'],$Pile[$SP]['lang']).
	(($lien = (_request("retour") ? _request("retour") : str_replace("&amp;", "&", ''))) ? "&retour=".rawurlencode($lien) : ""))))))!=='' ?
		('<div class="forum-repondre">
			<h5><a href="' . $t1 . (	'">' .
	_T('public/spip/ecrire:repondre_article') .
	'</a></h5>
		</div>')) :
		'') .
'
		' .
(($t1 = BOUCLE_forumshtml_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<h2 class="structure">' .
		_T('public/spip/ecrire:forum') .
		'</h2>
			' .
		filtre_pagination_dist($Numrows["_forums"]["grand_total"],
 		'_forums',
		isset($Pile[0]['debut_forums'])?$Pile[0]['debut_forums']:intval(_request('debut_forums')),
		20, false, '', '', array()) .
		'
		<ul class="forum-total">
			') . $t1 . (	'
		</ul><!-- forum-total -->
		
		' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_forums"]["grand_total"],
 		'_forums',
		isset($Pile[0]['debut_forums'])?$Pile[0]['debut_forums']:intval(_request('debut_forums')),
		20, true, '', '', array())))!=='' ?
				((	'<div class="pagination">
			<div class="ligne1">
				<div dir="' .
			lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
			'">' .
			$Numrows['_forums']['total'] .
			'/' .
			(isset($Numrows['_forums']['grand_total'])
			? $Numrows['_forums']['grand_total'] : $Numrows['_forums']['total']) .
			' ' .
			_T('public/spip/ecrire:messages_forum') .
			'</div>
			</div>
			<div class="ligne2">
        		') . $t3 . '
			</div>
		</div><!-- pagination -->') :
				'') .
		'

		')) :
		'') .
'
	</div><!-- bloc-contenu -->
	
<!-- *****************************************************************
	Menus contextuels (droite)
	Contextual menus (right) 
    ************************************************************* -->
    <div id="encart"> 
      ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-annonces') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/article.html\',\'html_776b5d13ec72d3739f328574f43de380\',\'\',192,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
		<!-- Derniers articles dans la meme rubrique -->
		' .
(($t1 = BOUCLE_articles_rubriquehtml_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
			<div class="menu" id="articles_meme_rubrique">
			<h2 class="structure">' .
		_T('public/spip/ecrire:articles_recents') .
		'</h2>
				' .
		filtre_pagination_dist($Numrows["_articles_rubrique"]["grand_total"],
 		'_articles_rubrique',
		isset($Pile[0]['debut_articles_rubrique'])?$Pile[0]['debut_articles_rubrique']:intval(_request('debut_articles_rubrique')),
		15, false, '', '', array()) .
		'
				<ul>
					<li>
						<a href="' .
		htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
		'/' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
		'">' .
		_T('public/spip/ecrire:meme_rubrique') .
		'</a>
						<ul>
							') . $t1 . (	'
						</ul>
					</li>
				</ul>
				' .
		filtre_pagination_dist($Numrows["_articles_rubrique"]["grand_total"],
 		'_articles_rubrique',
		isset($Pile[0]['debut_articles_rubrique'])?$Pile[0]['debut_articles_rubrique']:intval(_request('debut_articles_rubrique')),
		15, true, '', '', array()) .
		'
			</div><!-- menu -->
		')) :
		'') .
'

	</div><!-- encart -->
	
' .
BOUCLE_rub_en_courshtml_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons, $Numrows, $SP) .
'
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bas') . ', array(\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
	\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'id_secteur\' => ' . argumenter_squelette($Pile[$SP]['id_secteur']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/article.html\',\'html_776b5d13ec72d3739f328574f43de380\',\'\',219,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</div><!-- page -->

</body>
</html>
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette squelettes/article.html
// Temps de compilation total: 33.493 ms
//

function html_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 7200"); ?>' .
(($t1 = BOUCLE_article_principalhtml_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
' .
	
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('404') . ', array(\'id_article\' => ' . argumenter_squelette(@$Pile[0]['id_article']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/article.html\',\'html_776b5d13ec72d3739f328574f43de380\',\'\',225,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
'))));

	return analyse_resultat_skel('html_776b5d13ec72d3739f328574f43de380', $Cache, $page, 'squelettes/article.html');
}
?>