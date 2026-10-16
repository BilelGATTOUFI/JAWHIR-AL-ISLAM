<?php

class _views
{
    public $tableName;
    public $primaryKey;

    var $_labels = array();
    var $_types = array();
    var $_visibility = array();

    public function __construct()
    {
        $this->tableName = str_replace("Views", "", get_class($this));
        $this->primaryKey = $this->tableName . "_id";
    }

    static function insertViews($arguments)
    {
        $object = new _formHidden();
        $object->id = "module";
        $object->defaultValue = $arguments["module"];
        $arguments["forms"][] = $object;

        $object = new _formHidden();
        $object->id = "action";
        $object->defaultValue = $arguments["action"];
        $arguments["forms"][] = $object;

        $template = "generiqueInsert";
        if(!empty($arguments["template"]))
            $template = $arguments["template"];
        return _template::renderTemplate($template, $arguments);
    }
    static function updateViews($arguments)
    {
        $object = new _formHidden();
        $object->id = "module";
        $object->defaultValue = $arguments["module"];
        $arguments["forms"][] = $object;

        $object = new _formHidden();
        $object->id = "action";
        $object->defaultValue = $arguments["action"];
        $arguments["forms"][] = $object;

        $object = new _formHidden();
        $object->id = $arguments["primaryKey"];
        $object->defaultValue = $arguments["primaryKeyValue"];
        $arguments["forms"][] = $object;

        if(empty($arguments["buttons"])){
            $buttons = array();
            $object = new _formButton();
            $object->label = "Modifier";
            $object->id ="btn-update";
            $object->cssClass = "btn btn-primary";
            $buttons[]  = $object;

            $object = new _formButton();
            $object->label = "Supprimer";
            $object->type = "link";
            $object->id ="button_id";
            $object->link="?module=".$arguments["module"]."&action=delete&".$arguments["primaryKey"]."=".$arguments["primaryKeyValue"];
            $object->cssClass = "btn btn-o btn-red pull-right";
            $buttons[]  = $object;

            $arguments["buttons"]=$buttons;
        }

        $template = "generiqueUpdate";
        if(!empty($arguments["template"]))
            $template = $arguments["template"];
        return _template::renderTemplate($template, $arguments);
    }
    static function deleteViews($arguments)
    {
        $object = new _formHidden();
        $object->id = "module";
        $object->defaultValue = $arguments["module"];
        $arguments["forms"][] = $object;

        $object = new _formHidden();
        $object->id = "action";
        $object->defaultValue = $arguments["action"];
        $arguments["forms"][] = $object;

        $object = new _formHidden();
        $object->id = $arguments["primaryKey"];
        $object->defaultValue = $arguments["primaryKeyValue"];
        $arguments["forms"][] = $object;

        $template = "generiqueDelete";
        if(!empty($arguments["template"]))
            $template = $arguments["template"];
        return _template::renderTemplate($template, $arguments);
    }
    static function tableViews($arguments)
    {
        $arguments["table"]->primaryKey = $arguments["primaryKey"];
        $arguments["table"] = $arguments["table"]->format();
        $template = "generiqueTable";
        if(!empty($arguments["template"]))
            $template = $arguments["template"];
        return _template::renderTemplate($template, $arguments);
    }


}