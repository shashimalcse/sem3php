<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name=viewport content="width=divice-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styleheader.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title></title>
  </head>
  <body>
    <div class="container">
      <div class="header-login" >
        <?php
        if(isset($_SESSION['userId'])){
          echo'
            <form action="includes/logout.inc.php" method="post">
               <button type="submit" name="logout-submit">LOGOUT</button>
            </form>';
        }
        else{
            echo'        <div class="loginbox">
                    <form class="form-inline" action="includes/login.inc.php" method="post">
                      <input type="text" name="mailuid" class="form-control" placeholder="Username/Email">
                      <input type="password" name="pwd" class="form-control" placeholder="Password">
                      <button type="submit" name="login-submit" class="btn btn-primary">LOGIN</button>

                    </form>

                  </div>
                  <a href="signup.php" id="signupbtn" class="btn btn-primary">SINGUP</a>';
        }
        ?>





      </div>
    </div>

  </body>
</html>
