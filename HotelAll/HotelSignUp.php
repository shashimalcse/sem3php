<!DOCTYPE html>
<html>
    <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
              <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        
            <style>
             
            body {font-family: Arial, Helvetica, sans-serif;
            background-image: url(Hotel5.jpg);
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
           
            input[type=submit] {
              background-color: rgb(11, 17, 94);
              color: white;
              padding: 5px 1px;
              border: none;
              border-radius: 2px;
              cursor: pointer;
            }
            
            input[type=submit]:hover {
              background-color: #220969;
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
            .container{
                text-align:justify;
                border-radius: 5px;
                background-color: #f2f2f29c;
                padding: 20px;
                width: 35%;
                margin: auto
                
              }
            
            </style>
        </head>
<body>
<?php 
    require 'HotelHeader.php';
?>
    <br><h2>Hotel Sign Up</h2><br>
   <form  class="container" action ="HotelSignUpConnect.php" method="POST" enctype="multipart/form-data"> 
  
            <label for="Image"><b>Image :</b></label><br>
            <input type="file" name="image" id = "gImage" accept="image/*" required><br><br>
            <div id = "image-holder" class="image-holder" style="display:none;"></div>
            
            <label for="FullName"><b>Hotel Name :</b></label><br>
            <input type="text" name="gFullName" required><br>
          
            <label for="email"><b>E-mail Address :</b></label><br>
            <input type="email" name="gEmail" required><br>
            
            <label for="PhoneNumber"><b>Contact Number :</b></label><br>
            <input type="tel" name="gPhoneNumber" required><br>
            
            <label for="details"><b>Description :</b></label><br>
            <textarea id="details" name="gDetails" rows="3" placeholder="Write Description..."required></textarea><br>

            <br><br><button type="submit" name='Submit' class="btn btn-primary btn-lg">SUBMIT</button>
  </form> 
        
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
                      "style": "width:15%",
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
