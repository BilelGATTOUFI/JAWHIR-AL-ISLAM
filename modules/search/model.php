<?php
class searchModel extends _model implements _modelInterface {
    function search($q){

        $articles = array();
        $model = new articleModel();
        $tmp = $model->listLikeByArticleTexte("%$q%");
        foreach($tmp as $element){
            $articles[$element->article_id] = $element;
        }
        $tmp = $model->listLikeByArticleTitle("%$q%");
        foreach ($tmp as $element) {
            $articles[$element->article_id] = $element;
        }
        if(!count($articles)) {
            //recherche par mot
            $keys = explode(" ", $q);
            foreach ($keys as $key) {
                $tmp = $model->listLikeByArticleTexte("%$key%");
                foreach ($tmp as $element) {
                    $articles[$element->article_id] = $element;
                }
                $tmp = $model->listLikeByArticleTitle("%$key%");
                foreach ($tmp as $element) {
                    $articles[$element->article_id] = $element;
                }
            }
        }


        //$model = new podcastModel();
        //$podcasts = $model->listLikeByPodcastDescription("%$q%");
        $podcasts = array();
        return array("articles"=>$articles,"podcasts"=>$podcasts);

    }
}