<?php
{
    session_start();
    require 'dbh.inc.php'
        
        
$uid = $_SESSION['uID'];

    //SELECTS THE CURRENT ORDER NUMBER
$sql = "SELECT MAX(orderID) FROM checkoutmodel WHERE userID='$uid'";
$stmt = mysqli_stmt_init($conn);
$orderNum = mysqli_query($conn, $sql);

    if (!mysqli_stmt_prepare($stmt, $sql)) 
    {
      header("Location: ../orderplaced.php?error=sqlerror");
      exit();
    }
    else 
    {
      $_SESSION['orderCurNum'] = $orderNum->orderID;
      header("Location: ../orderplaced.php?orderplaced=success2")
    }
}
?>