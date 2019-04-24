<?php

require 'header.php';
require 'footer.php';

?>

<!DOCTYPE html>
<!--UNFINISHED PAGE
    Future: Display restaurants based off of search word matching those restaurants keywords-->
<html>
  <head>
    <meta charset="utf-8">
    <title>Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900|Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="style.css"/>
  </head>
  <div class="background">
      <body>
          <?php 
          {
              echo '<p>' . $_SESSION['CurrentRes'] . '</p>';
              echo '<br>';
              echo '<p>something</p>';
          } ?>
      </body>
    </div>
</html>