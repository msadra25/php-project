<?php

require_once "Car.php";

$json = file_get_contents('php://input');
$data = json_decode($json);
    
function updateInfo($id){

     $newDate = $data; 
     $f = fopen("cars.txt/carsInfo.txt", "r");
     $str = fread($f, filesize("cars.txt/carsInfo.txt"));
     if(strpos($str, $id) != false){
          $re = "/($id)\n([a-z]+)\n(.+)\n(\d*)\n(\d+)/m";
          // $f = fopen("cars.txt/carsInfo.txt", "r");
          // $str = fread($f, filesize("cars.txt/carsInfo.txt"));
          preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
          //$car = new Car($data->brand, $data->model, $data->year, $data->price);
          $data->brand = $matches[0][2];
          $data->model = $matches[0][3];
          $data->year =  $matches[0][4];
          $data->price =  $matches[0][5];

          print_r($matches);
    }else{
        echo "no";
    }
}

updateInfo($_POST["id"]);
//updateInfo($_GET["id"]);