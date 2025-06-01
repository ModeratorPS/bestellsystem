function getid() {
    const id = prompt("Bitte gebe die Bestellnummer ein: ");
    if (id == null) {
        location.href = "../startseite/index.php";
    } else if (id.trim() === "") {
        location.href = "index.php";
    } else {
        location.href = "index.php?id=" + encodeURIComponent(id);
    }
}
