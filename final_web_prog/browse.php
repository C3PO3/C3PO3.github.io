<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Browse</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
        </script>
        <style>
        .no-results-message {
            color: gray;
            font-style: italic;
            padding: 10px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
            margin:20px;
        }
        </style>
    <body>
        <?php include 'header.php'; ?>
        <div class="page_title">
            <h1>BROWSE</h1>
        </div>
        <div class="books-container" id="container">
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

            $query = isset($_GET['query']) ? $_GET['query'] : ''; // Get the query value from the URL parameter
            if (!empty($query)) {
                $sql = "SELECT * FROM Books 
                WHERE title LIKE '%$query%' OR 
                    author LIKE '%$query%' OR 
                    description LIKE '%$query%' OR 
                    ISBN LIKE '%$query%'";
            } else {
                // If no query value is provided, select all books
                $sql = "SELECT * FROM Books";
            }
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    // Display book information
                    echo "<div class='book' id='" . $row['id'] . "'>";
                    ?>
                    <form method='get' action='item.php<?= isset($_GET['username']) ? '?username=' . htmlspecialchars($_GET['username']) : '' ?>'>";
                    <?php
                    echo "<input type='image' src='" . $row['image'] . "' class='bookImage' alt='" . $row['title'] . "'/>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'/>";
                    echo "</form>";
                    echo "<div class='price'>$" . $row['price'] . ".00</div>";
                    echo "<span class='author'>" . $row['author'] . "</span>";
                    echo "<h2>" . $row['title'] . "</h2>";
                    echo "</div>";
                }
            } else {
                echo '<div class="no-results-message">0 results</div>';
            }

            // Close connection
            $conn->close();

        ?>
        </div>
        <?php include 'footer.php'; ?>
  </body>
</html>
