<?php

include "../../model/DBConnection/DBConnection.php";

//Consultar todos los usuarios

function updatePost($id, $post)
{
    $bd = DBConnection();
    try {

        $sentence = $bd->prepare("SELECT * FROM `Posts` WHERE id_post = (?)");

        $sentence->execute([intval($id)]);

        if(isset($sentence->fetchAll()[0])){
            
            $sentence = $bd->prepare("UPDATE Posts SET id_category=(?), id_user=(?), title=(?), 
                                        slug=(?), shortText=(?), bigText=(?), image=(?), creationDate=(?),
                                        updateDate=(?) WHERE id_post=(?)");             

            $sentence->execute([intval($post->getCategory()), 
                                intval($post->getUser()), 
                                $post->getTitle(), 
                                $post->getSlug(), 
                                $post->getShortText(),
                                $post->getBigText(),
                                $post->getUrlImage(),
                                $post->getCreationDate(),
                                $post->getUpdateDate(),
                                intval($id)]);

            return true;

        } else {

            return false;

        }
        
    } catch (\Throwable $th) {
        echo $th;
    }
}