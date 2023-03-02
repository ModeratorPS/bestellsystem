<h1>Abrufen</h1>
<form action="/bestellen/admin-step2.php" method="post" name="form">
<select id="input1" name="input1">
<?php
require_once "config.php";

$query = 'SELECT * FROM `bestellungen` WHERE `Status` = "0"';
$result = mysqli_query($link, $query); 
while($zeile = mysqli_fetch_array( $result, MYSQLI_ASSOC)) {
    echo '<option value="'.$zeile['Name'].'">'.$zeile['Name'].'</option>';  
}          
?> 
</select>
<input type="submit" name="submit" id="submit">
</form>