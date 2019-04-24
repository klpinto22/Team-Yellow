<?php
{
//Session is started in order to use session (global variables)
session_start();
//Checks to see if a user is signed in
if(isset($_SESSION['uID']))
{
    

//Checks to see if 'checkout' button was pressed
if (isset($_POST['checkout-submit'])) 
{
  require 'dbh.inc.php';

  //Assign the form's post variables to local variables
    //Assign local variables to global session variables
  $userFirst = $_POST['first'];
    $_SESSION['first'] = $userFirst;
  $userLast = $_POST['last'];
    $_SESSION['last'] = $userLast;
  $userAddress = $_POST['address'];
    $_SESSION['address'] = $userAddress;
  $userPhone = $_POST['phone'];
    $_SESSION['phone'] = $userPhone;
  
  //Import relevant session variables for later use
  $userID = $_SESSION['uID'];
  $restaurantID = $_SESSION['resID'];
  $sum = $_SESSION['sum'];
  $orderNum = $_SESSION['orderCurNum']++;
    
    
  //Checks to see if fields are full
  if (empty($userFirst) || empty($userLast) || empty($userAddress) || empty($userPhone)) 
  {
    header("Location: ../cart.php?error=emptyfields");
    exit();
  }
  //1st SQL Query to create a new order number and assign userid, restaurantid, and ordertotal to appropriate user
    //2nd SQL Query that inserts new user data into usermodel scuh as 'address'.
    //3rd SQL Query to get the newest order ID from signed in user
  else 
  {
        $sql1 = "INSERT INTO checkoutmodel (userID, restaurantID, orderTotal) 
                VALUES ('$userID', '$restaurantID', '$sum')";
        $sql2 = "UPDATE usermodel 
                 SET userFirstName = '$userFirst', 
                    userLastName = '$userLast',
                    userAddress = '$userAddress', 
                    userPhone = '$userPhone',
                    userOrders = '$orderNum'
                 WHERE userID = '$userID'";
        $sql3 = "SELECT MAX(orderID) FROM checkoutmodel WHERE userID='". $userID . "'";    
        $stmt = mysqli_stmt_init($conn);
        $stmt2 = mysqli_stmt_init($conn);
        $result = mysqli_query($conn, $sql3);
        $_SESSION['orderCurNum'] = $result->orderID;
        if (!mysqli_stmt_prepare($stmt, $sql1)) 
        {
          header("Location: ../cart.php?error=sqlerror2check");
	      echo "Error description: " . mysqli_error($conn);
        }
      
        if (!mysqli_stmt_prepare($stmt2, $sql2)) 
        {

          header("Location: ../cart.php?error=sqlerror3user=" . $userID );
	      echo "<p>Error description: " . mysqli_error($conn) . "</p>";
        }
      
        else 
        {
          mysqli_stmt_bind_param($stmt, "iid", $userID, $restaurantID, $sum);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_bind_param($stmt2, "ssss", $userFirst, $userLast, $userAddress, $userPhone);
          mysqli_stmt_execute($stmt2);
          header("Location: ../orderplaced.php?=ordersuccess");
          exit();
        }
    //}
  }
    //Closes connection to mysql for security
  mysqli_stmt_close($stmt);
  mysqli_stmt_close($stmt2);
  mysqli_close($conn);
}
else 
{
  header("Location: ../cart.php");
  exit();
}
}
else
{
    echo '<p>No user.</p>';
}
    
} 
?>