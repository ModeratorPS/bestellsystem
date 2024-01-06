<?php
// Initialize the session
session_start();
?>
<!DOCTYPE html>
<style>
@media(max-width:768px){
    .card{
        width: 90%;
    }
}
.title{
    color: rgb(252, 103, 49);
    font-weight: 600;
    margin-bottom: 2vh;
    padding: 0 8%;
    font-size: initial;
}
.text{
    font-weight: 600;
    margin-bottom: 2vh;
    padding: 0 8%;
    font-size: initial;
}
#details{
    font-weight: 400;
}
.info{
    padding: 5% 8%;
}
.info .col-5{
    padding: 0;
}
#heading{
    color: grey;
    line-height: 6vh;
}
.pricing{
    background-color: #ddd3;
    padding: 2vh 8%;
    font-weight: 400;
    line-height: 2.5;
}
.pricing .col-3{
    padding: 0;
}
.total{
    padding: 2vh 8%;
    color: rgb(252, 103, 49);
    font-weight: bold;
}
.total .col-3{
    padding: 0;
}
.footer{
    padding: 0 8%;
    font-size: x-small;
    color: black;
}
.footer img{
    height: 5vh;
    opacity: 0.2;
}
.footer a{
    color: rgb(252, 103, 49);
}
.footer .col-10, .col-2{
    display: flex;
    padding: 3vh 0 0;
    align-items: center;
}
.footer .row{
    margin: 0;
}
#progressbar {
    margin-bottom: 3vh;
    overflow: hidden;
    color: rgb(252, 103, 49);
    padding-left: 0px;
    margin-top: 3vh
}

#progressbar li {
    list-style-type: none;
    font-size: x-small;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400;
    color: rgb(160, 159, 159);
}

#progressbar #step1:before {
    content: "";
    color: rgb(252, 103, 49);
    width: 5px;
    height: 5px;
    margin-left: 0px !important;
    /* padding-left: 11px !important */
}

#progressbar #step2:before {
    content: "";
    color: #fff;
    width: 5px;
    height: 5px;
    margin-left: 32%;
}

#progressbar #step3:before {
    content: "";
    color: #fff;
    width: 5px;
    height: 5px;
    margin-right: 32% ; 
    /* padding-right: 11px !important */
}

#progressbar #step4:before {
    content: "";
    color: #fff;
    width: 5px;
    height: 5px;
    margin-right: 0px !important;
    /* padding-right: 11px !important */
}

#progressbar li:before {
    line-height: 29px;
    display: block;
    font-size: 12px;
    background: #ddd;
    border-radius: 50%;
    margin: auto;
    z-index: -1;
    margin-bottom: 1vh;
}

#progressbar li:after {
    content: '';
    height: 2px;
    background: #ddd;
    position: absolute;
    left: 0%;
    right: 0%;
    margin-bottom: 2vh;
    top: 1px;
    z-index: 1;
}
.progress-track{
    padding: 0 8%;
}
#progressbar li:nth-child(2):after {
    margin-right: auto;
}

#progressbar li:nth-child(1):after {
    margin: auto;
}

#progressbar li:nth-child(3):after {
    float: left;
    width: 68%;
}
#progressbar li:nth-child(4):after {
    margin-left: auto;
    width: 132%;
}

#progressbar  li.active{
    color: black;
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: rgb(252, 103, 49);
}

#progressbar li.active-red:before,
#progressbar li.active-red:after {
    background: #FF6060;
}

#progressbar li.active-green:before,
#progressbar li.active-green:after {
    background: #6EDE5E;
}

#progressbar li.active-orange:before,
#progressbar li.active-orange:after {
    background: #FFB357;
}

.menu_button {
    color: orange;
    background-color: white;
    padding: 8px 16px;
    font-size: 10px;
    display: flex;
    font-weight: 600;
    border-radius: 2px;
    cursor: pointer;
    box-shadow: 2px 0px 8px rgb(0 0 0 / 20%);
    border: unset;
}

.closed_button {
    color: white;
    background-color: #FF6969;
    padding: 8px 16px;
    font-size: 10px;
    display: flex;
    font-weight: 600;
    border-radius: 2px;
    cursor: pointer;
    box-shadow: 2px 0px 8px rgb(0 0 0 / 20%);
    border: unset;
}

.stor_button {
    color: white;
    background-color: #FFAF69;
    padding: 8px 16px;
    font-size: 10px;
    display: flex;
    font-weight: 600;
    border-radius: 2px;
    cursor: pointer;
    box-shadow: 2px 0px 8px rgb(0 0 0 / 20%);
    border: unset;
}

.open_button {
    color: black;
    background-color: #A1FF9B;
    padding: 8px 16px;
    font-size: 10px;
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
    <title>Tracking</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="../Startseite.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.13.4, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    
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
            <ul class="u-nav u-unstyled u-nav-1"><?php
$lines = file('../config/menu_normal_1.txt');
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
$lines = file('../config/menu_normal_2.txt');
foreach($lines as $line) {
  echo $line;
}
?>
</ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
        <p class="u-text u-text-default u-text-1"><?php require_once "../config/config.php"; echo $RESTAURANT_NAME; ?></p><?php
require_once "../config/config.php";
$nr_3 = "SELECT * FROM `module` WHERE `name` = 'Account' and `status` = 'on'";
$nr_result3 = mysqli_query($link, $nr_3);
$nr3 = mysqli_num_rows($nr_result3);
if ($nr3 != 0) {
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    echo '<a href="../account/login.php" style="background-color: #FF613D; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1">Account Login</a>';
  } else {
    echo '<a href="../account/index.php" style="background-color: #5B67FF; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1">Account</a>';
  }
}
?>
      </div></header>
      <section class="u-clearfix u-palette-3-light-3 u-section-1" id="sec-8f5b">


        <form action="tracking-senden.php" method="post" name="form" class="text">
            <br><label>Deine ID: </label><input type="text" id="input1" name="input1" value="<?php
            $input1 = $_POST['input1'];
            if (!$input1) {
                $input1 = $_GET['id'];
            }
            echo $input1;
            ?>" style="width: 50px;" readonly><br>
            <input type="submit" name="submit" id="submit" value="Status neu laden" class="menu_button">
        </form>
        <div class="progress-track">
            <ul id="progressbar">
<?php
require_once "../config/config.php";

$input1 = $_POST['input1'];

if (!$input1) {
    $input1 = $_GET['id'];
}

$sql1 = "SELECT * FROM `bestellungen` WHERE `ID` = \"$input1\"";
$db_erg1 = mysqli_query( $link, $sql1 );

$num_rows = mysqli_num_rows( $db_erg1 ); 

if ( $num_rows == 0 ) {
  echo '<li class="step0" id="step1"><strong>Bestellt</strong></li>
  <li class="step0 text-center" id="step2"><strong>In Bearbeitung</strong></li>
  <li class="step0 text-right" id="step3"><strong>Auf dem Weg</strong></li>
  <li class="step0 text-right" id="step4"><strong>Bestellung erfolgreich</strong></li>';
}

while ($zeile = mysqli_fetch_array( $db_erg1, MYSQLI_ASSOC))
{
  if ($zeile['Status'] == "0") {
    echo '<li class="step0 active active-orange" id="step1"><strong>Bestellt</strong></li>
    <li class="step0 text-center" id="step2"><strong>In Bearbeitung</strong></li>
    <li class="step0 text-right" id="step3"><strong>Auf dem Weg</strong></li>
    <li class="step0 text-right" id="step4"><strong>Bestellung erfolgreich</strong></li>';
  }
  else if ($zeile['Status'] == "1") {
    echo '<li class="step0 active active-orange" id="step1"><strong>Bestellt</strong></li>
    <li class="step0 active active-orange text-center" id="step2"><strong>In Bearbeitung</strong></li>
    <li class="step0 text-right" id="step3"><strong>Auf dem Weg</strong></li>
    <li class="step0 text-right" id="step4"><strong>Bestellung erfolgreich</strong></li>';
  }
  else if ($zeile['Status'] == "2") {
    echo '<li class="step0 active active-orange" id="step1"><strong>Bestellt</strong></li>
    <li class="step0 active active-orange text-center" id="step2"><strong>In Bearbeitung</strong></li>
    <li class="step0 active active-orange text-right" id="step3"><strong>Auf dem Weg</strong></li>
    <li class="step0 text-right" id="step4"><strong>Bestellung erfolgreich</li></strong>';
  }
  else if ($zeile['Status'] == "3") {
    echo '<li class="step0 active active-green" id="step1"><strong>Bestellt</strong></li>
    <li class="step0 active active-green text-center" id="step2"><strong>In Bearbeitung</strong></li>
    <li class="step0 active active-green text-right" id="step3"><strong>Auf dem Weg</strong></li>
    <li class="step0 active active-green text-right" id="step4"><strong>Bestellung erfolgreich</li></strong>';
  }
  else if ($zeile['Status'] == "4") {
    echo '<li class="step0 active active-red" id="step1"><strong>Bestellung storniert</strong></li>
    <li class="step0 text-center" id="step2"><strong>In Bearbeitung</strong></li>
    <li class="step0 text-right" id="step3"><strong>Auf dem Weg</strong></li>
    <li class="step0 text-right" id="step4"><strong>Bestellung erfolgreich</strong></li>';
  }
  else {
    echo '<li class="step0" id="step1"><strong>Bestellt</strong></li>
    <li class="step0 text-center" id="step2"><strong>In Bearbeitung</strong></li>
    <li class="step0 text-right" id="step3"><strong>Auf dem Weg</strong></li>
    <li class="step0 text-right" id="step4"><strong>Bestellung erfolgreich</strong></li>';
  }
  echo '<br><br><br>';
}
mysqli_free_result( $db_erg1 );
?>
            </ul>
        <fieldset>
            <legend>Deine Bestellung</legend>
            <form action="tracking-stornieren.php" method="post" name="form" class="text">
                <input type="hidden" id="input1" name="input1" value="<?php
                $input1 = $_POST['input1'];
                if (!$input1) {
                    $input1 = $_GET['id'];
                }
                echo $input1;
                ?>" style="width: 50px;" readonly><br>
<?php
require_once "../config/config.php";

$input1 = $_POST['input1'];

if (!$input1) {
    $input1 = $_GET['id'];
}

$sql1 = "SELECT * FROM `bestellungen` WHERE `ID` = \"$input1\"";
$db_erg1 = mysqli_query( $link, $sql1 );

$num_rows = mysqli_num_rows( $db_erg1 );

if ($num_rows > "0") {
    while ($zeile = mysqli_fetch_array( $db_erg1, MYSQLI_ASSOC))
    {
        echo '
        <strong style="color: gray;">Bestellzeit:</strong> '. $zeile['Bestellzeit'] .'<br>
        <strong style="color: gray;">Name:</strong> '. $zeile['Name'] .'<br>
        <strong style="color: gray;">Bestellung:</strong> '. $zeile['Bestellung'] .'
        ';
        echo '<br>';
        if ($zeile['Status'] > "0") {
            if ($zeile['Status'] == "4") {
                echo '<input name="submit" id="submit" type="submit" value="Storniert" class="stor_button" disabled>';
            }
            else {
                echo '<input name="submit" id="submit" type="submit" class="closed_button" value="Stornieren nicht mehr möglich" disabled>';
            }
        }
        else {
            echo '<input name="submit" id="submit" type="submit" value="Stornieren" class="open_button">';
        }
        echo '<br><br>';
    }
}
else {
    echo '<strong>Kein Bestellung unter dieser ID vorhanden!</strong>';
}
?>
            </form>
        </fieldset><br>
        </div>
      </div>
    </section>
</body></html>