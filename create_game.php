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

    $query = "INSERT INTO `game`(`name`, `ref_moderator`, `started`, `description`) VALUES ('".$_POST['gname']."','".$_SESSION['user']."',NOW(),'".($_POST['descript'])."');";
    echo $query;
    $insert = mysqli_query($conn, $query);
    if($insert){
        $_SESSION['gameName'] = $_POST['gname'];
        $getGameQuery = " SELECT * FROM `game` WHERE game.name = '".$_POST['gname']."';";
        echo $getGameQuery;
        $getGame = mysqli_query($conn, $getGameQuery);
        while($row = mysqli_fetch_array($getGame))
        {
            $_SESSION['gameID']= $row['game_id'];
            $addQuery = "INSERT INTO invitedPlayer (player_id, game_id) VALUES ('".$row['ref_moderator']."','".$row['game_id']."');";
            echo $addQuery;
            $insert = mysqli_query($conn, $addQuery);
        }

        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.location.href='loading.php'
        </SCRIPT>");
    }else{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('some one have taken this name')
        window.location.href='create_game.html'
        </SCRIPT>");
    }


}