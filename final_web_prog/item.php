<!DOCTYPE html>
<html>
    <head>
        <title>View Book</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
        </script>
        <?php include 'header.php'; ?>
        <script>
            $(document).ready(function() {
                $(".add").click(function() {
                    // Check if username is provided
                    var username = "<?php echo isset($_GET['username']) ? htmlspecialchars($_GET['username']) : ''; ?>";
                    if (!username) {
                        alert("Error: please log in to add to cart");
                        return false; // Stop button execution
                    }

                    // Gather book ID
                    var bookId = "<?php echo isset($_GET['id']) ? htmlspecialchars($_GET['id']) : ''; ?>";

                    // Create a form dynamically
                    var form = $("<form>").attr({
                        method: "post",
                        action: "add_to_cart.php"
                    }).css("display", "none");

                    // Append bookId and username as hidden inputs
                    form.append($("<input>").attr({
                        type: "hidden",
                        name: "id",
                        value: bookId
                    }));
                    form.append($("<input>").attr({
                        type: "hidden",
                        name: "username",
                        value: username
                    }));

                    // Append the form to body and submit it
                    $("body").append(form);
                    form.submit();
                });
            });
        </script>

        <style>
            h1 {
                font-family: SourceSerif;
                margin: 0;
            }

            img {
                display: inline;
                width: 240px;
                object-fit: cover;
                align-self: flex-start;
                border-radius: 5px;
            }

            .infoFlex {
                display: inline-flex;
                flex-direction: column;
                justify-content: left;
                margin-right: 200px;
            }

            .container {
                display: flex;
                width: 100%;
                margin: 60px 0;
            }

            p {
                font-family: SourceSerif;
                margin-bottom: 0;
            }

            .price {
                font-size: 36px;
                font-weight: bold;
                font-family: Roboto;
                padding: 10px 0;
            }

            .page_author {
                font-size: 21px;
                font-family: Roboto;
                margin: 20px 0;
            }

            .add {
                width: 120px;
                height: 36px;
                font-size: 18px;
                color: #ffffff;
                font-family: Roboto;
                padding: 0 10px;
                background-color: #264653;
                align-content: center;
                text-align: center;
                float: right;
                align-self: center;
                border-radius: 6px;
                margin-left: 60px; 
                border-style: solid;
                border-color: #264653;
                border-width: 2px;
            }

            .add:hover {
                color: #264653;
                background-color: #ffffff;
                cursor: pointer;
            }

            .image_container {
                display: flex;
                flex-direction: column;
                padding: 0 100px 0 200px;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <div class="image_container">
            <?php
                $titleVal = "";
                $authorVal = "";
                $priceVal = 0;
                $descVal = "";
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

                $id = $_GET['id'];

                // Query to retrieve book information
                $sql = "SELECT * FROM Books WHERE id=$id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Display book information
                    $row = $result->fetch_assoc();
                    $titleVal = $row['title'];
                    $authorVal = $row['author'];
                    $priceVal = $row['price'];
                    $descVal = $row['description'];
                    ?>
                    <img id="coverImg" src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
                    <p>IBSN: <span id="IBSN"><?php echo $row['ISBN']; ?></span></p>
                    <p>Quality: Good<span id="quality"></span></p>
                    <p>Publisher: <span id="publisher"><?php echo $row['publisher']; ?></span></p>
                    <p>Published: <span id="published"><?php echo $row['publishedDate']; ?></span></p>
                    <?php
                } else {
                    echo "0 results";
                }

                // Close connection
                $conn->close();
            ?>
            </div>
            <div class="infoFlex">
                <h1 id="title"><?php echo $titleVal; ?></h1>
                <p class="page_author">by: <?php echo $authorVal; ?><span id="author"></span></p>
                <div style="display: flex;">
                <?php
                    $formattedPrice = '$' . number_format($priceVal, 2);
                ?>
                    <span id="price" class="price"><?php echo $formattedPrice; ?></span>
                    <span class="add">Add To Cart</span>
                </div>
                <p id="description"><?php echo $descVal; ?></p>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>