<?php
include("db.php");

if (isset($_POST['register'])) {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $address  = $_POST['address'];
    $pincode  = $_POST['pincode'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm  = $_POST['confirm'];

    if ($password != $confirm) {
        $error = "Passwords do not match";
    } else {
        $query = "INSERT INTO users 
                  (name, email, phone, address, pincode, username, password) 
                  VALUES ('$name', '$email', '$phone', '$address', '$pincode', '$username', '$password')";

        mysqli_query($conn, $query);

        echo "<script>
                alert('Registration Successful');
                window.location='login.php';
              </script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <div class="container">
        <h1>Create Account</h1>
        <form method="POST" onsubmit="return validateRegister()">
            <input type="text" id="name" name="name" placeholder="Full Name" required>
            <span id="nameError" class="error"></span>

            <input type="email" id="email" name="email" placeholder="Email" required>
            <span id="emailError" class="error"></span>

            <input type="text" id="phone" name="phone" placeholder="Phone Number" required>
            <span id="phoneError" class="error"></span>

            <textarea id="address" name="address" placeholder="Delivery Address" required></textarea>
            <span id="addressError" class="error"></span>

            <input type="text" id="pincode" name="pincode" placeholder="Pincode" required>
            <span id="pincodeError" class="error"></span>

            <input type="text" id="username" name="username" placeholder="Username" required>
            <span id="usernameError" class="error"></span>

            <input type="password" id="password" name="password" placeholder="Password" required>
            <span id="passwordError" class="error"></span>

            <input type="password" id="confirm" name="confirm" placeholder="Confirm Password" required>
            <span id="confirmError" class="error"></span>
            
            <button type="submit" name="register">Register</button>
        </form>
        <br>
        <center>
            <a href="login.php">Already have account?</a>
        </center>
        <div class="error">
            <?php
            if (isset($error)) {
                echo $error;
            }
            ?>
        </div>
    </div>
</body>
</html>
