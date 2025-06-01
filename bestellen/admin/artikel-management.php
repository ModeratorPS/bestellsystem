<?php
session_start();
if (($_SESSION["loggedin_admin"] !== true) | (!$_SESSION["loggedin_admin"])) {
  header('location: ../index.php');
}
require_once "../config/config.php";
$name = $_GET['name'];
$action = $_GET['action'];

if ($action != "") {
  if ($action == "hide") {
    $sql_update = "UPDATE `Artikelliste` SET `status` = 'off' WHERE `artikel` = \"$name\"";
    $sql_update_result = mysqli_query($link, $sql_update);
  } else if ($action == "show") {
    $sql_update = "UPDATE `Artikelliste` SET `status` = 'on' WHERE `artikel` = \"$name\"";
    $sql_update_result = mysqli_query($link, $sql_update);
  } else if ($action == "new") {
    $artikel = $_POST["artikelname"];
    $bild = $_POST["picture"];
    $categorie = $_POST["categorie"];
    $preis = $_POST["preis"];
    $lager = $_POST["lager"];
    $sql_new = "INSERT INTO `Artikelliste` (`status`, `artikel`, `bild`, `Gruppe`, `preis`, `lager`) VALUES ('on', '$artikel', '$bild', '$categorie', '$preis', '$lager');";
    $sql_new_result = mysqli_query($link, $sql_new);
  } else if ($action == "edit") {
    $name = $_GET['name'];
    $artikel = $_POST["artikelname"];
    $bild = $_POST["picture"];
    $categorie = $_POST["categorie"];
    $preis = $_POST["preis"];
    $lager = $_POST["lager"];
    $sql_edit = "UPDATE `Artikelliste` SET `artikel`='$artikel', `bild`='$bild', `Gruppe`='$categorie', `preis`='$preis', `lager`='$lager' WHERE `artikel`='$name'";
    $sql_edit_result = mysqli_query($link, $sql_edit);
  } else if ($action == "delete") {
    $sql_delete = "DELETE FROM `Artikelliste` WHERE `artikel` = \"$name\"";
    $sql_delete_result = mysqli_query($link, $sql_delete);
  } 
  header('location: artikel-management.php');
}
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="de"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="description" content="">
    <title>🗄️ - Artikel Management</title>
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
        <div class="apple_settings"><p style="padding: 0px 10px 10px 10px">
          <?php if ($_GET['artikelname'] == "") { echo "<strong>Neuen Artikel hinzufügen</strong>"; } else { echo "<strong>Artikel bearbeiten</strong>"; } ?>
          <form class="u-clearfix u-form-spacing-10 u-inner-form" name="form" style="padding: 0px 10px 10px 10px" method="POST" action="artikel-management.php?action=<?php if ($_GET['artikelname'] == "") { echo "new"; } else { echo "edit&name=".$_GET['artikelname']; } ?>">
            <div class="u-form-group u-form-name" style="padding: 0px 0px 20px 0px">
              <label for="name-ca5b" class="u-label">Artikelname<label style="color: red">*</label></label>
              <input type="text" placeholder="Gib deinen Namen ein" id="artikelname" name="artikelname" class="u-input u-input-rectangle" required="" value="<?php echo $_GET['artikelname']; ?>">
            </div>
            <div class="u-form-group u-form-name" style="padding: 0px 0px 20px 0px">
              <label for="name-ca5b" class="u-label">Bild</label>
              <?php
              if ($_GET['link'] == "") {
                echo '<a href="upload.php" class="settings" style="color: black; padding: 5px 5px 5px 5px">Bild hochladen</a>';
              }
              ?>
              <input type="text" placeholder="Link des Bildes einfügen" id="picture" name="picture" class="u-input u-input-rectangle" value="<?php echo $_GET['link']; ?>">
            </div>
            <div class="u-form-group u-form-select u-form-group-3" style="padding: 0px 0px 20px 0px">
              <label for="select-4d36" class="u-label">Kategorie<label style="color: red">*</label></label>
              <div class="u-form-select-wrapper">
                <select id="categorie" name="categorie" class="u-input u-input-rectangle" required="required" <?php if ($_GET['artikelname'] == "") { echo 'style="color: gray"'; } else { echo 'style="color: black"'; } ?> onchange="colorchange()">
                  <option value="" disabled <?php if ($_GET['categorie'] == "") { echo "selected"; } ?>>Bitte wähle eine Kategorie aus</option>
                  <option value="1" <?php if ($_GET['categorie'] == "1") { echo "selected"; } ?>>Kalte Getränke ohne Alkohol</option>
                  <option value="2" <?php if ($_GET['categorie'] == "2") { echo "selected"; } ?>>Kalte Getränke mit Alkohol</option>
                  <option value="3" <?php if ($_GET['categorie'] == "3") { echo "selected"; } ?>>Warme Getränke ohne Alkohol</option>
                  <option value="4" <?php if ($_GET['categorie'] == "4") { echo "selected"; } ?>>Warme Getränke mit Alkohol</option>
                  <option value="5" <?php if ($_GET['categorie'] == "5") { echo "selected"; } ?>>Essen</option>
                </select>
                <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve"><polygon class="st0" points="8,12 2,4 14,4 "></polygon></svg>
              </div>
            </div>
            <div class="u-form-group u-form-name" style="padding: 0px 0px 20px 0px">
              <label for="name-ca5b" class="u-label">Preis<label style="color: red">*</label></label>
              <input type="number" placeholder="Gib den Preis ein" id="preis" name="preis" class="u-input u-input-rectangle" required="" value="<?php echo $_GET['preis']; ?>">
            </div>
            <div class="u-form-group u-form-name" style="padding: 0px 0px 20px 0px">
              <label for="name-ca5b" class="u-label">Lagerbestand<label style="color: red">*</label></label>
              (-1 für Unendlich)
              <input type="text" placeholder="Gib den Lagerbestand ein" id="lager" name="lager" class="u-input u-input-rectangle" required="" value="<?php if ($_GET['lager'] >= 0) { echo $_GET['lager']; } else { echo "-1"; } ?>">
            </div>
            <div class="u-align-left u-form-group u-form-submit" style="padding: 0px 0px 20px 0px">
              <input type="submit" name="submit" <?php if ($_GET['artikelname'] == "") { echo 'value="Artikel hinzufügen"'; } else { echo 'value="Artikel speichern"'; } ?> class="settings">
              <?php if ($_GET['artikelname'] != "") { echo '<br><br><a href="artikel-management.php" class="settings" style="color: black; padding: 5px 5px 5px 5px">Abbrechen</a>'; } ?>
            </div>
          </form>
        </p></div><br>
          <?php
          $sql_products = "SELECT * FROM `Artikelliste`";
          $sql_products_result = mysqli_query($link, $sql_products);
          foreach ($sql_products_result as $row) {
            $categorie = $row['Gruppe'];
            if ($categorie == 1) {
              $categorie = "Kalte Getränke ohne Alkohol";
            } else if ($categorie == 2) {
              $categorie = "Kalte Getränke mit Alkohol";
            } else if ($categorie == 3) {
              $categorie = "Warme Getränke ohne Alkohol";
            } else if ($categorie == 4) {
              $categorie = "Warme Getränke mit Alkohol";
            } else if ($categorie == 5) {
              $categorie = "Essen";
            }
            $lager = $row['lager'];
            if ($lager < 0) {
              $lager = "Unendlich";
            } else if ($lager == 0) {
              $lager = "<strong>AUSVERKAUFT</strong>";
            }
            if ($row['status'] == 'on') {
              $text = "🫣 - Produkt verstecken";
              if ($row['lager'] == 0) {
                echo '<div class="apple_error"><p style="padding: 0px 10px 10px 10px"><strong>'.$row['artikel'].'</strong><br>Preis: '.$row['preis'].'€<br>Auf Lager: '.$lager.'<br>Kategorie: '.$categorie.'<p style="padding: 0px 0px 0px 10px"><a href="artikel-management.php?name='.$row['artikel'].'&action=hide" class="'.$row['status'].'" style="color: black; padding: 5px 5px 5px 5px">'.$text.'</a><br><br><a href="artikel-management.php?artikelname='.$row['artikel'].'&link='.$row['bild'].'&categorie='.$row['Gruppe'].'&preis='.$row['preis'].'&lager='.$row['lager'].'" class="settings" style="color: black; padding: 5px 5px 5px 5px">⚙️ - Artikel bearbeiten</a></p></p></div><br>';
              } else { 
                echo '<div class="apple_'.$row['status'].'"><p style="padding: 0px 10px 10px 10px"><strong>'.$row['artikel'].'</strong><br>Preis: '.$row['preis'].'€<br>Auf Lager: '.$lager.'<br>Kategorie: '.$categorie.'<p style="padding: 0px 0px 0px 10px"><a href="artikel-management.php?name='.$row['artikel'].'&action=hide" class="'.$row['status'].'" style="color: black; padding: 5px 5px 5px 5px">'.$text.'</a><br><br><a href="artikel-management.php?artikelname='.$row['artikel'].'&link='.$row['bild'].'&categorie='.$row['Gruppe'].'&preis='.$row['preis'].'&lager='.$row['lager'].'" class="settings" style="color: black; padding: 5px 5px 5px 5px">⚙️ - Artikel bearbeiten</a></p></p></div><br>';
              }
            } else if ($row['status'] == 'off') {
              $text = "👀 - Produkt anzeigen";
              echo '<div class="apple_'.$row['status'].'"><p style="padding: 0px 10px 10px 10px"><strong>'.$row['artikel'].'</strong><br>Preis: '.$row['preis'].'€<br>Auf Lager: '.$lager.'<br>Kategorie: '.$categorie.'<p style="padding: 0px 0px 0px 10px"><a href="artikel-management.php?name='.$row['artikel'].'&action=show" class="'.$row['status'].'" style="color: black; padding: 5px 5px 5px 5px">'.$text.'</a><br><br><a href="artikel-management.php?artikelname='.$row['artikel'].'&link='.$row['bild'].'&categorie='.$row['Gruppe'].'&preis='.$row['preis'].'&lager='.$row['lager'].'" class="settings" style="color: black; padding: 5px 5px 5px 5px">⚙️ - Artikel bearbeiten</a><br><br><a href="artikel-management.php?name='.$row['artikel'].'&action=delete" class="'.$row['status'].'" style="color: black; padding: 5px 5px 5px 5px">🗑️ - Artikel löschen</a></p></p></div><br>';
            }
          }
          ?>
        </div>
      </div>
    </section>
</body>
<script>
  function colorchange() {
    var current = $('#categorie').val();
    if (current != "") {
      $('#categorie').css('color','black');
    } else {
      $('#categorie').css('color','gray');
    }
  }
</script>
</html>