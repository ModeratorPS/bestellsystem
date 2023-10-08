<!DOCTYPE html>

<meta http-equiv="refresh" content="8;fingerprint.php">

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
    <title>Startseite</title>
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
  <body class="u-body u-xl-mode">
      <section class="u-clearfix u-palette-3-light-3 u-section-1" id="sec-8f5b">
      <div class="progress-track">
        <br><br>
<?php
require_once "../config/config.php";

$username = "";
$printid = $_GET['print'];

$sql3 = "SELECT * FROM `fingerprint` WHERE `printid` = '$printid'";
$db_erg3 = mysqli_query( $link, $sql3 );
if ( ! $db_erg3 )
{
  die('Ungültige Abfrage: ' . mysqli_error());
}
while ($zeile2 = mysqli_fetch_array( $db_erg3, MYSQLI_ASSOC))
{
  $username = $zeile2['name'];
}
mysqli_free_result( $db_erg3 );

$sql4 = "SELECT * FROM `bestellungen` WHERE `Name` LIKE '%$username%' ORDER BY `bestellungen`.`atd` DESC";
$db_erg4 = mysqli_query( $link, $sql4 );
$num_rows = mysqli_num_rows($db_erg4);

if ( $num_rows == 0 ) {
  echo "<h4>Aktuell keine Bestellungen</h4>";
  echo '<ul id="progressbar">';
  echo '<li class="step0" id="step1">Bestellt</li>
  <li class="step0 text-center" id="step2">In Bearbeitung</li>
  <li class="step0 text-right" id="step3">Auf dem Weg</li>
  <li class="step0 text-right" id="step4">Bestellung erfolgreich</li>';
  echo '</ul>';
  echo "<br><br>";
}

while ($zeile = mysqli_fetch_array( $db_erg4, MYSQLI_ASSOC))
{
    echo '<ul id="progressbar">';
    echo "<h4>" . $zeile['Bestellung'] . "</h4>";
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
    echo '</ul><br>';
}
mysqli_free_result( $db_erg4 );
?>
        </div>
      </div>
    </section>
</body></html>