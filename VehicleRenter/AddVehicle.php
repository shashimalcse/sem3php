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
        <input type="file" name= "userfile[]" id="image" accept = "image/*" multiple="" required>
        
            <br>
            <br>
        More Details:
            <br>
        <textarea name="vehicleDetails" id="vehicleDetails" rows="4" cols="80" maxlength="1000" placeholder="Do not exceed more than 1000 characters"></textarea>
            <br>
        <input type="submit" name="insert" id="insert" value="Submit" />

        
        
    </form>
    
    <?php
        
        //$user= $_SESSION['user'];
        //echo $user;
        $user= 'fsfd';
        
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
            //re arranging the array
            $file_array = reArrayFiles($_FILES['userfile']);


            $sql = "INSERT INTO vehicles (username,details, model, vehicleType)
            VALUES ('$user','$vehicleDetails', '$model', '$vehicleType')";

            
            if ($conn->query($sql) === TRUE) {
                //get last id of inserted data
                $last_id = $conn->insert_id;
                //addding images to database

                for($i=0;$i<count($file_array);$i++){
            
                    if(!$file_array[$i]['error']){
                        //directory for images
                        $directoryName = 'files/'.$user.'/'.$last_id.$model.'/';
                        if(!is_dir($directoryName)){
                            //Directory does not exist, so lets create it.
                            mkdir($directoryName, 0755, true);
                        }

                        move_uploaded_file($file_array[$i]['tmp_name'],$directoryName.$file_array[$i]['name']);
                        $imageName = $file_array[$i]['name'];
                        $sql = "INSERT INTO vehicleimages (vehicleID,username,imageName)
                        VALUES ('$last_id','$user','$imageName')";
                        if ($conn->query($sql) === TRUE){
                            echo ("image added"); 
                        }else{
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                        
                    }
                }

                





                echo "New record created successfully. Last inserted ID is: " . $last_id;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            $conn->close();
        }


            

            
            
            
        
        function reArrayFiles($file_post){
            $file_ary= array();
            $file_count = count($file_post['name']);
            $file_keys = array_keys($file_post);
    
            for($i=0; $i<$file_count; $i++){
                foreach($file_keys as $key){
                    $file_ary[$i][$key]= $file_post[$key][$i];
                }
            }
    
            return $file_ary;
        }
       
        

        
        

    ?>
</body>
</html>