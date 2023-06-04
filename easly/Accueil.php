<?php
session_start();
include '../easly/connexion.php';
include '../client/Function2.php'

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../easly/Accueil.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />

  <title>Dashboard</title>
  <style>
    .activee {
      background-color: #e9eefd;
      color: #396aff;
    }

    .activee a {
      color: #396aff;
    }
  </style>
  <script>
    // Disable the browser's back button functionality
    window.onload = function() {
      window.history.pushState(null, '', window.location.href);
      window.onpopstate = function() {
        window.history.pushState(null, '', window.location.href);
      };
    };
  </script>
</head>

<body>
  <input type="checkbox" name="" id="menutoggle">
  <div class="overlay">
    <label for="menutoggle">
    </label>
  </div>
  <div class="sidebar">
    <div class="sidebar-container">
      <div class="sidebar-menu">
        <div class="logo">
          <span>
            <p>Easly</p>
          </span>
        </div>
        <div class="navlist">
          <div class="nav-items">

            <a href="../easly/Accueil.php" style="text-decoration: none" class="nav-link">
              <i class="bx bxs-dashboard icon-link" id="icons"></i><span style="font-weight: 500;letter-spacing: 1px;">Tableau de bord</span>
            </a>
            <a href="../easly/Produits.php" style="text-decoration: none" class="nav-link">
              <i class="bx bx-package icon-link" id="icons"></i><span style="font-weight: 500;letter-spacing: 1px;">Produit</span>
            </a>
            <a href="../easly/Clients.php" style="text-decoration: none" class="nav-link">
              <i class="bx bx-user icon-link" id="icons"></i><span style="font-weight: 500;letter-spacing: 1px;">Clients</span>
            </a>
            <div class="nav-dropdown">
              <a href="#" style="text-decoration: none" class="nav-link">
                <i class="bx bx-receipt icon-link" id="icons"></i>
                <span style="font-weight: 500;letter-spacing: 1px;">Commandes</span>
                <i class='bx bx-down-arrow-alt arrow-down'></i>
              </a>
              <div class="nav-dropdown-collapse">
                <div class="dropdown-content">
                  <a href="../easly/Commandes.php" style="text-decoration: none;letter-spacing: 1px;color: #58555E;">Commandes Clients</a>
                  <a href="../easly/CommandeFornisseur.php" style="text-decoration: none;letter-spacing: 1px;color: #58555E;">Commandes Fornisseurs</a>
                </div>
              </div>
            </div>
            <div class="nav-dropdown">
              <a href="../php/Facture.php" style="text-decoration: none" class="nav-link">
                <i class="bx bx-cart-add icon-link" id="icons"></i>
                <span style="font-weight: 500;letter-spacing: 1px;">Facture</span>
                <i class='bx bx-down-arrow-alt arrow-down'></i>
              </a>
              <div class="nav-dropdown-collapse">
                <div class="dropdown-content">
                  <a href="../easly/Facture.php" style="text-decoration: none;letter-spacing: 1px;color: #58555E;">Facture Clients</a>
                  <a href="../easly/FactureFornisseur.php" style="text-decoration: none;letter-spacing: 1px;color: #58555E;">Facture Fournisseurs</a>
                </div>
              </div>
            </div>

            <a href="../php/fornisseur.php" style="text-decoration: none" class="nav-link">
              <i class="bx bxs-store icon-link" id="icons"></i><span style="font-weight: 500;letter-spacing: 1px;">Fournisseur</span>
            </a>
          </div>
          </li>
        </div>
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
          <h4 style="letter-spacing:1px;">Tableau de bord</h4>
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
          <?php
          $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');

          $sql1 = "SELECT COUNT(*) as row_count FROM `commandesfornissuer` ";
          $result1 = mysqli_query($connection, $sql1);

          $sql2 = "SELECT COUNT(*) as row_count FROM `commandes` ";
          $result2 = mysqli_query($connection, $sql2);

          if (mysqli_num_rows($result1) > 0 || mysqli_num_rows($result2) > 0) {
            $row1 = mysqli_fetch_object($result1);
            $row2 = mysqli_fetch_object($result2);
            $totalRowCount = $row1->row_count + $row2->row_count;
          ?>
            <div class="details">
              <div class="box-topic" style="font-weight: 600;">Total Order</div>
              <div class="number" style="font-size:20px;font-weight: 600;"><?php echo  $totalRowCount ?></div>
            </div>
        </div>
      <?php }
      ?>
      <div class="box">
        <div class="icon">
        <i class="bx bx-receipt icon-link" id="icons"></i>
        </div>
        <?php
        $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');

        $sql1 = "SELECT COUNT(*) as row_count FROM `commandesfornissuer` WHERE etat = 2;";
        $result1 = mysqli_query($connection, $sql1);

        $sql2 = "SELECT COUNT(*) as row_count FROM `commandes` WHERE statu = 2;";
        $result2 = mysqli_query($connection, $sql2);

        if (mysqli_num_rows($result1) > 0 || mysqli_num_rows($result2) > 0) {
          $row1 = mysqli_fetch_object($result1);
          $row2 = mysqli_fetch_object($result2);
          $totalRowCount = $row1->row_count + $row2->row_count;
        ?>
          <div class="details">
            <div class="box-topic" style="font-weight: 600;">order en attente</div>
            <div class="number" style="font-size:20px;font-weight: 600;"><?php echo $totalRowCount; ?></div>
          </div>
        <?php
        }
        ?>
      </div>
      <div class="box">
        <div class="icon">
        <i class="bx bx-package icon-link" id="icons"></i>
        </div>
        <?php
        $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
        $sql = "SELECT COUNT(*) as row_count FROM `article`";
        $result = mysqli_query($connection, $sql);
        ?>
        <?php
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_object($result)) { ?>
            <div class="details">
              <div class="box-topic" style="font-weight: 600;">Stock</div>
              <div class="number" style="font-size:20px;font-weight: 600;"><?php echo $row->row_count ?></div>
            </div>
        <?php }
        } ?>
      </div>

      <div class="box">
        <div class="icon">
        <i class="bx bx-user icon-link" id="icons"></i>
        </div><?php
              $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
              $sql = "SELECT COUNT(*) as row_count FROM `fornisseur`";
              $result = mysqli_query($connection, $sql);
              ?>
        <?php
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_object($result)) { ?>
            <div class="details">
              <div class="box-topic" style="font-weight: 600;">Fornisseur</div>
              <div class="number" style="font-size:20px;font-weight: 600;"><?php echo $row->row_count ?></div>
            </div>
      </div>
  <?php }
        } ?>
      </div>


      <div class="overview">
        <div class="box">
          <div class="icon">
          <i class="bx bx-user icon-link" id="icons"></i>
          </div>
          <?php
          $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
          $sql = "SELECT COUNT(*) as row_count FROM client;";
          $result = mysqli_query($connection, $sql);
          ?>
          <?php
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_object($result)) { ?>
              <div class="details">
                <div class="box-topic" style="font-weight: 600;">Clients</div>
                <div class="number" style="font-size:20px;font-weight: 600;"><?php echo $row->row_count ?></div>
              </div>
        </div>
    <?php }
          } ?>
    <div class="box">
      <div class="icon">
      <i class='bx bx-bell'></i>
      </div>
      <?php
      $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
      $sql = "SELECT COUNT(*) as row_count FROM `article` WHERE Quantite=0;";
      $result = mysqli_query($connection, $sql);
      ?>
      <?php
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_object($result)) { ?>
          <div class="details">
            <div class="box-topic" style="font-weight: 600;">Alerts stock des articles</div>
            <div class="number" style="font-size:20px;font-weight: 600;"><?php echo $row->row_count ?></div>
          </div>
      <?php }
      } ?>
    </div>
      </div>
      <section class="home-table">
        <h4>Liste de clients</h4>
        <div class="tables">
          <table class="table table-hover" id="tabledatta">
            <thead style="
                  background-color: #e9eefd;
                  border-radius: 50px;
                  position: sticky;
                  top: 0;
                ">
              <tr>
                <th scope="col" style="border:1px solid #ddd;">ID</th>
                <th scope="col" style="border:1px solid #ddd;">Nom</th>
                <th scope="col" style="border:1px solid #ddd;">Téléphone</th>
                <th colspan="col" style="border:1px solid #ddd;">Adresse</th>
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
                    <th scope="row" style="border:1px solid #ddd;"><?= $value['ID'] ?></th>
                    <td style="border:1px solid #ddd;"><?= $value['Nom'] ?></td> <!-- value from database-->
                    <td style="border:1px solid #ddd;"><?= $value['Telephone'] ?></td> <!-- value from database-->
                    <td style="border:1px solid #ddd;"><?= $value['Address'] ?></td> <!-- value from database-->

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

  <script src="https://kit.fontawesome.com/b6d8dff8c8.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>