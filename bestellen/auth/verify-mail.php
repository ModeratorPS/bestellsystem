<?php
session_start();
require_once "../config/config.php";

$confirmed = true;
$sended = false;
$mail = $_GET['mail'];
$code = 0;

if ($_GET['confirmed'] == "1") {
    $sql_check = "UPDATE `mail_verify` SET `confirmed`='1' WHERE `mail` = '$mail'";
    $sql_check_result = mysqli_query($link, $sql_check);
    if ($_GET["redirect"]) {
      header('location: '.$_GET["redirect"]);
    } else {
      header('location: ../index.php');
    }
    return;
}

if ($mail != "") {
    $confirmed = false;
    $sql_mail = "SELECT * FROM `mail_verify` WHERE `mail` = '$mail'";
    $sql_mail_result = mysqli_query($link, $sql_mail);
    $sql_mail_num_rows = mysqli_num_rows($sql_mail_result);
    if ($sql_mail_num_rows == 0) {
        $code = random_int(100000, 999999);
        $sql_insert_code = "INSERT INTO `mail_verify` (`mail`, `code`, `confirmed`) VALUES ('$mail', '$code', '0');";
        $sql_insert_code_result = mysqli_query($link, $sql_insert_code);
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
        $header .= "From: ".$MAIL."\r\n";
        $header .= "X-Mailer: PHP ". phpversion();
        $adresse = $mail;
        @mail($adresse,$betreff,$inhalt,$header);
        $sended = true;
    } else {
        foreach ($sql_mail_result as $row) {
            if ($row['confirmed'] == "1") {
                if ($_GET["redirect"]) {
                  header('location: '.$_GET["redirect"]);
                } else {
                  header('location: ../index.php');
                }
                return;
            } else {
                $code = $row['code'];
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
            $header .= "From: ".$MAIL."\r\n";
            $header .= "X-Mailer: PHP ". phpversion();
            $adresse = $mail;
            @mail($adresse,$betreff,$inhalt,$header);
            $sended = true;
        }
    }
}
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="de"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="description" content="">
    <title>🪪 - E-Mail bestätigen</title>
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

    <script>
    function focusNextInput(currentInput) {
      var maxLength = parseInt(currentInput.getAttribute("maxlength"));
      var nextInput = currentInput.nextElementSibling;
      var previousInput = currentInput.previousElementSibling;
      var keyCode = event.keyCode || event.which;

      if (nextInput != null) {
        if (currentInput.value.length === maxLength) {
          nextInput.focus();
        }
      }

      checkVerificationCode();
    }

    function focusPreviousInput(currentInput) {
      var maxLength = parseInt(currentInput.getAttribute("maxlength"));
      var nextInput = currentInput.nextElementSibling;
      var previousInput = currentInput.previousElementSibling;
      var keyCode = event.keyCode || event.which;

      if (keyCode === 8 && currentInput.value.length === 0 && previousInput != null) {
        previousInput.focus();
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
            window.location.href = "verify-mail.php?mail=<?php echo $mail; ?>&confirmed=1&redirect=<?php echo $_GET["redirect"]; ?>";
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
                <?php
                $sql_login_button = "SELECT * FROM `module` WHERE `name` = 'Account' and `status` = 'on'";
                $sql_login_result = mysqli_query($link, $sql_login_button);
                $sql_login_result_num_rows = mysqli_num_rows($sql_login_result);
                if ($sql_login_result_num_rows != 0) {
                  if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
                    $redirect = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    echo '<a href="../auth/login.php?redirect='.$redirect.'" class="u-border-2 u-border-black u-btn u-button-style u-hover-black u-none u-text-hover-white u-btn-1">ANMELDEN</a>';
                  } else {
                    echo '<a href="../account/index.php" class="u-border-2 u-border-black u-btn u-button-style u-hover-black u-none u-text-hover-white u-btn-1">ACCOUNT</a>';
                  }
                }
                ?>
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
          if ($confirmed === false) {
            echo '<h5>E-Mail <strong>'.$_GET['mail'].'</strong> verifizieren</h5>
            <div class="verification-code">
              <input type="text" maxlength="1" onkeyup="focusNextInput(this)" autofocus onkeydown="focusPreviousInput(this)" />
              <input type="text" maxlength="1" onkeyup="focusNextInput(this)" onkeydown="focusPreviousInput(this)" />
              <input type="text" maxlength="1" onkeyup="focusNextInput(this)" onkeydown="focusPreviousInput(this)" />
              <input type="text" maxlength="1" onkeyup="focusNextInput(this)" onkeydown="focusPreviousInput(this)" />
              <input type="text" maxlength="1" onkeyup="focusNextInput(this)" onkeydown="focusPreviousInput(this)" />
              <input type="text" maxlength="1" onkeyup="focusNextInput(this); checkCodeOnComplete(event)" onkeydown="focusPreviousInput(this)" />
            </div>';
            if ($sended === false) {
              echo "<br><a class='u-border-2 u-border-black u-btn u-button-style u-hover-black u-none u-text-hover-white u-btn-1' href='verify-mail.php?mail=".$mail."&sendagain=1'>Mail erneut senden</a>";
            }
            if ($_GET["redirect"]) {
              $link = $_GET["redirect"];
            } else {
              $link = "../index.php";
            }
            echo "<br><a class='u-border-2 u-border-black u-btn u-button-style u-hover-black u-none u-text-hover-white u-btn-1' href='".$link."'>Später verifizieren</a>";
          } else {
            echo '<h2>Error while loading verify</h2>';
          }
          ?>
        </div>
      </div>
    </section>
</body></html>