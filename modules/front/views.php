<?php

class frontViews extends _views implements _viewsInterface {
    static public function index($arguments){
        $arguments["module"]="front";
        return _template::renderTemplate("home", $arguments);
    }
    static public function contact($arguments){
        $arguments["module"]="front";
        return _template::renderTemplate("contact", $arguments);
    }
    static public function article($arguments){
        $arguments["module"]="front";
        return _template::renderTemplate("article", $arguments);
    }
    static public function video($arguments){
        $arguments["module"]="front";
        return _template::renderTemplate("video", $arguments);
    }

    static public function listingcategory($arguments){
        $arguments["module"]="front";
        return _template::renderTemplate("listingcategory", $arguments);
    }
    static public function sitemap($arguments){
        $arguments["module"]="front";
        return _template::renderTemplate("sitemap", $arguments);
    }
    static public function videos($arguments){
        $arguments["module"]="front";
        return _template::renderTemplate("videos", $arguments);
    }
    static public function podcasts($arguments){
        $arguments["module"]="front";
        return _template::renderTemplate("podcasts", $arguments);
    }
    static public function podcast($arguments){
        $arguments["module"]="front";
        return _template::renderTemplate("podcast", $arguments);
    }

    public static function jawahir($arguments){
    $arguments["module"] = "front";
    return _template::renderTemplate("jawahir", $arguments); 
}

}