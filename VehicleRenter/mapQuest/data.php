<?php 
$type=$_POST['type'];

function getData($type){

    include 'dB.php';
    //$sql = "SELECT * FROM vehiclerenter";
    $sql = "SELECT * FROM $type";
    $result = mysqli_query($conn,$sql);
    $details = array();
    
    while($row = mysqli_fetch_array($result)){
        $details[] = array(

            'type'=>"Feature",
            'properties'=>array(
                'title' => $type,
                'name' => $row["username"],//can pass anything
                'first'=> "dsad"
            ),
            'geometry'=>array(
                'type'=>"Point",
                'coordinates'=>[$row["lng"],$row["lat"]]
            )
            
        );
    };

    return json_encode($details);
    //json objedct is returned.
}

echo(getData($type));

//writing to file renter.json
// $fileName= 'renter.json';
// if(file_put_contents($fileName,getData())){
//     echo("nice");
// }
?>