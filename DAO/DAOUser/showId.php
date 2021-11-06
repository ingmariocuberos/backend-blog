<?php

//Obtener el tipo de usuario

function showId($email){
    $bd = DBConnection();
    try {
        $sentence = $bd->prepare("SELECT id_user, name, usertype
                                    FROM `Users`
                                    WHERE email = (?)");        
        
        $sentence->execute([$email]);

        return $sentence->fetchAll();
    } catch (\Throwable $th) {
        echo $th;
    }
}