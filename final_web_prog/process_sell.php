
<!-- database being manipulated here is a table formatted as:
     isbn    quality     price
 -->

 <html>
    <head>
        <title>Browse - ShelfSwap</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type = "text/css" href= "style.css">
        <?php include 'header.php'; ?>
        <meta charset="utf-8">
        <style type=text/css>
            /* Your CSS styles here */
            .book {
                border: 2px solid #000000;
                padding: 10px;
                margin-bottom: 10px;
                margin-top: 10px;
                transition: background-color 0.3s;
                border-radius: 5px;
            }

            .book:hover {
                background-color: #e1e1e1;     
                cursor: pointer;
            }

            .bookImage {
                width: 100px;
                height: auto;
                margin-right: 10px;
                float: left;
                border-radius: 5px;
            }

            .title {
                font-weight: bold;
            }

            .author {
                font-style: italic;
            }

            .pubDiv, .isbn, .description {
                margin-top: 5px;
            }

            .select-book-message {
                color: 264653;
                font-weight: bold;
                padding: 10px;
                margin-bottom: 20px;
                text-align: center;
            }
        </style>
    </head>
</html>
 
<?php
    echo '<div class="select-book-message"><h1>Select the correct book by clicking the cover image:</h1></div>';
?>

<!-- helper search php code given book name -->
<div class="books-container" id="container">
<?php
    // Function to fetch book data from the API using the provided URL
    function get_book_data($url) {
        $result = file_get_contents($url); // Fetch data from the URL
        $data = json_decode($result, true); // Decode JSON data
        $quality = $_GET["quality"];
        $price = $_GET["price"];

        // Loop through the items and display book information
        foreach ($data['items'] as $item) {
            $volumeInfo = $item['volumeInfo'];
            if (isset($volumeInfo['title']) && isset($volumeInfo['publishedDate'])) {
                $isbn = isset($volumeInfo['industryIdentifiers']) && count($volumeInfo['industryIdentifiers']) > 0 ? $volumeInfo['industryIdentifiers'][0]['identifier'] : "unknown";
                $title = $volumeInfo['title'];
                $author = isset($volumeInfo['authors']) ? implode(", ", $volumeInfo['authors']) : "Unknown";
                $description = isset($volumeInfo['description']) ? htmlspecialchars($volumeInfo['description']) : "Description not available";
                $image = isset($volumeInfo['imageLinks']['small']) ? $volumeInfo['imageLinks']['small'] : (isset($volumeInfo['imageLinks']['thumbnail']) ? $volumeInfo['imageLinks']['thumbnail'] : "Image not available");
                $pub = isset($volumeInfo['publisher']) ? $volumeInfo['publisher'] : "Publisher not available";
                $pubDate = isset($volumeInfo['publishedDate']) ? $volumeInfo['publishedDate'] : "Publication date not available";
                $username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : '';

                $bookDiv = "<div class='book' onclick=\"window.location.href='submitted_book.php?isbn=$isbn&quality=$quality&price=$price&title=".urlencode($title)."&author=".urlencode($author).'&description='.urlencode($description)."&image=".urlencode($image)."&pub=".urlencode($pub)."&pubDate=".urlencode($pubDate)."&username=$username';\">";
                $titleDiv = "<div class='title'>Title: $title</div>";
                $authorDiv = "<div class='author'>Author: $author</div>";
                $pubDiv = "<div class='pubDiv'>Published first in: " . $volumeInfo['publishedDate'] . "</div>";
                $isbnDiv = "<div class='isbn'>ISBN: $isbn</div>"; // Display ISBN

                // Adding book image if available
                if (isset($volumeInfo['imageLinks'])) {
                    $imageDiv = "<img src='$image' class='bookImage'>";
                    $bookDiv .= $imageDiv;
                }

                $bookDiv .= $titleDiv . $authorDiv . $pubDiv . $isbnDiv . "</div>";
                echo $bookDiv;
            }
        }
    }

    // Function to create a URL given a book name with spaces replaced by '+'
    function make_url_given_book($book_name) {
        $base_url = "https://www.googleapis.com/books/v1/volumes?q=";
        // Split the input string by spaces and then rejoin with '+' between words
        $splitBook = explode(" ", $book_name);
        $queryTerm = implode("+", $splitBook);
        $new_url = $base_url . $queryTerm;
        return $new_url;
    }

    $searchTerm = $_GET["book_name"];
    get_book_data(make_url_given_book($searchTerm));
?>
</div>