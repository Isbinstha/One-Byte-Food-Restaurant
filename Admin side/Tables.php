<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Byte Foods</title>
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
    
    <header>
        
        <div class="container">
            <a href="adminMainpage.html">
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
            <!-- First column -->
            <div class="column">
                <div class="table-box">Table 1</div>
                <div class="table-box">Table 2</div>
                <div class="table-box">Table 3</div>
                <div class="table-box">Table 4</div>
                <div class="table-box">Table 5</div>
            </div>
            <!-- Second column -->
            <div class="column1">
                <div class="table-box">Table 6</div>
                <div class="table-box">Table 7</div>
                <div class="table-box">Table 8</div>
                <div class="table-box">Table 9</div>
                <div class="table-box">Table 10</div>
            </div>
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