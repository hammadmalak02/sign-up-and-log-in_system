<?php
$login = false;
$showError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/db_connect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];

    // $sql = "SELECT * from users where username='$username' AND password='$password'";
    $sql = "SELECT * from users where username='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: welcome.php");
            } else {
                $showError = "Invalid Credentials";
            }
        }
    } else {
        $showError = "Invalid Credentials";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
</head>

<body>
    <style>
        form {
            margin-left: -10%;
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
            width: 100%;
            height: 35px;
            display: block;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        form button {
            width: 90px;
            height: 35px;
            color: #fff;
            background-color: #4F5B93;
            margin-top: 10px;
            display: block;
        }

        .container h1 {
            text-align: center;
        }
    </style>

    <?php require 'partials/_nav.php' ?>
    <?php
    if ($login) {
        echo "you are logged in";
    } else {
        echo $showError;
    }
    ?>

    <div class="container">
        <h1> Login to our website</h1>
        <form action="/php-tutorial/33_login_system/login.php" method="post">
            <label for="username">username</label>
            <input type="text" name="username" id="username" placeholder="">

            <label for="password">password</label>
            <input type="password" id="password" name="password">

            <small> Make Sure to type the same password</small>

            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>