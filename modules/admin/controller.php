<?php

class adminController extends _controller implements _controllerInterface
{

public function insertForm($arguments, $button = "")
    {
        $object = new stdClass();
        foreach ($arguments as $key => $val) {
            $object->$key = $val;
        }
        $object->admin_password = hashPassword($object->admin_password);
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
        $object->admin_password = hashPassword($object->admin_password);

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
}
