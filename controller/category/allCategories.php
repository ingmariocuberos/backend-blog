<?php

include_once "cors.php";
include "../../DAO/DAOCategory/allCategories.php";

$getData = json_decode(file_get_contents("php://input"));

if($getData->category == "all"){

    $resultDao = allCategories();

    $data = array("ok" => "true", "msg" => $resultDao);

    echo json_encode($data);

}
?>