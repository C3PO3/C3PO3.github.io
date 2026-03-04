<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .container {
            width: 60%; 
            margin: auto;
        }

        /* Styling the books grid */
        .books-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); 
            gap: 0px; 
            margin-top: 20px;
            justify-content:center;

        }

        /* Styling for each book */
        .book {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-align: center;
            margin:10px;
        }

        /* Styling for the book image */
        .book img {
            width: 100px; 
            height: 150px; 
            margin: auto;
        }

        .book .author {
            margin-right:50px;
        }

        .book .price {
            margin-left:70px
        }

        /* Styling for warning and empty cart messages */
        .warning-message, .empty-cart-message {
            text-align: center;
            margin: 20px;
            padding: 10px;
            border-radius: 4px;
            font-weight: bold;
        }

        .warning-message {
            color: #d9534f;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
        }

        .empty-cart-message {
            color: #264653;
            background-color: #f9f9f9;
            border: 1px solid #264653;
        }

        /* Styling for links within warning messages */
        .warning-message a {
            color: #d9534f;
            text-decoration: none;
            font-weight: bold;
        }

        .warning-message a:hover {
            text-decoration: underline;
        }

        .purchase-section {
            text-align: center;
            margin-top: 20px; 
            margin-bottom:20px;
        }

        .purchase-button {
            padding: 10px 20px;
            background-color: #2A9D8F; 
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }

        .purchase-button:hover {
            background-color: #45a049; /* Darker green on hover */
        }
    </style>
</head>
<body>

<?php
    include 'header.php';
?>

<div class="container">
    <div class="page_title">
        <h1>Shopping Cart</h1>
    </div>

    <!-- Add code here to use the associative array and display like browse -->
    <?php
        // Database connection details
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

        if (isset($_GET['username'])) {
            $username = $conn->real_escape_string($_GET['username']);
    
            // Query to retrieve the user's email from the users table
            $user_query = "SELECT email FROM users WHERE email = '$username'";
            $user_result = $conn->query($user_query);
    
            // Check if user exists
            if ($user_result->num_rows > 0) {
                // Fetch the user's email
                $row = $user_result->fetch_assoc();
                $email = $row['email'];
    
                // Query to retrieve the cart value from the users table
                $cart_query = "SELECT cart FROM users WHERE email = '$email'";
                $cart_result = $conn->query($cart_query);
    
                // Check if cart value is retrieved
                if ($cart_result->num_rows > 0) {
                    // Fetch the cart value
                    $row = $cart_result->fetch_assoc();
                    $cart_value = $row['cart'];
    
                    // Query to retrieve all rows from the all_carts table with matching cart value
                    $all_carts_query = "SELECT * FROM all_carts WHERE cart_num = '$cart_value'";
                    $all_carts_result = $conn->query($all_carts_query);
    
                    // Check if rows are retrieved
                    if ($all_carts_result->num_rows > 0) {
                        echo '<div class="books-grid">';
                        
                        // Output the rows from all_carts table
                        while ($row = $all_carts_result->fetch_assoc()) {
                            $isbn = $row['isbn'];
                            $price = $row['price'];
    
                            // SQL query to search for a book with the given ISBN and price
                            $sql = "SELECT * FROM Books WHERE ISBN = '$isbn' AND price = '$price'";
    
                            // Execute the query
                            $result = $conn->query($sql);
    
                            // Check if any rows are returned
                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<div class='book' onclick='toggleDescription(this)'>";
                                    echo "<img src='" . $row['image'] . "' class='bookImage'>";
                                    echo "<div class='book-detail'>";
                                    echo "<div class='title'>Title: " . $row['title'] . "</div>";
                                    echo "<div class='author'>" . $row['author'] . "</div><br>";
                                    echo "<div class='price'>Price: " . $row['price'] . "</div><br>";
                                    echo "<div class='quality'>Quality: " . $row['quality'] . "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                                
                            } else {
                                echo "No book found with the given ISBN and price.";
                            }
                        }
                        echo '</div>';
                        echo '<div class="purchase-section">';
                        echo '<a href="checkout.php?username=' . htmlspecialchars($_GET['username']) . '" class="purchase-button">Proceed to Checkout</a>';
                        echo '</div>';
                        
                        echo '</div>';
                    } else {
                        echo '<div class="empty-cart-message">Cart is Empty</div>';
                    }
                } else {
                    echo "Failed to retrieve cart value for user with email: " . $email;
                }
            } else {
                echo "User not found with username: " . $username;
            }
        } else {
            echo "<div class='warning-message'>";
            echo "Username not provided. <a href='user.php'>Please log in or make an account!</a>";
            echo "</div>";
        }

        // Close connection
        $conn->close();
    ?>

</div>

<?php
    include 'footer.php';
?>

</body>
</html>
<!-- Note:
    INSERT INTO all_carts (cart_num, isbn, price) VALUES (2, 2147483647, 10);
-->