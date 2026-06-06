// 1. onload
window.onload=function()
{
    if(sessionStorage.getItem("welcomeShown")=== null)
    {
        alert("Welcome to Chaithra's Cafe");
        sessionStorage.setItem("welcomeShown","true");
    }
}

// 2. onfocus
function focusField(x) {
    x.style.border = "3px solid yellow";
}

// 3. onsubmit (Register)
function validateRegister() {

    document.getElementById("nameError").innerHTML = "";
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("phoneError").innerHTML = "";
    document.getElementById("addressError").innerHTML = "";
    document.getElementById("pincodeError").innerHTML = "";
    document.getElementById("usernameError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";
    document.getElementById("confirmError").innerHTML = "";

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let address = document.getElementById("address").value.trim();
    let pincode = document.getElementById("pincode").value.trim();
    let username = document.getElementById("username").value.trim();
    let password = document.getElementById("password").value.trim();
    let confirm = document.getElementById("confirm").value.trim();

    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let phonePattern = /^[0-9]{10}$/;
    let pincodePattern = /^[0-9]{6}$/;

    let valid = true;

    if(name.length < 3){
        document.getElementById("nameError").innerHTML = "Minimum 3 characters";
        valid = false;
    }

    if(!emailPattern.test(email)){
        document.getElementById("emailError").innerHTML = "Invalid email";
        valid = false;
    }

    if(!phonePattern.test(phone)){
        document.getElementById("phoneError").innerHTML = "10 digit number required";
        valid = false;
    }

    if(address.length < 10){
        document.getElementById("addressError").innerHTML = "Enter proper address";
        valid = false;
    }

    if(!pincodePattern.test(pincode)){
        document.getElementById("pincodeError").innerHTML = "Invalid pincode";
        valid = false;
    }

    if(username.length < 4){
        document.getElementById("usernameError").innerHTML = "Minimum 4 characters";
        valid = false;
    }

    if(password.length < 6){
        document.getElementById("passwordError").innerHTML = "Minimum 6 characters";
        valid = false;
    }

    if(password.search(/[A-Z]/) < 0){
        document.getElementById("passwordError").innerHTML = "Add one capital letter";
        valid = false;
    }

    if(password.search(/[0-9]/) < 0){
        document.getElementById("passwordError").innerHTML = "Add one number";
        valid = false;
    }

    if(password !== confirm){
        document.getElementById("confirmError").innerHTML = "Passwords do not match";
        valid = false;
    }

    return valid;
}

// 4. onsubmit (Login)
function validateLogin() {

    document.getElementById("loginEmailError").innerHTML = "";
    document.getElementById("loginPasswordError").innerHTML = "";

    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();

    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    let valid = true;

    if(email === ""){
        document.getElementById("loginEmailError").innerHTML = "Email is required";
        valid = false;
    }

    else if(!emailPattern.test(email)){
        document.getElementById("loginEmailError").innerHTML = "Enter valid email";
        valid = false;
    }

    if(password === ""){
        document.getElementById("loginPasswordError").innerHTML = "Password is required";
        valid = false;
    }

    else if(password.length < 6){
        document.getElementById("loginPasswordError").innerHTML = "Minimum 6 characters";
        valid = false;
    }

    return valid;
}

// 5. onkeyup (Search functionality)
function searchItems() {
    let input = document.getElementById("searchBox").value.toLowerCase();
    let items = document.getElementsByClassName("item");

    for (let i = 0; i < items.length; i++) {
        let text = items[i].innerText.toLowerCase();
        items[i].style.display = text.includes(input) ? "block" : "none";
    }
}

// 6. onclick (Add to cart)
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

// 7. Update quantity on dashboard
function updateQuantity(item) {
    fetch("get_quantity.php?item=" + item)
    .then(response => response.text())
    .then(quantity => {
        let id = item.replace(/\s/g, '');
        document.getElementById(id + "Qty").innerHTML = quantity;
    });
}

// 8. ondblclick (Quick Buy)
function quickBuy(item) {
    alert(item + " ordered instantly!");
}

// 9. onmouseover (Highlight item)
function highlight(x) {
    x.style.transform = "scale(1.05)";
    x.style.boxShadow = "0px 0px 20px yellow";
}

// 10. onmouseout (Remove highlight)
function removeHighlight(x) {
    x.style.transform = "scale(1)";
    x.style.boxShadow = "none";
}

// 11. onchange (Payment Method) 
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
