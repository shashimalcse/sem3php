<?php
$servername = "localhost";
$username = "root";
// $password = "password";
$dbname = "testguide";
$conn=mysqli_connect($servername,$username,$dbname);
if(!$conn){
  die("Connection failed: ".mysqli_connect_error());
}
/
$conn->close();

?>