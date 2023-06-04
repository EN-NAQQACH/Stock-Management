var jq = jQuery.noConflict();
function selectid() {
  var x = document.getElementById("Client").value;
  if (x === "") {
    document.getElementById("nomField").value = "";
  } else {
    jq.ajax({
      url: "../easly/fetch_data.php",
      method: "POST",
      data: {
        id: x,
      },
      dataType: "JSON",
      success: function (data) {
        if (data.Nom) {
          document.getElementById("nomField").value = data.Nom;
        } else {
          document.getElementById("nomField").value = "";
        }
      },
    });
  }
}
document.getElementById("Client").addEventListener("input", selectid);
//Display data from modal to input field
function displayRowValues(row) {
  var cells = row.getElementsByTagName("td"); // Get all cells in the clicked row
  var id = cells[0].innerText;
  document.getElementById("Client").value = id;
  // Call the selectid() function to perform additional actions based on the updated input value
  selectid();
  // Add the "selected" class to the clicked row
  row.classList.add("selected");
  // Close the modal
  var closeButton = document.querySelector("#exampleModal .close");
  closeButton.click();
}


var jqq = jQuery.noConflict();
function selectidproduct() {
  var xx = document.getElementById("Product").value;
  if (xx === "") {
    document.getElementById("NomField").value = "";
    document.getElementById("PrixField").value = "";
    document.getElementById("TotalField").value = "";
    document.getElementById("QuantiteField").value = "";
  } else {
    jqq.ajax({
      url: "../easly/fetch_data_produit.php",
      method: "POST",
      data: {
        id: xx,
      },
      dataType: "JSON",
      success: function (data) {
        if (data.Nom && data.prix) {
          document.getElementById("NomField").value = data.Nom;
          document.getElementById("PrixField").value = data.prix;
          calculateTotal();
        } else {
          document.getElementById("NomField").value = "";
          document.getElementById("PrixField").value = "";
        }
      },
    });
  }
}
document.getElementById("Product").addEventListener("input", selectidproduct);
//Display data from modal to input field

function displayProductValues(row) {
    var cells = row.getElementsByTagName("td"); // Get all cells in the clicked row
    var id = cells[0].innerText;
    document.getElementById("Product").value = id;
    // Call the selectid() function to perform additional actions based on the updated input value
    selectidproduct();
    // Add the "selected" class to the clicked row
    // Close the modal
    var closeButton = document.querySelector("#productdata .close");
    closeButton.click();
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

  if (
    productId === "" ||
    productName === "" ||
    price === "" ||
    quantity === "" ||
    total === ""
  ) {
    // Check if any of the fields are empty before adding the row
    return;
  }

  /*var table = document.getElementById("myTable");

    // Check if the product ID already exists in the table
    var existingRow = Array.from(table.rows).find(function(row) {
        return row.cells[0].innerHTML === productId;
    });

    if (existingRow) {
        // If the product ID already exists, display an alert or perform any desired action
        alert("Product ID already added.");
        return;
    }*/
  var table = document.getElementById("myTable"); // Get the table element

  // Check if the product ID already exists in the table
  var existingRow = Array.from(table.getElementsByTagName("tr"))
    .slice(1) // Exclude the first row (header row)
    .find(
      (row) => row.querySelector("input[name='idar[]']").value === productId
    );

  if (existingRow) {
    if (alert("Le produit existe déjà ! Do you want to proceed?")) {
      existingRow.remove();
    }
    existingRow.remove(); // Remove the existing row
  }

  var row = document.createElement("tr");

  var productIdCell = document.createElement("td");
  var productIdInput = document.createElement("input");
  productIdInput.setAttribute("class", "form-control");
  productIdInput.type = "text";
  productIdInput.name = "idar[]";
  productIdInput.value = productId;
  productIdCell.appendChild(productIdInput);
  productIdCell.setAttribute("style", "border:1px solid #ddd;");

  var productNameCell = document.createElement("td");
  var productNameInput = document.createElement("input");
  productNameInput.type = "text";
  productNameInput.setAttribute("class", "form-control");
  productNameInput.name = "Nom[]";
  productNameInput.value = productName;
  productNameCell.appendChild(productNameInput);
  productNameCell.setAttribute("style", "border:1px solid #ddd;");

  var priceCell = document.createElement("td");
  var priceInput = document.createElement("input");
  priceInput.type = "text";
  priceInput.setAttribute("class", "form-control");
  priceInput.name = "prix[]";
  priceInput.value = price;
  priceCell.appendChild(priceInput);
  priceCell.setAttribute("style", "border:1px solid #ddd;");

  var quantityCell = document.createElement("td");
  var quantityInput = document.createElement("input");
  quantityInput.type = "text";
  quantityInput.setAttribute("class", "form-control");
  quantityInput.name = "Qty[]";
  quantityInput.value = quantity;
  quantityCell.appendChild(quantityInput);
  quantityCell.setAttribute("style", "border:1px solid #ddd;");

  var totalCell = document.createElement("td");
  var totalInput = document.createElement("input");
  totalInput.type = "text";
  totalInput.setAttribute("class", "form-control");
  totalInput.name = "ttl[]";
  totalInput.value = total;
  totalCell.appendChild(totalInput);
  totalCell.setAttribute("style", "border:1px solid #ddd;");

  var removeButtonCell = document.createElement("td");
  removeButtonCell.setAttribute(
    "style",
    "border:1px solid #ddd;display:flex;justify-content: center;align-items: center;"
  );
  var removeButton = document.createElement("button");
  removeButton.setAttribute("type", "button");
  removeButton.setAttribute("class", "btn btn-outline-danger");
  removeButton.innerHTML = "<i class='bx bx-x-circle'></i>";
  removeButton.addEventListener("click", function () {
    table.removeChild(row);
  });
  removeButtonCell.appendChild(removeButton);

  row.appendChild(productIdCell);
  row.appendChild(productNameCell);
  row.appendChild(priceCell);
  row.appendChild(quantityCell);
  row.appendChild(totalCell);
  row.appendChild(removeButtonCell);

  table.appendChild(row);

  // Clear the input fields after adding the row
  document.getElementById("Product").value = "";
  document.getElementById("NomField").value = "";
  document.getElementById("PrixField").value = "";
  document.getElementById("QuantiteField").value = "";
  document.getElementById("TotalField").value = "";
}
