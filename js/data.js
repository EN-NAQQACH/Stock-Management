
var jt = jQuery.noConflict();
function selectfr() {
  var xe = document.getElementById("fornisseur").value;
  if (xe === "") {
    document.getElementById("nomField").value = "";
  } else {
    jt.ajax({
      url: "../easly/fetch-data-fr.php",
      method: "POST",
      data: {
        id: xe,
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
document.getElementById("fornisseur").addEventListener("input", selectfr);

//Display data from modal to input field
function display(row) {
  var cells = row.getElementsByTagName("td"); // Get all cells in the clicked row
  var id = cells[0].innerText;
  document.getElementById("fornisseur").value = id;
  // Call the selectid() function to perform additional actions based on the updated input value
  selectfr();
  // Add the "selected" class to the clicked row
  row.classList.add("selected");
  // Close the modal
  var closeButton = document.querySelector("#exampleModal .close");
  closeButton.click();
}


