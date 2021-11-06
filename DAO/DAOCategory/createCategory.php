<?php

include "../../model/DBConnection/DBConnection.php";

//Crear Categoria

function createCategory($category)
{
    $bd = DBConnection();
    try {
        $sentence = $bd->prepare("INSERT INTO Category(cat_name) VALUES (?)");
        $sentence->execute([$category->getCategoryName()]);
        $data = array("ok" => "true", "msg" => "Categoria creada con exito");
        return $data;
    } catch (\Throwable $th) {
        echo $th;
    }
}