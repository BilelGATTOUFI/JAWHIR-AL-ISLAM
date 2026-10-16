<?php
class articletagModel extends _model implements _modelInterface {
    public function listByArticle($article_id)
    {
        $query = "SELECT * FROM tag,articletag WHERE tag_id=articletag_tag AND articletag_article = :value AND (tag._isdeleted=0 OR ISNULL(tag._isdeleted)) AND (articletag._isdeleted=0 OR ISNULL(articletag._isdeleted))";
        $sth = $this->dbManager->prepare($query);
        try {
            $result = $sth->execute(array(':value' => $article_id));
        } catch (Exception $e) {
            $this->setError($e->getMessage());
            error(__METHOD__." ".$e->getMessage());
        }
        if (!$result) {
            $this->setError($sth->errorInfo());
            error(__METHOD__." ".$sth->errorInfo());
        }
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }
}
