<?php

//Obtener el tipo de usuario

function gettingType($email){
    $bd = DBConnection();
    try {
        $sentence = $bd->prepare("SELECT email, usertype
                                    FROM `Users`
                                    WHERE email = (?)");        
        
        $sentence->execute([$email]);

        return $sentence->fetchAll();
    } catch (\Throwable $th) {
        echo $th;
    }
}