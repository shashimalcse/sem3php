<?php
$user = $_POST['user'];

function getData($user)
{
    include 'dB.php';
    //$sql = "SELECT * FROM vehiclerenter";
    $sql = "SELECT * FROM vehicles";
    $result = mysqli_query($conn,$sql);

    $details = array();
    // $directory_arry=array();
    // $vehicle_arry=array();
    // $json_arry= array();
    while($row = mysqli_fetch_array($result)){
        
        if($user==$row["username"]){
            //echo "<h2>"."id: " . $row["vehicleID"]. " - username: " . $row["username"]. "  model- " . $row["model"]."  ____vehicleType- " . $row["vehicleType"]. $row["details"]."</h1>"."<br>";
            //$directory = 'files/'.$current_user.'/'.$row["vehicleID"]."_".$row["model"].'/';
            //added new folder vehicles to user folder
            $directory = '../files/'.$user.'/Vehicles/'.$row["vehicleID"]."_".$row["model"].'/';
            $files = scandir($directory);
            $img_files = array_slice($files, 2);
            
            // array_push($directory_arry,$directory);
            // array_push($vehicle_arry,$row["model"]);

            $details[] = array(

                'type'=>$row["vehicleType"],
                'directory' => $directory,
                'files'=>$img_files,
                'details' => $row["details"],//can pass anything
                'model'=> $row["model"],
                // 'properties'=>array(
                    
                // ),
                
                
            );
        }
    };
    // array_push($json_arry,$directory_arry);
    // array_push($json_arry,$vehicle_arry);
    return json_encode($details);
    //json objedct is returned.
};
echo(getData($user));
?>