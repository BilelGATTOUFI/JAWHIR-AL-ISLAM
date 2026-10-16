<?php

class articleViews extends _views implements _viewsInterface
{

    static public function insert($arguments)
    {
        $forms = array();

        global $T_arrays;
        $object = new _formSelect();
        $object->label = "Langue";
        $object->id = "article_language";
        $object->defaultValue = "AR";
        $object->values = $T_arrays["T_language"];
        $forms[] = $object;


        $object = new _formSelectLov("category", "category_id", array("category_labelar"));
        $object->label = "Catégorie";
        $object->id = "article_category";
        $forms[] = $object;


        $object = new _formText();
        $object->label = "Titre";
        $object->id = "article_title";
        $forms[] = $object;

        $object = new _formDate();
        $object->label = "Date";
        $object->id = "article_date";
        $object->defaultValue = date("Y-m-d");
        $forms[] = $object;

        $object = new _formSelectLov("author", "author_id", array("author_ar"));
        $object->label = "Auteur";
        $object->id = "article_author";
        $forms[] = $object;

        $object = new _formText();
        $object->id = "article_tags";
        $object->label ="Tags";
        $object->cssClass = "form-control tagit";
        $forms[]=$object;

        $object = new _formFileUpload();
        $object->id = "article_picture";
        $object->name = "files";
        $object->label ="Photo";
        /*$object->defaultValue = $element->article_picture;*/
        $forms[]=$object;
		
		$object = new _formTextArea();
        $object->label = "Contenu";
        $object->id = "article_texte";
        $object->cssClass = "ckeditor form-control";
        $object->dir = $dir;
        /*$object->defaultValue = $element->article_texte;*/
        $forms[] = $object;



        $data = array(
            "title" => "Nouvel article",
            "forms" => $forms,
            "module" => "article",
            "action" => "insertForm",
        );
        return self::insertViews($data);

    }

    static public function update($arguments)
    {
        $model = new articleModel();
        $element = $model->listById($arguments["article_id"]);

        $forms = array();
        $dir = "ltr";
        if ($element->article_language == "AR")
            $dir = "rtl";

        global $T_arrays;
        $object = new _formSelect();
        $object->label = "Langue";
        $object->id = "article_language";
        $object->defaultValue = $element->article_language;
        $object->dir = $dir;
        $object->values = $T_arrays["T_language"];
        $forms[] = $object;

        $object = new _formSelectLov("category", "category_id", array("category_labelar"));
        $object->label = "Catégorie";
        $object->dir = $dir;
        $object->id = "article_category";
        $object->defaultValue = $element->article_category;
        $forms[] = $object;

        $object = new _formText();
        $object->label = "Titre";
        $object->id = "article_title";
        $object->dir = $dir;
        $object->defaultValue = $element->article_title;
        $forms[] = $object;

        $object = new _formDate();
        $object->label = "Date";
        $object->id = "article_date";
        $object->defaultValue = $element->article_date;
        $object->dir = $dir;
        $forms[] = $object;

        $object = new _formSelectLov("author", "author_id", array("author_ar"));
        $object->label = "Auteur";
        $object->defaultValue = $element->article_author;
        $object->id = "article_author";
        $object->dir = $dir;
        $forms[] = $object;

        $object = new _formText();
        $object->id = "article_tags";
        $object->label ="Tags";
        $object->cssClass = "form-control tagit";
        $forms[]=$object;

        $object = new _formFileUpload();
        $object->id = "article_picture";
        $object->name = "files";
        $object->label ="Photo";
        $object->defaultValue = $element->article_picture;
		
        $forms[]=$object;

        $object = new _formTextArea();
        $object->label = "Contenu";
        $object->id = "article_texte";
        $object->cssClass = "ckeditor form-control";
        $object->dir = $dir;
        $object->defaultValue = $element->article_texte;
        $forms[] = $object;


        $buttons = array();
        $object = new _formButton();
        $object->label = "Modifier";
        $object->id = "btn-update";
        $object->cssClass = "btn btn-primary";
        $buttons[] = $object;
        if (empty($element->article_related)) {
            $object = new _formButton();
            $object->label = "Nouvelle traduction";
            $object->id = "btn-translate";
            $object->type = "link";
            $object->cssClass = "btn btn-o btn-green";
            $object->link = "?module=article&action=translate&article_id=" . $element->article_id;
            $buttons[] = $object;
        }
        if ($element->article_status) {
            $object = new _formButton();
            $object->label = "Ne pas publier";
            $object->type = "link";
            $object->id = "button_id";
            $object->link = "?module=article&action=unpublier&article_id=" . $element->article_id;
            $object->cssClass = "btn btn-purple";
            $buttons[] = $object;
        } else {
            $object = new _formButton();
            $object->label = "Publier";
            $object->type = "link";
            $object->id = "button_id";
            $object->link = "?module=article&action=publier&article_id=" . $element->article_id;
            $object->cssClass = "btn btn-warning";
            $buttons[] = $object;
        }

        if ($element->article_slider) {
            $object = new _formButton();
            $object->label = "Enlever du slider";
            $object->type = "link";
            $object->id = "button_id";
            $object->link = "?module=article&action=unslider&article_id=" . $element->article_id;
            $object->cssClass = "btn btn-blue";
            $buttons[] = $object;
        } else {
            $object = new _formButton();
            $object->label = "Ajouter au slider";
            $object->type = "link";
            $object->id = "button_id";
            $object->link = "?module=article&action=slider&article_id=" . $element->article_id;
            $object->cssClass = "btn btn-green";
            $buttons[] = $object;
        }

        $object = new _formButton();
        $object->label = "Supprimer";
        $object->type = "link";
        $object->id = "button_id";
        $object->link = "?module=article&action=delete&article_id=" . $element->article_id;
        $object->cssClass = "btn btn-o btn-red pull-right";
        $buttons[] = $object;

        $arguments["buttons"] = $buttons;


        $data = array(
            "title" => "Modifier un article",
            "forms" => $forms,
            "module" => "article",
            "action" => "updateForm",
            "primaryKey" => "article_id",
            "primaryKeyValue" => $element->article_id,
            "buttons" => $buttons,
        );
        return self::updateViews($data);

    }

    static function table($arguments)
    {
        
        return parent::tableViews($arguments);
    }

    static public function translate($arguments)
    {
        $model = new articleModel();
        $element = $model->listById($arguments["article_id"]);
        global $T_arrays;
        $forms = array();

        $object = new _formSelect();
        $object->label = "Langue";
        $object->id = "article_language";
        $object->defaultValue = "FR";
        $object->values = $T_arrays["T_language"];
        $forms[] = $object;

        $object = new _formText();
        $object->label = "Titre";
        $object->id = "article_title";
        $forms[] = $object;

        $object = new _formDate();
        $object->label = "Date";
        $object->id = "article_date";
        $object->defaultValue = $element->article_date;
        $object->readOnly = true;
        $forms[] = $object;

        $object = new _formSelectLov("author", "author_id", array("author_ar"));
        $object->label = "Auteur";
        $object->defaultValue = $element->article_author;
        $object->readOnly = true;
        $object->id = "article_author";
        $forms[] = $object;

        $object = new _formTextArea();
        $object->label = "Contenu";
        $object->id = "article_texte";
        $forms[] = $object;

        $object = new _formHidden();
        $object->id = "article_related";
        $object->defaultValue = $element->article_id;
        $forms[] = $object;

        $data = array(
            "title" => "Nouvel traduction de l'article :<br><u>" . $element->article_title . "</u>",
            "forms" => $forms,
            "module" => "article",
            "action" => "insertForm",
        );
        return self::insertViews($data);

    }
}