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
    <title>🖊️ - Admin Bestellbearbeitung</title>
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
          $input1 = $_POST['input1'];
          $input2 = $_POST['input2'];
          $sql_select_order = "SELECT * FROM `bestellungen` WHERE `ID` = \"$input1\"";
          $sql_select_order_result = mysqli_query( $link, $sql_select_order );
          foreach ($sql_select_order_result as $row) {
            $input_name = $row['Name'];
            echo "<p>Diese Bestellung muss zu folgendem Kunden geliefert werden: <strong>".$input_name."</strong></p>";
          }
          $sql_checkout = "SELECT * FROM `checkout` WHERE `name` = \"$input_name\"";
          $sql_checkout_result = mysqli_query( $link, $sql_checkout );
          $sql_checkout_num_rows = mysqli_num_rows( $sql_checkout_result ); 
          if ($sql_checkout_num_rows == 0) {
	        $sql_create_checkout = "INSERT INTO `checkout` (`name`, `Euro`) VALUES ('$input_name', '$input2');"; 
	        $sql_create_checkout_result = mysqli_query($link, $sql_create_checkout); 
	        if ($sql_create_checkout_result) {
		      echo '<p style="color: green;">Keine Fehler beim erstellen eines neuen Checkout!</p>';
	        } else {
		      echo '<p style="color: red;">Fehler beim bearbeiten eines neuen Checkout!</p>';
	        }
          } else {
	        foreach ($sql_checkout_result as $row) {
		      $count1 = str_replace('"', "", $row['Euro']);
		      $count2 = str_replace('"', "", $input2);
		      $count_result = $count1 + $count2;
		      $sql_checkout_update = "UPDATE `checkout` SET `Euro` = '\"$count_result\"' WHERE `name` = \"$input_name\";"; 
		      $sql_checkout_update_result = mysqli_query($link, $sql_checkout_update); 
		      if ($sql_checkout_update_result) {
			    echo '<p style="color: green;">Keine Fehler beim bearbeiten eines vorhandenen Checkout!</p>';
		      } else {
			    echo '<p style="color: red;">Fehler beim bearbeiten eines vorhandenen Checkout!</p>';
		      }
	        }
          }
          $sql_edit_order = "UPDATE `bestellungen` SET `Status` = '2' WHERE `ID` = \"$input1\" AND `Status` = '1'"; 
          $sql_edit_order_result = mysqli_query($link, $sql_edit_order); 
          ?>
          <h4>Status ändern auf "Fertig"</h4>
          <form action="edit3.php" method="post" name="form">
          <select id="input1" name="input1">
          <?php echo '<option value="'.$input1.'">'.$input1.'</option>'; ?> 
          </select>
          <input type="submit" class="u-border-2 u-border-black u-btn u-button-style u-hover-black u-none u-text-hover-white u-btn-1" name="submit" id="submit" value="WEITER">
          </form>
        </div>
      </div>
    </section>
</body></html>