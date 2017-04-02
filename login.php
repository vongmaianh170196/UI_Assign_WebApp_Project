<?php
/**
 * Created by PhpStorm.
 * User: nguyenlinh
 * Date: 30/03/2017
 * Time: 19.20
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
         $_SESSION['modPlayer'] = $row['player_id'];
     }
     header('location: create_game.html');

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