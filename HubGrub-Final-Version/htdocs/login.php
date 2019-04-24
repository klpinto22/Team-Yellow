<?php 

require "header.php";
require 'footer.php';

?>

<DOCTYPE html>
<body>
    <main>
        <div class="wrapper-main">
                <section class="section-default">
                    <form class="form-signup" action="includes/login.inc.php" method="post">
                    <h1>Login</h1>
                        <?php
                        {    
                            //Checks for empty fields or invalid entries
                            if (isset($_GET["error"])) 
                            {
                                if ($_GET["error"] == "emptyfields") 
                                {
                                    echo '<p class="loginerror">Fill in all fields!</p>';
                                }
                                else if ($_GET["error"] == "invaliduidmail") 
                                {
                                    echo '<p class="loginerror">Invalid username and e-mail!</p>';
                                }
                                else if ($_GET["error"] == "invaliduid") 
                                {
                                    echo '<p class="loginperror">Invalid username!</p>';
                                }
                                else if ($_GET["error"] == "invalidmail") 
                                {
                                    echo '<p class="loginerror">Invalid e-mail!</p>';
                                }
                            }
                        }
                        ?>
                
                        <input type="text" name="userInfo" placeholder="Username/E-mail...">
                        <input type="password" name="userPass" placeholder="Password...">
                        <button type="submit" name="login-submit">Login</button>
                    </form>
                </section>
          </div>
    </main>
</body>