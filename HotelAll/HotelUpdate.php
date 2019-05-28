<?php
  
  if(isset($_POST['update'])){
    require_once 'dbaseOOD.php';
    $con = Database::getInstance();
    
    $folder ="Hotels/"; 
    $image = $_FILES['image']['name']; 
    $path = $folder . $image ; 
    $target_file=$folder.basename($_FILES["image"]["name"]);
    $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
    $allowed=array('jpeg','png' ,'jpg'); $filename=$_FILES['image']['name']; 
    $ext=pathinfo($filename, PATHINFO_EXTENSION); if(!in_array($ext,$allowed) ) 
    { 
    echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
    }
    $name = $_POST['gFullName'];
    $email = $_POST['gEmail'];
    $phone = $_POST['gPhoneNumber'];
    $details = $_POST['gDetails'];
   

    if(empty($image) || empty($email) || empty($name) || empty($phone) || empty($details) ){
      echo '<script>alert("Empty!")</script>';
      exit();
    } 

    else{
        move_uploaded_file( $_FILES['image'] ['tmp_name'], $path); 
        $pdoQuery="UPDATE dbhotel SET dbemail=:gemail,dbimage=:gimage,dbphone=:gphone,dbdetail=:gdetails WHERE dbname=:gname";
        $pdoResult = $con->connect->prepare($pdoQuery);
        $pdoExec = $pdoResult->execute(array(":gname"=>$name,":gimage"=>$image,":gemail"=>$email,":gphone"=>$phone,":gdetails"=>$details));
        
        if($pdoExec){
          echo '<script>alert("Successful!")</script>';
        }
        else{
          echo '<script>alert("OMG...Error!")</script>';
        }
        
         }
         header("location: HotelsView.php");
 
 }
  
  
  ?>    