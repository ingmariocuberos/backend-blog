<?php

include_once "cors.php";
include "../../JWTValidate.php";
include "../../model/UserModel.php";
include "../../DAO/DAOUser/register.php";
include "../../DAO/DAOUser/showId.php";


$getUser = json_decode(file_get_contents("php://input"));

$hashPassword = password_hash($getUser->password, PASSWORD_DEFAULT);

$user = new UserModel($getUser->name, $getUser->email, $hashPassword, $getUser->phone, $getUser->type, $getUser->creationDate, $getUser->updateDate);

$resultDao = register($user);

if($resultDao){

    $uid = showId($getUser->email);

    $data = array("ok" => "true", "id" => $uid, "token" => Auth::SignIn([
                        'id' => $uid
                    ]), "name" => $user->getName(), "usertype" => $user->getType(), "email" => $user->getEmail());

    echo json_encode($data);

}

?>