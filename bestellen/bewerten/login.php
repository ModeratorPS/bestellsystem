<?php
require_once "../config/config.php";
$nr_3 = "SELECT * FROM `module` WHERE `name` = 'Account' and `status` = 'on'";
$nr_result3 = mysqli_query($link, $nr_3);
$nr3 = mysqli_num_rows($nr_result3);
if ($nr3 == 0) {
  header('location: ../index.php');
}
?>
<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
// Include config file
require_once "../config/config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

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
      header("Location: ../index.php");
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
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
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
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
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
                              header('location: index.php');
                            } else {
                              $sql_ext = "SELECT * FROM `users` WHERE `username` = '$username'";
                              $result_ext = mysqli_query($link, $sql_ext);
                              while ($zeile = mysqli_fetch_array( $result_ext, MYSQLI_ASSOC)) {
                                $mail = $zeile['mail'];
                              }
                              $site = "location: verify-mail.php?mail=".$mail;
                              header($site);
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
    
    // Close connection
    mysqli_close($link);
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

/* Stil für die Checkbox-Container */
.checkbox-container {
  display: flex;
  align-items: center;
  font-size: 16px;
  color: #333; /* Textfarbe */
}

/* Verstecke die ursprüngliche Checkbox */
.checkbox-container input[type="checkbox"] {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Stil für das benutzerdefinierte Checkbox-Element */
.custom-checkbox {
  width: 25px;
  height: 25px;
  background-color: #fff; /* Weißer Hintergrund */
  border: 1px solid #ccc; /* Grauer Rand */
  border-radius: 5px; /* Abrundung des Kontrollkästchens */
  margin-right: 10px; /* Abstand zwischen Checkbox und Text */
  display: flex;
  justify-content: center;
  align-items: center;
  font-weight: bold;
}

/* Stil für das benutzerdefinierte Checkbox-Element, wenn es aktiviert ist */
.checkbox-container input[type="checkbox"]:checked + .custom-checkbox::before {
  content: '\2713'; /* Grüner Haken (Checkmark) */
  color: #4CAF50; /* Grüne Farbe für den Haken */
}

/* Stil für das benutzerdefinierte Checkbox-Element, wenn es nicht aktiviert ist */
.checkbox-container input[type="checkbox"]:not(:checked) + .custom-checkbox::before {
  content: '\2718'; /* Rotes Kreuz (X) für nicht aktiviertes Kontrollkästchen */
  color: red; /* Rote Farbe für das Kreuz */
}
</style>
<html style="font-size: 16px;" lang="de"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="​Author&amp;apos;s cake and desserts for your holiday, ​Few words about myself, ​Catalog, How We Work, Facts &amp;amp; Questions, ​​Best Choice, ​Make an order">
    <meta name="description" content="">
    <title>Login</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="../Bestellen.css" media="screen">
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
            <div class="u-layout-row">
              <div class="u-container-align-left u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                <div class="u-container-layout u-container-layout-1">
                  <div class="u-form u-form-1">
                    
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
            </label><br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary menu_button" value="Login">
            </div>
            <p>Du hast kein Account? <br><a href="register.php">Jetzt Registrieren</a></p><p>Passwort vergessen? <br><a href="vergessen-1.php">Hier klicken</a></p><br><br>
        </form>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</body></html>