<?php
class searchViews extends _views implements _viewsInterface {
    static public function result($arguments){
        $arguments["module"]="search";
        return _template::renderTemplate("result", $arguments);
    }
    static public function noresult($arguments){
        $arguments["module"]="search";
        return _template::renderTemplate("noresult", $arguments);
    }
}