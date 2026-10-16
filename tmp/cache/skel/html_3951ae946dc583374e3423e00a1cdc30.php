<?php

/*
 * Squelette : prive/modeles/image.html
 * Date :      Mon, 10 Nov 2014 19:51:42 GMT
 * Compile :   Fri, 05 Dec 2014 00:31:52 GMT
 * Boucles :   _tous
 */ 

/* BOUCLE documents  */

 function BOUCLE_toushtml_3951ae946dc583374e3423e00a1cdc30(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'documents';
	static $id = '_tous';
	static $from = array('documents' => 'spip_documents','L1' => 'spip_types_documents');
	static $type = array();
	static $groupby = array();
	static $select = array("L1.inclus",
		"documents.id_document",
		"documents.largeur",
		"documents.hauteur",
		"documents.titre",
		"L1.titre AS type_document",
		"documents.taille",
		"L1.mime_type",
		"documents.descriptif");
	static $orderby = array();
	$where = 
			array(
			array('!=', 'documents.mode', '\'vignette\''), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'documents.id_document', sql_quote(interdire_scripts(@$Pile[0]['id']),'','int')));
	static $join = array('L1' => array('documents','extension'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('prive/modeles/image.html','html_3951ae946dc583374e3423e00a1cdc30','_tous',1,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
(($t1 = strval(interdire_scripts((((((($Pile[$SP]['inclus'] == 'image')) AND (interdire_scripts(((entites_html(sinon(@$Pile[0]['emb'],''),true)) ?'' :' ')))) ?' ' :'')) ?' ' :''))))!=='' ?
		($t1 . (	'
<span class=\'spip_document_' .
	$Pile[$SP]['id_document'] .
	' spip_documents' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['align']),true))))!=='' ?
			(' spip_documents_' . $t2) :
			'') .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['class']),true))))!=='' ?
			(' ' . $t2) :
			'') .
	' spip_lien_ok\'' .
	(($t2 = strval(interdire_scripts(match(entites_html((@$Pile[0]['align']),true),'left|right'))))!=='' ?
			('
	 style=\'float:' . $t2 . (	';' .
		(($t3 = strval(interdire_scripts($Pile[$SP]['largeur'])))!=='' ?
				(' width:' . $t3 . 'px;') :
				'') .
		'\'')) :
			'') .
	'>' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['lien']),true))))!=='' ?
			('
	<a href="' . $t2 . (	'"' .
		(($t3 = strval(interdire_scripts(entites_html((@$Pile[0]['lien_class']),true))))!=='' ?
				('
		class="' . $t3 . '"') :
				'') .
		'>')) :
			'') .
	'<img src=\'' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))) .
	'\'
		' .
	(($t2 = strval(interdire_scripts($Pile[$SP]['largeur'])))!=='' ?
			(' width="' . $t2 . '"') :
			'') .
	(($t2 = strval(interdire_scripts($Pile[$SP]['hauteur'])))!=='' ?
			(' height="' . $t2 . '"') :
			'') .
	(($t2 = strval(interdire_scripts(attribut_html(supprimer_numero(typo($Pile[$SP]['titre']))))))!=='' ?
			('
			title="' . $t2 . '"') :
			'') .
	'
			alt="' .
	interdire_scripts(attribut_html(supprimer_numero(typo($Pile[$SP]['titre'])))) .
	'" />' .
	interdire_scripts((entites_html((@$Pile[0]['lien']),true) ? '</a>':'')) .
	'</span>
')) :
		'') .
(($t1 = strval(interdire_scripts((((((($Pile[$SP]['inclus'] == 'image')) AND (interdire_scripts(((entites_html(sinon(@$Pile[0]['emb'],''),true)) ?' ' :'')))) ?' ' :'')) ?' ' :''))))!=='' ?
		($t1 . (	'
' .
	vide($Pile['vars']['fichier'] = vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true)))) .
	vide($Pile['vars']['width'] = interdire_scripts($Pile[$SP]['largeur'])) .
	vide($Pile['vars']['height'] = interdire_scripts($Pile[$SP]['hauteur'])) .
	vide($Pile['vars']['url'] = interdire_scripts(entites_html((@$Pile[0]['lien']),true))) .
	'<dl class=\'spip_document_' .
	$Pile[$SP]['id_document'] .
	' spip_documents' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['align']),true))))!=='' ?
			(' spip_documents_' . $t2) :
			'') .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['class']),true))))!=='' ?
			(' ' . $t2) :
			'') .
	' spip_lien_ok\'' .
	(($t2 = strval(interdire_scripts(match(entites_html((@$Pile[0]['align']),true),'left|right'))))!=='' ?
			(' style=\'float:' . $t2 . (	';' .
		(($t3 = strval(max(min((is_array($a = ($Pile["vars"])) ? $a['width'] : ""),'350'),'120')))!=='' ?
				('width:' . $t3) :
				'') .
		'px;\'')) :
			'') .
	'>
<dt>' .
	(($t2 = strval((is_array($a = ($Pile["vars"])) ? $a['url'] : "")))!=='' ?
			('<a href="' . $t2 . (	'"' .
		(($t3 = strval(interdire_scripts(entites_html((@$Pile[0]['lien_class']),true))))!=='' ?
				(' class="' . $t3 . '"') :
				'') .
		' title=\'' .
		interdire_scripts($Pile[$SP]['type_document']) .
		' - ' .
		interdire_scripts(texte_backend(taille_en_octets($Pile[$SP]['taille']))) .
		'\'' .
		(($t3 = strval(interdire_scripts((entites_html((@$Pile[0]['lien']),true) ? interdire_scripts(entites_html((@$Pile[0]['lien_mime']),true)):interdire_scripts($Pile[$SP]['mime_type'])))))!=='' ?
				(' type="' . $t3 . '"') :
				'') .
		'>')) :
			'') .
	'<img src=\'' .
	(is_array($a = ($Pile["vars"])) ? $a['fichier'] : "") .
	'\' width=\'' .
	(is_array($a = ($Pile["vars"])) ? $a['width'] : "") .
	'\' height=\'' .
	(is_array($a = ($Pile["vars"])) ? $a['height'] : "") .
	'\' alt=\'' .
	interdire_scripts($Pile[$SP]['type_document']) .
	' - ' .
	interdire_scripts(texte_backend(taille_en_octets($Pile[$SP]['taille']))) .
	'\' />' .
	((is_array($a = ($Pile["vars"])) ? $a['url'] : "") ? '</a>':'') .
	'</dt>' .
	(($t2 = strval(interdire_scripts(supprimer_numero(typo($Pile[$SP]['titre'])))))!=='' ?
			((	'
<dt class=\'' .
		'spip_doc_titre\'' .
		(($t3 = strval(max(min((is_array($a = ($Pile["vars"])) ? $a['width'] : ""),'350'),'120')))!=='' ?
				(' style=\'width:' . $t3 . 'px;\'') :
				'') .
		'><strong>') . $t2 . '</strong></dt>') :
			'') .
	(($t2 = strval(interdire_scripts(PtoBR(propre($Pile[$SP]['descriptif'], $connect)))))!=='' ?
			((	'
<dd class=\'' .
		'spip_doc_descriptif\'' .
		(($t3 = strval(max(min((is_array($a = ($Pile["vars"])) ? $a['width'] : ""),'350'),'120')))!=='' ?
				(' style=\'width:' . $t3 . 'px;\'') :
				'') .
		'>') . $t2 . (	interdire_scripts(PtoBR(calculer_notes())) .
		'</dd>')) :
			'') .
	'
</dl>
')) :
		'') .
(($t1 = strval(interdire_scripts(((($Pile[$SP]['inclus'] == 'embed')) ?' ' :''))))!=='' ?
		('
' . $t1 . (	'
<div class=\'spip_document_' .
	$Pile[$SP]['id_document'] .
	' spip_documents' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['align']),true))))!=='' ?
			(' spip_documents_' . $t2) :
			'') .
	'\'' .
	(($t2 = strval(interdire_scripts(((entites_html(sinon(@$Pile[0]['align'],'center'),true) == 'center') ? '':' '))))!=='' ?
			((	'
style=\'' .
		(($t3 = strval(interdire_scripts((match(entites_html((@$Pile[0]['align']),true),'^(left|right)$') ? ' ':''))))!=='' ?
				($t3 . (	'float:' .
			interdire_scripts(entites_html((@$Pile[0]['align']),true)) .
			';')) :
				'') .
		' ') . $t2 . '\'') :
			'') .
	'>
<object	data=\'' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))) .
	'\' 
	type=\'' .
	interdire_scripts($Pile[$SP]['mime_type']) .
	'\'' .
	(($t2 = strval(interdire_scripts((entites_html((@$Pile[0]['largeur']),true) ? '':interdire_scripts($Pile[$SP]['largeur'])))))!=='' ?
			('
	width=\'' . $t2 . '\'') :
			'') .
	(($t2 = strval(interdire_scripts((entites_html((@$Pile[0]['hauteur']),true) ? '':interdire_scripts($Pile[$SP]['hauteur'])))))!=='' ?
			('
	height=\'' . $t2 . '\'') :
			'') .
	'
	' .
	interdire_scripts(env_to_attributs(@serialize($Pile[0]))) .
	' >
	<param name=\'src\' value=\'' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))) .
	'\' />
	' .
	appliquer_filtre($Pile[$SP]['id_document'],interdire_scripts($Pile[$SP]['mime_type'])) .
	'
</object>' .
	(($t2 = strval(interdire_scripts(supprimer_numero(typo($Pile[$SP]['titre'])))))!=='' ?
			('
<div class=\'spip_doc_titre\'><strong>' . $t2 . '</strong></div>
') :
			'') .
	(($t2 = strval(interdire_scripts(PtoBR(propre($Pile[$SP]['descriptif'], $connect)))))!=='' ?
			('
<div class=\'spip_doc_descriptif\'>' . $t2 . (	interdire_scripts(PtoBR(calculer_notes())) .
		'</div>
')) :
			'') .
	'</div>')) :
		'') .
'
');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette prive/modeles/image.html
// Temps de compilation total: 8.753 ms
//

function html_3951ae946dc583374e3423e00a1cdc30($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_toushtml_3951ae946dc583374e3423e00a1cdc30($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_3951ae946dc583374e3423e00a1cdc30', $Cache, $page, 'prive/modeles/image.html');
}
?>