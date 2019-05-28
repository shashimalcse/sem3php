<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
              <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
          <style>
              body {font-family: Arial, Helvetica, sans-serif;
                  background-image: url(Hotel5.jpg);text-align:center;
                  background-size: cover
              }
              *{box-sizing: border-box}
              h2{
                  color:black;
              }
              .col-sm-4 {
                text-align:Center;
                border-radius: 5px;
                background-color: #f2f2f29c;
                padding: 20px;
                width: 35%;
                margin: auto
                
              }
                
          </style>
                      
                  
                          <title>Edit</title>
                  </head>
  <body>
 
      <?php 
          require 'HotelHeader.php';
      ?>
       <br><h2>Guiding Profiles</h2><br>
<?php

require_once 'dbaseOOD.php';

$con = Database::getInstance();
$sql = "SELECT * FROM dbhotel ORDER BY id ASC";
$query = $con -> connect -> prepare($sql);         
$query -> execute();   //prepared statements value         
$query -> setFetchMode(PDO::FETCH_ASSOC); // [PDO::FETCH_NUM for integer key value]

while ($row = $query->fetch()) {
?>

<div class="container">
<form method="POST" enctype="multipart/form-data"> 
<div class="row">
<div class="col-sm-4" style="background-color:rgba(255, 255, 255, .8);">
        <h4><?php echo $row['dbname'];?></h4><br>
        <img src="Hotels/<?php echo $row['dbimage']; ?>" width="150" height="150"><br>
        <label for="email"><b>E-mail Address :</b></label>
        <?php echo $row['dbemail']; ?><br>
        <label for="PhoneNumber"><b>Contact Number :</b></label>
        <?php echo $row['dbphone']; ?><br>
        <label for="details"><b>Description :</b></label>
        <?php echo $row['dbdetail']; ?><br>
</div>
    
  </form> 
       
</div>
<br>
	<?php
}

    ?>

</body>
</html> 