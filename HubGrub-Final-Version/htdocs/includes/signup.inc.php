<?php
{
//Checks to see if 'Signup' button was pressed
if (isset($_POST['signup-submit'])) 
{

  require 'dbh.inc.php';
    
  //Sets form post variables to local variables
  $username = $_POST['uid'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $passwordConfirm = $_POST['pwd-confirm'];
  
  //Checks for empty fields, correct e-mail syntax, matching passwords
  if (empty($username) || empty($email) || empty($password) || empty($passwordConfirm)) 
  {
    header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
    exit();
  }

  if (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)) 
  {
    header("Location: ../signup.php?error=invaliduidmail");
    exit();
  }

  if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) 
  {
    header("Location: ../signup.php?error=invaliduid&mail=".$email);
    exit();
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
  {
    header("Location: ../signup.php?error=invalidmail&uid=".$username);
    exit();
  }

  if ($password !== $passwordConfirm) 
  {
    header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
    exit();
  }
  else 
  {

    $sql = "SELECT userID FROM usermodel WHERE userID=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) 
    {
      header("Location: ../signup.php?error=sqlerror1");
      $link = mysqli_connect("$servername, $dBUsername, $dBPassword");
      exit();
    }
    else 
    {
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCount = mysqli_stmt_num_rows($stmt);
      mysqli_stmt_close($stmt);
      
      //If resultCount > 0, there must be 1 in database, username/email taken
      if ($resultCount > 0) 
      {
        header("Location: ../signup.php?error=usertaken&mail=". $email);
        exit();
      }
      //Simple hasing method to hash inputted password and inserts all the data into usermodel 
      else 
      { 
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usermodel (userName, userEmail, userPassword, userAddress, userPhone, userFirstName, userLastname, userAdmin) VALUES ('$username', '$email', '$hashedPwd', NULL, NULL, NULL, NULL, 0);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) 
        {

          header("Location: ../signup.php?error=sqlerror2"  . mysqli_error($conn));
	      echo "Error description: " . mysqli_error($conn);
          exit();
        }
        else 
        {
          mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
          mysqli_stmt_execute($stmt);
          header("Location: ../signup.php?signup=success");
          exit();

        }
      }
    }
  }
  //close connection to mysql
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else 
{
  header("Location: ../signup.php");
  exit();
}
}