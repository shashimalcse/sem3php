<?php
  if(isset($_POST['gsignup-submit'])){
    require 'dbh.inc.php';
    $gphoto = $_POST['gimage'];
    $gfullname = $_POST['gfullname'];
    $gemail = $_POST['gemail'];
    $gphone = $_POST['gphonenumber'];
    $gtime = $_POST['gtime'];
    $gbio = $_POST['gbio'];
    if(empty($gphoto) || empty($gemail) || empty($gfullname) || empty($gphone) || empty($gtime) || empty($gbio) ){
     echo "empty";
      exit();
  }
  else{
    $sql="INSERT INTO guidedetails (gphoto,gname,gemail,gphonenumber,gtime,gbio) VALUES (?,?,?,?,?,?)";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      echo "error1";
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt,"ssssss",$gphoto,$gfullname,$gemail,$gphone,$gtime,$gbio);
      mysqli_stmt_execute($stmt);
      echo "successful!";
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
