<?php

/*
 * Squelette : prive/modeles/emb.html
 * Date :      Mon, 10 Nov 2014 19:51:41 GMT
 * Compile :   Fri, 05 Dec 2014 00:31:52 GMT
 * Boucles :   _ext
 */ 

/* BOUCLE documents  */

 function BOUCLE_exthtml_5204c14895f6ccfbe40920b769f397af(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'documents';
	static $id = '_ext';
	static $from = array('documents' => 'spip_documents','L1' => 'spip_types_documents');
	static $type = array();
	static $groupby = array();
	static $select = array("documents.extension",
		"documents.id_document",
		"L1.mime_type");
	static $orderby = array();
	$where = 
			array(
			array('!=', 'documents.mode', '\'vignette\''), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'documents.id_document', sql_quote($Pile[0]['id_document'],'','int')));
	static $join = array('L1' => array('documents','extension'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('prive/modeles/emb.html','html_5204c14895f6ccfbe40920b769f397af','_ext',1,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
interdire_scripts((find_in_path((	'modeles/emb_' .
	interdire_scripts($Pile[$SP]['extension']) .
	'.html')) ? recuperer_fond( (	'modeles/emb_' .
		interdire_scripts($Pile[$SP]['extension'])) , array_merge($Pile[0],array('id' => $Pile[$SP]['id_document'] ,
	'emb' => ' ' )), array('compil'=>array('prive/modeles/emb.html','html_5204c14895f6ccfbe40920b769f397af','_ext',0,$GLOBALS['spip_lang'])), ''):recuperer_fond( (	'modeles/' .
		interdire_scripts(substr($Pile[$SP]['mime_type'],'0',interdire_scripts(strpos($Pile[$SP]['mime_type'],'/'))))) , array_merge($Pile[0],array('id' => $Pile[$SP]['id_document'] ,
	'emb' => ' ' )), array('compil'=>array('prive/modeles/emb.html','html_5204c14895f6ccfbe40920b769f397af','_ext',0,$GLOBALS['spip_lang'])), ''))) .
'
');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette prive/modeles/emb.html
// Temps de compilation total: 5.133 ms
//

function html_5204c14895f6ccfbe40920b769f397af($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_exthtml_5204c14895f6ccfbe40920b769f397af($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_5204c14895f6ccfbe40920b769f397af', $Cache, $page, 'prive/modeles/emb.html');
}
?>