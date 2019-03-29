<?php 
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hotel Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>

<body>

    <?php
   
    
    //$user = $_REQUEST['username'];
    //$_SESSION['user'] = $user;
    $user= $_SESSION['user'];
    
    echo"<h2>WELCOME $user</h2>";
    
    ?>

    <br><br>
    <a href='AddHotel.php' target="_blank">Add Hotel</a>



</body>

</html>