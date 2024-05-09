<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>New Admin</title>
    <!-- <script>
        function validateForm() {
            var email = document.getElementById("email").value;
            if (email.indexOf("@admin.com") == -1) {
                alert("Please enter a valid admin email address.");
                return false;
            }
            return true;
        }
    </script> -->
</head>
<body>
    <div class="container">
        
        <h1>New Admin</h1>
        <form id="signup-form" method="post" action="adminadd.php" onsubmit="return validateForm();">
            <p><b>Name :</b></p><input type="text" placeholder="Username" name="username" id="username" required>
            <p><b>Email :</b></p><input type="email" placeholder="Email" name="email" id="email" required>
            <p><b>Password :</b></p><input type="password" placeholder="Password" name="password" id="password" required>
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
    $password = $_POST["password"];

    // Insert data into the database
    $sql = "INSERT INTO admin (Name, Email,  Password) VALUES ('$username', '$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        // Data inserted successfully, redirect to login page
        header("Location: adminlogin.php");
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
