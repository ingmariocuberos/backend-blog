<?php

function isAdmin($getCredentials){

    $resultDao = gettingType($getCredentials->email);

    if(isset($resultDao[0])){

        if($resultDao[0]->usertype == "admin"){

            return true;
        } else {

            return false;
        }
    
    }

}





