<?php
require 'Controllers/UserController.php';
use Controllers\UserController;
$path = $_GET["path"];
$USER_DB = "Users.csv";
$json = file_get_contents('php://input');
$data = json_decode($json);


if(strcmp($path,"addUser")== 0){
    UserController::addUser($USER_DB,$data);
}elseif(strcmp($path,"getUser")== 0){
    UserController::getUser($USER_DB,$data);
}elseif(preg_match("/deleteUser\/(\d+)/m", $path, $matches)){
    UserController::deleteUser($USER_DB, $matches[1]);
}