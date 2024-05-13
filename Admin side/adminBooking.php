<?php
session_start();


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

// Function to fetch booked seats for a specific table type
function fetchBookedSeats($tableType) {
    global $conn;
    $sql = "SELECT * FROM booked_tables_$tableType";
    $result = $conn->query($sql);
    $bookedSeats = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $bookedSeats[] = $row;
        }
    }
    return $bookedSeats;
}

// Fetch booked seats for tables for 2, 4, and 6
$bookedSeatsTwo = fetchBookedSeats("two");
$bookedSeatsFour = fetchBookedSeats("four");
$bookedSeatsSix = fetchBookedSeats("six");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Byte Foods</title>
    <link rel="stylesheet" href="tables.css">
    <style>
        /* CSS for table styling */
        .booking-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .table-selection {
            margin-bottom: 30px;
            width: 100%;
            display: inline-block;
            box-sizing: border-box;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Adjusting the width of the "Table Number" column */
        .table-selection table th:first-child,
        .table-selection table td:first-child {
            width: 20%;
        }

        /* Adjusting the width of the "Name" column */
        .table-selection table th:nth-child(2),
        .table-selection table td:nth-child(2) {
            width: 40%;
        }
    </style>
</head>
<body>
    


    <header>
        <div class="container">
            <a href="adminMainpage.html">
            <h1 style="color: yellow;">One Byte Foods</h1>
            </a>
            <nav>
                <ul>
                    <li><a href="adminBooking.php"><b>Bookings</b></a></li>
                    <li><a href="userdetails.php"><b>User Details</b></a></li>
                    <li><a href="Tables.php"><b>Tables</b></a></li>
                    <li><a href="feedback.php"><b>Feedbacks</b></a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="booking-container">
        <!-- Table for 2 -->
        <div class="table-selection">
            <h2>Tables for 2</h2>
            <table>
                <tr>
                    <th>Table Number</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                <?php foreach ($bookedSeatsTwo as $seat) : ?>
                    <tr>
                        <td><?php echo $seat['table_number']; ?></td>
                        <td><?php echo $seat['user_name']; ?></td>
                        <td><?php echo $seat['user_email']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <!-- Table for 4 -->
        <div class="table-selection">
            <h2>Tables for 4</h2>
            <table>
                <tr>
                    <th>Table Number</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                <?php foreach ($bookedSeatsFour as $seat) : ?>
                    <tr>
                        <td><?php echo $seat['table_number']; ?></td>
                        <td><?php echo $seat['user_name']; ?></td>
                        <td><?php echo $seat['user_email']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <!-- Table for 6 -->
        <div class="table-selection">
            <h2>Tables for 6</h2>
            <table>
                <tr>
                    <th>Table Number</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                <?php foreach ($bookedSeatsSix as $seat) : ?>
                    <tr>
                        <td><?php echo $seat['table_number']; ?></td>
                        <td><?php echo $seat['user_name']; ?></td>
                        <td><?php echo $seat['user_email']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
