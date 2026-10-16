<?php
define("SALT", "M125234");//SALT utilisé pour le cryptage des mots de passes
define("SITE_NAME", "الاسلام: حقائق وأعلام ومعالم");
define("SITE_URL", "http://www.mestaoui.tn");
define("MODE_DEV",false);
define("CACHE", false);

//Configuration de la base de données
$cfg_database = array();
$cfg_database["hostname"] = "localhost";
$cfg_database["username"] = "mestaoui_2016";
$cfg_database["password"] = "Q(ZMV%CO.IMl";
$cfg_database["database"] = "mestaoui_base";

$cfg_theme = array();
$cfg_theme["topmenu_notifications_enable"] = false;
$cfg_theme["topmenu_tasks_enable"] = false;

//Login
$cfg_theme["social_login"] = false;
$cfg_theme["facebook_login"] = true;
$cfg_theme["twitter_login"] = false;
$cfg_theme["register_login"] = false;
$cfg_theme["forgot_login"] = false;

$cfg_theme["site_title"] = "";

$cfg_theme["og:url"] = SITE_URL;
$cfg_theme["og:description"] = "";
$cfg_theme["og:image"] = SITE_URL."/upload/files/books.jpg";



define("PAGINATION_PERPAGE",10);

//Youtube API
$cfg_youtube = array();
$cfg_youtube["name"] ="Serveur";
$cfg_youtube["key"] = "AIzaSyA0tf4NbH24bHnjMug5V82hp3Cexhk9nxs";
