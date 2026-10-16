<?php
$cfg["table_columns_reserved"] = array("_isdeleted", "_islocked"); //Liste des noms de colonnes réservées


$cfg["get_arguments_allowed"] = array(
    "article_id" => array("type" => FILTER_VALIDATE_INT),
    "author_id" => array("type" => FILTER_VALIDATE_INT),
    "offset" => array("type" => FILTER_VALIDATE_INT),
    "category_id" => array("type" => FILTER_VALIDATE_INT),
    "video_id" => array("type" => FILTER_SANITIZE_STRING),
    "podcast_id" => array("type" => FILTER_SANITIZE_STRING),
    "c" => array("type" => FILTER_VALIDATE_INT),
);

$T_arrays = array();
$T_arrays["T_mois"] = array("01" => "Janvier",
    "02" => "Février",
    "03" => "Mars",
    "04" => "Avril",
    "05" => "Mai",
    "06" => "Juin",
    "07" => "Juillet",
    "08" => "Aout",
    "09" => "Septembre",
    "10" => "Octobre",
    "11" => "Novembre",
    "12" => "Décembre"
);
$T_arrays["T_moispaie"] = array("01" => "Janvier",
    "02" => "Février",
    "03" => "Mars",
    "04" => "Avril",
    "05" => "Mai",
    "06" => "Juin",
    "07" => "Juillet",
    "08" => "Aout",
    "09" => "Septembre",
    "10" => "Octobre",
    "11" => "Novembre",
    "12" => "Décembre",
    "Prime de rendement" => "Prime de rendement",
    "Prime de production" => "Prime de production"
);
$T_arrays["T_language"] = array(
    "AR" => "Arabe",
    "FR" => "Français",
    "EN" => "Anglais",
);