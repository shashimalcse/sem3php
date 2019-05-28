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
                  color:white;
                  text align:center;
              }
              input[type=text],select, textarea {
              width: 100%;
              padding: 5px;
              border: 1px solid #ccc;
              border-radius: 3px;
              box-sizing: border-box;
              margin-top: 4px;
              margin-bottom: 6px;
              resize: vertical;
            }
              
              .btn-group button {
                background-color:blue;
                border: 1px solid black; 
                color: white; 
                padding: 10px 24px;
                cursor: pointer; 
                float: left; 
                }

                .btn-group button:not(:last-child) {
                border-right: none; 
                }

                .btn-group:after {
                content: "";
                clear: both;
                display: table;
                }

             
                .btn-group button:hover {
                background-color: darkblue;
                }
              .col-sm-6{
                align:center;
                text-align:center;
                border-radius: 5px;
                background-color: #f2f2f29c;
              }
              .col-sm-4 {
                text-align:Center;
                border-radius: 5px;
                background-color: #f2f2f29c;
                padding: 20px;
                width: 35%;
                margin: auto
                
              }
              .container2{
                text-align:justify;
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
     
  <br><h2>Edit Profile</h2><br>
  <div class="container2">
      <form class="form-group" action ="HotelEdit.php" method="POST" enctype="multipart/form-data">
        <label for="name"><b>Enter Hotel Name :</b></label><br>
        <input type="text" name="gName" required><br>
        <br>
        <div class="btn-group">
            <button type="submit" name="EditHotel">Edit</button>
            <button type="submit" name="DeleteHotel">Delete</button>
        </div>
      </form>
  </div><br><br>
  <?php
 
 if(isset($_POST['DeleteHotel'])){
    require_once 'dbaseOOD.php';
    $con = Database::getInstance();
    $hName = $_POST['gName'];
    $count=$con->connect->prepare("DELETE FROM dbhotel WHERE dbname=:hName");
    $count->bindParam(":hName",$hName);
    $result = $count->execute();
    if($result){
        // echo '<script>alert("Successfully Deleted!")</script>';
        echo '<div style="font-size:1.25em;color:white;font-weight:bold;">Successfully Deleted!</div>';
    }
    else{
        echo '<script>alert("OMG...Error!")</script>';
    }
 }
 ?>
 

<?php
 if(isset($_POST['EditHotel'])){
    $hName = $_POST['gName'];
        require_once 'dbaseOOD.php';
        $con = Database::getInstance();
        $result = $con ->connect->prepare("SELECT * FROM dbhotel WHERE dbname=:hName");
        $result->setFetchMode(PDO::FETCH_ASSOC);
		$result->execute([':hName' => $hName]);
		$row = $result->fetch()
	?>
	<div class="container">
   <form method="POST" enctype="multipart/form-data"> 
  <div class="row">
  <div class="col-sm-4" style="background-color:rgba(255, 255, 255, .8);">
        <h4><?php echo $row['dbname'];?></h4><br>
        <img src="Hotels/<?php echo $row['dbimage']; ?>" width="100" height="100"><br>
        <label for="email"><b>E-mail Address :</b></label>
        <?php echo $row['dbemail']; ?><br>
        <label for="PhoneNumber"><b>Contact Number :</b></label>
        <?php echo $row['dbphone']; ?><br>
        <label for="details"><b>Description :</b></label>
        <?php echo $row['dbdetail']; ?><br>
        <button class="btn btn-md"><a href="HotelEditProfile.php?id=<?php echo $row['id']; ?>" role = "button"> edit </a></button>
</div>
   
  </form> 
       
</div>
	<?php
 }	
	?>

</body>
</html> 