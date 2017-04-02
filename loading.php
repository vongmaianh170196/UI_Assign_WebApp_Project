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
    <button>Log out</button>
      <button class="invite">Invite</button>
      <button>Start game <i class="fa fa-arrow-right"></i> </button>
      </div>
  </header>
  <div class="container">
    <div class="main">
    <h2>Game name </h2> <? echo $_SESSION['gameName']?>
      <h3>People has arrived</h3>


      <!----NAME OF PEOPLE WHO ARRIVE
        EX: Manh, Linh+
      --->
        <?
        $query = "SELECT  `player_name` FROM `player` WHERE player_id = '".$_SESSION['modPlayer']."' ";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)){
            echo '<p>'.$row['player_name'].'</p>';
        }?>
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
	<script src="app.js" type="text/javascript" charset="utf-8"></script>
  </body>
</html>


