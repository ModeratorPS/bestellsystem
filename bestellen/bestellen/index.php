<?php
session_start();
require_once "../config/config.php";
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="de"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="description" content="">
    <title>🛒 - Bestellvorgang</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="style.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.12.10, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    <script src="script.js"></script>
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
    <meta property="og:title" content="bestellen2">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body data-path-to-root="./" data-include-products="true" class="u-body u-xl-mode" data-lang="de"><header class="u-clearfix u-header" id="sec-35c2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><div class="u-clearfix u-sheet u-valign-middle-xs u-sheet-1">
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
    <section class="u-clearfix u-custom-color-2 u-section-1" id="carousel_9c88">
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
        </div>
      </div>
      <div class="custom-expanded u-tab-links-align-center u-tabs u-tabs-1">
        <ul class="u-tab-list u-unstyled" role="tablist"><li class="u-tab-item" role="presentation"><a class="active u-active-white u-button-style u-tab-link u-tab-link-1" id="link-tab-5f42" href="#tab-5f42" role="tab" aria-controls="tab-5f42" aria-selected="true">Kalte Getränke ohne Alkohol</a>
</li><li class="u-tab-item" role="presentation"><a class="u-active-white u-button-style u-tab-link u-tab-link-2" id="link-tab-585b" href="#tab-585b" role="tab" aria-controls="tab-585b" aria-selected="false">Kalte Getränke mit Alkohol</a>
</li><li class="u-tab-item" role="presentation"><a class="u-active-white u-button-style u-tab-link u-tab-link-3" id="link-tab-13f2" href="#tab-13f2" role="tab" aria-controls="tab-13f2" aria-selected="false">Warme Getränke ohne Alkohol</a>
</li><li class="u-tab-item" role="presentation"><a class="u-active-white u-button-style u-tab-link u-tab-link-4" id="link-tab-ef24" href="#tab-ef24" role="tab" aria-controls="tab-ef24" aria-selected="false">Warme Getränke mit Alkohol</a>
</li><li class="u-tab-item" role="presentation"><a class="u-active-white u-button-style u-tab-link u-tab-link-5" id="link-tab-c4c1" href="#tab-c4c1" role="tab" aria-controls="tab-c4c1" aria-selected="false">Essen</a>
</li></ul>
        <div class="u-tab-content">
          <div class="u-container-style u-tab-active u-tab-pane u-white u-tab-pane-1" id="tab-5f42" role="tabpanel" aria-labelledby="link-tab-5f42">
            <div class="u-container-layout u-container-layout-2">
              <div class="u-expanded-width u-products u-products-1" data-site-sorting-prop="created" data-site-sorting-order="desc" data-products-datasource="site" data-items-per-page="4" data-products-id="1">
                <div class="u-list-control"></div>
                <div class="u-repeater u-repeater-1">
                <?php
                $sql_product = 'SELECT * FROM `Artikelliste` WHERE `Gruppe` = "1" AND `status` = "on"';
                $sql_product_result = mysqli_query($link, $sql_product);
                $sql_product_num_rows = mysqli_num_rows($sql_product_result);
                if ($sql_product_num_rows > 0) {
                  foreach ($sql_product_result as $row) {
                    $img_file = $row['bild'];
                    if (!$img_file) {
                      $img_file = "../images/placeholder.png";
                    }
                    $lager = 'max="'.$row['lager'].'"';
                    if ($row['lager'] <= 0) {
                      $lager = "";
                    }
                    echo '<div class="u-align-center u-container-style u-products-item u-repeater-item">
                      <div class="u-container-layout u-similar-container u-valign-bottom-md u-valign-bottom-sm u-valign-bottom-xs u-container-layout-1">
                        <img alt="" class="u-expanded-width u-image u-image-contain u-image-default u-product-control u-image-2" src="'.$img_file.'">
                        <h4 class="u-align-center u-product-control u-text u-text-default u-text-2">
                          <input type="number" id="anz_'.$row['artikel'].'" value="1" disabled class="num" min="1" '.$lager.'><br><br><a class="u-product-title-link">'.$row['artikel'].'</a>
                        </h4>
                        <div class="u-align-center u-product-control u-product-price u-product-price-2" data-add-zero-cents="true">
                          <div class="u-price-wrapper u-spacing-10">
                            <div class="u-price" style="font-size: 1.25rem; font-weight: 500;">'.number_format($row['preis'], 2, ".", "").'€</div>
                          </div>
                        </div>';
                        if ($row['lager'] == 0) {
                          echo '<button class="u-align-center u-border-2 u-border-grey-25 u-border-hover-black u-btn u-btn-rectangle u-button-style u-hover-black u-none u-product-control u-text-body-color u-text-hover-white u-btn-2 u-dialog-link" disabled>Ausverkauft</button>';
                        } else {
                          echo '<button id="'.$row['artikel'].'" onclick="addToCart(\''.$row['artikel'].'\', '.$row['preis'].', \''.$img_file.'\')" class="u-align-center u-border-2 u-border-hover-black u-border-grey-25 u-btn u-btn-rectangle u-button-style u-hover-black u-none u-product-control u-text-body-color u-text-hover-white u-btn-2 u-dialog-link">In den Warenkorb</button>';
                          echo '<script>startup("'.$row['artikel'].'");</script>';
                        }
                    echo '<br></div></div>';
                  }
                } else {
                  echo '<div class="u-align-center u-container-style u-products-item u-repeater-item">
                  <div class="u-container-layout u-similar-container u-valign-bottom-md u-valign-bottom-sm u-valign-bottom-xs u-container-layout-1">
                  <h6 class="u-text u-text-default u-text-1">Keine Artikel unter dieser Kategorie</h6>
                  </div></div>';
                }
                ?>
                </div>
                <div class="u-list-control"></div><br><br><br><br>
              </div>
            </div>
          </div>
          <div class="u-container-style u-tab-pane u-white u-tab-pane-2" id="tab-585b" role="tabpanel" aria-labelledby="link-tab-585b">
            <div class="u-container-layout u-container-layout-7">
              <div class="u-expanded-width u-products u-products-2" data-site-sorting-prop="created" data-site-sorting-order="desc" data-products-datasource="site" data-items-per-page="4" data-products-id="2">
                <div class="u-list-control"></div>
                <div class="u-repeater u-repeater-2">
                <?php
                $sql_product = 'SELECT * FROM `Artikelliste` WHERE `Gruppe` = "2" AND `status` = "on"';
                $sql_product_result = mysqli_query($link, $sql_product);
                $sql_product_num_rows = mysqli_num_rows($sql_product_result);
                if ($sql_product_num_rows > 0) {
                  foreach ($sql_product_result as $row) {
                    $img_file = $row['bild'];
                    if (!$img_file) {
                      $img_file = "../images/placeholder.png";
                    }
                    $lager = 'max="'.$row['lager'].'"';
                    if ($row['lager'] <= 0) {
                      $lager = "max='6'";
                    }
                    echo '<div class="u-align-center u-container-style u-products-item u-repeater-item">
                      <div class="u-container-layout u-similar-container u-valign-bottom-md u-valign-bottom-sm u-valign-bottom-xs u-container-layout-1">
                        <img alt="" class="u-expanded-width u-image u-image-contain u-image-default u-product-control u-image-2" src="'.$img_file.'">
                        <h4 class="u-align-center u-product-control u-text u-text-default u-text-2">
                          <input type="number" id="anz_'.$row['artikel'].'" value="1" disabled class="num" min="1" '.$lager.'><br><br><a class="u-product-title-link">'.$row['artikel'].'</a>
                        </h4>
                        <div class="u-align-center u-product-control u-product-price u-product-price-2" data-add-zero-cents="true">
                          <div class="u-price-wrapper u-spacing-10">
                            <div class="u-price" style="font-size: 1.25rem; font-weight: 500;">'.number_format($row['preis'], 2, ".", "").'€</div>
                          </div>
                        </div>';
                        if ($row['lager'] == 0) {
                          echo '<button class="u-align-center u-border-2 u-border-grey-25 u-border-hover-black u-btn u-btn-rectangle u-button-style u-hover-black u-none u-product-control u-text-body-color u-text-hover-white u-btn-2 u-dialog-link" disabled>Ausverkauft</button>';
                        } else {
                          echo '<button id="'.$row['artikel'].'" onclick="addToCart(\''.$row['artikel'].'\', '.$row['preis'].', \''.$img_file.'\')" class="u-align-center u-border-2 u-border-hover-black u-border-grey-25 u-btn u-btn-rectangle u-button-style u-hover-black u-none u-product-control u-text-body-color u-text-hover-white u-btn-2 u-dialog-link">In den Warenkorb</button>';
                          echo '<script>startup("'.$row['artikel'].'");</script>';
                        }
                    echo '<br></div></div>';
                  }
                } else {
                  echo '<div class="u-align-center u-container-style u-products-item u-repeater-item">
                  <div class="u-container-layout u-similar-container u-valign-bottom-md u-valign-bottom-sm u-valign-bottom-xs u-container-layout-1">
                  <h6 class="u-text u-text-default u-text-1">Keine Artikel unter dieser Kategorie</h6>
                  </div></div>';
                }
                ?>
                </div>
                <div class="u-list-control"></div><br><br><br><br>
              </div>
            </div>
          </div>
          <div class="u-container-style u-tab-pane u-white u-tab-pane-3" id="tab-13f2" role="tabpanel" aria-labelledby="link-tab-13f2">
            <div class="u-container-layout u-container-layout-12">
              <div class="u-expanded-width u-products u-products-3" data-site-sorting-prop="created" data-site-sorting-order="desc" data-products-datasource="site" data-items-per-page="4" data-products-id="3">
                <div class="u-list-control"></div>
                <div class="u-repeater u-repeater-3">
                <?php
                $sql_product = 'SELECT * FROM `Artikelliste` WHERE `Gruppe` = "3" AND `status` = "on"';
                $sql_product_result = mysqli_query($link, $sql_product);
                $sql_product_num_rows = mysqli_num_rows($sql_product_result);
                if ($sql_product_num_rows > 0) {
                  foreach ($sql_product_result as $row) {
                    $img_file = $row['bild'];
                    if (!$img_file) {
                      $img_file = "../images/placeholder.png";
                    }
                    $lager = 'max="'.$row['lager'].'"';
                    if ($row['lager'] <= 0) {
                      $lager = "";
                    }
                    echo '<div class="u-align-center u-container-style u-products-item u-repeater-item">
                      <div class="u-container-layout u-similar-container u-valign-bottom-md u-valign-bottom-sm u-valign-bottom-xs u-container-layout-1">
                        <img alt="" class="u-expanded-width u-image u-image-contain u-image-default u-product-control u-image-2" src="'.$img_file.'">
                        <h4 class="u-align-center u-product-control u-text u-text-default u-text-2">
                          <input type="number" id="anz_'.$row['artikel'].'" value="1" disabled class="num" min="1" '.$lager.'><br><br><a class="u-product-title-link">'.$row['artikel'].'</a>
                        </h4>
                        <div class="u-align-center u-product-control u-product-price u-product-price-2" data-add-zero-cents="true">
                          <div class="u-price-wrapper u-spacing-10">
                            <div class="u-price" style="font-size: 1.25rem; font-weight: 500;">'.number_format($row['preis'], 2, ".", "").'€</div>
                          </div>
                        </div>';
                        if ($row['lager'] == 0) {
                          echo '<button class="u-align-center u-border-2 u-border-grey-25 u-border-hover-black u-btn u-btn-rectangle u-button-style u-hover-black u-none u-product-control u-text-body-color u-text-hover-white u-btn-2 u-dialog-link" disabled>Ausverkauft</button>';
                        } else {
                          echo '<button id="'.$row['artikel'].'" onclick="addToCart(\''.$row['artikel'].'\', '.$row['preis'].', \''.$img_file.'\')" class="u-align-center u-border-2 u-border-hover-black u-border-grey-25 u-btn u-btn-rectangle u-button-style u-hover-black u-none u-product-control u-text-body-color u-text-hover-white u-btn-2 u-dialog-link">In den Warenkorb</button>';
                          echo '<script>startup("'.$row['artikel'].'");</script>';
                        }
                    echo '<br></div></div>';
                  }
                } else {
                  echo '<div class="u-align-center u-container-style u-products-item u-repeater-item">
                  <div class="u-container-layout u-similar-container u-valign-bottom-md u-valign-bottom-sm u-valign-bottom-xs u-container-layout-1">
                  <h6 class="u-text u-text-default u-text-1">Keine Artikel unter dieser Kategorie</h6>
                  </div></div>';
                }
                ?>
                </div>
                <div class="u-list-control"></div><br><br><br><br>
              </div>
            </div>
          </div>
          <div class="u-container-style u-tab-pane u-white u-tab-pane-4" id="tab-ef24" role="tabpanel" aria-labelledby="link-tab-ef24">
            <div class="u-container-layout u-container-layout-17">
              <div class="u-expanded-width u-products u-products-4" data-site-sorting-prop="created" data-site-sorting-order="desc" data-products-datasource="site" data-items-per-page="4" data-products-id="4">
                <div class="u-list-control"></div>
                <div class="u-repeater u-repeater-4">
                <?php
                $sql_product = 'SELECT * FROM `Artikelliste` WHERE `Gruppe` = "4" AND `status` = "on"';
                $sql_product_result = mysqli_query($link, $sql_product);
                $sql_product_num_rows = mysqli_num_rows($sql_product_result);
                if ($sql_product_num_rows > 0) {
                  foreach ($sql_product_result as $row) {
                    $img_file = $row['bild'];
                    if (!$img_file) {
                      $img_file = "../images/placeholder.png";
                    }
                    $lager = 'max="'.$row['lager'].'"';
                    if ($row['lager'] <= 0) {
                      $lager = "";
                    }
                    echo '<div class="u-align-center u-container-style u-products-item u-repeater-item">
                      <div class="u-container-layout u-similar-container u-valign-bottom-md u-valign-bottom-sm u-valign-bottom-xs u-container-layout-1">
                        <img alt="" class="u-expanded-width u-image u-image-contain u-image-default u-product-control u-image-2" src="'.$img_file.'">
                        <h4 class="u-align-center u-product-control u-text u-text-default u-text-2">
                          <input type="number" id="anz_'.$row['artikel'].'" value="1" disabled class="num" min="1" '.$lager.'><br><br><a class="u-product-title-link">'.$row['artikel'].'</a>
                        </h4>
                        <div class="u-align-center u-product-control u-product-price u-product-price-2" data-add-zero-cents="true">
                          <div class="u-price-wrapper u-spacing-10">
                            <div class="u-price" style="font-size: 1.25rem; font-weight: 500;">'.number_format($row['preis'], 2, ".", "").'€</div>
                          </div>
                        </div>';
                        if ($row['lager'] == 0) {
                          echo '<button class="u-align-center u-border-2 u-border-grey-25 u-border-hover-black u-btn u-btn-rectangle u-button-style u-hover-black u-none u-product-control u-text-body-color u-text-hover-white u-btn-2 u-dialog-link" disabled>Ausverkauft</button>';
                        } else {
                          echo '<button id="'.$row['artikel'].'" onclick="addToCart(\''.$row['artikel'].'\', '.$row['preis'].', \''.$img_file.'\')" class="u-align-center u-border-2 u-border-hover-black u-border-grey-25 u-btn u-btn-rectangle u-button-style u-hover-black u-none u-product-control u-text-body-color u-text-hover-white u-btn-2 u-dialog-link">In den Warenkorb</button>';
                          echo '<script>startup("'.$row['artikel'].'");</script>';
                        }
                    echo '<br></div></div>';
                  }
                } else {
                  echo '<div class="u-align-center u-container-style u-products-item u-repeater-item">
                  <div class="u-container-layout u-similar-container u-valign-bottom-md u-valign-bottom-sm u-valign-bottom-xs u-container-layout-1">
                  <h6 class="u-text u-text-default u-text-1">Keine Artikel unter dieser Kategorie</h6>
                  </div></div>';
                }
                ?>
                </div>
                <div class="u-list-control"></div><br><br><br><br>
              </div>
            </div>
          </div>
          <div class="u-container-style u-tab-pane u-white u-tab-pane-5" id="tab-c4c1" role="tabpanel" aria-labelledby="link-tab-c4c1">
            <div class="u-container-layout u-container-layout-22">
              <div class="u-expanded-width u-products u-products-5" data-site-sorting-prop="created" data-site-sorting-order="desc" data-products-datasource="site" data-items-per-page="4" data-products-id="5">
                <div class="u-list-control"></div>
                <div class="u-repeater u-repeater-5">
                <?php
                $sql_product = 'SELECT * FROM `Artikelliste` WHERE `Gruppe` = "5" AND `status` = "on"';
                $sql_product_result = mysqli_query($link, $sql_product);
                $sql_product_num_rows = mysqli_num_rows($sql_product_result);
                if ($sql_product_num_rows > 0) {
                  foreach ($sql_product_result as $row) {
                    $img_file = $row['bild'];
                    if (!$img_file) {
                      $img_file = "../images/placeholder.png";
                    }
                    $lager = 'max="'.$row['lager'].'"';
                    if ($row['lager'] <= 0) {
                      $lager = "";
                    }
                    echo '<div class="u-align-center u-container-style u-products-item u-repeater-item">
                      <div class="u-container-layout u-similar-container u-valign-bottom-md u-valign-bottom-sm u-valign-bottom-xs u-container-layout-1">
                        <img alt="" class="u-expanded-width u-image u-image-contain u-image-default u-product-control u-image-2" src="'.$img_file.'">
                        <h4 class="u-align-center u-product-control u-text u-text-default u-text-2">
                          <input type="number" id="anz_'.$row['artikel'].'" value="1" disabled class="num" min="1" '.$lager.'><br><br><a class="u-product-title-link">'.$row['artikel'].'</a>
                        </h4>
                        <div class="u-align-center u-product-control u-product-price u-product-price-2" data-add-zero-cents="true">
                          <div class="u-price-wrapper u-spacing-10">
                            <div class="u-price" style="font-size: 1.25rem; font-weight: 500;">'.number_format($row['preis'], 2, ".", "").'€</div>
                          </div>
                        </div>';
                        if ($row['lager'] == 0) {
                          echo '<button class="u-align-center u-border-2 u-border-grey-25 u-border-hover-black u-btn u-btn-rectangle u-button-style u-hover-black u-none u-product-control u-text-body-color u-text-hover-white u-btn-2 u-dialog-link" disabled>Ausverkauft</button>';
                        } else {
                          echo '<button id="'.$row['artikel'].'" onclick="addToCart(\''.$row['artikel'].'\', '.$row['preis'].', \''.$img_file.'\')" class="u-align-center u-border-2 u-border-hover-black u-border-grey-25 u-btn u-btn-rectangle u-button-style u-hover-black u-none u-product-control u-text-body-color u-text-hover-white u-btn-2 u-dialog-link">In den Warenkorb</button>';
                          echo '<script>startup("'.$row['artikel'].'");</script>';
                        }
                    echo '<br></div></div>';
                  }
                } else {
                  echo '<div class="u-align-center u-container-style u-products-item u-repeater-item">
                  <div class="u-container-layout u-similar-container u-valign-bottom-md u-valign-bottom-sm u-valign-bottom-xs u-container-layout-1">
                  <h6 class="u-text u-text-default u-text-1">Keine Artikel unter dieser Kategorie</h6>
                  </div></div>';
                }
                ?>
                </div>
                <div class="u-list-control"></div><br><br><br><br>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="fixed-bar" id="fixedBar">
        <a onclick="getList()" id="btn" style="margin: 25px 100px 100px 100px;" class="u-payment-button u-border-2 u-border-grey-75 u-border-hover-black u-btn u-button-style u-dialog-link u-hover-black u-none u-payment-button u-text-hover-white u-btn-21" disabled href="#sec-7695">Einkaufswagen ist leer</a>
        <script>startup_btn();</script>
      </div>
    </section>
  <section class="u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-70 u-payment-dialog u-valign-middle u-dialog-section-4" id="sec-7695">
      <div class="u-align-center u-container-style u-dialog u-radius-25 u-shape-round u-white u-dialog-1">
        <div class="u-container-layout u-container-layout-1">
          <h5 class="u-align-left u-text u-text-1">Bestellbestätigung</h5>
          <div id="modal_extra"></div>
          <div id="modal_main">
            <div class="custom-expanded u-layout-horizontal u-list u-list-1">
              <div class="u-repeater u-repeater-1" id="productlist">
                
              </div>
              <a class="u-absolute-vcenter u-gallery-nav u-gallery-nav-prev u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-gallery-nav-1" href="#" role="button">
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
              <a class="u-absolute-vcenter u-gallery-nav u-gallery-nav-next u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-gallery-nav-2" href="#" role="button">
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
            </div>
            <div class="u-form u-form-1">
              <form class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" name="form" style="padding: 10px;">
                <div class="u-form-group u-form-name">
                  <label for="name-ca5b" class="u-label">Name</label>
                  <?php
                  if($_SESSION["loggedin"] === true){
                    $style = 'readonly style="background-color: #E2E2E2;"';
                  } else {
                    $style = '';
                  }
                  echo '<input type="text" placeholder="Gib deinen Namen ein" id="name" name="name" class="u-input u-input-rectangle" required="" value="'.$_SESSION["username"].'" '.$style.'>';
                  ?>
                </div>
                <div class="u-form-group">
                  <label for="rabatt-ca5b" class="u-label">Rabattcode</label>
                  <input onchange="rabatt_check()" type="text" placeholder="Hier kannst du einen Rabattcode angeben" id="rabatt" name="rabatt" class="u-input u-input-rectangle">
                </div>
                      <?php
                      $sql_table_module = "SELECT * FROM `module` WHERE `name` = 'Tischnummer' and `status` = 'on'";
                      $sql_table_module_result = mysqli_query($link, $sql_table_module);
                      $sql_table_module_num_rows = mysqli_num_rows($sql_table_module_result);
                      if ($sql_table_module_num_rows != 0) {
                        echo '<div class="u-form-group u-form-select u-form-group-3">
                        <label for="select-4d36" class="u-label">Tisch</label>
                        <div class="u-form-select-wrapper">
                          <select id="tisch" name="tisch" class="u-input u-input-rectangle" required="required" style="color:gray" onchange="tablechange()">
                            <option value="" disabled selected>Bitte wähle einen Tisch aus</option>';
                        $sql_tables = 'SELECT * FROM `tische` WHERE `status` = "on"';
                        $sql_tables_result = mysqli_query($link, $sql_tables);
                        foreach ($sql_tables_result as $row) {
                          echo '<option value="Tisch '.$row['nummer'].'">Tisch '.$row['nummer'].'</option>';
                        }
                        echo '</select>
                            <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve"><polygon class="st0" points="8,12 2,4 14,4 "></polygon></svg>
                          </div>
                        </div>';
                      }                    
                      ?>
                <div class="u-align-left u-form-group u-form-submit">
                  <button class="u-btn u-btn-submit u-button-style" onclick="checkout()">Absenden</button>
                  <input type="submit" value="submit" class="u-form-control-hidden">
                </div>
              </form>
            </div>
          </div>
        </div><button class="u-dialog-close-button u-icon u-text-grey-40 u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-efe9"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 16 16" x="0px" y="0px" id="svg-efe9"><rect x="7" y="0" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="2" height="16"></rect><rect x="0" y="7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="16" height="2"></rect></svg></button>
      </div>
    </section><style>.u-dialog-section-4 .u-dialog-1 {
  width: 570px;
  min-height: 660px;
  height: auto;
  box-shadow: 0px 0px 8px 0px rgba(0,0,0,0.2);
  background-image: none;
  margin: 60px auto;
}

.u-dialog-section-4 .u-container-layout-1 {
  padding: 16px 0;
}

.u-dialog-section-4 .u-text-1 {
  font-weight: 700;
  margin: 18px 200px 0 35px;
}

.u-dialog-section-4 .u-list-1 {
  width: 500px;
  margin: 19px auto 0;
}

.u-dialog-section-4 .u-repeater-1 {
  min-height: 220px;
  grid-auto-columns: calc(50% - 5px);
  grid-template-columns: repeat(2, calc(50% - 5px));
  grid-gap: 10px;
}

.u-dialog-section-4 .u-list-item-1 {
  background-image: none;
}

.u-dialog-section-4 .u-container-layout-2 {
  padding: 14px 0 2px;
}

.u-dialog-section-4 .u-text-2 {
  font-weight: 700;
  margin: 0 16px;
}

.u-dialog-section-4 .u-image-1 {
  width: 128px;
  height: 128px;
  margin: 9px auto 0;
}

.u-dialog-section-4 .u-text-3 {
  font-weight: 400;
  margin: 8px 16px 0;
}

.u-dialog-section-4 .u-list-item-2 {
  background-image: none;
}

.u-dialog-section-4 .u-container-layout-3 {
  padding: 14px 0 2px;
}

.u-dialog-section-4 .u-text-4 {
  font-weight: 700;
  margin: 0 16px;
}

.u-dialog-section-4 .u-image-2 {
  width: 128px;
  height: 128px;
  margin: 9px auto 0;
}

.u-dialog-section-4 .u-text-5 {
  font-weight: 400;
  margin: 8px 16px 0;
}

.u-dialog-section-4 .u-gallery-nav-1 {
  position: absolute;
  left: 10px;
  width: 40px;
  height: 40px;
}

.u-dialog-section-4 .u-gallery-nav-2 {
  position: absolute;
  right: 10px;
  width: 40px;
  height: 40px;
}

.u-dialog-section-4 .u-form-1 {
  height: 342px;
  width: 522px;
  margin: 9px 24px 0;
}

.u-dialog-section-4 .u-form-group-3 {
  margin-left: 0;
}

.u-dialog-section-4 .u-icon-1 {
  width: 20px;
  height: 20px;
  left: auto;
  top: 36px;
  position: absolute;
  right: 35px;
  padding: 0;
}

@media (max-width: 1199px) {
  .u-dialog-section-4 .u-text-1 {
    margin-right: 200px;
    margin-left: 35px;
  }
}

@media (max-width: 991px) {
  .u-dialog-section-4 .u-repeater-1 {
    grid-auto-columns: calc(100% - 0px);
    grid-template-columns: 100%;
  }
}

@media (max-width: 767px) {
  .u-dialog-section-4 .u-dialog-1 {
    width: 540px;
  }

  .u-dialog-section-4 .u-text-1 {
    margin-right: 185px;
    margin-left: 20px;
  }

  .u-dialog-section-4 .u-repeater-1 {
    grid-auto-columns: 100%;
  }

  .u-dialog-section-4 .u-form-1 {
    margin-left: 9px;
    margin-right: 9px;
  }
}

@media (max-width: 575px) {
  .u-dialog-section-4 .u-dialog-1 {
    width: 340px;
    min-height: 664px;
  }

  .u-dialog-section-4 .u-text-1 {
    width: auto;
    margin-right: 79px;
  }

  .u-dialog-section-4 .u-list-1 {
    width: 300px;
  }

  .u-dialog-section-4 .u-text-2 {
    margin-left: 0;
    margin-right: 0;
  }

  .u-dialog-section-4 .u-text-3 {
    margin-left: 0;
    margin-right: 0;
  }

  .u-dialog-section-4 .u-text-4 {
    margin-left: 0;
    margin-right: 0;
  }

  .u-dialog-section-4 .u-text-5 {
    margin-left: 0;
    margin-right: 0;
  }

  .u-dialog-section-4 .u-form-1 {
    height: 342px;
    width: 318px;
    margin-left: 11px;
    margin-right: 11px;
  }
}</style>
</body></html>