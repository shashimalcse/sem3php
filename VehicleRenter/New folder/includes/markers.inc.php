<?php
if(isset($_POST['marker-submit'])){
  require 'dbh.inc.php';

$shopname=$_POST['shopname'];
$shopaddress=$_POST['shopaddress'];
$shoplat=$_POST['shopLatitude'];
$shoplng=$_POST['shopLongitude'];
$shopcat=$_POST['shopcategory'];
if(empty($shopname) || empty($shopaddress) || empty($shoplat) || empty($shoplng) || empty($shopcat)){
    header("Location: ../markers.php?error=emptyfields");
    exit();
}
{
  $sql="INSERT INTO markers (name,address,lat,lng,type) VALUES (?,?,?,?,?)";
  $stmt=mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("Location: ../markers.php?error=sqlerror");
    exit();
  }
  else{
    mysqli_stmt_bind_param($stmt,"sssss",$shopname,$shopaddress,$shoplat,$shoplng,$shopcat);
    mysqli_stmt_execute($stmt);
    header("Location: ../markers.php?result=success");
    exit();


  }
}

}
?>
