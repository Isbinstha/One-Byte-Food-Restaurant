<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Booking</title>
    <link rel="stylesheet" href="adminBooking.css">
    <style>
        /* CSS for the table border */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #333; 
            padding: 5px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr {
            background-color: #f2f2f2;
        }
    </style>
    
</head>
<body>
    <!-- Existing header and navigation code -->
    <header>
        <div class="container">
            <a href="adminMainpage.html" class="logo-link">
                <h1>One Byte Foods</h1>
            </a>
            <nav>
                <ul>
                    <li><a href="adminBooking.php"><b>Bookings</b></a></li>
                    <li><a href="http://localhost/One%20Byte%20Food%20Restaurant/Admin%20side/userDetails.php"><b>User Details</b></a></li>
                    <li><a href="Tables.php"><b>Tables</b></a></li>
                    <li><a href="feedback.php"><b>Feedbacks</b></a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="booking-container">
        <?php
        $servername = "localhost";
        $username = "root"; // Replace with your MySQL username
        $password = ""; // Replace with your MySQL password
        $database = "one_byte_foods"; // Replace with your database name
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Update table availability if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tableId = $_POST["TableID"];
            $newAvailability = $_POST["Availability"];

            $sql = "UPDATE tables SET Availability='$newAvailability' WHERE TableID='$tableId'";
            if ($conn->query($sql) === TRUE) {
                echo "Table availability updated successfully.";
            } else {
                echo "Error updating table availability: " . $conn->error;
            }
        }
        ?>
    
        <div class="table-selection">
            <?php
            // Establish database connection
            $servername = "localhost";
            $username = "root"; // Replace with your MySQL username
            $password = ""; // Replace with your MySQL password
            $database = "one_byte_foods"; // Replace with your database name
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
                    // Add appropriate class based on the table status
                    $status_class = "Availability";
                    if ($row["Availability"] == "unavailable") {
                        $status_class = "unavailable";
                    } elseif ($row["Availability"] == "sold-out") {
                        $status_class = "sold-out";
                    } elseif ($row["Availability"] == "my-seat") {
                        $status_class = "my-seat";
                    } elseif ($row["Availability"] == "reserved") {
                        $status_class = "reserved";
                    } else {
                        $status_class = "available";
                    }

                    echo '<div class="column">';
                    // Add the class to the table-box
                    echo '<div class="table-box ' . $status_class . '">' . $row["TableName"] . '</div>';

                    // Form to update availability
                    echo '<form method="post">';
                    echo '<input type="hidden" name="TableID" value="' . $row["TableID"] . '">';
                    echo '<select name="Availability' . $row["TableID"] . '">';
                    echo '<option value="unavailable">Unavailable</option>';
                    echo '<option value="sold-out">Sold Out</option>';
                    echo '<option value="available">Available</option>';
                    echo '<option value="my-seat">My Seat</option>';
                    echo '<option value="reserved">Reserved</option>';
                    echo '</select>';
                    echo '<input type="submit" value="Update">';
                    echo '</form>';

                    echo '</div>';
                }
            } else {
                echo "0 tables found.";
            }
            $conn->close();
            ?>
        </div>

        <!-- Legend for table status -->
        <div class="legend">
            <div><span class="dot unavailable"></span>Unavailable</div>
            <div><span class="dot sold-out"></span>Sold Out</div>
            <div><span class="dot available"></span>Available</div>
            <div><span class="dot my-seat"></span>My Seat</div>
            <div><span class="dot reserved"></span>Reserved</div>
        </div>

    </div>
</body>
</html>
