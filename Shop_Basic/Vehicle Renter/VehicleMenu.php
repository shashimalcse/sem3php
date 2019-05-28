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
    <link href="RenterStyle.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="ErrorHandle.js"></script>
    
    
</head>
<body>
        
    <div class="topnav">
        <a><div>
            <form method="POST" action="VehicleMenu.php" >
                <!-- <input type="submit" name="search" value="Home"> -->
                <button type="button">Home</button>
            </form>
        </div></a>

        <!-- <a href="#profile">Profile</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
        <a>
            <form method="POST" action="vehicleSearch.php" >
                <input type="submit" name="searchRenter" value="Search">
            </form>
        </a> -->
    </div>
    <!-- <?php
        // $user= $_SESSION['user']; 
        // echo"<h4>WELCOME $user</h4>"; 
        // ?> -->
    <div class=container2>
        <!-- <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Search"> -->


        <ul id="myMenu">
        <li><a             <form method="POST" action="Profile.php" >
                <input type="submit" name="profile" value="Profile">
            </form></a></li>
        <li><a             <form method="POST" action="AddVehicle.php" >
                <input type="submit" name="add" value="Add Vehicle">
            </form></a></li>
        </ul>

    </div>

    <br><br>
        

</body>
</html>