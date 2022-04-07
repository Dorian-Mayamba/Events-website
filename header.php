<?php


include "db/eventBooking.php";


?>

<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="style/style.css"/>
</head>
<body>
    <nav id="navBar">
        <ul>
            <li><a href="index.php" id="home">Home</a></li>
            <li><a href="Events.php" id="Events">Events</a></li>
            <li><a href="register.php" id="register">Sign up</a></li>
            <li><a href="login.php" id="log">Sign In</a></li>
        </ul>
    </nav>

<script>
    const changeBackground=(id)=>{
        
        var a = document.getElementById(id);
        a.classList.toggle('text-primary');
        a.style.background='aliceblue';
    }
</script>


</body>
</html>