<?php
/**
 * Created by PhpStorm.
 * User: nguyenlinh
 * Date: 03/04/2017
 * Time: 8.28
 */
include 'config.php';
session_start();


$query = "SELECT * FROM game ORDER BY game_id DESC";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($result))
{
    echo '<button id='.$row['game_id'].'>'.$row['name'].'</button>';
    echo '<br>';
    echo '<br>';

}
