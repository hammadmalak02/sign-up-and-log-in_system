<?php
$showError = false;
$showAlert = false;
$showMsg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/db_connect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    if ($password == $cpassword) {
       $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if ($result == false) {
            $showMsg = "username is already exist chosse another name or you're already registered";
            $showAlert = true;
        }
        if ($result) {
            $showMsg = "your account is now created";
            $showAlert = true;
        }
    } else {
        $showMsg = "password does not match";
        $showAlert = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup page</title>
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
    if ($showAlert) { ?>
        <h1><?php echo $showMsg; ?> </h1>
    <?php } ?>

    <div class="container">
        <h1>Sign up to our website</h1>
        <form action="/php-tutorial/33_login_system/signup.php" method="post">
            <label for="username">username</label>
            <input type="text" maxlength="11" name="username" id="username" placeholder="">

            <label for="password">password</label>
            <input type="password" maxlength="23" id="password" name="password">

            <label for="cpassword">Confirm-password</label>
            <input type="password" id="cpassword" name="cpassword">

            <small> Make Sure to type the same password</small>

            <button type="submit">Sign up</button>
        </form>
    </div>
</body>

</html>