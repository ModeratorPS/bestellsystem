<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  $redirect = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  header("location: ../auth/login.php?redirect=".$redirect);
  exit;
}
require_once "../config/config.php";
$sql_modul = "SELECT * FROM `module` WHERE `name` = 'Account' and `status` = 'on'";
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
    <title>🗃️ - Account</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
    <link rel="stylesheet" href="../theme.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.13.8, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
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
                <a href="../auth/logout.php" class="u-border-2 u-border-black u-btn u-button-style u-hover-black u-none u-text-hover-white u-btn-1" style="margin: auto auto auto 60px">LOGOUT</a>
                <a href="../auth/reset-password.php" class="u-border-2 u-border-black u-btn u-button-style u-hover-black u-none u-text-hover-white u-btn-1" style="margin: 20px auto auto 15px">PASSWORT ÄNDERN</a>
                <?php
                if ($_SESSION["loggedin_admin"] == true) {
                  echo '<a href="../admin/index.php" class="u-border-2 u-border-black u-btn u-button-style u-hover-black u-none u-text-hover-white u-btn-1" style="margin: 20px auto auto 30px">ADMIN PORTAL</a>';
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
          $mail = $zeile['mail'];
        }
        $sql_profile_verify = "SELECT * FROM `mail_verify` WHERE `confirmed` = '0' AND `mail` = '$mail'";
        $sql_profile_verify_result = mysqli_query($link, $sql_profile_verify);
        $sql_profile_verify_num_rows = mysqli_num_rows($sql_profile_verify_result);
        if ($sql_profile_verify_num_rows == 1) {
          echo '<fieldset>
          <h3>Dieser Account ist noch nicht verifiziert</h3>
          <a href="../auth/verify-mail.php?mail='.$mail.'" class="u-border-2 u-border-black u-btn u-button-style u-hover-black u-none u-text-hover-white u-btn-1">JETZT VERIFIZIEREN</a>
          <h4>Um weitere Funktionen freizuschalten, muss der Account verifiziert sein!</h4>
          </fieldset><br><br>';
          return;
        }
        ?><fieldset <?php
        $sql_modul2 = "SELECT * FROM `module` WHERE `name` = 'Bewerten' and `status` = 'on'";
        $sql_modul2_result = mysqli_query($link, $sql_modul2);
        $sql_modul2_num_rows = mysqli_num_rows($sql_modul2_result);
        if ($sql_modul2_num_rows == 0) {
          echo "display: none; visibility: hidden";
        }
        ?>>
        <legend>Accountart</legend>
        <?php
        $user = $_SESSION['username'];
        $sql_rang = "SELECT * FROM `users` WHERE `username` = \"$user\"";
        $sql_rang_result = mysqli_query($link, $sql_rang);
        foreach ($sql_rang_result as $row) {
          if ($row['bewerten_rang'] == 'Admin') {
            $rang_icon = '<img src="../icons/admin.png" height="25" width="25">';
            $color = '#ff6c60';
            $rang = 'Admin';
          } else if ($row['bewerten_rang'] == 'Team') {
            $rang_icon = '<img src="../icons/team.png" height="25" width="25">';
            $color = '#7daff5';
            $rang = 'Team';
          } else {
            $rang_icon = '<img src="../icons/user.png" height="25" width="25">';
            $color = 'black';
            $rang = 'Mitglied';
          }
        }
        echo '<h3 style="color: '.$color.'; margin: 10px">'.$rang_icon.' <strong>'.$rang.'</strong></h3>';
        $rang_icon = '';
        $color = '';
        $rang = ''; 
        ?>
        </fieldset><?php
        $sql_modul3 = "SELECT * FROM `module` WHERE `name` = 'Bewerten' and `status` = 'on'";
        $sql_modul3_result = mysqli_query($link, $sql_modul3);
        $sql_modul3_num_rows = mysqli_num_rows($sql_modul3_result);
        if ($sql_modul3_num_rows != 0) {
          echo '<a href="../bewerten/index.php" class="u-border-2 u-border-black u-btn u-button-style u-hover-black u-none u-text-hover-white u-btn-1">BEWERTEN</a>';
        }
        ?>
        <fieldset <?php
        $sql_modul4 = "SELECT * FROM `module` WHERE `name` = 'Achievements' and `status` = 'on'";
        $sql_modul4_result = mysqli_query($link, $sql_modul4);
        $sql_modul4_num_rows = mysqli_num_rows($sql_modul4_result);
        if ($sql_modul4_num_rows == 0) {
          echo "display: none; visibility: hidden";
        }
        ?>>
        <legend>Achievements</legend>
        <?php
        $sql_achievement = "SELECT * FROM `achievement`";
        $sql_achievement_result = mysqli_query( $link, $sql_achievement );
        foreach ($sql_achievement_result as $row) {
          $color = "";
          $icon = "";
          $text = "";
          if ($row["type"] == "Bewerten") {
            $sql_check = "SELECT * FROM `bewertungen` WHERE `username` = \"$user\"";
            $sql_check_result = mysqli_query( $link, $sql_check );
            $sql_check_num_rows = mysqli_num_rows( $sql_check_result );
            if ( $sql_check_num_rows >= $row["count"]) {
              $color = "#35A05E";
              $icon = $row["icon_normal"];
              $text = "Schreibe ".strval($row["count"])." Bewertungen!<br> Du hast ".strval($row["count"])."/".strval($row["count"])." geschrieben!";
            } else {
              $color = "#E23D28";
              $icon = $row["icon_glitch"];
              $text = "Schreibe ".strval($row["count"])." Bewertungen!<br> Du hast ".$sql_check_num_rows."/".strval($row["count"])." geschrieben!";
            }
          } else if ($row["type"] == "Bestellen") {
            $sql_check = "SELECT * FROM `bestellungen` WHERE `Name` LIKE \"%$user%\"";
            $sql_check_result = mysqli_query( $link, $sql_check );
            $sql_check_num_rows = mysqli_num_rows( $sql_check_result );
            if ( $sql_check_num_rows >= $row["count"]) {
              $color = "#35A05E";
              $icon = $row["icon_normal"];
              $text = "Bestelle ".strval($row["count"])." mal!<br> Du hast ".strval($row["count"])."/".strval($row["count"])." mal bestellt!";
            } else {
              $color = "#E23D28";
              $icon = $row["icon_glitch"];
              $text = "Bestelle ".strval($row["count"])." mal!<br> Du hast ".$sql_check_num_rows."/".strval($row["count"])." mal bestellt!";
            }
          }
          echo '<fieldset style="display: inline-block; border-color: '.$color.'; border-style: solid;">';
          echo '<legend style="color: '.$color.'">'.$row['achievement'].'</legend>';
          echo '<div style="display: flex; align-items: center;"><img src="../icons/'.$icon.'" height="50" width="50" style="margin-right: 10px;"><span>'.$text.'</span></div>';
          echo '</fieldset>';
          if ($row["br"]) {
            echo "<br>";
          }
        }
        ?>
        </fieldset><br>
        <fieldset>
        <legend>Letzte Bestellungen</legend>
          <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
              <div class="u-layout">
                <div class="u-layout-row">
                <?php
                $sql_orders = "SELECT * FROM `bestellungen` WHERE `Name` LIKE \"%$user%\"";
                $sql_orders_result = mysqli_query( $link, $sql_orders );
                $sql_orders_num_rows = mysqli_num_rows($sql_orders_result);
                if ($sql_orders_num_rows == 0) {
                  echo '<h3 align="center" class="u-text-palette-2-base"><strong>Es wurden keine Bestellungen gefunden!</strong></h3>';
                  exit;
                }
                echo '<table>';
                foreach ($sql_orders_result as $row) {
                  echo '<tr>';
                  echo "<td> ". $row['Bestellung'] . " </td>";
                  echo '<td><a href="../tracking/index.php?id='.$row['ID'].'" class="u-border-2 u-border-black u-btn u-button-style u-hover-black u-none u-text-hover-white u-btn-1" style="margin: 20px">TRACKEN</a></td>';
                  echo "</tr><br>";
                }
                echo "</table>";
                ?>
                </div>
              </div>
            </div>
          </div>
        </fieldset><br>
        </div>
      </div>
    </section>
</body></html>