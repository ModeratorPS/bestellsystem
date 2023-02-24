<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Willkommen bei den Bewertungen</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Password ändern</a>
        <a href="logout.php" class="btn btn-danger ml-3">Log out</a>
    </p>
</body>
</html>

<!doctype html>
<html>
    <head>
        <title>Willkommen</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
<style>
    .aenu {
    padding: 20px 50px;
    color: black;
    display: flex;
    align-items: center;
    text-align: center;
    border-color: rgba(119, 115, 115, 0.861);
    border-width: 5px;
    border-style: solid;
    background: #f5f5f5;
    -moz-box-shadow: inset 0 0 15px 5px #DDD;
    -webkit-box-shadow: inset 0 0 15px 5px #DDDDE5;
    box-shadow: inset 0 0 15px 5px #DDD;
    border-radius: 40px;
    -moz-border-radius: 40px;
    -webkit-border-radius: 40px;
    clear: both;
  }
  
  .menu {
    color: black;
    display: flex;
    padding: 10px;
    
    border-color: rgba(119, 115, 115, 0.861);
    border-width: 5px;
    border-style: solid;
    background: #f5f5f5;
    -moz-box-shadow: inset 0 0 15px 5px #DDD;
    -webkit-box-shadow: inset 0 0 15px 5px #DDDDE5;
    box-shadow: inset 0 0 15px 5px #DDD;
    border-radius: 40px;
    -moz-border-radius: 40px;
    -webkit-border-radius: 40px;
    clear: both;
  
    font-size: 16px;
    text-align: center;
  }
  
  @import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');
  
  * {
    box-sizing: border-box;
  }
  
  body {
    background: white;    
    font-family: 'Montserrat', sans-serif;
  }
  
  .btn {
    background-color: lightgray;
    color: #000;
    border: 0;
    border-radius: 4px;
    padding: 12px 30px;
    cursor: pointer;
  }
  
  .btn:focus {
    outline: 0;
  }
  
  .btn:active {
    transform: scale(0.98);
  }
</style>
    </head>
    <body>

    <form action="/bestellen/bewerten/bewertung-senden.php" method="POST" name="form">
        <input type="text" placeholder="Ihre Bewertung" id="input1" name="input1" required=""><input type="text" id="input2" name="input2" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>" hidden><br><br>
        <input type="submit" value="submit" class="btn btn-warning">
    </form><br><br><br>

<?php
require_once "../config.php";

$query = "SELECT * FROM `bewertungen`";
$result = mysqli_query($link, $query); 
while($zeile = mysqli_fetch_array( $result, MYSQLI_ASSOC)) {
    echo '<div class="menu" style="justify-content: left; padding: 40px 40px 40px 40px;">';
    echo '<br>';
    echo '<h3>'.$zeile['username'].': '.$zeile['text'].'</h3>'; 
    echo '<br>';
    echo '</div>';
    echo '<br>';
}          
?> 

        <script src="script.js"></script>
    </body>
</html>