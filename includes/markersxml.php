<?php
require 'dbh.inc.php';
$dom =new DOMDocument("1.0");
$node= $dom->createElement("markers");
$parnode=$dom->appendChild($node);
$query="SELECT * FROM markers WHERE 1";
$result=mysqli_query($conn,$query);
if(!$result){
  die('Invalid query: ' .mysqli_error());
}
header("Content-type: text/xml");
while($row=@mysqli_fetch_assoc($result)){
  $node=$dom->createElement("marker");
  $newnode= $parnode->appendChild($node);

  $newnode->setAttribute("id",$row['id']);
  $newnode->setAttribute("name",$row['name']);
  $newnode->setAttribute("address",$row['address']);
  $newnode->setAttribute("lat",$row['lat']);
  $newnode->setAttribute("lng",$row['lng']);
  $newnode->setAttribute("type",$row['type']);
}
echo $dom->saveXML();
?>
