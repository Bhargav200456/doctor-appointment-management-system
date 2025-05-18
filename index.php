<?php
session_start();
include 'php/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Management</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <header>
        <h1>Welcome to Our Restaurant</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="pages/menu.php">Menu</a></li>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li><a href="php/reserve.php">Reservations</a></li>
                    <li><a href="php/check_booking.php">Check Booking</a></li>
                    <li><a href="php/logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="php/login.php">Login</a></li>
                    <li><a href="php/signup.php">Signup</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    
    <main>
        <h2>Enjoy the best dining experience</h2>
        <p>Explore our menu and reserve a table now!</p>
    </main>
</body>
</html>
