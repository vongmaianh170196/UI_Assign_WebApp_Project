<?php
/**
 * Created by PhpStorm.
 * User: nguyenlinh
 * Date: 31/03/2017
 * Time: 23.28
 */
include 'config.php';
session_start();
if(isset($_POST['email'])
    && isset($_POST['pass'])
    && strlen($_POST['email'])>=1
    && strlen($_POST['pass'])>=1)
{
    $query ="SELECT * FROM player WHERE player_name = '".$_POST['email']."' AND player_password ='".md5($_POST['pass'])."'; ";
    $check = mysqli_query($conn, $query);

    if(mysqli_num_rows($check))
    {
        while ($row = mysqli_fetch_array($check)){
            $_SESSION['user'] = $row['player_id'];
        }
        if(isset($_GET['gameName'])){

        }
        echo 'login thanh cong';
//        header('location: loading.php');

    }else
    {
        echo $query;
        echo $check;
        echo $_POST['email'];
        echo md5($_POST['pass']);
        echo 'khong dung';
    }
}else{
    echo 'khong co data';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="css/login-style.css">
</head>
<body>
<header>
    <h1>PlanningPoker</h1>
</header>
<div class="container">
    <div class="login-form">
        <h1>Enter your email and password</h1>
        <form action="loginAsPlayer.php" method="post">
            <label for="email">Your email:</label>
            <input type="mail" id="email" name="email" placeholder="example@email.com">
            <br>
            </br>
            <label for="pass">Password:</label>
            <input type="password" id="pass" name="pass" >
            <br>
            </br>
            <div class="btn">
                <button type="submit">Log in</button>
                <p>or</p>
            </div>
        </form>
        <a href="register.html"><button>Register</button></a>
    </div>
</div>
</body>
</html>

