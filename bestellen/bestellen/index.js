function val() {
    var cat = document.getElementById("cat").value;
    if (cat == 1) {
        document.getElementById("1_div").style.visibility = "visible";
        document.getElementById("1_div").style.display = "block";
        document.getElementById("2_div").style.visibility = "hidden";
        document.getElementById("2_div").style.display = "none";
        document.getElementById("3_div").style.visibility = "hidden";
        document.getElementById("3_div").style.display = "none";
        document.getElementById("4_div").style.visibility = "hidden";
        document.getElementById("4_div").style.display = "none";
        document.getElementById("5_div").style.visibility = "hidden";
        document.getElementById("5_div").style.display = "none";
    } else if (cat == 2) {
        document.getElementById("1_div").style.visibility = "hidden";
        document.getElementById("1_div").style.display = "none";
        document.getElementById("2_div").style.visibility = "visible";
        document.getElementById("2_div").style.display = "block";
        document.getElementById("3_div").style.visibility = "hidden";
        document.getElementById("3_div").style.display = "none";
        document.getElementById("4_div").style.visibility = "hidden";
        document.getElementById("4_div").style.display = "none";
        document.getElementById("5_div").style.visibility = "hidden";
        document.getElementById("5_div").style.display = "none";
    } else if (cat == 3) {
        document.getElementById("1_div").style.visibility = "hidden";
        document.getElementById("1_div").style.display = "none";
        document.getElementById("2_div").style.visibility = "hidden";
        document.getElementById("2_div").style.display = "none";
        document.getElementById("3_div").style.visibility = "visible";
        document.getElementById("3_div").style.display = "block";
        document.getElementById("4_div").style.visibility = "hidden";
        document.getElementById("4_div").style.display = "none";
        document.getElementById("5_div").style.visibility = "hidden";
        document.getElementById("5_div").style.display = "none";
    } else if (cat == 4) {
        document.getElementById("1_div").style.visibility = "hidden";
        document.getElementById("1_div").style.display = "none";
        document.getElementById("2_div").style.visibility = "hidden";
        document.getElementById("2_div").style.display = "none";
        document.getElementById("3_div").style.visibility = "hidden";
        document.getElementById("3_div").style.display = "none";
        document.getElementById("4_div").style.visibility = "visible";
        document.getElementById("4_div").style.display = "block";
        document.getElementById("5_div").style.visibility = "hidden";
        document.getElementById("5_div").style.display = "none";
    } else if (cat == 5) {
        document.getElementById("1_div").style.visibility = "hidden";
        document.getElementById("1_div").style.display = "none";
        document.getElementById("2_div").style.visibility = "hidden";
        document.getElementById("2_div").style.display = "none";
        document.getElementById("3_div").style.visibility = "hidden";
        document.getElementById("3_div").style.display = "none";
        document.getElementById("4_div").style.visibility = "hidden";
        document.getElementById("4_div").style.display = "none";
        document.getElementById("5_div").style.visibility = "visible";
        document.getElementById("5_div").style.display = "block";
    }
}