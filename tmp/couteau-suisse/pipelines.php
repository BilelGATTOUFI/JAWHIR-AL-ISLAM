<?php
// Code de controle pour le plugin 'Couteau Suisse' : 16 pipeline(s) actif(s)

# Copie du code utilise en eval() pour le pipeline 'pre_description_outil($flux)'
include_spip('outils/ecran_securite');
include_spip('outils/sommaire');
include_spip('outils/couleurs');
if($id=="autobr")
		$texte=str_replace("@BALISES@",cs_balises_traitees("autobr"),$texte);
if($id=="webmestres")
		$texte=str_replace(array("@_CS_LISTE_WEBMESTRES@","@_CS_LISTE_ADMINS@"),get_liste_administrateurs(),$texte);
if($id=="auteur_forum") $texte=str_replace(array("@_CS_FORUM_NOM@","@_CS_FORUM_EMAIL@"),
	array(preg_replace(',:$,',"",_T("forum_votre_nom")),preg_replace(',:$,',"",_T("forum_votre_email"))),$texte);
if($id=="ecran_securite") $flux["non"] = !1 || !$flux["actif"];
if($id=="cs_comportement"){$tmp=(!0||!$flux["actif"]||defined("_CS_SPIP_OPTIONS_OK"))?"":"<span style=\"color:red\">"._T("couteauprive:cs_spip_options_erreur")."</span>";
$texte=str_replace(array("@_CS_FILE_OPTIONS_ERR@","@_CS_DIR_TMP@","@_CS_FILE_OPTIONS@"),
	array($tmp,cs_canonicalize(_DIR_RESTREINT_ABS._DIR_TMP),show_file_options()),$texte);
}
if($id=="en_travaux") $texte=str_replace(array("@_CS_TRAVAUX_TITRE@","@_CS_NOM_SITE@"),
	array("["._T("info_travaux_titre")."]","[".$GLOBALS["meta"]["nom_site"]."]"),$texte);
if($id=="titres_typo")
		$texte=str_replace("@_CS_FONTS@",join(" - ",get_liste_fonts()),$texte);
if($id=="visiteurs_connectes") if($GLOBALS["meta"]["activer_statistiques"]!="oui")
		$texte.="\n\n<span style=\"color:red;\">"._T("couteauprive:visiteurs_connectes:inactif")."</span>";
function_exists('ecran_securite_pre_description_outil')?$flux=ecran_securite_pre_description_outil($flux):cs_deferr('ecran_securite_pre_description_outil');
function_exists('sommaire_description_outil')?$flux=sommaire_description_outil($flux):cs_deferr('sommaire_description_outil');
function_exists('couleurs_pre_description_outil')?$flux=couleurs_pre_description_outil($flux):cs_deferr('couleurs_pre_description_outil');

# Copie du code utilise en eval() pour le pipeline 'fichier_distant($flux)'
include_spip('outils/ecran_securite');
function_exists('ecran_securite_fichier_distant')?$flux=ecran_securite_fichier_distant($flux):cs_deferr('ecran_securite_fichier_distant');

# Copie du code utilise en eval() pour le pipeline 'nettoyer_raccourcis_typo($flux)'
include_spip('outils/sommaire');
include_spip('outils/couleurs');
function_exists('sommaire_nettoyer_raccourcis')?$flux=sommaire_nettoyer_raccourcis($flux):cs_deferr('sommaire_nettoyer_raccourcis');
function_exists('couleurs_nettoyer_raccourcis')?$flux=couleurs_nettoyer_raccourcis($flux):cs_deferr('couleurs_nettoyer_raccourcis');

# Copie du code utilise en eval() pour le pipeline 'pre_propre($flux)'
include_spip('outils/sommaire');
function_exists('sommaire_intertitres')?$flux=sommaire_intertitres($flux):cs_deferr('sommaire_intertitres');

# Copie du code utilise en eval() pour le pipeline 'pre_typo($flux)'
include_spip('outils/decoration');
include_spip('outils/couleurs');
if(strpos($flux, "-")!==false OR strpos($flux, "*")!==false) $flux = cs_echappe_balises("", "pucesli_remplace", $flux);
function_exists('decoration_pre_typo')?$flux=decoration_pre_typo($flux):cs_deferr('decoration_pre_typo');
function_exists('couleurs_pre_typo')?$flux=couleurs_pre_typo($flux):cs_deferr('couleurs_pre_typo');

# Copie du code utilise en eval() pour le pipeline 'bt_toolbox($flux)'
include_spip('outils/decoration');
include_spip('outils/couleurs');
function_exists('decoration_BarreTypo')?$flux=decoration_BarreTypo($flux):cs_deferr('decoration_BarreTypo');
function_exists('couleurs_BarreTypo')?$flux=couleurs_BarreTypo($flux):cs_deferr('couleurs_BarreTypo');

# Copie du code utilise en eval() pour le pipeline 'porte_plume_barre_pre_charger($flux)'
include_spip('outils/decoration');
include_spip('outils/couleurs');
function_exists('decoration_PP_pre_charger')?$flux=decoration_PP_pre_charger($flux):cs_deferr('decoration_PP_pre_charger');
function_exists('couleurs_PP_pre_charger')?$flux=couleurs_PP_pre_charger($flux):cs_deferr('couleurs_PP_pre_charger');

# Copie du code utilise en eval() pour le pipeline 'porte_plume_lien_classe_vers_icone($flux)'
include_spip('outils/decoration');
include_spip('outils/couleurs');
function_exists('decoration_PP_icones')?$flux=decoration_PP_icones($flux):cs_deferr('decoration_PP_icones');
function_exists('couleurs_PP_icones')?$flux=couleurs_PP_icones($flux):cs_deferr('couleurs_PP_icones');

# Copie du code utilise en eval() pour le pipeline 'post_typo($flux)'
include_spip('outils/typo_exposants');
include_spip('outils/guillemets');
function_exists('typo_exposants')?$flux=typo_exposants($flux):cs_deferr('typo_exposants');
function_exists('typo_guillemets')?$flux=typo_guillemets($flux):cs_deferr('typo_guillemets');

# Copie du code utilise en eval() pour le pipeline 'post_propre($flux)'
if(strpos($flux, '@')!==false) $flux=cs_echappe_balises('', 'mailcrypt', $flux);

# Copie du code utilise en eval() pour le pipeline 'facteur_pre_envoi($flux)'
include_spip("public/parametrer"); // charger mes_fonctions
$flux->Body = maildecrypt($flux->Body);
$flux->AltBody = maildecrypt($flux->AltBody);

# Copie du code utilise en eval() pour le pipeline 'insert_head($flux)'
/* optimisation : 'IF(1)' */ $flux.='<script src="'.find_in_path("outils/jquery.scrollto.js").'" type="text/javascript"></script>'."\n";
/* optimisation : 'IF(1)' */ $flux.='<script src="'.find_in_path("outils/jquery.localscroll.js").'" type="text/javascript"></script>'."\n";
cs_header_hit($flux, 'js');

# Copie du code utilise en eval() pour le pipeline 'arbo_creer_chaine_url($flux)'
$id = $flux['objet']['id_objet']; $ok = true;
/* optimisation : 'IF(0) \{$ok = strpos(':rubrique:auteur:',':'.$flux['objet']['type'].':')===false;\}' */
/* optimisation : 'IF(0) \{$id = sprintf('%03d', $id);\}' */
/* optimisation : 'IF(0) \{@define('_CS_URL_SEP','-'); if($ok) $flux['data']=$id._CS_URL_SEP.$flux['data'];\}' */
/* optimisation : 'IF(0) \{@define('_CS_URL_SEP',','); if($ok) $flux['data'].=_CS_URL_SEP.$id;\}' */
/* optimisation : 'IF(0) \{$flux['data']=strtolower($flux['data']);\}' */

# Copie du code utilise en eval() pour le pipeline 'propres_creer_chaine_url($flux)'
$id = $flux['objet']['id_objet']; $ok = true;
/* optimisation : 'IF(0) \{$ok = strpos(':rubrique:auteur:',':'.$flux['objet']['type'].':')===false;\}' */
/* optimisation : 'IF(0) \{$id = sprintf('%03d', $id);\}' */
/* optimisation : 'IF(0) \{@define('_CS_URL_SEP','-'); if($ok) $flux['data']=$id._CS_URL_SEP.$flux['data'];\}' */
/* optimisation : 'IF(0) \{@define('_CS_URL_SEP',','); if($ok) $flux['data'].=_CS_URL_SEP.$id;\}' */
/* optimisation : 'IF(0) \{$flux['data']=strtolower($flux['data']);\}' */

# Copie du code utilise en eval() pour le pipeline 'header_prive($flux)'
cs_header_hit($flux, 'css', '_prive');
cs_header_hit($flux, 'js', '_prive');

# Copie du code utilise en eval() pour le pipeline 'insert_head_css($flux)'
cs_header_hit($flux, 'css');
?>