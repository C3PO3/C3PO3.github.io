<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    .success-message {
            text-align: center;
            margin: 20px;
            padding: 10px;
            border-radius: 4px;
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            font-weight: bold;
        }

        .empty-cart-message {
            text-align: center;
            margin: 20px;
            padding: 10px;
            border-radius: 4px;
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            font-weight: bold;
        }

        .warning-message {
            text-align: center;
            margin: 20px;
            padding: 10px;
            border-radius: 4px;
            color: #856404;
            background-color: #fff3cd;
            border: 1px solid #ffeeba;
            font-weight: bold;
        }
    </style>

</head>

<?php
include 'header.php';

$servername = "localhost";
$username = "uxv8sl1ts3vhy";
$password = "1*@El&1_68&l";
$dbname = "dbikb3jnjnetbs";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the form data from POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $address = $conn->real_escape_string($_POST['address']);
    $payment_info = $conn->real_escape_string($_POST['payment']);
    $username = $conn->real_escape_string($_POST['username']);

    // Retrieve the user's email and cart value
    $user_query = "SELECT email, cart FROM users WHERE email = '$username'";
    $user_result = $conn->query($user_query);

    // Check if the user exists and cart value is retrieved
    if ($user_result->num_rows > 0) {
        // Fetch the user's email and cart value
        $row = $user_result->fetch_assoc();
        $email = $row['email'];
        $cart_value = $row['cart'];

        // Query to retrieve all rows from the all_carts table with matching cart value
        $all_carts_query = "SELECT * FROM all_carts WHERE cart_num = '$cart_value'";
        $all_carts_result = $conn->query($all_carts_query);

        if ($all_carts_result->num_rows > 0) {
            // Iterate over the rows and delete them from the all_carts table and Books table
            while ($row = $all_carts_result->fetch_assoc()) {
                $isbn = $row['isbn'];
                $price = $row['price'];

                // Remove the book from the all_carts table
                $delete_cart_query = "DELETE FROM all_carts WHERE cart_num = '$cart_value' AND isbn = '$isbn'";
                $conn->query($delete_cart_query);

                // Remove the book from the Books table based on ISBN
                $delete_books_query = "DELETE FROM Books WHERE ISBN = '$isbn'";
                $conn->query($delete_books_query);
            }

            // Output a success message
            echo "<div class='success-message'>Checkout successful! Thank you for purchasing from ShelfSwap.</div>";
        } else {
            echo "<div class='empty-cart-message'>Cart is empty. No books to remove.</div>";
        }
    } else {
        echo "Failed to retrieve user information.";
    }
} else {
    echo "<div class='warning-message'>Invalid request method.</div>";
}

// Close the database connection
$conn->close();

include 'footer.php';
?>