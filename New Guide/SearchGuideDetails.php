<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
              <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
          <style>
              body {font-family: Arial, Helvetica, sans-serif;
                  background-image: url(Guide1.jpg);text-align:center;
                  background-size: cover
              }
              *{box-sizing: border-box}
              /* .container2 {
              text-align:justify;
              border-radius: 5px;
              padding: 20px;
              } */
              input[type=submit] {
              background-color: rgb(11, 17, 94);
              color: white;
              padding: 4px 15px;
              border: none;
              border-radius: 3px;
              cursor: pointer;
              }
  
              input[type=submit]:hover {
              background-color: #220969;
              }
              .imgcontainer {
              text-align: right;
              margin: 24px 0 12px 0;
              position: relative;
              }   
              img.avatar {
              width: 30%;
              border-radius: 30%;
              }
              .container2{
                text-align:justify;
                border-radius: 5px;
                background-color: #f2f2f29c;
                padding: 20px;
                width: 35%;
                margin: auto
                
              }
              .column {
                  float: left;
                  width: 50%;
                  top:10px;
              }
  
              
              table {
                  margin: auto;
                  }
  
                  th {
                  font-family: Arial, Helvetica, sans-serif;
                  font-size: 15px;
                  background:  rgb(11, 17, 94);
                  text-align:center;
                  color: #FFF;
                  padding: 2px 6px;
                  border: 1px solid black;
                  border-collapse: separate;
                  border: 1px solid #000;
                  }
  
                  td {
                  font-family: Arial, Helvetica, sans-serif;
                  font-size: 15px;
                  border: 1px solid black;
                  height: 50px;
                  padding: 15px;
                  }
          </style>
                      
                  
                          <title>Search</title>
                  </head>
  <body>
      <?php 
          require 'Header.php';
      ?>
     
  <br><h2>Guide Details</h2><br>
  <div class="container2">
      <form class="form-group" action ="GetGuideDetails.php" method="POST" enctype="multipart/form-data">
        <label for="time"><b>Number of days :</b></label><br>
        <input type="radio" name="gTime" value="1 day">1 day<br>
        <input type="radio" name="gTime" value="2 days">2 days<br>
        <input type="radio" name="gTime" value="3 days">3 days<br>  
        <input type="radio" name="gTime" value="more days">more days<br>
        <br>
        <label for="Price"><b>Maximum Price Per Day(in LKR) :</b></label><br>
        <input type="number" name="gPrice" required><br>
        <br>
        <button type="submit" name="Search_Guide" class="btn-primary btn-md">Search</button>
      </form>
  </div><br><br>
</body>
</html>          