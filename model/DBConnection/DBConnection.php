<?php

    function DBConnection()
    {

        include ('env.php');
        try {
            $password = $MYSQL_PASSWORD;
            $user = $MYSQL_USER;
            $dbName = $MYSQL_DATABASE_NAME;
            $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);
            $database->query("set names utf8;");
            $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            return $database;
        } catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
            echo "La linea del error es " . $e->getLine();
        }   
        
    }

?>