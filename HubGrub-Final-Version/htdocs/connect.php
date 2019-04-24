<?php
//UNUSED & UNFINISHED
//Future: Have all mysql connections, closing, etc. in one file.
$servername = "localhost";
$dbUsername = "joey2";
$dbPassword = "some_pass";
$dbName = "hubgrubdb";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword,$dbName);

if(!conn){
  die("Connection failed; ".mysqli_connect_error());
}
?>