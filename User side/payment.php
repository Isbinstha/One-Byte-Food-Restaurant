<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="payment.css"> 
</head>
<body>
    <header>
        <div class="container">
            <a href="Mainpage.php" class="logo-link">
                <h1>One Byte Foods</h1>
            </a>
            <nav>
                <ul>
                    <li><a href="booking.php" class="active">Bookings</a></li>
                    <li><a href="contactUS.php">Contact Us</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="payment-container">
        <h2>Payment</h2>
        <form action="payment_process.php" method="post"> <!-- Assuming payment processing script is payment_process.php -->
            <div class="payment-option">
                <input type="text" name="amount" placeholder="Amount">
            </div>
            <div class="payment-option">
                <input type="checkbox" id="esewa" name="payment_method" value="eSewa">
                <label for="esewa">Pay via eSewa</label>
            </div>
            <div class="payment-option">
                <input type="checkbox" id="khalti" name="payment_method" value="Khalti">
                <label for="khalti">Pay via Khalti</label>
            </div>
            <div class="payment-option">
                <input type="checkbox" id="bank" name="payment_method" value="Bank">
                <label for="bank">Pay via Bank</label>
            </div>
            <div class="remarks">
                <textarea name="remarks" placeholder="Remarks"></textarea>
            </div>
            <div class="payment-option">
                <button type="submit">Buy</button>
            </div>
        </form>
    </div>
</body>
</html>
