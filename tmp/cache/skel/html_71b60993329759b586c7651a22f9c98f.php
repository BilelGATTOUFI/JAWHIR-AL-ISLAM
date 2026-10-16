<?php

/*
 * Squelette : ../prive/contenu/breve.html
 * Date :      Mon, 10 Nov 2014 19:48:46 GMT
 * Compile :   Wed, 30 Mar 2016 12:23:45 GMT
 * Boucles :   _afficher_contenu
 */ 

/* BOUCLE breves  */

 function BOUCLE_afficher_contenuhtml_71b60993329759b586c7651a22f9c98f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[0]['statut']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	static $table = 'breves';
	static $id = '_afficher_contenu';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.titre",
		"breves.lang",
		"breves.texte",
		"breves.lien_titre",
		"breves.lien_url");
	static $orderby = array();
	$where = 
			array(
			array('=', 'breves.id_breve', sql_quote(interdire_scripts(entites_html((@$Pile[0]['id']),true)),'','int')), (!(is_array($Pile[0]['statut'])?count($Pile[0]['statut']):strlen($Pile[0]['statut'])) ? '' : ((is_array($Pile[0]['statut'])) ? sql_in('breves.statut',sql_quote($in)) : 
			array('=', 'breves.statut', sql_quote($Pile[0]['statut'])))));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../prive/contenu/breve.html','html_71b60993329759b586c7651a22f9c98f','_afficher_contenu',1,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
<div class="champ contenu_titre' .
(($t1 = strval(interdire_scripts((strlen($Pile[$SP]['titre']) ? '':'vide'))))!=='' ?
		(' ' . $t1) :
		'') .
'">
<div class=\'label\'>' .
_T('public/spip/ecrire:info_titre') .
'</div>
<div dir=\'' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'\' class=\'' .
'titre\'>' .
interdire_scripts(supprimer_numero(typo($Pile[$SP]['titre']))) .
'</div>
</div>
<div class="champ contenu_texte' .
(($t1 = strval(interdire_scripts((strlen($Pile[$SP]['texte']) ? '':'vide'))))!=='' ?
		(' ' . $t1) :
		'') .
'">
<div class=\'label\'>' .
_T('public/spip/ecrire:info_texte') .
'</div>
<div dir=\'' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'\' class=\'' .
'texte\'>' .
interdire_scripts(cs_nettoie(sommaire_d_article(propre($Pile[$SP]['texte'],$connect)))) .
'</div>
</div>
<div class="champ contenu_lien_titre' .
(($t1 = strval(interdire_scripts((strlen($Pile[$SP]['lien_titre']) ? '':'vide'))))!=='' ?
		(' ' . $t1) :
		'') .
'">
<div class=\'label\'>' .
_T('public/spip/ecrire:lien_voir_en_ligne') .
'</div>
<div dir=\'' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'\' class=\'' .
'lien_titre\'><a href=\'' .
interdire_scripts(vider_url($Pile[$SP]['lien_url'])) .
'\'>' .
interdire_scripts(typo($Pile[$SP]['lien_titre'], "TYPO", $connect)) .
'</a></div>
</div>
' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		((	'<div class="champ contenu_notes">
<div class=\'label\'>' .
	_T('public/spip/ecrire:info_notes') .
	'</div>
<div dir=\'' .
	lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
	'\' class=\'' .
	'notes\'>') . $t1 . '</div>
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
// Fonction principale du squelette ../prive/contenu/breve.html
// Temps de compilation total: 1.920 ms
//

function html_71b60993329759b586c7651a22f9c98f($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_afficher_contenuhtml_71b60993329759b586c7651a22f9c98f($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_71b60993329759b586c7651a22f9c98f', $Cache, $page, '../prive/contenu/breve.html');
}
?>