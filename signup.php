<?php
  require "header.php"
?>
  <main>
    <div class="col-md-2 signupbox">
      <section class="section-default"
        <h1 >SIGNUP</h1>
        <?php
        if(isset($_GET['error'])){
          if($_GET['error']=="emptyfields"){
            echo '<p class="signuperror">FILL IN ALL FIELDS!</p>';
          }
          else if($_GET['error']=="invalidmail"){
            echo '<p class="signuperror">INVALID EMAIL!</p>';
          }
          else if($_GET['error']=="invaliduid"){
            echo '<p class="signuperror">INVALID USERNAME!</p>';
          }
          else if($_GET['error']=="passwordcheck"){
            echo '<p class="signuperror">PASSWORD DO NOT MATCH!</p>';
          }
          else if($_GET['error']=="passwordcheck"){
            echo '<p class="signuperror">PASSWORD DO NOT MATCH!</p>';
          }
          else if($_GET['error']=="usertaken&mail"){
            echo '<p class="signuperror">USERNAME IS ALREADY TAKEN!</p>';
          }

        }
        else if(isset($_GET['signup'])){
          if($_GET['signup']=="success"){
          echo '<p class="signupsucces">SIGNUP SUCCESSFULL!</p>';
        }}
        ?>
        <div class="formsignup">
        <form class="form-signup" action="includes/signup.inc.php" method="post">
          <div class="form-group">
            <input type="text" name="uid" class="form-control" placeholder="Username">
          </div>
          <div class="form-group">
            <input type="text" name="mail" class="form-control" placeholder="Email">
          </div>
          <div class="form-group">
            <input type="password" name="pwd" class="form-control" placeholder="Password">
          </div>
          <div class="form-group">
            <input type="password" name="pwd-repeat" class="form-control" placeholder="Repeat Passowrd">
          </div>
          <div>
            <button type="submit" name="signup-submit" class="btn btn-primary">SIGNUP</button>
          </div>

        </form>
      </div>

      </section>

    </div>

  </main>
  <?php
    require "footer.php"
  ?>
