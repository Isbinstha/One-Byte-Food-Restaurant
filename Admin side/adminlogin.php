<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
    
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
    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var email = document.getElementById("Email").value;

            if (username.match(/\d/)) {
                alert("Name cannot contain numbers.");
                return false;
            }

            if (email !== "admin@gmail.com") {
                alert("Only 'admin@gmail.com' is allowed for admin login.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Admin Login</h1>
        <form id="login-form" method="post" action="adminlogin.php" onsubmit="return validateForm();">
            <p><b>Name :</b></p><input type="text" placeholder="username" name="username" id="username" required>
            <p><b>Email :</b></p> <input type="text" placeholder="Email" name="Email" id="Email" required>
            <p><b>Password :</b></p><input type="password" placeholder="Password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conn = mysqli_connect("localhost", "root", "", "one_byte_foods");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Sanitize input
        $name = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['Email']);
        $pass = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "SELECT * FROM admin WHERE Name='$name' AND Email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // User exists, verify password
            $row = $result->fetch_assoc();
            $db_pass = $row['Password']; // Retrieve password from database
            if ($pass === $db_pass)  {
                echo "<script>alert('Login successful.'); window.location='adminMainpage.html';</script>";
            } else {
                echo "<script>alert('Incorrect password.');</script>";
            }
        } 

        $conn->close();
    }
    ?>



    <script>
        
    </script>
</body>
</html>
