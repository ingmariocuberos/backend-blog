<?php

include_once "cors.php";
include "../../JWTValidate.php";
include "../../DAO/DAOPosts/allPosts.php";

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

if($getData == "all" && $JWTCheck==null){

    $resultDao = allPosts();

    $data = array("ok" => "true", "msg" => $resultDao);

    echo json_encode($data);

} else if($JWTCheck!=null){

    $data = array("ok" => "false", "msg" => "Expired");

    echo json_encode($data);

} else{

    $data = array("ok" => "false", "msg" => "Petición erronea");

    echo json_encode($data);

}





?>