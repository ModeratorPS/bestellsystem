<?php
session_start();
if (($_SESSION["loggedin_admin"] !== true) | (!$_SESSION["loggedin_admin"])) {
    header('location: ../index.php');
}
require_once "../config/config.php";
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="de"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="description" content="">
    <title>🔐 - Admin Startseite</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
    <link rel="stylesheet" href="../theme.css" media="screen">
    <link rel="stylesheet" href="style.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.13.8, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
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
            $lines = file('../config/menu_admin_1.txt');
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
                $lines = file('../config/menu_admin_2.txt');
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
          $sql_alert = "SELECT * FROM `module` WHERE `name` = 'Alert' and `status` = 'on'";
          $sql_alert_result = mysqli_query($link, $sql_alert);
          $sql_alert_num_rows = mysqli_num_rows($sql_alert_result);
          if ($sql_alert_num_rows != 0) {
            $sql_active_alert = "SELECT * FROM `alert` WHERE `status` = 'on'";
            $sql_active_alert_result = mysqli_query($link, $sql_active_alert);
            foreach ($sql_active_alert_result as $row) {
              $datetime_1 = $row['last_active']; 
              $datetime_2 = date("Y-m-d H:i:s"); 
              $start_datetime = new DateTime($datetime_1); 
              $diff = $start_datetime->diff(new DateTime($datetime_2));
              $total_minutes = ($diff->days * 24 * 60); 
              $total_minutes += ($diff->h * 60); 
              $total_minutes += $diff->i;
              if ($total_minutes > $row['time']) {
                echo '<div class="alert"><p style="padding: 10px 10px 10px 10px">Dein Alert <strong>'.$row['name'].'</strong> ist abgelaufen!<p style="padding: 0px 0px 0px 10px"><a href="alert.php?name='.$row['name'].'&action=erl" class="u-border-2 u-border-black u-btn u-button-style u-hover-black u-none u-text-hover-white u-btn-1" style="padding: 5px 5px 5px 5px">ERLEDIGT</a></p></p></div>';
                echo "<br><br>";
              }
            }
          }
          $sql_orders = "SELECT * FROM `bestellungen` WHERE `Status` = 0";
          $sql_orders_result = mysqli_query( $link, $sql_orders );
          $sql_orders_num_rows = mysqli_num_rows( $sql_orders_result );
          if ($sql_orders_num_rows != 0) {
            echo '<table border="0" style="text-align: center; vertical-align: middle;">';
            foreach ($sql_orders_result as $row) {
              echo "<tr>";
              echo "<td>". $row['Bestellzeit'] . "</td>";
              echo "<td>". $row['Name'] . "</td>";
              echo '<td style="display: block; margin-left: auto; margin-right: auto; width: 40%;"><a href="edit.php?id='.$row['ID'].'" class="u-border-2 u-border-black u-btn u-button-style u-hover-black u-none u-text-hover-white u-btn-1">BEARBEITEN</a></td>';
              echo "</tr>";
            }
            echo "</table>";
          } else {
            echo '<h3 align="center" class="u-text-palette-2-base"><strong>Es wurden keine neuen Bestellungen gefunden!</strong></h3>';
          }
          ?>
        </div>
      </div>
    </section>
</body></html>