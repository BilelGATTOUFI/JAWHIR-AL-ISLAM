<?php
class categoryModel extends _model implements _modelInterface {
    public function listAll()
    {
        $query = "SELECT child.*,parent.category_labelar  as category_parentlabelar FROM category as child LEFT JOIN category as parent ON parent.category_id=child.category_parent WHERE (child._isdeleted=0 OR ISNULL(child._isdeleted))";
        $result = $this->dbManager->query($query);
        return $this->dbManager->fetchAll($result);
    }
}