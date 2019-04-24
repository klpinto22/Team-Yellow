<?php
{
//Checks to see if user has pressed the login button
if (isset($_POST['login-submit'])) 
{
  //imports db context
  require 'dbh.inc.php';

  //Assigns form post variables to local variables
  $info = $_POST['userInfo'];
  $password = $_POST['userPass'];

  //Check for empty fields
  if (empty($info) || empty($password)) 
  {
    header("Location: ../login.php?error=emptyfields&mailuid=". $info);
  }
  //SQL Query to select all for the usermodel and check if the user inputs match a user account in the DB.
  else 
  {

    $sql = "SELECT * FROM usermodel WHERE userName=? OR userEmail=?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) 
    {
      header("Location: ../login.php?error=sqlerror");
      exit();
    }
    else 
    {
      mysqli_stmt_bind_param($stmt, "ss", $info, $info);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) 
      {

        $passCheck = password_verify($password, $row['userPassword']);
        if ($passCheck == false) 
        {
          header("Location: ../login.php?error=wrongpass");
          exit();
        }
        else if ($passCheck == true) 
        {
          session_start();
          //Session variables are created to distinguish user in a certain instance of a session
          $_SESSION['uAdmin'] = $row['userAdmin'];
          $_SESSION['uID'] = $row['userID'];
          $_SESSION['uName'] = $row['userName'];
          $_SESSION['uEmail'] = $row['userEmail'];
          header("Location: ../index.php?login=success");
          exit();
        }
      }
      else 
      {
        header("Location: ../login.php?login=wronginfo");
        exit();
      }
    }
  }  
  //Close connection to mysql
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else 
{
  header("Location: ../signup.php");
  exit();
}
    
}

?>