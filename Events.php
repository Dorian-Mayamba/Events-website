<?php
include 'header.php';
include "db/loginDb.php";
include "db/eventBooking.php";

$name = isset($_SESSION['name']) ? $_SESSION['name'] :'';

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/Events.css">
    <title>Events</title>
</head>

<body>
    <div class="jumbotron text-center text-primary">
        <select name="choice" id="choice">
            <option value="Entertainment">Entertainment</option>
            <option value="Sport">Sport</option>
            <option value="Cultural">Culture</option>
        </select>

        <h1>Category</h1>
        <h2><small>Default</small></h2>

    </div>


    <div class="container-fluid text-center">
        <h3><small><?php echo !empty($name)?"Welcome ".$name:''; ?></small></h3>
        <a href="Events.php?logout=signout"><?php echo (empty($logout)) ? '' : $logout; ?></a>
        <div class="selection">
            <span>Sort by:</span>
            <select name="sort" id="sort">
                <option value="name">name</option>
                <option value="date">date</option>
            </select>
        </div>

       <div class="row w-75 mx-auto">
           <?php foreach($events as $event){?>
            <div class="col-sm-4">
                <h2>name:<small><?php $event['name']?></small></h2>
                <h3>date<small><?php echo $event['date']; ?></small></h3>
                <h3>time:<small><?php echo $event['time']; ?></small></h3>
                <img src="<?php echo $event['Image']; ?>" alt="<?php $event['name']; ?>"><br/><br/>
                <a href="Events.php?id=<?php echo $event['id'];?>" class="bg-primary" style="color:white">Book</a>
                <button>More Details</button>
                <button>like</button>
                <?php } ?>
            </div>
       </div>
       
    </div>



</body>
<script>
    
</script>

</html>