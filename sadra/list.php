<?php

require_once "Car.php";

function arrayList(){

    
    
   // $fileContent = file("/cars.txt/carsInfo.txt");
   //$objects = [];
    // foreach($fileContent as list($id, $brand, $model, $year, $price)){

    //     $info = new Car();
    //     $objects[] = $info;
    // }

    $re = "\n==============\n";
    $f = fopen("cars.txt/carsInfo.txt", "r");
    $str = fread($f, filesize("cars.txt/carsInfo.txt"));
    $cars = mb_split($re, $str);
    $car_attr = [];
    foreach($cars as $car){
        $car_att  = mb_split("\n", $car);
        $car = new Car($car_att[1], $car_att[2], $car_att[3], $car_att[4]);

        array_push($car_attr, $car);
    }
return $car_attr;
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode(arrayList());