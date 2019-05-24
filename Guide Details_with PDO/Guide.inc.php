<?php
  
  if(isset($_POST['gsignup-submit'])){
    require 'dbase.php';
   
    $photo = addslashes(file_get_contents($_FILES['gImage']['tmp_name']));
    $name = $_POST['gFullName'];
    $email = $_POST['gEmail'];
    $phone = $_POST['gPhoneNumber'];
    $price = $_POST['gPrice'];
    $time = $_POST['gTime'];
    $bio = $_POST['gBio'];
   

    if(empty($photo) || empty($email) || empty($name) || empty($phone) || empty($price) || empty($time) || empty($bio) ){
      echo '<script>alert("Empty!")</script>';
      exit();
    } 

    else{
      $pdoQuery="INSERT INTO dbguide (dbname,dbimage,dbemail,dbphone,dbtime,dbprice,dbbio) VALUES (:gname,:gimage,:gemail,:gphone,:gtime,:gprice,:gbio)";
      $pdoResult = $connect->prepare($pdoQuery);
      $pdoExec = $pdoResult->execute(array(":gname"=>$name,":gimage"=>$photo,":gemail"=>$email,":gphone"=>$phone,":gtime"=>$time,":gprice"=>$price,":gbio"=>$bio));
      if($pdoExec){
        echo '<script>alert("Successful!")</script>';
      }
      else{
        echo '<script>alert("OMG...Error!")</script>';
      }
      
       }
 
  }
  
  ?>

    

