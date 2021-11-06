<?php

include_once "cors.php";
include "../../DAO/DAOCategory/allCategories.php";

if (!isset($_GET["category"])) {
    echo json_encode(null);
    exit;
}

$getData = $_GET["category"];

if($getData == "all"){

    $resultDao = allCategories();

    $data = array("ok" => "true", "msg" => $resultDao);

    echo json_encode($data);

}





?>