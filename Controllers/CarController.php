<?php



namespace Controllers;
require 'Models/Car.php';


use Exception;
use Models\Car;
class CarController{
    public static function getCar($file, $data){
        header('Content-Type: application/json; charset=utf-8');
        $cars = Car::getInfo($file, $data->key, $data->value);
        foreach($cars->getRecords() as $car){
            
            echo json_encode($car);
        }
    }

    public static function deleteCar($file, $id){
        header('Content-Type: application/json; charset=utf-8');

        echo json_encode([
            "status" => Car::deleteInfo($file, $id)
        ]);
    }

    public static function addCar($file, $data){
        header('Content-Type: application/json; charset=utf-8');
        try{
            $car = new Car();
            if(isset($data->brand))
                $car->setBrand($data->brand);
            if(isset($data->model))
                $car->setModel($data->model);
            if(isset($data->year))
                $car->setYear($data->year);
            if(isset($data->price))
                $car->setPrice($data->price);
            if($car->saveInfo($file)){
                echo json_encode([
                    "status"=> true,
                    "car"=>$car->toJson()
                ]);
            }
        }catch(Exception $e){
        echo json_encode([
            "error message" => $e->getMessage(),
            "error code" => $e->getCode()
        ]);
        }
    }
}











?>