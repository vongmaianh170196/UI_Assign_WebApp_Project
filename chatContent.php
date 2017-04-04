<?php
/**
 * Created by PhpStorm.
 * User: nguyenlinh
 * Date: 04/04/2017
 * Time: 21.52
 */
include 'config.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
if(isset($_POST['message'])
    AND isset($_SESSION['user']) AND strlen($_POST['message'])>0
){
    $inserted= mysqli_query($conn, "INSERT INTO simple_chat
    (username, message, message_time, ref_game) VALUES
    ('".$_SESSION['user']."','".$_POST['message']."', NOW(),'".$_SESSION['gameID']."')");

//  echo mysqli_error($conn);
}
$result = mysqli_query($conn, "SELECT *
    FROM simple_chat WHERE ref_game = '".$_SESSION['gameID']."'
    ORDER BY message_time DESC");
while($row = mysqli_fetch_array($result))
{
    if ($row['username'] == $_SESSION['user'])
    {
        echo	'<div class="msg-user">';
        echo '<p>'.$row['message'].'</p>';
        echo		'<div class="info-msg-user">';
        echo        "<strong>"."You"."</strong>";
        echo " ".finnish_dateformat($row['message_time']);
        echo "<br>";
        echo '</div>';
        echo	'</div>';
    }
    else
    {
        echo	'<div class="msg">';
        echo '<p>'.$row['message'].'</p>';
        echo		'<div class="info-msg">';
        echo        "<strong>".$row['username']."</strong>";
        echo " ".finnish_dateformat($row['message_time']);
        echo "<br>";
        echo '</div>';
        echo	'</div>';
    }
}