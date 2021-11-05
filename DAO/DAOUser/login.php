<?php

include "../../model/DBConnection/DBConnection.php";

//Login - Logueo de Usuario

function login($email)
{
    $bd = DBConnection();
    try {
        $sentence = $bd->prepare("SELECT email, password
                                    FROM `Users`
                                    WHERE email=(?)");        
        
        $sentence->execute([$email]);

        return $sentence->fetchAll();
    } catch (\Throwable $th) {
        echo $th;
    }
}
