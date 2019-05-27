<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit View</title>
  <!-- <meta charset="utf-8"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
            body {font-family: Arial, Helvetica, sans-serif;
            background-image: url(background3.jpg);
            text-align:justify;box-sizing: border-box
             }
             h2{
                 text-align:center;
             }
            
            input[type=text], input[type=tel],input[type=email],input[type=number],select, textarea {
              width: 100%;
              padding: 5px;
              border: 1px solid #ccc;
              border-radius: 3px;
              box-sizing: border-box;
              margin-top: 4px;
              margin-bottom: 6px;
              resize: vertical;
            }
           
           
            input[type=time], select, textarea {
              border: 1px solid #ccc;
              border-radius: 3px;
              box-sizing: border-box;
              margin-top: 4px;
              margin-bottom: 6px;
              resize: vertical;
            }
            input[type=submit] {
              background-color: rgb(0,0,128);
              color: white;
              padding: 5px 1px;
              border: none;
              border-radius: 2px;
              cursor: pointer;
            }
            
            input[type=submit]:hover {
              background-color: rgb(0,0,128);
            }
            .imgcontainer {
              text-align: center;
              margin: 24px 0 12px 0;
              position: relative;
            }   

            img.avatar {
              width: 30%;
              border-radius: 40%;
            }
            /* .container {
              text-align:justify;
              border-radius: 5px;
              background-color: #f2f2f29c;
              padding: 20px;
              width: 35%;
              margin: auto
              
            } */
            
            </style>
</head>
<body>
<?php 
 require 'Header.php';
 include('dbase.php');
 $id = $_GET['id'];
 $result = $connect->prepare("SELECT * FROM dbguide WHERE id= :userid");
 $result->bindParam(':userid', $id);
 $result->execute();
 $row = $result->fetch();
?>
<div class="container">
   <br><br><h2>Edit Profile</h2><br> 
   <form action ="Update.inc.php" method="POST" enctype="multipart/form-data"> 
  <div class="row">
  
    <div class="col-sm-6" style="background-color:rgba(255, 255, 255, .3);">
            <label for="Image"><b>Image :</b></label><br>
            <input type="file" name="gImage" id = "gImage" accept="image/*" required><br><br>
            <div id = "image-holder" class="image-holder" style="display:none;"></div>
            
            <label for="FullName"><b>Full Name :</b></label><br>
            <input type="text" name="gFullName" value="<?php echo $row['dbname']; ?>" required><br>
          
            <label for="email"><b>E-mail Address :</b></label><br>
            <input type="email" name="gEmail" value="<?php echo $row['dbemail']; ?>" required><br>
            <br><br><button type="submit" name="update" class="btn btn-primary btn-lg">UPDATE</button>
    </div>
    <div class="col-sm-6" style="background-color:rgba(255, 255, 255, .3);">
            <label for="PhoneNumber"><b>Phone Number :</b></label><br>
            <input type="tel" name="gPhoneNumber" value="<?php echo $row['dbphone']; ?>" required><br>

            <label for="time"><b>Maximum days per tour :</b></label><br>
            <select name="gTime" value="<?php echo $row['dbtime']; ?>">
              <option value=1>1 day</option>
              <option value=2>2 days</option>
              <option value=3>3 days</option>
              <option value=4>more days</option>
            </select><br>

            <label for="Price"><b>Price per day(in LKR) :</b></label><br>
            <input type="number" name="gPrice" value="<?php echo $row['dbprice']; ?>" required><br>
            
            <label for="bio"><b>Bio :</b></label><br>
            <input type="text" id="bio" name="gBio" value="<?php echo $row['dbbio']; ?>" rows="3" required><br>
    </div>
        
  </div>
  </form> 
       
</div>

</body>
</html>
<script>
        $("#gImage").on('change', function() {
            //Get count of selected files
            var countFiles = $(this)[0].files.length;
            var image_holder = $("#image-holder");
            image_holder.empty();
            if (typeof(FileReader) != "undefined") {
                //loop for each file selected for uploaded.
                for (var i = 0; i < countFiles; i++) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("<img />", {
                            "src": e.target.result,
                            "class": "thumb-image",
                            "style": "width:30%"
                        }).appendTo(image_holder);
                    }
                    image_holder.show();
                    reader.readAsDataURL($(this)[0].files[i]);
                }
            } else {
                alert("This browser does not support FileReader.");
            }
        });
</script>
