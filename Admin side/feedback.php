<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Byte Foods - Feedback</title>
    <link rel="stylesheet" href="feedback.css">
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
        h2 {
            text-align: center;
            font-weight: bold;
            color: grey;
            font-size: 30px; 
        }
        .feedback-form{
            background-color: black;
            border-radius: 30px;
            display: flex;
            margin-left: 180px;
            width: 50%;
            padding: 2%;
            background-color: white;
        }
        .feedback-form {
            margin-top: 20px;
        }
        .feedback-form input[type="text"],
        .feedback-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        .feedback-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .feedback-form input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        .message{
            margin-top: 30%;
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
    <h2>Feedbacks</h2>
    <div class="container">
        <?php
            // Database connection parameters
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "one_byte_foods";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch feedback data from the database
            $sql = "SELECT * FROM feedback";
            $result = $conn->query($sql);

            // Display feedback in table format
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th><th>Created At</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td data-feedback-id='" . $row["id"] . "' class='feedback-message'>" . $row["message"] . "</td>";
                    echo "<td>" . $row["created_at"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No feedback available.";
            }
            
            ?>
    </div>
    <div class="feedback-form">
        <form action="" method="post">
            <label for="feedback_id">Enter ID:</label>
            <input type="text" id="feedback_id" name="feedback_id" required>
            <label for="feedback">Feedback:</label>
            <textarea id="feedback" name="feedback" rows="4" required></textarea>
            <input type="submit" name="submit_feedback" value="Submit Feedback">
        </form>
        <div class="message">        <?php
            // Database connection parameters
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "one_byte_foods";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Process form submission
            if(isset($_POST['submit_feedback'])) {
                // Retrieve form data
                $feedback_id = $_POST['feedback_id'];
                $feedback_message = $_POST['feedback'];

                // Update feedback message in the table row with the specified ID
                $sql = "UPDATE feedback SET feedback_message='$feedback_message' WHERE id='$feedback_id'";
                if ($conn->query($sql) === TRUE) {
                    echo "<p class='feedback-message'>Feedback submitted successfully.</p>";
                } else {
                    echo "<p class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }
            }

            $conn->close(); // Close the connection after form submission
        ?>
        </div>

    </div>
</body>
</html>
