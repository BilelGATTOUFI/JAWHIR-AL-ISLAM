<?php
ini_set("display_errors", "0");

session_start();
define("CALLER","[AJAX]"); //Definition du CALLER pour le fichier log


require_once("libraries/general.php");
spl_autoload_register("fwAutoload");
require_once("includes/general.php");
require_once("includes/arrays.php");

if(MODE_DEV){
    error_reporting(E_ALL);
    ini_set("display_errors", "1");
}


$dbManager = new _database($cfg_database);

echo _route::routeAjax();
