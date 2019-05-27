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
                  background-image: url(Guide4.jpg);text-align:center;
                  background-size: cover
              }
              *{box-sizing: border-box}
              h2{
                  color:white;
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
          require 'Header.php';
      ?>
       <br><h2>Guiding Profiles</h2><br>
<?php
include('dbase.php');
$result = $connect->prepare("SELECT * FROM dbguide ORDER BY id ASC");
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
?>

<div class="container">
<form method="POST" enctype="multipart/form-data"> 
<div class="row">
<div class="col-sm-4" style="background-color:rgba(255, 255, 255, .5);">
        <label for="FullName"><b>Full Name :</b></label>
        <?php echo $row['dbname']; ?><br>
        <label for="email"><b>E-mail Address :</b></label>
        <?php echo $row['dbemail']; ?><br>
        <label for="PhoneNumber"><b>Phone Number :</b></label>
        <?php echo $row['dbphone']; ?><br>
        <label for="time"><b>Maximum days per tour :</b></label>
        <?php echo $row['dbtime']; ?><br>
        <label for="Price"><b>Price per day(in LKR) :</b></label>
        <?php echo $row['dbprice']; ?><br>
        <label for="bio"><b>Bio :</b></label>
        <?php echo $row['dbbio']; ?><br>
</div>
    
  </form> 
       
</div>
<br>
	<?php
}
    ?>

</body>
</html> 