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