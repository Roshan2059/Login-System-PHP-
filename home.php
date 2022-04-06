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
    <style>
            .main-container{
                width: 25%;
                margin-top: 10vh;
                margin-left: auto;
                margin-right: auto;
                font-size: 30px;
            }
    </style>
</head>

<body>
    <?php
    require '_nav.php';
    ?>

    <div class="main-container">
        <?php echo "Hello! " . $_SESSION['username']; ?>
        <br>Welcome again.<br> we were waiting for you.
    </div>

</body>

</html>