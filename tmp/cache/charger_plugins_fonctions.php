<?php
if (defined('_ECRIRE_INC_VERSION')) {
if (file_exists($f=_ROOT_EXTENSIONS.'filtres_images/'.'images_fonctions.php')){ include_once $f;}
if (file_exists($f=_ROOT_EXTENSIONS.'porte_plume/'.'inc/barre_outils.php')){ include_once $f;}
if (file_exists($f=_ROOT_PLUGINS.'auto/cfg/'.'cfg_fonctions.php')){ include_once $f;}
if (file_exists($f=_ROOT_PLUGINS.'auto/couteau_suisse/'.'couteau_suisse_fonctions.php')){ include_once $f;}
if (file_exists($f=_ROOT_PLUGINS.'auto/Lecteur_multimedia/'.'player_fonctions.php')){ include_once $f;}
if (file_exists($f=_ROOT_PLUGINS.'auto/spip-bonux/'.'public/spip_bonux_criteres.php')){ include_once $f;}
if (file_exists($f=_ROOT_PLUGINS.'auto/spip-bonux/'.'public/spip_bonux_balises.php')){ include_once $f;}
if (file_exists($f=_ROOT_PLUGINS.'auto/spip-bonux/'.'spip_bonux_fonctions.php')){ include_once $f;}
if (file_exists($f=_ROOT_PLUGINS.'auto/spip-bonux/'.'configurer/pipelines.php')){ include_once $f;}
if (file_exists($f=_ROOT_PLUGINS.'auto/ahuntsic/'.'ahuntsic_fonctions.php')){ include_once $f;}
if (file_exists($f=_ROOT_PLUGINS.'auto/saisies/'.'balise/saisie.php')){ include_once $f;}
if (file_exists($f=_ROOT_PLUGINS.'auto/saisies/'.'inc/saisies.php')){ include_once $f;}
if (file_exists($f=_ROOT_PLUGINS.'auto/saisies/'.'saisies_fonctions.php')){ include_once $f;}
if (file_exists($f=_ROOT_EXTENSIONS.'compresseur/'.'filtres/compresseur.php')){ include_once $f;}
}
?>