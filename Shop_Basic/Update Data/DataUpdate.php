<?php 

session_start();

$id= $_SESSION['id'];



// php code to Update data from mysql database Table
   
    if(isset($_POST['update'])){
        require_once 'database.php';
        $db = Database::getInstance();
        $conn = $db->getConnection(); 
    
        // get values form input text and number
    
        $shopownername = $_POST['shopownername'];
        $shopemail = $_POST['shopemail'];
        $shopcontact = $_POST['shopcontact'];
        $shopname = $_POST['shopname'];
                
        // mysql query to Update data
        $sql = "UPDATE shop_details SET shopownername='$shopownername',shopemail='$shopemail',shopemail= '$shopemail',shopname= '$shopname' WHERE ID = $id";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            echo 'Data Updated';
        }
        else{
            echo 'Data Not Updated';
        }
   mysqli_close($conn);
    }

?>
