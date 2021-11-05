<?php

include "../../model/DBConnection/DBConnection.php";

//Register - Crear Usuario

function register($user)
{
    $bd = DBConnection();
    try {
        $sentence = $bd->prepare("INSERT INTO Users(name, email, password, phone, usertype, creationDate, updateDate) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $sentence->execute([$user->getName(), 
                            $user->getEmail(), 
                            $user->getPassword(), 
                            $user->getPhone(), 
                            $user->getType(), 
                            $user->getCreationDate(),
                            $user->getUpdateDate(),
                        ]);
        $data = array("ok" => "true", "token" => "alsdfhasdlfhaoifrhwekfsd");
        return $data;
    } catch (\Throwable $th) {
        echo $th;
    }
}