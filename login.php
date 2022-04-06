<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            width: 20vw;
            margin: 10vh auto;
        }

        button {
            margin: 10vh;
        }
    </style>
</head>

<body>
    <?php
    require '_nav.php';
    ?>

    <?php
    $login = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include '_dbConnect.php';
        $username = $_POST['uname'];
        $pass = $_POST['pass'];

        $sql = "select * from `user` where username = '$username'";
        $sqlexe = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($sqlexe);

        // login when without password hash
        // if($num == 1){
        //     $login = true;
        //     session_start();
        //     $_SESSION['loggedin'] = true;
        //     $_SESSION['username'] = $username;
        //     header("location: home.php");
        // }else{
        //      echo "invalid credentials";
        // }


        // login when with password verify function
        if ($num == 1) {
            while ($row = mysqli_fetch_assoc($sqlexe)) {
                if (password_verify($pass, $row['password'])) {
                    $login = true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    header("location: home.php");
                } else {
                    echo "invalid credentialsss";
                }
            }
        } else {
            echo "invalid credentials. Please retry again";
        }
    }
    ?>

    <form action="login.php" method="POST">
        <label>Username</label><br>
        <input type="text" name="uname" autocomplete="off"><br>
        <label>Password</label><br>
        <input type="password" name="pass"><br>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</body>

</html>