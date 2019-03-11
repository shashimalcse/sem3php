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
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>

<form method = "post" enctype="multipart/form-data" >
        No of Rooms:
        <input type="number" name="noRooms" id= "noRooms" required>
            <br>
            <br>
        
        No of Beds per Room:
        <input type="number" name="noBeds" id= "noBeds" required>
            <br>
            <br>
        Price :
            
        <input type="number" name="price"id="price" min="0.01" step="0.01" value="25.67" />$
            <br>
            <br>
        Upload Images :
        <input type="file" name= "image" id="image" accept = "image/*" required>
        
            <br>
            <br>
        More Details:
            <br>
        <textarea name="hotelDetails" id="hotelDetails" rows="4" cols="80" maxlength="1000" placeholder="Do not exceed more than 1000 characters"></textarea>
            <br>
        <input type="submit" name="insert" id="insert" value="Submit" />
        
    </form>
    
    <?php
        
        $user= $_SESSION['user'];
        echo $user;
        
    //conncet to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "database_1";

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                } 

        
        if(isset($_POST['hotelDetails'])){
            $noRooms = $_POST['noRooms'];
            $noBeds = $_POST['noBeds'];
            $price = $_POST['price']; 
            $hotelDetails = $_POST['hotelDetails']; 
            
            $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $image_name = addslashes($_FILES['image']['name']);
            $image_size = getimagesize($_FILES['image']['tmp_name']);

            $sql = "INSERT INTO hotels (username,noRooms, noBeds, price,facilities,image)
            VALUES ('$user','$noRooms', '$noBeds', '$price','$hotelDetails','$image')";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            $conn->close();
        }
       
        

        
        

    ?>
</body>
</html>