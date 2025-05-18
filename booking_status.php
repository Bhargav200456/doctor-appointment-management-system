<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$booking_id = "";
$booking_details = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_id = $_POST['booking_id'];

    $stmt = $conn->prepare("SELECT table_number, date, time FROM reservations WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $booking_id, $_SESSION['user_id']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($table_number, $date, $time);
        $stmt->fetch();
        $booking_details = "Table: $table_number | Date: $date | Time: $time";
    } else {
        $booking_details = "No booking found for this ID.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Status</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <header>
        <h1>Check Booking Status</h1>
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
        <form action="booking_status.php" method="POST">
            <label for="booking_id">Enter Booking ID:</label>
            <input type="number" name="booking_id" required>
            <button type="submit">Check Status</button>
        </form>
        <?php if ($booking_details) echo "<p style='color:green;'>$booking_details</p>"; ?>
    </main>
</body>
</html>
