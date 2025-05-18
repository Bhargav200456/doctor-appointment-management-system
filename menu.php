<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="../styles/styles.css">

    <script>
        function showDescription(dishName, description) {
            document.getElementById('dish-title').innerText = dishName;
            document.getElementById('dish-description').innerText = description;
            document.getElementById('dish-modal').style.display = 'flex';
        }
        function closeModal() {
            document.getElementById('dish-modal').style.display = 'none';
        }
    </script>
</head>
<body>
    <header>
        <h1>Menu</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>  <!-- Redirects to index.php -->
                <li><a href="menu.php">Menu</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Our Dishes</h2>
        <div class="menu-container">
            <?php 
            $dishes = [
                "Margherita Pizza" => "Classic pizza with tomato sauce, mozzarella cheese, and fresh basil.",
                "Cheeseburger" => "Juicy beef patty with cheddar cheese, lettuce, tomato, and pickles.",
                "Caesar Salad" => "Crisp romaine lettuce, croutons, parmesan cheese, and Caesar dressing.",
                "Grilled Chicken" => "Tender grilled chicken breast served with vegetables.",
                "Pasta Alfredo" => "Creamy Alfredo sauce with fettuccine pasta and parmesan cheese."
            ];

            foreach ($dishes as $dishName => $description) {
                echo "<div class='menu-item' onclick=\"showDescription('$dishName', '$description')\">$dishName</div>";
            }
            ?>
        </div>
    </main>

    <div id="dish-modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="dish-title"></h2>
            <p id="dish-description"></p>
        </div>
    </div>
</body>
</html>
