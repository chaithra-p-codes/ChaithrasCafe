<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Chaithra's Cafe</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <header>
        <h1>♥ Chaithra's Cafe ♥</h1>
        <p>Welcome <?php echo $_SESSION['user']; ?></p>

        <input type="text"
               id="searchBox"
               placeholder="Search items..."
               onkeyup="searchItems()"
               onfocus="focusField(this)"
               onblur="blurField(this)"
               class="search-box">

        <div class="top-buttons">
            <a href="cart.php">
                <button class="top-btn">View Cart</button>
            </a>
            <a href="logout.php">
                <button class="top-btn logout-btn">Logout</button>
            </a>
        </div>
    </header>

    <!-- COFFEE -->
    <h2 class="category">Coffee</h2>
    <div class="menu-row">
        <div class="item" onmouseover="highlight(this)" onmouseout="removeHighlight(this)">
            <img src="images/capuccino.jpg">
            <h3>Cappuccino</h3>
            <p class="price">₹150</p>
            <button onclick="addToCart('Cappuccino', 150)">Add To Cart</button>
            <p>Quantity: <span id="CappuccinoQty">0</span></p>
        </div>

        <div class="item" onmouseover="highlight(this)" onmouseout="removeHighlight(this)">
            <img src="images/latte.jpg">
            <h3>Latte</h3>
            <p class="price">₹180</p>
            <button onclick="addToCart('Latte', 180)">Add To Cart</button>
            <p>Quantity: <span id="LatteQty">0</span></p>
        </div>

        <div class="item" onmouseover="highlight(this)" onmouseout="removeHighlight(this)">
            <img src="images/espresso.jpg">
            <h3>Espresso</h3>
            <p class="price">₹120</p>
            <button onclick="addToCart('Espresso', 120)">Add To Cart</button>
            <p>Quantity: <span id="EspressoQty">0</span></p>
        </div>

        <div class="item" onmouseover="highlight(this)" onmouseout="removeHighlight(this)">
            <img src="images/coldcoffee.jpg">
            <h3>Cold Coffee</h3>
            <p class="price">₹200</p>
            <button onclick="addToCart('Cold Coffee', 200)">Add To Cart</button>
            <p>Quantity: <span id="ColdCoffeeQty">0</span></p>
        </div>
    </div>

    <!-- SNACKS -->
    <h2 class="category">Snacks</h2>
    <div class="menu-row">
        <div class="item" onmouseover="highlight(this)" onmouseout="removeHighlight(this)">
            <img src="images/vegsandwich.jpg">
            <h3>Veg Sandwich</h3>
            <p class="price">₹120</p>
            <button onclick="addToCart('Veg Sandwich', 120)">Add To Cart</button>
            <p>Quantity: <span id="VegSandwichQty">0</span></p>
        </div>

        <div class="item" onmouseover="highlight(this)" onmouseout="removeHighlight(this)">
            <img src="images/burgers.jpg">
            <h3>Burger</h3>
            <p class="price">₹150</p>
            <button onclick="addToCart('Burger', 150)">Add To Cart</button>
            <p>Quantity: <span id="BurgerQty">0</span></p>
        </div>

        <div class="item" onmouseover="highlight(this)" onmouseout="removeHighlight(this)">
            <img src="images/frenchfries.jpg">
            <h3>French Fries</h3>
            <p class="price">₹100</p>
            <button onclick="addToCart('French Fries', 100)">Add To Cart</button>
            <p>Quantity: <span id="FrenchFriesQty">0</span></p>
        </div>

        <div class="item" onmouseover="highlight(this)" onmouseout="removeHighlight(this)">
            <img src="images/pizza.jpg">
            <h3>Pizza Slice</h3>
            <p class="price">₹180</p>
            <button onclick="addToCart('Pizza Slice', 180)">Add To Cart</button>
            <p>Quantity: <span id="PizzaSliceQty">0</span></p>
        </div>
    </div>

    <!-- DESSERTS -->
    <h2 class="category">Desserts</h2>
    <div class="menu-row">
        <div class="item" onmouseover="highlight(this)" onmouseout="removeHighlight(this)">
            <img src="images/blueberry.jpg">
            <h3>Blueberry CheeseCake</h3>
            <p class="price">₹200</p>
            <button onclick="addToCart('Blueberry CheeseCake', 200)">Add To Cart</button>
            <p>Quantity: <span id="BlueberryCheeseCakeQty">0</span></p>
        </div>

        <div class="item" onmouseover="highlight(this)" onmouseout="removeHighlight(this)">
            <img src="images/brownie.jpg">
            <h3>Brownie with Ice Cream</h3>
            <p class="price">₹150</p>
            <button onclick="addToCart('Brownie with Ice Cream', 150)">Add To Cart</button>
            <p>Quantity: <span id="BrowniewithIceCreamQty">0</span></p>
        </div>

        <div class="item" onmouseover="highlight(this)" onmouseout="removeHighlight(this)">
            <img src="images/tiramisu.jpg">
            <h3>Tiramisu</h3>
            <p class="price">₹220</p>
            <button onclick="addToCart('Tiramisu', 220)">Add To Cart</button>
            <p>Quantity: <span id="TiramisuQty">0</span></p>
        </div>

        <div class="item" onmouseover="highlight(this)" onmouseout="removeHighlight(this)">
            <img src="images/donut.jpg">
            <h3>Donut</h3>
            <p class="price">₹100</p>
            <button onclick="addToCart('Donut', 100)">Add To Cart</button>
            <p>Quantity: <span id="DonutQty">0</span></p>
        </div>
    </div>

    <footer id="contact">
        <p>&copy; 2026 Chaithra's Cafe | Contact: chaithrascafe@email.com</p>
    </footer>
</body>
</html>
