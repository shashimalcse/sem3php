<?php
$servername="localhost";
$dBUsername="root";
$dBPassword="1234Shashi@";
$dBName="testdbforsem3";
$conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
if(!$conn){
  die("Connection failed: ".mysqli_connect_error());
}
?>
