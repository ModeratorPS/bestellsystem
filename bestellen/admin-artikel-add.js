let input12 = document.getElementById('input12');
input12.addEventListener("change", function () {
    let input12_value = document.getElementById('input12').value;
    alert("Du hast die Bedingung zu "+input12_value+" geändert!")
    if (input12_value == "Keine") {
        alert("Es ist keine Verifizierung erforderlich!")
        document.getElementById("input13").value="";
    } else if (input12_value == "Leicht") {
        alert("Der User muss einen Account besitzen!")
        document.getElementById("input13").value="";
    } else if (input12_value == "Mittel") {
        let alter = prompt("Wie alt muss der User sein, um diesen Artikel kaufen zu können? (Jahre)")
        alert("Der User muss "+alter+" Jahre alt sein, um diesen Artikel kaufen zu können!")
        document.getElementById("input13").value=alter;
    } else if (input12_value == "Stark") {
        let alter = prompt("Wie alt muss der User sein, um diesen Artikel kaufen zu können? (Jahre)")
        alert("Der User muss "+alter+" Jahre alt sein und muss einen Account besitzen, um diesen Artikel kaufen zu können!")
        document.getElementById("input13").value=alter;
    } else if (input12_value == "Ultra") {
        let passwort = prompt("Lege ein Passwort fest, um diesen Artikel kaufen zu können:")
        alert("Der User muss das Passwort "+passwort+" eingeben!")
        document.getElementById("input13").value=passwort;
    }
});