<?php

include_once "cors.php";
include "../../JWTValidate.php";
include "../../model/PostModel.php";
include "../../DAO/DAOPosts/createPost.php";

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

if($JWTCheck==null){
    $resultDao = createPost($post);

    echo json_encode($resultDao);
} else {

    $data = array("ok" => "false", "msg" => "Expired");

    echo json_encode($data);

}



?>