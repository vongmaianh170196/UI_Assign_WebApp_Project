<?php
/**
 * Created by PhpStorm.
 * User: nguyenlinh
 * Date: 04/04/2017
 * Time: 20.19
 */
include'config.php';
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
echo $_SESSION['gameID'];
$query = "SELECT player.player_name FROM player JOIN (SELECT * FROM game where game.game_id = '".$_SESSION['gameID']."') as current_game ON player.player_id = current_game.ref_moderator
 ";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result)) {
    echo '<p>' . $row['player_name'] . '</p>';
}