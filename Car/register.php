<?php

use League\Csv\Writer;
use League\Csv\Reader;
use League\Csv\Statement;


include "Car.php";
include "search.php";
include "date.php";


// $json = file_get_contents('php://input');
// $data = json_decode($json);
// header('Content-Type: application/json; charset=utf-8');


// try{
// $car = new Car($data->brand, $data->model, $data->year, $data->price);
// $car->saveInfo();
// echo json_encode($car);
// }catch(Exception $e){
//     echo json_encode([
//         "status" => false,
//         "code" => 4001,
//         "error_message" => $e->getMessage()]);
// }

// $car = new Car();
// $car->saveInfo("carsInfo.csv");
