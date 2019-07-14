<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");
include_once "../../mysql/DB.php";
include_once "../../classes/Country.php";

$database = new DB();
$db = $database->connect();

$countries = new Country($db);
$result = $countries->read();

$countries_length = $result->rowCount();
// echo $countries_length;

if ($countries_length > 0) {
    $countries_arr = array();
    $countries_arr['data'] = $result->fetchAll(PDO::FETCH_ASSOC);
    $jsonStr = '[';
    foreach ($countries_arr['data'] as $key => $country) {
        $temp = json_encode($country,JSON_UNESCAPED_UNICODE );
        if (!empty($temp)) $jsonStr .= $temp. ', ';
    }
    $jsonStr = rtrim($jsonStr ,", ");
    $jsonStr .= ']';
    echo $jsonStr;
} else {
    echo json_encode(
        array('message' => 'No Countries')
    );
}
?>