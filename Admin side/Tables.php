<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Booking</title>
    <link rel="stylesheet" href="Table.css">
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

    <h2>Tables</h2>
    <div class="column">
        <a href="http://localhost/One%20Byte%20Food%20Restaurant/Admin%20side/Tables2.php"><div class="table-box">Table for 2</div></a>
        <a href="http://localhost/One%20Byte%20Food%20Restaurant/Admin%20side/Tables4.php"><div class="table-box">Table for 4</div></a>
        <a href="http://localhost/One%20Byte%20Food%20Restaurant/Admin%20side/Tables6.php"><div class="table-box">Table for 6 and more</div> </a>
    </div>

</body>
</html>
