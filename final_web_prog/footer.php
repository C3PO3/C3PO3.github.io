<!-- footer.php -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* Footer styles */
        footer {
            background-color: #264653; /* Dark color */
            color: #ffffff;
            padding: 20px;
            text-align: center;
            position: relative; /* For positioning the scroll-to-top button */
        }

        .footer-content {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .footer-section {
            margin: 10px 0;
            width: 30%; 
            min-width: 200px; 
        }

        .footer-section h3 {
            color: #f4a261;
            font-size: 20px;
        }

        .footer-section ul,
        .footer-section p {
            list-style-type: none;
            padding: 0;
            margin: 10px 0;
        }

        .footer-section ul li,
        .footer-section p {
            margin-bottom: 10px;
        }

        .footer-section a {
            color: #ffffff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section a:hover {
            color: #f4a261;
        }

        /* Footer section for user and cart icons */
        .footer-section .user-cart, 
        .footer-section .social-media{
            margin-top:30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .footer-section .user-cart a, 
        .footer-section .social-media a {
            margin: 0 15px;
            font-size: 30px; /* Adjust size as needed */
        }


        .scroll-to-top {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background-color: #f4a261;
            color: #ffffff;
            padding: 10px;
            border-radius: 50%;
            font-size: 20px;
            cursor: pointer;
            display: none; /* Hide initially */
        }

        .scroll-to-top.active {
            display: block;
        }
    </style>
</head>
<body>
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Navigation</h3>
                <ul>
                    <li><a href="browse.php<?= isset($_GET['username']) ? '?username=' . htmlspecialchars($_GET['username']) : '' ?>">Browse</a></li>
                    <li><a href="sell_book.php<?= isset($_GET['username']) ? '?username=' . htmlspecialchars($_GET['username']) : '' ?>">Sell</a></li>
                    <li><a href="about.php<?= isset($_GET['username']) ? '?username=' . htmlspecialchars($_GET['username']) : '' ?>">About</a></li>
                </ul>
                 <div class="user-cart">
                <a href="user.php<?= isset($_GET['username']) ? '?username=' . htmlspecialchars($_GET['username']) : '' ?>"><i class="fa fa-user"></i></a>
                <a href="cart.php<?= isset($_GET['username']) ? '?username=' . htmlspecialchars($_GET['username']) : '' ?>"><i class="fa fa-shopping-cart"></i></a>
            </div>
            </div>


            <div class="footer-section">
                <h3>Sign Up for an Account</h3>
                <p>Get access to exclusive deals and offers:</p>
                <a href="user.php<?= isset($_GET['username']) ? '?username=' . htmlspecialchars($_GET['username']) : '' ?>" class="signup-button">Sign Up Now</a>
            </div>

            <div class="footer-section">
                <h3>Contact</h3>
                <p>Email: support@shelfswap.com</p>
                <p>Phone: (123) 456-7890</p>
                <div class="social-media">
                <a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram"></i></a>
            </div>
            </div>

        

            
        </div>

        <div class="footer-bottom">
            <p>&copy; 2024 ShelfSwap. All Rights Reserved.</p>
            <p>Terms and Conditions</a> | Privacy Policy</a></p>
        </div>

        <div class="scroll-to-top" id="scrollToTop">
            <i class="fa fa-arrow-up"></i>
        </div>
    </footer>

    <script>
        const scrollToTopButton = document.getElementById('scrollToTop');

        window.addEventListener('scroll', function() {
            if (window.scrollY > 100) {
                scrollToTopButton.classList.add('active');
            } else {
                scrollToTopButton.classList.remove('active');
            }
        });

        scrollToTopButton.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>
</html>