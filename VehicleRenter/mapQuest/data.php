<?php 
//template & strategy
$type=$_POST['type'];



class RetrieveGeoData{
    private $Strategy;
    public function getData(){
        return($this->Strategy->getData());
    }
    public function setStrategy($Strat){
        $this->Strategy = $Strat;
    }
}


abstract class GeoData{
    protected $type;
    public abstract function Data();
    
    public final function getData(){
        $result = $this->Data();
        return($this->fetch($result));
    }

    public function fetch($result){
        $details = array();
        while($row = mysqli_fetch_array($result)){
            $details[] = array(
    
                'type'=>"Feature",
                'properties'=>array(
                    'title' => ($this->type),
                    'id'=> $row["id"],
                    'name' => $row["username"],//can pass anything
                    
                ),
                'geometry'=>array(
                    'type'=>"Point",
                    'coordinates'=>[$row["lng"],$row["lat"]]
                )
                
            );
        };
    
        return json_encode($details);
    }

}

class VehicleGeoData extends GeoData{
    protected $type = 'vehiclerenter';
    public function Data(){
        include 'dB.php';
        $sql = "SELECT * FROM vehiclerenter";
        $result = mysqli_query($conn,$sql);
        return($result);
    }
}

class HotelGeoData extends GeoData{
    protected $type = 'hotel';
    public function Data(){
        include 'dB.php';
        $sql = "SELECT * FROM hotel";
        $result = mysqli_query($conn,$sql);
        return($result);
    }
}

$retrieveGeoData = new RetrieveGeoData();
switch ($type) {
    case 'vehiclerenter':
        $retrieveGeoData->setStrategy(new VehicleGeoData());
        break;
    
    case 'hotel':
        $retrieveGeoData->setStrategy(new HotelGeoData());
        break;
}
echo($retrieveGeoData->getData());
// function getData($type){

//     include 'dB.php';
//     //$sql = "SELECT * FROM vehiclerenter";
//     $sql = "SELECT * FROM $type";
//     $result = mysqli_query($conn,$sql);
//     $details = array();
    
//     while($row = mysqli_fetch_array($result)){
//         $details[] = array(

//             'type'=>"Feature",
//             'properties'=>array(
//                 'title' => $type,
//                 'name' => $row["username"],//can pass anything
                
//             ),
//             'geometry'=>array(
//                 'type'=>"Point",
//                 'coordinates'=>[$row["lng"],$row["lat"]]
//             )
            
//         );
//     };

//     return json_encode($details);
//     //json objedct is returned.
// }

// echo(getData($type));

?>