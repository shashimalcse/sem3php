<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name= "userfile[]" id="image" accept = "image/*" multiple="" required>
        <input type="submit" name="submit" value="Upload">
    </form>
    


    <?php 
    if(isset($_FILES['userfile'])){
        pre_r($_FILES);
        print_r($_FILES);
        $file_keys = array_keys($_FILES['userfile']);
        print_r($file_keys);
        $file_array = reArrayFiles($_FILES['userfile']);
        pre_r($file_array);

        for($i=0;$i<count($file_array);$i++){
            
            if(!$file_array[$i]['error']){
               // echo('files/'.$file_array[$i]['name']);
                move_uploaded_file($file_array[$i]['tmp_name'],'files/'.$file_array[$i]['name']);
                $insertValuesSQL .= "('".$file_array[$i]['name']."', NOW()),";
                echo('inserValue   ');
                echo($insertValuesSQL);
            }
        }
    }
    //FUNCTIONS FOR SORTING ETC.....
    function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '<pre>';
    }

    function reArrayFiles($file_post){
        $file_ary= array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for($i=0; $i<$file_count; $i++){
            foreach($file_keys as $key){
                $file_ary[$i][$key]= $file_post[$key][$i];
            }
        }

        return $file_ary;
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "database_1";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            } 
    
    ?>
</body>
</html>