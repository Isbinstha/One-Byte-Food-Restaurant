<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Booking</title>
    <link rel="stylesheet" href="tables.css">
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

            <div class="action">
                <form id="tableForm" method="post">
                    <label for="table_name">Table Name:</label>
                    <input type="text" id="table_name" name="table_name" required><br>
                    <br>
                    <label for="availability">Availability:</label>
                    <select id="availability" name="availability" required>
                        <option value="unavailable">Unavailable</option>
                        <option value="sold-out">Sold Out</option>
                        <option value="available">Available</option>
                        <option value="my-seat">My Seat</option>
                        <option value="reserved">Reserved</option>
                    </select><br>
                    <br>
                    <button type="submit" name="add_table">Add Table</button><br>
                    <br>
                    <button type="submit" name="delete_table">Delete Table</button>
                </form>
                <div class="message" >

                
                <?php
                // Handling form submission for adding/deleting tables
                if(isset($_POST['add_table']) || isset($_POST['delete_table'])) {
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

                    if(isset($_POST['add_table'])) {
                        $tableName = $_POST['table_name'];
                        $availability = $_POST['availability'];

                        // Perform the SQL query to add a new table
                        $sql = "INSERT INTO tables (TableName, Availability) VALUES ('$tableName', '$availability')";
                        if ($conn->query($sql) === TRUE) {
                            echo "<p>New table added successfully.</p>";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }

                    if(isset($_POST['delete_table'])) {
                        $tableName = $_POST['table_name'];

                        // Perform the SQL query to delete a table
                        $sql = "DELETE FROM tables WHERE TableName='$tableName'";
                        if ($conn->query($sql) === TRUE) {
                            echo "<p id='successMsg'>Table deleted successfully.</p>";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                    $conn->close();
                }
                ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to remove the success message after a delay
        function removeSuccessMessage() {
            var successMsg = document.getElementById('successMsg');
            if (successMsg) {
                setTimeout(function() {
                    successMsg.remove();
                }, 3000); // Remove after 3 seconds (adjust as needed)
            }
        }

        // Call the function when the page loads
        window.onload = function() {
            removeSuccessMessage();
        };
    </script>
</body>
</html>
