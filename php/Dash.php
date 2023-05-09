<?php
session_start();
include '../php/connexion.php';
include '../client/Function2.php'

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../php/Dash.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />

    <title>Dashboard</title>
    <style>
      .activee{
        background-color:#e9eefd;
        color: #396aff;
      }
      .activee a{
        color: #396aff;
      }
    </style>
  </head>
  <body>
    <input type="checkbox" name="" id="menutoggle">
    <div class="sidebar">
      <div class="sidebar-container">
        <div class="sidebar-menu">
          <div class="logo">
            <span>
              <p>Easly</p>
            </span>
          </div>
          <ul>
            <li class="active" id="link-dashboard">
              <a href="../php/Dash.php" style="text-decoration: none" >
                <i class="bx bxs-dashboard icon-link" id="icons"></i><span style="font-weight: 500;letter-spacing: 1px;">Dashboard</span>
              </a>
            </li>
            <li id="link-produits">
              <a href="../php/prod.php" style="text-decoration: none" >
                <i class="bx bx-package icon-link" id="icons"></i><span style="font-weight: 500;letter-spacing: 1px;">Produit</span>
              </a>
            </li>
            <li id="link-clients">
              <a href="../php/clients.php" style="text-decoration: none" >
                <i class="bx bx-user icon-link" id="icons"></i><span style="font-weight: 500;letter-spacing: 1px;">Clients</span>
              </a>
            </li>
            <li id="commandes-link">
              <a href="../php/Commandes.php" style="text-decoration: none" >
                <i class="bx bx-receipt icon-link" id="icons"></i><span style="font-weight: 500;letter-spacing: 1px;">Commandes</span><i class='bx bx-down-arrow-alt'></i>
              </a>
            </li>
            <li id="link-vente">
              <a href="../php/vente.php" style="text-decoration: none" >
                <i class="bx bx-cart-add icon-link" id="icons"></i><span style="font-weight: 500;letter-spacing: 1px;">Vente</span>
              </a>
            </li>
            <li id="link-fournisseur">
              <a href="../php/fornisseur.php" style="text-decoration: none" >
                <i class="bx bxs-store icon-link" id="icons"></i><span style="font-weight: 500;letter-spacing: 1px;">Fournisseur</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="main-content">
      <header>
        <div class="header-title">
          <div class="humb">
            <label for="menutoggle" class="humb" style="cursor: pointer;">
              <i class="fa-solid fa-bars"></i>
            </label>
          </div>
          <div>
            <h4  style="letter-spacing:1px;">Dashboard</h4>
          </div>
        </div>
        <div class="header-action"></div>
      </header>
      <main>
        <div class="overview-boxes">
          <div class="box">
            <div class="icon">
              <i class="bx bx-cart-alt cart"></i>
            </div>
            <div class="details">
              <div class="box-topic" style="font-weight: 600;">Total Order</div>
              <div class="number" style="font-size:20px;font-weight: 600;">40,876</div>
            </div>
          </div>

          <div class="box">
            <div class="icon">
              <i class="bx bx-cart-alt cart"></i>
            </div>
            <div class="details">
              <div class="box-topic" style="font-weight: 600;">Total Sales</div>
              <div class="number" style="font-size:20px;font-weight: 600;">40,876</div>
            </div>
          </div>

          <div class="box">
            <div class="icon">
              <i class="bx bx-cart-alt cart"></i>
            </div>
            <div class="details">
              <div class="box-topic" style="font-weight: 600;">Stock</div>
              <div class="number" style="font-size:20px;font-weight: 600;">40,876</div>
            </div>
          </div>

          <div class="box">
            <div class="icon">
              <i class="bx bx-cart-alt cart"></i>
            </div>
            <div class="details">
              <div class="box-topic" style="font-weight: 600;">Total Order</div>
              <div class="number" style="font-size:20px;font-weight: 600;">40,876</div>
            </div>
          </div>
        </div>
        <section class="home-table">
          <h4>Liste de clients</h4>
          <div class="tables">
            <table class="table table-hover" id="tabledatta">
              <thead
                style="
                  background-color: #e9eefd;
                  border-radius: 50px;
                  position: sticky;
                  top: 0;
                "
              >
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Prénom</th>
                  <th scope="col">Téléphone</th>
                  <th colspan="col">Adresse</th>
                </tr>
              </thead>
              <tbody>
                <!-- Add more customer rows as needed -->
                            <!-- gat data from database-->
            <?php
            $clients = gatClient();
            if (!empty($clients) && is_array($clients)) {
              foreach ($clients as $key => $value) {
            ?>
                <tr>
                  <th scope="row"><?= $value['ID'] ?></th>
                  <td><?= $value['Nom'] ?></td> <!-- value from database-->
                  <td><?= $value['Prenom'] ?></td> <!-- value from database-->
                  <td ><?= $value['Telephone'] ?></td> <!-- value from database-->
                  <td ><?= $value['Address'] ?></td> <!-- value from database-->
                 
                </tr>
            <?php
              }
            }
            ?>
              </tbody>
            </table>
          </div>
        </section>
      </main>
    </div>
    <script>
      var links = document.getElementsByTagName("li");
  
      for (var i = 0; i < links.length; i++) {
        links[i].addEventListener("click", function(event) {
          localStorage.setItem("clickedLink", this.id);
        });
  
        var clickedLink = localStorage.getItem("clickedLink");
        if (links[i].id === clickedLink) {
          links[i].classList.add("activee");
        }
      }
    </script>

    <script
      src="https://kit.fontawesome.com/b6d8dff8c8.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>
