<?php
session_start();
include '../php/connexion.php';
include '../produits/Function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/Dashboard.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>Document</title>
</head>

<body>
  <!-- Modal 
  <div class="modal fade" id="fullcontent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Produit</h5>
          <div class="close" data-dismiss="modal" id="btnedit" aria-label="Close">
            <span aria-hidden="true" style="font-size: 20px;cursor: pointer;">&times;</span>
          </div>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="formGroupExampleInput">nom_article</label>
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="nom_article">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Catégorie</label>
              <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Catégorie">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Quantité</label>
              <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Quantité">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Prix_unitaire</label>
              <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Prix_unitaire">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Date_fabrication</label>
              <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Date_fabrication">
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


  </style>-->
  <!-- Button trigger modal -->

  <section class="side-bar" id="navbar">
    <div class="logo">
      <span>
        <h4>Easly</h4>
      </span>
    </div>
    <nav class="nav">
      <div class="nav-links">
        <a href="../php/Dashboard.php" class="nav-link" data-page="dashboard">
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
        <a href="../php/Commandes.php" class="nav-link">
          <i class="bx bx-receipt icon-link" id="icons"></i>
          <span class="name">Commandes</span>
        </a>
        <a href="../php/vente.php" class="nav-link">
          <i class="bx bx-cart-add icon-link" id="icons"></i>
          <span class="name">Vente</span>
        </a>
        <a href="../php/fornisseur.php" class="nav-link">
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
        <span class="dashboard">Produits</span>
      </div>
    </nav>
    <div class="home-content" id="contentall">
      <p>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="background-color: green;border: #394867;">
          Filter
        </button>
      </p>
      <div class="collapse" id="collapseExample" style="max-width: 700px;">
        <div class="card card-body">
          <form>
            <div class="row" style="margin-right:-55px;">
              <div class="col-md-3" style="margin:5px 0;">
                <input type="text" class="form-control" placeholder="nom or id ...">
              </div>
              <div class="col-md-3" style="margin:5px 0;">
                <input type="text" class="form-control" placeholder="date de début" onfocus="(this.type = 'date')" onblur="(this.type = 'text')">
              </div>
              <div class="col-md-3" style="margin:5px 0;">
                <input type="text" class="form-control" placeholder="date de fin" onfocus="(this.type = 'date')" onblur="(this.type = 'text')">
              </div>
              <div class="col-md-3" style="margin:5px 0;">
                <button type="submit" class="btn btn-primary" style="background-color: #12192c;border: #394867;"> recherche </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <h4 style="margin-top: 10px;">Liste de produits</h4>
      <a href="../produits/FormProduit.php" style="text-decoration: none;color: white;"><button type="button" class="btn btn-primary" style="background-color:#394867;border: #394867;" data-toggle="modal" data-target="#fullcontent">Ajouter</button></a>
      <div class="tables" style="margin-top: 10px;">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">nom_article</th>
              <th scope="col">Catégorie</th>
              <th scope="col">Quantité</th>
              <th scope="col">Prix_unitaire (DH)</th>
              <th scope="col">Date_fabrication</th>
              <th scope="col">action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $produits = gatProduct();
            if (!empty($produits) && is_array($produits)) {
              foreach ($produits as $key => $value) {
            ?>
                <tr>
                  <th scope="row"><?= $value['ID'] ?></th>
                  <td><?= $value['Nom_Article'] ?></td> <!-- value from database-->
                  <td><?= $value['Categorie'] ?></td> <!-- value from database-->
                  <td><?= $value['Quantite'] ?></td> <!-- value from database-->
                  <td><?= $value['PrixUnitaire'] ?></td> <!-- value from database-->
                  <td><?= $value['DateFabrication'] ?></td> <!-- value from database-->
                  <td>
                    <button type="button" class="btn btn-primary" style="background-color: #697ea9;border: #697ea9;" data-toggle="modal" id="btnedit" data-target="#fullcontent"><a href="../produits/FormProduit.php" style="text-decoration: none;color: white;"><i class='bx bx-pencil'></i></a></button>
                    <button type="button" class="btn btn-primary" style="background-color: #ff6060;border: #ED2B2A;"><a href="" style="text-decoration: none;color: white;"><i class='bx bx-x-circle'></i></a></button>
                  </td>
                </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
</body>

</html>

<?php
include '../php/script.php';
?>