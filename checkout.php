<?php
session_start();
include("db.php");

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['user'];

// Get user details
$userQuery = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
$user = mysqli_fetch_assoc($userQuery);

// Get cart items
$cartQuery = mysqli_query($conn, "SELECT * FROM cart WHERE username='$username'");

$subtotal = 0;
$items = "";

while ($row = mysqli_fetch_assoc($cartQuery)) {
    $subtotal += $row['price'] * $row['quantity'];
    $items .= $row['item_name'] . " x " . $row['quantity'] . ", ";
}

$gst = $subtotal * 0.05;
$delivery = 50;
$grandTotal = $subtotal + $gst + $delivery;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <header>
        <h1>Checkout</h1>
    </header>

    <div class="container">
        <form action="order.php" method="POST">
            <h2>Delivery Details</h2>
            <input type="text" name="name" value="<?php echo $user['name']; ?>" required>
            <input type="text" name="phone" value="<?php echo $user['phone']; ?>" required>
            <textarea name="address" required><?php echo $user['address']; ?></textarea>
            <input type="text" name="pincode" value="<?php echo $user['pincode']; ?>" required><br><br>

            <h2>Payment Method</h2>
            <select name="payment" id="paymentMethod" onchange="showPaymentFields()" required>
                <option value="">Choose Payment</option>
                <option>Cash on Delivery</option>
                <option>UPI</option>
                <option>Card</option>
                <option>Net Banking</option>
            </select>

            <!-- Dynamic Payment Fields -->
            <div id="upiField" style="display:none;">
                <input type="text" name="upi" placeholder="Enter UPI ID">
            </div>

            <div id="cardField" style="display:none;">
                <input type="text" name="cardNumber" placeholder="Card Number">
                <input type="text" name="cvv" placeholder="CVV">
                <input type="month" name="expiry">
            </div><br><br>

            <h2>Bill Summary</h2>
            <p>Subtotal: ₹<?php echo $subtotal; ?></p>
            <p>GST (5%): ₹<?php echo $gst; ?></p>
            <p>Delivery: ₹50</p>

            <h2>Grand Total: ₹<?php echo $grandTotal; ?></h2>

            <input type="hidden" name="items" value="<?php echo $items; ?>">
            <input type="hidden" name="total" value="<?php echo $grandTotal; ?>">

            <button type="submit">Place Order</button>
        </form>
    </div>
</body>
</html>
