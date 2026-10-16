<?php

class _database
{
    private $engine = "mysql";
    private $hostname;
    private $username;
    private $password;
    private $database;
    public $dbLink;

    public function __construct($config = array())
    {
        $this->loadConfig($config);
        return $this->connect();
    }

    private function loadConfig($config = array())
    {
        global $cfg_database;

        $configArray = $cfg_database;
        if (count($config))
            $configArray = $config;


        if (isset($configArray["hostname"]))
            $this->hostname = $configArray["hostname"];
        if (isset($configArray["username"]))
            $this->username = $configArray["username"];
        if (isset($configArray["password"]))
            $this->password = $configArray["password"];
        if (isset($configArray["database"]))
            $this->database = $configArray["database"];
    }

    private function connect()
    {
        try {
            $this->dbLink = new PDO($this->engine . ':dbname=' . $this->database . ";host=" . $this->hostname, $this->username, $this->password);
        } catch (PDOException $e) {
            error("DB Error: " . $e->getMessage());
            die();
        }
        return $this->dbLink;
    }

    public function prepare($query)
    {
        return $this->dbLink->prepare($query);
    }

    public function query($query)
    {
        $result = $this->dbLink->query($query);
        if(!$result) {
            error(__METHOD__." ".$this->dbLink->errorInfo());
        }
        return $result;
    }

    public function fetchAll($result)
    {
        if(!$result)
            return false;
        $object = $result->fetchAll(PDO::FETCH_OBJ);
        return $object;
    }

    public function fetchArray($result)
    {
        if(!$result)
            return false;
        $object = $result->fetchAll(PDO::FETCH_COLUMN);
        return $object;
    }

    public function fetchObject($result)
    {
        if(!$result)
            return false;
        $object = $result->fetch(PDO::FETCH_OBJ);
        return $object;
    }

    public function lastInsertId()
    {
        return $this->dbLink->lastInsertId();
    }
}
