<?php

include_once "cors.php";
include "../../model/UserModel.php";
include "../../DAO/DAOUser/login.php";

$getCredentials = json_decode(file_get_contents("php://input"));

$resultDao = login($getCredentials->email);

if(isset($resultDao[0])){

    if($getCredentials->email != $resultDao[0]->email || $getCredentials->password != $resultDao[0]->password){

        $data = array("ok" => "false", "msg" => "Email y/o password incorrecto");
    
        echo json_encode($data);
    
    } else {

        $data = array("ok" => "true", "token" => "adsgfusadyfgusadygfusdf");
    
        echo json_encode($data);
    
    }

} else {

    $data = array("ok" => "false", "msg" => "Email y/o password incorrectos", "dato" => "$resultadoDao");
    
        echo json_encode($data);
}

/* $user = new UserModel($getCredentials->name, $getCredentials->email, $getUser->password, $getUser->phone, $getUser->type, $getUser->creationDate, $getUser->updateDate);

$resultDao = register($user); */

/* echo json_encode($resultDao[0], JSON_PRETTY_PRINT); */

?>