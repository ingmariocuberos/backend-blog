<?php

include_once "cors.php";
include "../../model/UserModel.php";
include "../../DAO/DAOUser/updateUser.php";
include "../../DAO/DAOUser/gettingType.php";
include "./helpers/isAdmin.php";

$getData = json_decode(file_get_contents("php://input"));

$user = new UserModel($getData->name, $getData->uemail, $getData->password, $getData->phone, $getData->type, $getData->creationDate, $getData->updateDate);

$adminFlag = isAdmin($getData);

if($adminFlag){

    $resultDao = updateUser($getData->id, $user);

    if($resultDao){

        $data = array("ok" => "true", "msg" => "Registro actualizado con éxito");

        echo json_encode($data);

    } else {

        $data = array("ok" => "false", "msg" => "El registro no pudo ser actualizado");

        echo json_encode($data);
    }

} else {

    $data = array("ok" => "false", "msg" => "No cuenta con permisos de administrador");

    echo json_encode($data);
}