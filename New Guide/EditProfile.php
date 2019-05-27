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
              input[type=email],select, textarea {
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
                background-color:green;
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
                background-color: #3e8e41;
                }
              .col-sm-6{
                align:center;
                text-align:center;
                border-radius: 5px;
                background-color: #f2f2f29c;
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
          require 'Header.php';
      ?>
     
  <br><h2>Edit Profile</h2><br>
  <div class="container2">
      <form class="form-group" action ="EditProfile.php" method="POST" enctype="multipart/form-data">
        <label for="email"><b>Enter User Email :</b></label><br>
        <input type="email" name="gEmail" required><br>
        <br>
        <div class="btn-group">
            <button type="submit" name="EditGuide">Edit</button>
            <button type="submit" name="DeleteGuide">Delete</button>
        </div>
      </form>
  </div><br><br>
  <?php
 
 if(isset($_POST['DeleteGuide'])){
    require 'dbase.php';
    $email = $_POST['gEmail'];
    $count=$connect->prepare("DELETE FROM dbguide WHERE dbemail=:mail");
    $count->bindParam(":mail",$email);
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
 if(isset($_POST['EditGuide'])){
   $email = $_POST['gEmail'];
		include('dbase.php');
		$result = $connect->prepare("SELECT * FROM dbguide WHERE dbemail <= :email");
		$result->execute([':email' => $email]);
		$row = $result->fetch()
	?>
	<div class="container">
   <form method="POST" enctype="multipart/form-data"> 
  <div class="row">
    <div class="col-sm-6" style="background-color:rgba(255, 255, 255, .3);">
            <label for="FullName"><b>Full Name :</b></label>
            <?php echo $row['dbname']; ?><br>
            <label for="email"><b>E-mail Address :</b></label>
            <?php echo $row['dbemail']; ?><br>
            <label for="PhoneNumber"><b>Phone Number :</b></label>
            <?php echo $row['dbphone']; ?><br>
    </div>
    <div class="col-sm-6" style="background-color:rgba(255, 255, 255, .3);">
            <label for="time"><b>Maximum days per tour :</b></label>
            <?php echo $row['dbtime']; ?><br>
            <label for="Price"><b>Price per day(in LKR) :</b></label>
            <?php echo $row['dbprice']; ?><br>
            <label for="bio"><b>Bio :</b></label>
            <?php echo $row['dbbio']; ?><br>
            <button><a href="editGuide.php?id=<?php echo $row['id']; ?>" role = "button"> edit </a></button>
  </div>
  </form> 
       
</div>
	<?php
 }	
	?>
</tbody>
</table>
</body>
</html> 