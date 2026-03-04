<!DOCTYPE html>
<html>
    <head>
        <title>Sell Book - ShelfSwap</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type = "text/css" href= "style.css">

        <?php include 'header.php'; ?>
        <style >
            
            .quality-container {
                display: flex;
                justify-content: space-around;
                margin-bottom: 30px;
                margin-top: 10px;
                font-size: 20px;
            }
            .quality-option-text {
                margin-top: 5px;
                text-align: center;
            }

            .quality-option {
                display: block;
                margin-right: 10px;
                margin-left: 10px;
                cursor: pointer;
                width: 200px;
                text-align: center;
            }

            .quality-radio {
                display: none;
            }

            .quality-option.selected {
                font-weight: bold; /* Example styling for selected option */
            }
            .quality-option.selected {
               font-style: italic;
            }

            .quality-option:hover {
                background-color: #ddd; /* Hover background color */
            }   
            
            .quality-container input[type="radio"] {
                display: none;
            }

            .quality-container label {
                display: inline-block;
                padding: 4px 11px;
                font-size: 20px;
                cursor: pointer;
                text-align: center;
            }

            .qbutton {
                margin: 5px;
                border: 2px solid #000000;
                border-radius: 5px;
                width: 120px;
                text-align: center;
            }

            .quality-container input[type="radio"]:checked+label {
                font-style: italic;
            }
          
            .input-table {
                margin: auto;
            }

            .lable-td {
                padding-right: 10px;
                text-align: right;
                align-items: right;
            }

            .labels {
                font-family: SourceSerif;
                font-size: 30px;
                text-align: right;
                align-items: right;
            }

            .button-row {
                margin: auto;
                padding-top: 15px;
                justify-content: center;
                text-align: center;
            }

            .input-button {
                font-family: SourceSerif;
                font-size: 30px;
                background-color: #ffffff;
                border: 1px, solid, #000000;
                border-radius: 5px;
                text-align: center;
                margin: auto 0;
            }

            .input-button:hover {
                background-color: #e1e1e1;
            }

            .box {
                height: 30px;
                width: 200px;
            }
            .input-table {
                margin: auto;
            }

            .lable-td {
                padding-right: 10px;
                text-align: right;
                align-items: right;
            }

            .box-td {
                padding-left: 10px;
            }

            .labels {
                font-family: SourceSerif;
                font-size: 30px;
                text-align: right;
                align-items: right;
            }

            .quality-lable {
                text-align: center;
                align-content: center;
                margin-top: 20px;
            }   

            .qlable {
                font-family: SourceSerif;
                font-size: 30px;
                text-align: center;
                margin-top: 20px;
            }

            .button-row {
                margin: auto;
                padding-top: 15px;
                justify-content: center;
                text-align: center;
            }

            .input-button {
                font-family: SourceSerif;
                font-size: 30px;
                background-color: #ffffff;
                border: 1px, solid, #000000;
                border-radius: 5px;
                text-align: center;
                margin: auto 0;
            }

            .input-button:hover {
                background-color: #e1e1e1;
            }

            table tr {
                max-width: 20%;
                width: 250px;
                height: 50px;
            }

            .sect{
                display: block;
                max-width: 70%;
                width: 800px;
                margin: 40px auto;
                padding: 40px;
                background-color: #ffffff;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                border-radius: 15px;
            }

            label {
                text-align: center;
            }

            @media (max-width: 1000px) {
                .quality-container {
                    display: block;
                }
                .qbutton {
                    margin: auto;
                    margin-top: 6px;
                    margin-bottom: 6px;
                }
            }

            @media (max-width: 768px) {
                .section {
                    max-width: 90%;
                }

                .input-button {
                font-family: SourceSerif;
                font-size: 30px;
                background-color: #ffffff;
                border: 1px, solid, #000000;
                border-radius: 5px;
                text-align: center;
                margin: auto 0;
                color: #000000;
            }

                
            }

        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            function setQuality(quality) {
                document.getElementById('quality').value = quality;
                // make sure select works
                var options = document.getElementsByClassName('quality-option');
                for (var i = 0; i < options.length; i++) {
                    options[i].classList.remove('selected');
                }
                event.target.classList.add('selected');
                // turn off required
                var qual_field = document.getElementById('quality');
                qual_field.setAttribute('data-done', 'true');
            }

            $(document).ready(function() {
                $('#submit_sell').click(function(event) {
                    var qualField = $('#quality');
                    if (!qualField.data('done')) {
                        alert('Please select a quality option.');
                        event.preventDefault();
                    }
                });
            });
        </script>
    </head>
    <body>
        <div class="page_title"><h1>Enter Book Details</h1></div>

        <div action="process_sell.php<?= isset($_GET['username']) ? '?username=' . htmlspecialchars($_GET['username']) : '' ?>" method="get" id="sell_book" class="sect">
        <form id="newForm" method="get" action="process_sell.php<?= isset($_GET['username']) ? '?username=' . htmlspecialchars($_GET['username']) : '' ?>" onsubmit="return validateNewForm()">
            <table class="input-table">
                <tr class="entry-box">
                    <td class="lable-td"><label for="book_name" class="labels">Book Title:</label></td>
                    <td class="box-td"><input type="text" id="book_name" name="book_name" class="box" required></td>
                </tr>

                <tr class="entry-box">
                    <td class="lable-td"><label for="price" class="labels">Price:</label></td>
                    <td class="box-td"><input type="text" id="price" name="price" class="box" required></td>
                </tr>

            </table>

            
            <table class="input-table">
                <tr><td class="quality-label">
                    <div class="qlable">Book Quality</div>
                </td></tr>
                <tr>
                <td><div class="quality-container">
                    <div class="qbutton">
                    <input type="radio" name="quality" id="poor" value="poor" class="quality-option" onclick="setQuality('poor')">
                    <label for="poor">Poor</label></div>

                    <div class="qbutton">
                    <input type="radio" name="quality"  id="well_loved" value="well_loved" class="quality-option" onclick="setQuality('well_loved')">
                    <label for="well_loved">Well Loved</label></div>

                    <div class="qbutton">
                    <input type="radio" name="quality" id="fair" value="fair" class="quality-option" onclick="setQuality('fair')">
                    <label for="fair">Fair</label></div>

                    <div class="qbutton">
                    <input type="radio" name="quality" id="excellent" value="excellent" class="quality-option" onclick="setQuality('excellent')">
                    <label for="excellent">Excellent</label></div>

                    <div class="qbutton">
                    <input type="radio" name="quality" id="brand_new" value="brand_new" class="quality-option" onclick="setQuality('brand_new')">
                    <label for="brand_new">Brand New</label></div>
                    <input type="hidden" id="quality" name="quality" required>
                </div></td>
                </tr>

                <input type="hidden" id="username" name="username" value = "<?= isset($_GET['username']) ? htmlspecialchars($_GET['username']) : '' ?>">

                <tr><td class="button-row">
                    <input type="submit" value="Sell Book" id = "submit_sell" class="input-button">
                </td></tr>
            </table>
        </form> 
        </div>

        <?php include 'footer.php'; ?>
    </body>
</html>
