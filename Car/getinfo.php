<?php
// require __DIR__ . '/vendor/autoload.php';
require_once "Car.php";

require_once "date.php";
header('Content-Type: application/json; charset=utf-8');

try{


// if(isset($_GET["id"])){
//     $id = $_GET["id"];
//     $car->retrieveId($id);
// }elseif(isset($_GET["brand"])){
//     $brand = $_GET["brand"];
//     $car->retrieveBrand($brand);
// }elseif(isset($_GET["model"])){
//     $model = $_GET["model"];
//     $car->retrieveModel($model);    
// }elseif(isset($_GET["year"])){
//     $year = $_GET["year"];
//     $car->retrieveYear($year);
// }

// $car->getCar($_GET["id"], $_GET["brand"], $_GET["model"], $_GET["year"], [$_GET["price-from"], $_GET["price-to"]]);









//$price = $_GET["price"];
$car = new Car();
$car->retrieveId($_GET["id"]);

// $car->retrieveBrand($brand);
// $car->retrieveModel($model);
// $car->retrieveYear($year);
//$car->retrievePrice($price);


echo json_encode($car);
}catch(Exception $e){
    echo json_encode(["error"=> true,
    "message" => $e->getMessage()]);
}

