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
                text-align:justify;
                border-radius: 5px;
                background-color: #f2f2f29c;
                padding: 20px;
                width: 35%;
                margin: auto
                
              }
            table {
                  margin: auto;
                  }
  
                  th {
                  font-family: Arial, Helvetica, sans-serif;
                  font-size: 15px;
                  background:  rgb(11, 17, 94);
                  text-align:center;
                  color: #FFF;
                  padding: 2px 6px;
                  border: 1px solid black;
                  border-collapse: separate;
                  border: 1px solid #000;
                  }
  
                  td {
                  font-family: Arial, Helvetica, sans-serif;
                  font-size: 15px;
                  border: 1px solid black;
                  height: 50px;
                  padding: 15px;
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
  //Fetch data from Mysql in PHP using PDO - PHP Data object
  $host = "localhost";
  $username = "root";
  $password = "";
  $database = "testguide";

  try{
  $connect = new PDO("mysql:host=$host;dbname=$database",$username,$password);
  $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $price = $_POST['gPrice'];
  $time = $_POST['gTime'];
  //echo 'Database Connection Done';
  $query = "SELECT * FROM dbguide";
  $data = $connect->query($query);
  
  $statement = $connect->prepare("SELECT * FROM dbguide WHERE dbprice <= :price AND dbtime >= :t");
  $statement->execute([':price' => $price, ':t' => $time]);
  
  echo '<table width="100%" border="1" cellpadding="5" cellspacing="5">
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Time Avaiable</th>
            <th>Price Per Day</th>
            <th>Bio</th>
          </tr>';
  foreach($statement as $row)
  {
    
    echo '<tr>
            <td>'.$row['dbname'].'</td>
            <td>'.$row['dbemail'].'</td>
            <td>'.$row['dbphone'].'</td>
            <td>'.$row['dbtime'].'</td>
            <td>'.$row['dbprice'].'</td>
            <td>'.$row['dbbio'].'</td>
            </tr>';
  }
    echo '</table>';

  }
  catch(PDOException $error){
    $error->getMessage();
  }
}
?>
</form>
</div><br><br>
</body>
</html>
