<?php

/** 
 * Short desc
 * 
 * @param number $db comes from
 */
class Country
{
    private $_conn;
    private $_table = 'country';
    /** 
     * Short desc
     * 
     * @param number $db comes from
     */
    public function __construct($db)
    {
        $this->_conn = $db;
    }
    /** 
     * Short desc
     * 
     * @param string $id comes from
     * 
     * @return pdo query object
     */
    public function getById(String $id)
    {
        $result = $this->runQuery("SELECT * FROM $this->_table WHERE Code = $id ");
        return $result;
    }
    public function getAll()
    {
        $sql = 'SELECT * FROM ' . $this->_table;
        $stmt = $this->_conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    public function getByName($countryName)
    {
        $sql = "SELECT * FROM $this->_table WHERE Name = '$countryName'";
        $stmt = $this->_conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
}

require_once($_SERVER["DOCUMENT_ROOT"] . "/mysql/DB.php");