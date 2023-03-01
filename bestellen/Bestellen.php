<?php
// Initialize the session
session_start();
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="de"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="​Author&amp;apos;s cake and desserts for your holiday, ​Few words about myself, ​Catalog, How We Work, Facts &amp;amp; Questions, ​​Best Choice, ​Make an order">
    <meta name="description" content="">
    <title>Bestellen</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Bestellen.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>

    <script class="u-script" type="text/javascript" src="mail.js" defer=""></script>

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
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="index.php" style="padding: 10px 20px;">Startseite</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Bestellen.php" style="padding: 10px 20px;">Bestellen</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="/index.php" style="padding: 10px 20px;">Home</a>
</li></ul>
          </div>
          <div class="u-nav-container-collapse">
            <div class="u-align-center u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.php">Startseite</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Bestellen.php">Bestellen</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="/index.php">Home</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
        <p class="u-text u-text-default u-text-1"><?php require_once "config.php"; echo $RESTAURANT_NAME; ?></p><?php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  echo '<a href="login.php" style="background-color: #FF613D; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1">Account Login</a>';
} else {
  echo '<a href="index-account.php" style="background-color: #5B67FF; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1">Account</a>';
}
?>
      </div></header>

    <section class="u-clearfix u-grey-5 u-section-2" id="carousel_a603">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-align-left u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                <div class="u-container-layout u-container-layout-1">
                  <h2 class="u-align-left u-custom-font u-font-montserrat u-text u-text-default u-text-1" data-lang-en="​Make an order"> Make an order</h2>
                  <div class="u-form u-form-1">
                    <form action="/bestellen/bestellen-senden.php" method="post" name="form" style="padding: 10px;">
                      <div class="u-form-group u-form-name">
                        <label for="name-e90b" class="u-label">Name</label>
                        <input type="text" placeholder="Geben Sie Ihren Namen ein" id="input1" name="input1" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" value="<?php echo $_SESSION["username"]; ?>" required="" <?php
if($_SESSION["loggedin"] === true){
  echo 'readonly style="background-color: #E2E2E2;"';
}?>>
                      </div>
                      <div class="u-form-email u-form-group">
                        <label for="email-e90b" class="u-label">E-Mail</label><br>
                        <text id="emailbtn"><input type="checkbox" onClick="loc();" id="emailbtn"> <strong>Ich möchte eine Rechnung erhalten</strong></text>
                        <input type="email" placeholder="Geben sie eine gültige E-Mail-Adresse an" id="input2" name="input2" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" style="visibility: hidden; display: none;">
                      </div>
                      <div class="u-form-group u-form-select u-form-group-3">
                        <label for="select-bc3b" class="u-label">Produkt</label>
                        <div class="u-form-select-wrapper">
                          <select id="input3" name="input3" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
<?php
require_once "config.php";

$query1 = 'SELECT * FROM `Artikelliste` WHERE `Gruppe` = "Kalte Getränke ohne Alkohol"';
$result1 = mysqli_query($link, $query1); 
$num_rows1 = mysqli_num_rows( $result1 ); 
if ($num_rows1 > "0") {
  echo '<optgroup label="Kalte Getränke ohne Alkohol">';
  while($zeile = mysqli_fetch_array( $result1, MYSQLI_ASSOC))
  {
    if ($zeile['lager'] == 0) {
      echo '<option value="'.$zeile['artikel'].'" disabled>'.$zeile['artikel'].' - Ausverkauft</option>';
    } else {
      echo '<option value="'.$zeile['artikel'].'">'.$zeile['artikel'].' - '.$zeile['preis'].' Euro</option>';
    }
  }
  echo '</optgroup>';
}

$query2 = 'SELECT * FROM `Artikelliste` WHERE `Gruppe` = "Kalte Getränke mit Alkohol"';
$result2 = mysqli_query($link, $query2); 
$num_rows2 = mysqli_num_rows( $result2 ); 
if ($num_rows2 > "0") {
  echo '<optgroup label="Kalte Getränke mit Alkohol">';
  while($zeile = mysqli_fetch_array( $result2, MYSQLI_ASSOC))
  {
    if ($zeile['lager'] == 0) {
      echo '<option value="'.$zeile['artikel'].'" disabled>'.$zeile['artikel'].' - Ausverkauft</option>';
    } else {
      echo '<option value="'.$zeile['artikel'].'">'.$zeile['artikel'].' - '.$zeile['preis'].' Euro</option>';
    }
  }
  echo '</optgroup>';
}

$query3 = 'SELECT * FROM `Artikelliste` WHERE `Gruppe` = "Warme Getränke ohne Alkohol"';
$result3 = mysqli_query($link, $query3); 
$num_rows3 = mysqli_num_rows( $result3 ); 
if ($num_rows3 > "0") {
  echo '<optgroup label="Warme Getränke ohne Alkohol">';
  while($zeile = mysqli_fetch_array( $result3, MYSQLI_ASSOC))
  {
    if ($zeile['lager'] == 0) {
      echo '<option value="'.$zeile['artikel'].'" disabled>'.$zeile['artikel'].' - Ausverkauft</option>';
    } else {
      echo '<option value="'.$zeile['artikel'].'">'.$zeile['artikel'].' - '.$zeile['preis'].' Euro</option>';
    }
  }
  echo '</optgroup>';
} 

$query4 = 'SELECT * FROM `Artikelliste` WHERE `Gruppe` = "Warme Getränke mit Alkohol"';
$result4 = mysqli_query($link, $query4); 
$num_rows4 = mysqli_num_rows( $result4 ); 
if ($num_rows4 > "0") {
  echo '<optgroup label="Warme Getränke mit Alkohol">';
  while($zeile = mysqli_fetch_array( $result4, MYSQLI_ASSOC))
  {
    if ($zeile['lager'] == 0) {
      echo '<option value="'.$zeile['artikel'].'" disabled>'.$zeile['artikel'].' - Ausverkauft</option>';
    } else {
      echo '<option value="'.$zeile['artikel'].'">'.$zeile['artikel'].' - '.$zeile['preis'].' Euro</option>';
    }
  }
  echo '</optgroup>';
} 

$query5 = 'SELECT * FROM `Artikelliste` WHERE `Gruppe` = "Essen"';
$result5 = mysqli_query($link, $query5); 
$num_rows5 = mysqli_num_rows( $result5 ); 
if ($num_rows5 > "0") {
  echo '<optgroup label="Essen">';
  while($zeile = mysqli_fetch_array( $result5, MYSQLI_ASSOC))
  {
    if ($zeile['lager'] == 0) {
      echo '<option value="'.$zeile['artikel'].'" disabled>'.$zeile['artikel'].' - Ausverkauft</option>';
    } else {
      echo '<option value="'.$zeile['artikel'].'">'.$zeile['artikel'].' - '.$zeile['preis'].' Euro</option>';
    }
  }
  echo '</optgroup>';
} 

$query6 = 'SELECT * FROM `Artikelliste` WHERE `Gruppe` = ""';
$result6 = mysqli_query($link, $query6); 
$num_rows6 = mysqli_num_rows( $result6 ); 
if ($num_rows6 > "0") {
  echo '<optgroup label="Artikel ohne Gruppe">';
  while($zeile = mysqli_fetch_array( $result6, MYSQLI_ASSOC))
  {
    if ($zeile['lager'] == 0) {
      echo '<option value="'.$zeile['artikel'].'" disabled>'.$zeile['artikel'].' - Ausverkauft</option>';
    } else {
      echo '<option value="'.$zeile['artikel'].'">'.$zeile['artikel'].' - '.$zeile['preis'].' Euro</option>';
    }
  }
  echo '</optgroup>';
} 
?> 
                          </select>
                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                        </div>
                        <div class="u-form-email u-form-group">
                          <label for="email-e90b" class="u-label">Zusatz</label>
                          <input type="text" placeholder="Zusatz" id="input4" name="input4" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
                        </div>
                      </div>
<?php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  echo '<input type="submit" class="u-btn u-btn-submit u-button-style" value="Ohne Login Bestellen (Keine Bonus Punkte erhalten)" style="background-color: #FF3333;" name="submit" id="submit">
  <a href="login.php" style="background-color: #FF5533;" class="u-btn u-button-style">Login</a>';
} else {
  echo '<input type="submit" class="u-btn u-btn-submit u-button-style" value="Bestellen (Du erhältst Bonus Punkte)" style="background-color: #7DE16D;" name="submit" id="submit">';
}
?>
                    </form>
                    <h2>News beim öffnen</h2>
                    <form action="/bestellen/news-eintragen.php" method="post" name="form" style="padding: 10px;">
                      <div class="u-form-group u-form-name">
                        <label for="name-e90b" class="u-label">Mail:</label>
                        <input type="text" placeholder="Geben Sie eine gültige Mail ein" id="input1" name="input1" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                      </div>
                      <input type="submit" class="u-btn u-btn-submit u-button-style" name="submit" id="submit">
                    </form>
                    <a href="<?php require_once "config.php"; echo $LINK_BEWERTEN; ?>" class="u-btn u-button-style">Bewerten</a>
                  </div>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                <div class="u-container-layout u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-container-layout-2">
                  <img class="u-image u-image-default u-image-1" src="images/789.png" alt="" data-image-width="734" data-image-height="864" data-lang-en="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</body></html>