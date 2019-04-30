<?php 
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Vehicle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- <script src="main.js"></script> -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/AddVehicle.css">
</head>

<body>
    <nav class="navbar sticky-top navbar-dark bg-primary">
        <a class="navbar-brand" href="#!">Sticky top</a>
    </nav>

    <div class="wrapper">

        <form method="post" enctype="multipart/form-data">

            <div class="form-group">
            
                <label for="vehicleType">Select Vehicle Type : </label>
                <select name="vehicleType" id="vehicleType" class="custom-select">
                    <option selected>Choose one</option>
                    <option value="Car">Car</option>
                    <option value="Van">Van</option>
                    <option value="SUV">SUV</option>
                    <option value="Cab">Cab</option>
                    <option value="Bike">Bike</option>
                    <option value="Bus">Bus</option>
                </select>
            </div>

            <div class="form-group">
                <label for="model">Enter Vehicle Model : </label>
                <input type="text" class="form-control" name="model" id="model" required>
            </div>

            <div class="form-group">
                <label for="image">Upload Images : </label>
                <input type="file" name="userfile[]" id="image" accept="image/*" multiple="" required>
            </div>
            <div id="image-holder" class="image-holder" style="display: none;"></div>

            <div class="form-group">
                <label for="vehicleDetails">More Details: </label>
                <br>
                <textarea name="vehicleDetails" class="form-control" id="vehicleDetails" maxlength="1000"
                    placeholder="Do not exceed more than 1000 characters"></textarea>
                <br>
            </div>

            <div class="form-group">
                <input type="submit" name="insert" id="insert" value="Submit" class="btn btn-primary">
            </div>

        </form>
    </div>


    <script>
    $("#image").on('change', function() {

        //Get count of selected files
        var countFiles = $(this)[0].files.length;
        var image_holder = $("#image-holder");
        image_holder.empty();


        if (typeof(FileReader) != "undefined") {

            //loop for each file selected for uploaded.
            for (var i = 0; i < countFiles; i++) {

                var reader = new FileReader();
                reader.onload = function(e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image",
                        "style": "width:48%"
                    }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
            }

        } else {
            alert("This browser does not support FileReader.");
        }

    });
    </script>


    <?php
        include 'dB.php';
        $user= $_SESSION['user'];
        echo $user;
       // $user= 'fsfd';
        
        //conncet to database
        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $dbname = "database_1";

        // $conn = new mysqli($servername, $username, $password, $dbname);
        // // Check connection
        // if ($conn->connect_error) {
        //         die("Connection failed: " . $conn->connect_error);
        //         } 

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
                        
                        $directoryName = 'files/'.$user.'/Vehicles/'.$last_id."_".$model.'/';
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