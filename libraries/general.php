<?php
/**
 * Fonction d'autoload des classes du framewrok
 * @param $class_name
 * @return bool
 */
function fwAutoload($class_name)
{
    $tmp = $class_name;
    if (substr($class_name, 0, 1) == "_") {
        if (is_file("classes/" . $class_name . '.php')) {
            require_once("classes/" . $class_name . '.php');
            return true;
        }
    }
    if (substr($class_name, 0, 5) == "_form") {
        if (is_file("classes/form/" . $class_name . '.php')) {
            require_once("classes/form/" . $class_name . '.php');
            return true;
        }
    }

    if (strstr($class_name, "Model")) {
        $class_name = str_replace("Model", "", $class_name);
        if (!is_file("modules/" . $class_name . '/model.php')) {
            error(__METHOD__ . " Class modules/" . $class_name . "/model.php doesn't exists !");
            createFileFromTemplate($class_name, "model");
        }else {
            require_once("modules/" . $class_name . '/model.php');
            return true;
        }
    }

    if (strstr($class_name, "Controller")) {
        $class_name = str_replace("Controller", "", $class_name);
        if (!is_file("modules/" . $class_name . '/controller.php')) {
            error(__METHOD__ . " Class modules/" . $class_name . "/controller.php doesn't exists !");
            createFileFromTemplate($class_name, "controller");
        }else {
            require_once("modules/" . $class_name . '/controller.php');
            return true;
        }
    }
    if (strstr($class_name, "Views")) {
        $class_name = str_replace("Views", "", $class_name);
        if (!is_file("modules/" . $class_name . '/views.php')) {
            error(__METHOD__ . " Class modules/" . $class_name . "/views.php doesn't exists !");
            createFileFromTemplate($class_name, "views");
        }else {
            require_once("modules/" . $class_name . '/views.php');
            return true;
        }
    }


    if (!class_exists($tmp, false)) {
        error(__METHOD__ . " Unable to load class: $tmp");
    }
}

/**
 * function de traduction des textes de l'interface
 * @param $text
 * @return mixed
 */
function ___($text)
{
    global $_LANG;
    global $LANG;

    if (isset($_LANG[$text])) {
        if (isset($_LANG[$text][$LANG]))
            return $_LANG[$text][$LANG];
    }
    return $text;
}

/**
 * Password hash
 * @param $password
 * @return string
 */
function hashPassword($password)
{
    return sha1(SALT . sha1(SALT . sha1($password)));
}

function getArguments($method)
{
    $arguments = array_diff_key($method, array("module" => "", "view" => "","btn"=>""));
    $cleanArguments = array();
    foreach ($arguments as $argument => $value) {
        if (checkArgument($argument, $value))
            $cleanArguments[$argument] = $arguments[$argument];
    }
    return $cleanArguments;
}

function checkArgument($argument, $value)
{
    global $cfg;
    if (array_key_exists($argument, $cfg["get_arguments_allowed"])) {
        $options = array();
        if(!empty( $cfg["get_arguments_allowed"][$argument]["options"]))
            $options =  $cfg["get_arguments_allowed"][$argument]["options"];

        if (filter_var($value, $cfg["get_arguments_allowed"][$argument]["type"],$options))
            return true;
    }

    return false;
}

/**
 * Fonction de routage
 * @return string
 */


function error($message)
{
    if(MODE_DEV)
        ;//echo $message;
    mylog("[ERROR] " . $message);
}

function mylog($message)
{
    error_log("\n[" . date("Y-m-d H:i:s") . "]" . CALLER . " " . $message, 3, "logs/" . date("Y-m-d") . ".log");
}

function diffDate($date1, $date2)
{
    $datetime1 = new DateTime($date1);
    $datetime2 = new DateTime($date2);
    $interval = $datetime2->diff($datetime1);
    return $interval->format('%r%a');
}

function niceRound($value)
{
    $sign = 1;
    if ($value < 0)
        $sign = -1;
    $value = abs($value);

    if ($value > 999 && $value <= 999999) {
        return round($value / 1000, 1) * $sign . 'k';
    } elseif ($value > 999999) {
        return number_format((float)$value / 1000000, 1, '.', '') * $sign . 'm';
    } else {
        return round($value * $sign, 0);
    }
}

function createFileFromTemplate($filename, $template)
{
    if(!MODE_DEV)
        return false;
    if(!is_dir("modules/".$filename)){
        mkdir("modules/".$filename);
        chmod("modules/" . $filename,0777);

        $template = "views";
        $content = file_get_contents("classes/filesTemplates/" . $template . ".tpl");
        $content = str_replace("{name}", $filename, $content);
        file_put_contents("modules/" . $filename . "/".$template.".php", $content);
        chmod("modules/" . $filename . "/".$template.".php",0777);

        $template = "controller";
        $content = file_get_contents("classes/filesTemplates/" . $template . ".tpl");
        $content = str_replace("{name}", $filename, $content);
        file_put_contents("modules/" . $filename . "/".$template.".php", $content);
        chmod("modules/" . $filename . "/".$template.".php",0777);

        $template = "model";
        $content = file_get_contents("classes/filesTemplates/" . $template . ".tpl");
        $content = str_replace("{name}", $filename, $content);
        file_put_contents("modules/" . $filename . "/".$template.".php", $content);
        chmod("modules/" . $filename . "/".$template.".php",0777);

        return true;
    }

    if (is_file("modules/" . $filename."/".$template.".php"))
        return false;

    $content = file_get_contents("classes/filesTemplates/" . $template . ".tpl");
    $content = str_replace("{name}", $filename, $content);
    file_put_contents("modules/" . $filename . "/".$template.".php", $content);
    chmod("modules/" . $filename . "/".$template.".php",0777);
    return true;
}

function filter_date($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

function myTruncate($string, $limit, $break=" ", $pad="...")
{
    // return with no change if string is shorter than $limit
    if(strlen($string) <= $limit) return $string;

    // is $break present between $limit and the end of the string?
    if(false !== ($breakpoint = strpos($string, $break, $limit))) {
        if($breakpoint < strlen($string) - 1) {
            $string = substr($string, 0, $breakpoint) . $pad;
        }
    }

    return $string;
}

function toAscii($str, $delimiter='-') {
$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

	return $clean;
}
