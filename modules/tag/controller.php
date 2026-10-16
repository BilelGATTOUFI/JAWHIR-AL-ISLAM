<?php

class tagController extends _controller implements _controllerInterface {
    static public function listTagsByArticle($article_id){
        $model = new articletagModel();
        return $model->listByArticle($article_id);
    }
    static public function link($text, $id)
    {
        return "search_" . myTruncate($text, 50) . "_" . $id . ".html";
    }
}