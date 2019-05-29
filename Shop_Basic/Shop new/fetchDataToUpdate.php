<?php
session_start();
?>
<!DOCTYPE html>

<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="ShopMenu.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <title> MY SHOP PROFILE </title>
    </head>
    <body>
        <?php
        require_once 'database.php';
        $db = Database::getInstance();
        $conn = $db->getConnection(); 
        if(isset($_POST['submit'])){
            $id = $_POST['id'];
            $_SESSION['id']= $id;
            $query = mysqli_query($conn,"SELECT * FROM shop_details WHERE ID LIKE '%$id%'") or die(mysqli_error($conn));
            $row = mysqli_fetch_array($query); 
           
        // else{
        //     echo "error";
        //     exit();
        // }
            echo'<div align="center">
                    <div class=container>
                    <h2> MY SHOP PROFILE</h2>
                    </div>

                <form action="DataUpdate.php" method="post">
                <div class=container2>
                    <label for="shopownername"><b>Shop Owner Name:</b></label><br>
                    <input type="text" name="shopownername" value="'. $row ['shopownername'].'" required><br><br>
                    
                    <label for="shopemail"><b>Shop Email:</b></label><br>
                    <input type="text" name="shopemail" value="'. $row ['shopemail'].'" required><br><br>
                    
                    <label for="shopcontact"><b>Shop Contact:</b></label><br>
                    <input type="text" name="shopcontact" value="'. $row ['shopcontact'].'" required><br><br>
                    
                    <label for="shopname"><b>Shop Name:</b></label><br>
                    <input type="text" name="shopname" value="'. $row ['shopname'].'" required><br><br>
                    
                    <input type="submit" name="update" value="Update Data">
                </div>
                </div>

            </form>';
           
            
        }
        mysqli_close($conn);
        ?>
     

    </body>
   
</html>
