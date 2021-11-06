<?php

include_once "cors.php";
include "../../JWTValidate.php";

include "../../model/UserModel.php";
include "../../DAO/DAOUser/updateUser.php";
include "../../DAO/DAOUser/gettingType.php";
include "./helpers/isAdmin.php";

$getData = json_decode(file_get_contents("php://input"));

$user = new UserModel($getData->name, $getData->uemail, $getData->password, $getData->phone, $getData->type, $getData->creationDate, $getData->updateDate);

$JWTCheck = "s";

try {
    $JWTCheck = Auth::Check($getData->token);
} catch (\Throwable $th) {
    
}

$adminFlag = isAdmin($getData);

if($adminFlag && $JWTCheck==null){

    $resultDao = updateUser($getData->id, $user);

    if($resultDao){

        $data = array("ok" => "true", "msg" => "Registro actualizado con éxito");

        echo json_encode($data);

    } else {

        $data = array("ok" => "false", "msg" => "El registro no pudo ser actualizado");

        echo json_encode($data);
    }

} else if($JWTCheck!=null){

    $data = array("ok" => "false", "msg" => "Expired");

    echo json_encode($data);

} else {

    $data = array("ok" => "false", "msg" => "No cuenta con permisos");

    echo json_encode($data);
}