<?php
  
  require "header.php";
  require 'footer.php';

?>
<main>
    <div class="wrapper-main">
        <section class="section-default">
            <h1>Signup</h1>
            <?php
            {
            //Checks for valid fields
            if (isset($_GET["error"])) 
            {
                if ($_GET["error"] == "emptyfields") 
                {
                    echo '<p class="signuperror">Fill in all fields!</p>';
                }
                if ($_GET["error"] == "invaliduidmail") 
                {
                  echo '<p class="signuperror">Invalid username and e-mail!</p>';
                }
                if ($_GET["error"] == "invaliduid") 
                {
                  echo '<p class="signuperror">Invalid username!</p>';
                }
                if ($_GET["error"] == "invalidmail") 
                {
                  echo '<p class="signuperror">Invalid e-mail!</p>';
                }
                if ($_GET["error"] == "passwordcheck") 
                {
                  echo '<p class="signuperror">Your passwords do not match!</p>';
                }
                if ($_GET["error"] == "usertaken") 
                {
                  echo '<p class="signuperror">Username is already taken!</p>';
                }
          }
          //Checks if signup is succesful by getting the url and seeing if it equals string 
          if (isset($_GET["signup"])) 
          {
            if ($_GET["signup"] == "success") 
            {
              echo '<p class="signupsuccess">Signup successful!</p>';
            }
          }
          }
          ?>
          <form class="form-signup" action="includes/signup.inc.php" method="post">
          <?php
          {
            if (!empty($_GET["uID"])) 
            {
              echo '<input type="text" name="uid" placeholder="Username" value="'.$_GET["uID"].'">';
            }
            else 
            {
              echo '<input type="text" name="uid" placeholder="Username">';
            }

            if (!empty($_GET["mail"])) 
            {
              echo '<input type="text" name="mail" placeholder="E-mail" value="'.$_GET["mail"].'">';
            }
            else 
            {
              echo '<input type="text" name="mail" placeholder="E-mail">';
            }
          }
          ?>
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwd-confirm" placeholder="Confirm password">
            <button type="submit" name="signup-submit">Signup</button>
          </form>
        </section>
    </div>
</main>