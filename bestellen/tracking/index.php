<?php
session_start();
require_once "../config/config.php";
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="de"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="description" content="">
    <title>📍 - Tracking</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
    <link rel="stylesheet" href="../theme.css" media="screen">
    <link rel="stylesheet" href="style.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.13.8, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $input1 = $_POST['input1'];
      $sql_storn = "SELECT * FROM `bestellungen` WHERE `ID` = \"$input1\"";
      $sql_storn_result = mysqli_query( $link, $sql_storn );
      foreach ($sql_storn_result as $row) {
        if ($row['Status'] > "0") {
          echo '<script>alert("Die Bestellung ist schon in Bearbeitung, und kann nicht mehr storniert werden!")</script>';
        } else {
          $sql_storn2 = "UPDATE `bestellungen` SET `Status` = '4' WHERE `ID` = \"$input1\" and `Status` = 0";
          $sql_storn2_result = mysqli_query( $link, $sql_storn2 );
          echo '<meta http-equiv="refresh" content="0">';
        }
      }
    }
    ?>

    <script src="script.js"></script>
    <?php
    if ($_GET["id"] == "") {
      echo "<script>getid();</script>";
    } else {
      echo '<meta http-equiv="refresh" content="5">';
    }
    ?>

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
          <div class="progress-track">
            <ul id="progressbar">
            <label style="color: black;">Bestellnummer: <?php if ($_GET['id'] != "") { echo $_GET['id']; } else { echo 'Keine Nummer angegeben'; } ?> <a href="index.php">(Bestellnummer ändern)</a></label><br><br>
            <?php
            $id = $_GET['id'];
            $sql_orders = "SELECT * FROM `bestellungen` WHERE `ID` = \"$id\"";
            $sql_orders_result = mysqli_query( $link, $sql_orders );
            $sql_orders_num_rows = mysqli_num_rows( $sql_orders_result ); 
            if ( $sql_orders_num_rows == 0 ) {
              echo '<li class="step0" id="step1"><strong>Bestellt</strong></li>
              <li class="step0 text-center" id="step2"><strong>In Bearbeitung</strong></li>
              <li class="step0 text-right" id="step3"><strong>Auf dem Weg</strong></li>
              <li class="step0 text-right" id="step4"><strong>Bestellung erfolgreich</strong></li>';
            }
            foreach ($sql_orders_result as $row) {
              if ($row['Status'] == "0") {
                echo '<li class="step0 active active-orange" id="step1"><strong>Bestellt</strong></li>
                <li class="step0 text-center" id="step2"><strong>In Bearbeitung</strong></li>
                <li class="step0 text-right" id="step3"><strong>Auf dem Weg</strong></li>
                <li class="step0 text-right" id="step4"><strong>Bestellung erfolgreich</strong></li>';
              } else if ($row['Status'] == "1") {
                echo '<li class="step0 active active-orange" id="step1"><strong>Bestellt</strong></li>
                <li class="step0 active active-orange text-center" id="step2"><strong>In Bearbeitung</strong></li>
                <li class="step0 text-right" id="step3"><strong>Auf dem Weg</strong></li>
                <li class="step0 text-right" id="step4"><strong>Bestellung erfolgreich</strong></li>';
              } else if ($row['Status'] == "2") {
                echo '<li class="step0 active active-orange" id="step1"><strong>Bestellt</strong></li>
                <li class="step0 active active-orange text-center" id="step2"><strong>In Bearbeitung</strong></li>
                <li class="step0 active active-orange text-right" id="step3"><strong>Auf dem Weg</strong></li>
                <li class="step0 text-right" id="step4"><strong>Bestellung erfolgreich</li></strong>';
              } else if ($row['Status'] == "3") {
                echo '<li class="step0 active active-green" id="step1"><strong>Bestellt</strong></li>
                <li class="step0 active active-green text-center" id="step2"><strong>In Bearbeitung</strong></li>
                <li class="step0 active active-green text-right" id="step3"><strong>Auf dem Weg</strong></li>
                <li class="step0 active active-green text-right" id="step4"><strong>Bestellung erfolgreich</li></strong>';
              } else if ($row['Status'] == "4") {
                echo '<li class="step0 active active-red" id="step1"><strong>Bestellung storniert</strong></li>
                <li class="step0 text-center" id="step2"><strong>In Bearbeitung</strong></li>
                <li class="step0 text-right" id="step3"><strong>Auf dem Weg</strong></li>
                <li class="step0 text-right" id="step4"><strong>Bestellung erfolgreich</strong></li>';
              } else {
                echo '<li class="step0" id="step1"><strong>Bestellt</strong></li>
                <li class="step0 text-center" id="step2"><strong>In Bearbeitung</strong></li>
                <li class="step0 text-right" id="step3"><strong>Auf dem Weg</strong></li>
                <li class="step0 text-right" id="step4"><strong>Bestellung erfolgreich</strong></li>';
              }
              echo '<br>';
            }
            ?>
            </ul>
            <fieldset>
              <legend>Deine Bestellung</legend>
              <form action="index.php?id=<?php echo $id; ?>" method="post" name="form" class="text">
                <input type="hidden" id="input1" name="input1" value="<?php echo $id;?>" style="width: 50px;" readonly><br>
                <?php
                if ($sql_orders_num_rows > "0") {
                  foreach ($sql_orders_result as $row) {
                    echo '<strong style="color: gray;">Bestellzeit:</strong> '.$row['Bestellzeit'].'<br>
                    <strong style="color: gray;">Name:</strong> '.$row['Name'].'<br>
                    <strong style="color: gray;">Bestellung:</strong> '.$row['Bestellung'].'<br>';
                    if ($row['Status'] > "0") {
                      if ($row['Status'] == "4") {
                        echo '<input name="submit" id="submit" type="submit" value="Storniert" class="stor_button" disabled>';
                      } else {
                        echo '<input name="submit" id="submit" type="submit" class="closed_button" value="Stornieren nicht mehr möglich" disabled>';
                      }
                    } else {
                      echo '<input name="submit" id="submit" type="submit" value="Stornieren" class="open_button">';
                    }
                    echo '<br>';
                  }
                } else {
                  echo '<strong>Kein Bestellung unter dieser Nummer vorhanden!</strong>';
                }
                ?>
              </form>
            </fieldset><br>
          </div>
        </div>
      </div>
    </section>
</body></html>