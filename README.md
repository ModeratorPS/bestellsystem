# Bestellsystem V3.1
## 1. Funktionen vom Bestellsystem
🟩: Feature hinzugefügt <br>
🟨: Feature geändert<br>
🟧: Feature vorerst deaktiviert<br>
🟥: Feature gelöscht<br>
🚨: Bug erkannt<br>
☑️: Bug behoben<br>

### Version 1.0 - Das Bestellsystem
🟩 Bestellen von Artikeln in der Datenbank<br>
🟩 Abrufen der Bestellung über die Datenbank<br>


### Version 1.1
🟨 Abrufen der Bestellung über eine Adminsite<br>
🟩 Zusatz bei Bestellungen<br>


### Version 1.2
🟩 Bewerten Feature wurde hinzugefügt<br>
🚨 Beim erneut öffnen der Website wird die Bestellung erneut gesendet<br>


### Version 2.0 - Es wird immer einfacher
🟨 Zum Bewerten wird ein Account benötigt<br>
🟩 Artikel können über die Adminwebsite hinzugefügt / gelöscht werden<br>
🟩 Einkaufswagen wurde hinzugefügt<br>


### Version 2.1
🟩 Neues Design<br>
🟩 Easy Setup / Resetup Button<br>
🟩 Open / Close Anzeige<br>


### Version 2.2
🟩 Account Passwort zurücksetzen Feature<br>
🚨 Der Einkaufswagen löst Fehler beim Design der Website aus<br>
🟧 Der Einkaufswagen wurde vorerst deaktiviert<br>


### Version 2.3
🟨 Bestellung wird in folgende Kategorien eingeteilt:<br>
 Bestellt<br>
 In Bearbeitung<br>
 Auf dem Weg<br>
 Fertig<br>
🟨 Bearbeiten der Bestellung im 4 Schritten:<br>
 Claimen<br>
 Bearbeiten<br>
 Zustellen<br>
 Fertig klicken<br>


### Version 2.4
🟩 Bestellung kann nun getrackt werden<br>
🟩 Bestellung kann über das Tracking storniert werden<br>
🟩 Du kannst dir eine Bestellbestätigung per E-Mail senden lassen<br>


### Version 2.5
🟨 Bestellung senden Design angepasst<br>


### Version 3.0 - Level sammeln und Checkout
🟩 Der Bezahlbetrag wird auf den Namen der Person gespeichert<br>
🟩 Du kannst durch bestellen Level sammeln, mit welchen du bezahlen kannst<br>
🟩 Du kannst bezahlen über die Checkouts in Bar/Karte oder mit deinen Leveln (1 Level = 20ct)<br>
🟥 Der Einkaufswagen wurde komplett gelöscht<br>
☑️ Bug mit dem Einkaufswagen behoben<br>
🟩 Übersicht der Produkte über die Startseite<br>
🟩 Kidsmode wurde hinzugefügt<br>
🟨 Bei Getränken kann die Tassengröße ausgewählt werden<br>

### Version 3.1
🟩 Es gibt eine Show Site, welche auf Kiosk Bildschirmen angezeigt werden kann<br>
🟨 Login Design angepasst<br>

### Version 3.2
🚨 Auf den Bewerten Seiten funktionieren die Links im Menü nicht<br>
🟩 Du kannst Artikel mehr beschreiben / modifizieren<br>
☑️ "Beim erneut öffnen der Website wird die Bestellung erneut gesendet" wurde behoben<br>
🟩 Mehr Funktionen beim Account
## 2. Setup
> **Note**<br>
> **Benötigt für das Bestellsystem:**
> - Webserver für die Website<br>
> - PHP Datenbank
### 2.1 Upload
Lade die Datei **bestellen.zip** auf deinen Webserver hoch und entpacke die Datei auf deiner Website.<br>
**oder**<br>
lege den Ordner bestellen auf deinen Webserver.
### 2.2 Setup Datenbank / Website
Besuche nun deine Website unter:<br>
**www.deine_domain.de**/bestellen/<br>
Du wirst nun automatisch auf diese Seite weitergeleitet:<br>
![alt text](setup_1.png)<br>
**DB_HOST:** Die Host Adresse deines Hosts.<br>
**DB_USER:** Dein Datenbank Nutzername.<br>
**DB_PASSWORD:** Dein Datenbank Password.<br>
**DB_NAME:** Der Name deiner Datenbank.<br>
**RESTAURANT_NAME:** Der Name deines Restaurants.<br>
**DB_NAME:** Der Name deiner Datenbank.<br>
**MAIL_NEWS:** Denke dir eine E-Mail Adresse aus, mit welcher News gesendet werden. (z.b. news@restaurant.de)<br>
**MAIL_NEWS_LINK:** Der Link zu der Startseite von deinem Restaurant. (z.b. http://**deine_domain.de**/bestellen/)<br>
**MAIL_RECHNUNG:** Denke dir eine E-Mail Adresse aus, mit welcher die Rechnungen gesendet werden. (z.b. rechnung@restaurant.de)<br>
**LINK_TRACKEN:** Schreibe in dieses Feld folgendes rein: (Ersetze das Fette nur mit deiner Domain) http://**deine_domain.de**/bestellen/tracking.php<br>
**LINK_BEWERTEN:** Schreibe in dieses Feld folgendes rein: (Ersetze das Fette nur mit deiner Domain) http://**deine_domain.de**/bestellen/bewerten/<br>
**PASSWORT_ADMIN:** Denke dir ein Admin Passwort aus und schreibe es dort hinein.<br>
**SHOW_lightgreen:** Bis wann soll beim Show Bildschirm, die Wartezeit Hellgrün sein. (Schreibe hier eine Zahl in Minuten rein)<br>
**SHOW_darkgreen:** Bis wann soll beim Show Bildschirm, die Wartezeit Dunkelgrün sein. (Schreibe hier eine Zahl in Minuten rein)<br>
**SHOW_orange:** Bis wann soll beim Show Bildschirm, die Wartezeit Orange sein. (Schreibe hier eine Zahl in Minuten rein)<br>
**SHOW_darkorange:** Bis wann soll beim Show Bildschirm, die Wartezeit Dunkelorange sein. (Schreibe hier eine Zahl in Minuten rein)<br>
**SHOW_red:** Bis wann soll beim Show Bildschirm, die Wartezeit Rot sein. (Schreibe hier eine Zahl in Minuten rein)
> Alles über der Roten Zahl wird Dunkelrot!
## 3. Admin
Die Admin Seite findest du unter http://**deine_domain.de**/bestellen/admin.php<br>
Logge dich dort mit deinem Passwort ein!<br>
#### Viel Spaß beim nutzen vom System!
#### Fragen kannst du hier stellen: https://discord.gg/htr5JHV7FD oder unter der E-Mail Adresse moderatorps@gmail.com
