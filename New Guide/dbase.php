<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testguide";

try{
  $connect = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
  $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo 'Database Connection Done';
}
catch(PDOException $error){
  $error->getMessage();
}

?>