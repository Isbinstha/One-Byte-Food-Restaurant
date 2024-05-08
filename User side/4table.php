<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Booking</title>
    <link rel="stylesheet" href="table-design.css">
</head>
<body>
    <!-- Existing header and navigation code -->
    <header>
        <div class="container">
            <a href="Mainpage.html" class="logo-link">
                <h1>One Byte Foods</h1>
            </a>
            <nav>
                <ul>
                    <li><a href="booking.html" class="active">Bookings</a></li>
                    <li><a href="contactUS.html">Contact Us</a></li>
                    <li><a href="login.html">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="booking-container">
        <h1>Select Your Table for 4</h1>
        <!-- Table selection area -->
        <div class="table-selection">
            <?php
            // Establish database connection
            $servername = "localhost";
            $username = "root"; // Replace with your MySQL username
            $password = ""; // Replace with your MySQL password
            $database = "users"; // Replace with your database name
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch table data from the database
            $sql = "SELECT * FROM tables";
            $result = $conn->query($sql);

            // Display tables
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="column">';
                    // Add the class to the table-box
                    echo '<div class="table-box '. '">' . $row["TableName"] . '</div>';
                    echo '</div>';
                }
            } else {
                echo "0 tables found.";
            }
            $conn->close();
            ?>
        </div>
        <div class="Booking-detail">
        <!-- Legend for table status -->
            <div class="legend">
                <div><span class="dot unavailable"></span>Unavailable</div>
                <div><span class="dot sold-out"></span>Sold Out</div>
                <div><span class="dot available"></span>Available</div>
                <div><span class="dot my-seat"></span>My Seat</div>
                <div><span class="dot reserved"></span>Reserved</div>
            </div>
            <div class="TextField">
                <form class="reservation-form">
                    <label for="date"><b>Select Date:</b></label>
                    <input type="date" id="date" name="date" required class="date-input">
                
                    <label for="time"><b>Select Time:</b></label>
                    <input type="time" id="time" name="time" required class="time-input">

                    <label for="Number-of-seats"><b>Number of Seats:</b></label>
                    <input type="text" placeholder="Number of Seats" id="seats" name="seats" required class="seat">

                    <label for="Total-cost"><b>Total Cost:</b></label>
                    <input type="text" placeholder="Total Cost" id="cost" name="cost" required class="cost">
                
                    <button type="submit">Reserve Table</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
