<!DOCTYPE html>
<html>

<head>
    <title>Login - ShelfSwap</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type = "text/css" href= "style.css">
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
            max-width: 70%;
            width: 800px;
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

       /* new content styles */
        .new-content {
            display: flex;
            flex-direction: row; 
            gap: 20px;
            align-items: center;
            justify-content:center;
        }

        .new-text {
            width: 50%; 
        }

        .about-section {
            margin-bottom: 60px; 
            padding-bottom: 20px;
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

        .box {
            height: 30px;
            width: 200px;
        }


        /* Media queries for responsiveness */
@media (max-width: 768px) {
    /* Adjust layout for screens with max width of 768px */
    .nav-bar {
        flex-direction: row;
        justify-content: center;
    }

    .nav-button {
        margin: 0 10px;
        font-size: 20px;
        padding: 10px 15px;
    }

    .section {
        max-width: 90%;
    }

    .input-table {
        margin: auto;
        width: auto;
    }

    .box-td {
        display: table-cell;
        text-align: right;
        vertical-align: middle;
    }

    .labels {
        font-size: 20px;
    }

    .box {
        width: 90%;
    }

    .button-row {
        text-align: center;
        margin-top: 10px; /* Add margin to separate button row */
    }

    .input-button {
        width: auto;
        color: #000000;
        font-family: SourceSerif;
        font-size: 30px;
        background-color: #ffffff;
        border: 1px, solid, #000000;
        border-radius: 5px;
        text-align: center;
        margin: auto 0;
    }

    table tr {
        display: table-row;
        width: auto;
        margin-bottom: 0;
    }
    #header {
        width: 100%;
    }
    #footer {
        width: 100%;
    }
}



    </style>
</head>

<body>
    <div id="header"><?php include 'header.php'; ?></div>

    <div class="page_title"><h1>Login or Sign Up</h1></div>

    <!-- Navigation bar with two buttons -->
    <div class="nav-bar">
        <button class="nav-button active" id="new-button" onclick="showSection('new')">New</button>
        <button class="nav-button" id="returning-button" onclick="showSection('returning')">Returning</button>
    </div>

    <!-- new section -->
    <div id="new-section" class="section about-container active" class="sect">
    <form id="newForm" method="POST" action="new-user-process.php" onsubmit="return validateNewForm()">
        <table class="input-table">
            <tr class="entry-box">
                <td class="lable-td"><label for="first_name" class="labels">First Name:</label></td>
                <td class="box-td"><input type="text" id="first_name" name="first_name" class="box"></td>
            </tr>

            <tr class="entry-box">
                <td class="lable-td"><label for="last_name" class="labels">Last Name:</label></td>
                <td class="box-td"><input type="text" id="last_name" name="last_name" class="box"></td>
            </tr>

            <tr class="entry-box">
                <td class="lable-td"><label for="email" class="labels">Email:</label></td>
                <td class="box-td"><input type="email" id="email" name="email" class="box"></td>
            </tr>

            <tr class="entry-box">
                <td class="lable-td"><label for="password" class="labels">Password:</label></td>
                <td class="box-td"><input type="password" id="password" name="password" class="box"></td>
            </tr>

            <tr><td colspan="2" class="button-row">
                <input type="submit" value="Create Account" class="input-button">
            </td></tr>
        </table>
    </form> 
    </div>

    <!-- returning section -->
<div id="returning-section" class="section returning"  class="sect">
    <form id="returningForm" method="POST" action="login-process.php" onsubmit="return validateReturningForm()">
    <table class="input-table">
        <tr class="entry-box">
            <td class="lable-td"><label for="email" class="labels">Email:</label></td>
            <td class="box-td"><input type="email" id="returning-email" name="email" class="box"></td>
        </tr>

        <tr class="entry-box">
            <td class="lable-td"><label for="password" class="labels">Password:</label></td>
            <td class="box-td"><input type="password" id="returning-password" name="password" class="box"></td>
        </tr>

        <tr><td colspan="2" class="button-row">
                <input type="submit" value="Login" class="input-button">
        </td></tr>
    </table>
    </form>
</div>

    <script>
        function showSection(section) {
            const newButton = document.getElementById('new-button');
            const returningButton = document.getElementById('returning-button');

            const newSection = document.getElementById('new-section');
            const returningSection = document.getElementById('returning-section');

            if (section === 'new') {
                newSection.classList.add('active');
                returningSection.classList.remove('active');
                newButton.classList.add('active');
                returningButton.classList.remove('active');
            } else {
                newSection.classList.remove('active');
                returningSection.classList.add('active');
                newButton.classList.remove('active');
                returningButton.classList.add('active');
            }
        }
    

        function validateNewForm() {
            var firstName = document.getElementById("first_name").value;
            var lastName = document.getElementById("last_name").value;
            var username = document.getElementById("email").value;
            var password = document.getElementById("password").value;

            if (firstName === '' || lastName === '' || username === '' || password === '') {
                alert("Please fill out all fields.");
                return false;
            }

            if (password.length < 8 || !/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/[^a-zA-Z]/.test(password)) {
                alert("Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one non-letter character.");
                return false;
            }

            return true;
        }

        function validateReturningForm() {
            var rusername = document.getElementById("returning-email").value;
            var rpassword = document.getElementById("returning-password").value;

            if (rusername === '' || rpassword === '') {
                alert("Please fill out all fields.");
                return false;
            }

            return true;
}

</script>

<div id="footer"><?php include 'footer.php'; ?></div>
</body>

</html>