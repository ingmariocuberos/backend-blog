<?php

include "../../model/DBConnection/DBConnection.php";

//Eliminar categoria

function deleteCategory($idCategory)
{
    $bd = DBConnection();
    try {

        $sentence = $bd->prepare("SELECT * FROM `Category` WHERE id_category = (?)");

        $sentence->execute([intval($idCategory)]);

        if(isset($sentence->fetchAll()[0])){
            
            $sentence = $bd->prepare("DELETE FROM `Category` WHERE id_category = (?)");             

            $sentence->execute([intval($idCategory)]);

            return true;

        } else {

            return false;

        }
        
    } catch (\Throwable $th) {
        echo $th;
    }
}