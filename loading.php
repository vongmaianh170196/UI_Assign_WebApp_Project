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
        <a href="board_game.php"><button>Start game <i class="fa fa-arrow-right"></i> </button></a>
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
        echo $_SESSION['gameID']; ?>
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
                  <button id="intro">I</button>
                  <!----NAME OF PEOPLE WHO IS PLAYING
               EX: Manh, Linh+
             --->
                  <button id="people">P</button>
                  <!----sTORIES OF THE GAME
             --->
                  <button id="story">S</button>
                  <!----gROUPCHAT
             --->
                  <button id="groupchat">C</button>
              </div>
              <div class="button-content">
                  <div class="content">
                      <div class="chatConversation">

                      </div>

                  </div>


              </div>
          </div>
          <input type="text" name="message" id="message">
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

          $.ajaxSetup({cache:false});
          // realtime with 1 second loop
          setInterval(
              function() {
                  $('.playersList').load('getPlayers.php');
                  $('.chatConversation').load('chatContent.php');
              }
              , 1000);

          $('#message').keypress(function () {
              var keycode = (event.keyCode ? event.keyCode : event.which);
              if (keycode == '13') {
                  console.log('hihi')
                  console.log($('#message').val())
                  // send mess Ajax
                  content_ajax()
              }
          });
          function content_ajax() {
              $.ajax({
                      url: "chatContent.php"
                      , type: "post"
                      , dateType: "text"
                      , data: {
                          message: $('#message').val(),
                      }
                      , success: function (result) {
                          $('#message').val('')
                          $(".chatConversation").html(result)
                      }
                  }
              )
          };
//          $.ajaxSetup({cache:false});
//          // real time with 1 second loop
//          setInterval(function() {$('.chatConversation').load('chatContent.php');}, 1000);
//
//
//
//      });
      })
  </script>
  </body>
</html>


