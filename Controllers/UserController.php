<?php
namespace Controllers;
require 'Models/User.php';
use Models\User;
class UserController{
    public static function getUser($file, $data){
        header('Content-Type: application/json; charset=utf-8');
        $users = User::get($file, $data->key, $data->value);
        foreach($users->getRecords() as $user){
            
            echo json_encode($user);
        }
    }

    public static function deleteUser($file, $id){
        header('Content-Type: application/json; charset=utf-8');

        echo json_encode([
            "status" => User::delete($file, $id)
        ]);
    }

    public static function addUser($file, $data){
        header('Content-Type: application/json; charset=utf-8');
        try{
            $user = new User();
            if(isset($data->first_name))
                $user->setFirstName($data->first_name);
            if(isset($data->last_name))
                $user->setLastName($data->last_name);
            if(isset($data->phone))
                $user->setPhone($data->phone);
            if(isset($data->address))
                $user->setAddress($data->address);
            if(isset($data->email))
                $user->setEmail($data->email);
            if(isset($data->age))
                $user->setAge($data->age);
            if($user->save($file)){
                echo json_encode([
                    "status"=> true,
                    "user"=>$user->toJson()
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