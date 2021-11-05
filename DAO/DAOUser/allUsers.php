<?php

include "../../model/DBConnection/DBConnection.php";

//Consultar todos los usuarios

function allUsers()
{
    $bd = DBConnection();
    try {
        $sentence = $bd->prepare("SELECT id_user, name, email, phone, usertype, creationDate, updateDate
                                    FROM `Users`");        
        
        $sentence->execute();

        return $sentence->fetchAll();
    } catch (\Throwable $th) {
        echo $th;
    }
}