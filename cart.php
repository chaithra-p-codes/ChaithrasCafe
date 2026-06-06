<?php
session_start();
include("db.php");

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['user'];

// REMOVE ITEM
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM cart WHERE id='$id'");
}

// INCREASE QUANTITY
if (isset($_GET['increase'])) {
    $id = $_GET['increase'];
    mysqli_query($conn, "UPDATE cart SET quantity = quantity + 1 WHERE id='$id'");
}

// DECREASE QUANTITY
if (isset($_GET['decrease'])) {
    $id = $_GET['decrease'];
    mysqli_query($conn, "UPDATE cart SET quantity = quantity - 1 WHERE id='$id' AND quantity > 1");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Your Cart</h1>
        <div class="top-buttons">
            <a href="dashboard.php">
                <button class="top-btn">← Continue Shopping</button>
            </a>
        </div>
    </header>

    <div class="cart-container">
        <?php
        $total = 0;
        $query = mysqli_query($conn, "SELECT * FROM cart WHERE username='$username'");

        $imageMap = [
            "Cappuccino"=>"images/capuccino.jpg",
            "Latte"=>"images/latte.jpg",
            "Espresso"=>"images/espresso.jpg",
            "Cold Coffee"=>"images/coldcoffee.jpg",
            "Veg Sandwich"=>"images/vegsandwich.jpg",
            "Burger"=>"images/burgers.jpg",
            "French Fries"=>"images/frenchfries.jpg",
            "Pizza Slice"=>"images/pizza.jpg",
            "Blueberry CheeseCake"=>"images/blueberry.jpg",
            "Brownie with Ice Cream"=>"images/brownie.jpg",
            "Tiramisu"=>"images/tiramisu.jpg",
            "Donut"=>"images/donut.jpg"
            ];

        while ($row = mysqli_fetch_assoc($query)) {
            $subtotal = $row['price'] * $row['quantity'];
            $total += $subtotal;
        ?>
        <div class="cart-card">
            <img src="<?php echo $imageMap[$row['item_name']]; ?>">
            <h3><?php echo $row['item_name']; ?></h3>
            <p class="price">₹<?php echo $row['price']; ?></p>
            <p>Quantity: <b><?php echo $row['quantity']; ?></b></p>
            <p>Subtotal: <b>₹<?php echo $subtotal; ?></b></p>
            <div class="cart-buttons">
                <a href="cart.php?increase=<?php echo $row['id']; ?>">
                    <button class="small-btn plus-btn">+</button>
                </a>
                <a href="cart.php?decrease=<?php echo $row['id']; ?>">
                    <button class="small-btn minus-btn">−</button>
                </a>
                <a href="cart.php?remove=<?php echo $row['id']; ?>">
                    <button class="small-btn remove-btn">Remove</button>
                </a>
            </div>
        </div>
        <?php } ?>
    </div>

    <div class="bill-box">
        <h2>Total: ₹<?php echo $total; ?></h2>
        <a href="checkout.php">
            <button class="checkout-btn">Proceed To Checkout</button>
        </a>
    </div>
</body>
<footer id="contact">
    <p>&copy; 2026 Chaithra's Cafe | Contact: chaithrascafe@email.com</p>
</footer>
</html>
