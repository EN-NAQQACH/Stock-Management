var je = jQuery.noConflict();
function deleterow(id) {
  je.ajax({
    url: '../CommandeFornisseur/function.php',
    method: 'POST',
    data: {
      id: id,
      action: 'delete'
    },
    dataType: 'JSON',
    success: function(response) {
      if (response == 1) {
        alert("Row deleted");
        document.getElementById(id).style.display = "none";
      } else if (response == 0) {
        alert("Error");
      }
    }
  });
}
