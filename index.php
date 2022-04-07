<?php


include 'header.php';



?>


<!Doctype html>
<html lang="en">
<head>



    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/index.css"/>
    <title>Home</title>
</head>
<body onload="changeBackground('home')">
    <div class="container-fluid">
        <h1 class="welcome text-center">
            <small>Welcome to the aston uni event page</small>
        </h1>
    </div>

    <div class="container">
        <p class="description mx-auto w-50">
            In Aston university we like tourism a lot, indeed it's good to 
            welcome new people in our university.This is why we always organise events 
            by the Spring until the summer. We also organise events at the start of september to welcome 
            new Students who are starting their first year in university. There will be multiple categories for each event.
            For example a football event will be in the sport category, the drama will be in the entertainment event's 
            category.
        </p>

        <div class="row mx-auto w-50">
            <div class="col-sm-4">
                <h3 class="text-center">Sport events:</h3>
                <img class="w-100 h-75" src="image/sport_event.jpg" alt="sport_event">
                <a href="Events.php#sport" class="rounded-top rounded-bottom rounded-start rounded-end bg-primary text-center">Sport</a>
            </div>
            <div class="col-sm-4">
                <h3 class="text-center">Cultural:</h3>
                <img class="w-100 h-75" src="image/cultural_event.jpg" alt="cultural event"/>
                <a href="Events.php#culture" style="background:purple" class="rounded-top rounded-bottom rounded-start rounded-end  text-center">Cultural events</a>
            </div>

            <div class="col-sm-4">
                <h3 class="text-center">entertainment:</h3>
                <img class="w-100 h-75" src="image/entertainment.jpg" alt="entertainment event"/>
                <a href="Events.php#entertainment" style="background:cyan;color:red" class="rounded-top rounded-bottom rounded-start rounded-end  text-center">entertainment</a>
            </div>
        </div>
    </div>
</body>
</html>