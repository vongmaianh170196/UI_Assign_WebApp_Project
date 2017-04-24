<?php
include 'config.php';
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
if(!isset($_SESSION['user']) AND !isset($_SESSION['modPlayer'])){
    header('location: index.html');
}
$query ="SELECT ref_moderator FROM game WHERE game_id = '".$_SESSION['gameID']."' ;";
$check = mysqli_query($conn, $query);

if(mysqli_num_rows($check))
{
    while ($row = mysqli_fetch_array($check)){
        $_SESSION['modPlayer'] = $row['ref_moderator'];
    }
    header('location: list_group.php');

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/board-style.css">
</head>
<body>
<header>
    <div>
        <h1>PlanningPoker</h1>
        <a href="logout.php"><button>Log out</button></a>
        <button class="invite">Invite</button>
        <button>Dash board </button>
    </div>
</header>
<div class="container">
    <div class="main">
        <!----NAME OF STORY
      --->
        <div class="story-name">
            <h2>Name of story</h2>
        </div>
        <hr>
        <!----OPTION: FLIPS, RESET
        --->
        <div class="options">
            <ul>
                <li><button onChange="showCard" class="flips">FLIPS</button></li>
                <li><button type="reset">RESET <i class="fa fa-refresh"></i></button></li>
                <li><button>NEXT STORY >></button></li>
                <?php if($_SESSION['user']==$_SESSION['modPlayer']){
                    echo "<li><button id='newRound'>NEW ROUND</button></li>";
                } ?>


            </ul>
        </div>
        <hr>
        <!----BOARD
        --->
        <div class="board">
            <div class="users_card">
<!--                <div style="width: 200px;">-->
<!--                    <div class="picked_cards">-->
<!--                        <h1 class="picked"> Pick</h1>-->
<!--                    </div>-->
<!--                    <p>linh@gmail.com</p>-->
<!--                </div>-->
<!--                <div style="width: 200px;">-->
<!--                    <div class="picked_cards">-->
<!--                        <h1 class="picked"> Pick</h1>-->
<!--                    </div>-->
<!--                    <p>linh@gmail.com</p>-->
<!--                </div>-->
<!--                <div style="width: 200px;">-->
<!--                    <div class="picked_cards">-->
<!--                        <h1 class="picked"> Pick</h1>-->
<!--                    </div>-->
<!--                    <p>linh@gmail.com</p>-->
<!--                </div>-->
<!--                <div style="width: 200px;">-->
<!--                    <div class="picked_cards">-->
<!--                        <h1 class="picked"> Pick</h1>-->
<!--                    </div>-->
<!--                    <p>linh@gmail.com</p>-->
<!--                </div>-->
<!--                <div style="width: 200px;">-->
<!--                    <div class="picked_cards">-->
<!--                        <h1 class="picked"> Pick</h1>-->
<!--                    </div>-->
<!--                    <p>linh@gmail.com</p>-->
<!--                </div>-->
<!--                <div style="width: 200px;">-->
<!--                    <div class="picked_cards">-->
<!--                        <h1 class="picked"> Pick</h1>-->
<!--                    </div>-->
<!--                    <p>linh@gmail.com</p>-->
<!--                </div>-->
            </div>




            <p class="currentRound"> <?php echo $_SESSION['currentRound'];?></p>
        </div>
        <hr>
        <!----CARDS
        --->

        <div class="cards">
            <button id="0" value="0" class="player-cards">
                0
            </button>
            <button id="1" value="1" class="player-cards">
                1
            </button>
            <button id="2" value="2" class="player-cards">
                2
            </button>
            <button id="3" value="3" class="player-cards">
                3
            </button>
            <button id="5" value="5" class="player-cards">
                5
            </button>
            <button id="8" value="8" class="player-cards">
                8
            </button>
            <button id="13" value="13" class="player-cards">
                13
            </button>
            <button id="21" value="21" class="player-cards">
                21
            </button>
            <button id="34" alue="34" class="player-cards">
                34
            </button>
            <button id="55" value="55" class="player-cards">
                55
            </button>
            <button id="89" value="89" class="player-cards">
                89
            </button>
            <button id="pass" value="pass" class="player-cards" >
                Pass
            </button>
        </div>
        <!----END BOARD
        --->
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
<script src="app.js" type="text/javascript" charset="utf-8"></script>
<script>
    $('.picked').hide();



    $(document).ready(function(){

        $('.player-cards').click(function(e){
            var cardID = e.target.id
            console.log(cardID)
            $('.picked').show();
            $.ajax({
                url: 'gameHandling.php',
                type: 'POST',
                data: {
                    pickedCard: cardID
                },
                success: function (success) {
                    alert(success);
                }
            })

        });
        $('#people').click(function (){
            $.ajaxSetup({cache:false});
            // realtime with 1 second loop
            setInterval(function() {$('.content').load('getPlayers.php');}, 1000);
            });
//        $('#groupchat').click(function () {
//            var chatHtml = "<div class='chatConversation'>" +
//                "</div>"
////                "<input type='text' name='message' id='message'>";
//            $('.content').html(chatHtml)
//        });


//        READING KEYPRESS TO SEND MESSAGE
        $('#message').keypress(function () {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                console.log('hihi')
                console.log($('#message').val())
                // send mess Ajax
                content_ajax()
            }
        });

//        ADDING NEW ROUND
        $('#newRound').click(function () {
            $.ajax(
                {
                    url: "gameHandling/round.php"
                    , type: "post"
                    , dateType: "text"
                    , data: {
                    newRound: 'newRound',
                }
                    , success: function (result) {

                }
                }
            )

        });




//        SENDING PICKED CARD TO THE DATABASE
        $('.picked').hide();

        $('.player-cards').click(function(e){
            var cardID = e.target.id
            console.log(cardID)
            $('.picked').show();
            $.ajax({
                url: 'gameHandling/pickedCard.php',
                type: 'POST',
                data: {
                    pickedCard: cardID
                },
                success: function (success) {
                    alert(success);
                }
            })

        });


    $(".flips").click(function(){
        var href = this.href;
        $.ajax({
            url: '',
            type: 'POST',
            data: { target: href },
            success: function (success) {
                setTimeout(function (){

                }, 1000)
            }
        });
    });


    //LOADING CHAT CONTENT
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
        $.ajaxSetup({cache:false});
        // real time with 1 second loop
        setInterval(
            function()
            {
                $('.chatConversation').load('chatContent.php');
                $('.currentRound').load('gameHandling/round.php');
                $('.users_card').load('gameHandling/cardLoading.php');
            }
            , 1000);



    });

</script>
</body>
</html>