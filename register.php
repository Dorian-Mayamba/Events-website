<?php

include 'header.php';
include 'db/StudentDB.php';




?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/register.css"/>
    <title>Sign up</title>
</head>
<body onload="changeBackground('register')">
   <div class="container-fluid text-center">
        <h1>Sign up below to book events</h1>
        <h3></h3>

            <form action="login.php" method="post">
                    <input type="text" name="name" id="name" placeholder="enter your name here:">
                    <label for="email">Enter your email here</label>
                    <input type="email" name="email" id="email" placeholder="your email:">
                    <label for="mailConfirm">Confirm your email</label>
                    <input type="email" name="confirmEmail" id="mailConfirm" placeholder="confirm your email:">
                    <label for="telephone">put your phone number here:</label>
                    <input type="tel" name="tel" id="telephone" placeholder="ex:01212333412">
                    <label for="password">Enter your password:</label>
                    <input type="password" name="password" id="password" placeholder="your password:">
                    <label for="passConfirm">Confirm your password:</label>
                    <input type="password" name="passConfirm" id="passConfirm" placeholder="confirm your password">
            </form>
            <button onclick="handleSubmit()">Sign up</button>
            




   <script type="text/javascript">
       var inputs = document.querySelectorAll('input');
       var labels = document.querySelectorAll('label');
       inputs.forEach((input)=>{
           input.classList.toggle('w-25');
           input.style.padding='2.5px 20px';
       })
       labels.forEach((label)=>{
           label.style.display='block';
           label.style.margin='10px 0px';
           label.classList.toggle('text-success');
       })


     
       
       const handleSubmit = ()=>{
           var container = document.querySelector(".container-fluid");
           var name = document.querySelector('#name');
           var email = document.querySelector('#email');
           var mailConfirm = document.querySelector('#mailConfirm');
           var telephone = document.querySelector('#telephone');
           var password = document.querySelector('#password');
           var passConfirm = document.querySelector("#passConfirm");
           if(email.value==''||password.value==''||telephone.value==''){
            var h3 = document.querySelector('h3');
            h3.textContent="An error has occured please make sure you do not leave any field empty";
            h3.className="text-danger";
           }else{
           if(email.value.match(/^[0-9]{9}@aston.ac.uk/)&&mailConfirm.value===email.value&&password.value.match(/^([A-Z]+[a-zA-Z0-9]+[_.ù%*µ#@+a-z0-9-]+)$|([a-z0-9]+[_.ù%*µ#ç@\w]+[A-Z]+[a-z0-9_.ù%*µ#ç@\wA-Z]*)$/)&&telephone.value.match(/^07[0-9]{9}$|^(07\s[0-9]+\s[0-9]+\s[0-9]{3})|^(07-[0-9]+-[0-9]+-[0-9]{3})/)&&password.value===passConfirm.value){
              var req = new XMLHttpRequest();
              var users = {
               name:name.value,
               email:email.value,
               password:password.value,
               telephone:telephone.value
           }
              req.onload=()=>{
                  if(req.responseText=="An error has occured This user is already registered"){
                   var h3 = document.querySelector('h3');
                   h3.textContent=req.responseText;
                   h3.className="text-danger";
                  }else{
                   var h3 = document.querySelector('h3');
                   h3.textContent=req.responseText;
                   h3.className="text-success";
                   setTimeout(()=>{
                       window.location.href="login.php";
                   },3000);
                }
                  
              }
              req.open('POST',"db/StudentDB.php",true);
              req.setRequestHeader('Content-Type','application/json');
              req.send(JSON.stringify(users));
           }else{
            var h3 = document.querySelector('h3');
            h3.textContent="An error has occured please make sure your password contains at least an Uppercase and a special character.The email should be an aston student email and the telephone should be an Uk number";
            h3.className="text-danger";
           }
        }
           
       }
   </script>
</body>
</html>