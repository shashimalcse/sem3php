<?php
  if(isset($_POST['submit'])){
    require 'dbase.php';
    $photo = $_POST['Image'];
    $name = $_POST['FullName'];
    $email = $_POST['email'];
    $phone = $_POST['PhoneNumber'];
    $languages = $_POST['list[]'];
    $time = $_POST['time'];
    $bio = $_POST['bio'];

    if(empty($photo) || empty($email) || empty($name) || empty($phone) || empty($languages) || empty($time) || empty($bio) ){
      header("Location: ../GuideDetails.html?error=emptyfields&name=".$name."&email=".$email);
      echo "string";
      exit();
  }

  else{
    $sql="INSERT INTO guide_details (image,name,email,phonenumber,languages,time,bio) VALUES (?,?,?,?,?,?,?)";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      header("Location: ../GuideDetails.html?error=sqlerror");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt,"sssssss",$photo,$name,$email,$phone,$languages,$time,$bio);
      mysqli_stmt_execute($stmt);
      header("Location: ../Next.html");
      exit();
    }
  }
}
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
}
else{
header("Location: ../GuideDetails.html");
exit();
}
?>
    

