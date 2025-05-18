<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $table_number = $_POST['table_number'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $stmt = $conn->prepare("INSERT INTO reservations (user_id, table_number, date, time) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiss", $user_id, $table_number, $date, $time);

    if ($stmt->execute()) {
        $success = "Reservation successful! Your Booking ID: " . $stmt->insert_id;
    } else {
        $error = "Error booking table.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve a Table</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <header>
        <h1>Reserve a Table</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../menu.php">Menu</a></li>
                <li><a href="../contact.php">Contact</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <form action="reservation.php" method="POST">
            <label for="table_number">Table Number:</label>
            <input type="number" name="table_number" required>
            
            <label for="date">Date:</label>
            <input type="date" name="date" required>
            
            <label for="time">Time:</label>
            <input type="time" name="time" required>
            
            <button type="submit">Book Now</button>
        </form>
        <?php 
        if (isset($success)) echo "<p style='color:green;'>$success</p>";
        if (isset($error)) echo "<p style='color:red;'>$error</p>";
        ?>
    </main>
</body>
</html>
