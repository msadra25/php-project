<?php
require __DIR__ . '/vendor/autoload.php';
require 'Controllers/CarController.php';
use Controllers\CarController;
$path = $_GET["path"];
$USER_DB = "Cars.csv";
$json = file_get_contents('php://input');
$data = json_decode($json);

if(strcmp($path,"addCar")== 0){
    CarController::addCar($USER_DB,$data);
}elseif(strcmp($path,"getCar")== 0){
    CarController::getCar($USER_DB,$data);
}elseif(preg_match("/deleteCar\/(\d+)/m", $path, $matches)){
    CarController::deleteCar($USER_DB, $matches[1]);
}