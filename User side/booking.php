<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Booking</title>
    <link rel="stylesheet" href="booking.css">
</head>
<body>
    <header>
        <div class="container">
            <a href="Mainpage.html" class="logo-link">
                <h1 style="color: yellow;">One Byte Foods</h1>
            </a>
            <nav>
                <ul>
                    <li><a href="booking.php" class="active">Bookings</a></li>
                    <li><a href="contactUS.php">Contact Us</a></li>
                    <?php
                    session_start(); // Start session at the beginning of the file

                    // Check if the user is logged in
                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                        echo '<li><a href="logout.php">Logout</a></li>'; // Change to "Logout" if logged in
                    } else {
                        echo '<li><a href="login.php">Login</a></li>'; // Change to "Login" if not logged in
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </header>
    <h2>Book Your Table</h2>
    <div class="column">
        <a href="2table.php"><div class="table-box">Table for 2</div></a>
        <a href="4table.php"><div class="table-box">Table for 4</div></a>
        <a href="6table.php"><div class="table-box">Table for 6 and more</div></a>
    </div>
</body>
</html>
