<?php

    require 'includes/dbh.inc.php';
    require 'header.php';
    session_start();
    require 'footer.php';

//SQL Statement to generate table of users

$sql = "SELECT * FROM usermodel";
$result = mysqli_query($conn, $sql);

echo "<table border='1'>
<tr>
<th>First Name</th>
<th>Last Name</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['userFirstName'] . "</td>";
    echo "<td>" . $row['userLastName'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($conn);

?>