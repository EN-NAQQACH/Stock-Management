<?php
session_start();
include '../easly/connexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/orders.css" />
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
            <!---<a href="../easly/Clients.php" style="text-decoration: none" class="nav-link">
              <i class="bx bx-user icon-link" id="icons"></i><span style="font-weight: 500;letter-spacing: 1px;">Clients</span>
            </a>-->
            <div class="nav-dropdown">
              <a href="../easly/Clients.php" style="text-decoration: none" class="nav-link">
              <i class="bx bx-user icon-link" id="icons"></i>
                <span style="font-weight: 500;letter-spacing: 1px;">Clients</span>
                <i class='bx bx-down-arrow-alt arrow-down'></i>
              </a>
              <div class="nav-dropdown-collapse">
                <div class="dropdown-content">
                  <a href="../easly/Commandes.php" style="text-decoration: none;letter-spacing: 1px;color: #58555E;">Commandes Clients</a>
                  <a href="../easly/Facture.php" style="text-decoration: none;letter-spacing: 1px;color: #58555E;">Facture Clients</a>
                </div>
              </div>
            </div>
            <!----<a href="../easly/fornisseur.php" style="text-decoration: none" class="nav-link">
              <i class="bx bxs-store icon-link" id="icons"></i><span style="font-weight: 500;letter-spacing: 1px;">Fournisseur</span>
            </a>--->
            <div class="nav-dropdown">
              <a href="../easly/Fornisseur.php" style="text-decoration: none" class="nav-link">
              <i class="bx bxs-store icon-link" id="icons"></i>
                <span style="font-weight: 500;letter-spacing: 1px;">Fournisseur</span>
                <i class='bx bx-down-arrow-alt arrow-down'></i>
              </a>
              <div class="nav-dropdown-collapse">
                <div class="dropdown-content">
                <a href="../easly/CommandeFornisseur.php" style="text-decoration: none;letter-spacing: 1px;color: #58555E;">Commandes Fornisseurs</a>
                <a href="../easly/FactureFornisseur.php" style="text-decoration: none;letter-spacing: 1px;color: #58555E;">Facture Fournisseurs</a>
                </div>
              </div>
            </div>

            <!---<div class="nav-dropdown">
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
            </div>--->
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
                    <h4 style="letter-spacing:1px;">Factures</h4>
                </div>
            </div>
            <div class="header-action"></div>
        </header>
        <main>



            <?php
            $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
            $sql = "SELECT ff.no, f.Nom, ff.date FROM facturefornisseur AS ff JOIN fornisseur AS f ON ff.ID_Fornisseur  = f.ID;";
            $result = mysqli_query($connection, $sql);
            ?>

            <section class="home-table">
                <h4>Liste des Factures</h4>
                <form action="../FactureFournisseur/export-facture.php" method="post" style="margin-top: 12px;">
                    <a href="../FactureFournisseur/FormulaireFacture.php"><button type="button" class="btn btn-primary" data-toggle="modal" id="btnedit" data-target="#fullcontent">Ajouter</button></a>
                    <button type="submit" name="submit" class="btn btn-primary" data-toggle="modal" id="btnpdf" data-target="#fullcontent"><i class='bx bxs-file-pdf'></i> PDF</button>
                    <!--<input type="submit" name="submit" value="EXPORT PDF">-->
                </form>
                <div class="tables">
                    <table class="table table-hover" id="tabledatta">
                        <thead style="
                  background-color: #e9eefd;
                  border-radius: 50px;
                  position: sticky;
                  top: 0;
                ">
                            <tr>
                                <th scope="col" style="border:1px solid #ddd;">N° Facture</th>
                                <th scope="col" style="border:1px solid #ddd;">Nom</th>
                                <th scope="col" style="border:1px solid #ddd;">Date</th>
                                <th colspan="col" style="border:1px solid #ddd;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Add more customer rows as needed -->
                            <!-- gat data from database-->
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_object($result)) { ?>
                                    <tr>
                                        <th scope="row" style="border:1px solid #ddd;"><?php echo $row->no ?></th>
                                        <td style="border:1px solid #ddd;"><?php echo $row->Nom ?></td>
                                        <td style="border:1px solid #ddd;"><?php echo $row->date ?></td>
                                        <td style="text-align: center;">
                                            <div style="display: flex;justify-content: space-around;align-items: center;">
                                                <a href="../FactureFournisseur/Formulaire de Modification.php?id=<?php echo $row->no; ?>" style="text-decoration: none;color: black;font-size: 1.2rem;" title="edit"><i class='bx bx-pencil'></i></a>
                                                <form action="../FactureFournisseur/Facture.php" method="post">
                                                    <a href="../FactureFournisseur/Facture.php?id=<?php echo $row->no; ?>" style="text-decoration: none;color:green;font-size: 1.2rem;"><i class='bx bxs-show'></i></a>
                                                </form>
                                                <a href="../FactureFournisseur/DeleteData.php?id=<?php echo $row->no; ?>" style="text-decoration: none;color: red;font-size: 1.2rem;"><i class='bx bx-x-circle'></i></a>
                                                <a href="../FactureFournisseur/export-list-facture.php?id=<?php echo $row->no; ?>" style="text-decoration: none;color:black;font-size: 1.2rem;"><i class='bx bxs-printer'></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                            } else {
                                $resetQuery = "ALTER TABLE Facturefornisseur AUTO_INCREMENT = 1";
                                mysqli_query($connection, $resetQuery); ?>
                            <?php } ?>
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

<?php 
include '../easly/script.php';
?>