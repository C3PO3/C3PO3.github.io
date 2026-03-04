<!DOCTYPE html>
<html>
<head>
    <title>User Information</title>
    <link rel="stylesheet" type = "text/css" href= "style.css">
</head>

<body>
<?php
include 'header.php';

// Your database connection code
$servername = "localhost";
$username = "uxv8sl1ts3vhy";
$password = "1*@El&1_68&l";
$database = "dbikb3jnjnetbs";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $passwordin = isset($_POST['password']) ? $_POST['password'] : '';

    // Convert email to lowercase for case-insensitive comparison
    $email = strtolower($email);

    // Check if email already exists in the database (case-insensitive)
    $check_email_query = "SELECT * FROM users WHERE LOWER(email) = '$email'";
    $result = $conn->query($check_email_query);

    if ($result->num_rows < 1) {
        echo "<script>alert('No Account Associates with that email $email');</script>";
        echo "<script>window.location.href = 'user.php';</script>"; // Redirect back to login
        exit; // Stop further execution of the script
    } else {
        // Fetch the password from the result set
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];
        $name = $row['first_name'];

        // Check if the provided password matches the stored password
        if ($stored_password === $passwordin) {
            echo "<div class='page_title'><h1>Welcome Back $name!</h1></div>";
            echo "<script>setTimeout(function() { window.location.href = 'browse.php?username=" . urlencode($email) . "'; }, 3000);</script>";
        } else {
            echo "<script>alert('Incorrect Password');</script>";
            echo "<script>window.location.href = 'user.php';</script>"; // Redirect back to login
        }
    }
}

// Close connection
$conn->close();
?>

<?php include 'footer.php'; ?>

</body>
</html>
