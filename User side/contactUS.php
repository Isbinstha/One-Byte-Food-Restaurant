<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Booking</title>
    <link rel="stylesheet" href="contact.css">

</head>
<body>
    <header>
        <div class="container">
            <a href="Mainpage.html"class="logo-link">
                <h1>One Byte Foods</h1>
            </a>
            <nav>
                <ul>
                    <li><a href="booking.html" >Bookings</a></li>
                    <li><a href="contactUS.html" class="active">Contact Us</a></li>
                    <li><a href="login.html">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="contact-form-container">
        <div class="contact-info">
            <div class="contact-item">
                <p>Naxal, Kathmandu, Nepal</p>
            </div>
            <div class="contact-item">
                <p>+977-9805567429</p>
            </div>
            <div class="contact-item">
                <p>OneByteFoods@gmail.com</p>
            </div>
        </div>
        <h2>Send Message</h2>
        <form class="contact-form" action="submit_form.php" method="post">
            <input type="text" id="name" name="name" placeholder="Your Name" required>
            <input type="email" id="email" name="email" placeholder="Your Email" required>
            <textarea id="message" name="message" rows="4" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </div> 
</body>
</html>