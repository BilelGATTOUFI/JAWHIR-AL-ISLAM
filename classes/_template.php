<?php

class _template
{

    static function renderTemplate($template, $data = array())
    {
        if(empty($template)){
            error("Empty template file !'");
            return false;
        }

        if(!empty($data["module"])){
            $filename = "modules/".$data["module"]."/tpl_".$template.".php";
            if(!file_exists($filename)){
                error("Template file '" . $filename . "' doesn't exist!' trying generic template...");
                $filename = "templates/" . $template . ".php";
                if (!file_exists($filename)) {
                    error("Template file '" . $filename . "' doesn't exist!'");
                    return false;
                }
            }
        }else {
            $filename = "templates/" . $template . ".php";
            if (!file_exists($filename)) {
                error("Template file '" . $filename . "' doesn't exist!'");
                return false;
            }
        }
        ob_start();
        require_once $filename;
        $content = ob_get_contents();
        ob_clean();
        return $content;
    }

    static function render( $content = "",$file = "index")
    {
        global $cfg_theme;
        ob_start();
        require_once 'theme/' . $file . '.php';
        $content = ob_get_contents();
        ob_clean();
        return $content;
    }

    static function renderError()
    {
        return self::renderTemplate("error");
    }

}
