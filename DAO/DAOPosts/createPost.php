<?php

include "../../model/DBConnection/DBConnection.php";

//Crear Post

function createPost($post)
{
    $bd = DBConnection();
    try {
        $sentence = $bd->prepare("INSERT INTO Posts(id_category, id_user, title, slug, 
                                    shortText, bigText, image, creationDate, updateDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sentence->execute([intval($post->getCategory()), 
                            intval($post->getUser()), 
                            $post->getTitle(), 
                            $post->getSlug(), 
                            $post->getShortText(),
                            $post->getBigText(),
                            $post->getUrlImage(),
                            $post->getCreationDate(),
                            $post->getUpdateDate()]);
        $data = array("ok" => "true", "msg" => "Post creado con exito");
        return $data;
    } catch (\Throwable $th) {
        echo $th;
    }
}