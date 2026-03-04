// displaybooks.js

$(document).ready(function() {
    const url = "https://www.googleapis.com/books/v1/volumes/";
    const booksContainer = $('#container');
    let book_ids = ["pLpHEAAAQBAJ", "wrOQLV6xB-wC", "18OYEAAAQBAJ",
    "KbZ9EAAAQBAJ", "vrpPEAAAQBAJ", "rKqWzgEACAAJ", "e_9MDwAAQBAJ",
    "s1gVAAAAYAAJ", "w7ntzgEACAAJ", "rWXRDwAAQBAJ" ];
    for (let i = 0; i < book_ids.length; i++) {
        const id = book_ids[i];
        getBookById(id, function(info) {
            // Create a div to contain the book
            const bookElement = $('<div></div>').addClass('book').attr('id', id);

            // Set the author of the book
            const authorElement = $('<span></span>').addClass('author').text(info.authors ? info.authors.map(author => {
                const names = author.split(' ');
                return names[names.length - 1];
            }).join(', ') : 'Unknown');

            // Set the price of the book
            const priceElement = $('<span></span>').addClass('price').text("$10.00");
            
            // Set the title of the book using an h2 header
            const titleElement = $('<h2></h2>').text(info.title);
            
            // Create a form button for the cover image
            const coverImageForm = $('<form></form>').attr('method', 'get').attr('action', 'item.html');
            const coverImageButton = $('<input>').attr('type', 'image').attr('src', info.imageLinks.small || info.imageLinks.thumbnail).attr('alt', info.title);
            const hiddenInput = $('<input>').attr('type', 'hidden').attr('name', 'id').val(id);

            // Add each of the elements to the book
            bookElement.append(coverImageForm.append(coverImageButton, hiddenInput), priceElement, authorElement, titleElement);
            booksContainer.append(bookElement);

        });
    }
});

// Function to retrieve book data from Google Books API based on id
function getBookById(volumeId, callback) {
    const url = "https://www.googleapis.com/books/v1/volumes/" + volumeId;

    const req = new XMLHttpRequest();
    req.open("GET", url, true);

    req.onreadystatechange = function () {
        if (req.readyState === 4) {
            if (req.status === 200) {
                const data = JSON.parse(req.responseText);
                if (data.error) {
                    console.error("Error:", data.error.message);
                    return;
                }

                const volumeInfo = data.volumeInfo || {};
                callback(volumeInfo);
            } else {
                console.error("Error:", req.status);
            }
        }
    };
    req.send();
}