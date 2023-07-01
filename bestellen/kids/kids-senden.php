<!DOCTYPE html>
<html style="font-size: 16px;" lang="de"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="​Author&amp;apos;s cake and desserts for your holiday, ​Few words about myself, ​Catalog, How We Work, Facts &amp;amp; Questions, ​​Best Choice, ​Make an order">
    <meta name="description" content="">
    <title>Kids senden</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="../Startseite.css" media="screen">
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
    <meta property="og:title" content="Startseite">
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
            <ul class="u-nav u-unstyled u-nav-1"></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
        <p class="u-text u-text-default u-text-1"><?php require_once "../config/config.php"; echo $RESTAURANT_NAME; ?></p>
      </div></header>
      <section class="u-clearfix u-palette-3-light-3 u-section-1" id="sec-8f5b">
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
<?php
require_once "../config/config.php";

$input1 = $_GET['name'];
$input3 = str_replace("%20", " ", $_GET['artikel']);
$input5 = rand(1000, 9999);

$sql1 = "SELECT * FROM `status_rst`";
$db_erg1 = mysqli_query( $link, $sql1 );
if ( ! $db_erg1 )
{
  die('Ungültige Abfrage: ' . mysqli_error());
}
while ($zeile = mysqli_fetch_array( $db_erg1, MYSQLI_ASSOC))
{
  if ($zeile['Status'] == "Geschlossen") {
	echo '
	<h4 align="center" class="u-text-palette-2-base"><strong>Ihre Bestellung wurde nicht gesendet, da wir geschlossen haben</strong></h4>
	';
  }
  if ($zeile['Status'] == "Geöffnet") {
	echo '
	<h4 align="center" class="u-text-palette-4-base"><strong>Bestellung gesendet</strong></h4>
	';

  $query3 = "SELECT * FROM `Artikelliste` WHERE `artikel` = \"$input3\"";
  $result3 = mysqli_query($link, $query3); 
  while($zeile = mysqli_fetch_array( $result3, MYSQLI_ASSOC)) {
    if ($zeile['lager'] == 0) {
      $trk2 = str_replace("tracking.php", "bestellt-error.php?code=404", $LINK_TRACKEN);
      echo '<meta http-equiv="refresh" content = "0;url='.$trk2.'">';
      exit;
    }
    $new = $zeile['lager'] - 1;
  }

	$query = "INSERT INTO `bestellungen` (`Name`, `Bestellung`, `ID`, `Status`, `TG`) VALUES ('$input1', '$input3', '$input5', '0', 'Klein (KIDSMODE)');"; 
	$result = mysqli_query($link, $query); 
	if( $result )
	 {
	 	echo '
		<div align="center">
		<form action="/bestellen/tracking-senden.php" method="post" name="form">
		Deine ID: <br>
		<input name="input1" id="input1" type="text" style="width: 50px;" value="'. $input5 .'" readonly><br><br>
		<input class="menu_button" type="submit" name="submit" id="submit" value="Sofort Tracken">
		</form><br>
		';
		echo '
		<form action="/bewerten/index.php">
			<button class="menu_button" type="submit">Jetzt Bewerten</button>
		</form><br>
		<form action="/bestellen/tracking.php">
			<button class="menu_button" type="submit">Andere Bestellung Tracken</button>
		</form><br>
		</div>
		';
	 }
	 else 
	 {
	 	echo 'Fehler beim Senden!';
	 }
  }
}
mysqli_free_result( $db_erg1 );
?>
      </div>
    </section>
</body></html>