<?php
/**
 * Created by PhpStorm.
 * User: nguyenlinh
 * Date: 24/04/2017
 * Time: 23.45
 */
include '../config.php';
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
var_dump($_SESSION);
if(isset($_POST['pickedCard'])&& strlen($_POST['pickedCard'])>=1){
    echo 'meomoeoo';
    $query = "INSERT INTO `card`(`ref_player`, `card_value`, `ref_round`) VALUES ('".$_SESSION['user']."','".$_POST['pickedCard']."','".$_SESSION['currentRound']."');";
    $insert = mysqli_query($conn, $query);
}