<?php {

require 'includes/dbh.inc.php';
require 'header.php';
require 'footer.php';
session_start();


//SQL Statement to generate list of dish categories
$sql = "SELECT dishCategory FROM dishmodel WHERE restaurantID=1 GROUP BY dishCategory";
$result = mysqli_query($conn, $sql);
    
//Fills new array with all dish categories
$resultArray = array();
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $resultArray[] = $row['dishCategory'];
}

} 
?>
<!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

     <title>Bee's Menu</title>
   </head>
<body>
    <?php 
    { 
        //Two loops created: 
            //1st loop: Creates a set number of tables based on number of categories by iterating through resultArray
            //2nd loop: Every dish in a certain dish category is displayed in each table.
        if (isset($_SESSION['uID'])) 
        {
        for($i=0; $i < count($resultArray); $i++)
        {
            $sql2 = "SELECT restaurantID, dishID, dishName, dishPrice FROM dishmodel WHERE restaurantID=1 AND dishCategory='" . $resultArray[$i] . "'";
            $result2 = mysqli_query($conn, $sql2);  
            $product = mysqli_fetch_object($result2);
            '<div class = "menuflex">';
        echo '<div class="menu-container">';
        echo '<table>';
            echo '<tr>';
                echo '<th>' . $resultArray[$i] . '</th>';
                echo '<th></th>';
                echo '<th></th>';
            echo '</tr>';
            echo '<tr>';
                while($product = mysqli_fetch_object($result2)){
                echo '<td>' . $product->dishName . '</td>';
                echo '<td>$' . $product->dishPrice . '</td>';
                echo '<td><a href="cart.php?id=' . $product->dishID . '" class="addtoC_button"><i class="fas fa-cart-arrow-down"></i></a></td>';   
            echo '</tr>';
                }
        echo '</table>';
        echo '</div>';
            '</div>';
        } 
        }
        else
        {
            echo '<p>Please sign in to start your order.</p>';
            echo '<a href="index.php">Home</a>';
        }
    } 
    ?>
</body>
</html>
