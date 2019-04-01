<?php 
function getData(){
    include 'dB.php';
    $sql = "SELECT * FROM vehiclerenter";
    $result = mysqli_query($conn,$sql);
    $renterDetails = array();
    
    while($row = mysqli_fetch_array($result)){
        $renterDetails[] = array(

            'type'=>"Feature",
            'properties'=>array(
                'title' => "renter",
                'name' => $row["username"]//can pass anything
                
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

echo(getData());

//writing to file renter.json
// $fileName= 'renter.json';
// if(file_put_contents($fileName,getData())){
//     echo("nice");
// }
?>