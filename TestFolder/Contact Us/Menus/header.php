<?php
session_start();
?>

<style>
/* General styles for the header */
header {
    background-color: #f8f9fa;
    padding: 10px 0;
}

.row1 {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.nav-bar {
    list-style: none;
    display: flex;
    gap: 20px;
}

.nav-bar li {
    display: inline;
}

.nav-bar a {
    text-decoration: none;
    color: #000;
    font-weight: bold;
}

.nav-right {
    display: flex;
    align-items: center;
    gap: 20px;
}

.cart-icon img {
    width: 30px;
    height: 30px;
}

/* Dropdown styles */
.dropdown {
    position: relative;
    display: inline-block;
}

.dropbtn {
    background-color: #f8f9fa;
    color: #000;
    font-weight: bold;
    border: none;
    cursor: pointer;
    padding: 10px;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #ddd;
}
</style>

<header>
    <nav>
        <div class="row1">
            <a href="Landingpage.php"><img src="Image/lighthouselogo.png" alt="Coffeeshop" class="logo"></a>
            <ul class="nav-bar">
                <li><a href="Landingpage.php">Home</a></li>
                <li><a href="Menu.php">Menu</a></li>
                <li><a href="About Us.php">About Cafe</a></li>
                <li><a href="Contact Us.php">Contact Us</a></li>
                <li><a href="Feedback Form.php">Reviews</a></li>
                <?php if (!isset($_SESSION['userID'])): ?>
                    <li><a href="Signup-Login.php">Login/Signup</a></li>
                <?php endif; ?>
            </ul>
            <div class="nav-right">
                <a href="ATC.php" class="cart-icon">
                    <img src="Image/finalcart.png" alt="Cart Logo">
                </a>
                <?php if (isset($_SESSION['userID'])): ?>
                    <div class="dropdown">
                        <button class="dropbtn"><?php echo ucwords(strtolower($_SESSION['fullname'])); ?></button>
                        <div class="dropdown-content">
                            <a href="logout.php">Logout</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>
