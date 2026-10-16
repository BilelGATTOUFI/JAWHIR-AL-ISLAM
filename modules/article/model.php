<?php
class articleModel extends _model implements _modelInterface {


   public function listAll()
{
    $query = "SELECT * FROM article LEFT JOIN category ON article_category = category_id WHERE (article._isdeleted=0 OR ISNULL(article._isdeleted)) ORDER BY article_date DESC";
    $result = $this->dbManager->query($query);
    return $this->dbManager->fetchAll($result);
}


    public function listLatest($number=3,$start=0)
    {
        $query = "SELECT * FROM article LEFT JOIN category ON article_category = category_id WHERE article_status = 1 AND (article._isdeleted=0 OR ISNULL(article._isdeleted))

       ORDER BY article_date DESC LIMIT ".$start.",".$number;
        $result = $this->dbManager->query($query);
        return $this->dbManager->fetchAll($result);
    }

    public function listLatestByCategory($category_id,$number=3,$start=0)
    {
        $query = "SELECT * FROM article LEFT JOIN category ON article_category = category_id WHERE category_id = '".$category_id."' AND  article_status = 1 AND (article._isdeleted=0 OR ISNULL(article._isdeleted)) ORDER BY article_date DESC LIMIT ".$start.",".$number;
        $result = $this->dbManager->query($query);
        return $this->dbManager->fetchAll($result);
    }


   public function listByPagination($offset,$limit=9)
{
    $query = "SELECT * FROM article LEFT JOIN category ON article_category = category_id WHERE (article._isdeleted=0 OR ISNULL(article._isdeleted)) ORDER BY article_date DESC LIMIT ".$offset.",".$limit;
    $result = $this->dbManager->query($query);
    return $this->dbManager->fetchAll($result);
}



}