<?php
include 'config.php';
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
if(!isset($_SESSION['user']) AND !isset($_SESSION['modPlayer'])){
    header('location: index.html');
}
//elseif(!isset($_SESSION['user']) AND isset($_SESSION['modPlayer'])){
//    header('location: loginAsPlayer.php');
//}
//else{
//    echo'
?>
    <!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/loading-style.css">
</head>
<body>
  <header>
    <div>
    <h1>PlanningPoker</h1>
        <a href="logout.php"><button>Log out</button></a>
      <button class="invite">Invite</button>
        <a href="board_game.html"><button>Start game <i class="fa fa-arrow-right"></i> </button></a>
      </div>
  </header>
  <div class="container">
    <div class="main">
    <h2>Game name </h2>
      <h3>People has arrived</h3>


      <!----NAME OF PEOPLE WHO ARRIVE
        EX: Manh, Linh+
      --->
        <?
        echo $_SESSION['gameID'];
        $query = "SELECT player.player_name FROM player JOIN (SELECT * FROM game where game.game_id = '".$_SESSION['gameID']."') as current_game ON player.player_id = current_game.ref_moderator
 ";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)){
            echo '<p>'.$row['player_name'].'</p>';
        }?>
        <div class="playersList">

        </div>
            </div>
    <div class="right-column">
      <div class="score">
        <p>0</p>
      </div>
      <div class="details-button">
        <div class="buttons">
           <!----Introduction of Game
      --->
          <button>I</button>
           <!----NAME OF PEOPLE WHO IS PLAYING
        EX: Manh, Linh+
      --->
          <button>P</button>
           <!----sTORIES OF THE GAME
      --->
          <button>S</button>
           <!----gROUPCHAT
      --->
          <button>C</button>
        </div>
        <div class="button-content">
           <!----when intro-button is clicked
      --->
         <div class="intro">        
          <p>Introduction about the game</p> 
         </div>
           <!----when people-button is clicked
      --->
         <div class="people">
          <p>Name of people who is playing</p> 
        </div>
           <!----when story-button is clicked
      --->
        <div class="story">
          <p>Stories</p> 
        </div>
           <!----when groupchat-button is clicked
      --->
         <div class="groupchat">
          <p>Hi</p> 
         </div>
       </div>
      </div>
      <button class="add">+ Add a story </button>
    </div>
    
  </div>
   <script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
<!--	<script src="app.js" type="text/javascript" charset="utf-8"></script>-->
  <script>
      $('document').ready(function () {
          $(".invite").click(function(event){

              event.preventDefault();
              prompt("Copy this link to share fill game name ", window.location.href);
          });
//          var getPlayers = function () {
//              $.get("getPlayers.php", function(data){
//                  $('.playersList').html(data);
//              });
//
//          }
          $.ajaxSetup({cache:false});
          // realtime with 1 second loop
          setInterval(function() {$('.playersList').load('getPlayers.php');}, 1000);
      })
  </script>
  </body>
</html>


