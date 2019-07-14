<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");
include_once "../../mysql/DB.php";
include_once "../../classes/City.php";

$database = new DB();
$db = $database->connect();

$db_city = new City($db);
$cities = $db_city->getAll();

$cities_length = $cities->rowCount();
// echo $cities_length;

if ($cities_length > 0) {
    $cities_arr = array();
    $cities_arr['data'] = $cities->fetchAll(PDO::FETCH_ASSOC);
    $jsonStr = '[';
    foreach ($cities_arr['data'] as $key => $city) {
        $temp = json_encode($city,JSON_UNESCAPED_UNICODE );
        if (!empty($temp)) $jsonStr .= $temp. ', ';
    }
    $jsonStr = rtrim($jsonStr ,", ");
    $jsonStr .= ']';
    echo $jsonStr;
     
    // echo json_encode($cities_arr);
} else {
    echo json_encode(
        array('message' => 'No Cities')
    );
    
};
?>