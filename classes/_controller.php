<?php

class _controller
{
    public $tableName;
    public $primaryKey;

    public function __construct()
    {
        $this->tableName = str_replace("Controller", "", get_class($this));
        $this->primaryKey = $this->tableName . "_id";
    }

    private function getColmuns()
    {
        global $cfg;
        $modelName = $this->tableName . "Model";
        $model = new $modelName;
        return array_diff_key($model->getColumns(), array_flip(array_merge($cfg["table_columns_reserved"], array($this->primaryKey))));
    }

    /*Display methods*/
    public function defaultDisplay($arguemnts = array())
    {
        return $this->table();
    }

    public function table($arguments = array())
    {
        $modelName = $this->tableName . "Model";
        $model = new $modelName;
        $data = $model->listAll();

        $table = new _table();
        $table->data = $data;

        $fields = $this->getColmuns();
        $first = null;
        foreach ($fields as $key => $field) {
            if (empty($this->_visibility[$key]) || (!empty($this->_visibility[$key]["table"]) && $this->_visibility[$key]["table"])) {
                $table->header[$key] = $key;
                if (!empty($this->_labels[$key]))
                    $table->header[$key] = $this->_labels[$key];
                if (!$first)
                    $first = $key;
            }
        }
        if (!empty($first)) {
            $table->links = array(
                $first => '?module=' . $this->tableName . '&action=update&' . $this->primaryKey . '={' . $this->primaryKey . '}',
            );
        }

        $data = array("module" => $this->tableName,
            "primaryKey" => $this->primaryKey,
            "title" => "Liste des " . $this->tableName . "",
            "table" => $table);
        $views = $this->tableName . "Views";
        return $views::tableViews($data);
    }

    public function insert($arguments = array())
    {
        $fields = $this->getColmuns();
        $forms = array();
        foreach ($fields as $key => $field) {
            if (empty($this->_visibility[$key]) || (!empty($this->_visibility[$key]["insert"]) && $this->_visibility[$key]["insert"])) {
                if (!empty($this->_types[$key]))
                    if (!empty($this->_types[$key]["options"]))
                        $object = new $this->_types[$key]["formObject"]($this->_types[$key]["options"]);
                else
                    $object = new $this->_types[$key]["formObject"];
            else
                $object = new _formText();

                $object->id = $key;
            $object->label = $key;
            if (!empty($this->_labels[$key]))
                $object->label = $this->_labels[$key];
            $forms[] = $object;
                }
        }


        $data = array("module" => $this->tableName,
            "action" => "insertForm",
            "title" => "Nouveau " . $this->tableName,
            "forms" => $forms);
        $views = $this->tableName . "Views";
        return $views::insertViews($data);
    }

    public function update($arguments = array())
    {
        if (empty($arguments[$this->primaryKey])) {
            error(__METHOD__ . " Primary key is empty!");
            return false;
        }

        $modelName = $this->tableName . "Model";
        $model = new $modelName;
        $element = $model->listById($arguments[$this->primaryKey]);
        if (!$element) {
            error(__METHOD__ . " Element ID  " . $this->primaryKey . "=" . $arguments[$this->primaryKey] . " doesn't exists");
            return $this->table();
        }
        $fields = $this->getColmuns();
        $forms = array();
        foreach ($fields as $key => $field) {
            if (empty($this->_visibility[$key]) || (!empty($this->_visibility[$key]["update"]) && $this->_visibility[$key]["update"])) {

                if (!empty($this->_types[$key]))
                    if (!empty($this->_types[$key]["options"]))
                        $object = new $this->_types[$key]["formObject"]($this->_types[$key]["options"]);
                    else
                        $object = new $this->_types[$key]["formObject"]();
                else
                    $object = new _formText();
                $object->id = $key;
                $object->label = $key;
                if (!empty($this->_labels[$key]))
                    $object->label = $this->_labels[$key];
                $object->defaultValue = $element->$key;
                $forms[] = $object;
            }
        }


        $data = array("module" => $this->tableName,
            "action" => "updateForm",
            "primaryKey" => $this->primaryKey,
            "primaryKeyValue" => $arguments[$this->primaryKey],
            "title" => "Modifier " . $this->tableName,
            "forms" => $forms);

        $views = $this->tableName . "Views";
        return $views::updateViews($data);
    }

    public function delete($arguments = array())
    {
        if (empty($arguments[$this->primaryKey])) {
            error(__METHOD__ . " Primary key is empty!");
            return false;
        }

        $modelName = $this->tableName . "Model";
        $model = new $modelName;
        $element = $model->listById($arguments[$this->primaryKey]);
        if (!$element) {
            error(__METHOD__ . " Element ID  " . $this->primaryKey . "=" . $arguments[$this->primaryKey] . " doesn't exists");
            return $this->table();
        }

        $data = array("module" => $this->tableName,
            "action" => "deleteForm",
            "primaryKeyValue" => $arguments[$this->primaryKey],
            "primaryKey" => $this->primaryKey,
            "title" => "Supprimer " . $this->tableName,
        );
        $views = $this->tableName . "Views";
        return $views::deleteViews($data);
    }

    /*Form method*/
    public function insertForm($arguments, $button = "")
    {
        $object = new stdClass();
        foreach ($arguments as $key => $val) {
            $object->$key = $val;
        }

        $modelName = $this->tableName . "Model";
        $model = new $modelName;
        $result = $model->insert($object);

        if (!$result) {
            return new _ajaxResponse;
        }
        $result = new _ajaxResponse;
        $result->success = true;
        $result->message = "Opération réussie";
        return $result;
    }

    public function updateForm($arguments, $button = "")
    {
        $object = new stdClass();
        foreach ($arguments as $key => $val) {
            $object->$key = $val;
        }

        $modelName = $this->tableName . "Model";
        $model = new $modelName;
        $result = $model->update($object);

        if (!$result) {
            return new _ajaxResponse;
        }
        $result = new _ajaxResponse;
        $result->success = true;
        //$result->script = "window.location='?module=" . $this->tableName . "&view=table';";
        $result->message = "Opération réussie";
        return $result;
    }

    public function deleteForm($arguments, $button = "")
    {
        $modelName = $this->tableName . "Model";
        $model = new $modelName;
        $result = $model->delete($arguments[$this->primaryKey]);

        if (!$result) {
            return new _ajaxResponse;
        }
        $result = new _ajaxResponse;
        $result->success = true;
        $result->message = "Opération réussie";
        $result->script = "window.location='?module=" . $this->tableName . "&view=table';";
        return $result;
    }

    /*ajax method*/
    public function formSelect($arguments)
    {
        $modelName = $this->tableName . "Model";
        $model = new $modelName;
        $data = $model->listLikeBy($this->tableName . "_libelle", "%" . $arguments["q"] . "%");
        $items = array();
        foreach ($data as $datum) {
            $item = array();
            $strLabel = $this->tableName . "_libelle";
            $strId = $this->primaryKey;
            $item["text"] = $datum->$strLabel;
            $item["id"] = $datum->$strId;
            $items[] = $item;
        }

        $result = new _ajaxResponse;
        $result->success = true;
        $result->message = $this->tableName;
        $result->results = $items;
        return $result;
    }
}