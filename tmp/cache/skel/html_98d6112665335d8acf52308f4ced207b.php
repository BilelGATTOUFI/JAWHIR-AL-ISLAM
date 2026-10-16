<?php

/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-petition.html
 * Date :      Mon, 10 Nov 2014 19:36:08 GMT
 * Compile :   Thu, 04 Dec 2014 12:39:57 GMT
 * Boucles :   _signature-message-td, _signatures
 */ 

/* BOUCLE petitions  */

 function BOUCLE_signature_message_tdhtml_98d6112665335d8acf52308f4ced207b(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'petitions';
	static $id = '_signature-message-td';
	static $from = array('petitions' => 'spip_petitions');
	static $type = array();
	static $groupby = array();
	$select = array("count(*)");
	static $orderby = array();
	$where = 
			array(
			array('=', 'petitions.id_article', sql_quote($Pile[$SP]['id_article'],'','int')), 
			array('=', 'petitions.message', "'oui'"));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-petition.html','html_98d6112665335d8acf52308f4ced207b','_signature-message-td',25,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_signature-message-td']['total'] = @intval(($cc=sql_fetch($result))?array_shift($cc):0);
	$SP++;
	// RESULTATS
	
	$t0 = str_repeat(' ', $Numrows['_signature-message-td']['total']);
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE signatures  */

 function BOUCLE_signatureshtml_98d6112665335d8acf52308f4ced207b(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $champs__signatures = array('id_signature','id_article','date_time','nom_email','ad_email','nom_site','url_site','message','statut','maj');
	// RECHERCHE
	$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
	list($rech_select, $rech_where) = $prepare_recherche(interdire_scripts(entites_html((@$Pile[0]['recherche_signatures']),true)), "signatures", "?","", "false");
	
	static $table = 'signatures';
	static $id = '_signatures';
	static $from = array('signatures' => 'spip_signatures','resultats' => 'spip_resultats');
	static $type = array();
	static $groupby = array();
	$select = array("signatures.id_article",
		"signatures.id_signature",
		"$rech_select",
		"rand() AS hasard",
		"signatures.date_time AS date",
		"signatures.nom_email AS nom",
		"signatures.url_site",
		"signatures.nom_site",
		"signatures.message");
	$orderby = array((($x = preg_replace("/\W/",'', interdire_scripts(entites_html((@$Pile[0]['tri']),true)))) ? (in_array($x, $champs__signatures)  ? ('signatures.' . $x . ' DESC') :($x . ' DESC')) : ''), (($x = preg_replace("/\W/",'', interdire_scripts(entites_html((@$Pile[0]['tri_inverse']),true)))) ? (in_array($x, $champs__signatures)  ? ('signatures.' . $x) :($x)) : ''), (($x = preg_replace("/\W/",'', interdire_scripts((entites_html(sinon(@$Pile[0]['tri'],interdire_scripts(entites_html((@$Pile[0]['tri_inverse']),true))),true) ? '':'date_time')))) ? (in_array($x, $champs__signatures)  ? ('signatures.' . $x . ' DESC') :($x . ' DESC')) : ''));
	$where = 
			array(
			array('=', 'signatures.statut', '\'publie\''), 
			array('=', 'signatures.id_article', sql_quote($Pile[0]['id_article'],'','int')), $rech_where?$rech_where:'');
	static $join = array('resultats' => array('signatures','id','id_signature'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-petition.html','html_98d6112665335d8acf52308f4ced207b','_signatures',5,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_signatures']['compteur_boucle'] = 0;
	$Numrows['_signatures']['total'] = @intval(sql_count($result));
	$debut_boucle = isset($Pile[0]['debut_signatures']) ? $Pile[0]['debut_signatures'] : _request('debut_signatures');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_signatures'] = quete_debut_pagination('id_signature',$Pile[0]['@id_signature'] = substr($debut_boucle,1),(($a = intval(interdire_scripts(entites_html(sinon(@$Pile[0]['pagination'],'15'),true)))) ? $a : 10),$result,'');
		if (!sql_seek($result,0,'')){
			@sql_free($result,'');
			$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
		}
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_signatures']['total']-1)/((($a = intval(interdire_scripts(entites_html(sinon(@$Pile[0]['pagination'],'15'),true)))) ? $a : 10)))*((($a = intval(interdire_scripts(entites_html(sinon(@$Pile[0]['pagination'],'15'),true)))) ? $a : 10))));
	$fin_boucle = min(($tout ? $Numrows['_signatures']['total'] : $debut_boucle+(($a = intval(interdire_scripts(entites_html(sinon(@$Pile[0]['pagination'],'15'),true)))) ? $a : 10) - 1), $Numrows['_signatures']['total'] - 1);
	$Numrows['_signatures']['grand_total'] = $Numrows['_signatures']['total'];
	$Numrows['_signatures']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_signatures']['grand_total'] AND sql_seek($result,$debut_boucle,'','continue'))
		$Numrows['_signatures']['compteur_boucle'] = $debut_boucle;
	
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_signatures']['compteur_boucle']++;
		if ($Numrows['_signatures']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_signatures']['compteur_boucle']-1 > $fin_boucle) break;
		$t0 .= (
'
		<tr id=\'id_signature' .
$Pile[$SP]['id_signature'] .
'\'>
			<td class="signature-date"><small>' .
interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date']))) .
'</small></td>
			<td class="signature-nom"><strong class=""><small>' .
interdire_scripts(safehtml(typo($Pile[$SP]['nom'], "TYPO", $connect))) .
'</small></strong></td>
			<td class="signature-site">' .
(($t1 = strval(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))!=='' ?
		((	'<strong><small class=""><a href="') . $t1 . (	'"' .
	(($t2 = strval(interdire_scripts(couper(attribut_html(safehtml(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect))),'100'))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	' class="spip_out">' .
	interdire_scripts(couper(attribut_html(safehtml(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect))),'80')) .
	'</a></small></strong>')) :
		'') .
' </td>
		</tr>
			
			' .
(($t1 = BOUCLE_signature_message_tdhtml_98d6112665335d8acf52308f4ced207b($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . (	'
			<tr id=\'id_signature' .
		$Pile[$SP]['id_signature'] .
		'\'>
				<td class="signature-message">&nbsp;</td>
				<td colspan="2" class="signature-message "><small>' .
		interdire_scripts(PtoBR(safehtml(propre($Pile[$SP]['message'], $connect)))) .
		'</small></td>
			</tr>
			')) :
		'') .
'
		');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-petition.html
// Temps de compilation total: 20.152 ms
//

function html_98d6112665335d8acf52308f4ced207b($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
executer_balise_dynamique('FORMULAIRE_SIGNATURE',
	array(@$Pile[0]['id_article'],quete_petitions(@$Pile[0]['id_article'],'','','', $Cache)),
	array('plugins/auto/ahuntsic/inc/inc-petition.html','html_98d6112665335d8acf52308f4ced207b','',2,$GLOBALS['spip_lang'])) .
'


' .
(($t1 = BOUCLE_signatureshtml_98d6112665335d8acf52308f4ced207b($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
<div id="signatures">
<form method=\'get\' action=\'' .
		self() .
		'\'>
	' .
		form_hidden(self()) .
		'
	' .
		filtre_pagination_dist($Numrows["_signatures"]["grand_total"],
 		'_signatures',
		isset($Pile[0]['debut_signatures'])?$Pile[0]['debut_signatures']:intval(_request('debut_signatures')),
		(($a = intval(interdire_scripts(entites_html(sinon(@$Pile[0]['pagination'],'15'),true)))) ? $a : 10), false, '', '', array()) .
		'

	<table summary="' .
		_T('public/spip/ecrire:signatures_petition') .
		'">
	<caption><h2>' .
		(isset($Numrows['_signatures']['grand_total'])
			? $Numrows['_signatures']['grand_total'] : $Numrows['_signatures']['total']) .
		' ' .
		_T('public/spip/ecrire:signatures_petition') .
		'</h2></caption>
		<thead>
			<th class="signature-date"><a href=\'' .
		parametre_url(parametre_url(self(),'tri','date_time'),'tri_inverse','') .
		'#signatures\' title="' .
		_T('public/spip/ecrire:lien_trier_date') .
		'">' .
		_T('public/spip/ecrire:date') .
		'</a></th>
			<th class="signature-nom"><a href=\'' .
		parametre_url(parametre_url(self(),'tri','nom_email'),'tri_inverse','') .
		'#signatures\' title="' .
		_T('public/spip/ecrire:lien_trier_nom') .
		'">' .
		_T('public/spip/ecrire:nom') .
		'</a></th>
			<th class="signature-nom">' .
		_T('public/spip/ecrire:site_web') .
		'</th>
		</thead>
		') . $t1 . (	'
	</table>
	
	' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_signatures"]["grand_total"],
 		'_signatures',
		isset($Pile[0]['debut_signatures'])?$Pile[0]['debut_signatures']:intval(_request('debut_signatures')),
		(($a = intval(interdire_scripts(entites_html(sinon(@$Pile[0]['pagination'],'15'),true)))) ? $a : 10), true, '', '', array())))!=='' ?
				('<p class="pagination">' . $t3 . '</p>') :
				'') .
		'

	
	' .
		(($t3 = strval(((((isset($Numrows['_signatures']['grand_total'])
			? $Numrows['_signatures']['grand_total'] : $Numrows['_signatures']['total']) > '30')) ?' ' :'')))!=='' ?
				($t3 . (	'
	<div class="formulaire_spip formulaire_recherche" id="formulaire_recherche_signatures"><label for="recherche_signatures">' .
			_T('public/spip/ecrire:info_rechercher') .
			'</label> <input type="text" class="text" size="10" name="recherche_signatures" id="recherche_signatures" style=\'font-style: italic;\' value=" ' .
			_T('public/spip/ecrire:entree_signature') .
			'"/> <input type="submit" class="submit" value="' .
			_T('public/spip/ecrire:info_rechercher') .
			'" /></div>
	')) :
				'') .
		'
</form>
</div><!--#signatures-->
')) :
		''));

	return analyse_resultat_skel('html_98d6112665335d8acf52308f4ced207b', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-petition.html');
}
?>