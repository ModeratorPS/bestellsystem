<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
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
    <title>Bestellen</title>
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
        <p class="u-text u-text-default u-text-1"><?php require_once "../config.php"; echo $RESTAURANT_NAME; ?></p>
        <h4 class="u-text u-text-default u-text-1">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Willkommen bei den Bewertungen</h4><?php
echo '<a href="logout.php" style="background-color: #5B67FF; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1">Logout</a>';
echo '<a href="reset-password.php" style="background-color: #5B67FF; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1">Passwort ändern</a>';
echo '<a href="../index-account.php" style="background-color: #5B67FF; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1">Dein Account</a>';
?>
      </div></header>

    <section class="u-clearfix u-grey-5 u-section-2" id="carousel_a603">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-align-left u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                <div class="u-container-layout u-container-layout-1">
                  <div class="u-form u-form-1">

    <form action="/bestellen/bewerten/bewertung-senden.php" method="POST" name="form">
        <input type="text" placeholder="Ihre Bewertung" id="input1" name="input1" required=""><input type="text" id="input2" name="input2" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>" hidden><br><br>
        <input type="submit" value="submit" class="menu_button">
    </form><br><br><br>

<?php
require_once "../config.php";

$query = "SELECT * FROM `bewertungen`";
$result = mysqli_query($link, $query); 
while($zeile = mysqli_fetch_array( $result, MYSQLI_ASSOC)) {
    $usern = $zeile['username'];
    $sql_rang = "SELECT * FROM `users` WHERE `username` = \"$usern\"";
    $result2 = mysqli_query($link, $sql_rang);
    $num_row = mysqli_num_rows($result2);
    while($zeile2 = mysqli_fetch_array( $result2, MYSQLI_ASSOC)) {
      if ($zeile2['bewerten_rang'] == 'Admin') {
        $rang_icon = '<img src="../role_icons/Admin.png" height="25" width="25">';
        $color = '#d83f3f';
      } else if ($zeile2['bewerten_rang'] == 'Chef') {
        $rang_icon = '<img src="../role_icons/Chef2.png" height="25" width="25">';
        $color = '#ff2e4c';
      } else if ($zeile2['bewerten_rang'] == 'Developer') {
        $rang_icon = '<img src="../role_icons/Developer2.png" height="25" width="25">';
        $color = '#1facbd';
      } else if ($zeile2['bewerten_rang'] == 'Manager') {
        $rang_icon = '<img src="../role_icons/Manager.png" height="25" width="25">';
        $color = '#115bec';
      } else if ($zeile2['bewerten_rang'] == 'Moderator') {
        $rang_icon = '<img src="../role_icons/Moderator.png" height="25" width="25">';
        $color = '#4b96dc';
      } else if ($zeile2['bewerten_rang'] == 'Supporter') {
        $rang_icon = '<img src="../role_icons/Supporter.png" height="25" width="25">';
        $color = '#4b96dc';
      } else if ($zeile2['bewerten_rang'] == '') {
        $rang_icon = '<img src="../role_icons/0.png" height="25" width="25">';
        $color = 'black';
      } else if ($zeile2['bewerten_rang'] <= 1) {
        $rang_icon = '<img src="../role_icons/0.png" height="25" width="25">';
        $color = 'black';
      } else if ($zeile2['bewerten_rang'] <= 3) {
        $rang_icon = '<img src="../role_icons/2.png" height="25" width="25">';
        $color = 'black';
      } else if ($zeile2['bewerten_rang'] <= 5) {
        $rang_icon = '<img src="../role_icons/4.png" height="25" width="25">';
        $color = 'black';
      } else if ($zeile2['bewerten_rang'] <= 7) {
        $rang_icon = '<img src="../role_icons/6.png" height="25" width="25">';
        $color = 'black';
      } else if ($zeile2['bewerten_rang'] <= 9) {
        $rang_icon = '<img src="../role_icons/8.png" height="25" width="25">';
        $color = 'black';
      } else if ($zeile2['bewerten_rang'] <= 11) {
        $rang_icon = '<img src="../role_icons/10.png" height="25" width="25">';
        $color = 'black';
      } else if ($zeile2['bewerten_rang'] <= 13) {
        $rang_icon = '<img src="../role_icons/12.png" height="25" width="25">';
        $color = 'black';
      } else if ($zeile2['bewerten_rang'] <= 15) {
        $rang_icon = '<img src="../role_icons/14.png" height="25" width="25">';
        $color = 'black';
      } else if ($zeile2['bewerten_rang'] <= 17) {
        $rang_icon = '<img src="../role_icons/16.png" height="25" width="25">';
        $color = 'black';
      } else if ($zeile2['bewerten_rang'] <= 19) {
        $rang_icon = '<img src="../role_icons/18.png" height="25" width="25">';
        $color = 'black';
      } else if ($zeile2['bewerten_rang'] <= 21) {
        $rang_icon = '<img src="../role_icons/20.png" height="25" width="25">';
        $color = 'black';
      } else if ($zeile2['bewerten_rang'] >= 22) {
        $rang_icon = '<img src="../role_icons/22+.png" height="25" width="25">';
        $color = 'black';
      } 
    }
    mysqli_free_result($result2);
    if ($num_row == 0) {
      echo '<h3 style="color: gray"><s>'.$usern.'</s> (Gelöschter Nutzer)</h3>';
      echo '<h4 style="color: gray">'.$zeile['text'].'</h4>';
      echo '<br>';
      echo '<br>';
    } else {
      echo '<h3 style="color: '.$color.';">'.$usern.' '.$rang_icon.'</h3>';
      echo '<h4 style="color: '.$color.';">'.$zeile['text'].'</h4>';
      echo '<br>';
      echo '<br>';
    }
    $rang_icon = '';
    $color = '';
}          
?> 

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</body></html><img src="" wid height="" alt="">