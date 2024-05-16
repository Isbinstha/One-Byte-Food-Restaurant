<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Booking</title>
    <link rel="stylesheet" href="tables.css">
    <style>
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
        h2 {
            color: White;
            text-align: center;
            font-size: 40px; 
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <a href="adminMainpage.html" class="logo-link">
                <h1 style="color: yellow;">One Byte Foods</h1>
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
    <h2>Table 4</h2>
    <div class="booking-container">
        <?php
        // Establish database connection
        $servername = "localhost";
        $username = "root"; 
        $password = ""; 
        $database = "one_byte_foods"; 
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Error message variable
        $error_message = "";

        // Handling form submission for updating table availability
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            if(isset($_POST["TableID"]) && isset($_POST["Availability"])) {
                $tableId = $_POST["TableID"];
                $newAvailability = $_POST["Availability"];

                $sql = "UPDATE tables_four SET Availability='$newAvailability' WHERE TableID='$tableId'";
                if ($conn->query($sql) === TRUE) {
                    $error_message = "Table availability updated successfully.";
                } else {
                    $error_message = "Error updating table availability: " . $conn->error;
                }
            } else {
                $error_message = "TableID or Availability not set.";
            }
        }

        // Handling form submission for adding/deleting tables
        if(isset($_POST['add_table']) || isset($_POST['delete_table'])) {
            if(isset($_POST['add_table'])) {
                $tableName = $_POST['table_name'];
                $availability = $_POST['availability'];
                // Check if the table name already exists
                $check_query = "SELECT * FROM tables_four WHERE TableName='$tableName'";
                $check_result = $conn->query($check_query);

                if ($check_result->num_rows > 0) {
                    $error_message = "Table with this name already exists. Please choose a different name.";
                } else {
                    // Perform the SQL query to add a new table
                    $sql = "INSERT INTO tables_four (TableName, Availability) VALUES ('$tableName', '$availability')";
                    if ($conn->query($sql) === TRUE) {
                        $error_message = "New table added successfully.";
                    } else {
                        $error_message = "Error adding new table: " . $conn->error;
                    }
                }
            }
            if(isset($_POST['delete_table'])) {
                $tableName = $_POST['table_name'];
                // Perform the SQL query to delete a table
                $sql = "DELETE FROM tables_four WHERE TableName='$tableName'";
                if ($conn->query($sql) === TRUE) {
                    $error_message = "Table deleted successfully.";
                } else {
                    $error_message = "Error deleting table: " . $conn->error;
                }
            }
        }
        ?>
        <div class="table-selection">
            <?php
            // Fetch table data from the database
            $sql = "SELECT * FROM tables_four";
            $result = $conn->query($sql);
            // Display tables
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
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
                    echo '<div class="table-box ' . $status_class . '">' . $row["TableName"] . '</div>';
                    echo '<form method="post">';
                    echo '<input type="hidden" name="TableID" value="' . $row["TableID"] . '">';

                    echo '<select name="Availability">'; 
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
                <div class="message">
                    <script>
                    <?php if(!empty($error_message)): ?>
                        alert("<?php echo $error_message; ?>");
                    <?php endif; ?>
                    </script>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
