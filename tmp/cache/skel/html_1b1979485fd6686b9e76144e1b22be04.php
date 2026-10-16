<?php

/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-rub-documents.html
 * Date :      Mon, 10 Nov 2014 19:36:09 GMT
 * Compile :   Sun, 12 Jun 2016 08:42:13 GMT
 * Boucles :   _documents_portfolio, _afficher_document, _documents_decompte, _documents_joints
 */ 

/* BOUCLE documents  */

 function BOUCLE_documents_portfoliohtml_1b1979485fd6686b9e76144e1b22be04(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	$in = array();
	$in[]= 'png';
	$in[]= 'jpg';
	$in[]= 'gif';
	static $table = 'documents';
	static $id = '_documents_portfolio';
	static $from = array('documents' => 'spip_documents LEFT JOIN spip_documents_liens AS l
			ON documents.id_document=l.id_document
			LEFT JOIN spip_articles AS aa
				ON (l.id_objet=aa.id_article AND l.objet=\'article\')
			LEFT JOIN spip_breves AS bb
				ON (l.id_objet=bb.id_breve AND l.objet=\'breve\')
			LEFT JOIN spip_rubriques AS rr
				ON (l.id_objet=rr.id_rubrique AND l.objet=\'rubrique\')
			LEFT JOIN spip_forum AS ff
				ON (l.id_objet=ff.id_forum AND l.objet=\'forum\')
		','L1' => 'spip_documents_liens','L2' => 'spip_types_documents');
	static $type = array();
	static $groupby = array("documents.id_document");
	static $select = array("0+documents.titre AS num",
		"documents.date",
		"documents.id_document",
		"L2.mime_type",
		"documents.titre",
		"documents.fichier");
	static $orderby = array('num', 'documents.date');
	$where = 
			array('((aa.statut = \'publie\' AND aa.date<='.sql_quote(quete_date_postdates()).') OR bb.statut = \'publie\' OR rr.statut = \'publie\' OR ff.statut=\'publie\')', 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[0]['id_rubrique'])), 
			array('=', 'L1.objet', sql_quote('rubrique')), 
			array('=', 'documents.mode', "'document'"), sql_in('documents.extension',sql_quote($in)), 
			array('=', 'L1.vu', "'non'"), 
			array(sql_in('documents.id_document', $doublons[$doublons_index[]= ('documents')], 'NOT')));
	static $join = array('L1' => array('documents','id_document'), 'L2' => array('documents','extension'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-rub-documents.html','html_1b1979485fd6686b9e76144e1b22be04','_documents_portfolio',2,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_document']; // doublons

		$t0 .= (($t1 = strval(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true)))))!=='' ?
		('
		<a href="' . $t1 . (	'" type="' .
	interdire_scripts($Pile[$SP]['mime_type']) .
	'" onclick="location.href=\'' .
	parametre_url(vider_url(urlencode_1738(generer_url_entite(@$Pile[0]['id_rubrique'], 'rubrique', '', '', true))),'id_document',$Pile[$SP]['id_document']) .
	'#documents_portfolio\';return false;"' .
	(($t2 = strval(interdire_scripts(@$Pile[0]['exposer'])))!=='' ?
			(' class="' . $t2 . '"') :
			'') .
	(($t2 = strval(interdire_scripts(couper(attribut_html(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre'])))),'80'))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	'>' .
	interdire_scripts(inserer_attribut(inserer_attribut(filtrer('image_graver', filtrer('image_reduire',copie_locale(get_spip_doc($Pile[$SP]['fichier'])),'0','100')),'class','spip_vignette_portfolio'),'alt',interdire_scripts(couper(attribut_html(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre'])))),'80')))) .
	'</a>
	')) :
		'');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE documents  */

 function BOUCLE_afficher_documenthtml_1b1979485fd6686b9e76144e1b22be04(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	$in[]= 'png';
	$in[]= 'jpg';
	$in[]= 'gif';
	static $table = 'documents';
	static $id = '_afficher_document';
	static $from = array('documents' => 'spip_documents LEFT JOIN spip_documents_liens AS l
			ON documents.id_document=l.id_document
			LEFT JOIN spip_articles AS aa
				ON (l.id_objet=aa.id_article AND l.objet=\'article\')
			LEFT JOIN spip_breves AS bb
				ON (l.id_objet=bb.id_breve AND l.objet=\'breve\')
			LEFT JOIN spip_rubriques AS rr
				ON (l.id_objet=rr.id_rubrique AND l.objet=\'rubrique\')
			LEFT JOIN spip_forum AS ff
				ON (l.id_objet=ff.id_forum AND l.objet=\'forum\')
		','L1' => 'spip_documents_liens','L2' => 'spip_types_documents');
	static $type = array();
	static $groupby = array("documents.id_document");
	static $select = array("documents.id_document",
		"L2.mime_type",
		"documents.titre",
		"documents.descriptif");
	$orderby = array(((!sql_quote($in) OR sql_quote($in)==="''") ? 0 : ('FIELD(documents.extension,' . sql_quote($in) . ')')));
	$where = 
			array('((aa.statut = \'publie\' AND aa.date<='.sql_quote(quete_date_postdates()).') OR bb.statut = \'publie\' OR rr.statut = \'publie\' OR ff.statut=\'publie\')', 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'documents.id_document', sql_quote($Pile[0]['id_document'],'','int')), 
			array('=', 'L1.id_objet', sql_quote($Pile[0]['id_rubrique'])), 
			array('=', 'L1.objet', sql_quote('rubrique')), 
			array('=', 'documents.mode', "'document'"), sql_in('documents.extension',sql_quote($in)));
	static $join = array('L1' => array('documents','id_document'), 'L2' => array('documents','extension'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-rub-documents.html','html_1b1979485fd6686b9e76144e1b22be04','_afficher_document',18,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
		<div class="spip_documents spip_documents_center" id="document_actif">
			' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',
	((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' :
	recuperer_fond('modeles/emb', array('lang' => $GLOBALS["spip_lang"] ,'id_document'=>$Pile[$SP]['id_document'],'id'=>$Pile[$SP]['id_document'],'recurs'=>(++$recurs)), array('compil'=>array('plugins/auto/ahuntsic/inc/inc-rub-documents.html','html_1b1979485fd6686b9e76144e1b22be04','_afficher_document',0,$GLOBALS['spip_lang']), 'trim'=>true), ''))
,'520','0'))))!=='' ?
		((	'<a href="' .
	url_absolue(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true)))) .
	'" type="' .
	interdire_scripts($Pile[$SP]['mime_type']) .
	'">') . $t1 . '</a>') :
		'') .
'
			' .
(($t1 = strval(interdire_scripts(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre']))))))!=='' ?
		((	'<div class="spip_doc_titre">') . $t1 . '</div>') :
		'') .
'
			' .
(($t1 = strval(interdire_scripts(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect)))))!=='' ?
		((	'<div class="spip_doc_descriptif">') . $t1 . '</div>') :
		'') .
'
		</div>
	');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE documents  */

 function BOUCLE_documents_decomptehtml_1b1979485fd6686b9e76144e1b22be04(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	$in[]= 'gif';
	$in[]= 'jpg';
	$in[]= 'png';
	static $table = 'documents';
	static $id = '_documents_decompte';
	static $from = array('documents' => 'spip_documents LEFT JOIN spip_documents_liens AS l
			ON documents.id_document=l.id_document
			LEFT JOIN spip_articles AS aa
				ON (l.id_objet=aa.id_article AND l.objet=\'article\')
			LEFT JOIN spip_breves AS bb
				ON (l.id_objet=bb.id_breve AND l.objet=\'breve\')
			LEFT JOIN spip_rubriques AS rr
				ON (l.id_objet=rr.id_rubrique AND l.objet=\'rubrique\')
			LEFT JOIN spip_forum AS ff
				ON (l.id_objet=ff.id_forum AND l.objet=\'forum\')
		','L1' => 'spip_documents_liens','L2' => 'spip_rubriques');
	static $type = array();
	static $groupby = array("documents.id_document",
		"documents.id_document");
	static $select = array("documents.id_document");
	static $orderby = array();
	$where = 
			array('((aa.statut = \'publie\' AND aa.date<='.sql_quote(quete_date_postdates()).') OR bb.statut = \'publie\' OR rr.statut = \'publie\' OR ff.statut=\'publie\')', 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L2.id_rubrique', sql_quote($Pile[0]['id_rubrique'])), 
			array('=', 'documents.mode', "'document'"), 
			array('=', 'L2.texte', "''"), sql_in('documents.extension',sql_quote($in),'NOT'), 
			array('=', 'L1.vu', "'non'"));
	$join = array('L1' => array('documents','id_document'), 'L2' => array('L1','id_rubrique','id_objet','L1.objet='.sql_quote('rubrique')));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-rub-documents.html','html_1b1979485fd6686b9e76144e1b22be04','_documents_decompte',30,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_documents_decompte']['total'] = @intval(sql_count($result));
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
' .
(($Numrows['_documents_decompte']['total'] == '1') ? trim(recuperer_fond( 'modeles/emb' , array('id_document' => $Pile[$SP]['id_document'] ), array('compil'=>array('plugins/auto/ahuntsic/inc/inc-rub-documents.html','html_1b1979485fd6686b9e76144e1b22be04','_documents_decompte',32,$GLOBALS['spip_lang'])), '')):''));
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE documents  */

 function BOUCLE_documents_jointshtml_1b1979485fd6686b9e76144e1b22be04(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	$in[]= 'gif';
	$in[]= 'jpg';
	$in[]= 'png';
	static $table = 'documents';
	static $id = '_documents_joints';
	static $from = array('documents' => 'spip_documents LEFT JOIN spip_documents_liens AS l
			ON documents.id_document=l.id_document
			LEFT JOIN spip_articles AS aa
				ON (l.id_objet=aa.id_article AND l.objet=\'article\')
			LEFT JOIN spip_breves AS bb
				ON (l.id_objet=bb.id_breve AND l.objet=\'breve\')
			LEFT JOIN spip_rubriques AS rr
				ON (l.id_objet=rr.id_rubrique AND l.objet=\'rubrique\')
			LEFT JOIN spip_forum AS ff
				ON (l.id_objet=ff.id_forum AND l.objet=\'forum\')
		','L1' => 'spip_documents_liens','L2' => 'spip_types_documents');
	static $type = array();
	static $groupby = array("documents.id_document");
	static $select = array("0+documents.titre AS num",
		"documents.date",
		"documents.titre",
		"documents.id_document",
		"L2.titre AS type_document",
		"documents.taille",
		"documents.descriptif");
	static $orderby = array('num', 'documents.date DESC');
	$where = 
			array('((aa.statut = \'publie\' AND aa.date<='.sql_quote(quete_date_postdates()).') OR bb.statut = \'publie\' OR rr.statut = \'publie\' OR ff.statut=\'publie\')', 
			array('!=', 'documents.mode', '\'vignette\''), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[0]['id_rubrique'])), 
			array('=', 'L1.objet', sql_quote('rubrique')), sql_in('documents.extension',sql_quote($in),'NOT'), 
			array('=', 'L1.vu', "'non'"));
	static $join = array('L1' => array('documents','id_document'), 'L2' => array('documents','extension'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-rub-documents.html','html_1b1979485fd6686b9e76144e1b22be04','_documents_joints',39,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('spip:info_document');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t1 = (
'
				' .
(($t1 = strval(interdire_scripts(supprimer_numero(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre'])))))))!=='' ?
		((	'<h3 class="" style="margin-bottom: .6em;"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))) .
	'">') . $t1 . '</a></h3>') :
		'') .
'
				' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',(($doublons["documents"] .= ",". $Pile[$SP]['id_document']) ? quete_logo_document(quete_document($Pile[$SP]['id_document'], ''), vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))), '', '', 0, 0, '') : ''),'60','0'))))!=='' ?
		('<div style="float:left;padding-right: .5em;  width:36%;">
					<div style="float:left; margin-right: .5em;">' . $t1 . (	'</div>
					<small>
						' .
	(($t2 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
			($t2 . '<br />') :
			'') .
	'
						' .
	(($t2 = strval(interdire_scripts($Pile[$SP]['type_document'])))!=='' ?
			((	$l1 .
		' : ') . $t2 . '<br />') :
			'') .
	'
						' .
	interdire_scripts(taille_en_octets($Pile[$SP]['taille'])) .
	'
					</small>
				</div>')) :
		'') .
'
				' .
(($t1 = strval(interdire_scripts(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect)))))!=='' ?
		((	'<div class="" style="margin: 0 0 0 40%; border-left: 1px gray dotted;padding-left: 1em">') . $t1 . '</div>') :
		'') .
'
		');
		$t0 .= (($t1 && $t0) ? '<hr style=\'clear:both\' />' : '') . $t1;
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-rub-documents.html
// Temps de compilation total: 16.292 ms
//

function html_1b1979485fd6686b9e76144e1b22be04($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
(($t1 = BOUCLE_documents_portfoliohtml_1b1979485fd6686b9e76144e1b22be04($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<div id="documents_portfolio">
			<h2>' .
		_T('public/spip/ecrire:info_portfolio') .
		'</h2>
	') . $t1 . '
		</div>
') :
		'') .
'


	' .
BOUCLE_afficher_documenthtml_1b1979485fd6686b9e76144e1b22be04($Cache, $Pile, $doublons, $Numrows, $SP) .
'


' .
BOUCLE_documents_decomptehtml_1b1979485fd6686b9e76144e1b22be04($Cache, $Pile, $doublons, $Numrows, $SP) .
'



	' .
(($t1 = BOUCLE_documents_jointshtml_1b1979485fd6686b9e76144e1b22be04($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
	<h2>' .
		_T('ecrire:titre_documents_joints') .
		'</h2>
	<div class="chapo" id="documents" style="line-height:1;"> 
		') . $t1 . '
		<br class="nettoyeur" />
	</div><!-- chapo -->
	') :
		'') .
'
');

	return analyse_resultat_skel('html_1b1979485fd6686b9e76144e1b22be04', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-rub-documents.html');
}
?>