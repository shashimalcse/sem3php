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
