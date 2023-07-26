<?php
include 'Models/User.php';
use Models\User;

$json = file_get_contents('php://input');
$data = json_decode($json);

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
    if($user->save("Users.csv")){
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




