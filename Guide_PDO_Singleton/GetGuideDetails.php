<html>
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
              <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
          <style>
            body {font-family: Arial, Helvetica, sans-serif;
                  background-image: url(Guide3.jpg);text-align:center;
                  background-size: cover
              }
            .container{
                text-align:center;
                border-radius: 5px;
                background-color: #f2f2f29c;
                padding: 20px;
                width: 35%;
                margin: auto
                
              }
            
          </style> 
          <title>Show Details</title>
          </head>
  <body>
  <?php 
 require 'Header.php';
  ?>
  <br><h2>Available Profiles</h2><br>
  <div>
      <form class="form-group" action ="GetGuideDetails.php" method="POST" enctype="multipart/form-data">
<?php
 
if(isset($_POST['Search_Guide'])){
  
  require_once 'dbaseOOD.php';
  $con = Database::getInstance();
  $price = $_POST['gPrice'];
  $time = $_POST['gTime'];
  
  $statement = $con->connect->prepare("SELECT * FROM dbguide WHERE dbprice <= :price AND dbtime >= :t");
  $statement->setFetchMode(PDO::FETCH_ASSOC);
  $statement->execute([':price' => $price, ':t' => $time]);
while($row=$statement->fetch()){
 
   ?> 
   
<div class="container">
<form method="POST" enctype="multipart/form-data">
        <img src="Uploads/<?php echo $row['dbimage']; ?>" width="100" height="100"><br>
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
  </form> 
       
</div>
<br>
	<?php
  }
}

?>
</form>
</div><br><br>
</body>
</html>
