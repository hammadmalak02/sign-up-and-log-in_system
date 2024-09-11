<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome - <?php $_SESSION['username'] ?></title>
    <style>
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5vw;
            margin: 5vw;
            /* background-color: rgb(107, 235, 235); */
        }

        .hero {
            text-align: center;
        }

        .hero,
        h4,
        p {
            font-size: 2vw;
        }
    </style>
</head>

<body>
    <?php require 'partials/_nav.php' ?>
    <div class="container">
        <div class="hero">
            <h4>welcome - <?php echo $_SESSION['username'] ?></h4>
            <p>hey how are you doing ? welcome to isecure. you are logged in as <?php echo $_SESSION['username'] ?></p>
            <p>whenever you need to, be sure to logout <a href="/php-tutorial/33_login_system/logout.php">using this link</a></p>
        </div>
    </div>
</body>

</html>