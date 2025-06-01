<?php
session_start();
if (($_SESSION["loggedin_admin"] !== true) | (!$_SESSION["loggedin_admin"])) {
    header('location: ../index.php');
}
require_once "../config/config.php";
if ($_GET["action"] != "") {
    $name = str_replace("%20", " ", $_GET['name']);
    $status = $_GET['status'];
    $action = $_GET['action'];
    if ($action == "ch") {
        if ($status == "on") {
            $new = "off";
        } else if ($status == "off") {
            $new = "on";
        }
        $sql = "UPDATE `alert` SET `status` = \"$new\" WHERE `name` = \"$name\"";
        $sql_result = mysqli_query($link, $sql);
        header('location: alert.php');
    } else if ($action == "del") {
        $sql = "DELETE FROM `alert` WHERE `name` = \"$name\"";
        $sql_result = mysqli_query($link, $sql);
        header('location: alert.php');
    } else if ($action == "erl") {
        $new = date("Y-m-d H:i:s");
        $sql = "UPDATE `alert` SET `last_active` = \"$new\" WHERE `name` = \"$name\"";
        $sql_result = mysqli_query($link, $sql);
        header('location: index.php');
    } else if ($action == "new") {
        $name = $_POST['name'];
        $time = $_POST['time'];
        $new = date("Y-m-d H:i:s");
        $sql = "INSERT INTO `alert`(`name`, `time`, `last_active`, `status`) VALUES ('$name','$time','$new','on')";
        $sql_result = mysqli_query($link, $sql);
        header('location: alert.php');
    }
}
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="de"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="description" content="">
    <title>🛎️ - Alerts</title>
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
          <div class="apple_settings">
            <p style="padding: 10px 10px 10px 10px"><strong>Neuen Alert erstellen:</strong>
              <form action="alert.php?action=new" method="post" name="form" style="padding: 10px 10px 10px 10px">
                <input style="padding: 5px 5px 5px 5px" type="text" name="name" id="name" required="" placeholder="Name des Alerts"><br><br>
                <input style="padding: 5px 5px 5px 5px" type="number" name="time" id="time" required="" placeholder="alle ? minuten"><br><br>
                <input style="padding: 5px 5px 5px 5px" type="submit" id="submit" class="settings">
              </form>
            </p>
          </div><br>
            <?php
            $sql = "SELECT * FROM `alert`";
            $sql_result = mysqli_query($link, $sql);
            foreach ($sql_result as $row) {
              if ($row['status'] == 'on') {
                $text = "🔕 - Alert deaktivieren";
                echo '<div class="apple_'.$row['status'].'"><p style="padding: 10px 10px 10px 10px"><strong>'.$row['name'].'</strong><br>Time: alle '.$row['time'].' minuten<br>Zuletzt erledigt: '.$row['last_active'].'<p style="padding: 0px 0px 0px 10px"><a href="alert.php?name='.$row['name'].'&status='.$row['status'].'&action=ch" class="'.$row['status'].'" style="color: black; padding: 5px 5px 5px 5px">'.$text.'</a></p></p></div><br><br>';
              } else if ($row['status'] == 'off') {
                $text = "🔔 - Alert aktivieren";
                echo '<div class="apple_'.$row['status'].'"><p style="padding: 10px 10px 10px 10px"><strong>'.$row['name'].'</strong><br>Time: alle '.$row['time'].' minuten<br>Zuletzt erledigt: '.$row['last_active'].'<p style="padding: 0px 0px 0px 10px"><a href="alert.php?name='.$row['name'].'&status='.$row['status'].'&action=ch" class="'.$row['status'].'" style="color: black; padding: 5px 5px 5px 5px">'.$text.'</a></p><p style="padding: 0px 0px 0px 10px"><a href="alert.php?name='.$row['name'].'&action=del" class="settings" style="color: black; padding: 5px 5px 5px 5px">Löschen</a></p></p></p></div><br><br>';
              }
            }
            ?>
        </div>
      </div>
    </section>
</body></html>