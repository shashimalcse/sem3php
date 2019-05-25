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
  
        <title>Search</title>
   </head>
    <body>
    <div class="container2">
        <form method="POST" action="shopSearch.php" >
            <input type="text" name="query" placeholder="Type of shop">
            <input type="submit" name="search" value="Search">
        </form>
    </div>
    
<?php
require 'conct.php';
$output='';
if(isset($_POST['search'])){
    $q = $_POST['query'];
    $query = mysqli_query($conn,"SELECT * FROM shop_details WHERE shoptype LIKE '%$q%'") or die(mysqli_error($conn));
    $count = mysqli_num_rows($query);
    if($count == "0"){
        echo '<h2>No result found!</h2>';
    }else{
        echo "<table border='1';>
        <tr>
        <th>Owner</th>
        <th>Email</th>
        <th>Contact Number</th>
        <th>Photo</th>
        <th>Shop Name</th>
        <th>Shop Type</th>
        </tr>";
        while($row = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>" . $row['shopownername'] . "</td>";
            echo "<td>" . $row['shopemail'] . "</td>";
            echo "<td>" . $row['shopcontact'] . "</td>";
            echo "<td>" .'<img src="data:image/jpeg;base64,'.base64_encode(  $row['shopownerphoto']  ).'"/>'. "</td>";
            // echo "<td>" . $row['shopownerphoto'] . "</td>";
            echo "<td>" . $row['shopname'] . "</td>";
            echo "<td>" . $row['shoptype'] . "</td>";
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

