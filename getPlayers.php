<?php
/**
 * Created by PhpStorm.
 * User: nguyenlinh
 * Date: 03/04/2017
 * Time: 9.58
 */
include 'config.php';
session_start();
$query = "SELECT * FROM player JOIN (SELECT player_id FROM invitedPlayer WHERE invitedPlayer.game_id = '".$_SESSION['gameID']."') as players_list ON player.player_id = players_list.player_id";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($result))
{
    echo '<p>'.$row['player_name'].'</p>';
}
