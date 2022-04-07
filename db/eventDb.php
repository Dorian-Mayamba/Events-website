<?php

header('Content-Type:application/json; charset=uft-8');

include "connectDb.php";





function fetchData()
{
    try {
        $db = new PDO('mysql:host=localhost:3306;dbname=u_200141600;charset=utf8', 'u-200141600', 'f1m8nlGUd4Aqwap');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $ex) {
        echo "error " . $ex->getMessage();
    }


        $all = $db->prepare("SELECT * FROM events");
        $all->execute();




        $events = $all->fetchAll(PDO::FETCH_ASSOC);
       
    
}


$events = isset($_GET['events']) ? $_GET['events'] : '';
if (!empty($events)) {
    fetchData();
}

