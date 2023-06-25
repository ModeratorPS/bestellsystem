<?php
require_once "../config/config.php";
session_start();

if ($_SESSION["loggedin_admin"] !== true) {
  header('location: login.php');
} else if (!$_SESSION["loggedin_admin"]) {
  header('location: login.php');
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

.apple_off{
background: #f5f5f5;
border: 2px solid #C36161;
border-radius: 5px;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
box-shadow: 1px 2px 4px rgba(0,0,0,.4);
}

.apple_settings{
background: #f5f5f5;
border: 2px solid #ACACAC;
border-radius: 5px;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
box-shadow: 1px 2px 4px rgba(0,0,0,.4);
}

.apple_on{
background: #f5f5f5;
border: 2px solid #88C361;
border-radius: 5px;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
box-shadow: 1px 2px 4px rgba(0,0,0,.4);
}

.apple_error{
background: #f5f5f5;
border: 2px solid #F3C336;
border-radius: 5px;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
box-shadow: 1px 2px 4px rgba(0,0,0,.4);
}

.error {
    background-color: #F3C336;
    border: 2px solid #F3C336;
    border-radius: 4px ;
}

.settings {
    background-color: #ACACAC;
    border: 2px solid #ACACAC;
    border-radius: 4px ;
}

.on {
    background-color: #88C361;
    border: 2px solid #88C361;
    border-radius: 4px ;
}

.off {
    background-color: #C36161;
    border: 2px solid #C36161;
    border-radius: 4px ;
}
</style>
<html style="font-size: 16px;" lang="de"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="​Author&amp;apos;s cake and desserts for your holiday, ​Few words about myself, ​Catalog, How We Work, Facts &amp;amp; Questions, ​​Best Choice, ​Make an order">
    <meta name="description" content="">
    <title>Admin</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="../Bestellen.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.13.4, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
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
$lines = file('../config/menu_admin_1.txt');
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
$lines = file('../config/menu_admin_2.txt');
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
      </div></header>
    <section class="u-clearfix u-grey-5 u-section-2" id="carousel_a603">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
          <div class="apple_settings">
            <p style="padding: 10px 10px 10px 10px"><strong>Neuen Alert erstellen:</strong>
              <form action="alert_change.php?action=new" method="post" name="form" style="padding: 10px 10px 10px 10px">
                <input style="padding: 5px 5px 5px 5px" type="text" name="name" id="name" required="" placeholder="Name des Alerts"><br><br>
                <input style="padding: 5px 5px 5px 5px" type="number" name="time" id="time" required="" placeholder="alle ? minuten"><br><br>
                <input style="padding: 5px 5px 5px 5px" type="submit" id="submit" class="settings">
              </form>
            </p>
          </div><br><br>
            <?php
            $sql = "SELECT * FROM `alert`";
            $sql_result = mysqli_query($link, $sql);
            while ($zeile = mysqli_fetch_array( $sql_result, MYSQLI_ASSOC)) {
                if ($zeile['status'] == 'on') {
                    $text = "Alert deaktivieren";
                    echo '<div class="apple_'.$zeile['status'].'"><p style="padding: 10px 10px 10px 10px"><strong>'.$zeile['name'].'</strong><br>Time: alle '.$zeile['time'].' minuten<br>Zuletzt erledigt: '.$zeile['last_active'].'<p style="padding: 0px 0px 0px 10px"><a href="alert_change.php?name='.$zeile['name'].'&status='.$zeile['status'].'&action=ch" class="'.$zeile['status'].'" style="color: black; padding: 5px 5px 5px 5px">'.$text.'</a></p></p></div><br><br>';
                } else if ($zeile['status'] == 'off') {
                    $text = "Alert aktivieren";
                    echo '<div class="apple_'.$zeile['status'].'"><p style="padding: 10px 10px 10px 10px"><strong>'.$zeile['name'].'</strong><br>Time: alle '.$zeile['time'].' minuten<br>Zuletzt erledigt: '.$zeile['last_active'].'<p style="padding: 0px 0px 0px 10px"><a href="alert_change.php?name='.$zeile['name'].'&status='.$zeile['status'].'&action=ch" class="'.$zeile['status'].'" style="color: black; padding: 5px 5px 5px 5px">'.$text.'</a></p><p style="padding: 0px 0px 0px 10px"><a href="alert_change.php?name='.$zeile['name'].'&action=del" class="settings" style="color: black; padding: 5px 5px 5px 5px">Löschen</a></p></p></p></div><br><br>';
                }
            }
            ?>
          </div>
        </div>
      </div>
    </section>
<?php
if ($_GET['error'] != "") {
    $error = $_GET['error'];
    echo "<script> alert('Das Modul kann nicht deaktiviert werden, da es für das Modul ".$error." benötigt!') </script>";
}
?>
</body></html>