<?php 
$type=$_POST['type'];

function getData($type){

    include 'dB.php';
    //$sql = "SELECT * FROM vehiclerenter";
    $sql = "SELECT * FROM $type";
    $result = mysqli_query($conn,$sql);
    $renterDetails = array();
    
    while($row = mysqli_fetch_array($result)){
        $renterDetails[] = array(

            'type'=>"Feature",
            'properties'=>array(
                'title' => "renter",
                'name' => $row["username"],//can pass anything
                'first'=> "dsad"
            ),
            'geometry'=>array(
                'type'=>"Point",
                'coordinates'=>[$row["lng"],$row["lat"]]
            )
            
        );
    };

    return json_encode($renterDetails);
    //json objedct is returned.
}

echo(getData($type));

//writing to file renter.json
// $fileName= 'renter.json';
// if(file_put_contents($fileName,getData())){
//     echo("nice");
// }
?>