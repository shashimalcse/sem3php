<?php 
session_start();
?>
<?php
    //connect to database
        
    require_once 'vehicledatabase.php';
    $db = Database::getInstance();
    $conn = $db->getConnection(); 

        
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


            $sql = "INSERT INTO vehiclerenter ( username,firstName,lastName,address,lat,lng,email,mobile)
            VALUES ( '$user','$firstName', '$lastName','$address','$lat','$lng','$email','$mobile')";
            
            if ($conn->query($sql) === TRUE) {
                header('Location: Rental.php');
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                exit();
            }
            
            $conn->close();
        }
  
    ?>