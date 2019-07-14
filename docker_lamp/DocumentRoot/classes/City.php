<?php 
class City  
{
    private $conn;
    private $table = 'city';
    public function __construct($db){
        $this->conn = $db;
    }
    private function runQuery(String $query)
    {
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function getAll(){
        $result = $this->runQuery('SELECT * FROM ' . $this->table);
        return $result;
    }
    
    public function getByName($name)
    {
        $result = $this->runQuery("SELECT * FROM $this->table WHERE Name = '$name' "); 
        print_r($result);
        return $result;
    }
}

require_once($_SERVER["DOCUMENT_ROOT"] . '/mysql/DB.php');
?>