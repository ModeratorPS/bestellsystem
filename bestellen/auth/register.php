<?php
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ../index.php");
    exit;
}
require_once "../config/config.php";
$sql_modul = "SELECT * FROM `module` WHERE `name` = 'Bewerten' and `status` = 'on'";
$sql_modul_result = mysqli_query($link, $sql_modul);
$sql_modul_num_rows = mysqli_num_rows($sql_modul_result);
if ($sql_modul_num_rows == 0) {
  header('location: ../index.php');
}

// Define variables and initialize with empty values
$username = $mail = $password = $confirm_password = "";
$username_err = $mail_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(empty(trim($_POST["mail"]))){
        $mail_err = "Bitte gebe eine E-Mail Adresse an!";
    } else{
        // Prepare a select statement
        $sql = "SELECT mail FROM users WHERE mail = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_mail);
            
            // Set parameters
            $param_mail = trim($_POST["mail"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $mail_err = "Dieser E-Mail wird schon benutzt!";
                } else{
                    $mail = trim($_POST["mail"]);
                }
            } else{
                echo "Oops! Leider ist ein Fehler unterlaufen! Bitte versuche es später erneut!";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Bitte gebe einen Nutzernamen ein!";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Der Benutzername darf nur Buchstaben, Zahlen und Unterstriche enthalten!";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Dieser Nutzername ist bereits besetzt!";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Leider ist ein Fehler unterlaufen! Bitte versuche es später erneut!";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Bitte gebe ein Passwort ein";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Das Passwort muss aus mindestens 6 Zeichen bestehen!";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Bitte bestätige das Passwort!";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Passwörter stimmen nicht überein!";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($mail_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, mail, bewerten_rang) VALUES (?, ?, ?, 'Mitglied')";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_mail);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_mail = $mail;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php?redirect=".$_GET["redirect"]);
            } else{
                echo "Oops! Leider ist ein Fehler unterlaufen! Bitte versuche es später erneut!";
            }
            
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
}
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="de"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="description" content="">
    <title>🪪 - Registrieren</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
    <link rel="stylesheet" href="../theme.css" media="screen">
    <link rel="stylesheet" href="style.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.13.8, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
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
            $lines = file('../config/menu_normal_1.txt');
            foreach($lines as $line) {
              echo $line;
            }
            ?></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-align-center u-container-style u-inner-container-layout u-opacity u-opacity-90 u-sidenav u-white">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close u-menu-close-1"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><?php
                $lines = file('../config/menu_normal_2.txt');
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
            if(!empty($login_err)){
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }        
          ?>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?redirect='.$_GET["redirect"]; ?>" method="post">
          <h3>Registrieren</h3>
            <div class="form-group">
              <label>Nutzername</label>
              <input type="text" name="username" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" <?php if ($username_err != "") { echo 'style="background-color: #FF8787;"'; } else { echo 'style="background-color: #E2E2E2;"'; } ?> value="<?php echo $username; ?>">
              <label style="color: #FF8787;"><strong><?php echo $username_err; ?></strong></label>
            </div>  
            <div class="form-group">
              <label>E-Mail</label>
              <input type="mail" name="mail" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" <?php if ($mail_err != "") { echo 'style="background-color: #FF8787;"'; } else { echo 'style="background-color: #E2E2E2;"'; } ?> value="<?php echo $mail; ?>">
              <label style="color: #FF8787;"><strong><?php echo $mail_err; ?></strong></label>
            </div>    
            <div class="form-group">
              <label>Passwort</label>
              <input type="password" name="password" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" <?php if ($password_err != "") { echo 'style="background-color: #FF8787;"'; } else { echo 'style="background-color: #E2E2E2;"'; } ?> value="<?php echo $password; ?>">
              <label style="color: #FF8787;"><strong><?php echo $password_err; ?></strong></label>
            </div>
            <div class="form-group">
              <label>Passwort erneut eingeben</label>
              <input type="password" name="confirm_password" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" <?php if ($confirm_password_err != "") { echo 'style="background-color: #FF8787;"'; } else { echo 'style="background-color: #E2E2E2;"'; } ?> value="<?php echo $confirm_password; ?>">
              <label style="color: #FF8787;"><strong><?php echo $confirm_password_err; ?></strong></label>
            </div>
            <div class="form-group">
              <input type="submit" class="u-border-2 u-border-black u-btn u-button-style u-hover-black u-none u-text-hover-white u-btn-1" value="REGISTRIEREN">
            </div>
            <p>Du hast schon einen Account?<br> <a href="login.php?redirect=<?php echo $_GET["redirect"]; ?>">Hier einloggen</a></p>
          </form>
        </div>
      </div>
    </section>
</body></html>