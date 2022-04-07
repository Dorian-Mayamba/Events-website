<?php

include 'header.php';
include "db/loginDb.php";


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/login.css" />
    <title>Login</title>
</head>

<body onload="changeBackground('log')">
    <h1 class="text-center">log here in order to book event</h1>
    <div class="container-fluid text-center">
        <h3></h3>
        <form action="" method="post">
            <input type="text" name="userInfo" id="userInfo" placeholder="enter your email or telephone number:">
            </br><br />
            <input type="password" name="password" id="password" placeholder="your password:" />
            </br></br>
        </form>
        <button onclick="handleConnect()" type="submit">Login</button>
    </div>







    <script type="text/javascript">
        var inputs = document.querySelectorAll('input');
        inputs.forEach((input) => {
            input.classList.toggle('w-25');
        })

        function handleConnect() {
            var numberOrEmail = document.querySelector('#userInfo').value;
            var password = document.querySelector('#password').value;
            var accounts = {
                userInfo: numberOrEmail,
                password: password
            };
            var req = new XMLHttpRequest();
            req.onload = () => {
                if (req.responseText == "Please fill all the fields below" || req.responseText == "An error has occured Password or username incorrect") {
                    var h3 = document.querySelector('h3');
                    h3.textContent = req.responseText;
                    h3.className = "text-danger";
                } else {
                    var h3 = document.querySelector('h3');
                    h3.textContent = req.responseText;
                    h3.className = 'text-success';
                    setTimeout(() => {
                        window.location.href = "Events.php";
                    }, 3000);
                }
            }
            req.open("POST", "db/loginDb.php", true);
            req.setRequestHeader('Content-Type', 'application/json');
            req.send(JSON.stringify(accounts));
        }
    </script>
</body>

</html>