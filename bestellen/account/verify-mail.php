<?php
// Initialize the session
session_start();
 
// Include config file
require_once "../config/config.php";

$confirmed = true;
$sended = false;
$mail = $_GET['mail'];
$code = 0;

if ($_GET['confirmed'] == "1") {
  $sql3 = "UPDATE `mail_verify` SET `confirmed`='1' WHERE `mail` = '$mail'";
  $result3 = mysqli_query($link, $sql3);
  header('location: index.php');
  return;
}

if ($mail != "") {
    $confirmed = false;
    $sql = "SELECT * FROM `mail_verify` WHERE `mail` = '$mail'";
    $result = mysqli_query($link, $sql);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows == 0) {
        $code = random_int(100000, 999999);
        $sql2 = "INSERT INTO `mail_verify` (`mail`, `code`, `confirmed`) VALUES ('$mail', '$code', '0');";
        $result2 = mysqli_query($link, $sql2);
        $sended = true;
        $betreff = 'Dein Verify Code';
        $inhalt = '
            <fieldset>
            <legend>Deine Verify Code</legend>
            Dein Code: <strong>'.$code.'</strong>
            </fieldset>
        ';
        $header  = "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html; charset=utf-8\r\n";
        $header .= "From: verify@moderatorps.de\r\n";
        $header .= "X-Mailer: PHP ". phpversion();
        $adresse = $mail;
        @mail($adresse,$betreff,$inhalt,$header);
        $sended = true;
    } else {
        while ($zeile = mysqli_fetch_array( $result, MYSQLI_ASSOC)) {
            if ($zeile['confirmed'] == "1") {
                header('location: index.php');
                return;
            } else {
                $code = $zeile['code'];
            }
        }
        if ($_GET['sendagain'] == "1") {
          $betreff = 'Dein Verify Code';
          $inhalt = '
              <fieldset>
              <legend>Deine Verify Code</legend>
              Dein Code: <strong>'.$code.'</strong>
              </fieldset>
          ';
          $header  = "MIME-Version: 1.0\r\n";
          $header .= "Content-type: text/html; charset=utf-8\r\n";
          $header .= "From: verify@moderatorps.de\r\n";
          $header .= "X-Mailer: PHP ". phpversion();
          $adresse = $mail;
          @mail($adresse,$betreff,$inhalt,$header);
          $sended = true;
        }
    }
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
.verification-code {
    display: flex;
    justify-content: space-between;
    width: 300px;
}

.verification-code input[type="text"] {
    width: 40px;
    height: 40px;
    font-size: 24px;
    text-align: center;
    border: 2px solid #ccc;
    border-radius: 4px;
    color: gray;
}

.verification-code.filled input[type="text"] {
    color: gray;
}

.verification-code.valid input[type="text"] {
    border-color: #78DE64;
    color: #78DE64;
}

.verification-code.invalid input[type="text"] {
    border-color: #DE6464;
    color: #DE6464;
}

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
    <script>
    function focusNextInput(currentInput) {
      var maxLength = parseInt(currentInput.getAttribute("maxlength"));
      var nextInput = currentInput.nextElementSibling;
      var previousInput = currentInput.previousElementSibling;
      var keyCode = event.keyCode || event.which;

      if (keyCode === 8 && currentInput.value.length === 0 && previousInput != null) {
        previousInput.focus();
      }

      if (nextInput != null) {
        if (currentInput.value.length === maxLength) {
          nextInput.focus();
        }
      }

      checkVerificationCode();
    }

    function checkVerificationCode() {
      var codeInputs = document.querySelectorAll(".verification-code input[type='text']");
      var code = "";
      var allFilled = true;

      codeInputs.forEach(input => {
        code += input.value;
        if (input.value.length === 0) {
          allFilled = false;
        }
      });

      document.querySelector(".verification-code").classList.toggle("filled", allFilled);

      if (code.length === 6) {
        if (code === "<?php echo $code; ?>") {
          document.querySelector(".verification-code").classList.add("valid");
          document.querySelector(".verification-code").classList.remove("invalid");
          setTimeout(function() {
            window.location.href = "verify-mail.php?mail=<?php echo $mail; ?>&confirmed=1";
          }, 1500);
        } else {
          document.querySelector(".verification-code").classList.add("invalid");
          document.querySelector(".verification-code").classList.remove("valid");
        }
      } else {
        document.querySelector(".verification-code").classList.remove("valid");
        document.querySelector(".verification-code").classList.remove("invalid");
      }
    }
    function checkCodeOnComplete(event) {
      if (event.target.value.length === 0) {
        return;
      }
      
      var codeInputs = document.querySelectorAll(".verification-code input[type='text']");
      var code = "";
      var allFilled = true;

      codeInputs.forEach(input => {
        code += input.value;
        if (input.value.length === 0) {
          allFilled = false;
        }
      });

      if (allFilled) {
        if (code === "<?php echo $code; ?>") {
          document.querySelector(".verification-code").classList.add("valid");
          document.querySelector(".verification-code").classList.remove("invalid");
          setTimeout(function() {
            window.location.href = "verify-mail.php?mail=<?php echo $mail; ?>&confirmed=1";
          }, 1500);
        } else {
          document.querySelector(".verification-code").classList.add("invalid");
          document.querySelector(".verification-code").classList.remove("valid");
        }
      } else {
        document.querySelector(".verification-code").classList.remove("valid");
        document.querySelector(".verification-code").classList.remove("invalid");
      }
    }
  </script>
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
                    if ($confirmed === false) {
                        echo '<h5>E-Mail <strong>'.$_GET['mail'].'</strong> verifizieren</h5>
                        <div class="verification-code">
                            <input type="text" maxlength="1" onkeyup="focusNextInput(this)" autofocus />
                            <input type="text" maxlength="1" onkeyup="focusNextInput(this)" />
                            <input type="text" maxlength="1" onkeyup="focusNextInput(this)" />
                            <input type="text" maxlength="1" onkeyup="focusNextInput(this)" />
                            <input type="text" maxlength="1" onkeyup="focusNextInput(this)" />
                            <input type="text" maxlength="1" onkeyup="focusNextInput(this); checkCodeOnComplete(event)" />
                        </div>';
                        if ($sended === false) {
                          echo "<br><br><a class='menu_button' href='verify-mail.php?mail=".$mail."&sendagain=1'>Mail erneut senden</a>";
                        }
                        echo "<br><br><a class='menu_button' href='index.php'>Später verifizieren</a>";
                    } else {
                        echo '<h2>Error while loading verify</h2>';
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
</body></html>