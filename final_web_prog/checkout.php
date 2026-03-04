<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* Style the form container */
        .checkout-form {
            width: 50%;
            margin: 50px auto;
            padding: 40px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Style the form fields */
        .checkout-form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .checkout-form input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Style the submit button */
        .checkout-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #264653;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        /* Submit button hover effect */
        .checkout-form input[type="submit"]:hover {
            background-color: #1e3b49;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>
<div class="page_title"><h1>CHECKOUT</h1></div>

<div class="checkout-form">
    <form action="checkout-process.php<?= isset($_GET['username']) ? '?username=' . htmlspecialchars($_GET['username']) : '' ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="address-line1">Address Line 1:</label>
        <input type="text" id="address-line1" name="address_line1" required>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>

        <label for="state">State:</label>
        <input type="text" id="state" name="state" required>

        <label for="postal-code">Postal Code:</label>
        <input type="text" id="postal-code" name="postal_code" required>

        <label for="cc-number">Credit Card Number:</label>
        <input type="text" id="cc-number" name="cc_number" required>

        <label for="cc-expiry">Expiration Date (MM/YY):</label>
        <input type="text" id="cc-expiry" name="cc_expiry" required>

        <label for="cc-cvv">CVV:</label>
        <input type="text" id="cc-cvv" name="cc_cvv" required>

        <input type="hidden" name="username" value="<?php echo htmlspecialchars($_GET['username']); ?>">

        <input type="submit" value="Submit Order">
    </form>
</div>

<?php include 'footer.php'; ?>

</body>
</html>