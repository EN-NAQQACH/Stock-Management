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

function addRow() {
    var productId = document.getElementById("Product").value;
    var productName = document.getElementById("NomField").value;
    var price = document.getElementById("PrixField").value;
    var quantity = document.getElementById("QuantiteField").value;
    var total = document.getElementById("TotalField").value;

    if (productId === '' || productName === '' || price === '' || quantity === '' || total === '') {
        // Check if any of the fields are empty before adding the row
        return;
    }

    var table = document.getElementById("myTable");

    // Check if the product ID already exists in the table
    var existingRow = Array.from(table.rows).find(function(row) {
        return row.cells[0].innerHTML === productId;
    });

    if (existingRow) {
        // If the product ID already exists, display an alert or perform any desired action
        alert("Product ID already added.");
        return;
    }

    var row = document.createElement("tr");

    var productIdCell = document.createElement("td");
    productIdCell.textContent = productId;
    productIdCell.setAttribute("style", "border:1px solid #ddd;");

    var productNameCell = document.createElement("td");
    productNameCell.textContent = productName;
    productNameCell.setAttribute("style", "border:1px solid #ddd;");

    var priceCell = document.createElement("td");
    priceCell.textContent = price;
    priceCell.setAttribute("style", "border:1px solid #ddd;");

    var quantityCell = document.createElement("td");
    quantityCell.textContent = quantity;
    quantityCell.setAttribute("style", "border:1px solid #ddd;");

    var totalCell = document.createElement("td");
    totalCell.textContent = total;
    totalCell.setAttribute("style", "border:1px solid #ddd;");

    row.appendChild(productIdCell);
    row.appendChild(productNameCell);
    row.appendChild(priceCell);
    row.appendChild(quantityCell);
    row.appendChild(totalCell);

    table.appendChild(row);

    // Clear the input fields after adding the row
    document.getElementById("Product").value = "";
    document.getElementById("NomField").value = "";
    document.getElementById("PrixField").value = "";
    document.getElementById("QuantiteField").value = "";
    document.getElementById("TotalField").value = "";
}
