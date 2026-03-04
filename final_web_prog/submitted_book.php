
<html>
    <head>
        <title>Submitted Book - ShelfSwap</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type = "text/css" href= "style.css">
        <?php include 'header.php'; ?>
        <meta charset="utf-8">
        <style type=text/css>
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
        </style>
    </head>
</html>

<?php
    // Retrieve ISBN, quality, and price from the URL parameters
    $isbn = $_GET['isbn'];
    $quality = $_GET['quality'];
    $price = $_GET['price'];
    $title = $_GET['title'];
    $author = $_GET['author'];
    $image = $_GET['image'];
    $pub = $_GET['pub'];
    $pubDate = $_GET['pubDate'];

    // Database connection parameters
    $servername = "localhost";
    $username = "uxv8sl1ts3vhy";
    $password = "1*@El&1_68&l";
    $dbname = "dbikb3jnjnetbs";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $description = isset($_GET['description']) ? $conn->real_escape_string($_GET['description']) : '';

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data into the book_collection table
    $sql = "INSERT INTO Books (ISBN, quality, price, title, author, description, image, publisher, publishedDate) VALUES ('$isbn', '$quality', '$price', '$title', '$author', '$description', '$image', '$pub', '$pubDate')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='success-message'>New book added successfully. Please continue browsing!</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
    include 'footer.php';
?>