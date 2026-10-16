<?php

class _model
{
    public $dbManager;
    public $tableName;
    public $primaryKey;
    private $error = false;
    private $errorMessage = array(
        "Duplicate entry" => "Une entrée existe déjà dans la base.",
    );

    public function __construct($dbManager = null)
    {
        if (!$dbManager)
            global $dbManager;
        $this->dbManager = $dbManager;
        $this->tableName = str_replace("Model", "", get_class($this));
        $this->primaryKey = $this->tableName . "_id";
    }

    public function insert($element)
    {
        $fields = array();
        $values = array();

        $attributs = get_object_vars($element);
        foreach ($attributs as $attribut => $val) {
            $fields[] = $attribut;
            $tags[] = "?";
            $values[] = $val;
        }
        $fields = implode(",", $fields);
        $tags = implode(",", $tags);

        $query = "INSERT INTO " . $this->tableName . " (" . $fields . ") VALUES (" . $tags . ")";

        $sth = $this->dbManager->prepare($query);
        try {
            $result = $sth->execute($values);
        } catch (Exception $e) {
            $this->setError($e->getMessage());
            error(__METHOD__ . " " . $e->getMessage());
        }
        if (!$result) {
            $this->setError($sth->errorInfo());
            error(__METHOD__ . " " . $sth->errorInfo());
        }
        return $result;

    }

    public function replace($element)
    {
        $fields = array();
        $values = array();

        $attributs = get_object_vars($element);
        foreach ($attributs as $attribut => $val) {
            $fields[] = $attribut;
            $tags[] = "?";
            $values[] = $val;
        }
        $fields = implode(",", $fields);
        $tags = implode(",", $tags);

        $query = "REPLACE INTO " . $this->tableName . " (" . $fields . ") VALUES (" . $tags . ")";
        $sth = $this->dbManager->prepare($query);
        try {
            $result = $sth->execute($values);
        } catch (Exception $e) {
            error($e->getMessage());
        }
        if (!$result) {
            error($sth->errorInfo());
        }
        return $result;
    }

    public function update($element)
    {
        $fields = array();
        $values = array();

        $attributs = get_object_vars($element);
        foreach ($attributs as $attribut => $val) {
            $fields[] = $attribut . "=:" . $attribut;
            $values[":" . $attribut] = $val;
        }
        $fields = implode(",", $fields);

        $query = "UPDATE " . $this->tableName . " SET " . $fields . " WHERE " . $this->primaryKey . "=:" . $this->primaryKey;
        $sth = $this->dbManager->prepare($query);

        try {
            $result = $sth->execute($values);
        } catch (Exception $e) {
            error(__METHOD__ . " " . $e->getMessage());
        }
        if (!$result) {
            error(__METHOD__ . " " . $sth->errorInfo());
        }
        return $result;
    }

    public function _delete($elementId)
    {
        $query = "DELETE FROM " . $this->tableName . " WHERE " . $this->primaryKey . " = '" . $elementId . "'";
        $result = $this->dbManager->query($query);
        return $result;
    }

    /**
     * Supprime dans la table corresspondante toutes les lignes avec $key=$elementId
     * @param integer $elementId Clef ID pour la supression
     * @param string $key colonne à utiliser pour la supression selon ID
     * @return mysql result
     */
    public function delete($elementId, $key = "")
    {
        if ($key == "")
            $key = $this->primaryKey;

        $query = "UPDATE " . $this->tableName . " SET _isdeleted=1 WHERE " . $key . " = '" . $elementId . "'";
        $result = $this->dbManager->query($query);
        return $result;
    }

    public function listById($elementId)
    {
        $result = $this->listBy($this->primaryKey, $elementId);
        if (empty($result))
            return false;
        return $result[0];
    }

    public function listBy($column, $value)
    {
        $query = "SELECT * FROM " . $this->tableName . " WHERE " . $column . " = :value AND (" . $this->tableName . "._isdeleted=0 OR ISNULL(" . $this->tableName . "._isdeleted))";
        $sth = $this->dbManager->prepare($query);
        try {
            $result = $sth->execute(array(':value' => $value));
        } catch (Exception $e) {
            $this->setError($e->getMessage());
            error(__METHOD__ . " " . $e->getMessage());
        }
        if (!$result) {
            $this->setError($sth->errorInfo());
            error(__METHOD__ . " " . $sth->errorInfo());
        }
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }

    public function listLikeBy($column, $value)
    {
        $query = "SELECT * FROM " . $this->tableName . " WHERE " . $column . " LIKE :value AND (" . $this->tableName . "._isdeleted=0 OR ISNULL(" . $this->tableName . "._isdeleted))";
        $sth = $this->dbManager->prepare($query);
        try {
            $sth->execute(array(':value' => $value));
        } catch (Exception $e) {
            error($e->getMessage());
        }
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }

    public function listAll()
    {
        $query = "SELECT " . $this->tableName . ".* FROM " . $this->tableName . " WHERE (" . $this->tableName . "._isdeleted=0 OR ISNULL(" . $this->tableName . "._isdeleted))";
        $result = $this->dbManager->query($query);
        return $this->dbManager->fetchAll($result);
    }

    public function count()
    {
        $query = "SELECT COUNT(*) as total FROM " . $this->tableName . " WHERE (" . $this->tableName . "._isdeleted=0 OR ISNULL(" . $this->tableName . "._isdeleted))";
        $result = $this->dbManager->query($query);
        return $this->dbManager->fetchObject($result);
    }

    public function __call($name, $arguments)
    {
        if (strstr($name, "listLikeBy")) {
            $fnt = "listLikeBy";
        } elseif (strstr($name, "listBy")) {
            $fnt = "listBy";
        } else {
            return false;
        }


        $method = str_replace($fnt, "", $name);
        $pieces = preg_split('/(?=[A-Z])/', $method);
        return $this->$fnt(strtolower($pieces[1] . "_" . $pieces[2]), $arguments[0]);
    }

    public function getColumns()
    {
        $q = $this->dbManager->prepare("SHOW COLUMNS FROM " . $this->tableName);
        $q->execute();
        return $q->fetchAll(PDO::FETCH_GROUP);
    }

    public function lastInsertId()
    {
        return $this->dbManager->lastInsertId();
    }

    private function setError($error)
    {
        $this->error = $error;
    }

    public function getError()
    {
        foreach ($this->errorMessage as $keyword => $message) {
            if (strstr($this->error, $keyword))
                return $message;
        }
        return $this->error;
    }
}