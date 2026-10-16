<?php
$cfg_menu = array();
$cfg_menu["default"] = "";
$cfg_menu["subdefault"] = "";

$cfg_menu["items"][] = array(
    "label" => "Tableau de board",
    "icon" => "ti-desktop",
    "link" => "?module=main"
);

$cfg_menu["items"][] = array(
    "label" => "Articles",
    "icon" => "ti-book",
    "link" => "?module=article"
);

$cfg_menu["items"][] = array(
    "label" => "Podcasts",
    "icon" => "ti-signal",
    "link" => "?module=podcast"
);

$cfg_menu["items"][] = array(
    "label" => "Paramètres",
    "icon" => "ti-panel",
    "submenu" => array(
        array("label" => "catégories",
            "link" => "?module=category"
        ),
        array("label" => "Auteurs",
            "link" => "?module=author"
        ),
    ),
);
?>