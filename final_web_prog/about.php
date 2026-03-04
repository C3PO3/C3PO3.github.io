
<!DOCTYPE html>
<html>

<head>
    <title>About Us - ShelfSwap</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type = "text/css" href= "style.css">

    <?php
        include 'header.php';
    ?>
    <style>


        /* Navigation bar styles */
        .nav-bar {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .nav-button {
            margin: 0 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: white;
            color: #333;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            font-family: SourceSerif;
            font-size: 30px;
        }

        /* Active button styles */
        .nav-button.active {
            background-color: #f4a261; 
            color: white;
        }

        /* Section styles */
        .section {
            display: none;
            max-width: 800px;
            margin: 40px auto;
            padding: 40px;
            background-color: #ffffff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }

        /* Section active */
        .section.active {
            display: block; 
        }

       /* Company content styles */
        .company-content {
            display: flex;
            flex-direction: row; 
            gap: 20px;
            align-items: center;
            justify-content:center;
        }


        .section img {
            width: 50%; 
            height: auto;
            border-radius: 10px; 
        }

        .company-text {
            width: 50%; 
        }

        .about-section {
            margin-bottom: 60px; 
            padding-bottom: 20px;
        }

        .about-section img {
            width: 300px;
            height: 200px; 
            object-fit: cover; 
            border-radius: 10px; 
        }

        /* Leadership section styles */
        .leadership ul {
            margin: 0;
            padding: 0;
            list-style: none;
            display: grid;
            grid-template-columns: repeat(3, 1fr); 
            gap: 20px; 
        }
        
        .leadership ul li img {
            width: 200px;
            height: 300px; 
            object-fit: cover; 
        }

        .leadership ul li {
            margin-bottom: 10px;
            position: relative;
            text-align: center;
        }

        .leadership ul li p {
            margin-top: 10px;
            color: #333;
        }


        /* Paragraph elements for leadership titles */
        .leadership ul li p.name {
            color: #333;
            font-weight: bold; /* Keeps titles regular (not bold) */
        }

        /* Media queries for responsiveness */
        @media (max-width: 768px) {
            /* Adjust layout for screens with max width of 768px */
            .leadership ul {
                grid-template-columns: 1fr; /* Show one column for leadership section */
            }
            .company-content {
                flex-direction: column; /* Stack company content vertically */
            }
            .section img {
                width: 100%; /* Make images full width */
            }
}
    </style>
</head>

<body>
    <div class="page_title"><h1>About Us</h1></div>

    <!-- Navigation bar with two buttons -->
    <div class="nav-bar">
        <button class="nav-button active" id="company-button" onclick="showSection('company')">Company</button>
        <button class="nav-button" id="leadership-button" onclick="showSection('leadership')">Leadership</button>
    </div>

    <!-- Company section -->
    <div id="company-section" class="section about-container active">
        <!-- Company information content -->
        <div class="about-section company-content">
            <img src="ourstory.jpg" alt="Our Story Image">
            <div class="company-text">
                <h2>Our Story</h2>
                <p>ShelfSwap was founded with the vision of creating a unique platform where individual users can buy and sell used books, connecting readers and promoting sustainability.</p>
                <p>Today, ShelfSwap is home to a thriving community that shares a love for books and the joy of reading. Our team is dedicated to providing a seamless and secure platform for users to buy and sell books, while fostering a welcoming and inclusive environment for all.</p>
            </div>
        </div>

        <div class="about-section company-content">
        <img src="ourmission.jpg" alt="Our Mission Image">

            <div class="company-text">
                <h2>Our Mission</h2>
                <p>At ShelfSwap, our mission is to create a vibrant community of book lovers that promotes sustainable practices and a circular economy. We aim to offer a space where readers can access a wide variety of books while giving pre-loved books a new lease on life.</p>
                <p>We strive to connect individuals who share a passion for reading, whether they are searching for their next great read or looking to sell books and make a profit.</p>
            </div>
        </div>

        <div class="about-section company-content">
            <img src="ourcommunity.jpg" alt="Our Community Image">
            <div class="company-text">
                <h2>Our Community</h2>
                <p>Our community is composed of passionate readers and entrepreneurs who are shaping the future of book culture. From avid collectors to aspiring writers, our users bring creativity and diversity to ShelfSwap, making it a space where everyone can thrive.</p>
                <p>Join us on ShelfSwap and become part of a community that celebrates the love of reading and sustainable book practices.</p>
            </div>
        </div>
    </div>

    <!-- Leadership section -->
<div id="leadership-section" class="section leadership">
    <!-- Leadership information -->
    <div class="about-section">
        <h2>Our Leadership</h2>
        <ul>
            <li>
                <img src="leadership_1.jpg" alt="Leadership Member 1">
                <p class="name">Jane Doe</p>
                <p class="title">CEO</p> 
            </li>
            <li>
                <img src="leadership_2.jpg" alt="Leadership Member 2">
                <p class="name">John Smith</p>
                <p class="title">Chief Finance Officer</p> 
            </li>
            <li>
                <img src="leadership_3.jpg" alt="Leadership Member 3">
                <p class="name">Mary Johnson</p>
                <p class="title">Book Expert</p> 
            </li>
        </ul>
    </div>
</div>

    <script>
        function showSection(section) {
            const companyButton = document.getElementById('company-button');
            const leadershipButton = document.getElementById('leadership-button');

            const companySection = document.getElementById('company-section');
            const leadershipSection = document.getElementById('leadership-section');

            if (section === 'company') {
                companySection.classList.add('active');
                leadershipSection.classList.remove('active');
                companyButton.classList.add('active');
                leadershipButton.classList.remove('active');
            } else {
                companySection.classList.remove('active');
                leadershipSection.classList.add('active');
                companyButton.classList.remove('active');
                leadershipButton.classList.add('active');
            }
        }
    </script>

    <?php include 'footer.php'; ?>
</body>

</html>