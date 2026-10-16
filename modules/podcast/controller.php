<?php

class podcastController extends _controller implements _controllerInterface {
    function __construct()
    {
        parent::__construct();
        $this->_labels = array(
            "podcast_title" => "Libellé",
            "podcast_description" => "Description",
            "podcast_file" => "Fichier",
        );

        $this->_visibility = array(
            "podcast_description" => array("table" => false, "insert" => true, "update" => true),
            "podcast_file" => array("table" => false, "insert" => true, "update" => true),
        );

        $this->_types = array(
            "podcast_file"=>array("formObject"=>"_formFileUpload","options"=>array("name"=>"files")),
        );
    }
    static public function listAll(){
        $model =new podcastModel();
        return $model->listAll();
    }
    static public function listById($podcast_id){
        $model =new podcastModel();
        return $model->listById($podcast_id);
    }
}