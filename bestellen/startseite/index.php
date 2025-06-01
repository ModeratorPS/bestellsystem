<?php
session_start();
require_once "../config/config.php";
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="de"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="description" content="">
    <title>🛍️ - Startseite</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="style.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.12.10, nicepage.com">
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
		"name": ""
}</script>
    <meta name="theme-color" content="#3745f9">
    <meta property="og:title" content="Startseite">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body data-home-page="Startseite.html" data-home-page-title="Startseite" data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="de"><header class="u-clearfix u-header" id="sec-35c2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><div class="u-clearfix u-sheet u-sheet-1">
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
      <div class="infinite u-container-style u-custom-color-2 u-expanded-width u-group u-shape-rectangle u-group-1">
        <div class="u-container-layout u-container-layout-1">
          <?php
          $sql_status = "SELECT * FROM `status_rst`";
          $sql_status_result = mysqli_query($link, $sql_status);
          if ($sql_status_result) {
            $row = mysqli_fetch_assoc($sql_status_result);if ($row['Status'] == "Geschlossen") {
              echo '<span class="u-align-center u-file-icon u-icon u-icon-1" data-animation-name="swing" data-animation-duration="1000" data-animation-delay="0" data-animation-direction=""><img src="../images/5320551.png" alt=""></span>';
            } else if ($row['Status'] == "Geöffnet") {
              echo '<span class="u-align-center u-file-icon u-icon u-icon-1" data-animation-name="swing" data-animation-duration="1000" data-animation-delay="0" data-animation-direction=""><img src="../images/5320551.png" alt=""></span>';
              echo '<span class="u-align-center u-file-icon u-icon u-icon-2" data-animation-name="swing" data-animation-duration="1000" data-animation-delay="0" data-animation-direction=""><img src="../images/5318957.png" alt=""></span>';
            }
          } else {
            echo mysqli_error($link);
          }        
          ?>
          <a href="../bestellen/index.php" class="u-align-center u-border-1 u-border-black u-btn u-button-style u-hover-black u-none u-text-hover-white u-btn-1">Jetzt bestellen </a>
        </div>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-container-align-center u-section-2" id="sec-a130">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1"><!--products--><!--products_options_json--><!--{"type":"Recent","source":"","tags":"","count":""}--><!--/products_options_json-->
        <div class="u-expanded-width u-layout-horizontal u-products u-products-1" data-site-sorting-prop="created" data-site-sorting-order="desc" data-products-datasource="site" data-items-per-page="4" data-products-id="1">
          <div class="u-list-control"></div>
          <div class="u-repeater u-repeater-1">
            <?php
            $sql_products = "SELECT * FROM `Artikelliste`";
            $sql_products_result = mysqli_query( $link, $sql_products );
            if ($sql_products_result) {
              foreach ($sql_products_result as $row) {
                $bild = $row['bild'];
                if (!$bild) {
                  $bild = "../images/placeholder.png";
                }
                echo '<!--product_item--><div class="u-align-center u-container-align-center u-container-style u-palette-5-light-2 u-products-item u-repeater-item u-repeater-item-1" data-product-id="5">
                  <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1"><!--product_image-->
                    <img alt="" class="u-expanded-width u-image u-image-contain u-image-default u-product-control u-image-1" src="'.$bild.'"><!--/product_image--><!--product_title-->
                    <h4 class="u-align-center u-product-control u-text u-text-1">'.$row['artikel'].'</h4><!--/product_title--><!--product_price-->
                    <div data-add-zero-cents="true" class="u-align-center u-product-control u-product-price u-product-price-1">
                      <div class="u-price-wrapper u-spacing-10"><!--product_regular_price-->
                        <div class="u-price" style="font-size: 1.25rem; font-weight: 600;">'.$row['preis'].'€</div><!--/product_regular_price-->
                      </div>
                    </div><!--/product_price-->
                  </div>
                </div><!--/product_item-->';
              }
            }
            ?>
          </div>
          <a class="u-absolute-vcenter u-gallery-nav u-gallery-nav-prev u-grey-60 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-gallery-nav-1" href="#" role="button">
            <span aria-hidden="true">
              <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
            </span>
            <span class="sr-only">
              <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
            </span>
          </a>
          <a class="u-absolute-vcenter u-gallery-nav u-gallery-nav-next u-grey-60 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-gallery-nav-2" href="#" role="button">
            <span aria-hidden="true">
              <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
            </span>
            <span class="sr-only">
              <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
            </span>
          </a>
          <div class="u-list-control"></div>
        </div><!--/products-->
      </div>
    </section>
</body></html>