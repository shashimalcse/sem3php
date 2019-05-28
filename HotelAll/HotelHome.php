<!DOCTYPE html>
<html>
    <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <style>
            body {
            background-image: url(Hotel3.jpg);
            text-align:center;box-sizing: border-box
             }
             h1{
                 text-align:center;
                 font-family: "Times New Roman", Times, serif;
             }
             .parent {position: relative;}
            .child {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                width: 50%;
                height: 30%;
                margin: auto;
            }
             
             </style>
    </head>
    <?php 
          require 'HotelHeader.php';
      ?>
    <body>
    <div class="parent">
        <div class="child"><br><br><br><h1>WELCOME TO LAS VEGAS</h1></div>
    </div>
     
    </body>
</html>