<?php
/**
 * Created by PhpStorm.
 * User: nguyenlinh
 * Date: 03/04/2017
 * Time: 8.52
 */
include 'config.php';
session_start();
if(isset($_POST['game'])){
    $_SESSION['gameID'] = $_POST['game'];
}
$insertQuery= "INSERT INTO invitedPlayer (player_id, game_id) VALUES ('".$_SESSION['user']."','".$_SESSION['gameID']."');";
$newQuery = mysqli_query($conn, $insertQuery);
echo $insertQuery;
