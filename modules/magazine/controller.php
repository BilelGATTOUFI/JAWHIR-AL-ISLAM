<?php
class magazineController extends _controller implements _controllerInterface {
    public static function listAll() {
        $model = new magazineModel();
        return $model->listAll();
    }


public function jawahir($arguments=array()){
    $model = new magazineModel();
    $arguments["magazines"] = $model->listAll();
    $arguments["categories"] = categoryController::listCategoriesByParent(0);
    $arguments["tags"] = tagController::listTagsByArticle(0);
    return frontViews::jawahir($arguments);
}




}