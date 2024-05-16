<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <header>
        <div class="container">
            <a href="Mainpage.html" class="logo-link">
                <h1 style="color: yellow;">One Byte Foods</h1>
            </a>
            <nav>
                <ul>
                    <li><a href="booking.php">Bookings</a></li>
                    <li><a href="contactUS.php" class="active">Contact Us</a></li>
                    <?php
                    session_start(); 

                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                        echo '<li><a href="logout.php">Logout</a></li>'; 
                    } else {
                        echo '<li><a href="login.php">Login</a></li>'; 
                    }
                    ?>
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
        <form class="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" id="name" name="name" placeholder="Your Name" required>
            <input type="email" id="email" name="email" placeholder="Your Email" required>
            <textarea id="message" name="message" rows="4" placeholder="Your Message" required></textarea>
            <br>
            <button type="submit">Send Message</button>
        </form>
        <?php
        

        // Database connection parameters
        $servername = "localhost";
        $username = "root"; 
        $password = ""; 
        $dbname = "one_byte_foods";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $message = $_POST["message"];

            // Check if the user exists in the users table
            $check_user_query = "SELECT * FROM users WHERE username='$name' AND email='$email'";
            $check_user_result = $conn->query($check_user_query);

            if ($check_user_result->num_rows > 0) {
                $insert_feedback_query = "INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($insert_feedback_query);
                $stmt->bind_param("sss", $name, $email, $message);

                if ($stmt->execute()) {
                    echo 'Message sent successfully.';
                } else {
                    echo 'Error message is unable to sent.';
                }

                // Close statement
                $stmt->close();
            } else {
                // User doesn't exist in the users table
                echo 'You need to sign up first before sending a message.';
            }
        }

        // Close connection
        $conn->close();
        ?>
    </div>
</body>
</html>
