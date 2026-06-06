# Chaithra's Cafe

A simple **Cafe Ordering Web Application** built using **PHP, MySQL, HTML, CSS, JavaScript, and XAMPP**.

This project allows users to register, log in, browse cafe menu items, add food to cart, manage quantities, and place orders.

---

## Features

### User Authentication

* User Registration
* User Login
* User Logout
* Session Management

### Cafe Menu

* Browse categorized food items
* Display food images
* Search functionality

### Cart Management

* Add items to cart
* Update quantity
* Remove items from cart
* View cart
* Automatic price calculation

### Order System

* Checkout functionality
* Place orders
* Store order details in database

### Form Validation

* Registration form validation
* Login form validation
* Email validation
* Password validation
* Confirm password matching
* Mobile number validation

### UI Features

* Responsive food cards
* Input focus effects
* JavaScript event handling
* Improved cart interface

---

## Technologies Used

### Frontend

* HTML
* CSS
* JavaScript

### Backend

* PHP

### Database

* MySQL

### Server

* XAMPP

---

## Project Structure

```text
ChaithrasCafe/
│── images/
│── add_to_cart.php
│── cart.php
│── checkout.php
│── dashboard.php
│── db.php
│── get_quantity.php
│── login.php
│── logout.php
│── order.php
│── README.md
│── register.php
│── script.js
│── style.css
│── users.txt
```

---

## Installation Steps

### 1. Install XAMPP

Download and install XAMPP on your system.

### 2. Move Project Folder

Copy the project folder to:

```text
C:\xampp\htdocs\
```

### 3. Start XAMPP

Open XAMPP Control Panel and start:

* Apache
* MySQL

### 4. Create Database

Open:

```text
http://localhost/phpmyadmin
```

Create a database named:

```sql
chaithra_cafe
```

### 5. Create Required Tables

#### Users Table

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(15),
    address TEXT,
    pincode VARCHAR(10),
    username VARCHAR(50),
    password VARCHAR(100)
);
```

#### Cart Table

```sql
CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    item_name VARCHAR(100),
    price INT,
    quantity INT
);
```

#### Orders Table

```sql
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    item_name VARCHAR(100),
    quantity INT,
    total_price INT
);
```

### 6. Run the Project

Open browser and run:

```text
http://localhost/ChaithrasCafe/
```

---

## Future Improvements

* Payment Gateway
* Admin Dashboard
* Order History
* Better UI Design
* Food Filters & Sorting

---

## Author

**Chaithra P**

LinkedIn:
https://www.linkedin.com/in/chaithra-p-codes
