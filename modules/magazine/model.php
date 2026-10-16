<?php
class magazineModel extends _model implements _modelInterface {
    public function listAll() {
        $query = "SELECT * FROM magazine ORDER BY magazine_date DESC";
        $result = $this->dbManager->query($query);
        return $this->dbManager->fetchAll($result);
    }
}