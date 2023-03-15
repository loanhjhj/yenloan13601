<?php
session_start();
include '../partials/connect.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $select_admin = $conn->prepare("SELECT * FROM users ,admin WHERE (users.email='".$email."' AND users.password='".$password."' AND users.role=1) OR (admin.email='".$email."' AND admin.password='".$password."' ) LIMIT 1");
    $select_admin->execute();
    $record = $select_admin->fetch();
    if($select_admin->rowCount() > 0){
        $_SESSION['submit']=$email;
        header("Location:index.php");
        }else{
        echo '<script>alert("Tài khoản hoặc Mật khẩu không đúng,vui lòng nhập lại.");</script>';
        header("Location:login.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="header">
                <h2>Login</h2>
    </div>
    <form action="" method="post">
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email">
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" name="submit" class="btn">Login</button>
        </div>
        <div style="text-align: right;">
        <a href="../index.php">Cancel?</a>
        </div>
    </form>';

</body>
</html>