<?php
    // Database connection parameters
    $servername = "localhost";
    $username = "uxv8sl1ts3vhy";
    $password = "1*@El&1_68&l";
    $dbname = "dbikb3jnjnetbs";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_POST['id'];
    $username = $_POST['username'];
    $price = 0;
    $isbn = 0;
    $cart_num = 0;

    $sql = "SELECT price, ISBN FROM Books WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetching row data
        $row = $result->fetch_assoc();
        
        // Storing price and ISBN in variables
        $price = $row["price"];
        $isbn = $row["ISBN"];
    } else {
        echo "No results found";
    }

    $sql = "SELECT cart FROM users WHERE email = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetching row data
        $row = $result->fetch_assoc();
        
        // Storing cart value in a variable
        $cart_num = $row["cart"];

    } else {
        echo "No results found for email: $username";
    }

    $sql = "INSERT INTO all_carts (cart_num, isbn, price) VALUES ('$cart_num', '$isbn', '$price')";
    $result = $conn->query($sql);

    $conn->close();

    // Redirect to browse.php with username parameter
    header("Location: browse.php?username=$username");
    exit();
?>