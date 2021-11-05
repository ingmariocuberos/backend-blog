<?php

include_once "cors.php";
include "../../model/UserModel.php";
include "../../DAO/DAOUser/allUsers.php";
include "../../DAO/DAOUser/gettingType.php";
include "./helpers/isAdmin.php";

$getCredentials = json_decode(file_get_contents("php://input"));

$adminFlag = isAdmin($getCredentials);

if($adminFlag){

    $users = allUsers();

    $data = array("ok" => "true", "msg" => $users);
    
    echo json_encode($data);

} else {

    $data = array("ok" => "false", "msg" => "No cuenta con permisos de administrador");

    echo json_encode($data);
}
