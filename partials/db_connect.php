<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dbConnect</title>
</head>

<body>
    <?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "users";

    $conn = mysqli_connect($server, $username, $password, $database);
    if (!$conn) {
    //     echo "success";
    // } else {
        die("Error" . mysqli_connect_error());
    }
    ?>
</body>

</html>