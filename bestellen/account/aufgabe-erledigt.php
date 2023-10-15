<?php
require_once "../config/config.php";
 
session_start();

$input1 = $_GET['nr'];
$user = $_SESSION["username"];
$act = 'aufgabe_'.$input1;

$query2 = "SELECT * FROM `users` WHERE `username` = \"$user\"";
$result2 = mysqli_query($link, $query2);

while ($zeile = mysqli_fetch_array( $result2, MYSQLI_ASSOC)) {
    if ($zeile['bewerten_rang'] == 'Chef') {
        echo 'Teamler können nichts claimen! <a href="index-account.php">back</a>';
        exit;
    }
    if ($zeile['bewerten_rang'] == 'Admin') {
        echo 'Teamler können nichts claimen! <a href="index-account.php">back</a>';
        exit;
    }
    if ($zeile['bewerten_rang'] == 'Developer') {
        echo 'Teamler können nichts claimen! <a href="index-account.php">back</a>';
        exit;
    }
    if ($zeile['bewerten_rang'] == 'Manager') {
        echo 'Teamler können nichts claimen! <a href="index-account.php">back</a>';
        exit;
    }
    if ($zeile['bewerten_rang'] == 'Moderator') {
        echo 'Teamler können nichts claimen! <a href="index-account.php">back</a>';
        exit;
    }
    if ($zeile['bewerten_rang'] == 'Supporter') {
        echo 'Teamler können nichts claimen! <a href="index-account.php">back</a>';
        exit;
    }

    if ($zeile['bewerten_rang'] == null) {
        $rang = '2';
    } else {
        $num = $zeile['bewerten_rang'];
        $rang = $num + 2;
    }
}

$query = "UPDATE `users` SET `bewerten_rang`=\"$rang\", `$act`='True' WHERE `username` = \"$user\"";
$result = mysqli_query($link, $query);

header('location: index.php');
?>