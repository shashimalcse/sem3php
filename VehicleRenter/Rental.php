<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
</head>
<body>
    
    <?php
   
    
    //$user = $_REQUEST['username'];
    //$_SESSION['user'] = $user;
    $user= $_SESSION['user'];
    
    echo"<h2>WELCOME $user</h2>";
    
    ?>
    
    <br><br>
    <a href='AddVehicle.php'target="_blank">Add new vehicle</a>
    
    

</body>
</html>