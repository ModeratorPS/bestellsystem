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
$username = $password = "";
$username_err = $password_err = $login_err = "";
$bewerten_rang = "";

if(isset($_COOKIE["login_cookie"])){
  $saved_token = $_COOKIE["login_cookie"];
  $stmt_search = "SELECT * FROM users WHERE rememberToken = '$saved_token'";
  $stmt_result = mysqli_query($link, $stmt_search);

  if(mysqli_num_rows($stmt_result) == 1){
    foreach ($stmt_result as $row) {
      session_start();
      $_SESSION["loggedin"] = true;
      $_SESSION["id"] = $row["id"];
      $_SESSION["username"] = $row["username"];
      if (($row["bewerten_rang"] == "Admin") || ($row["bewerten_rang"] == "Team")) {
        $_SESSION["loggedin_admin"] = true;
      } else {
        $_SESSION["loggedin_admin"] = false;
      }    
      if ($_GET["redirect"]) {
        header("location: ".$_GET["redirect"]);
      } else {
        header("location: ../index.php");
      }
    }
  } else {
    setcookie("login_cookie", "", time() - 1);
  }
}
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Bitte gebe einen Nutzernamen ein!";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Bitte gebe dein Passwort ein!";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password, bewerten_rang FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $bewerten_rang);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            if (($bewerten_rang == "Admin") || ($bewerten_rang == "Team")) {
                              $_SESSION["loggedin_admin"] = true;
                            } else {
                              $_SESSION["loggedin_admin"] = false;
                            }
                            
                            if(isset($_POST["rememberme"])){
                              $token = bin2hex(random_bytes(16));
                              $sql_token_insert = "UPDATE users SET rememberToken = '$token' WHERE username = '$username'";
                              mysqli_query($link, $sql_token_insert);
                  
                              setcookie("login_cookie", $token, time() + (3600*24*360));
                            }

                            // Redirect user to welcome page
                            $nr_3 = "SELECT * FROM `module` WHERE `name` = 'E-Mail verify' and `status` = 'on'";
                            $nr_result3 = mysqli_query($link, $nr_3);
                            $nr3 = mysqli_num_rows($nr_result3);
                            if ($nr3 == 0) {
                              if ($_GET["redirect"]) {
                                header('location: '.$_GET["redirect"]);
                              } else {
                                header('location: ../index.php');
                              }
                            } else {
                              $sql_ext = "SELECT * FROM `users` WHERE `username` = '$username'";
                              $result_ext = mysqli_query($link, $sql_ext);
                              while ($zeile = mysqli_fetch_array( $result_ext, MYSQLI_ASSOC)) {
                                $mail = $zeile['mail'];
                              }
                              header("location: verify-mail.php?mail=".$mail."&redirect=".$_GET["redirect"]);
                            }
                        } else{
                            // Password is not valid, display a generic error message
                            $password_err = "Ungültiges Passwort!";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $username_err = "Ungültiger Nutzername!";
                }
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
    <title>🪪 - Login</title>
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
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?redirect='.$_GET["redirect"]; ?>" method="post">
          <h2>Login</h2>
            <div class="form-group">
              <label>Nutzername</label>
              <input type="text" name="username" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" value="<?php echo $username; ?>" <?php if ($username_err != "") { echo 'style="background-color: #FF8787;"'; } else { echo 'style="background-color: #E2E2E2;"'; } ?>>
              <label style="color: #FF8787;"><strong><?php echo $username_err; ?></strong></label>
            </div><br>
            <div class="form-group">
              <label>Passwort</label>
              <input type="password" name="password" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" <?php if ($password_err != "") { echo 'style="background-color: #FF8787;"'; } else { echo 'style="background-color: #E2E2E2;"'; } ?>>
              <label style="color: #FF8787;"><strong><?php echo $password_err; ?></strong></label>
            </div><br>
            <label class="checkbox-container">
              <input type="checkbox" name="rememberme">
              <div class="custom-checkbox"></div>
              Angemeldet bleiben
            </label>
            <div class="form-group">
                <input type="submit" class="u-border-2 u-border-black u-btn u-button-style u-hover-black u-none u-text-hover-white u-btn-1" value="LOGIN">
            </div>
            <p>Du hast kein Account? <br><a href="register.php?redirect=<?php echo $_GET["redirect"] ?>">Jetzt Registrieren</a></p><p>Passwort vergessen? <br><a href="vergessen-1.php">Hier klicken</a></p><br><br>
          </form>
        </div>
      </div>
    </section>
</body></html>