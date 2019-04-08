<?php 
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/AddHotel.css">
</head>

<body>
    <nav class="navbar sticky-top navbar-dark bg-primary">
        <a class="navbar-brand" href="#!">Sticky top</a>
    </nav>
    

    <div class="wrapper">

        <form method="post" enctype="multipart/form-data">
        <div class="form-group">
                <label for="hotelName">Hotel Name : </label>
                <input type="text" class="form-control" name="hotelName" id="hotelName" required>
            </div>
        

            <div class="form-group">
                <label for="model">No of Rooms: </label>
                <input type="number" class="form-control" name="noRooms" id="noRooms" required>
            </div>
            <div class="form-group">
                No of Beds per Room:
                <input type="number" class="form-control" name="noBeds" id="noBeds" required>
            </div>
            <div class="form-group">
                Price in Rs :

                <input type="number" class="form-control" name="price" id="price" min="0.00" step="100"
                    value="00.00" />
            </div>
            <div class="form-group">
                <label for="image">Upload Images : </label>
                <input type="file" name="userfile[]" id="image" accept="image/*" multiple="" required>
            </div>
            <div id="image-holder" class="image-holder" style="display: none;">
            </div>

            <div class="form-group">
                <label for="hotelDetails">More Details: </label>
                <br>
                <textarea name="hotelDetails" class="form-control" id="hotelDetails" maxlength="1000"
                    placeholder="Do not exceed more than 1000 characters"></textarea>
                <br>
            </div>

            <div class="form-group">
                <input type="submit" name="insert" id="insert" value="Submit" class="btn btn-primary">
            </div>
            
        </form>
    </div>
    


    <?php
        include 'dB.php';
        $user= $_SESSION['user'];
        echo $user;
        
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

        
        if(isset($_POST['hotelDetails'])){
            $hotelName= $_POST['hotelName'];
            $noRooms = $_POST['noRooms'];
            $noBeds = $_POST['noBeds'];
            $price = $_POST['price']; 
            $hotelDetails = $_POST['hotelDetails']; 
            $file_array = reArrayFiles($_FILES['userfile']);
            // $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
            // $image_name = addslashes($_FILES['image']['name']);
            // $image_size = getimagesize($_FILES['image']['tmp_name']);

            $sql = "INSERT INTO hotel (username,hotelName,noRooms, noBeds, price,facilities)
            VALUES ('$user','$hotelName','$noRooms', '$noBeds', '$price','$hotelDetails')";
            //there was some errrors in database table hotels????
            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id;
                for($i=0;$i<count($file_array);$i++){
            
                    if(!$file_array[$i]['error']){
                        //directory for images
                        
                        $directoryName = 'files/'.$user.'/Hotels/'.$last_id."_".$hotelName.'/';
                        if(!is_dir($directoryName)){
                            //Directory does not exist, so lets create it.
                            mkdir($directoryName, 0755, true);
                        }

                        move_uploaded_file($file_array[$i]['tmp_name'],$directoryName.$file_array[$i]['name']);
                        echo("yes");
                        //$imageName = $file_array[$i]['name'];
                        //if want to add to databse uncomment these and edit
                        // $sql = "INSERT INTO hotels (vehicleID,username,imageName)
                        // VALUES ('$last_id','$user','$imageName')";
                        // if ($conn->query($sql) === TRUE){
                        //     echo ("image added"); 
                        // }else{
                        //     echo "Error: " . $sql . "<br>" . $conn->error;
                        // }
                        
                    }
                }
                
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
    <script src="js/AddHotel.js"></script>
</body>

</html>