<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  $redirect = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  header("location: ../auth/login.php?redirect=".$redirect);
  exit;
}
require_once "../config/config.php";
$sql_modul = "SELECT * FROM `module` WHERE `name` = 'Bewerten' and `status` = 'on'";
$sql_modul_result = mysqli_query($link, $sql_modul);
$sql_modul_num_rows = mysqli_num_rows($sql_modul_result);
if ($sql_modul_num_rows == 0) {
  header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="de"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="description" content="">
    <title>⭐ - Bewerten</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
    <link rel="stylesheet" href="../theme.css" media="screen">
    <link rel="stylesheet" href="style.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.13.8, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    <script src="script.js"></script>
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
		"name": "Site2"
}</script>
    <meta name="theme-color" content="#3745f9">
    <meta property="og:title" content="user">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="de"><header class="u-clearfix u-header" id="sec-35c2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><div class="u-clearfix u-sheet u-valign-middle-xs u-sheet-1">
        <nav class="u-align-left u-font-size-14 u-menu u-menu-hamburger u-nav-spacing-25 u-offcanvas u-menu-1" data-responsive-from="XL">
          <div class="menu-collapse">
            <a class="u-button-style u-nav-link" href="#" style="padding: 7px 9px; font-size: calc(1em + 14.2969px);">
              <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 302 302" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-7b92"></use></svg>
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="svg-7b92" x="0px" y="0px" viewBox="0 0 302 302" style="enable-background:new 0 0 302 302;" xml:space="preserve" class="u-svg-content"><g><rect y="36" width="302" height="30"></rect><rect y="236" width="302" height="30"></rect><rect y="136" width="302" height="30"></rect>
</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><?php
            $lines = file('../config/menu_normal_1.txt');
            foreach($lines as $line) {
              echo $line;
            }
            ?></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-align-center u-container-style u-inner-container-layout u-opacity u-opacity-90 u-sidenav u-white">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close u-menu-close-1"></div>
                <?php
                $sql_login_button = "SELECT * FROM `module` WHERE `name` = 'Account' and `status` = 'on'";
                $sql_login_result = mysqli_query($link, $sql_login_button);
                $sql_login_result_num_rows = mysqli_num_rows($sql_login_result);
                if ($sql_login_result_num_rows != 0) {
                  if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
                    $redirect = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    echo '<a href="../auth/login.php?redirect='.$redirect.'" class="u-border-2 u-border-black u-btn u-button-style u-hover-black u-none u-text-hover-white u-btn-1">ANMELDEN</a>';
                  } else {
                    echo '<a href="../account/index.php" class="u-border-2 u-border-black u-btn u-button-style u-hover-black u-none u-text-hover-white u-btn-1">ACCOUNT</a>';
                  }
                }
                ?>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><?php
                $lines = file('../config/menu_normal_2.txt');
                foreach($lines as $line) {
                  echo $line;
                }
                ?></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-30"></div>
          </div>
        </nav>
        <h2 class="u-align-center u-text u-text-1"><?php echo $RESTAURANT_NAME; ?></h2>
      </div></header>
    <section class="u-clearfix u-section-1" id="carousel_9c88">
      <div class="infinite u-container-align-center u-container-style u-custom-color-2 u-expanded-width u-group u-shape-rectangle u-group-1">
        <div class="u-container-layout u-valign-middle u-container-layout-1">
          <?php
          $id = $_SESSION['id'];
          $sql_user = "SELECT * FROM `users` WHERE `id` = '$id'";
          $sql_user_result = mysqli_query($link, $sql_user);
          foreach ($sql_user_result as $row) {
            $mail = $row['mail'];
          }
          $sql_profile_verify = "SELECT * FROM `mail_verify` WHERE `confirmed` = '0' AND `mail` = '$mail'";
          $sql_profile_verify_result = mysqli_query($link, $sql_profile_verify);
          $sql_profile_verify_num_rows = mysqli_num_rows($sql_profile_verify_result);
          if ($sql_profile_verify_num_rows == 1) {
            echo '<fieldset>
            <h3>Dieser Account ist noch nicht verifiziert</h3>
            <a href="verify-mail.php?mail='.$mail.'" style="background-color: #5B67FF; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1">Jetzt verifizieren</a>
            <h4>Zum Bewerten, muss der Account verifiziert werden!</h4>
            </fieldset><br><br><br>';
          } else {
            $user = htmlspecialchars($_SESSION["username"]);
            $sql_last_text = "SELECT * FROM `bewertungen` WHERE `username`='$user' ORDER BY `bewertungen`.`id` DESC LIMIT 1";
            $sql_last_text_result = mysqli_query($link, $sql_last_text);
            $differenceinhours = 12;
            foreach ($sql_last_text_result as $row) {
              $writtendate = strtotime($row['time']);
              $momentdate = time();
              $differenceinseconds = $momentdate - $writtendate;
              $differenceinhours = $differenceinseconds / 3600;
            }
            if ($differenceinhours >= 12) {
              echo '<form action="bewertung-senden.php" method="POST" name="form">
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
              echo '<input type="text" placeholder="Ihre Bewertung" id="input1" name="input1" required=""><input type="text" id="input2" name="input2" value="'.$user.'" hidden><br>';
            } else {
              $difference = round(12 - $differenceinhours);
              echo '<fieldset><p>Du kannst erst wieder in <strong>'.$difference.' Stunde(n)</strong> Bewerten!</p></fieldset><br><br>';
            }
            echo '<input type="submit" value="Senden" name="senden" id="senden" class="menu_button" style="display: none">
            </form><br>';
          }
          $sql_texts = "SELECT * FROM `bewertungen` ORDER BY `id` DESC";
          $sql_texts_result = mysqli_query($link, $sql_texts);
          foreach ($sql_texts_result as $row) {
            $user = $row['username'];
            $sql_rang = "SELECT * FROM `users` WHERE `username` = \"$user\"";
            $sql_rang_result = mysqli_query($link, $sql_rang);
            $sql_rang_num_rows = mysqli_num_rows($sql_rang_result);
            $team = False;
            foreach ($sql_rang_result as $row2) {
              if ($row2['bewerten_rang'] == 'Admin') {
                $rang_icon = '<img src="../icons/admin.png" height="25" width="25">';
                $color = '#ff6c60';
                $rang = 'Admin';
              } else if ($row2['bewerten_rang'] == 'Team') {
                $rang_icon = '<img src="../icons/team.png" height="25" width="25">';
                $color = '#7daff5';
                $rang = 'Team';
              } else {
                $rang_icon = '<img src="../icons/user.png" height="25" width="25">';
                $color = 'black';
                $rang = 'Mitglied';
              }
            }
            if ($sql_rang_num_rows == 0) {
              echo '<h3 style="color: gray"><s>'.$user.'</s> (Gelöschter Nutzer)</h3>';
              $stars = $row['stars'];
              echo '<div class="rating">';
              for ($i = 5; $i >= 1; $i--) {
                $starClass = ($i <= $stars) ? 'star-filled' : 'star-empty';
                echo '<span class="' . $starClass . '">&#9733;</span>';
              }
              echo '</div>';
              echo '<h4 style="color: gray">'.$row['text'].'</h4>';
              echo '<h6 style="color: gray">'.$row['time'].'</h6>';
              echo '<br>';
              echo '<br>';
            } else {
              echo '<h3 style="color: '.$color.';">'.$user.' '.$rang_icon.'</h3>';
              if ($color == "black") {
                $stars = $row['stars'];
                echo '<div class="rating">';
                for ($i = 5; $i >= 1; $i--) {
                  $starClass = ($i <= $stars) ? 'star-filled' : 'star-empty';
                  echo '<span class="' . $starClass . '">&#9733;</span>';
                }
                echo '</div>';
              }
              echo '<h4 style="color: '.$color.';">'.$row['text'].'</h4>';
              echo '<h6 style="color: gray">'.$row['time'].'</h6>';
              echo '<br>';
              echo '<br>';
            }
            $rang_icon = '';
            $color = '';
          }
          ?>
        </div>
      </div>
    </section>
</body>
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
</html>