<?php 

require "header.php"; 
require 'footer.php';

?>
<-->Detailed styling of each individual menu spilt into their each div sections</-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Restaurants</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
  </head>
  <body>
    <div class="background">
        <div class="restaurant-gallery">
            <div class="info-card">
                <a href="thaistarmenu.php"><img src ="img/thaistarlogo.png"></a>
                    <div class="restaurant-container">
                        <p>Thai Star</p>
                        <p>1088 Chalkstone Ave, Providence, RI 02908</p>
                        </div>
            </div>
            <div class="info-card">
                <a href="beesmenu.php"><img src ="img/beeslogo.png"></a>
                    <div class="restaurant-container">
                        <p>Bee's Thai Cuisine</p>
                        <p>167 Ives St, Providence, RI 02906</p>
                    </div>
            </div>
            <div class="info-card">
                <a href="thaistarmenu.php"><img src ="img/bigtonyslogo.png"></a>
                    <div class="restaurant-container">
                        <p>Big Tony's Pizzeria</p>
                        <p>525 Eaton St, Providence, RI 02908</p>
                    </div>
            </div>
        </div>
    </div>
  </body>
</html>





<?php require "footer.php"; ?>