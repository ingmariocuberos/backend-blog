<?php

include "../../model/DBConnection/DBConnection.php";

//Consultar todos los usuarios

function deleteUser($idUser)
{
    $bd = DBConnection();
    try {

        $sentence = $bd->prepare("SELECT * FROM `Users` WHERE id_user = (?)");

        $sentence->execute([intval($idUser)]);

        if(isset($sentence->fetchAll()[0])){
            
            $sentence = $bd->prepare("DELETE FROM `Users` WHERE id_user = (?)");             

            $sentence->execute([intval($idUser)]);

            return true;

        } else {

            return false;

        }
        
    } catch (\Throwable $th) {
        echo $th;
    }
}