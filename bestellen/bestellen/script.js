let cart = [];
let total = 0;
let before = "";
let rabatt = 0;

function tablechange() {
    var current = $('#tisch').val();
    if (current != "") {
        $('#tisch').css('color','black');
    } else {
        $('#tisch').css('color','gray');
    }
}

function startup(artikel) {
    const anzElement = document.getElementById("anz_"+artikel);
    anzElement.disabled = false;
}

function startup_btn() {
    document.getElementById("btn").disabled = true;
}

function checkCart(artikel, preis) {
    let insite = false;
    for (const item of cart) {
        if (item.name == artikel) {
            insite = true;
            break;
        }
    }
    const buttonElement = document.getElementById(artikel);
    const anzElement = document.getElementById("anz_"+artikel);
    if (insite) {
        buttonElement.style.borderColor = "#81c06c";
        buttonElement.textContent = "Im Warenkorb";
        buttonElement.onclick = function () {
            removeFromCartByName(artikel);
        };
        anzElement.disabled = true;
    } else {
        buttonElement.style.borderColor = "#c0c0c0";
        buttonElement.textContent = "In den Warenkorb";
        buttonElement.onclick = function () {
            addToCart(artikel, preis);
        };
        anzElement.disabled = false;
    }
    if (cart.length == 0) {
        document.getElementById("btn").textContent = "Einkaufswagen ist leer";
        document.getElementById("btn").disabled = true;
    } else {
        var ins = 0;
        for (const item of cart) {
            ins = ins + parseInt(item.anz)
        }
        document.getElementById("btn").textContent = "Jetzt Bestellen ("+ins.toString()+") - "+total.toFixed(2)+"€";
        document.getElementById("btn").disabled = false;
    }
}

function checkout() {
    const name = document.getElementById("name")
    let tisch = "";
    const selectElement = document.getElementById("tisch");
    const modal_main = document.getElementById("modal_main");
    const modal_extra = document.getElementById("modal_extra");
    try {
        if (selectElement == null) {
            tisch = "nl"
        } else {
            if (selectElement.value == "") {
                tisch = "lr"
            }
        }
    } catch (error) {
        tisch = "nl"
    }
    if (name.value == "") {
        console.log("Kein Name angegeben");
    } else if (tisch == "lr") {
        console.log("Kein Tisch ausgewählt");
    } else {
        $.ajax({
        url: 'check-open.php',
        success: function(data) {
            $('.result').html(data);
            if(data.toString() == "Geschlossen") {
                modal_extra.innerHTML = '<h5 class="u-align-left u-text u-text-1" style="color: #db545a;">Ihre Bestellung konnte nicht gesendet werden, da wir geschlossen haben</h5>';
                modal_extra.style.display = 'block';
                modal_main.style.display = 'none';
            } else {
                products = "";
                for (const item of cart) {
                    products = products + item.anz + "x " + item.name + "<br>";
                    $.ajax({
                    url: 'edit-lager.php?artikel='+item.name+'&anz='+item.anz
                    })
                }
                if (tisch != "nl") {
                    tisch = "- " + selectElement.value;
                } else {
                    tisch = "- Kein Tisch angegeben"
                }
                var rabattInDezimal = rabatt / 100;
                var rabattBetrag = total * rabattInDezimal;
                total = total - rabattBetrag;
                total = total.toFixed(2)
                if (total < 0.00) {
                    total = 0.00
                }
                const string_cart = JSON.stringify(cart);
                $.ajax({
                    url: 'send-order.php?name='+name.value+'&total='+total+'&tisch='+tisch+'&produkte='+products+'&cart='+string_cart,
                    success: function(data) {
                    $('.result').html(data);
                        modal_extra.innerHTML = '<h5 class="u-align-left u-text u-text-1" style="color: #2bccc4;">Ihre Bestellung wurde gesendet</h5><a class="u-btn u-btn-submit u-button-style" href="../tracking/index.php?id='+data.toString()+'">Bestellung tracken</a><a class="u-btn u-btn-submit u-button-style" href="../bewerten/index.php">Jetzt Bewerten</a>';
                        modal_extra.style.display = 'block';
                        modal_main.style.display = 'none';
                    }
                });
            }
        }
        });
    }
}

function addToCart(productName, price, img_file) {
    const anzElement = document.getElementById("anz_"+productName);
    if (anzElement.value <= 0) {
        alert("Die Anzahl darf nicht 0 oder kleiner sein")
    } else if (anzElement.value > parseInt(anzElement.max)) {
        alert("Der Artikel ist nur noch "+anzElement.max+" mal verfügbar")
    } else {
        cart.push({ name: productName, price: price, anz: anzElement.value, img: img_file });
        total += anzElement.value * price;
        checkCart(productName, price)
    }
}

function removeFromCartByName(productName) {
    const index = cart.findIndex(item => item.name === productName);
    if (index !== -1) {
        const removedItem = cart.splice(index, 1)[0];
        total -= removedItem.anz * removedItem.price;
        checkCart(productName, removedItem.price)
    }
}

function rabatt_check() {
    const rabattfeld = document.getElementById("rabatt");
    if (rabattfeld.value != "") {
        $.ajax({
        url: 'check-code.php?code='+rabattfeld.value,
        success: function(data) {
        $('.result').html(data);
            if (data == "0") {
                alert("Ungültiger Rabattcode")
                rabattfeld.value = ""
                rabatt = 0
            } else {
                rabatt = parseInt(data)
                alert("Du erhältst beim Checkout "+data+"€ Rabatt")
            }
            }
        });
    }
}

function getList() {
    let number = 0;
    const list = document.getElementById("productlist");
    list.innerHTML = "";
    const modal_main = document.getElementById("modal_main");
    const modal_extra = document.getElementById("modal_extra");
    modal_extra.style.display = 'none';
    modal_main.style.display = 'block'; 
    cart.forEach(product => {
        number = number + 1;
        const newDiv = document.createElement("div");
        newDiv.className = "u-container-style u-list-item u-palette-5-light-2 u-repeater-item u-list-item-"+number.toString();
        newDiv.innerHTML = `
        <div class="u-container-layout u-similar-container u-container-layout-${number.toString()}">
            <p class="u-align-center u-text u-text-2">${product.anz}x ${product.name}</p>
            <img class="u-image u-image-default u-preserve-proportions u-image-1" src="${product.img}" alt="" data-image-width="128" data-image-height="128">
            <p class="u-align-center u-text u-text-3">${product.price.toFixed(2)}€</p>
        </div>
        `;
        list.appendChild(newDiv);
    })
}