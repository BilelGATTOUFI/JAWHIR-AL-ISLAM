<?php

class authorController extends _controller implements _controllerInterface {

    function __construct()
    {
        parent::__construct();
        $this->_labels = array(
            "author_ar" => "Nom en arabe",
            "author_latin" => "Nom en français",
            "author_bioar" => "Biographie en arabe",
            "author_latin" => "Biographie en français",
        );
        global $cfg_menu;
        $cfg_menu["default"] = "Paramètres";
        $cfg_menu["subdefault"] = "Auteurs";
    }
    public static function getAuthor($author_id){
        $model = new authorModel();
        $author = $model->listById($author_id);
        $author->name = $author->author_ar;
        $author->bio = $author->author_bioar;
        return $author;
    }
}