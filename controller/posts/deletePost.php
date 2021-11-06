<?php

include_once "cors.php";
include "../../JWTValidate.php";
include "../../DAO/DAOPosts/deletePost.php";

if (!isset($_GET["post"])) {
    echo json_encode(null);
    exit;
}

$getData = $_GET["post"];

$JWTCheck="init";

try {
    $JWTCheck = Auth::Check($getData->token);
} catch (\Throwable $th) {
    
}

$resultDao = deletePost($getData);

if($resultDao){

    $data = array("ok" => "true", "msg" => "Post eliminado con éxito");

    echo json_encode($data);

} else if($JWTCheck!=null){

    $data = array("ok" => "false", "msg" => "Expired");

    echo json_encode($data);

} else {

    $data = array("ok" => "false", "msg" => "El post no pudo ser eliminado");

    echo json_encode($data);
}
