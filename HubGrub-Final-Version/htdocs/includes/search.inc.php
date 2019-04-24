<?php 
{
//UNFINISHED
if (isset($_POST['search-submit'])) 
{
    session_start();
    require 'header.php';
    require 'includes/dbh.inc.php';
    
    $search = $_POST['search'];
    $_SESSION['search'] = $search;
    
    $sql = "SELECT DISTINCT rm.restaurantID FROM restaurantmodel rm JOIN dishmodel dm ON rm.restaurantID = dm.restaurantID
            WHERE dishName='" . $search . "' OR dishCategory='" . $search . "' OR restaurantName='" . $search . "' OR restaurantCategory='" . $search . "'";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) 
    {
      header("Location: ../search.php?error=sqlerror" . mysqli_error($conn));
      exit();
    }
    else 
    {
        mysqli_stmt_bind_param($stmt, "s", $search);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if ($row = mysqli_fetch_assoc($result)) 
        {
          session_start();
            
            $_SESSION['CurrentRes'] = $row['restaurantID'];

            if($row['restaurantID'] == 1)
            {
                $_SESSION['display1'] = "beesmenu.php";
            }
            if($row['restaurantID'] == 3)
            {
                $_SESSION['display3'] = "thaistarmenu.php";
            }
            if($row['restaurantID'] == NULL)
            {
                echo 'No Matches for "' . $search . '"';
            }
            unset($search, $result, $row, $_SESSION['restaurantID']);
            exit();
        }
    }
}
}
?>