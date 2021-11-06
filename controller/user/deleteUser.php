<?php

include_once "cors.php";
include "../../JWTValidate.php";

include "../../model/UserModel.php";
include "../../DAO/DAOUser/deleteUser.php";
include "../../DAO/DAOUser/gettingType.php";
include "./helpers/isAdmin.php";

$getData = json_decode(file_get_contents("php://input"));

$adminFlag = isAdmin($getData);

$JWTCheck = "init";

try {
    $JWTCheck = Auth::Check($getData->token);
} catch (\Throwable $th) {
    
}

if($adminFlag && $JWTCheck==null){

    $resultDao = deleteUser($getData->userToDelete);

    if($resultDao){

        $data = array("ok" => "true", "msg" => "Registro eliminado con éxito");

        echo json_encode($data);

    } else {

        $data = array("ok" => "false", "msg" => "El registro no pudo ser eliminado");

        echo json_encode($data);
    }

} else if($JWTCheck!=null){

    $data = array("ok" => "false", "msg" => "Expired");

    echo json_encode($data);

} else {

    $data = array("ok" => "false", "msg" => "No cuenta con permisos de administrador");

    echo json_encode($data);
}
