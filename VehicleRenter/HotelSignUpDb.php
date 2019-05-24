<?php 
session_start();
?>
<?php
    include 'dB.php'; 
    
        if(isset($_POST['mobile'])){
            $user = $_POST['username'];
            $firstName= $_POST['firstName'];
            $lastName= $_POST['lastName'];
            $address = $_POST['address'];
            //$ lat, $lng;
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $_SESSION['user']= $user;
            $lat = $_POST['shopLatitude'];
            $lng = $_POST['shopLongitude'];
            //can be used to filter email
            //(filter_var($email, FILTER_VALIDATE_EMAIL))


            $sql = "INSERT INTO hotelmanager ( username,firstName,lastName,address,lat,lng,email,mobile)
            VALUES ( '$user','$firstName', '$lastName','$address','$lat','$lng','$email','$mobile')";
            
            if ($conn->query($sql) === TRUE) {
                header('Location: Hotel.php');
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                exit();
            }
            
            $conn->close();
        }
  
    ?>