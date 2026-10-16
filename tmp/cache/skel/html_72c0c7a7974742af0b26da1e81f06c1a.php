<?php

/*
 * Squelette : plugins/auto/ahuntsic/recherche.html
 * Date :      Mon, 10 Nov 2014 19:34:41 GMT
 * Compile :   Sat, 06 Dec 2014 23:54:15 GMT
 * Boucles :   _rubriques, _auteurs_articles, _articles, _mots_result, _auteurs_result, _sites_result, _forums_result, _breves_result, _art_result, _rub_result, _mots, _breves, _auteurs, _sites, _messages
 */ 

/* BOUCLE rubriques  */

 function BOUCLE_rubriqueshtml_72c0c7a7974742af0b26da1e81f06c1a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = ''; 
	// RECHERCHE
	$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
	list($rech_select, $rech_where) = $prepare_recherche(@$Pile[0]["recherche"], "rubriques", "","", "true");
	
	static $table = 'rubriques';
	static $id = '_rubriques';
	static $from = array('rubriques' => 'spip_rubriques','resultats' => 'spip_resultats');
	static $type = array();
	static $groupby = array();
	$select = array("rubriques.id_rubrique",
		"$rech_select",
		"rubriques.lang",
		"rubriques.descriptif",
		"rubriques.titre");
	static $orderby = array('points DESC');
	$where = 
			array($rech_where?$rech_where:'');
	static $join = array('resultats' => array('rubriques','id','id_rubrique'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/recherche.html','html_72c0c7a7974742af0b26da1e81f06c1a','_rubriques',28,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_rubriques']['total'] = @intval(sql_count($result));
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
      <h3><a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/spip.php?action=converser&amp;redirect=' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'%2F' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'&amp;var_lang=' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" hreflang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'"' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</a> ' .
(($t1 = strval(htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
		('<dfn><small>&#8212; ' . $t1 . '</small></dfn>') :
		'') .
'</h3>
    ');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE auteurs  */

 function BOUCLE_auteurs_articleshtml_72c0c7a7974742af0b26da1e81f06c1a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_auteurs_articles';
	static $from = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("auteurs.nom");
	static $orderby = array();
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
		 array('plugins/auto/ahuntsic/recherche.html','html_72c0c7a7974742af0b26da1e81f06c1a','_auteurs_articles',41,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t1 = interdire_scripts(typo($Pile[$SP]['nom'], "TYPO", $connect));
		$t0 .= (($t1 && $t0) ? ', ' : '') . $t1;
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_articleshtml_72c0c7a7974742af0b26da1e81f06c1a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = ''; 
	// RECHERCHE
	$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
	list($rech_select, $rech_where) = $prepare_recherche(@$Pile[0]["recherche"], "articles", "","", "true");
	
	static $table = 'articles';
	static $id = '_articles';
	static $from = array('articles' => 'spip_articles','resultats' => 'spip_resultats');
	static $type = array();
	static $groupby = array();
	$select = array("articles.id_article",
		"$rech_select",
		"articles.lang",
		"articles.descriptif",
		"articles.titre",
		"articles.date");
	static $orderby = array('points DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), $rech_where?$rech_where:'');
	static $join = array('resultats' => array('articles','id','id_article'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/recherche.html','html_72c0c7a7974742af0b26da1e81f06c1a','_articles',35,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_articles']['total'] = @intval(sql_count($result));
	
	$l1 = _T('public/spip/ecrire:par_auteur');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
      <h3><a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/spip.php?action=converser&amp;redirect=' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'%2F' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'&amp;var_lang=' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" hreflang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</a></h3>
      <div class="detail">
        ' .
interdire_scripts(nom_jour(normaliser_date($Pile[$SP]['date']))) .
' ' .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
'
        ' .
(($t1 = BOUCLE_auteurs_articleshtml_72c0c7a7974742af0b26da1e81f06c1a($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	$l1 .
		' ') . $t1) :
		'') .
' - ' .
(($t1 = strval(traduire_nom_langue(htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']))))!=='' ?
		('<dfn>' . $t1 . '</dfn>') :
		'') .
'
      </div><!-- detail -->
      <br />
    ');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE auteurs  */

 function BOUCLE_mots_resulthtml_72c0c7a7974742af0b26da1e81f06c1a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = ''; 
	// RECHERCHE
	$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
	list($rech_select, $rech_where) = $prepare_recherche(@$Pile[0]["recherche"], "auteurs", "","", "false");
	
	static $table = 'auteurs';
	static $id = '_mots_result';
	static $from = array('auteurs' => 'spip_auteurs','resultats' => 'spip_resultats','L1' => 'spip_auteurs_articles','L2' => 'spip_articles');
	static $type = array();
	static $groupby = array("auteurs.id_auteur");
	$select = array("auteurs.id_auteur",
		"$rech_select");
	static $orderby = array('points DESC');
	$where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('<=', 'L2.date', sql_quote(quete_date_postdates())), 
			array('=', 'L2.statut', '\'publie\''), $rech_where?$rech_where:'');
	static $join = array('resultats' => array('auteurs','id','id_auteur'), 'L1' => array('auteurs','id_auteur'), 'L2' => array('L1','id_article'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/recherche.html','html_72c0c7a7974742af0b26da1e81f06c1a','_mots_result',49,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_mots_result']['total'] = @intval(sql_count($result));
	$SP++;
	// RESULTATS
	
	$t0 = str_repeat(' ', $Numrows['_mots_result']['total']);
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE auteurs  */

 function BOUCLE_auteurs_resulthtml_72c0c7a7974742af0b26da1e81f06c1a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = ''; 
	// RECHERCHE
	$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
	list($rech_select, $rech_where) = $prepare_recherche(@$Pile[0]["recherche"], "auteurs", "","", "false");
	
	static $table = 'auteurs';
	static $id = '_auteurs_result';
	static $from = array('auteurs' => 'spip_auteurs','resultats' => 'spip_resultats','L1' => 'spip_auteurs_articles','L2' => 'spip_articles');
	static $type = array();
	static $groupby = array("auteurs.id_auteur");
	$select = array("auteurs.id_auteur",
		"$rech_select");
	static $orderby = array('points DESC');
	$where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('<=', 'L2.date', sql_quote(quete_date_postdates())), 
			array('=', 'L2.statut', '\'publie\''), $rech_where?$rech_where:'');
	static $join = array('resultats' => array('auteurs','id','id_auteur'), 'L1' => array('auteurs','id_auteur'), 'L2' => array('L1','id_article'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/recherche.html','html_72c0c7a7974742af0b26da1e81f06c1a','_auteurs_result',49,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_auteurs_result']['total'] = @intval(sql_count($result));
	$SP++;
	// RESULTATS
	
	$t0 = str_repeat(' ', $Numrows['_auteurs_result']['total']);
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE syndication  */

 function BOUCLE_sites_resulthtml_72c0c7a7974742af0b26da1e81f06c1a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = ''; 
	// RECHERCHE
	$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
	list($rech_select, $rech_where) = $prepare_recherche(@$Pile[0]["recherche"], "syndic", "","", "false");
	
	static $table = 'syndic';
	static $id = '_sites_result';
	static $from = array('syndic' => 'spip_syndic','resultats' => 'spip_resultats');
	static $type = array();
	static $groupby = array();
	$select = array("syndic.id_syndic",
		"$rech_select");
	static $orderby = array('points DESC');
	$where = 
			array(
			array('=', 'syndic.statut', '\'publie\''), $rech_where?$rech_where:'');
	static $join = array('resultats' => array('syndic','id','id_syndic'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/recherche.html','html_72c0c7a7974742af0b26da1e81f06c1a','_sites_result',49,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_sites_result']['total'] = @intval(sql_count($result));
	$SP++;
	// RESULTATS
	
	$t0 = str_repeat(' ', $Numrows['_sites_result']['total']);
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE forums  */

 function BOUCLE_forums_resulthtml_72c0c7a7974742af0b26da1e81f06c1a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = ''; 
	// RECHERCHE
	$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
	list($rech_select, $rech_where) = $prepare_recherche(@$Pile[0]["recherche"], "forum", "","", "false");
	
	static $table = 'forum';
	static $id = '_forums_result';
	static $from = array('forum' => 'spip_forum','resultats' => 'spip_resultats');
	static $type = array();
	static $groupby = array();
	$select = array("forum.id_forum",
		"$rech_select");
	static $orderby = array('points DESC');
	$where = 
			array(
			array('=', 'forum.statut', '\'publie\''), 
			array('=', 'forum.id_parent', 0), $rech_where?$rech_where:'');
	static $join = array('resultats' => array('forum','id','id_forum'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/recherche.html','html_72c0c7a7974742af0b26da1e81f06c1a','_forums_result',49,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_forums_result']['total'] = @intval(sql_count($result));
	$SP++;
	// RESULTATS
	
	$t0 = str_repeat(' ', $Numrows['_forums_result']['total']);
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE breves  */

 function BOUCLE_breves_resulthtml_72c0c7a7974742af0b26da1e81f06c1a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = ''; 
	// RECHERCHE
	$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
	list($rech_select, $rech_where) = $prepare_recherche(@$Pile[0]["recherche"], "breves", "","", "false");
	
	static $table = 'breves';
	static $id = '_breves_result';
	static $from = array('breves' => 'spip_breves','resultats' => 'spip_resultats');
	static $type = array();
	static $groupby = array();
	$select = array("breves.id_breve",
		"$rech_select");
	static $orderby = array('points DESC');
	$where = 
			array(
			array('=', 'breves.statut', '\'publie\''), $rech_where?$rech_where:'');
	static $join = array('resultats' => array('breves','id','id_breve'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/recherche.html','html_72c0c7a7974742af0b26da1e81f06c1a','_breves_result',49,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_breves_result']['total'] = @intval(sql_count($result));
	$SP++;
	// RESULTATS
	
	$t0 = str_repeat(' ', $Numrows['_breves_result']['total']);
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_art_resulthtml_72c0c7a7974742af0b26da1e81f06c1a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = ''; 
	// RECHERCHE
	$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
	list($rech_select, $rech_where) = $prepare_recherche(@$Pile[0]["recherche"], "articles", "","", "false");
	
	static $table = 'articles';
	static $id = '_art_result';
	static $from = array('articles' => 'spip_articles','resultats' => 'spip_resultats');
	static $type = array();
	static $groupby = array();
	$select = array("articles.id_article",
		"$rech_select");
	static $orderby = array('points DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), $rech_where?$rech_where:'');
	static $join = array('resultats' => array('articles','id','id_article'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/recherche.html','html_72c0c7a7974742af0b26da1e81f06c1a','_art_result',49,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_art_result']['total'] = @intval(sql_count($result));
	$SP++;
	// RESULTATS
	
	$t0 = str_repeat(' ', $Numrows['_art_result']['total']);
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_rub_resulthtml_72c0c7a7974742af0b26da1e81f06c1a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = ''; 
	// RECHERCHE
	$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
	list($rech_select, $rech_where) = $prepare_recherche(@$Pile[0]["recherche"], "rubriques", "","", "false");
	
	static $table = 'rubriques';
	static $id = '_rub_result';
	static $from = array('rubriques' => 'spip_rubriques','resultats' => 'spip_resultats');
	static $type = array();
	static $groupby = array();
	$select = array("rubriques.id_rubrique",
		"$rech_select");
	static $orderby = array('points DESC');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), $rech_where?$rech_where:'');
	static $join = array('resultats' => array('rubriques','id','id_rubrique'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/recherche.html','html_72c0c7a7974742af0b26da1e81f06c1a','_rub_result',49,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_rub_result']['total'] = @intval(sql_count($result));
	$SP++;
	// RESULTATS
	
	$t0 = str_repeat(' ', $Numrows['_rub_result']['total']);
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE mots  */

 function BOUCLE_motshtml_72c0c7a7974742af0b26da1e81f06c1a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = ''; 
	// RECHERCHE
	$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
	list($rech_select, $rech_where) = $prepare_recherche(@$Pile[0]["recherche"], "mots", "","", "false");
	
	static $table = 'mots';
	static $id = '_mots';
	static $from = array('mots' => 'spip_mots','resultats' => 'spip_resultats');
	static $type = array();
	static $groupby = array();
	$select = array("mots.id_mot",
		"$rech_select",
		"mots.titre");
	static $orderby = array('points DESC');
	$where = 
			array($rech_where?$rech_where:'');
	static $join = array('resultats' => array('mots','id','id_mot'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/recherche.html','html_72c0c7a7974742af0b26da1e81f06c1a','_mots',69,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
             <li class="menu-item">
               <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_mot'], 'mot', '', '', true))) .
'">' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</a>
             </li>
             ');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE breves  */

 function BOUCLE_breveshtml_72c0c7a7974742af0b26da1e81f06c1a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[0]['lang']))))
		$in[]= $a;
	else $in = array_merge($in, $a); 
	// RECHERCHE
	$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
	list($rech_select, $rech_where) = $prepare_recherche(@$Pile[0]["recherche"], "breves", "","", "false");
	
	static $table = 'breves';
	static $id = '_breves';
	static $from = array('breves' => 'spip_breves','resultats' => 'spip_resultats');
	static $type = array();
	static $groupby = array();
	$select = array("breves.id_breve",
		"$rech_select",
		"breves.date_heure AS date",
		"breves.lang",
		"breves.titre");
	static $orderby = array('points DESC');
	$where = 
			array(
			array('=', 'breves.statut', '\'publie\''), (!(is_array($Pile[0]['lang'])?count($Pile[0]['lang']):strlen($Pile[0]['lang'])) ? '' : ((is_array($Pile[0]['lang'])) ? sql_in('breves.lang',sql_quote($in)) : 
			array('=', 'breves.lang', sql_quote($GLOBALS['spip_lang'])))), $rech_where?$rech_where:'');
	static $join = array('resultats' => array('breves','id','id_breve'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/recherche.html','html_72c0c7a7974742af0b26da1e81f06c1a','_breves',86,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
             <li class="menu-item">
               <span>' .
interdire_scripts(affdate_court(normaliser_date($Pile[$SP]['date']))) .
'</span>
               <a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/spip.php?action=converser&amp;redirect=' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'%2F' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_breve'], 'breve', '', '', true))) .
'&amp;var_lang=' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" hreflang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'"' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre(@$Pile[0]['descriptif'], $connect))))))!=='' ?
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

 function BOUCLE_auteurshtml_72c0c7a7974742af0b26da1e81f06c1a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = ''; 
	// RECHERCHE
	$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
	list($rech_select, $rech_where) = $prepare_recherche(@$Pile[0]["recherche"], "auteurs", "","", "false");
	
	static $table = 'auteurs';
	static $id = '_auteurs';
	static $from = array('auteurs' => 'spip_auteurs','resultats' => 'spip_resultats','L1' => 'spip_auteurs_articles','L2' => 'spip_articles');
	static $type = array();
	static $groupby = array("auteurs.id_auteur");
	$select = array("auteurs.id_auteur",
		"$rech_select",
		"auteurs.nom");
	static $orderby = array('points DESC');
	$where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('<=', 'L2.date', sql_quote(quete_date_postdates())), 
			array('=', 'L2.statut', '\'publie\''), $rech_where?$rech_where:'');
	static $join = array('resultats' => array('auteurs','id','id_auteur'), 'L1' => array('auteurs','id_auteur'), 'L2' => array('L1','id_article'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/recherche.html','html_72c0c7a7974742af0b26da1e81f06c1a','_auteurs',104,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
             <li class="menu-item">
               <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_auteur'], 'auteur', '', '', true))) .
'">' .
interdire_scripts(typo($Pile[$SP]['nom'], "TYPO", $connect)) .
'</a>
             </li>
             ');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE syndication  */

 function BOUCLE_siteshtml_72c0c7a7974742af0b26da1e81f06c1a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = ''; 
	// RECHERCHE
	$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
	list($rech_select, $rech_where) = $prepare_recherche(@$Pile[0]["recherche"], "syndic", "","", "false");
	
	static $table = 'syndic';
	static $id = '_sites';
	static $from = array('syndic' => 'spip_syndic','resultats' => 'spip_resultats');
	static $type = array();
	static $groupby = array();
	$select = array("syndic.id_syndic",
		"$rech_select",
		"syndic.descriptif",
		"syndic.url_site",
		"syndic.nom_site");
	static $orderby = array('points DESC');
	$where = 
			array(
			array('=', 'syndic.statut', '\'publie\''), $rech_where?$rech_where:'');
	static $join = array('resultats' => array('syndic','id','id_syndic'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/recherche.html','html_72c0c7a7974742af0b26da1e81f06c1a','_sites',121,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
             <li class="menu-item">
               <a href="' .
generer_url_entite($Pile[$SP]['id_syndic'],'site','','',($connect ? $connect : NULL)) .
'" title="' .
interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect)))) .
'">' .
interdire_scripts(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)) .
'</a>
             </li>
             ');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE forums  */

 function BOUCLE_messageshtml_72c0c7a7974742af0b26da1e81f06c1a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = ''; 
	// RECHERCHE
	$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
	list($rech_select, $rech_where) = $prepare_recherche(@$Pile[0]["recherche"], "forum", "","", "false");
	
	static $table = 'forum';
	static $id = '_messages';
	static $from = array('forum' => 'spip_forum','resultats' => 'spip_resultats');
	static $type = array();
	static $groupby = array();
	$select = array("forum.id_forum",
		"$rech_select",
		"forum.titre");
	static $orderby = array('points DESC');
	$where = 
			array(
			array('=', 'forum.statut', '\'publie\''), 
			array('=', 'forum.id_parent', 0), $rech_where?$rech_where:'');
	static $join = array('resultats' => array('forum','id','id_forum'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/recherche.html','html_72c0c7a7974742af0b26da1e81f06c1a','_messages',138,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
              <li class="menu-item">
                <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_forum'], 'forum', '', '', true))) .
'">' .
interdire_scripts(supprimer_numero(safehtml(typo($Pile[$SP]['titre'], "TYPO", $connect)))) .
'</a>
              </li>
              ');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/ahuntsic/recherche.html
// Temps de compilation total: 14.574 ms
//

function html_72c0c7a7974742af0b26da1e81f06c1a($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
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
'] : ' .
_T('public/spip/ecrire:resultats_recherche') .
(($t1 = strval(entites_html(_request("recherche"))))!=='' ?
		(' - ' . $t1) :
		'') .
'</title>
  ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-meta') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/recherche.html\',\'html_72c0c7a7974742af0b26da1e81f06c1a\',\'\',6,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
  ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('styles') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/recherche.html\',\'html_72c0c7a7974742af0b26da1e81f06c1a\',\'\',7,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</head>
<body dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'" class="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
' recherche">
<div id="page">

<!-- *****************************************************************
  Bandeau, titre du site et menu langue
  Header and main menu (top and right) 
    ************************************************************* -->
  
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bandeau') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/recherche.html\',\'html_72c0c7a7974742af0b26da1e81f06c1a\',\'\',17,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

<!-- *****************************************************************
  Contenu principal (centre)
  Main content (center) 
    ************************************************************* -->
  <div id="bloc-contenu">
    <div class="cartouche">
      <div class="surtitre">' .
_T('public/spip/ecrire:resultats_recherche') .
'</div>
      ' .
(($t1 = strval(majuscules(entites_html(_request("recherche")))))!=='' ?
		('<h1 class="titre-article">' . $t1 . '</h1>
') :
		'') .
'    </div><!-- cartouche -->
    ' .
(($t1 = BOUCLE_rubriqueshtml_72c0c7a7974742af0b26da1e81f06c1a($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
      <h2>' .
		_T('public/spip/ecrire:info_rubriques_trouvees') .
		' : ' .
		$Numrows['_rubriques']['total'] .
		'</h2>
    ') . $t1 . '
      <br />
    ') :
		'') .
'
    ' .
(($t1 = BOUCLE_articleshtml_72c0c7a7974742af0b26da1e81f06c1a($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
      <h2>' .
		_T('public/spip/ecrire:info_articles_trouves') .
		' : ' .
		$Numrows['_articles']['total'] .
		'</h2>
    ') . $t1 . '
      <br />
    ') :
		'') .
'
 
        ' .
(($t1 = BOUCLE_rub_resulthtml_72c0c7a7974742af0b26da1e81f06c1a($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	(($t2 = BOUCLE_art_resulthtml_72c0c7a7974742af0b26da1e81f06c1a($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			$t2 :
			((	(($t3 = BOUCLE_breves_resulthtml_72c0c7a7974742af0b26da1e81f06c1a($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
				$t3 :
				((	(($t4 = BOUCLE_forums_resulthtml_72c0c7a7974742af0b26da1e81f06c1a($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
					$t4 :
					((	(($t5 = BOUCLE_sites_resulthtml_72c0c7a7974742af0b26da1e81f06c1a($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
						$t5 :
						((	(($t6 = BOUCLE_auteurs_resulthtml_72c0c7a7974742af0b26da1e81f06c1a($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
							$t6 :
							((	(($t7 = BOUCLE_mots_resulthtml_72c0c7a7974742af0b26da1e81f06c1a($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
								$t7 :
								((	'
      <div class="surtitre">' .
							_T('public/spip/ecrire:avis_aucun_resultat') .
							'</div>
      <div class="detail">
        <h1 class="titre-article">' .
							_T('public/spip/ecrire:info_rechercher') .
							'</h1>
          ' .
							executer_balise_dynamique('FORMULAIRE_RECHERCHE',
	array(),
	array('plugins/auto/ahuntsic/recherche.html','html_72c0c7a7974742af0b26da1e81f06c1a','',53,$GLOBALS['spip_lang'])) .
							'
          <br />
      </div><!-- detail -->
      '))) .
						' '))) .
					' '))) .
				' '))) .
			' '))) .
		' '))) .
	' '))) .
'



  </div><!-- bloc-contenu -->
  
<!-- *****************************************************************
  Menus contextuels (droite)
  Contextual menus (right) 
    ************************************************************* -->
  <div id="encart">
  
    <!-- Mots trouves -->
    ' .
(($t1 = BOUCLE_motshtml_72c0c7a7974742af0b26da1e81f06c1a($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
    <div class="menu">
      <ul>
        <li><b>' .
		_T('public/spip/ecrire:info_mots_cles') .
		'</b>
           <ul>
             ') . $t1 . '
           </ul>
         </li>
       </ul>
    </div><!-- menu -->
    ') :
		'') .
'

    <!-- Breves trouvees -->
    ' .
(($t1 = BOUCLE_breveshtml_72c0c7a7974742af0b26da1e81f06c1a($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
    <div class="menu">
      <ul>
        <li><b>' .
		_T('public/spip/ecrire:info_breves_touvees') .
		'</b>
           <ul>
             ') . $t1 . '
           </ul>
         </li>
       </ul>
    </div><!-- menu -->
    ') :
		'') .
'

    <!-- Auteurs trouves -->
    ' .
(($t1 = BOUCLE_auteurshtml_72c0c7a7974742af0b26da1e81f06c1a($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
    <div class="menu">
      <ul>
        <li><b>' .
		_T('public/spip/ecrire:info_auteurs_trouves') .
		'</b>
           <ul>
             ') . $t1 . '
           </ul>
         </li>
       </ul>
    </div><!-- menu -->
    ') :
		'') .
'

  <!-- Sites Web trouves -->
    ' .
(($t1 = BOUCLE_siteshtml_72c0c7a7974742af0b26da1e81f06c1a($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
    <div class="menu">
      <ul>
        <li><b>' .
		_T('public/spip/ecrire:info_sites_trouves') .
		'</b>
           <ul>
             ') . $t1 . '
           </ul>
         </li>
       </ul>
     </div><!-- menu -->
     ') :
		'') .
'

  <!-- Messages trouves -->
  ' .
(($t1 = BOUCLE_messageshtml_72c0c7a7974742af0b26da1e81f06c1a($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
    <div class="menu">
      <ul>
        <li><b>' .
		_T('public/spip/ecrire:messages_forum') .
		'</b>
           <ul>
              ') . $t1 . '
           </ul>
         </li>
       </ul>
    </div><!-- menu -->
    ') :
		'') .
'

  </div><!-- encart -->
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-menu') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/recherche.html\',\'html_72c0c7a7974742af0b26da1e81f06c1a\',\'\',155,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bas') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/recherche.html\',\'html_72c0c7a7974742af0b26da1e81f06c1a\',\'\',156,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</div><!-- page -->

</body>
</html>

 ');

	return analyse_resultat_skel('html_72c0c7a7974742af0b26da1e81f06c1a', $Cache, $page, 'plugins/auto/ahuntsic/recherche.html');
}
?>