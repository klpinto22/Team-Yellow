<?php
{
//Unsets all session variables, or, logs user out
session_start();
session_unset();
session_destroy();
header("Location: ../index.php");
}
?>