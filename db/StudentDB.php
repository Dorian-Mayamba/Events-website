<?php

    include "connectDb.php";
    
    if(isset($_GET['data'])){
        $select=$db->prepare("SELECT * FROM students");
        $select->execute();
        $data=$select->fetchAll();
        foreach($data as $d){
            echo json_encode($d);
        }
    }
    
    if(file_get_contents("php://input")){
        $requestPayload=file_get_contents("php://input");
        $users=json_decode($requestPayload);
        $name=$users->name;
        $email=$users->email;
        $telephone=$users->telephone;
        $password=password_hash($users->password,PASSWORD_BCRYPT);
        try{
            $select = $db->prepare("SELECT * FROM students");
            $select->execute();
            while($data=$select->fetch(PDO::FETCH_OBJ)){
                if($name==$data->name||$email==$data->email||$telephone==$data->number||password_verify($password,$data->password)){
                    echo ("An error has occured This user is already registered");
                    break;
                }else{
                    $name=$db->quote($name);
                    $email=$db->quote($email);
                    $password=$db->quote($password);
                    $telephone=$db->quote($telephone);
                    $insertion = $db->prepare("INSERT INTO students (name,email,number,password) VALUES($name,$email,$telephone,$password)");
            $insertion->execute();
            echo "You have successfully registered,you will be redirected to the login page";
            break;
                }
            }
            
        }catch(PDOException $ex){
            echo nl2br("An error has occured \n".$ex->getMessage()."\n");
        }
    }
?>