# Bestellsystem V4.0.0

> **Warning**<br>
> Dies ist die letzte Version vom Bestellsystem und die Entwicklung wurde eingestellt!

![site-home](screenshots/order_page_1.png)
![site-home](screenshots/order_page_2.png)
![site-home](screenshots/account_page.png)
![site-home](screenshots/admin_page_1.png)
![site-home](screenshots/admin_page_2.png)

## 1. Setup
> **Note**<br>
> **Benötigt für das Bestellsystem:**
> - Webserver für die Website<br>
> - PHP Datenbank
### 1.1 Upload
Lege den Ordner **bestellen** auf deinen Webserver.
### 1.2 Setup Datenbank / Website
Bearbeite folgende Datei und füge dort deine Datenbankzugangsdaten ein:<br>
**/bestellen/config/config.php**<br>
Lade ebenfalls die Datei **database.sql** in deinem Datenbanksystem hoch, um die nötigen Tabellen zu importieren.
Um einen Admin Account zu erstellen, befolge folgende Schritte:<br>
1. Erstelle dir einen Account über die "Registrieren" Seite
2. Gehe in dein Datenbanksystem und öffne die Tabelle **users**
3. Finde die Zeile mit deinem Account und ändere dort in der Spalte "bewerten_rang" die Bezeichnung von "Mitglied" zu "Admin"
## 2. Admin
Besuche diese Website erst, wenn du das Setup abgeschlossen hast!<br>
Die Admin Seite findest du unter http://**deine_domain.de**/bestellen/admin/index.php<br>
Logge dich dort mit deinem Admin Account ein!<br>
#### Viel Spaß beim nutzen vom System!