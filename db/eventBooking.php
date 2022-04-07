<?php

include "connectDb.php";

session_start();
$error='';
$logout='';
if(isset($_SESSION['name'])){
    $logout="Log out";
    if(isset($_GET['logout'])){
        session_destroy();
        header('Location:logout.php');
    }
}
if(isset($_GET['id'])&&isset($_SESSION['name'])){
    $id = $_GET['id'];
    $name=$_SESSION['name'];
    $bookingId=uniqid($name);
    try{
        $query = $db->prepare("SELECT name FROM events WHERE id=$id");
        $query->execute();
        while($data=$query->fetch(PDO::FETCH_OBJ)){
            $insert=$db->prepare("INSERT INTO booking (bookingId,name,id,studentname) VALUES('$bookingId','$data->name','$id','$name')");
            $insert->execute();
            echo "Your have succesfully booked this event";
            break;
        }
        
    }catch(PDOException $ex){
        echo "An error has occured ".$ex->getMessage();
    }

}
if(isset($_GET['id'])&&!isset($_SESSION['name'])){
    $error= "you're not connected you will be redirected to the login page";
    echo $error;
    header('Location:../login.php');
}


?>