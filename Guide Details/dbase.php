<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testguide";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
  die("Connection failed: ".mysqli_connect_error());
}
// else{
//     echo "Connected";
// }
// try{
//   $connect = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
//   $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo 'Database Connection Done';
// }
// catch(PDOException $error){
//   $error->getMessage();
// }

?>