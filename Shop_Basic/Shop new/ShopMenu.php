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


</head>

<body>


    <div class="topnav">
        <a href="ShopMenu.php">Home</a>
        <a href="searchByIndex">Edit Profile</a>
        <a href="contact.php">Contact</a>
        <a href="#about">About</a>
        <a  href="shopSearch.php">Search</a>
    </div>
    <div class=container2>
        <!-- <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Search"> -->
    

        <ul id="myMenu">
        <li><a href="#">My Shop</a></li>
        <li><a href="AddItem.php">Add new item</a></li>
        </ul>

    </div>

    <br><br>
    



</body>

</html>