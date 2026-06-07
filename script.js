// 1. onfocus
function focusField(x) {
    x.style.border = "3px solid yellow";
}

// 2. onsubmit (Register)
function validateRegister() {

    let valid = true;

    document.querySelectorAll(".error").forEach(function(el) {
        el.innerHTML = "";
    });

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let address = document.getElementById("address").value.trim();
    let pincode = document.getElementById("pincode").value.trim();
    let username = document.getElementById("username").value.trim();
    let password = document.getElementById("password").value;
    let confirm = document.getElementById("confirm").value;

    let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    let phonePattern = /^[0-9]{10}$/;
    let pincodePattern = /^[0-9]{6}$/;

    if(name === "") {
        document.getElementById("nameError").innerHTML =
        "Name is required";
        valid = false;
    }

    if(email === "") {
        document.getElementById("emailError").innerHTML =
        "Email is required";
        valid = false;
    }
    else if(!email.match(emailPattern)) {
        document.getElementById("emailError").innerHTML =
        "Invalid email format";
        valid = false;
    }

    if(!phone.match(phonePattern)) {
        document.getElementById("phoneError").innerHTML =
        "Enter valid 10 digit phone number";
        valid = false;
    }

    if(address.length < 10) {
        document.getElementById("addressError").innerHTML =
        "Enter proper address";
        valid = false;
    }

    if(!pincode.match(pincodePattern)) {
        document.getElementById("pincodeError").innerHTML =
        "Invalid pincode";
        valid = false;
    }

    if(username.length < 4) {
        document.getElementById("usernameError").innerHTML =
        "Minimum 4 characters";
        valid = false;
    }

    if(password.length < 6) {
        document.getElementById("passwordError").innerHTML =
        "Password must contain at least 6 characters";
        valid = false;
    }

    if(confirm !== password) {
        document.getElementById("confirmError").innerHTML =
        "Passwords do not match";
        valid = false;
    }

    return valid;
}

// 3. onsubmit (Login)
function validateLogin() {

    let valid = true;

    document.getElementById("loginUsernameError").innerHTML = "";
    document.getElementById("loginPasswordError").innerHTML = "";

    let username =
    document.getElementById("username").value.trim();

    let password =
    document.getElementById("password").value.trim();

    if(username === "") {

        document.getElementById(
        "loginUsernameError"
        ).innerHTML =
        "Username is required";

        valid = false;
    }

    if(password === "") {

        document.getElementById(
        "loginPasswordError"
        ).innerHTML =
        "Password is required";

        valid = false;
    }

    if(valid === false) {
        return false;
    }

    return true;
}

// 4. onkeyup (Search functionality)
function searchItems() {
    let input = document.getElementById("searchBox").value.toLowerCase();
    let items = document.getElementsByClassName("item");

    for (let i = 0; i < items.length; i++) {
        let text = items[i].innerText.toLowerCase();
        items[i].style.display = text.includes(input) ? "block" : "none";
    }
}

// 5. onclick (Add to cart)
function addToCart(item, price) {
    fetch("add_to_cart.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "item=" + item + "&price=" + price
    })
    .then(response => response.text())
    .then(data => {
        alert(item + " added to cart!");
        updateQuantity(item);
    });
}

// 6. Update quantity on dashboard
function updateQuantity(item) {
    fetch("get_quantity.php?item=" + item)
    .then(response => response.text())
    .then(quantity => {
        let id = item.replace(/\s/g, '');
        document.getElementById(id + "Qty").innerHTML = quantity;
    });
}

// 7. ondblclick (Quick Buy)
function quickBuy(item) {
    alert(item + " ordered instantly!");
}

// 8. onmouseover (Highlight item)
function highlight(x) {
    x.style.transform = "scale(1.05)";
    x.style.boxShadow = "0px 0px 20px yellow";
}

// 9. onmouseout (Remove highlight)
function removeHighlight(x) {
    x.style.transform = "scale(1)";
    x.style.boxShadow = "none";
}

// 10. onchange (Payment Method) 
function showPaymentFields() {
    let payment = document.getElementById("paymentMethod").value;

    document.getElementById("upiField").style.display = "none";
    document.getElementById("cardField").style.display = "none";

    if (payment === "UPI") {
        document.getElementById("upiField").style.display = "block";
    }

    if (payment === "Card") {
        document.getElementById("cardField").style.display = "block";
    }
}

// 11. onblur
function blurField(x) {
    x.style.border = "";
}