<?php

/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-sommaire-articles.html
 * Date :      Thu, 25 Nov 2010 07:00:06 GMT
 * Compile :   Fri, 31 Oct 2014 05:40:39 GMT
 * Boucles :   _articles_exclus, _article_langue
 */ 

/* BOUCLE articles  */

 function BOUCLE_articles_exclushtml_688c47ba0246e31dcca5891b24f1ff30(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	$in = array();
	$in[]= 'Editorial';
	$in[]= 'exclu_sommaire';
	static $table = 'articles';
	static $id = '_articles_exclus';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_mots_articles','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("articles.id_article");
	static $select = array("articles.id_article");
	$orderby = array(((!sql_quote($in) OR sql_quote($in)==="''") ? 0 : ('FIELD(L2.titre,' . sql_quote($in) . ')')));
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])), sql_in('L2.titre',sql_quote($in)), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
	static $join = array('L1' => array('articles','id_article'), 'L2' => array('L1','id_mot'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-sommaire-articles.html','html_688c47ba0246e31dcca5891b24f1ff30','_articles_exclus',6,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons

	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_article_languehtml_688c47ba0246e31dcca5891b24f1ff30(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'articles';
	static $id = '_article_langue';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.date",
		"articles.id_article",
		"articles.id_rubrique",
		"articles.surtitre",
		"articles.titre",
		"articles.soustitre",
		"articles.descriptif",
		"articles.chapo",
		"articles.texte",
		"articles.lang");
	static $orderby = array('articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-sommaire-articles.html','html_688c47ba0246e31dcca5891b24f1ff30','_article_langue',7,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_article_langue']['compteur_boucle'] = 0;
	$Numrows['_article_langue']['total'] = @intval(sql_count($result));
	$debut_boucle = isset($Pile[0]['debut_article_langue']) ? $Pile[0]['debut_article_langue'] : _request('debut_article_langue');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_article_langue'] = quete_debut_pagination('id_article',$Pile[0]['@id_article'] = substr($debut_boucle,1),10,$result,'');
		if (!sql_seek($result,0,'')){
			@sql_free($result,'');
			$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
		}
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_article_langue']['total']-1)/(10))*(10)));
	$fin_boucle = min(($tout ? $Numrows['_article_langue']['total'] : $debut_boucle + 9), $Numrows['_article_langue']['total'] - 1);
	$Numrows['_article_langue']['grand_total'] = $Numrows['_article_langue']['total'];
	$Numrows['_article_langue']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_article_langue']['grand_total'] AND sql_seek($result,$debut_boucle,'','continue'))
		$Numrows['_article_langue']['compteur_boucle'] = $debut_boucle;
	
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_article_langue']['compteur_boucle']++;
		if ($Numrows['_article_langue']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_article_langue']['compteur_boucle']-1 > $fin_boucle) break;
			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	  <br class="nettoyeur" />
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
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['surtitre'], "TYPO", $connect))))!=='' ?
		((	'<div class="surtitre">') . $t1 . '</div>') :
		'') .
'
      <h3><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" class="titre-article">' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</a></h3>
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
(($t1 = strval(recuperer_fond('modeles/lesauteurs', array('id_article' => $Pile[$SP]['id_article']), array('trim'=>true, 'compil'=>array('plugins/auto/ahuntsic/inc/inc-sommaire-articles.html','html_688c47ba0246e31dcca5891b24f1ff30','_article_langue',15,$GLOBALS['spip_lang'])), '')))!=='' ?
		((	'<span class="auteurs">' .
	_T('public/spip/ecrire:par_auteur') .
	' ') . $t1 . '</span>') :
		'') .
'				
      </div><!-- detail -->

      <div class="texte">
	' .
(($t1 = strval(interdire_scripts((filtrer('image_graver', filtrer('image_reduire',propre($Pile[$SP]['descriptif'], $connect),'552','0')) ? (	(($t2 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre($Pile[$SP]['descriptif'], $connect),'552','0')))))!=='' ?
			((	'<div class="">') . $t2 . '</div>') :
			'') .
	'
		'):(	interdire_scripts((propre(nettoyer_chapo($Pile[$SP]['chapo']), $connect) ? (	(($t3 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre(nettoyer_chapo($Pile[$SP]['chapo']), $connect),'552','0')))))!=='' ?
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
		('<div class="extrait">' . $t1 . (	'	<div class="suite"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'" title="...' .
	_T('public/spip/ecrire:suite') .
	' : ' .
	interdire_scripts(attribut_html(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))) .
	'" >' .
	_T('public/spip/ecrire:suite') .
	'</a></div>
	</div><!-- fin extrait -->')) :
		'') .
'
      </div><!-- fin texte -->
      <br class="nettoyeur" />
    ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-sommaire-articles.html
// Temps de compilation total: 25.852 ms
//

function html_688c47ba0246e31dcca5891b24f1ff30($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'	<br class="nettoyeur" />
	<div class="edito">
		<h3 class="edito-titre">' .
_T('public/spip/ecrire:articles_recents') .
'</h3>
	</div>

    ' .
BOUCLE_articles_exclushtml_688c47ba0246e31dcca5891b24f1ff30($Cache, $Pile, $doublons, $Numrows, $SP) .
'
    ' .
(($t1 = BOUCLE_article_languehtml_688c47ba0246e31dcca5891b24f1ff30($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
    ' .
		filtre_pagination_dist($Numrows["_article_langue"]["grand_total"],
 		'_article_langue',
		isset($Pile[0]['debut_article_langue'])?$Pile[0]['debut_article_langue']:intval(_request('debut_article_langue')),
		10, false, '', '', array()) .
		'
    ') . $t1 . (	'

    ' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_article_langue"]["grand_total"],
 		'_article_langue',
		isset($Pile[0]['debut_article_langue'])?$Pile[0]['debut_article_langue']:intval(_request('debut_article_langue')),
		10, true, 'page_precedent_suivant', '', array('lang' => $GLOBALS["spip_lang"] ))))!=='' ?
				((	'<div class="pagination">
      <div class="ligne1">
        <div dir="' .
			lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
			'">' .
			$Numrows['_article_langue']['total'] .
			'/' .
			(isset($Numrows['_article_langue']['grand_total'])
			? $Numrows['_article_langue']['grand_total'] : $Numrows['_article_langue']['total']) .
			' ' .
			_T('public/spip/ecrire:articles') .
			'</div>
      </div>
      <div class="ligne2">
        ') . $t3 . '
      </div>
    </div>') :
				'') .
		'

    ')) :
		('
    ')));

	return analyse_resultat_skel('html_688c47ba0246e31dcca5891b24f1ff30', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-sommaire-articles.html');
}
?>