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
    $show_error = false;
    $show_pass_error = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include '_dbConnect.php';
        $username = $_POST["uname"];
        $pass = $_POST["pass"];
        $cpass = $_POST["cpass"];

        $sql = "select * from `user` where username = '$username'";
        $sqlexe = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($sqlexe);

        if($num > 0){
            $show_error = true;
        }else{
        if($pass == $cpass) {
            $sql = "INSERT INTO `user` (`username`, `password`) VALUES ( '$username', '$pass');";
            $sqlexe = mysqli_query($conn, $sql);

            // if ($sqlexe) {
            //     $show_pass_error = true;
            // }
        } else {
            $show_pass_error = true;
        }
    }
}
    ?>

    <?php
    if ($show_error) {
        echo "<script>alert('Username already exists. Please enter another username')</script>";
    }

    if ($show_pass_error) {
        echo "<script>alert('Passwords do not match')</script>";
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