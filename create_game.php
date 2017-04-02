<?php
/**
 * Created by PhpStorm.
 * User: nguyenlinh
 * Date: 31/03/2017
 * Time: 22.49
 */
include 'config.php';
session_start();
echo $_POST['gname'];
echo $_POST['descript'];
if(isset($_POST['gname'])
    && isset($_POST['descript'])
    && strlen($_POST['gname'])>=1
    && strlen($_POST['descript'])>=1)
{

    $query = "INSERT INTO `game`(`name`, `ref_moderator`, `started`, `description`) VALUES ('".$_POST['gname']."','".$_SESSION['modPlayer']."',NOW(),'".($_POST['descript'])."');";
    echo $query;
    $insert = mysqli_query($conn, $query);
    $_SESSION['gameName'] = $_POST['gname'];
    echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.location.href='loading.php'
        </SCRIPT>");

}