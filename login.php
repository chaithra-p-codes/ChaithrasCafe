<?php
session_start();
include("db.php");
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user'] = $username;
        $_SESSION['address'] = $user['address'];

        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid Login";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <div class="container">
        <h1>Chaithra's Cafe</h1>
        <form method="POST" onsubmit="return validateLogin()">
            <input type="text" id="username" name="username" placeholder="Username" required>
            <span id="loginUsernameError" class="error"></span>

            <input type="password" id="password" name="password" placeholder="Password" required>
            <span id="loginPasswordError" class="error"></span>

            <button type="submit" name="login">Login</button>
        </form>
        <br>
        <center>
            <a href="register.php">Create Account</a>
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
