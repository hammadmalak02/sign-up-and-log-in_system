    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>nav php </title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                width: 100%;
                height: auto;
            }

            .main {
                width: 100%;
                height: 80px;
                background-color: #353943;
                display: flex;
                align-items: center;
                justify-content: space-around;
            }

            .main h1 {
                color: #fff;
            }

            .logo {
                width: 125px;
                height: 78px;
            }

            .navbar {
                display: flex;
            }

            .navbar ul {
                display: flex;
                color: #fff;
                padding: 30px;
                text-transform: uppercase;
                list-style: none;
            }

            .navbar ul li a {
                color: #fff;
                padding: 15px 20px;
                text-decoration: none;
            }

            .nright {
                display: flex;
            }

            .nright input {
                width: 100%;
                height: 35px;
                text-transform: uppercase;
            }

            .nright button {
                width: 50%;
                height: 35px;
                color: #3D6154;
                border: 1px solid green;
                background-color: #000;
            }

            form {
                margin-left: 22%;
                margin-top: 5%;
            }

            form h2 {
                margin-bottom: 20px;
            }

            form label {
                margin-top: 10px;
                margin-bottom: 10px;
            }

            form input {
                width: 80%;
                height: 35px;
                display: block;
                margin-top: 10px;
                margin-bottom: 10px;
            }

            form textarea {
                display: block;
                width: 80%;
                height: auto;
                margin-top: 10px;
            }

            form button {
                width: 90px;
                height: 35px;
                color: #fff;
                background-color: #4F5B93;
                margin-top: 10px;
            }
        </style>
    </head>

    <body>
    <?php

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $loggedin = true;
    } else {
        $loggedin = false;
    }
    echo '<div class="main">
        <h1>isecure</h1>
        <div class="navbar">
            <ul>
                <li><a href="/php-tutorial/33_login_system/welcome.php">home</a></li>';
    if ('!$loggedin') {
        echo '<li><a href="/php-tutorial/33_login_system/login.php">Login</a></li>
                <li><a href="/php-tutorial/33_login_system/signup.php">Signup</a></li>';
    }
    if ('$loggedin') {
        echo '<li><a href="/php-tutorial/33_login_system/logout.php">Logout</a></li>
            </ul>
        </div>';
    }
    echo '<div class="nright">
            <input type="text" name="text" id="name" placeholder="search">
            <button>SEARCH</button>
        </div>
    </div>';
    ?>
    </body>

    </html>