<?php

/*
 * Squelette : ../prive/formulaires/selecteur_groupe_mot.html
 * Date :      Mon, 10 Nov 2014 19:49:23 GMT
 * Compile :   Wed, 27 Jan 2016 20:49:29 GMT
 * Boucles :   _groupes
 */ 

/* BOUCLE groupes_mots  */

 function BOUCLE_groupeshtml_e5a0e306ef6308a073c808af8f3c97aa(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'groupes_mots';
	static $id = '_groupes';
	static $from = array('groupes_mots' => 'spip_groupes_mots');
	static $type = array();
	static $groupby = array();
	static $select = array("groupes_mots.titre",
		"groupes_mots.id_groupe");
	static $orderby = array('groupes_mots.titre');
	$where = 
			array(
			array('REGEXP', 'groupes_mots.tables_liees', sql_quote(concat('(^|,)',interdire_scripts(entites_html(sinon(@$Pile[0]['table'],'.*'),true)),'($|,)'))));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../prive/formulaires/selecteur_groupe_mot.html','html_e5a0e306ef6308a073c808af8f3c97aa','_groupes',1,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
<option value=\'' .
$Pile[$SP]['id_groupe'] .
'\'' .
(calcul_exposer($Pile[$SP]['id_groupe'], 'id_groupe', $Pile[0], $Pile[$SP]['id_groupe'], 'id_groupe', '')  ?
		(' ' . 'selected=\'selected\'') :
		'') .
'>' .
interdire_scripts(texte_backend(supprimer_tags(supprimer_numero(typo($Pile[$SP]['titre']))))) .
'</option>
');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette ../prive/formulaires/selecteur_groupe_mot.html
// Temps de compilation total: 5.934 ms
//

function html_e5a0e306ef6308a073c808af8f3c97aa($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (($t1 = BOUCLE_groupeshtml_e5a0e306ef6308a073c808af8f3c97aa($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
<select' .
		(($t3 = strval(interdire_scripts(entites_html((@$Pile[0]['name']),true))))!=='' ?
				(' name=\'' . $t3 . '\'') :
				'') .
		(($t3 = strval(interdire_scripts(entites_html((@$Pile[0]['id']),true))))!=='' ?
				(' id=\'' . $t3 . '\'') :
				'') .
		'>
') . $t1 . '
</select>
') :
		'');

	return analyse_resultat_skel('html_e5a0e306ef6308a073c808af8f3c97aa', $Cache, $page, '../prive/formulaires/selecteur_groupe_mot.html');
}
?>