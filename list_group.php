<?
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create</title>
	<link rel="stylesheet" href="list.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.0.js"></script>
</head>
<body>
  <header>
    <div>
    <h1>PlanningPoker</h1>
        <a href="logout.php"><button>Log out</button> </a>
        <a href="create_game.html"><button>Create a new game</button></a>
      </div>
  </header>
  <div class="container">
    <h1>Choose your group</h1>
    <div class="gameListComeHere"></div>
  </div>
  <script>
      $('document').ready(function () {
              $.get("listGroup.php", function(data){
                  $('.gameListComeHere').html(data);
              });
      })
      $(document).on('click','.gameListComeHere button', function changePage (e) {
          var buttonID = e.target.id
          console.log(buttonID)
          var sendData = {
              game: buttonID
          }

          $.post("setGame.php", sendData, function (data) {
              alert(data)
              window.location="loading.php"
          });
      })
  </script>
  </body>
</html>