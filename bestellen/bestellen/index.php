<?php
session_start();
require_once "../config/config.php";
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="de"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="keywords" content="​Author&amp;apos;s cake and desserts for your holiday, ​Few words about myself, ​Catalog, How We Work, Facts &amp;amp; Questions, ​​Best Choice, ​Make an order">
    <meta name="description" content="">
    <title>Bestellen</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="../Bestellen.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>

    <script class="u-script" type="text/javascript" src="../mail.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../bild.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="index.js" defer=""></script>

    <style>
      .img_pic {
        width: 200px; /* You can specify the width in pixels or other units */
        height: auto; /* The 'auto' value maintains the image's aspect ratio */
      }

      .num {
        width: 60px;
        height: 40px;
        font-size: 24px;
        text-align: center;
        border: 2px solid #ccc;
        border-radius: 4px;
        color: gray;
      }

      .fixed-bar {
        background-color: white;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 10px;
        text-align: center;
        justify-content: center;
        box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
        height: 120px; /* Standardhöhe der fixed bar */
        display: flex;
      }

      .expanded-bar {
        height: 100vh;
        bottom: 0;
      }
    </style>
    <script>
      let cart = [];
      let total = 0;
      let before = "";
      let rabatt = 0;
      function startup(artikel) {
        const selectElement = document.getElementById("select_"+artikel);
        try {
            selectElement.disabled = false;
        } catch (error) {
            console.error(error)
        }
        const anzElement = document.getElementById("anz_"+artikel);
        anzElement.disabled = false;
      }
      function checkCart(artikel, preis) {
        let insite = false;
        for (const item of cart) {
            if (item.name == artikel) {
                insite = true;
                break;
            }
        }

        const buttonElement = document.getElementById(artikel);
        const selectElement = document.getElementById("select_"+artikel);
        const anzElement = document.getElementById("anz_"+artikel);
        if (insite) {
            buttonElement.style.backgroundColor = "#E36262";
            buttonElement.textContent = "Im Warenkorb";
            buttonElement.onclick = function () {
            removeFromCartByName(artikel);
            };
            try {
            selectElement.disabled = true;
            } catch (error) {
            console.error(error);
            }
            anzElement.disabled = true;
        } else {
            buttonElement.style.backgroundColor = "#6DE362";
            buttonElement.textContent = "In den Warenkorb - " + preis + "€";
            buttonElement.onclick = function () {
            addToCart(artikel, preis);
            };
            try {
            selectElement.disabled = false;
            } catch (error) {
            console.error(error);
            }
            anzElement.disabled = false;
        }

        if (cart.length == 0) {
            document.getElementById("btn").textContent = "Einkaufswagen ist leer";
            document.getElementById("btn").style.backgroundColor = "#D6D6D6";
            document.getElementById("btn").disabled = true;
        } else {
            var ins = 0;
            for (const item of cart) {
              ins = ins + parseInt(item.anz)
            }
            var rabattInDezimal = rabatt / 100;
            var rabattBetrag = total * rabattInDezimal;

            // Den Endpreis berechnen
            var beta_total = total - rabattBetrag;
            if (beta_total < 0.00) {
              beta_total = 0.00
            }
            beta_total = beta_total.toFixed(2)
            total_rounded = total.toFixed(2)
            if (rabatt == 0) {
              document.getElementById("btn").textContent = "Jetzt Bestellen ("+ins.toString()+") - "+beta_total+"€";
            } else {
              document.getElementById("btn").innerHTML = "Jetzt Bestellen ("+ins.toString()+") - <s style='color: #FF7070'>"+total_rounded+"€</s> "+beta_total+"€";
            }
            document.getElementById("btn").style.backgroundColor = "#7FB081";
            document.getElementById("btn").disabled = false;
        }
      }
      function checkout() {
        const name = document.getElementById("name")
        let tisch = "";
        const selectElement = document.getElementById("tisch");
        try {
          if (selectElement == null) {
            tisch = "nl"
          } else {
            if (selectElement.value == "") {
              tisch = "lr"
            }
          }
        } catch (error) {
          tisch = "nl"
        }
        if (name.value == "") {
            alert("Kein Name angegeben");
        } else if (tisch == "lr") {
            alert("Kein Tisch ausgewählt");
        } else {
            $.ajax({
            url: 'check-open.php',
            success: function(data) {
                $('.result').html(data);
                if(data.toString() == "Geschlossen") {
                  window.location = "bestellt-error.php?code=474";
                } else {
                    products = "";
                    for (const item of cart) {
                        products = products + item.anz + "x " + item.name + " - " + item.tg + "<br>";
                        $.ajax({
                        url: 'edit-lager.php?artikel='+item.name+'&anz='+item.anz
                        })
                    }
                    if (tisch != "nl") {
                        tisch = "- " + selectElement.value;
                    } else {
                        tisch = "- Kein Tisch angegeben"
                    }
                    var rabattInDezimal = rabatt / 100;
                    var rabattBetrag = total * rabattInDezimal;

                    // Den Endpreis berechnen
                    total = total - rabattBetrag;
                    total = total.toFixed(2)
                    if (total < 0.00) {
                      total = 0.00
                    }
                    const string_cart = JSON.stringify(cart);
                    $.ajax({
                        url: 'send-order.php?name='+name.value+'&total='+total+'&tisch='+tisch+'&produkte='+products+'&cart='+string_cart,
                        success: function(data) {
                        $('.result').html(data);
                          window.location = "bestellt-abgeschlossenn.php?id="+data.toString();
                        }
                    });
                }
            }
            });
        }
      }
      function addToCart(productName, price) {
        const selectElement = document.getElementById("select_"+productName);
        const anzElement = document.getElementById("anz_"+productName);
        if (anzElement.value <= 0) {
          alert("Die Anzahl darf nicht 0 oder kleiner sein")
        } else if (anzElement.value > parseInt(anzElement.max)) {
          alert("Der Artikel ist nur noch "+anzElement.max+" mal verfügbar")
        } else {
          try {
          cart.push({ name: productName, price: price, tg: selectElement.value, anz: anzElement.value });
          } catch (error) {
          console.error(error);
          cart.push({ name: productName, price: price, tg: "", anz: anzElement.value });
          }
          total += anzElement.value * price;
          checkCart(productName, price)
        }
      }
      function removeFromCartByName(productName) {
        const index = cart.findIndex(item => item.name === productName);
        if (index !== -1) {
          const removedItem = cart.splice(index, 1)[0];
          total -= removedItem.anz * removedItem.price;
          checkCart(productName, removedItem.price)
        }
      }
      function rabatt_check() {
        const rabattfeld = document.getElementById("rabatt");
        if (rabattfeld.value != "") {
          $.ajax({
            url: 'check-code.php?code='+rabattfeld.value,
            success: function(data) {
              $('.result').html(data);
              if (data == "0") {
                alert("Ungültiger Rabattcode")
                rabattfeld.value = ""
                rabatt = 0
              } else {
                rabatt = parseInt(data)
                alert("Du erhältst beim Checkout "+data+"% Rabatt")
              }
            }
          });
        }
      }
    </script>

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

    <?php
    $snowflakeModuleQuery = "SELECT * FROM `module` WHERE `name` = 'Schneeflocken' and `status` = 'on'";
    $snowflakeModuleResult = mysqli_query($link, $snowflakeModuleQuery);
    $snowflakeModuleRows = mysqli_num_rows($snowflakeModuleResult);
    if ($snowflakeModuleRows == 1) {
      require_once "../designs/snow.php";
    }
    ?>

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
        <p class="u-text u-text-default u-text-1"><?php require_once "../config/config.php"; echo $RESTAURANT_NAME; ?></p><?php
require_once "../config/config.php";
$nr_3 = "SELECT * FROM `module` WHERE `name` = 'Account' and `status` = 'on'";
$nr_result3 = mysqli_query($link, $nr_3);
$nr3 = mysqli_num_rows($nr_result3);
if ($nr3 != 0) {
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    echo '<a href="../account/login.php" style="background-color: #FF613D; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1">Account Login</a>';
  } else {
    echo '<a href="../account/index.php" style="background-color: #5B67FF; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1">Account</a>';
  }
}
?>
      </div></header>
    <section class="u-clearfix u-grey-5 u-section-2" id="carousel_a603">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-align-left u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                <div class="u-container-layout u-container-layout-1">
<?php
if($_SESSION["loggedin"] === true){
  $style = 'readonly style="background-color: #E2E2E2;"';
} else {
  $style = '';
}
echo '<input type="text" id="name" name="name" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" placeholder="Name" value="'.$_SESSION["username"].'" required="" '.$style.'><br>';

$nr_3 = "SELECT * FROM `module` WHERE `name` = 'Tischnummer' and `status` = 'on'";
$nr_result3 = mysqli_query($link, $nr_3);
$nr3 = mysqli_num_rows($nr_result3);
if ($nr3 != 0) {
  echo '<select id="tisch" name="tisch" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">';
  $query0 = 'SELECT * FROM `tische` WHERE `status` = "on"';
  $result0 = mysqli_query($link, $query0);
  echo '<option value="" disabled selected></option>';
  while($zeile = mysqli_fetch_array( $result0, MYSQLI_ASSOC)) {
    echo '<option value="Tisch '.$zeile['nummer'].'">Tisch '.$zeile['nummer'].'</option>';
  }
  echo '</select><br>';
}

echo '<input onchange="rabatt_check()" type="text" id="rabatt" name="rabatt" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" placeholder="Rabattcode"><br>';
?>
                  <select onchange="val()" id="cat" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
                    <option selected disabled>Bitte wähle eine Kategorie aus</option>
                    <option value="1">Kalte Getränke ohne Alkohol</option>
                    <option value="2">Kalte Getränke mit Alkohol</option>
                    <option value="3">Warme Getränke ohne Alkohol</option>
                    <option value="4">Warme Getränke mit Alkohol</option>
                    <option value="5">Essen</option>
                  </select>
                  <div id="1_div" name="1_div" style="visibility: hidden; display: none;">
                    <h3 class="u-text u-text-default u-text-1">Kalte Getränke ohne Alkohol</h3><br>
<?php
$query = 'SELECT * FROM `Artikelliste` WHERE `Gruppe` = "1"';
$result = mysqli_query($link, $query);
$num_rows = mysqli_num_rows($result);
if ($num_rows > 0) {
  foreach ($result as $zeile) {
    echo '<fieldset>';
    if ($zeile['bild'] != "") {
      echo '<img class="img_pic" src="' . $zeile['bild'] . '" align="right" style="border-radius: 70% 30% 30% 70% / 60% 40% 60% 40%;" alt="" data-image-width="734" data-image-height="864" data-lang-en="">';
    }
    $lager = 'max="'.$zeile['lager'].'"';
    if ($zeile['lager'] <= 0) {
      $lager = "";
    }
    echo '<h6 class="u-text u-text-default u-text-1"><input type="number" id="anz_'.$zeile['artikel'].'" value="1" disabled class="num" min="1" '.$lager.'> ' . $zeile['artikel'] . '</h6>';
    if ($zeile['lager'] == 0) {
      echo '<button style="background-color: #D6D6D6; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1" disabled>Ausverkauft</button>';
    } else {
      $articleID = $zeile['artikel'];
      if ($zeile['TG'] == "Ja") {
        echo '<select id="select_'.$zeile['artikel'].'" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" disabled>';
        echo '<option value="Klein">Klein</option>';
        echo '<option value="Normal" selected>Normal</option>';
        echo '<option value="Groß">Groß</option>';
        echo '</select>';
      }
      echo '<button id="' . $articleID . '" style="background-color: #6DE362; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1" onclick="addToCart(\'' . $zeile['artikel'] . '\', ' . $zeile['preis'] . ')">';
      echo 'In den Warenkorb - ' . round($zeile['preis'], 2) . '€';
      echo '</button>';
      echo '<script>startup("'.$zeile['artikel'].'");</script>';
    }
    echo '</fieldset>';
  }
} else {
  echo '<h5 class="u-text u-text-default u-text-1">Keine Artikel unter dieser Kategorie</h5>';
}
?>
                  </div>
                  <div id="2_div" name="2_div" style="visibility: hidden; display: none;">
                    <h3 class="u-text u-text-default u-text-1">Kalte Getränke mit Alkohol</h3><br>
                    <?php
$query = 'SELECT * FROM `Artikelliste` WHERE `Gruppe` = "2"';
$result = mysqli_query($link, $query);
$num_rows = mysqli_num_rows($result);
if ($num_rows > 0) {
  foreach ($result as $zeile) {
    echo '<fieldset>';
    if ($zeile['bild'] != "") {
      echo '<img class="img_pic" src="' . $zeile['bild'] . '" align="right" style="border-radius: 70% 30% 30% 70% / 60% 40% 60% 40%;" alt="" data-image-width="734" data-image-height="864" data-lang-en="">';
    }
    $lager = 'max="'.$zeile['lager'].'"';
    if ($zeile['lager'] <= 0) {
      $lager = "";
    }
    echo '<h6 class="u-text u-text-default u-text-1"><input type="number" id="anz_'.$zeile['artikel'].'" value="1" disabled class="num" min="1" '.$lager.'> ' . $zeile['artikel'] . '</h6>';
    if ($zeile['lager'] == 0) {
      echo '<button style="background-color: #D6D6D6; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1" disabled>Ausverkauft</button>';
    } else {
      $articleID = $zeile['artikel'];
      if ($zeile['TG'] == "Ja") {
        echo '<select id="select_'.$zeile['artikel'].'" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" disabled>';
        echo '<option value="Klein">Klein</option>';
        echo '<option value="Normal" selected>Normal</option>';
        echo '<option value="Groß">Groß</option>';
        echo '</select>';
      }
      echo '<button id="' . $articleID . '" style="background-color: #6DE362; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1" onclick="addToCart(\'' . $zeile['artikel'] . '\', ' . $zeile['preis'] . ')">';
      echo 'In den Warenkorb - ' . round($zeile['preis'], 2) . '€';
      echo '</button>';
      echo '<script>startup("'.$zeile['artikel'].'");</script>';
    }
    echo '</fieldset>';
  }
} else {
  echo '<h5 class="u-text u-text-default u-text-1">Keine Artikel unter dieser Kategorie</h5>';
}
?>
                  </div>
                  <div id="3_div" name="3_div" style="visibility: hidden; display: none;">
                    <h3 class="u-text u-text-default u-text-1">Warme Getränke ohne Alkohol</h3><br>
                    <?php
$query = 'SELECT * FROM `Artikelliste` WHERE `Gruppe` = "3"';
$result = mysqli_query($link, $query);
$num_rows = mysqli_num_rows($result);
if ($num_rows > 0) {
  foreach ($result as $zeile) {
    echo '<fieldset>';
    if ($zeile['bild'] != "") {
      echo '<img class="img_pic" src="' . $zeile['bild'] . '" align="right" style="border-radius: 70% 30% 30% 70% / 60% 40% 60% 40%;" alt="" data-image-width="734" data-image-height="864" data-lang-en="">';
    }
    $lager = 'max="'.$zeile['lager'].'"';
    if ($zeile['lager'] <= 0) {
      $lager = "";
    }
    echo '<h6 class="u-text u-text-default u-text-1"><input type="number" id="anz_'.$zeile['artikel'].'" value="1" disabled class="num" min="1" '.$lager.'> ' . $zeile['artikel'] . '</h6>';
    if ($zeile['lager'] == 0) {
      echo '<button style="background-color: #D6D6D6; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1" disabled>Ausverkauft</button>';
    } else {
      $articleID = $zeile['artikel'];
      if ($zeile['TG'] == "Ja") {
        echo '<select id="select_'.$zeile['artikel'].'" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" disabled>';
        echo '<option value="Klein">Klein</option>';
        echo '<option value="Normal" selected>Normal</option>';
        echo '<option value="Groß">Groß</option>';
        echo '</select>';
      }
      echo '<button id="' . $articleID . '" style="background-color: #6DE362; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1" onclick="addToCart(\'' . $zeile['artikel'] . '\', ' . $zeile['preis'] . ')">';
      echo 'In den Warenkorb - ' . round($zeile['preis'], 2) . '€';
      echo '</button>';
      echo '<script>startup("'.$zeile['artikel'].'");</script>';
    }
    echo '</fieldset>';
  }
} else {
  echo '<h5 class="u-text u-text-default u-text-1">Keine Artikel unter dieser Kategorie</h5>';
}
?>
                  </div>
                  <div id="4_div" name="4_div" style="visibility: hidden; display: none;">
                    <h3 class="u-text u-text-default u-text-1">Warme Getränke mit Alkohol</h3><br>
                    <?php
$query = 'SELECT * FROM `Artikelliste` WHERE `Gruppe` = "4"';
$result = mysqli_query($link, $query);
$num_rows = mysqli_num_rows($result);
if ($num_rows > 0) {
  foreach ($result as $zeile) {
    echo '<fieldset>';
    if ($zeile['bild'] != "") {
      echo '<img class="img_pic" src="' . $zeile['bild'] . '" align="right" style="border-radius: 70% 30% 30% 70% / 60% 40% 60% 40%;" alt="" data-image-width="734" data-image-height="864" data-lang-en="">';
    }
    $lager = 'max="'.$zeile['lager'].'"';
    if ($zeile['lager'] <= 0) {
      $lager = "";
    }
    echo '<h6 class="u-text u-text-default u-text-1"><input type="number" id="anz_'.$zeile['artikel'].'" value="1" disabled class="num" min="1" '.$lager.'> ' . $zeile['artikel'] . '</h6>';
    if ($zeile['lager'] == 0) {
      echo '<button style="background-color: #D6D6D6; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1" disabled>Ausverkauft</button>';
    } else {
      $articleID = $zeile['artikel'];
      if ($zeile['TG'] == "Ja") {
        echo '<select id="select_'.$zeile['artikel'].'" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" disabled>';
        echo '<option value="Klein">Klein</option>';
        echo '<option value="Normal" selected>Normal</option>';
        echo '<option value="Groß">Groß</option>';
        echo '</select>';
      }
      echo '<button id="' . $articleID . '" style="background-color: #6DE362; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1" onclick="addToCart(\'' . $zeile['artikel'] . '\', ' . $zeile['preis'] . ')">';
      echo 'In den Warenkorb - ' . round($zeile['preis'], 2) . '€';
      echo '</button>';
      echo '<script>startup("'.$zeile['artikel'].'");</script>';
    }
    echo '</fieldset>';
  }
} else {
  echo '<h5 class="u-text u-text-default u-text-1">Keine Artikel unter dieser Kategorie</h5>';
}
?>
                  </div>
                  <div id="5_div" name="5_div" style="visibility: hidden; display: none;">
                    <h3 class="u-text u-text-default u-text-1">Essen</h3><br>
                    <?php
$query = 'SELECT * FROM `Artikelliste` WHERE `Gruppe` = "5"';
$result = mysqli_query($link, $query);
$num_rows = mysqli_num_rows($result);
if ($num_rows > 0) {
  foreach ($result as $zeile) {
    echo '<fieldset>';
    if ($zeile['bild'] != "") {
      echo '<img class="img_pic" src="' . $zeile['bild'] . '" align="right" style="border-radius: 70% 30% 30% 70% / 60% 40% 60% 40%;" alt="" data-image-width="734" data-image-height="864" data-lang-en="">';
    }
    $lager = 'max="'.$zeile['lager'].'"';
    if ($zeile['lager'] <= 0) {
      $lager = "";
    }
    echo '<h6 class="u-text u-text-default u-text-1"><input type="number" id="anz_'.$zeile['artikel'].'" value="1" disabled class="num" min="1" '.$lager.'> ' . $zeile['artikel'] . '</h6>';
    if ($zeile['lager'] == 0) {
      echo '<button style="background-color: #D6D6D6; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1" disabled>Ausverkauft</button>';
    } else {
      $articleID = $zeile['artikel'];
      if ($zeile['TG'] == "Ja") {
        echo '<select id="select_'.$zeile['artikel'].'" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" disabled>';
        echo '<option value="Klein">Klein</option>';
        echo '<option value="Normal" selected>Normal</option>';
        echo '<option value="Groß">Groß</option>';
        echo '</select>';
      }
      echo '<button id="' . $articleID . '" style="background-color: #6DE362; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1" onclick="addToCart(\'' . $zeile['artikel'] . '\', ' . $zeile['preis'] . ')">';
      echo 'In den Warenkorb - ' . round($zeile['preis'], 2) . '€';
      echo '</button>';
      echo '<script>startup("'.$zeile['artikel'].'");</script>';
    }
    echo '</fieldset>';
  }
} else {
  echo '<h5 class="u-text u-text-default u-text-1">Keine Artikel unter dieser Kategorie</h5>';
}
?>
                  </div>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                <div class="u-container-layout u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-container-layout-2">
                  <img id="image" name="image" class="u-image u-image-default u-image-1" src="../images/default.jpg" align="right" style="border-radius: 70% 30% 30% 70% / 60% 40% 60% 40%;" alt="" data-image-width="734" data-image-height="864" data-lang-en="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><br><br><br><br><br>
    </section>
    <div class="fixed-bar" id="fixedBar">
      <button id="btn" style="background-color: #D6D6D6; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1" disabled onclick="checkout()">Einkaufswagen ist leer</button><br><br><br><br>
    </div>
</body></html>