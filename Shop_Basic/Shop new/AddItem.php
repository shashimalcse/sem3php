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
    <link href="ShopMenu.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- <script type="text/javascript" src="ErrorHandle.js"></script> -->


</head>

<body>


    <div class="topnav">
        <a href="ShopMenu.php">Home</a>
        <a href="searchByIndex.php">Edit Profile</a>
        <a href="contact.php">Contact</a>
        <a href="#about">About</a>
        <a  href="shopSearch.php">Search</a>
    </div>
    <div class="container">
        <div class="text-center">
            <h3>Add an item</h3>
            <br><br>
        </div>

    <div align="center">
        <div class="container2">
            <form   name="Add" action = "item.php"  method="POST" enctype="multipart/form-data" >
			<fieldset>

        
            <label for="ItemNumber"><b>Item Number</b></label><br>
            <input type="text" placeholder="Enter Item Number" name="ItemNumber"><br><br>

            <label for="type"><b>Type</b></label><br>
            <input type="type" placeholder="Enter Type" name="type"><br><br>

            <label for="quantity"><b>Quantity</b></label><br>
            <input type="quantity" placeholder="Enter Quantity" name="quantity"><br><br>

            <input id="submit" type="submit" name="submit" value="Submit" class="btn btn-success" >


    <br><br>
    



</body>

</html>