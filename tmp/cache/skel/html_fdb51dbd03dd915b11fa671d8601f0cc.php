<?php

/*
 * Squelette : plugins/auto/ahuntsic/site.html
 * Date :      Mon, 10 Nov 2014 19:34:42 GMT
 * Compile :   Tue, 11 Nov 2014 11:11:18 GMT
 * Boucles :   _articles_tous, _articles, _site, _syndic, _sites
 */ 

/* BOUCLE syndic_articles  */

 function BOUCLE_articles_toushtml_fdb51dbd03dd915b11fa671d8601f0cc(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic_articles';
	static $id = '_articles_tous';
	static $from = array('syndic_articles' => 'spip_syndic_articles','L1' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("syndic_articles.date",
		"syndic_articles.id_syndic_article",
		"syndic_articles.url",
		"syndic_articles.descriptif",
		"syndic_articles.titre",
		"syndic_articles.lesauteurs",
		"syndic_articles.tags",
		"L1.url_site",
		"L1.nom_site");
	static $orderby = array('syndic_articles.date DESC');
	static $where = 
			array(
			array('=', 'syndic_articles.statut', '\'publie\''), 
			array('=', 'L1.statut', '\'publie\''));
	static $join = array('L1' => array('syndic_articles','id_syndic'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/site.html','html_fdb51dbd03dd915b11fa671d8601f0cc','_articles_tous',59,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_articles_tous']['compteur_boucle'] = 0;
	$Numrows['_articles_tous']['total'] = @intval(sql_count($result));
	$debut_boucle = isset($Pile[0]['debut_articles_tous']) ? $Pile[0]['debut_articles_tous'] : _request('debut_articles_tous');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_articles_tous'] = quete_debut_pagination('id_syndic_article',$Pile[0]['@id_syndic_article'] = substr($debut_boucle,1),10,$result,'');
		if (!sql_seek($result,0,'')){
			@sql_free($result,'');
			$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
		}
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_articles_tous']['total']-1)/(10))*(10)));
	$fin_boucle = min(($tout ? $Numrows['_articles_tous']['total'] : $debut_boucle + 9), $Numrows['_articles_tous']['total'] - 1);
	$Numrows['_articles_tous']['grand_total'] = $Numrows['_articles_tous']['total'];
	$Numrows['_articles_tous']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_articles_tous']['grand_total'] AND sql_seek($result,$debut_boucle,'','continue'))
		$Numrows['_articles_tous']['compteur_boucle'] = $debut_boucle;
	
	
	$l1 = _T('public/spip/ecrire:par_auteur');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_articles_tous']['compteur_boucle']++;
		if ($Numrows['_articles_tous']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_articles_tous']['compteur_boucle']-1 > $fin_boucle) break;
		$t0 .= (
'  
      <h3><a href="' .
vider_url($Pile[$SP]['url']) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(safehtml($Pile[$SP]['descriptif']))))))!=='' ?
		('title="' . $t1 . '" class="spip_out"') :
		'') .
'>' .
interdire_scripts(safehtml($Pile[$SP]['titre'])) .
'</a></h3>
      <div class="detail">
        ' .
interdire_scripts(nom_jour(normaliser_date($Pile[$SP]['date']))) .
' ' .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
' ' .
(($t1 = strval(interdire_scripts(safehtml($Pile[$SP]['lesauteurs']))))!=='' ?
		((	$l1 .
	' ') . $t1) :
		'') .
(($t1 = strval(interdire_scripts(afficher_tags(safehtml($Pile[$SP]['tags'])))))!=='' ?
		(' &mdash; <em>' . $t1 . '</em>') :
		'') .
'
      </div><!-- detail -->
      <div class="texte">
        <div class="extrait">' .
interdire_scripts(filtrer('image_graver',filtrer('image_reduire',couper(safehtml($Pile[$SP]['descriptif']),'300'),'440','0'))) .
'
          ' .
(($t1 = strval(interdire_scripts(safehtml(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)))))!=='' ?
		((	'<div class="detail"><a href="' .
	calculer_url($Pile[$SP]['url_site'],'','url', $connect) .
	'" title="' .
	calculer_url($Pile[$SP]['url_site'],'','url', $connect) .
	'" class="spip_out">') . $t1 . '</a></div>') :
		'') .
'
        </div>
      </div>
      <br />
    ');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE syndic_articles  */

 function BOUCLE_articleshtml_fdb51dbd03dd915b11fa671d8601f0cc(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic_articles';
	static $id = '_articles';
	static $from = array('syndic_articles' => 'spip_syndic_articles','L1' => 'spip_syndic');
	static $type = array();
	static $groupby = array("syndic_articles.id_syndic_article");
	static $select = array("syndic_articles.date",
		"syndic_articles.id_syndic_article",
		"syndic_articles.url",
		"syndic_articles.descriptif",
		"syndic_articles.titre",
		"syndic_articles.lesauteurs",
		"syndic_articles.tags");
	static $orderby = array('syndic_articles.date DESC');
	$where = 
			array(
			array('=', 'syndic_articles.statut', '\'publie\''), 
			array('=', 'syndic_articles.id_syndic', sql_quote($Pile[$SP]['id_syndic'],'','int')), 
			array('=', 'L1.statut', '\'publie\''));
	static $join = array('L1' => array('syndic_articles','id_syndic'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/site.html','html_fdb51dbd03dd915b11fa671d8601f0cc','_articles',34,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_articles']['compteur_boucle'] = 0;
	$Numrows['_articles']['total'] = @intval(sql_count($result));
	$debut_boucle = isset($Pile[0]['debut_articles']) ? $Pile[0]['debut_articles'] : _request('debut_articles');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_articles'] = quete_debut_pagination('id_syndic_article',$Pile[0]['@id_syndic_article'] = substr($debut_boucle,1),10,$result,'');
		if (!sql_seek($result,0,'')){
			@sql_free($result,'');
			$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
		}
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_articles']['total']-1)/(10))*(10)));
	$fin_boucle = min(($tout ? $Numrows['_articles']['total'] : $debut_boucle + 9), $Numrows['_articles']['total'] - 1);
	$Numrows['_articles']['grand_total'] = $Numrows['_articles']['total'];
	$Numrows['_articles']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_articles']['grand_total'] AND sql_seek($result,$debut_boucle,'','continue'))
		$Numrows['_articles']['compteur_boucle'] = $debut_boucle;
	
	
	$l1 = _T('public/spip/ecrire:par_auteur');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_articles']['compteur_boucle']++;
		if ($Numrows['_articles']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_articles']['compteur_boucle']-1 > $fin_boucle) break;
		$t0 .= (
'  
      <h3><a href="' .
vider_url($Pile[$SP]['url']) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(safehtml($Pile[$SP]['descriptif']))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
' class="spip_out">' .
interdire_scripts(safehtml($Pile[$SP]['titre'])) .
'</a></h3>
      <div class="detail">
        ' .
interdire_scripts(nom_jour(normaliser_date($Pile[$SP]['date']))) .
' ' .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
' ' .
(($t1 = strval(interdire_scripts(safehtml($Pile[$SP]['lesauteurs']))))!=='' ?
		((	$l1 .
	' ') . $t1) :
		'') .
(($t1 = strval(interdire_scripts(afficher_tags(safehtml($Pile[$SP]['tags'])))))!=='' ?
		(' &mdash; <em>' . $t1 . '</em>') :
		'') .
'
      </div><!-- detail -->
      ' .
(($t1 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',safehtml($Pile[$SP]['descriptif']),'440','0')))))!=='' ?
		('<div class="texte"><div class="extrait">' . $t1 . '</div></div>') :
		'') .
'
      <br />
    ');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE syndication  */

 function BOUCLE_sitehtml_fdb51dbd03dd915b11fa671d8601f0cc(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic';
	static $id = '_site';
	static $from = array('syndic' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("syndic.id_syndic",
		"syndic.url_site",
		"syndic.nom_site",
		"syndic.descriptif");
	static $orderby = array();
	$where = 
			array(
			array('=', 'syndic.statut', '\'publie\''), 
			array('=', 'syndic.id_syndic', sql_quote($Pile[0]['id_syndic'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/site.html','html_fdb51dbd03dd915b11fa671d8601f0cc','_site',25,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('public/spip/ecrire:sur_web');
	$l2 = _T('public/spip/ecrire:articles_recents');
	$l3 = _T('public/spip/ecrire:articles');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
    <div class="cartouche">
      <div class="surtitre">' .
$l1 .
'</div>
      ' .
filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_syndic', 'ON', $Pile[$SP]['id_syndic'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" align=\"right\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'120','0')) .
'
      <h1 class="titre-article"><a href="' .
calculer_url($Pile[$SP]['url_site'],'','url', $connect) .
'" class="spip_out">' .
interdire_scripts(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)) .
'</a></h1>
      <div class="detail"><a href="' .
calculer_url($Pile[$SP]['url_site'],'','url', $connect) .
'" class="spip_out">' .
calculer_url($Pile[$SP]['url_site'],'','url', $connect) .
'</a></div>
      ' .
(($t1 = strval(interdire_scripts(propre($Pile[$SP]['descriptif'], $connect))))!=='' ?
		('<div class="chapo">' . $t1 . '</div>') :
		'') .
'
    </div><!-- cartouche -->

    ' .
(($t1 = BOUCLE_articleshtml_fdb51dbd03dd915b11fa671d8601f0cc($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
    <br />
      <h2>' .
		$l2 .
		'</h2>
		' .
		filtre_pagination_dist($Numrows["_articles"]["grand_total"],
 		'_articles',
		isset($Pile[0]['debut_articles'])?$Pile[0]['debut_articles']:intval(_request('debut_articles')),
		10, false, '', '', array()) .
		'    
    ') . $t1 . (	'
      ' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_articles"]["grand_total"],
 		'_articles',
		isset($Pile[0]['debut_articles'])?$Pile[0]['debut_articles']:intval(_request('debut_articles')),
		10, true, '', '', array())))!=='' ?
				((	'<div class="pagination">
        <div class="ligne1">
          <div dir="' .
			lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
			'">' .
			$Numrows['_articles']['total'] .
			'/' .
			(isset($Numrows['_articles']['grand_total'])
			? $Numrows['_articles']['grand_total'] : $Numrows['_articles']['total']) .
			' ' .
			$l3 .
			'</div>
        </div>
        <div class="ligne2">
          ') . $t3 . '
        </div>
      </div>') :
				'') .
		'
    ')) :
		'') .
'
	
  ');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE syndication  */

 function BOUCLE_syndichtml_fdb51dbd03dd915b11fa671d8601f0cc(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic';
	static $id = '_syndic';
	static $from = array('syndic' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("syndic.nom_site",
		"syndic.id_syndic",
		"syndic.id_rubrique",
		"syndic.url_site");
	static $orderby = array('syndic.nom_site');
	static $where = 
			array(
			array('=', 'syndic.statut', '\'publie\''), 
			array('=', 'syndic.syndication', "'oui'"));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/site.html','html_fdb51dbd03dd915b11fa671d8601f0cc','_syndic',98,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_syndic']['compteur_boucle'] = 0;
	$Numrows['_syndic']['total'] = @intval(sql_count($result));
	$debut_boucle = isset($Pile[0]['debut_syndic']) ? $Pile[0]['debut_syndic'] : _request('debut_syndic');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_syndic'] = quete_debut_pagination('id_syndic',$Pile[0]['@id_syndic'] = substr($debut_boucle,1),20,$result,'');
		if (!sql_seek($result,0,'')){
			@sql_free($result,'');
			$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
		}
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_syndic']['total']-1)/(20))*(20)));
	$fin_boucle = min(($tout ? $Numrows['_syndic']['total'] : $debut_boucle + 19), $Numrows['_syndic']['total'] - 1);
	$Numrows['_syndic']['grand_total'] = $Numrows['_syndic']['total'];
	$Numrows['_syndic']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_syndic']['grand_total'] AND sql_seek($result,$debut_boucle,'','continue'))
		$Numrows['_syndic']['compteur_boucle'] = $debut_boucle;
	
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_syndic']['compteur_boucle']++;
		if ($Numrows['_syndic']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_syndic']['compteur_boucle']-1 > $fin_boucle) break;
		$t0 .= (
'
             <li class="menu-item">
               <a href="' .
generer_url_entite($Pile[$SP]['id_syndic'],'site','','',($connect ? $connect : NULL)) .
'"' .
(calcul_exposer($Pile[$SP]['id_syndic'], 'id_syndic', $Pile[0], $Pile[$SP]['id_rubrique'], 'id_syndic', '')  ?
		(' class="' . 'on' . '"') :
		'') .
'>' .
interdire_scripts(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)) .
'</a>
             </li>
             ');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE syndication  */

 function BOUCLE_siteshtml_fdb51dbd03dd915b11fa671d8601f0cc(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic';
	static $id = '_sites';
	static $from = array('syndic' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("syndic.nom_site",
		"syndic.id_syndic",
		"syndic.id_rubrique",
		"syndic.url_site");
	static $orderby = array('syndic.nom_site');
	static $where = 
			array(
			array('=', 'syndic.statut', '\'publie\''), 
			array('=', 'syndic.syndication', "'non'"));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/site.html','html_fdb51dbd03dd915b11fa671d8601f0cc','_sites',117,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_sites']['compteur_boucle'] = 0;
	$Numrows['_sites']['total'] = @intval(sql_count($result));
	$debut_boucle = isset($Pile[0]['debut_sites']) ? $Pile[0]['debut_sites'] : _request('debut_sites');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_sites'] = quete_debut_pagination('id_syndic',$Pile[0]['@id_syndic'] = substr($debut_boucle,1),20,$result,'');
		if (!sql_seek($result,0,'')){
			@sql_free($result,'');
			$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
		}
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_sites']['total']-1)/(20))*(20)));
	$fin_boucle = min(($tout ? $Numrows['_sites']['total'] : $debut_boucle + 19), $Numrows['_sites']['total'] - 1);
	$Numrows['_sites']['grand_total'] = $Numrows['_sites']['total'];
	$Numrows['_sites']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_sites']['grand_total'] AND sql_seek($result,$debut_boucle,'','continue'))
		$Numrows['_sites']['compteur_boucle'] = $debut_boucle;
	
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_sites']['compteur_boucle']++;
		if ($Numrows['_sites']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_sites']['compteur_boucle']-1 > $fin_boucle) break;
		$t0 .= (
'
             <li class="menu-item">
               <a href="' .
generer_url_entite($Pile[$SP]['id_syndic'],'site','','',($connect ? $connect : NULL)) .
'"' .
(calcul_exposer($Pile[$SP]['id_syndic'], 'id_syndic', $Pile[0], $Pile[$SP]['id_rubrique'], 'id_syndic', '')  ?
		(' class="' . 'on' . '"') :
		'') .
'>' .
interdire_scripts(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)) .
'</a>
             </li>
             ');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/ahuntsic/site.html
// Temps de compilation total: 12.084 ms
//

function html_fdb51dbd03dd915b11fa671d8601f0cc($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


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
_T('public/spip/ecrire:sur_web') .
'</title>
  ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-meta') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/site.html\',\'html_fdb51dbd03dd915b11fa671d8601f0cc\',\'\',6,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
  ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('styles') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/site.html\',\'html_fdb51dbd03dd915b11fa671d8601f0cc\',\'\',7,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</head>
<body dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'" class="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
' site">
<div id="page" class="site">

<!-- *****************************************************************
  Bandeau, titre du site et menu langue
  Header and main menu (top and right) 
    ************************************************************* -->
  
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bandeau') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/site.html\',\'html_fdb51dbd03dd915b11fa671d8601f0cc\',\'\',17,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

<!-- *****************************************************************
  Contenu principal (centre)
  Main content (center) 
    ************************************************************* -->
    
  <div id="bloc-contenu">
  ' .
(($t1 = BOUCLE_sitehtml_fdb51dbd03dd915b11fa671d8601f0cc($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
  
    <!-- si aucun site, afficher derniers articles de tous les sites -->
    ' .
	(($t2 = BOUCLE_articles_toushtml_fdb51dbd03dd915b11fa671d8601f0cc($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			((	'
    <div class="cartouche">
      <div class="surtitre">' .
			_T('public/spip/ecrire:sur_web') .
			'</div>
      <h1 class="titre-article">' .
			_T('public/spip/ecrire:nouveautes_web') .
			'</h1>
    <br />
      <h2>' .
			_T('public/spip/ecrire:articles_recents') .
			'</h2>
    </div><!-- cartouche -->
 		' .
			filtre_pagination_dist($Numrows["_articles_tous"]["grand_total"],
 		'_articles_tous',
		isset($Pile[0]['debut_articles_tous'])?$Pile[0]['debut_articles_tous']:intval(_request('debut_articles_tous')),
		10, false, '', '', array()) .
			'       
    ') . $t2 . (	'
      ' .
			(($t4 = strval(filtre_pagination_dist($Numrows["_articles_tous"]["grand_total"],
 		'_articles_tous',
		isset($Pile[0]['debut_articles_tous'])?$Pile[0]['debut_articles_tous']:intval(_request('debut_articles_tous')),
		10, true, '', '', array())))!=='' ?
					((	'<div class="pagination">
        <div class="ligne1">
          <div dir="' .
				lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
				'">' .
				$Numrows['_articles_tous']['total'] .
				'/' .
				(isset($Numrows['_articles_tous']['grand_total'])
			? $Numrows['_articles_tous']['grand_total'] : $Numrows['_articles_tous']['total']) .
				' ' .
				_T('public/spip/ecrire:articles') .
				'</div>
        </div>
        <div class="ligne2">
          ') . $t4 . '
        </div>
      </div>') :
					'') .
			'
    ')) :
			'') .
	'
  '))) .
'
  </div><!-- bloc-contenu -->
  
<!-- *****************************************************************
  Menus contextuels (droite)
  Contextual menus (right) 
    ************************************************************* -->
  <div id="encart">
  ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-annonces') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/site.html\',\'html_fdb51dbd03dd915b11fa671d8601f0cc\',\'\',96,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

    ' .
(($t1 = BOUCLE_syndichtml_fdb51dbd03dd915b11fa671d8601f0cc($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
    <!-- Tous les sites syndiques -->
    <div class="menu">
  		' .
		filtre_pagination_dist($Numrows["_syndic"]["grand_total"],
 		'_syndic',
		isset($Pile[0]['debut_syndic'])?$Pile[0]['debut_syndic']:intval(_request('debut_syndic')),
		20, false, '', '', array()) .
		'
      <ul>
        <li><img src="' .
		interdire_scripts(find_in_path('styles/img/rss.png')) .
		'" alt="' .
		_T('public/spip/ecrire:icone_suivi_activite') .
		'" style="display:block;float:right;padding:.2em .2em;" width="16" height="16" class="format_png" /><b>' .
		_T('public/spip/ecrire:sites_web') .
		'</b>
           <ul>
             ') . $t1 . (	'
           </ul>
         </li>
       </ul>
       ' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_syndic"]["grand_total"],
 		'_syndic',
		isset($Pile[0]['debut_syndic'])?$Pile[0]['debut_syndic']:intval(_request('debut_syndic')),
		20, true, '', '', array())))!=='' ?
				('<p class="pagination">' . $t3 . '</p>') :
				'') .
		'
    </div><!-- menu -->
    ')) :
		'') .
'

    ' .
(($t1 = BOUCLE_siteshtml_fdb51dbd03dd915b11fa671d8601f0cc($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
    <!-- Les sites references non syndiques -->
    <div class="menu">
  		' .
		filtre_pagination_dist($Numrows["_sites"]["grand_total"],
 		'_sites',
		isset($Pile[0]['debut_sites'])?$Pile[0]['debut_sites']:intval(_request('debut_sites')),
		20, false, '', '', array()) .
		'
     <ul>
        <li><b>' .
		_T('public/spip/ecrire:icone_sites_references') .
		'</b>
           <ul>
            ') . $t1 . (	'
           </ul>
        </li>
       </ul>
       ' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_sites"]["grand_total"],
 		'_sites',
		isset($Pile[0]['debut_sites'])?$Pile[0]['debut_sites']:intval(_request('debut_sites')),
		20, true, '', '', array())))!=='' ?
				('<p class="pagination">' . $t3 . '</p>') :
				'') .
		'
    </div><!-- menu -->
    ')) :
		'') .
'

  </div><!-- encart -->
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-menu') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/site.html\',\'html_fdb51dbd03dd915b11fa671d8601f0cc\',\'\',137,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-bas') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/ahuntsic/site.html\',\'html_fdb51dbd03dd915b11fa671d8601f0cc\',\'\',138,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</div><!-- page -->

</body>
</html>

 ');

	return analyse_resultat_skel('html_fdb51dbd03dd915b11fa671d8601f0cc', $Cache, $page, 'plugins/auto/ahuntsic/site.html');
}
?>