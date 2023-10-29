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
</style>
<html style="font-size: 16px;" lang="de"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="​Author&amp;apos;s cake and desserts for your holiday, ​Few words about myself, ​Catalog, How We Work, Facts &amp;amp; Questions, ​​Best Choice, ​Make an order">
    <meta name="description" content="">
    <title>Artikel hinzufügen</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="../Bestellen.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.13.4, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    
    
    
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

<form action="artikel-add-senden.php" method="post" name="form">
Artikelname: <input type="text" placeholder="Wasser" id="input1" name="input1" required=""><br>
Preis: <input type="text" placeholder="1.00" id="input10" name="input10" required=""><br>
Bildlink: <input type="text" placeholder="http://bild" id="input2" name="input2" value="<?php echo $_GET["link"]; ?>"><br>
Breite (200-300) (Kein Komma nur Punkt): <input type="text" placeholder="218" id="input3" name="input3"><br>
Höhe (200-300) (Kein Komma nur Punkt): <input type="text" placeholder="288" id="input4" name="input4"><br>
Beschreibung: <input type="text" placeholder="Enthält Sprudel" id="input5" name="input5"><br>
Kategorie: <select id="input6" name="input6">
    <option value="1">Kalte Getränke ohne Alkohol</option>
    <option value="2">Kalte Getränke mit Alkohol</option>
    <option value="3">Warme Getränke ohne Alkohol</option>
    <option value="4">Warme Getränke mit Alkohol</option>
    <option value="5">Essen</option>
</select><br>
Kindermodus: <select id="input7" name="input7">
    <option selected>Ja</option>
    <option>Nein</option>
</select><br>
Tassengrößen auswahlmöglichkeit: <select id="input8" name="input8">
    <option selected>Ja</option>
    <option>Nein</option>
</select><br>
Anzahl (-1 für Unendlich): <input type="number" placeholder="100" id="input9" name="input9" required=""><br>
time (in Minuten): <input type="number" placeholder="2" id="input11" name="input11" required=""><br>
<input type="submit" class="menu_button" name="submit" id="submit">
</form>

            </div>
          </div>
        </div>
      </div>
    </section>
</body></html>