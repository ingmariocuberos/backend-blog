<?php

include_once "cors.php";
include "../../JWTValidate.php";
include "../../DAO/DAOPosts/allPosts.php";

$getData = json_decode(file_get_contents("php://input"));

$JWTCheck="init";

try {
    $JWTCheck = Auth::Check($getData->token);
} catch (\Throwable $th) {
    
}

if($getData->post == "all" && $JWTCheck==null){

    $resultDao = allPosts();

    $data = array("ok" => "true", "msg" => $resultDao);

    echo json_encode($data);

} else if($JWTCheck!=null){

    $data = array("ok" => "false", "msg" => "Expired", "token" => $getData->token);

    echo json_encode($data);

} else{

    $data = array("ok" => "false", "msg" => "Petición erronea");

    echo json_encode($data);

}





?>