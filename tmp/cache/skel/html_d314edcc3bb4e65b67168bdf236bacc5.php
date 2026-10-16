<?php

/*
 * Squelette : plugins/auto/couteau_suisse/modeles/lesauteurs.html
 * Date :      Mon, 10 Nov 2014 19:37:32 GMT
 * Compile :   Sun, 12 Jun 2016 08:42:17 GMT
 * Boucles :   _auteurs
 */ 

/* BOUCLE auteurs  */

 function BOUCLE_auteurshtml_d314edcc3bb4e65b67168bdf236bacc5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $champs__auteurs = array('id_auteur','nom','bio','email','nom_site','url_site','login','pass','low_sec','statut','maj','pgp','htpass','en_ligne','imessage','messagerie','alea_actuel','alea_futur','prefs','cookie_oubli','source','lang','extra','webmestre');
	static $table = 'auteurs';
	static $id = '_auteurs';
	static $from = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_articles');
	static $type = array();
	static $groupby = array();
	$select = array("rand() AS hasard",
		"auteurs.id_auteur",
		"auteurs.nom");
	$orderby = array((($x = preg_replace("/\W/",'', (is_array($a = ($Pile["vars"])) ? $a['nom'] : ""))) ? (in_array($x, $champs__auteurs)  ? ('auteurs.' . $x) :($x)) : ''));
	$where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('=', 'L1.id_article', sql_quote($Pile[0]['id_article'])));
	static $join = array('L1' => array('auteurs','id_auteur'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/couteau_suisse/modeles/lesauteurs.html','html_d314edcc3bb4e65b67168bdf236bacc5','_auteurs',11,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t1 = (
'
<span class="vcard author"><a class="url fn spip_in" href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_auteur'], 'auteur', '', '', true))) .
'">' .
interdire_scripts(typo($Pile[$SP]['nom'], "TYPO", $connect)) .
'</a></span>');
		$t0 .= (($t1 && $t0) ? ', ' : '') . $t1;
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/couteau_suisse/modeles/lesauteurs.html
// Temps de compilation total: 1.392 ms
//

function html_d314edcc3bb4e65b67168bdf236bacc5($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
(!(defined('boites_privees_TRI_AUTEURS'))  ?
		(' ' . vide($Pile['vars']['nom'] = 'nom')) :
		'') .
'
' .
BOUCLE_auteurshtml_d314edcc3bb4e65b67168bdf236bacc5($Cache, $Pile, $doublons, $Numrows, $SP));

	return analyse_resultat_skel('html_d314edcc3bb4e65b67168bdf236bacc5', $Cache, $page, 'plugins/auto/couteau_suisse/modeles/lesauteurs.html');
}
?>