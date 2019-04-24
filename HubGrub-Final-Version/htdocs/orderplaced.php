<?php

require 'header.php';
require 'footer.php';
session_start();

?>
<!--Simple page for use of confirming order placement-->
<DOCTYPE html>
<main>
    <head>
        <link rel="stylesheet" href="style.css">
            <body>
                <p>Order success!</p>
                <p>Your Order:</p>
                <p> <?php echo 'Name: ' . $_SESSION['first'] . ' ' . $_SESSION['last']; ?> </p>
                <p> <?php echo 'Address: ' . $_SESSION['address']; ?> </p>
                <p> <?php echo 'Phone: ' . $_SESSION['phone']; ?> </p>
                <p> <?php echo 'Order Number: ' . $_SESSION['orderCurNum']; ?> </p>
                <p> <?php echo 'Sum: ' . $_SESSION['sum']; ?> </p>
            </body>
    </head>
</main>
