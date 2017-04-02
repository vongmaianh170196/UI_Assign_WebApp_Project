<?php
/**
 * Created by PhpStorm.
 * User: nguyenlinh
 * Date: 30/03/2017
 * Time: 14.06
 */
include 'config.php';

if(isset($_POST['email'])
    && isset($_POST['pass'])
    && strlen($_POST['email'])>=1
    && strlen($_POST['pass'])>=1)
{
    $query ="SELECT * FROM player WHERE player_name = '".$_POST['email']."'; ";
    $check = mysqli_query($conn, $query);

    if(mysqli_num_rows($check))
    {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert(\"someone has taken this name/ password, please chose another one!\")
        window.location.href='register.html'
        </SCRIPT>");

    }else
    {
        $query = "INSERT INTO `player`( `player_name`, `player_password`) VALUES ('".$_POST['email']."','".md5($_POST['pass'])."');";
        $insert = mysqli_query($conn, $query);
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert(\"register successfully! welcome\")
        window.location.href='index.html'
        </SCRIPT>");
    }
}else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert(\"Please fill the required fields\")
        window.location.href='register.html'
        </SCRIPT>");
}