<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username']; ?></title>

</head>

<body>
    <?php
    require '_nav.php';
    ?>

    <?php
    // echo "welcome ".$_SESSION['username'];
    echo "Hello! " . $_SESSION['username'] . "<br> Where were you? <br>We have  been waiting for you";
    ?>

</body>

</html>