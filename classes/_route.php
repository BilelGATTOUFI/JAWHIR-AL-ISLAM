<?php

/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 09/07/15
 * Time: 14:32
 */
class _route
{

    private static function isModuleExists($moduleName)
    {
        if (MODE_DEV) {
            createFileFromTemplate($moduleName, "controller");
        }

        if (!is_dir("modules/" . $moduleName)) {
            error("modules/" . $moduleName . " doesn't exists");
            return false;
        }

        if (!is_file("modules/" . $moduleName . "/controller.php")) {
            error("modules/" . $moduleName . "/controller.php doesn't exists");
            return false;
        }

        if (!is_file("modules/" . $moduleName . "/views.php")) {
            error("modules/" . $moduleName . "/views.php doesn't exists");
            return false;
        }

        if (!is_file("modules/" . $moduleName . "/model.php")) {
            error("modules/" . $moduleName . "/model.php doesn't exists");
            return false;
        }
        return true;
    }

    static function route()
    {
        $arguments = getArguments($_GET);
        if ((!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "")) {
            $controller = new mainController($arguments);
            $content = $controller->login($arguments);
            return _template::render($content, "login");
        }

        if (isset($_GET["module"]) && $_GET["module"] != "" && self::isModuleExists($_GET["module"])) {
            $module = $_GET["module"];

            if (isset($_GET["action"]) && $_GET["action"] != "") {
                if (method_exists($module . "Controller", $_GET["action"]))
                    $action = $_GET["action"];
                else {
                    error(__METHOD__ . " action : " . $_GET["action"] . " doesn't exists in class " . $module . " trying default 'table'");
                }
            } else {
                //error(__METHOD__ . " No action found trying default 'table'");
                $action = "defaultDisplay";
            }

        } else {
            error(__METHOD__ . " no module trying default 'main'");
            $module = "main";
            $action = "defaultDisplay";
        }

        $controllerClass = $module . "Controller";
        $controller = new $controllerClass($arguments);
        $content = $controller->$action($arguments);
        if (!$content) {
            $content = _template::renderError();
        }
        return _template::render($content);
    }

       static function routeAjax()
    {
        $error = new _ajaxResponse();
        $button = false;
        $arguments = array_diff_key($_POST, array("module" => "", "action" => "", "btn" => ""));
        if (isset($_POST["btn"]) && $_POST["btn"] != "")
            $button = $_POST["btn"];
        if (isset($_POST["module"]) && $_POST["module"] != "" && self::isModuleExists($_POST["module"])) {
            $module = $_POST["module"];
            if (isset($_POST["action"]) && $_POST["action"] != "" && method_exists($module . "Controller", $_POST["action"])) {
                $action = $_POST["action"];
            } else {
                error(__METHOD__ . " action : " . $_POST["action"] . " doesn't exists in class " . $_POST["module"]);
                return $error;
            }
        } else {
            error(__METHOD__ . " module : " . $_POST["module"] . " doesn't exists");
            return $error;
        }

        if(($module == "main" || $module=="front") && $action == "auth"){
            return _ajax::receive($module, $action, $arguments, $button);
        }


        if ((!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "")) {
            error(__METHOD__ . " no user session");
            return $error;
        }
        return _ajax::receive($module, $action, $arguments, $button);
    }

    static function getCache($arguments)
    {
        if (!CACHE)
            return false;
        $hash = md5(serialize($arguments));
        if (file_exists("cache/" . $hash . ".html")) {
            mylog(__METHOD__ . " cache found.");
            return file_get_contents("cache/" . $hash . ".html");
        }
        mylog(__METHOD__ . " cache not found.");
        return false;
    }

    static function setCache($arguments, $render)
    {
        if (!CACHE)
            return false;
        $hash = md5(serialize($arguments));
        if (!file_exists("cache/" . $hash . ".html")) {
            mylog(__METHOD__ . " cache not found creating new file");
            file_put_contents("cache/" . $hash . ".html", $render);
        }
    }

    static function routeFront()
    {
        $arguments = getArguments($_GET);

        if ($cache = self::getCache($arguments))
            return $cache;

        $module = "front";

        if (isset($_GET["action"]) && $_GET["action"] != "") {
            if (method_exists($module . "Controller", $_GET["action"]))
                $action = $_GET["action"];
            else {
                error(__METHOD__ . " action : " . $_GET["action"] . " doesn't exists in class " . $module . " trying default 'table'");
            }
        } else {
            error(__METHOD__ . " No action found trying default 'table'");
            $action = "defaultDisplay";
        }


        $controllerClass = $module . "Controller";
        $controller = new $controllerClass($arguments);
        $content = $controller->$action($arguments);
        if (!$content) {
            $content = _template::renderError();
        }

        $render = _template::render($content, "front/index");
        self::setCache($arguments, $render);
        return $render;
    }

}
