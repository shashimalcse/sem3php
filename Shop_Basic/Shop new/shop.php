<?php 
session_start();
?>
<?php
  
  if(isset($_POST['submit'])){
    require_once 'database.php';
    $db = Database::getInstance();
    $conn = $db->getConnection(); 

    $photo = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $name = $_POST['UserName'];
    $email = $_POST['email'];
    $contact = $_POST['number'];
    $shopname = $_POST['ShopName'];
    $type = $_POST['type'];
    /*$shopaddress = $_POST['shopaddress'];
    $shoplatitude = $_POST['shoplatitude'];
    $shoplongitude = $_POST['shoplongitude'];*/
    if(empty($photo) || empty($email) || empty($name) || empty($contact) || empty($shopname)  || empty($type) ){
     
      echo "empty";
      exit();
    }
    else{
      $sql = "INSERT INTO shop_details (shopownername, shopemail, shopcontact, shopname, shopownerphoto, shoptype) 
      VALUES ('$name', '$email', '$contact', '$shopname', '$photo', '$type')";
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


  
