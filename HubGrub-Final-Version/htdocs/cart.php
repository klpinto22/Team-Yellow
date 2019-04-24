<?php
{
session_start();
require 'header.php';
require 'includes/dbh.inc.php';
require 'item.php';
require 'footer.php';

//Checks to see if user is signed in
if (isset($_SESSION['uID'])) 
{

//Gets the id number found in url and uses it to select dishmodel data and fill an object array
if(isset ($_GET['id']))
{
    $result = mysqli_query($conn, 'SELECT * FROM dishmodel WHERE dishID=' . $_GET['id']);       
    $product = mysqli_fetch_object($result);
    $item = new Item ();
    $item->name= $product->dishName;
    $item->id = $product->dishID;
    $item->price = $product->dishPrice;
    $item->restaurant = $product->restaurantID;
    $item->quantity= 1;
    
    $_SESSION['resID'] = $product->restaurantID;
    $_SESSION['dID'] = $product->dishID;

    //Index is created in order to keep track of iteams for purpose of user deletion or future functionalities
    $index = -1;
    if(isset ($_SESSION['cart']))
    {
        $cart = unserialize ( serialize ($_SESSION['cart']));
        for($i=0;$i<count($cart); $i++)
        {
          if($cart[$i]->dishID == $_GET['id'])
          {
              $index = $i;
              break;
          }
        }
    }
    if($index == -1)
    {
        $_SESSION ['cart'] [] = $item;
    }
    else
    {
        $cart[$index]->quantity ++;
        $_SESSION ['cart'] = $cart;
    }
}

// Delete product in Cart
if(isset ($_GET ['index']))
{
    $cart = unserialize( serialize ($_SESSION ['cart']));
    unset ($cart [$_GET['index']]);
    $cart = array_values ($cart);
    $_SESSION['cart'] = $cart;
}
}
else
{
    echo '<a href="login.php"><p>Please sign in to start your order.</p></a>';
}
}
?>
<DOCTYPE html>
<main>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        
        <div class = "background">
        <div class = "cart-flex">
            
        <div class="cart-container">
            <table class="cart-table">
                <tr>
                    <th>Option</th>
                    <th>Items</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                </tr>
                <?php
                //Cart variable is iterated through and displayed with user options to checkout or continue
                session_start();
                {
                    $cart = unserialize( serialize ($_SESSION ['cart']));
                    $sum = 0;
                    $index = 0;
                    for($i = 0; $i < count ( $cart ); $i++)
                    {
                        $sum += $cart [$i]->price * $cart [$i]->quantity;
                ?>
                <tr>
                    <td> <a href="cart.php?index=<?php echo $index; ?>"
                         onclick = "return confirm('Are you sure?')">Delete</a>
                    </td>
                    <td> <?php echo $cart[$i]->name ?> </td>
                    <td> <?php echo $cart[$i]->price ?> </td>
                    <td> <?php echo $cart[$i]->quantity ?> </td>
                    <td> <?php echo $cart[$i]->price * $cart[$i]->quantity ?> </td>
                </tr>
                <?php $index ++;
                    }
                }
                ?>
                <tr>
                    <td colspan="5">Sum: <?php echo $english_format_number = number_format($sum, 2, '.', ''); 
                        $_SESSION['sum'] = $sum; ?> </td>
                </tr>
            </table>
        </div>
<br>

<br>
        <div class = "checkout-container">
            
          <h1>Checkout</h1>
          <?php
            {
          if (isset($_GET["error"])) 
          {
            if ($_GET["error"] == "emptyfields") 
            {
              echo '<p class="signuperror">Fill in all fields!</p>';
            }
            if (isset($_GET["checkout"])) 
            {
                if ($_GET["checkout"] == "success") 
                {
                    echo '<p class="signupsuccess">Checkout successful!</p>';
                }
            } 
          } 
            } ?>
          <form class="form-checkout" action="includes/checkout.inc.php" method="post">
            <input type="text" name="first" placeholder="First name...">
            <input type="text" name="last" placeholder="Last name...">
            <input type="text" name="address" placeholder="Address...">
            <input type="text" name="phone" placeholder="Phone Number...">
            <button type="submit" name="checkout-submit">Checkout</button>
          </form>
        <br>
            </div>
            </div>
  </div>
        <br>
        <a href="restaurants.php" class="cart-button">Restaurants</a>
        <a href="beesmenu.php" class="cart-button">Continue Shopping</a>
        <br>
    </body>
</main>