<?php
include "header.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/logout.css">
    <title>Logout</title>
</head>
<body onload="redirectTo('login')">
    <div class="text-center container-fluid">
        <h1 class="text-success">You have successfully logged out</h1>
    </div>
</body>

<script>
    function redirectTo(path){
        setTimeout(()=>{
            window.location.href=path+".php";
        },3000)
    }
</script>
</html>