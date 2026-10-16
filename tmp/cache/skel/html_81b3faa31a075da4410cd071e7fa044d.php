<?php

/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-forums.html
 * Date :      Mon, 10 Nov 2014 19:36:06 GMT
 * Compile :   Tue, 07 Jun 2016 15:44:47 GMT
 * Boucles :   _forums_liens
 */ 

/* BOUCLE forums  */

 function BOUCLE_forums_lienshtml_81b3faa31a075da4410cd071e7fa044d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forum';
	static $id = '_forums_liens';
	static $from = array('forum' => 'spip_forum');
	static $type = array();
	static $groupby = array();
	static $select = array("forum.date_heure",
		"forum.date_heure AS date",
		"forum.id_forum",
		"forum.titre");
	static $orderby = array('forum.date_heure DESC');
	static $where = 
			array(
			array('=', 'forum.statut', '\'publie\''));
	static $join = array();
	static $limit = '0,15';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/ahuntsic/inc/inc-forums.html','html_81b3faa31a075da4410cd071e7fa044d','_forums_liens',2,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
            <li>
                ' .
(($t1 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('<span>' . $t1 . '</span>') :
		'') .
'
               <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_forum'], 'forum', '', '', true))) .
'">' .
interdire_scripts(supprimer_numero(safehtml(typo($Pile[$SP]['titre'], "TYPO", $connect)))) .
'</a>
            </li>
            ');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-forums.html
// Temps de compilation total: 1.782 ms
//

function html_81b3faa31a075da4410cd071e7fa044d($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'    <!-- Liens des forums -->
    ' .
(($t1 = BOUCLE_forums_lienshtml_81b3faa31a075da4410cd071e7fa044d($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
    <div class="menu">
    <h2 class="structure">' .
		_T('public/spip/ecrire:messages_recents') .
		'</h2>
      <ul>
        <li><b>' .
		_T('public/spip/ecrire:derniers_commentaires') .
		'</b>
          <ul>
            ') . $t1 . '
          </ul>
        </li>
      </ul>
    </div><!-- menu -->
    ') :
		'') .
'
');

	return analyse_resultat_skel('html_81b3faa31a075da4410cd071e7fa044d', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-forums.html');
}
?>