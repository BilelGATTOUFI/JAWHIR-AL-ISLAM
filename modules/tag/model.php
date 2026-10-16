<?php

class tagModel extends _model implements _modelInterface
{

    function listByTags($tags)
    {

        $inQuery = implode(',', array_fill(0, count($tags), '?'));
        $query = "SELECT * FROM tag WHERE tag_label IN (" . $inQuery . ") AND (tag._isdeleted=0 OR ISNULL(tag._isdeleted))";
        $sth = $this->dbManager->prepare($query);

        foreach ($tags as $k => $tag)
            $sth->bindValue(($k + 1), $tag);

        try {
            $result = $sth->execute();
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
}