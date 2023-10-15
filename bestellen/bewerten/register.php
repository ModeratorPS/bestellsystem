<?php
require_once "../config/config.php";
$nr_3 = "SELECT * FROM `module` WHERE `name` = 'Bewerten' and `status` = 'on'";
$nr_result3 = mysqli_query($link, $nr_3);
$nr3 = mysqli_num_rows($nr_result3);
if ($nr3 == 0) {
  header('location: ../index.php');
}
?>
<?php
// Include config file
require_once "../config/config.php";
 
// Define variables and initialize with empty values
$username = $mail = $password = $confirm_password = "";
$username_err = $mail_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["mail"]))){
        $mail_err = "Bitte gebe eine E-Mail Adresse an!";
    } else{
        // Prepare a select statement
        $sql = "SELECT mail FROM users WHERE username = ?";
        
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
        $sql = "INSERT INTO users (username, password, mail, bewerten_rang) VALUES (?, ?, ?, '0')";
         
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
                header("location: login.php");
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

<?php 
if(!empty($login_err)){
    echo '<div class="alert alert-danger">' . $login_err . '</div>';
}        
?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
            </div><br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary menu_button" value="Login">
            </div>
            <p>Du hast schon einen Account?<br> <a href="login.php">Hier einloggen</a></p>
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