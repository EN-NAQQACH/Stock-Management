
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <title>Document</title>
</head>

    
  <!-- Modal -->
  <div class="modal fade" id="fullcontent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Clients</h5>
            <div class="close" data-dismiss="modal" id="btnedit" aria-label="Close">
              <span aria-hidden="true" style="font-size: 20px;cursor: pointer;">&times;</span>
            </div>
          </div>
          <div class="modal-body">
            <form method="post" action="../client/Add.php">
              <div class="form-group">
                <label for="formGroupExampleInput">Nom</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nom Client" name="Nom" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Prénom</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Prénom" name="Prenom" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Téléphone</label>
                <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Téléphone" name="Telephone" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Adresse</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Adresse" name="Adress" autocomplete="off">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
    <style>
      .form-group {
        margin: 8px;
      }

      .form-group label {
        padding-bottom: 4px;
      }

      .modal-footer .btn.btn-primary {
        background-color: #536486;
        border: #536486;
      }

      .modal-footer .btn.btn-primary:hover {
        background-color: #12192c;
        border: #394867;
      }
    </style>

  
  