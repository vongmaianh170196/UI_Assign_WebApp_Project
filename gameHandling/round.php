<?php
/**
 * Created by PhpStorm.
 * User: nguyenlinh
 * Date: 24/04/2017
 * Time: 23.19
 */
include '../config.php';
session_start();


if(isset($_POST['newRound'])&& strlen($_POST['newRound'])>=1){
    echo 'meomoeoo';
    $query = "INSERT INTO `Rounds`( `Name`) VALUES ('newRound');";
    $insert = mysqli_query($conn, $query);
}

$query ="SELECT roundID FROM `Rounds` ORDER BY roundID DESC LIMIT 1;";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result))
{
    while ($row = mysqli_fetch_array($result)){
        $_SESSION['currentRound'] = $row['roundID'];
    }
    echo $_SESSION['currentRound'];

}