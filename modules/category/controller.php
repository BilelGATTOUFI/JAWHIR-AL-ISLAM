<?php

class categoryController extends _controller implements _controllerInterface
{
    static public $T_menu = array(
        0 => "",
        1 => "<span class='label bg-success'><i class='fa fa-star'></i></span>",
    );

    function __construct()
    {
        parent::__construct();
        $this->_labels = array(
            "category_labelar" => "Catégorie en arabe",
            "category_labelfr" => "Catégorie en français",
            "category_labelen" => "Catégorie en anglais",
        );
        $this->_visibility = array(
            "category_order" => array("table" => false, "insert" => false, "update" => false),
        );

    }

    public function table($arguments = array())
    {
        return categoryViews::table($arguments);
    }

    public function insert($arguments = array())
    {
        return categoryViews::insert($arguments);
    }

    public function update($arguments = array())
    {
        return categoryViews::update($arguments);
    }

    static public function listCategories()
    {
        $model = new categoryModel();
        $categories = $model->listAll();
        foreach ($categories as $category) {
            $category->label = $category->category_labelar;
        }
        return $categories;
    }

    static public function listCategoriesByParent($category_parent)
    {
        $model = new categoryModel();
        $categories = $model->listByCategoryParent($category_parent);
        foreach ($categories as $category) {
            $category->label = $category->category_labelar;
        }
        return $categories;
    }

    private function changeMenuStatus($category_id, $status)
    {
        $model = new categoryModel();
        $element = $model->listById($category_id);
        if (empty($element))
            return $this->table();

        $element->category_menu = $status;
        $model->update($element);
        return $this->table();
    }

    public function menu($arguments)
    {
        return $this->changeMenuStatus($arguments["category_id"], 1);
    }

    public function unmenu($arguments)
    {
        return $this->changeMenuStatus($arguments["category_id"], 0);
    }

    static public function link($text, $id)
    {
        return "category_" . myTruncate($text, 50) . "_" . $id . ".html";
    }

    static function renderCategory($category_id)
    {
        $model = new categoryModel();
        $category = $model->listById($category_id);
        if($category)
        $content = "<a href='".categoryController::link($category->category_labelar,$category->category_id)."'>".$category->category_labelar."<a><ul>";
        else $content = "<ul>";

        $subCategories = categoryController::listCategoriesByParent($category_id);
        foreach($subCategories as $category){
            $content .= self::renderCategory($category->category_id);
        }
        $articles = articleController::latestArticlesByCategory($category_id);
        foreach($articles as $article){
            $content .= "<li><a href='".articleController::link($article->article_title,$article->article_id)."'>".$article->article_title."</a></li>";
        }
        return $content."</ul>";
    }

    static function breadcrumb ($category_id){

        $model = new categoryModel();
        $category = $model->listById($category_id);
        if(!$category)
            return false;
        if(!$category->category_parent) {
            return "<a href='".categoryController::link($category->category_labelar, $category->category_id)."'>".$category->category_labelar."</a>";
                    }
        return self::breadcrumb($category->category_parent)." / "."<a href='".categoryController::link($category->category_labelar, $category->category_id)."'>".$category->category_labelar."</a>";
    }
}