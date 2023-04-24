<?php
require_once "config.php";
session_start();

if ($_SESSION["loggedin_admin"] !== true) {
  header('location: admin-login.php');
} else if (!$_SESSION["loggedin_admin"]) {
  header('location: admin-login.php');
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
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Bestellen.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="admin-artikel-add.js" defer=""></script>
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
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="admin.php" style="padding: 10px 20px;">Startseite Admin</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="open.php" style="padding: 10px 20px;">Open</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="close.php" style="padding: 10px 20px;">Close</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="admin-artikel-add.php" style="padding: 10px 20px;">Artikel hinzufügen</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="admin-artikel-remove.php" style="padding: 10px 20px;">Artikel löschen</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="upload.php" style="padding: 10px 20px;">Datei hinzufügen</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="clear.php" style="padding: 10px 20px;">Bestellungen zurücksetzen</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="setup-first.php" style="padding: 10px 20px;">Setup / Resetup</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="admin-artikel-lager.php" style="padding: 10px 20px;">Lager bearbeiten</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="admin-rang.php" style="padding: 10px 20px;">Bewerten Rang bearbeiten</a>
</li></ul>
          </div>
          <div class="u-nav-container-collapse">
            <div class="u-align-center u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="admin.php">Startseite Admin</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="open.php">Open</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="close.php">Close</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="admin-artikel-add.php">Artikel hinzufügen</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="admin-artikel-remove.php">Artikel löschen</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="upload.php">Datei hochladen</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="clear.php">Bestellungen zurücksetzen</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="setup-first.php">Setup / Resetup</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="admin-artikel-lager.php">Lager bearbeiten</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="admin-rang.php">Bewerten Rang bearbeiten</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
        <p class="u-text u-text-default u-text-1"><?php require_once "config.php"; echo $RESTAURANT_NAME; ?></p>
      </div></header>
    <section class="u-clearfix u-grey-5 u-section-2" id="carousel_a603">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">

<form action="/bestellen/admin-artikel-add-senden.php" method="post" name="form">
Artikelname: <input type="text" placeholder="Wasser" id="input1" name="input1" required=""><br>
Preis: <input type="text" placeholder="1.00" id="input10" name="input10" required=""><br>
Bildlink: <input type="text" placeholder="http://bild" id="input2" name="input2"><br>
Breite (200-300) (Kein Komma nur Punkt): <input type="text" placeholder="218" id="input3" name="input3"><br>
Höhe (200-300) (Kein Komma nur Punkt): <input type="text" placeholder="288" id="input4" name="input4"><br>
Beschreibung: <input type="text" placeholder="Enthält Sprudel" id="input5" name="input5"><br>
Kategorie: <select id="input6" name="input6">
    <option>Kalte Getränke ohne Alkohol</option>
    <option>Kalte Getränke mit Alkohol</option>
    <option>Warme Getränke ohne Alkohol</option>
    <option>Warme Getränke mit Alkohol</option>
    <option>Essen</option>
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
Bedingung: <select id="input12" name="input12">
    <option selected>Keine</option>
    <option>Leicht</option>
    <option>Mittel</option>
    <option>Stark</option>
    <option>Ultra</option>
</select><br>
<input type="text" id="input13" name="input13" style="background-color: #DADADA" readonly>
<input type="submit" class="menu_button" name="submit" id="submit">
</form>

            </div>
          </div>
        </div>
      </div>
    </section>
</body></html>