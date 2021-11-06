<?php

include "../../model/DBConnection/DBConnection.php";

//Eliminar post

function deletePost($idPost)
{
    $bd = DBConnection();
    try {

        $sentence = $bd->prepare("SELECT * FROM `Posts` WHERE id_post = (?)");

        $sentence->execute([intval($idPost)]);

        if(isset($sentence->fetchAll()[0])){
            
            $sentence = $bd->prepare("DELETE FROM `Posts` WHERE id_post = (?)");             

            $sentence->execute([intval($idPost)]);

            return true;

        } else {

            return false;

        }
        
    } catch (\Throwable $th) {
        echo $th;
    }
}