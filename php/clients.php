<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Dashboard.css">
        <!--bootstrap-->
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
        crossorigin="anonymous"
      />
      <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <title>Document</title>
</head>
<body>
  <section class="side-bar" id="navbar">
    <div class="logo">
      <span><h4>Easly</h4></span>
    </div>
    <nav class="nav">
      <div class="nav-links">
        <a href="../html/Dashboard.html" class="nav-link" data-page="dashboard">
          <i class="bx bxs-dashboard icon-link" id="icons"></i>
          <span class="name">Tableau de bord</span>
        </a>
        <a href="../php/produits.php" class="nav-link">
          <i class="bx bx-package icon-link" id="icons"></i>
          <span class="name">Produit</span>
        </a>
        <a href="../php/clients.php" class="nav-link">
          <i class="bx bx-user icon-link" id="icons"></i>
          <span class="name">Clients</span>
        </a>
        <a href="order.html" class="nav-link">
          <i class="bx bx-receipt icon-link" id="icons"></i>
          <span class="name">Commandes</span>
        </a>
        <a href="vente.html" class="nav-link">
          <i class="bx bx-cart-add icon-link" id="icons"></i>
          <span class="name">Vente</span>
        </a>
        <a href="fornisseur.html" class="nav-link">
          <i class="bx bxs-store icon-link" id="icons"></i>
          <span class="name">Fornisseur</span>
        </a>
        <a href="#" class="nav-link">
          <i class="bx bx-log-out icon-link" id="icons"></i>
          <span>Déconnexion</span>
        </a>
      </div>
    </nav>
  </section>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class="bx bx-menu sidebarBtn"></i>
        <span class="dashboard">Dashboard</span>
      </div>
    </nav>
    <div class="home-content" id="contentall">
    <h4 style="margin-top: 10px;">Liste de clients</h4>
    <button type="button" class="btn btn-primary" style="background-color:#394867;border: #394867;" data-toggle="modal" id="btnedit" data-target="#fullcontent">Ajouter</button>
            <div class="tables" style="margin-top: 10px;">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>0645039258</td>
                        <td>agadir</td>
                        <td>
                          <button type="button" class="btn btn-primary" style="background-color: #697ea9;border: #697ea9;" data-toggle="modal" id="btnedit" data-target="#fullcontent"><i class='bx bx-pencil' ></i></button>
                          <button type="button" class="btn btn-primary" style="background-color: #ff6060;border: #ED2B2A;"><i class='bx bx-x-circle'></i></i></button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>0645039258t</td>
                        <td>salé</td>
                        <td>
                          <button type="button" class="btn btn-primary" style="background-color: #697ea9;border: #697ea9;" data-toggle="modal" id="btnedit" data-target="#fullcontent"><i class='bx bx-pencil' ></i></button>
                          <button type="button" class="btn btn-primary" style="background-color: #ff6060;border: #ED2B2A;"><i class='bx bx-x-circle'></i></i></button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td >Larry the Bird</td>
                        <td>Thornton</td>
                        <td>0645039258r</td>
                        <td >Lnador</td>
                        <td >
                          <button type="button" class="btn btn-primary" style="background-color: #697ea9;border: #697ea9;" data-toggle="modal" id="btnedit" data-target="#fullcontent"><i class='bx bx-pencil' ></i></button>
                          <button type="button" class="btn btn-primary" style="background-color: #ff6060;border: #ED2B2A;"><i class='bx bx-x-circle'></i></i></button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">4</th>
                        <td >Larry the Bird</td>
                        <td>Thornton</td>
                        <td>0645039258</td>
                        <td >marrakech</td>
                        <td >
                          <button type="button" class="btn btn-primary" style="background-color: #697ea9;border: #697ea9;" data-toggle="modal" id="btnedit" data-target="#fullcontent"><i class='bx bx-pencil' ></i></button>
                          <button type="button" class="btn btn-primary" style="background-color: #ff6060;border: #ED2B2A;"><i class='bx bx-x-circle'></i></i></button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">5</th>
                        <td >Larry the Bird</td>
                        <td>Thornton</td>
                        <td>0645039258</td>
                        <td>safi</td>
                        <td>
                          <button type="button" class="btn btn-primary" style="background-color: #697ea9;border: #697ea9;" data-toggle="modal" id="btnedit" data-target="#fullcontent"><i class='bx bx-pencil' ></i></button>
                          <button type="button" class="btn btn-primary" style="background-color: #ff6060;border: #ED2B2A;"><i class='bx bx-x-circle'></i></i></button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">6</th>
                        <td >Larry the Bird</td>
                        <td>Thornton</td>
                        <td>0645039258</td>
                        <td >beni mellal</td>
                        <td>
                          <button type="button" class="btn btn-primary" style="background-color: #697ea9;border: #697ea9;" data-toggle="modal" id="btnedit" data-target="#fullcontent"><i class='bx bx-pencil' ></i></button>
                          <button type="button" class="btn btn-primary" style="background-color: #ff6060;border: #ED2B2A;"><i class='bx bx-x-circle'></i></i></button>
                        </td>
                      </tr>    
                    </tbody>
                  </table>
            </div>

</div>





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
          <form>
            <div class="form-group">
              <label for="formGroupExampleInput">Nom</label>
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="nom_article">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Prénom</label>
              <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Catégorie">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Téléphone</label>
              <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Quantité">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Adresse</label>
              <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Prix_unitaire">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <style>
    .form-group{
      margin:8px;
    }
    .form-group label{
      padding-bottom: 4px;
    }
    .modal-footer .btn.btn-primary{
      background-color:#536486;
      border: #536486;
    }
    .modal-footer .btn.btn-primary:hover{
      background-color:#394867;
      border: #394867;
    }


  </style>
<!-- Button trigger modal -->
<script src="../js/Script.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>
</html>