<?php
require_once "../config/config.php";
$id = str_replace("%20", " ", $_GET['id']);
$username = str_replace("%20", " ", $_GET['username']);
$query = "INSERT INTO `fingerprint` (`printid`, `name`) VALUES ('$id','$username')";
$result = mysqli_query($link, $query);
?>
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
</head>
<body>
    <div class="div active" style="display: flex;">
        <img src="check.gif" style="width: 100px; height: 100px">
        <h1 class="text">Printaccount erfolgreich erstellt!</h1>
        <a href="fingerprint.php" class="btn">Okay!</a>
    </div>
</body>
</html>