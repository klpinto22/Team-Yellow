<?php

session_start();

?>
<!--A banner at the bottom of the screen to display links to several pages including search, restaurants, and login.-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Welcome to HubGrub! The world's most original idea for a buisness.">
    <meta name=viewport content="width=device-width, initial-scale-1">
    <title>Welcome to HubGrub! The world's most original idea for a buisness.</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


  </head>
  <body>
    <header>
      <nav class="nav-header-main">
       <a class="header-logo" href="index.php">
         <img src="img/logo.png" alt="hubgrub logo">
       </a>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="restaurants.php">Restaurants</a></li>
          <li><a href="contactus.php">Contact Us</a></li>
        </ul>
      </nav>
        <div class="header-login">
            <?php
               echo '<form action="search.php" method="post">
               <input type="text" name="search" placeholder="Search a category or restaurant...">
               <button type="submit" name="search-submit"><i class="fas fa-search"></i>Search</button>
               </form>'; 
            ?>
        </div>
        <div class = "header-login">
          <?php
            {
          //Checks to see if user is logged in, if yes, logout button is displayed
          if (isset($_SESSION['uID'])) 
          {
              echo '<form action="includes/logout.inc.php" method="post">
              <button type="submit" name="logout-submit"><i class="fas fa-sign-out-alt"></i>Logout</button>
              </form>';
              
              echo '<a href="cart.php" class="header-cart"><img src="img/cart.png" alt="hubgrub cart"></a>';
              //Checks to see if user is admin, if yes, admin button is displayed and can be pressed.
              if($_SESSION['uAdmin'] == 1) 
              {
                  echo '<form action="admin.php" method="post">
                  <button type="submit" name="admin-post">Admin</button>
                  </form>';
              }
          } 
          else 
          {
              //If no user is logged in, signup button, login button, and cart button displayed.
              echo '<a href="signup.php" class="header-signup"><i class="fas fa-user-plus"></i>Signup</a>
              <a href="login.php" class="header-signup"><i class="fas fa-sign-in-alt"></i>Login</a>
              <a href="cart.php" class="header-cart"><img src="img/cart.png" alt="hubgrub cart"></a>';
          }
            }
         ?>
             
        </div>
    </header>
  </body>
</html>
