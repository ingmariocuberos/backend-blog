<?php

include_once "cors.php";
include "../../JWTValidate.php";
include "../../model/PostModel.php";
include "../../DAO/DAOPosts/updatePost.php";

$getData = json_decode(file_get_contents("php://input"));

$JWTCheck="init";

try {
    $JWTCheck = Auth::Check($getData->token);
} catch (\Throwable $th) {
    
}

$post = new PostModel($getData->category, 
                        $getData->user, 
                        $getData->title, 
                        $getData->slug, 
                        $getData->shortText,
                        $getData->bigText,
                        $getData->urlImage,
                        $getData->creationDate,
                        $getData->updateDate);

$resultDao = updatePost($getData->id, $post);

if($resultDao){

    $data = array("ok" => "true", "msg" => "Registro actualizado con éxito");

    echo json_encode($data);

} else if($JWTCheck!=null){

    $data = array("ok" => "false", "msg" => "Expired");

    echo json_encode($data);

} else {

    $data = array("ok" => "false", "msg" => "El registro no pudo ser actualizado");

    echo json_encode($data);
}