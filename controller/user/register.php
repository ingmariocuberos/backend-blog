<?php

include_once "cors.php";
include "../../model/UserModel.php";
include "../../DAO/DAOUser/register.php";

$getUser = json_decode(file_get_contents("php://input"));

$user = new UserModel($getUser->name, $getUser->email, $getUser->password, $getUser->phone, $getUser->type, $getUser->creationDate, $getUser->updateDate);

$resultDao = register($user);

echo json_encode($resultDao);

?>