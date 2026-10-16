<?php

/*
 * Squelette : ../prive/infos/breve.html
 * Date :      Mon, 10 Nov 2014 19:51:26 GMT
 * Compile :   Wed, 30 Mar 2016 12:23:45 GMT
 * Boucles :   _breve
 */ 

/* BOUCLE breves  */

 function BOUCLE_brevehtml_fa47d90f031551d5da625ceb0700d3fd(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[0]['statut']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	static $table = 'breves';
	static $id = '_breve';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.id_breve",
		"breves.id_rubrique",
		"breves.statut");
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
		 array('../prive/infos/breve.html','html_fa47d90f031551d5da625ceb0700d3fd','_breve',1,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('public/spip/ecrire:info_gauche_numero_breve');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
<div class=\'infos\'>
<div class=\'numero\'>' .
$l1 .
'<p>' .
$Pile[$SP]['id_breve'] .
'</p></div>


' .
instituer_breve($Pile[$SP]['id_breve'],$Pile[$SP]['id_rubrique'],interdire_scripts($Pile[$SP]['statut'])) .
'


' .
voir_en_ligne('breve',$Pile[$SP]['id_breve'],interdire_scripts($Pile[$SP]['statut']),'racine-24.gif','0','0') .
'

</div>
');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette ../prive/infos/breve.html
// Temps de compilation total: 5.117 ms
//

function html_fa47d90f031551d5da625ceb0700d3fd($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_brevehtml_fa47d90f031551d5da625ceb0700d3fd($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_fa47d90f031551d5da625ceb0700d3fd', $Cache, $page, '../prive/infos/breve.html');
}
?>