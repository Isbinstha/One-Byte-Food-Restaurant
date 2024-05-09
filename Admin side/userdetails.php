<?php
// Connect to database
$conn = new mysqli("localhost", "root", "", "one_byte_foods");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT ID, Name, Email, Phone_Number FROM signup";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link rel="stylesheet" href="userdetails.css">
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
    <h2>Customers</h2>
    <div class="container">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["ID"]."</td><td>".$row["Name"]."</td><td>".$row["Email"]."</td><td>".$row["Phone_Number"]."</td></tr>";
                }
            } else {
                echo "<tr><td colspan='2'>0 results</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
