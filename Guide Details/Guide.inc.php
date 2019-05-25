<?php
  
  if(isset($_POST['gsignup-submit'])){
    require 'dbase.php';
    // $photo = $_POST['gImage'];
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
      $sql="INSERT INTO dbguide (dbname,dbimage,dbemail,dbphone,dbtime,dbprice,dbbio) VALUES (?,?,?,?,?,?,?)";
      $stmt=mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "error1";
        exit();
      }
      else{
        mysqli_stmt_bind_param($stmt,"sssssss",$name,$photo,$email,$phone,$time,$price,$bio);
        mysqli_stmt_execute($stmt);
        echo '<script>alert("Successful!")</script>';
        exit();}
      }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
  }
  else{
  echo "error2";
  exit();
  }
  ?>

    

