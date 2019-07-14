<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");
include_once "../../mysql/DB.php";
include_once "../../classes/City.php";

$curl = curl_init();

$database = new DB();
$db = $database->connect();

$param = $_GET['Name'];


$city_db = new City($db);
$city = $city_db->getByName($param);

$city_length = $city->rowCount();
echo $cities_length;

if ($city_length > 0) {
    $city_arr = array();
    $city_arr['data'] = $city->fetch(PDO::FETCH_ASSOC);

    echo json_encode($city_arr);
} else {
    echo json_encode(
        array('message' => "No City with name: $param")
    );
}
