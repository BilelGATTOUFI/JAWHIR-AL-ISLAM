<?php

class frontController extends _controller implements _controllerInterface {
    public function defaultDisplay($arguments=array()){
        return frontViews::index($arguments);
    }
    public function contact($arguments=array()){
$arguments["categories"] = categoryController::listCategoriesByParent(0);
        $arguments["tags"] = tagController::listTagsByArticle(0);
        return frontViews::contact($arguments);
    }
    public function search($arguments=array()){
        $controller = new searchController();
        return $controller->search($arguments);
    }
    public function article($arguments=array()){
        global $cfg_theme;
        $article_id = $arguments["article_id"];
        $model = new articleModel();
        $article = $model->listById($article_id);
        if(!$article)
            return false;

        $picture = "upload/files/".$article->article_picture;
        if(!file_exists($picture))
            $article->article_picture=false;

        if($article->article_picture)
            $cfg_theme["og:image"] = SITE_URL."/"."upload/files/".$article->article_picture;

        $cfg_theme["og:url"]=SITE_URL."/".articleController::link($article->article_title,$article->article_id);

        $arguments["article"] = $article;
        $arguments["author"] = authorController::getAuthor($article->article_author);
        $arguments["categories"] = categoryController::listCategoriesByParent(0);
        $arguments["tags"] = tagController::listTagsByArticle($article->article_id);
        global $cfg_theme;
        $cfg_theme["site_title"] = $article->article_title;
        return frontViews::article($arguments);
    }
    public function sitemap($arguments){
        $arguments["categories"] = categoryController::listCategoriesByParent(0);
        $arguments["tags"] = tagController::listTagsByArticle(0);
        return frontViews::sitemap($arguments);
    }
    public function video($arguments){
        $arguments["categories"] = categoryController::listCategoriesByParent(0);
        $arguments["tags"] = tagController::listTagsByArticle(0);
        return frontViews::video($arguments);
    }
    public function videos($arguments){
        $arguments["categories"] = categoryController::listCategoriesByParent(0);
        $arguments["tags"] = tagController::listTagsByArticle(0);
        return frontViews::videos($arguments);
    }
    public function podcasts($arguments){
        $arguments["podcasts"] = podcastController::listAll();
        $arguments["categories"] = categoryController::listCategoriesByParent(0);
        $arguments["tags"] = tagController::listTagsByArticle(0);
        return frontViews::podcasts($arguments);
    }
    public function podcast($arguments){
        $arguments["podcast"] = podcastController::listById($arguments["podcast_id"]);
        $arguments["categories"] = categoryController::listCategoriesByParent(0);
        $arguments["tags"] = tagController::listTagsByArticle(0);
        return frontViews::podcast($arguments);
    }
    public function category($arguments){

        $model = new categoryModel();
        $category = $model->listById($arguments["category_id"]);
        $category->label = $category->category_labelar;
        $arguments["category"] = $category;


        $cursor = 1;
        $model = new articleModel();
        if(!empty($arguments["c"]))
            $cursor = $arguments["c"];

        $articles = $model->listLatestByCategory($arguments["category_id"],PAGINATION_PERPAGE,($cursor-1)*PAGINATION_PERPAGE);
        foreach($articles as $article){
            $article->author="";
            $article->category ="";
            $article->date = $article->article_date;
        }
        $arguments["articles"]=$articles;


        $tmp = $model->listLatestByCategory($arguments["category_id"],10000,0);
        $total = count($tmp);
        unset($tmp);

        $total = ceil($total/PAGINATION_PERPAGE);
        $arguments["pagination"]["total"] = $total;
        $arguments["pagination"]["current"] = $cursor;

        $start= $cursor-3;
        if($start<=1)
            $start=1;
        $end= $cursor+3;
        if($end>=$total)
            $end=$total;
        $arguments["pagination"]["start"] = $start;
        $arguments["pagination"]["end"] = $end;


        $next  = $cursor+1;

        if($next>=$end)
            $next = $end;

        $arguments["pagination"]["next"] = $next;

        $previous  = $cursor-1;

        if($previous<=$start)
            $previous = $start;
        $arguments["pagination"]["previous"] = $previous;

        $arguments["categories"] = categoryController::listCategoriesByParent(0);
        $arguments["tags"] = tagController::listTagsByArticle(0);

        return frontViews::listingcategory($arguments);
    }
}
