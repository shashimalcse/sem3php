<?php

//strategy is used here
ini_set('display_errors', 'On');
error_reporting(E_ALL);

class RetrieveData{
    private $Strategy;
    public function getData($user,$id)
    {
        return ($this->Strategy->getData($user,$id));
    }
    public function setStrategy($Str){
        $this->Strategy = $Str;
    }
}

Interface Strategy{
    public function getData($user,$id);    
}

Class VehicleData implements Strategy{
    public function getData($user,$id){
        include_once 'dB.php';
        $sql = "SELECT * FROM vehicles";
        $result = mysqli_query($conn,$sql);
        $details = array();
        while($row = mysqli_fetch_array($result)){
            
            if($user==$row["username"]){
                
                $directory = '../files/'.$user.'/Vehicles/'.$row["id"]."_".$row["model"].'/';
                $files = scandir($directory);
                $img_files = array_slice($files, 2);
                $details[] = array(

                    'type'=>$row["vehicleType"],
                    'directory' => $directory,
                    'files'=>$img_files,
                    'details' => $row["details"],
                    'model'=> $row["model"],
                    
                );
            }
        };
        
        return json_encode($details);
        }
}

Class HotelData implements Strategy{
    public function getData($user,$id){
        include_once 'dB.php';
        $sql = "SELECT * FROM hotel";
        $result = mysqli_query($conn,$sql);
        $details = array();
        while($row = mysqli_fetch_array($result)){
            
            if($id==$row["id"]){
                
                $directory = '../files/'.$user.'/Hotels/'.$row["id"]."_".$row["hotelName"].'/';
                $files = scandir($directory);
                $img_files = array_slice($files, 2);
                $details[] = array(
                    'owner'=> $user,
                    'hotelName'=> $row["hotelName"],
                    'rooms'=>$row["noRooms"],
                    'directory' => $directory,
                    'files'=>$img_files,
                    'price' => $row["price"],
                    'facilities'=> $row["facilities"],     
                );
            }
        };
        return json_encode($details);
    }
}


$user = $_POST['user'];
$title = $_POST['title'];
$id = $_POST['id'];

// $user = 'iam groot';
// $title = 'vehiclerenter';
// $id = '37';


$retrieveData = new RetrieveData();

switch ($title) {
    case 'vehiclerenter':
        $retrieveData->setStrategy(new VehicleData());
        break;
    
    case 'hotel':
        $retrieveData->setStrategy(new HotelData());
        break;
}


echo($retrieveData->getData($user,$id));



?>
