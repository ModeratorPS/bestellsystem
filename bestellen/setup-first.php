<form action="/bestellen/setup-first-senden.php" method="post" name="form">
<input value="<?php require_once "config.php"; echo $DB_HOST; ?>" type="text" placeholder="DB_HOST" id="input1" name="input1" required=""><br>
<input value="<?php require_once "config.php"; echo $DB_USER; ?>" type="text" placeholder="DB_USER" id="input2" name="input2" required=""><br>
<input value="<?php require_once "config.php"; echo $DB_PASSWORD; ?>" type="text" placeholder="DB_PASSWORD" id="input3" name="input3" required=""><br>
<input value="<?php require_once "config.php"; echo $DB_NAME; ?>" type="text" placeholder="DB_NAME" id="input4" name="input4" required=""><br>
<input value="<?php require_once "config.php"; echo $RESTAURANT_NAME; ?>" type="text" placeholder="RESTAURANT_NAME" id="input5" name="input5" required=""><br>
<input value="<?php require_once "config.php"; echo $MAIL_NEWS; ?>" type="text" placeholder="MAIL_NEWS" id="input6" name="input6" required=""><br>
<input value="<?php require_once "config.php"; echo $MAIL_NEWS_LINK; ?>" type="text" placeholder="MAIL_NEWS_LINK" id="input7" name="input7" required=""><br>
<input value="<?php require_once "config.php"; echo $MAIL_RECHNUNG; ?>" type="text" placeholder="MAIL_RECHNUNG" id="input8" name="input8" required=""><br>
<input value="<?php require_once "config.php"; echo $LINK_TRACKEN; ?>" type="text" placeholder="LINK_TRACKEN" id="input9" name="input9" required=""><br>
<input value="<?php require_once "config.php"; echo $LINK_BEWERTEN; ?>" type="text" placeholder="LINK_BEWERTEN" id="input10" name="input10" required=""><br>
<input value="<?php require_once "config.php"; echo $PASSWORT_ADMIN; ?>" type="text" placeholder="PASSWORT_ADMIN" id="input11" name="input11" required=""><br>
<input value="<?php require_once "config.php"; echo $SHOW_lightgreen; ?>" type="text" placeholder="SHOW_lightgreen" id="input12" name="input12" required=""><br>
<input value="<?php require_once "config.php"; echo $SHOW_darkgreen; ?>" type="text" placeholder="SHOW_darkgreen" id="input13" name="input13" required=""><br>
<input value="<?php require_once "config.php"; echo $SHOW_orange; ?>" type="text" placeholder="SHOW_orange" id="input14" name="input14" required=""><br>
<input value="<?php require_once "config.php"; echo $SHOW_darkorange; ?>" type="text" placeholder="SHOW_darkorange" id="input15" name="input15" required=""><br>
<input value="<?php require_once "config.php"; echo $SHOW_red; ?>" type="text" placeholder="SHOW_red" id="input16" name="input16" required=""><br>
<input type="submit" name="submit" id="submit">
</form>