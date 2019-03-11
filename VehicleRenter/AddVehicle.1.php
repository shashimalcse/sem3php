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
    <!-- <script src="main.js"></script> -->
</head>
<body>

    <form method = "post" enctype="multipart/form-data" >
        Select Vehicle Type :  

        <select name="vehicleType" id="vehicleType" >
            <option value="Car">Car</option>
            <option value="Van">Van</option>
            <option value="SUV">SUV</option>
            <option value="Cab">Cab</option>
            <option value="Bike">Bike</option>
            <option value="Bus">Bus</option>
        </select>
            <br>
            <br>
        Enter Vehicle Model : <br>
        <input type="text" name="model" id="model" required>
            <br>
            <br>
        Upload Image :
        <input type="file" name= "image[]" id="image" accept = "image/*" multiple="true" required>
        
            <br>
            <br>
        More Details:
            <br>
        <textarea name="vehicleDetails" id="vehicleDetails" rows="4" cols="80" maxlength="1000" placeholder="Do not exceed more than 1000 characters"></textarea>
            <br>
        <input type="submit" name="insert" id="insert" value="Submit" />
        
    </form>
    
    <?php
    //////////////////

        //$user= $_SESSION['user'];
        $user='fsfd';
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

        
        if(isset($_POST['vehicleType'])){
            $vehicleType = $_POST['vehicleType'];
            $model = $_POST['model'];
            $vehicleDetails = $_POST['vehicleDetails'];
            $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $image_name = addslashes($_FILES['image']['name']);
            $image_size = getimagesize($_FILES['image']['tmp_name']);

            $sql = "INSERT INTO vehicles (username,details, model, vehicleType,image)
            VALUES ('$user','$vehicleDetails', '$model', '$vehicleType','$image')";
            
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