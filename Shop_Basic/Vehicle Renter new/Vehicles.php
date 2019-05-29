<head>

<style>
    body {font-family: Arial, Helvetica, sans-serif;
        background-image: url("https://wallpaperplay.com/walls/full/5/3/c/195358.jpg");
        background-size: cover
    }
    *{box-sizing: border-box}
    .container2 {
    text-align:justify;
    border-radius: 5px;
    padding: 20px;
    }
    table {
        margin: 8px;
        }

    th {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 15px;
    background: #800080;
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
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="VehicleMenuStyle.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <title>Search</title>
</head>
<body>
<div class="topnav">
    <a href="VehicleMenu.php">Home</a>
    <a href="contact.php">Contact</a>
    <a href="#about">About</a>
    <a  href="vehicleSearch.php">Search</a>
</div>
<div class=container2>
    <!-- <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Search"> -->


    <ul id="myMenu">
    <li><a href="Vehicles.php">My Vehicle Shop</a></li>
    <li><a href="AddVehicle.php">Add new vehicle</a></li>
    </ul>

</div>

<br><br>



<div class="container2">
    <form method="POST" action="Vehicles.php" >
        <input type="submit" name="search" value="My Vehicles">
    </form>
</div>

<?php
require_once 'database.php';
$db = Database::getInstance();
$conn = $db->getConnection(); 
$output='';
if(isset($_POST['search'])){
$query = mysqli_query($conn,"SELECT * FROM vehicles") or die(mysqli_error($conn));
$count = mysqli_num_rows($query);
if($count == "0"){
    echo '<h2>You do not have any vehicles!</h2>';
}else{
    echo "<table border='1';>
    <tr>
    <th>ID</th>
    <th>Username</th>
    <th>Model</th>
    <th>Details</th>

    </tr>";
    while($row = mysqli_fetch_array($query)){
        echo "<tr>";
        echo "<td>" . $row['vehicleID'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['model'] . "</td>";
        // echo "<td>" .'<img src="data:image/jpeg;base64,'.base64_encode(  $row['vehicleownerphoto']  ).'"/>'. "</td>";
        // echo "<td>" . $row['shopownerphoto'] . "</td>";
        echo "<td>" . $row['details'] . "</td>";
        // 
        echo "</tr>";
        }
        echo "</table>";
    }
echo $output;
}
?>
</body>
</html>

<?php mysqli_close($conn);?>
