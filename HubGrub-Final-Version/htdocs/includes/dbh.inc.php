<?php
{
    
//A context class that can easily call a connection to the database with one variable.
$servername = "localhost";
$dbUsername = "joey2";
$dbPassword = "some_pass";
$dbName = "hubgrubdb";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword,$dbName);

if(!$conn)
{
  die("Connection failed; ".mysqli_connect_error());
}
}
?>
