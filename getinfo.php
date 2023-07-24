<?php
// require __DIR__ . '/vendor/autoload.php';
require_once "Car.php";

require_once "date.php";
header('Content-Type: application/json; charset=utf-8');

try{
$id = $_GET["id"];
// $car = new Car($data->brand, $data->model, $data->year, $data->price);
// $car->save_id();
// $car->save_info();
$car = new Car();
$car->retrieve($id);



echo json_encode($car);
}catch(Exception $e){
    echo json_encode(["error"=> true,
    "message" => $e->getMessage()]);
}

