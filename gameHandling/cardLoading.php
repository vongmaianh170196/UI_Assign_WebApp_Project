<?php
/**
 * Created by PhpStorm.
 * User: nguyenlinh
 * Date: 25/04/2017
 * Time: 0.18
 */
include '../config.php';
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

$query ="SELECT `card_value`, `ref_round`, `player_name` FROM card JOIN player ON ref_player = player.player_id WHERE ref_round = '".$_SESSION['currentRound']."' GROUP BY player.player_name;";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result))
{
    while ($row = mysqli_fetch_array($result)){
        echo' <div style="width: 200px;">
                    <div class="picked_cards">
                        <h1 class="picked"> '.$row['card_value'].'</h1>
                    </div>
                    <p>'.$row['player_name'].'</p>
                </div>';
    }
    echo $_SESSION['currentRound'];

}