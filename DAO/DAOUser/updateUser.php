<?php

include "../../model/DBConnection/DBConnection.php";

//Consultar todos los usuarios

function updateUser($id, $user)
{
    $bd = DBConnection();
    try {

        $sentence = $bd->prepare("SELECT * FROM `Users` WHERE id_user = (?)");

        $sentence->execute([intval($id)]);

        if(isset($sentence->fetchAll()[0])){
            
            $sentence = $bd->prepare("UPDATE Users SET name=(?), email=(?), phone=(?), usertype=(?), creationDate=(?), updateDate=(?) WHERE id_user=(?)");             

            $sentence->execute([$user->getName(), 
                                $user->getEmail(),  
                                $user->getPhone(), 
                                $user->getType(), 
                                $user->getCreationDate(),
                                $user->getUpdateDate(),
                                $id
                            ]);

            return true;

        } else {

            return false;

        }
        
    } catch (\Throwable $th) {
        echo $th;
    }
}