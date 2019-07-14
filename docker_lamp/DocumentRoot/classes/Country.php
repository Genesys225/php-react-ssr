<?php
class Country
{
    private $conn;
    private $table = 'country';
    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function getById(String $id)
    {
        $result = $this->runQuery("SELECT * FROM $this->table WHERE Code = $id ");
        return $result;
    }
    public function getAll()
    {
        $sql = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    public function getByName($countryName)
    {
        $sql = "SELECT * FROM $this->table WHERE Name = '$countryName'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
}

require_once($_SERVER["DOCUMENT_ROOT"] . "/mysql/DB.php");
