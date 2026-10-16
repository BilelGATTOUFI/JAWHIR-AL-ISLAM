<?php

/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-breves.html
 * Date :      Mon, 10 Nov 2014 19:36:05 GMT
 * Compile :   Sun, 12 Jun 2016 08:42:22 GMT
 * Boucles :   _breves_sommaire, _breves_rubriques
 */ 

/* BOUCLE breves  */

 function BOUCLE_breves_sommairehtml_0fdb97df1fa8189d0386999cc688f1d1(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_breves_sommaire';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.date_heure",
		"breves.date_heure AS date",
		"breves.id_breve",
		"breves.texte",
		"breves.titre",
		"breves.lang");
	static $orderby = array('breves.date_heure DESC');
	$where = 
			array(
			array('=', 'breves.statut', '\'publie\''), 
			array('=', 'breves.lang', sql_quote($GLOBALS['spip_lang'])));
	static $join = array();
	static $limit = '0,3';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-breves.html','html_0fdb97df1fa8189d0386999cc688f1d1','_breves_sommaire',19,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
          	<li>' .
(($t1 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('<span>' . $t1 . '</span>') :
		'') .
'
              <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_breve'], 'breve', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist('', $Pile[$SP]['texte'], 300, $connect))))))!=='' ?
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



/* BOUCLE breves  */

 function BOUCLE_breves_rubriqueshtml_0fdb97df1fa8189d0386999cc688f1d1(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_breves_rubriques';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.date_heure",
		"breves.date_heure AS date",
		"breves.id_breve",
		"breves.texte",
		"breves.titre",
		"breves.lang");
	static $orderby = array('breves.date_heure DESC');
	$where = 
			array(
			array('=', 'breves.statut', '\'publie\''), 
			array('=', 'breves.id_rubrique', sql_quote($Pile[0]['id_rubrique'],'','int')), 
			array('=', 'breves.lang', sql_quote($GLOBALS['spip_lang'])));
	static $join = array();
	static $limit = '0,10';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-breves.html','html_0fdb97df1fa8189d0386999cc688f1d1','_breves_rubriques',2,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
          	<li>' .
(($t1 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('<span>' . $t1 . '</span>') :
		'') .
'
              <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_breve'], 'breve', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist('', $Pile[$SP]['texte'], 300, $connect))))))!=='' ?
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
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-breves.html
// Temps de compilation total: 2.201 ms
//

function html_0fdb97df1fa8189d0386999cc688f1d1($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'    <!-- Breves -->
    ' .
(($t1 = BOUCLE_breves_rubriqueshtml_0fdb97df1fa8189d0386999cc688f1d1($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
    <div class="menu">
    <h2 class="structure">' .
		_T('public/spip/ecrire:dernieres_breves') .
		'</h2>
      <ul>
        <li><b>' .
		_T('public/spip/ecrire:nouvelles_breves') .
		'</b>
          <ul>
            ') . $t1 . '
          </ul>
        </li>
      </ul>
    </div><!-- menu -->
    ') :
		((	'
    
    ' .
	(($t2 = BOUCLE_breves_sommairehtml_0fdb97df1fa8189d0386999cc688f1d1($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			((	'
    <div class="menu">
    <h2 class="structure">' .
			_T('public/spip/ecrire:dernieres_breves') .
			'</h2>
      <ul>
        <li><b>' .
			_T('public/spip/ecrire:nouvelles_breves') .
			'</b>
          <ul>
            ') . $t2 . '
          </ul>
        </li>
      </ul>
    </div><!-- menu -->
    ') :
			'') .
	'
    
    '))));

	return analyse_resultat_skel('html_0fdb97df1fa8189d0386999cc688f1d1', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-breves.html');
}
?>