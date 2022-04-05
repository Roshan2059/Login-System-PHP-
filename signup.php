<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    form {
        width: 20vw;
        margin: 10vh auto;
    }

    button {
        margin: 10vh;
    }
</style>

<body>
    <?php
    require '_nav.php';
    ?>

    <?php
    $show_success = false;
    $show_error = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include '_dbConnect.php';
        $username = $_POST["uname"];
        $pass = $_POST["pass"];
        $cpass = $_POST["cpass"];

        if ($pass == $cpass) {
            $sql = "INSERT INTO `user` (`username`, `password`) VALUES ( '$username', '$pass');";
            $sqlexe = mysqli_query($conn, $sql);

            if ($sqlexe) {
                $show_success = true;
            }
        } else {
            $show_error = true;
        }
    }
    ?>

    <?php
    if ($show_success) {
        echo "Your account has been created sucessfuly";
    }

    if ($show_error) {
        echo "passwords do not match";
    }
    ?>

    <form action="signup.php" method="POST">
        <label>Username</label><br>
        <input type="text" name="uname" autocomplete="off"><br>
        <label>Password</label><br>
        <input type="password" name="pass"><br>
        <label>Confirm Password</label><br>
        <input type="password" name="cpass"><br>
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>

</body>

</html>