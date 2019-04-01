<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" media="screen" href="AddVehicle.css">
</head>

<body>

    <?php
        
        

        //conncet to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "database_1";
        $current_user = "fsfd";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
                die("Connection failed: " . mysqli_connect_errno() ." ". mysqli_connect_error());
                }
        
        $sql = "SELECT * FROM vehicles";
        $result = mysqli_query($conn,$sql);
        $directory_arry=array();
        //$arry2 = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                
                if($current_user==$row["username"]){
                    echo "<h2>"."id: " . $row["vehicleID"]. " - username: " . $row["username"]. "  model- " . $row["model"]."  ____vehicleType- " . $row["vehicleType"]. $row["details"]."</h1>"."<br>";
                    $directory = 'files/'.$current_user.'/'.$row["vehicleID"].$row["model"].'/';
                    array_push($directory_arry,$directory);
                }
                
            }

            
        } else {
            echo "0 results";
        }


        
        
        
        
        

        
        $doc = new DOMDocument();
        $domElement = $doc->createElement('div');

        $domAttribute = $doc->createAttribute('class');
        $domAttribute->value = 'image-holder';
        $domElement-> appendChild($domAttribute);

        $domAttribute = $doc->createAttribute('style');
        $domAttribute->value = 'width:80%; margin-top: 5%;
        margin-left: 10%;
        margin-right: 10%;
        margin-bottom: 5%;';
        $domElement-> appendChild($domAttribute);

        $doc->appendChild($domElement);
        //we need remove function     
        //use this to create new buttons <href>
        //link them with images of the vehicle.
        //using 
        foreach ($directory_arry as $path ) {
            
            $files = scandir($path);
            $img_files = array_slice($files, 2);
            
            foreach($img_files as $file) {
                $image_path = $path.$file;
                
        
                $domImg = $doc->createElement('img');
                $domAttribute = $doc->createAttribute('src');
                $domAttribute->value = $image_path;
                $domImg-> appendChild($domAttribute);

                $domAttribute = $doc->createAttribute('class');
                $domAttribute->value = "thumb-image";
                $domImg-> appendChild($domAttribute);

                $domAttribute = $doc->createAttribute('style');
                $domAttribute->value = "width:32%";
                $domImg-> appendChild($domAttribute);

                $domElement->appendChild($domImg);
        
                
              }
              echo $doc->saveHTML(); 
            
        }
        
       
        
        //$arry = mysqli_fetch_all ($result,$result_type=MYSQLI_ASSOC);
        //can get the whole array at once
        //print_r($arry);
        
       
        

    ?>
</body>

</html>