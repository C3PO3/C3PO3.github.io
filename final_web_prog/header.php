<!-- 
 -->
 <!DOCTYPE html>
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <style>
        body {
            margin: 0;
            font-family:serif;
        }

        nav {
            background-color: #ffffff;
            padding: 10px 0;
            position: sticky;
            z-index: 9999;
            max-width: 100%;
            width:100%;
            margin:0;
            border-bottom: 2px solid #ccc; 

        }

        .navbar, .menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 100%;
            width:100%;
            font-size:24px;
        }

        .navbar li {
            margin-top: 0px;
            display: inline;
            margin-right: 15px;
        }

        .navbar li.logo {
            margin-right: 10px; 
            margin-left:0;
        }

        .navbar .user-cart-container li.cart {
            margin-right: 20px; 
        }


        .navbar li.logo img {
            max-width:300px !important;

        }

        .navbar li a {
            color: #264653;
            text-decoration: none;
        }

        nav .search-container {
            display: flex;
            align-items: center;
            margin-right: 10px;
        }
        nav .search-box {
            position: relative; 
            max-width:500px;
            width:100%;
        }

        nav .search-box input {
            padding: 8px 35px 8px 15px; 
            border: 1px solid #ccc;
            font-size:20px;
        }

        nav .search-box i {
            position: absolute;
            right: 10px; 
            top: 50%; 
            transform: translateY(-50%);
            color: #ccc; 
        }

        .search-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            border: none;
            background-color: transparent; 
            cursor: pointer;
            color: #ccc;
        }



        .search-icon i {
            font-size: 20px !important;
        }
        .navbar .icon {
            display:none;
        }
        .navbar li a i {
            font-size: 50px;
        }

        @media (max-width: 1100px){
            .navbar li a i {
                font-size:35px;
            }
            .navbar li {
                font-size:20px;
            }
            nav .search-box input {
                font-size:16px;
            }
            
        }

        .navbar li a.active {
            color: #F4A261; 
        }


        @media (max-width: 1000px) {
            .menu li {
                display: none;
            }
            
            .navbar .icon {
                display: flex;
                margin-right: 20px;
                text-decoration: none;
                font-size: 40px;
                color: #264653;
            }

            .menu.visible {
                display: flex;
                flex-direction: column; 
                position: absolute;
                top: 100px; 
                width: 400px; 
                background-color: #ffffff; 
                box-shadow: -5px 0 10px rgba(0, 0, 0, 0.3); 
                right: 0;
                padding: 10px;


            }

            .menu.visible li:not(.logo):not(.icon) {
                display: block;
                text-align: center;
                padding: 10px 20px; 
                width: 100%; 
                justify-content:center;
                align-items:center;
                font-size:25px;
                box-sizing: border-box;
                margin-right:0px; 
            }


            .menu.visible .user-cart-container {
                display: flex;
                justify-content: space-between;
                padding: 10px 20px;
            }

            .menu.visible .user-cart-container li {
                width: 50%;
                text-align: center; 
            }
            nav .search-container {
                display: flex;
                justify-content: center; 
                width: 100%; 
            }

            nav .search-box {
                width: 90%; 
                margin: auto; 
                position: relative; 
            }

            nav .search-box input {
                width: 100%; 
                padding: 8px 35px 8px 15px; 
                box-sizing: border-box; 
            }
        }

        @media (max-width:750px){
            nav .search-container {
                display:none;
            }
        }




    </style>

     <title>ShelfSwap - Header</title>

 </head>
 <body>

    <nav>
        <ul class="navbar" id="nav">
            <li class="logo"><a href="browse.php<?= isset($_GET['username']) ? '?username=' . htmlspecialchars($_GET['username']) : '' ?>"><img src="logo.png"></a></li>
            <div class="menu" id="menu">
                <li><a href="browse.php<?= isset($_GET['username']) ? '?username=' . htmlspecialchars($_GET['username']) : '' ?>">Browse</a></li>
                <li><a href="sell_book.php<?= isset($_GET['username']) ? '?username=' . htmlspecialchars($_GET['username']) : '' ?>">Sell</a></li>
                <li><a href="about.php<?= isset($_GET['username']) ? '?username=' . htmlspecialchars($_GET['username']) : '' ?>">About</a></li>
                <li class="search-container">
                    <form id="searchForm" action="browse.php<?= isset($_GET['username']) ? '?username=' . htmlspecialchars($_GET['username']) : '' ?>" method="GET">
                        <div class="search-box">
                            <input id="searchInput" type="text" name="query" placeholder="Search Title, Author, Keyword, or ISBN" size="40">
                            <button type="submit" class="search-icon">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </li>

                <div class="user-cart-container">
                    <li class="cart"><a href="cart.php<?= isset($_GET['username']) ? '?username=' . htmlspecialchars($_GET['username']) : '' ?>"><i class="fa fa-shopping-cart"></i></a></li>
                    <li class="user"><a href="user.php<?= isset($_GET['username']) ? '?username=' . htmlspecialchars($_GET['username']) : '' ?>"><i class="fa fa-user"></i></a></li>
                </div>
            </div>
            <a href="javascript:void(0);" class="icon" onclick="toggleMenu()" style="text-decoration: none;">
                 <i class="fa fa-bars" id="menuIcon"></i>
            </a>
            
        </ul>
    </nav>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('menu');
            const menuIcon = document.getElementById('menuIcon');
    
            menu.classList.toggle('visible');
        
            if (menu.classList.contains('visible')) {
                menuIcon.classList.remove('fa-bars');
                menuIcon.classList.add('fa-times');
            } else {
                menuIcon.classList.remove('fa-times');
                menuIcon.classList.add('fa-bars');
            }
        }
        window.addEventListener('resize', function() {
            const menu = document.getElementById('menu');
            const menuIcon = document.getElementById('menuIcon');
            
            if (menu.classList.contains('visible') && window.innerWidth > 1000) {
                menu.classList.remove('visible');
                menuIcon.classList.remove('fa-times');
                menuIcon.classList.add('fa-bars');
            }
        });

        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            
            const searchInput = document.getElementById('searchInput').value;
            const formAction = document.getElementById('searchForm').action + "&query=" + encodeURIComponent(searchInput);
            
            // Redirect to the new URL
            window.location.href = formAction;
        });
    </script>
 </body>
 </html>
