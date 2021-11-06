<?php

include_once "cors.php";
include "../../DAO/DAOCategory/deleteCategory.php";

if (!isset($_GET["idCategory"])) {
    echo json_encode(null);
    exit;
}

$getData = $_GET["idCategory"];

$resultDao = deleteCategory($getData);

if($resultDao){

    $data = array("ok" => "true", "msg" => "Categoria eliminado con éxito");

    echo json_encode($data);

} else {

    $data = array("ok" => "false", "msg" => "La categoria no pudo ser eliminada");

    echo json_encode($data);
}
