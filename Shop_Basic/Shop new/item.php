<?php 
session_start();
?>
<?php
  
  if(isset($_POST['submit'])){
    require_once 'database.php'; 
    $db = Database::getInstance();
    $conn = $db->getConnection(); 

 
    $itemnumber = $_POST['ItemNumber'];
    $type = $_POST['type'];
    $quantity = $_POST['quantity'];


    if(empty($itemnumber) || empty($type) || empty($quantity)  ){
     
      echo "empty";
      exit();
    }
    else{
      $sql = "INSERT INTO addshopitem (itemnumber, type, quantity) 
      VALUES ('$itemnumber', '$type', '$quantity')";
      if ($conn->query($sql) === TRUE) {
        header('Location: ShopMenu.php');
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
  
     mysqli_close($conn);
}
else{
  echo "error2";
exit();
}
?>


  
