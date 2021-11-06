<?php

include "../../model/DBConnection/DBConnection.php";

//Consultar todos los posts

function allPosts()
{
    $bd = DBConnection();
    try {
        $sentence = $bd->prepare("SELECT *
                                    FROM `Posts`");        
        
        $sentence->execute();

        return $sentence->fetchAll();
    } catch (\Throwable $th) {
        echo $th;
    }
}