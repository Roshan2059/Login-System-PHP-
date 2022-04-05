<?php
require '_nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <label>Username</label>
    <input type="text" name="uname"><br>
    <label>Password</label>
    <input type="password" name="pass"><br>
    <label>Confirm Password</label>
    <input type="password" name="cpass">
    </div>

    <?php
    include '_dbConnect.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["uname"];
        $pass = $_POST["pass"];
        $cpass = $_POST["cpass"];
    }

    if($passs = $cpass)
    $sql = "insert into user values($username, $pass)";
    $sqlexe = mysqli_query($conn, $sql);

    
    ?>
</body>
</html>