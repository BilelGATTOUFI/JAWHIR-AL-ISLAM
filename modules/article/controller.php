<?php

class articleController extends _controller implements _controllerInterface {

    function __construct(){
		parent::__construct();
        global $cfg_menu;
        $cfg_menu["default"] = "Articles";
        $cfg_menu["subdefault"] = "Articles";
    }

    static public $T_status = array(
        0 => "<span class='label bg-warning'>Brouillon</span>",
        1 => "<span class='label bg-success'>Publié</span>",
        2 => "<span class='label bg-grey'>Archivé</span>",
    );

    static public $T_slider = array(
        0 => "",
        1 => "<span class='label bg-success'><i class='fa fa-star'></i></span>",
    );

    public function insert($arguments=array()){
        return articleViews::insert($arguments);
    }
    public function update($arguments=array()){
        return articleViews::update($arguments);
    }
    public function updateForm($arguments, $button = "")
    {
        $tags = explode("|",$arguments["article_tags"]);
        unset($arguments["article_tags"]);
        //recherche des tags existants
        $model = new tagModel();
        $result = $model->listByTags($tags);
        $tags_existants = array();
        foreach($result as $tag){
            $tags_existants[] = $tag->tag_label;
        }
        //detection  nouveaux tags et insertions dans la base
        $tags_nouveaux = array_diff($tags,$tags_existants);
        $element = new stdClass();
        foreach($tags_nouveaux as $label) {
            $element->tag_label = $label;
            $model->insert($element);
        }

        //recupération de tous les id des tags
        $tags = $model->listByTags($tags);

        //suppression des anciennes relations tag de l'article
        $model= new articletagModel();
        $model->delete($arguments["article_id"],"articletag_article");
        //insertion des nouvelles relations
        $object = new stdClass();
        $object->articletag_article = $arguments["article_id"];
        foreach($tags as $tag){
            $object->articletag_tag = $tag->tag_id;
            $object->_isdeleted = 0;
            $model->replace($object);
        }

        return parent::updateForm($arguments,$button);
    }
    public function table($arguments=array()){

        $number_per_page = 40;

        $model = new articleModel();
        $total = count($model->listAll());
        $number_pages = ceil($total / $number_per_page);

        $offset = 1;
        if (!empty($arguments["offset"]) && $arguments["offset"] > 1 && $arguments["offset"] <= $number_pages)
            $offset = $arguments["offset"];


        $previous = 1;
        if ($offset > 1)
            $previous = $offset - 1;
        $next = $number_pages;
        if ($offset < $number_pages)
            $next = $offset + 1;

        $elements = $model->listByPagination(($offset - 1) * $number_per_page, $number_per_page);

        $result = array();
        foreach ($elements as $element) {
            if (!$element->article_related) {
                $element->article_versions = "";
                $result[$element->article_id] = $element;
            } else {
                $result[$element->article_related]->article_versions .= " <a href='?module=article&action=update&article_id=" . $element->article_id . "'>" . $element->article_language . "</a>";
            }
        }

        $table = new _table();
        $table->data = $result;
        $table->header = array(
            "article_date" => "Date",
            "category_labelar" => "Catégorie",
            "article_title" => "Article",
            "article_status" => "Etat",
            "article_versions" => "Versions",
            "article_slider" => "Slider",
        );
        $table->links = array(
            "article_title" => '?module=article&action=update&article_id={article_id}',
        );

        $table->staticTable = array(
            "article_status" => articleController::$T_status,
            "article_slider" => articleController::$T_slider,
        );


        $pagination = array(
            "current" => $offset,
            "number_pages" => $number_pages,
            "previous" => $previous,
            "next" => $next,
        );



        $data = array(
            "module" => "article",
            "title" => "Liste des articles",
            "primaryKey" => "article_id",
            "template"=>"table",
            "pagination"=>$pagination,
            "table" => $table);



        return articleViews::table($data);
    }
    public function translate($arguments=array()){
        return articleViews::translate($arguments);
    }
    static public function latestArticles($number=3,$start=0){
        $model = new articleModel();
        return $model->listLatest($number,$start);
    }
    static public function latestArticlesByCategory ($category_id, $number=3,$start=0){
        $model = new articleModel();
        return $model->listLatestByCategory($category_id,$number,$start);
    }

    /*Fonctions de gestions de la publication des articles*/
    private function changeStatus($article_id,$status){
        $model = new articleModel();
        $element = $model->listById($article_id);
        if(empty($element))
            return $this->table();

        $element->article_status = $status;
        $model->update($element);
        return $this->table();
    }
    public function publier($arguments){
        return $this->changeStatus($arguments["article_id"],1);
    }
    public function unpublier($arguments){
        return $this->changeStatus($arguments["article_id"],0);
    }

    /*Fonctions de gestion du slider*/
    private function changeSlider($article_id,$status){
        $model = new articleModel();
        $element = $model->listById($article_id);
        if(empty($element))
            return $this->table();

        $element->article_slider = $status;
        $model->update($element);
        return $this->table();
    }
    public function slider($arguments){
        return $this->changeSlider($arguments["article_id"],1);
    }
    public function unslider($arguments){
        return $this->changeSlider($arguments["article_id"],0);
    }
    static public function sliderArticles(){
        $model = new articleModel();
        return $model->listByArticleSlider(1);
    }

    static public function link($text,$id){

        $text = preg_replace('~[^\\pL0-9_]+~u', '-', $text);
        //$text = trim($text, "-");
        //$text = iconv("utf-8", "us-ascii//TRANSLIT", $text);
        //$text = strtolower($text);
        //$text = preg_replace('~[^-a-z0-9_]+~', '', $text);
        return myTruncate($text,50)."_".$id.".html";
    }
}