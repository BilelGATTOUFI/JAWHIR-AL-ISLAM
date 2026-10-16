<?php
class searchController extends _controller implements _controllerInterface
{
    function search($arguments=array()){

        $arguments = array();

        $arguments["categories"] = categoryController::listCategoriesByParent(0);
        $arguments["tags"] = tagController::listTagsByArticle(0);

        if(empty($arguments["q"]) || strlen($arguments["q"])<3)
            return searchViews::noresult($arguments);

        $model = new searchModel();
        $result = $model->search($arguments["q"]);



        $arguments["result"] = $result;
        if(!$result)
            return searchViews::noresult($arguments);

        foreach($result["articles"] as $article){
            $article->author="";
            $article->category ="";
            $article->date = $article->article_date;
        }



        return searchViews::result($arguments);

    }

}