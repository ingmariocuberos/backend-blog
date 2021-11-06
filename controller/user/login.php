<?php

include_once "cors.php";
include "../../JWTValidate.php";
include "../../model/UserModel.php";
include "../../DAO/DAOUser/login.php";
include "../../DAO/DAOUser/showId.php";

$getCredentials = json_decode(file_get_contents("php://input"));

$resultDao = login($getCredentials->email);

if(isset($resultDao[0])){

    if($getCredentials->email != $resultDao[0]->email || !password_verify($getCredentials->password, $resultDao[0]->password)){

        $data = array("ok" => "false", "msg" => "Email y/o password incorrecto");
    
        echo json_encode($data);
    
    } else {

        $uid = showId($getCredentials->email);

        $data = array("ok" => "true", "token" => Auth::SignIn([
            'id' => $uid
        ]));
    
        echo json_encode($data);
    
    }

} else {

    $data = array("ok" => "false", "msg" => "Email y/o password incorrectos", "dato" => "$resultadoDao");
    
        echo json_encode($data);
}

?>