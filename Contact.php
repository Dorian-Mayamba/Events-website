<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include 'header.php';
require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";

$error=array('mail'=>'','name'=>'','lastName'=>'');
$errorMessage='';
$email=$name=$subject=$lastname='';
$success='';
$couldBeSent=false;
if(isset($_POST['sent'])){
    if(empty($_POST['name'])){
        $error['name']="Please input a name in the name field";
        $errorMessage=$error['name'];
    }else if(empty($_POST['lastname'])){
        $error['lastName']="please input a last name in the last name field";
        $errorMessage=$error['lastName'];
    }else if(empty($_POST['email'])){
        $error['mail']='Please input an email in the email field';
        $errorMessage=$error['mail'];
    }else{
        $email= htmlspecialchars($_POST['email']);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error['mail']='please input a valid email address';
            $errorMessage=$error['mail'];
        }else{
            $name=htmlspecialchars($_POST['name']);
            $email=htmlspecialchars($_POST['email']);
            $subject=htmlspecialchars($_POST['subject']);
            $lastname=htmlspecialchars($_POST['lastname']);
            $userDetail=$name." ".$lastname;
            $suggest=htmlspecialchars($_POST['suggestion']);
            $couldBeSent=sendMail($userDetail,$email,$subject,$suggest);
            if($couldBeSent){
                $success="mail sent";
            }
        }

    }
}
  function sendMail($name,$email,$subject,$comment){
    $mail=new PHPMailer(true);

      try{
          $mail->setLanguage('en','../PHPMailer/language/');
          $mail->SMTPDebug=0;
          $mail->isSMTP();
          $mail->Host='smtp.mailtrap.io';
          $mail->Port=587;
          $mail->SMTPAuth=true;
          $mail->AuthType='CRAM-MD5';
          $mail->Username="d9d51ee6134f6b";
          $mail->Password="a6a737ab8b687f";
          $mail->SMTPSecure="tls";
          $mail->setFrom($email,$name);
          $mail->addAddress("dorian.mayamba@gmail.com");
          $mail->addReplyTo($email,$name);
          $mail->isHTML(true);
          $mail->Subject=utf8_decode($subject);
          $mail->Body=utf8_decode($comment);
          $mail->AltBody=$comment;
          $mail->send();
          return true;
      }catch(Exception $e){
          echo "could not send the email ".$e->getMessage();
      }
  }



?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/Contact.css">
    <title>Contact</title>
</head>
<body onload="changeBackground('contact')">
    <div class="text-center container-fluid">
        <h1>Contact us</h1>
        <h3><?php echo (!empty($errorMessage)) ? $errorMessage: (!empty($success)?$success:''); ?></h3>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <input type="text" name="name" id="name" placeholder="input your name:">
            <input type="text" name="lastname" id="lastname" placeholder="your last name:">
            <input type="text" name="email" id="email" placeholder="input your email here:">
            <input type="text" name="subject" id="subject" placeholder="Subject:">
            <textarea class="w-25" name="suggestion" id="suggestion" cols="30" rows="10"></textarea>
            <input type="submit" name="sent" value="Send">
        </form>
    </div>
</body>
<script>
    var inputs = document.querySelectorAll('input');
    inputs.forEach((input)=>{
        input.classList.add('w-25');
        input.classList.add('mx-auto');
        input.classList.add('m-4');
        if(input.type=="submit"){
            input.classList.remove('w-25');
            input.style.width='7%';
        } 
        var h3=document.querySelector('h3');
        if(h3.textContent=="mail sent"){
            h3.className="text-success";
        }else{
            h3.className='text-danger';
        }
    })
   
</script>
</html>