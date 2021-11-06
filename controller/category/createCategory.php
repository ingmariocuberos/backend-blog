<?php

include_once "cors.php";
include "../../model/CategoryModel.php";
include "../../DAO/DAOCategory/createCategory.php";

if (!isset($_GET["category"])) {
    echo json_encode(null);
    exit;
}

$getData = $_GET["category"];

$category = new CategoryModel($getData);

$resultDao = createCategory($category);

$data = array("ok" => "true", "msg" => $resultDao);

echo json_encode($data);

?>