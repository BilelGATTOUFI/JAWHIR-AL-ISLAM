<?php
// Code d'inclusion pour le plugin 'Couteau Suisse'
++$GLOBALS['cs_spip_options'];
$ip_=$ip;
/* Pour info : derniere_modif_invalide = 0 */
/* Pour info : quota_cache = 10 */
/* Pour info : duree_cache_mutu = 24 */
/* Par defaut : compacte_tout = 0 */
/* Par defaut : compacte_prive = 0 */
/* Par defaut : radio_desactive_cache4 = 2 */
$GLOBALS['delais']=24*3600;

/* Pour info : marqueurs_urls_propres_qs = 1 */
/* Pour info : terminaison_urls_propres_qs =  */
/* Pour info : url_arbo_minuscules = 1 */
/* Pour info : terminaison_urls_libres =  */
/* Pour info : debut_urls_libres =  */
/* Pour info : marqueurs_urls_propres2 = 1 */
/* Pour info : debut_urls_propres2 =  */
/* Pour info : marqueurs_urls_propres = 1 */
/* Pour info : terminaison_urls_propres =  */
/* Pour info : debut_urls_propres =  */
/* Pour info : separateur_urls_page =  */
/* Pour info : terminaison_urls_page =  */
$GLOBALS['type_urls']='propres';
define('_SPIP_SCRIPT', 'spip.php');

switch($GLOBALS['type_urls']) {
	case 'page':break;
	case 'propres':define('_URLS_PROPRES_MAX', 35);break;
	case 'propres2':define('_URLS_PROPRES_MAX', 35);break;
	case 'libres':define('_URLS_PROPRES_MAX', 35);break;
	case 'arbo':define('_URLS_ARBO_MAX', 35);define('_url_arbo_sep_id', '-');define('_terminaison_urls_arbo', '.html');
$GLOBALS['url_arbo_types']=array('rubrique'=>'','article'=>'','breve'=>'','mot'=>'','auteur'=>'','site'=>'');break;
	case 'propres_qs':define('_URLS_PROPRES_MAX', 35);break;
	case 'propres-qs':define('_URLS_PROPRES_MAX', 35);break;
}
?>