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
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Convert username to lowercase for case-insensitive comparison
    $email = strtolower($email);

    // Check if username already exists in the database (case-insensitive)
    $check_username_query = "SELECT * FROM users WHERE LOWER(email) = '$email'";
    $result = $conn->query($check_username_query);

    if ($result->num_rows > 0) {
        echo "<script>alert('email already exists in the database. Please use a different email.');</script>";
        echo "<script>window.location.href = 'user.php';</script>"; // Redirect back to create user page
        exit; // Stop further execution of the script
    } else {
        // Prepare and bind SQL statement
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $first_name, $last_name, $email, $password);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<div class='page_title'><h1>Welcome to ShelfSwap $first_name!</h1></div>";
            ?>
            <h2 class="page_title">Lets Get Started</h2>
            <?php
             echo "<script>setTimeout(function() { window.location.href = 'browse.php?username=" . urlencode($email) . "'; }, 3000);</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    }
}

// Close connection
$conn->close();
?>

<?php include 'footer.php'; ?>

</body>
</html>