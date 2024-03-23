<?php
require_once "../config/config.php";
$nr_3 = "SELECT * FROM `module` WHERE `name` = 'Bewerten' and `status` = 'on'";
$nr_result3 = mysqli_query($link, $nr_3);
$nr3 = mysqli_num_rows($nr_result3);
if ($nr3 == 0) {
  header('location: ../index.php');
}
?>
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
<style>
.menu_button {
    color: orange;
    background-color: white;
    padding: 8px 16px;
    font-size: 16px;
    display: flex;
    font-weight: 600;
    border-radius: 2px;
    cursor: pointer;
    box-shadow: 2px 0px 8px rgb(0 0 0 / 20%);
    border: unset;
}

.menu_button:hover {
    background-color: rgb(155, 153, 153);
    color: white;
}
</style>
<style>
  .rating {
      unicode-bidi: bidi-override;
      direction: rtl;
  }

  .rating > label {
      display: inline-block;
      padding: 10px; /* Größere Polsterung für größere Sterne */
      font-size: 30px; /* Größere Schriftgröße für größere Sterne */
      cursor: pointer;
      color: #ccc; /* Graue Sterne */
  }

  .rating > input[type="radio"] {
      display: none;
  }

  .rating > label:before {
      content: "\2605";
  }

  .rating > label:hover:before,
  .rating > label:hover ~ label:before,
  .rating > input[type="radio"]:checked ~ label:before {
      color: gold; /* Goldgelbe Sterne bei Hover und ausgewählten Zustand */
  }
  .rating .star-filled {
      color: gold; /* Color for filled stars */
  }

  .rating .star-empty {
      color: #ccc; /* Color for empty stars */
  }
</style>
<html style="font-size: 16px;" lang="de"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="keywords" content="​Author&amp;apos;s cake and desserts for your holiday, ​Few words about myself, ​Catalog, How We Work, Facts &amp;amp; Questions, ​​Best Choice, ​Make an order">
    <meta name="description" content="">
    <title>Bestellen</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="../Bestellen.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>

    <meta name="generator" content="Nicepage 4.13.4, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    
    <?php
    $snowflakeModuleQuery = "SELECT * FROM `module` WHERE `name` = 'Schneeflocken' and `status` = 'on'";
    $snowflakeModuleResult = mysqli_query($link, $snowflakeModuleQuery);
    $snowflakeModuleRows = mysqli_num_rows($snowflakeModuleResult);
    if ($snowflakeModuleRows == 1) {
      require_once "../designs/snow.php";
    }
    ?>
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Restaurant"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Bestellen">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body u-xl-mode"><header class="u-clearfix u-header u-header" id="sec-03fb"><div class="u-clearfix u-sheet u-sheet-1">
        <nav class="u-align-left u-menu u-menu-dropdown u-menu-hamburger u-offcanvas u-menu-1" data-responsive-from="XL">
          <div class="menu-collapse">
            <a class="u-button-style u-nav-link" href="#" style="padding: 4px 0px; font-size: calc(1em + 8px);">
              <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 302 302" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-5c50"></use></svg>
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="svg-5c50" x="0px" y="0px" viewBox="0 0 302 302" style="enable-background:new 0 0 302 302;" xml:space="preserve" class="u-svg-content"><g><rect y="36" width="302" height="30"></rect><rect y="236" width="302" height="30"></rect><rect y="136" width="302" height="30"></rect>
</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
            </a>
          </div>
          <div class="u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><?php
$lines = file('../config/menu_normal_1.txt');
foreach($lines as $line) {
  echo $line;
}
?></ul>
          </div>
          <div class="u-nav-container-collapse">
            <div class="u-align-center u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><?php
$lines = file('../config/menu_normal_2.txt');
foreach($lines as $line) {
  echo $line;
}
?></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
        <p class="u-text u-text-default u-text-1"><?php require_once "../config/config.php"; echo $RESTAURANT_NAME; ?></p>
        <h4 class="u-text u-text-default u-text-1">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Willkommen bei den Bewertungen</h4><?php
echo '<a href="logout.php" style="background-color: #5B67FF; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1">Logout</a>';
echo '<a href="reset-password.php" style="background-color: #5B67FF; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1">Passwort ändern</a>';
echo '<a href="../account/index.php" style="background-color: #5B67FF; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1">Dein Account</a>';
?>
      </div></header>

    <section class="u-clearfix u-grey-5 u-section-2" id="carousel_a603">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-align-left u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                <div class="u-container-layout u-container-layout-1">
                  <div class="u-form u-form-1">
<?php
require_once "../config/config.php";

$id = $_SESSION['id'];
$sql = "SELECT * FROM `users` WHERE `id` = '$id'";
$result = mysqli_query($link, $sql);
while ($zeile = mysqli_fetch_array( $result, MYSQLI_ASSOC)) {
  $mail = $zeile['mail'];
}
$sql2 = "SELECT * FROM `mail_verify` WHERE `confirmed` = '0' AND `mail` = '$mail'";
$result2 = mysqli_query($link, $sql2);
$num = mysqli_num_rows($result2);
if ($num == 1) {
  echo '<fieldset>
  <h3>Dieser Account ist noch nicht verifiziert</h3>
  <a href="verify-mail.php?mail='.$mail.'" style="background-color: #5B67FF; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1">Jetzt verifizieren</a>
  <h4>Zum Bewerten, muss der Account verifiziert werden!</h4>
  </fieldset><br><br><br>';
} else {
  $user = htmlspecialchars($_SESSION["username"]);
  $sql_last_order = "SELECT * FROM `bewertungen` WHERE `username`='$user' ORDER BY `bewertungen`.`id` DESC LIMIT 1";
  $sql_last_result = mysqli_query($link, $sql_last_order);
  $differenzInStunden = 12;
  foreach ($sql_last_result as $zeile) {
    $angegebenesDatum = strtotime($zeile['time']);
    $aktuellesDatum = time();
    $differenzInSekunden = $aktuellesDatum - $angegebenesDatum;
    $differenzInStunden = $differenzInSekunden / 3600;
  }
  if ($differenzInStunden >= 12) {
    echo '<form action="/bestellen/bewerten/bewertung-senden.php" method="POST" name="form">
    <div class="rating">
      <input type="radio" id="star5" name="rating" value="5">
      <label for="star5"></label>
      <input type="radio" id="star4" name="rating" value="4">
      <label for="star4"></label>
      <input type="radio" id="star3" name="rating" value="3">
      <label for="star3"></label>
      <input type="radio" id="star2" name="rating" value="2">
      <label for="star2"></label>
      <input type="radio" id="star1" name="rating" value="1">
      <label for="star1"></label>
    </div>
    <input type="number" id="starsValue" name="starsValue" readonly style="display: none" required>';
    echo '<input type="text" placeholder="Ihre Bewertung" id="input1" name="input1" required=""><input type="text" id="input2" name="input2" value="'.$user.'" hidden><br><br>';
  } else {
    $diff2 = round(12 - $differenzInStunden);
    echo '<fieldset><p>Du kannst erst wieder in <strong>'.$diff2.' Stunde(n)</strong> Bewerten!</p></fieldset><br><br>';
  }
  echo '<input type="submit" value="Senden" id="senden" class="menu_button" style="display: none">
  </form><br><br><br>';
}

$query = "SELECT * FROM `bewertungen` ORDER BY `id` DESC";
$result = mysqli_query($link, $query); 
while($zeile = mysqli_fetch_array( $result, MYSQLI_ASSOC)) {
    $usern = $zeile['username'];
    $sql_rang = "SELECT * FROM `users` WHERE `username` = \"$usern\"";
    $result2 = mysqli_query($link, $sql_rang);
    $num_row = mysqli_num_rows($result2);
    $team = False;
    while($zeile2 = mysqli_fetch_array( $result2, MYSQLI_ASSOC)) {
      if ($zeile2['bewerten_rang'] == 'Admin') {
        $rang_icon = '<img src="../icons/admin.png" height="25" width="25">';
        $color = '#ff6c60';
        $rang = 'Admin';
      } else if ($zeile2['bewerten_rang'] == 'Team') {
        $rang_icon = '<img src="../icons/team.png" height="25" width="25">';
        $color = '#7daff5';
        $rang = 'Team';
      } else {
        $rang_icon = '<img src="../icons/user.png" height="25" width="25">';
        $color = 'black';
        $rang = 'Mitglied';
      }
    }
    mysqli_free_result($result2);
    if ($num_row == 0) {
      echo '<h3 style="color: gray"><s>'.$usern.'</s> (Gelöschter Nutzer)</h3>';
      echo '<h4 style="color: gray">'.$zeile['text'].'</h4>';
      echo '<h6 style="color: gray">'.$zeile['time'].'</h6>';
      echo '<br>';
      echo '<br>';
    } else {
      echo '<h3 style="color: '.$color.';">'.$usern.' '.$rang_icon.'</h3>';
      if ($color == "black") {
        $stars = $zeile['stars'];
        echo '<div class="rating">';
        for ($i = 5; $i >= 1; $i--) { // Reverse the loop to start with 5 stars
          $starClass = ($i <= $stars) ? 'star-filled' : 'star-empty';
          echo '<span class="' . $starClass . '">&#9733;</span>'; // Use a star character
        }
        echo '</div>';
      }
      echo '<h4 style="color: '.$color.';">'.$zeile['text'].'</h4>';
      echo '<h6 style="color: gray">'.$zeile['time'].'</h6>';
      echo '<br>';
      echo '<br>';
    }
    $rang_icon = '';
    $color = '';
}          
?> 

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script>
        var ratingInputs = document.querySelectorAll('input[name="rating"]');
        var starsValue = document.getElementById("starsValue");
        var submit = document.getElementById("senden");

        ratingInputs.forEach(function(input) {
            input.addEventListener("change", function() {
                starsValue.value = this.value;
                submit.style.display = "block";
            });
        });
    </script>

</body></html><img src="" wid height="" alt="">