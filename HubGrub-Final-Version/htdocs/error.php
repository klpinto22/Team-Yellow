<?php 
//UNFINISHED & UNUSED
//Future: Redirect all errors to an error page for simpler debugging.

require 'header.php' 

echo "<p>Error description: " . mysqli_error($conn) . "</p>";

?>