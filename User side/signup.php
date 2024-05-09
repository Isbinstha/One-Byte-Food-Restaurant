<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Sign Up</title>
    <script>
        function validateForm() {
            var email = document.getElementById("email").value;
            if (email.indexOf("@gmail.com") == -1) {
                alert("Please enter a valid email address.");
                return false;
            }
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("signup-confirmpassword").value;
            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Sign Up</h1>
        <form id="signup-form" method="post" action="signup.php" onsubmit="return validateForm()"> <!-- Modified action attribute -->
            <p><b>Name :</b></p><input type="text" placeholder="Username" name="username" id="username" required>
            <p><b>Email :</b></p><input type="email" placeholder="Email" name="email" id="email" required>
            <p><b>Phone Number :</b></p><input type="tel" placeholder="Phone Number" name="phone" id="phone" required>
            <p><b>Password :</b></p><input type="password" placeholder="Password" name="password" id="password" required>
            <p><b>Confirm Password :</b></p><input type="password" placeholder="reType" id="signup-confirmpassword" required>
            <button type="submit"><b>Sign Up</b></button>
        </form>
    </div>       
<?php
$conn = mysqli_connect("localhost", "root", "", "one_byte_foods");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    // Insert data into the database
    $sql = "INSERT INTO signup (Name, Email, Phone_Number, Password) VALUES ('$username', '$email', '$phone', '$password')";
    if (mysqli_query($conn, $sql)) {
        // Data inserted successfully, redirect to login page
        header("Location: login.html");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>

</body>
</html>
