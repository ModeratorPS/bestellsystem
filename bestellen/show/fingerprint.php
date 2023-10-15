<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fingerprint System</title>
    <style>
        /* Stil für den grünen Button */
        .btn {
            background-color: #4CAF50; /* Grün */
            color: #fff; /* Weißer Text */
            font-family: "Comic Sans MS";
            font-size: 24px; /* Schriftgröße anpassen */
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        .text {
            font-family: "Comic Sans MS";
            font-size: 24px;
        }
        .div {
            flex-direction: column; /* Elemente in einer Spalte anordnen */
            align-items: center;
            justify-content: center;
            height: 100vh;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }
        .div.active {
            opacity: 1;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var id = 0;

        function fadeIn(element) {
            element.style.opacity = '1';
        }

        function fadeOut(element) {
            element.style.opacity = '0';
        }

        function fadeToggle(id) {
            const div = document.getElementById(id);
            if (div.classList.contains('active')) {
                fadeOut(div);
                setTimeout(() => {
                    div.style.display = 'none';
                }, 500);
            } else {
                fadeIn(div);
                div.style.display = 'flex';
            }
            div.classList.toggle('active');
        }

        function createAccount() {
            fadeToggle("div1");
            fadeToggle("div2");
            var url = 'http://10.1.1.4:80/enroll';
            var xhr = new XMLHttpRequest();

            xhr.open("GET", url, true);

            function handleLoad() {
                if (xhr.status === 200) {
                    var responseText = xhr.responseText;
                    console.log("Antwort: " + responseText);
                    id = Number(responseText);
                    fadeToggle("div2");
                    fadeToggle("div3");
                    xhr.removeEventListener("load", handleLoad);
                } else {
                    console.error("Fehler bei der Anfrage. Statuscode: " + xhr.status);
                    fadeToggle("div2");
                    fadeToggle("div_error");
                }
            }
            xhr.addEventListener("load", handleLoad);

            xhr.send();
        }

        function loginAccount() {
            fadeToggle("div1");
            fadeToggle("div2");
            var url = 'http://10.1.1.4:80/search';
            var xhr = new XMLHttpRequest();

            xhr.open("GET", url, true);

            function handleLoad() {
                if (xhr.status === 200) {
                    var responseText = xhr.responseText;
                    console.log("Antwort: " + responseText);
                    id = Number(responseText);
                    if (id == 0) {
                        fadeToggle("div2");
                        fadeToggle("div_error");
                    } else {
                        fadeToggle("div2");
                        fadeToggle("div4");
                        setTimeout(() => {
                            window.open('orderlist.php?print='+String(id), '_self')
                        }, 2000)
                    }
                    xhr.removeEventListener("load", handleLoad);
                } else {
                    console.error("Fehler bei der Anfrage. Statuscode: " + xhr.status);
                    fadeToggle("div2");
                    fadeToggle("div_error");
                }
            }
            xhr.addEventListener("load", handleLoad);

            xhr.send();
        }

        function menu() {
            fadeToggle("div1");
            fadeToggle("div3");
        }

        function menu_error() {
            fadeToggle("div1");
            fadeToggle("div_error");
        }

        function userchoice() {
            window.open('create.php?username='+document.getElementById("select_username").value+'&id='+String(id), '_self');
        }
    </script>
</head>
<body>
    <div class="div active" id="div1" style="display: flex;">
        <h1 class="text">Willkommen bei der Bestellungs Statusanzeige</h1><br>
        <button class="btn" style="background-color: #AF4C4C" onclick="createAccount()">Print Benutzer erstellen</button><br>
        <button class="btn" onclick="loginAccount()">Mit Print Benutzer anmelden</button>
    </div>
    <div class="div" id="div2" style="display: none;">
        <img src="time.gif" style="width: 100px; height: 100px">
        <h1 class="text">Bitte folgen sie den Anweisungen vom Fingerprintsensor</h1>
    </div>
    <div class="div" id="div3" style="display: none;">
        <img src="check.gif" style="width: 100px; height: 100px">
        <h1 class="text">Print erfolgreich gelesen!</h1>
        <h1 class="text">Bitte wähle deinen Bestellen-Account aus:</h1>
        <select id="select_username" onchange="userchoice()">
        <option value="" selected disabled></option>
<?php
require_once "../config/config.php";
$query = 'SELECT * FROM `users`';
$result = mysqli_query($link, $query);
$num_rows = mysqli_num_rows($result);
if ($num_rows > 0) {
  foreach ($result as $zeile) {
    echo "<option>".$zeile['username']."</option>";
  }
}
?>
        </select>
    </div>
    <div class="div" id="div4" style="display: none;">
        <img src="check.gif" style="width: 100px; height: 100px">
        <h1 class="text">Anmeldung erfolgreich!</h1>
    </div>
    <div class="div" id="div_error" style="display: none;">
        <img src="delete.gif" style="width: 100px; height: 100px">
        <h1 class="text">Kein Benutzer gefunden!</h1>
        <button class="btn" onclick="menu_error()">Okay!</button>
    </div>
</body>
</html>