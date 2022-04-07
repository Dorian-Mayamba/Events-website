<?php

try{
    $db = new PDO('mysql:host=localhost:3306;dbname=u_200141600_db;','u-200141600','f1m8nlGUd4Aqwap');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $ex){
    echo "an error has occured ".$ex->getMessage();
}



?>