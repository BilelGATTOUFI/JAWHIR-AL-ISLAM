<?php
if (defined('_ECRIRE_INC_VERSION')) {
if (file_exists($f=_ROOT_PLUGINS.'auto/cfg/'.'cfg_options.php')){ include_once $f;}
if (file_exists($f=_ROOT_PLUGINS.'auto/couteau_suisse/'.'couteau_suisse_options.php')){ include_once $f;}
if (file_exists($f=_ROOT_PLUGINS.'auto/Lecteur_multimedia/'.'player_options.php')){ include_once $f;}
if (file_exists($f=_ROOT_PLUGINS.'auto/palette/'.'palette_options.php')){ include_once $f;}
if (file_exists($f=_ROOT_PLUGINS.'auto/spip-bonux/'.'spip_bonux_options.php')){ include_once $f;}
if (file_exists($f=_ROOT_PLUGINS.'auto/ahuntsic/'.'ahuntsic_options.php')){ include_once $f;}
if (file_exists($f=_ROOT_PLUGINS.'auto/saisies/'.'saisies_options.php')){ include_once $f;}
if (file_exists($f=_ROOT_EXTENSIONS.'compresseur/'.'compresseur_http.php')){ include_once $f;}
if (!function_exists('boutons_plugins')){function boutons_plugins(){return unserialize('a:4:{s:8:"csconfig";a:6:{s:6:"parent";s:19:"bando_configuration";s:8:"position";s:0:"";s:5:"titre";s:18:"couteauprive:titre";s:5:"icone";s:21:"images/couteau-16.png";s:3:"url";s:20:"admin_couteau_suisse";s:4:"args";s:0:"";}s:15:"player_config21";a:6:{s:6:"parent";s:15:"bando_squelette";s:8:"position";s:0:"";s:5:"titre";s:17:"player:player_nom";s:5:"icone";s:20:"images/player-16.png";s:3:"url";s:12:"player_admin";s:4:"args";s:0:"";}s:10:"socialtags";a:6:{s:6:"parent";s:13:"configuration";s:8:"position";s:0:"";s:5:"titre";s:21:"socialtags:titre_menu";s:5:"icone";s:42:"prive/themes/spip/images/socialtags-24.png";s:3:"url";s:21:"configurer_socialtags";s:4:"args";s:0:"";}s:11:"socialtags2";a:6:{s:6:"parent";s:15:"bando_squelette";s:8:"position";s:0:"";s:5:"titre";s:21:"socialtags:titre_menu";s:5:"icone";s:42:"prive/themes/spip/images/socialtags-16.png";s:3:"url";s:21:"configurer_socialtags";s:4:"args";s:0:"";}}');}}
if (!function_exists('onglets_plugins')){function onglets_plugins(){return unserialize('a:0:{}');}}
}
?>