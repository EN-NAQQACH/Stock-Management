<?php
session_start();
include '../php/connexion.php';
include '../client/Function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/Dashboard.css">
  <!--bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>Document</title>
</head>

<body>
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
      <d iv class="sidebar-button">
        <i class="bx bx-menu sidebarBtn"></i>
        <span class="dashboard">Clients</span>
      </d>
    </nav>
    <div class="home-content" id="contentall">


      <div id="filterdiv" style="display: flex;justify-content: center;margin-right: 93px;margin-top: -10px;">
        <form method="post" action="../php/clients.php">
          <div class="row">
            <div class="col-md-9" style="margin:5px 0;">
              <input type="text" class="form-control" placeholder="Nom or Id, Prenom ..." name="filter_value">
            </div>
            <div class="col-md-3" style="margin:5px 0;">
              <button type="submit" class="btn btn-primary" style="background-color: #12192c;border: #394867;" name="recherchebtn" required> recherche </button>
            </div>
          </div>
        </form>
      </div>

      <div id="filterdiv2">
        <p>
          <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="background-color: green;border: #394867;">
            Filter
          </button>
        </p>
        <div class="collapse" id="collapseExample" style="max-width: 400px;margin-right: 18px;">
          <div class="card card-body">
            <form  method="post" action="../php/clients.php">
              <div class="row">
                <div class="col-md-8" style="margin:5px 0;">
                  <input type="text" class="form-control" placeholder="Nom or Id, Prenom ..." name="filter_value">
                </div>
                <div class="col-md-3" style="margin:5px 0;">
                  <button type="submit" class="btn btn-primary" style="background-color: #12192c;border: #394867;" name="recherchebtn"> recherche </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <?php
      $connection = mysqli_connect('localhost', 'root', '', 'gestion_stock');
      $sql = "SELECT * FROM client";
      $result = mysqli_query($connection, $sql);
      if (isset($_POST['recherchebtn'])) {
        $searchkey = $_POST['filter_value'];
        $sql = "SELECT * FROM client WHERE CONCAT (Nom, Prenom, Telephone, Address) LIKE '%$searchkey%'";
      } else {
        $sql = "SELECT * FROM client";
        $searchkey = "";
      }
      $result = mysqli_query($connection, $sql);
      ?>

      <h4 style="margin-top: 10px;">Liste de clients</h4>
      <form action="../client/export-Client-list-pdf.php" method="post">
      <button type="button" class="btn btn-primary" style="background-color:#394867;border: #394867;" data-toggle="modal" id="btnedit" data-target="#fullcontent"><a href="../client/FormClient.php" style="text-decoration: none;color: white;">Ajouter</a></button>
      <button type="submit" name="submit" class="btn btn-primary" style="background-color:#394867;border: #394867;" data-toggle="modal" id="btnedit" data-target="#fullcontent"><i class='bx bxs-file-pdf'></i> PDF</button>
      <!--<input type="submit" name="submit" value="EXPORT PDF">-->
      </form>
      <div class="tables" style="margin-top: 10px;" id="tabledatta">
        <table class="table table-hover" >
          <thead>
            <tr>
              <th scope="col"style="border:1px solid #ddd;background-color:white;">ID</th>
              <th scope="col" style="border:1px solid #ddd;background-color:white;">Nom</th>
              <th scope="col" style="border:1px solid #ddd;background-color:white;">Prénom</th>
              <th scope="col" style="border:1px solid #ddd;background-color:white;">Téléphone</th>
              <th scope="col" style="border:1px solid #ddd;background-color:white;">Adresse</th>
              <th scope="col" style="border:1px solid #ddd;text-align: center;background-color:white;">Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- gat data from database-->

            <?php

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_object($result)) { ?>
                <tr>
                  <th scope="row" style="border:1px solid #ddd;"><?php echo $row->ID ?></th>
                  <td style="border:1px solid #ddd;"><?php echo $row->Nom ?></td>
                  <td style="border:1px solid #ddd;"><?php echo $row->Prenom ?></td>
                  <td style="border:1px solid #ddd;"><?php echo $row->Telephone ?></td>
                  <td style="border:1px solid #ddd;"><?php echo $row->Address ?></td>
                  <td style="text-align: center;">
                    <button type="button" class="btn btn-primary" style="background-color: #697ea9;border: #697ea9;" data-toggle="modal" id="btnedit" data-target="#fullcontent"><a href="../client/FormClientUpdate.php?id=<?php echo $row->ID; ?>"style="text-decoration: none;color: white;"><i class='bx bx-pencil'></i></a></button>
                    <button type="button" class="btn btn-primary" style="background-color: #ff6060;border: #ED2B2A;"><a href="../client/deleteData.php?id=<?php echo $row->ID; ?>" style="text-decoration: none;color: white;"><i class='bx bx-x-circle'></i></a></button>
                  </td>
                </tr>
              <?php }
            } else {
              // No results found
              ?>
              <tr>
                <td style="font-size:20px; background-color: #EB1D36;color: white;" colspan="6">"Client non trouvé"</td>
              </tr>
            <?php
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