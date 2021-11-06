<?php

include "../../model/DBConnection/DBConnection.php";

//Consultar todas las categorias

function allCategories()
{
    $bd = DBConnection();
    try {
        $sentence = $bd->prepare("SELECT id_category, cat_name
                                    FROM `Category`");        
        
        $sentence->execute();

        return $sentence->fetchAll();
    } catch (\Throwable $th) {
        echo $th;
    }
}