var jq = jQuery.noConflict();

function selectid() {
    var x = document.getElementById('Client').value;
    if (x === '') {
        document.getElementById("nomField").value = "";
        document.getElementById("prenomField").value = "";
    } else {
        jq.ajax({
            url: '../php/fetch_data.php',
            method: 'POST',
            data: {
                id: x
            },
            dataType: 'JSON',
            success: function (data) {
                if (data.Nom && data.Prenom) {
                    document.getElementById("nomField").value = data.Nom;
                    document.getElementById("prenomField").value = data.Prenom;
                } else {
                    document.getElementById("nomField").value = "";
                    document.getElementById("prenomField").value = "";
                }
            }
        });
    }
}

var jqq = jQuery.noConflict();

function selectidproduct() {
    var xx = document.getElementById('Product').value;
    if (xx === '') {
        document.getElementById("NomField").value = "";
        document.getElementById("PrixField").value = "";
        document.getElementById("TotalField").value = "";
        document.getElementById("QuantiteField").value = "";
    } else {
        jqq.ajax({
            url: '../php/fetch_data_produit.php',
            method: 'POST',
            data: {
                id: xx
            },
            dataType: 'JSON',
            success: function (data) {
                if (data.Nom && data.prix) {
                    document.getElementById("NomField").value = data.Nom;
                    document.getElementById("PrixField").value = data.prix;
                    calculateTotal();
                } else {
                    document.getElementById("NomField").value = "";
                    document.getElementById("PrixField").value = "";
                }
            }
        });
    }
}
function calculateTotal() {
    var price = parseFloat(document.getElementById("PrixField").value);
    var quantity = parseFloat(document.getElementById("QuantiteField").value);
    if (!isNaN(price) && !isNaN(quantity)) {
        var total = price * quantity;
        document.getElementById("TotalField").value = total;
    }
}

