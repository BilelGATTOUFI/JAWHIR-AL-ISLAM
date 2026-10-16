<?php

class categoryViews extends _views implements _viewsInterface {

    static public function insert($arguments)
    {
        $forms = array();
        $dir = "rtl";

        $object = new _formSelectLov("category","category_id",array("category_labelar"));
        $object->id = "category_parent";
        $object->placeHolder = "Choisir la catégorie";
        $object->label = "Catégorie mère";
        $forms[] = $object;

        $object = new _formText();
        $object->label = "Catégorie en arabe";
        $object->id = "category_labelar";
        $object->dir = $dir;
        $forms[] = $object;

        $object = new _formText();
        $object->label = "Catégorie en français";
        $object->id = "category_labelfr";
        $object->dir = "ltr";
        $forms[] = $object;

        $object = new _formText();
        $object->label = "Catégorie en anglais";
        $object->id = "category_labelen";
        $object->dir = "ltr";
        $forms[] = $object;

        $data = array(
            "title" => "Ajouter une catégorie",
            "forms" => $forms,
            "module" => "category",
            "action" => "insertForm",
        );
        return self::insertViews($data);

    }
    static public function update($arguments)
    {
        $model = new categoryModel();
        $element = $model->listById($arguments["category_id"]);

        $forms = array();
        $dir = "rtl";

        $object = new _formSelectLov("category","category_id",array("category_labelar"));
        $object->id = "category_parent";
        $object->placeHolder = "Choisir la catégorie";
        $object->label = "Catégorie mère";
        $forms[] = $object;

        $object = new _formText();
        $object->label = "Catégorie en arabe";
        $object->id = "category_labelar";
        $object->dir = $dir;
        $object->defaultValue = $element->category_labelar;
        $forms[] = $object;

        $object = new _formText();
        $object->label = "Catégorie en français";
        $object->id = "category_labelfr";
        $object->dir = "ltr";
        $object->defaultValue = $element->category_labelfr;
        $forms[] = $object;

        $object = new _formText();
        $object->label = "Catégorie en anglais";
        $object->id = "category_labelen";
        $object->dir = "ltr";
        $object->defaultValue = $element->category_labelen;
        $forms[] = $object;



        $buttons = array();
        $object = new _formButton();
        $object->label = "Modifier";
        $object->id = "btn-update";
        $object->cssClass = "btn btn-primary";
        $buttons[] = $object;

        if ($element->category_menu) {
            $object = new _formButton();
            $object->label = "Supprimer du menu";
            $object->type = "link";
            $object->id = "button_id";
            $object->link = "?module=category&action=unmenu&category_id=" . $element->category_id;
            $object->cssClass = "btn btn-purple";
            $buttons[] = $object;
        } else {
            $object = new _formButton();
            $object->label = "Ajouter au menu";
            $object->type = "link";
            $object->id = "button_id";
            $object->link = "?module=category&action=menu&category_id=" . $element->category_id;
            $object->cssClass = "btn btn-warning";
            $buttons[] = $object;
        }


        $object = new _formButton();
        $object->label = "Supprimer";
        $object->type = "link";
        $object->id = "button_id";
        $object->link = "?module=category&action=delete&category_id=" . $element->category_id;
        $object->cssClass = "btn btn-o btn-red pull-right";
        $buttons[] = $object;

        $arguments["buttons"] = $buttons;


        $data = array(
            "title" => "Modifier une catégorie",
            "forms" => $forms,
            "module" => "category",
            "action" => "updateForm",
            "primaryKey" => "category_id",
            "primaryKeyValue" => $element->category_id,
            "buttons" => $buttons,
        );
        return self::updateViews($data);

    }

    static function table($arguments)
    {
        $model = new categoryModel();
        $result = $model->listAll();
        //print_r($result);
        foreach($result as $element){
            //var_dump($element->category_parent);
            if($element->category_parent == "0")
               $element->category_parentlabelar = "*";
        }
        $table = new _table();
        $table->data = $result;
        $table->header = array(
            "category_parentlabelar" => "Catégorie mère",
            "category_labelar" => "Catégorie",
            "category_menu" => "Menu",
            );
        $table->links = array(
            "category_labelar" => '?module=category&action=update&category_id={category_id}',
        );

        $table->staticTable = array(
            "category_menu" => categoryController::$T_menu,

        );

        $data = array("module" => "category",
            "title" => "Liste des catégories",
            "primaryKey" => "category_id",
            "table" => $table);


        return parent::tableViews($data);
    }
}