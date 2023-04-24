<?php
// Initialize the session
session_start();
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

$enabled = True;
 
// Processing form data when form is submitted
if($enabled == True){

    $ps_username = str_replace("%20", " ", $_GET["username"]);
    $ps_passwort = str_replace("%20", " ", $_GET["password"]);
 
    // Check if username is empty
    if(trim($ps_username) == "Username"){
        $username_err = "Es ist kein Username definiert! Bitte definiere den Username beim Kurzbefehl oben in dem Textfeld!";
    } else{
        $username = trim($ps_username);
        // Check if password is empty
        if(trim($ps_passwort) == "Passwort"){
            $password_err = "Es ist kein Passwort definiert! Bitte definiere das Passwort beim Kurzbefehl oben in dem Textfeld!";
        } else{
            $password = trim($ps_passwort);
        }
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            

                            $sql1 = "SELECT * FROM `status_rst`";
                            $db_erg1 = mysqli_query( $link, $sql1 );
                            while ($zeile = mysqli_fetch_array( $db_erg1, MYSQLI_ASSOC))
                            {
                                if ($zeile['Status'] == "Geschlossen") {
                                    echo 'Leider haben wir geschlossen! Schau doch wann anders nochmal vorbei!';
                                }
                                if ($zeile['Status'] == "Geöffnet") {
                                    echo 'Willkommen bei '.$RESTAURANT_NAME.'!';
                                }
                            }
                        } else{
                            // Password is not valid, display a generic error message
                            $password_err = "Falsches Passwort! Bitte checke nochmal deine Config!";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $username_err = "Unbekannter Nutzername! Bitte checke nochmal deine Config!";
                }
            } else{
                echo "Oops! Leider ist ein Fehler unterlaufen! Bitte versuche es später erneut!";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    echo $password_err;
    echo $username_err;
    echo $login_err;

    // Close connection
    mysqli_close($link);
}
?>