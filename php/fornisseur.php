<?php
session_start();
include '../php/connexion.php';
include '../Fornisseur/Function.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/fornisseur.css" />
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
    <div class="sidebar">
        <div class="sidebar-container">
            <div class="sidebar-menu">
                <div class="logo">
                    
                    <span>
                    <p>Easly<!--<span style="font-size: 20px;color: white;border: 1px #396aff solid;background-color: #396aff;border-radius: 5px;padding: 2px 5px;margin-left: 5px;letter-spacing: 1px;">Stock</span></p>-->
                    </span>
                    
                </div>
                <ul>
                    <li class="active" id="link-dashboard">
                        <a href="../php/Accueil.php" style="text-decoration: none">
                            <i class="bx bxs-dashboard icon-link" id="icons"></i><span style="font-weight: 500;letter-spacing: 1px;">Dashboard</span>
                        </a>
                    </li>
                    <li id="link-produits">
                        <a href="../php/Produits.php" style="text-decoration: none">
                            <i class="bx bx-package icon-link" id="icons"></i><span style="font-weight: 500;letter-spacing: 1px;">Produit</span>
                        </a>
                    </li>
                    <li id="link-clients">
                        <a href="../php/Clients.php" style="text-decoration: none">
                            <i class="bx bx-user icon-link" id="icons"></i><span style="font-weight: 500;letter-spacing: 1px;">Clients</span>
                        </a>
                    </li>
                    <li id="commandes-link">
                        <a href="../php/Commandes.php" style="text-decoration: none">
                            <i class="bx bx-receipt icon-link" id="icons"></i><span style="font-weight: 500;letter-spacing: 1px;">Commandes</span><i class='bx bx-down-arrow-alt'></i>
                        </a>
                    </li>
                    <li id="link-vente">
                        <a href="../php/vente.php" style="text-decoration: none">
                            <i class="bx bx-cart-add icon-link" id="icons"></i><span style="font-weight: 500;letter-spacing: 1px;">Vente</span>
                        </a>
                    </li>
                    <li id="link-fournisseur">
                        <a href="../php/fornisseur.php" style="text-decoration: none">
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
                    <h4 style="letter-spacing:1px;">Fornisseur</h4>
                </div>
            </div>
            <div class="header-action"></div>
        </header>
        <main>


            <div id="filterdiv" style="display: flex;justify-content: center;margin-right: 93px;margin-top: -10px;">
                <form method="post" action="../php/Fornisseur.php">
                    <div class="row">
                        <div class="col-md-9" style="margin:5px 0;">
                            <input type="text" class="form-control" placeholder="Nom or Id, Prenom ..." name="filter_value">
                        </div>
                        <div class="col-md-3" style="margin:5px 0;">
                            <button type="submit" class="btn btn-primary" style="background-color: #92B4EC;border: #92B4EC;" name="recherchebtn" required> recherche </button>
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
                        <form method="post" action="../php/Fornisseur.php">
                            <div class="row">
                                <div class="col-md-8" style="margin:5px 0;">
                                    <input type="text" class="form-control" placeholder="Nom or Id, Prenom ..." name="filter_value">
                                </div>
                                <div class="col-md-3" style="margin:5px 0;">
                                    <button type="submit" class="btn btn-primary" style="background-color: #92B4EC;border: #92B4EC;" name="recherchebtn"> recherche </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php
      $connection = mysqli_connect('localhost', 'root', '', 'gestion_stock');
      $sql = "SELECT * FROM fornisseur";
      $result = mysqli_query($connection, $sql);
      if (isset($_POST['recherchebtn'])) {
        $searchkey = $_POST['filter_value'];
        $sql = "SELECT * FROM fornisseur WHERE CONCAT (Nom, Prenom, Telephone, Address) LIKE '%$searchkey%'";
      } else {
        $sql = "SELECT * FROM fornisseur";
        $searchkey = "";
      }
      $result = mysqli_query($connection, $sql);
      ?>

            <section class="home-table">
                <h4>Liste de clients</h4>
                <form action="../Fornisseur/export-fornisseur-list-pdf.php" method="post" style="margin-top: 12px;">
                    <a href="../Fornisseur/Formulaire de Modification.php"><button type="button" class="btn btn-primary" data-toggle="modal" id="btnedit" data-target="#fullcontent">Ajouter</button></a>
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
                                <th scope="col" style="border:1px solid #ddd;">ID</th>
                                <th scope="col"style="border:1px solid #ddd;">Nom</th>
                                <th scope="col"style="border:1px solid #ddd;">Prénom</th>
                                <th scope="col"style="border:1px solid #ddd;">Téléphone</th>
                                <th colspan="col"style="border:1px solid #ddd;">Adresse</th>
                                <th colspan="col"style="border:1px solid #ddd;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Add more customer rows as needed -->
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
                                        <div style="display: flex;justify-content: space-around;align-items: center;">
                                            <a href="../Fornisseur/Formulaire de Modification.php?id=<?php echo $row->ID; ?>" style="text-decoration: none;color: black;font-size: 1.2rem;" title="edit"><i class='bx bx-pencil'></i></a>
                                            <a href="../Fornisseur/deleteData.php?id=<?php echo $row->ID; ?>" style="text-decoration: none;color: red;font-size: 1.2rem;"><i class='bx bx-x-circle'></i></a>
                                        </div>
                                        </td>
                                    </tr>
                                <?php }
                            } else {
                                // No results found
                                ?>
                                <tr>
                                    <td style="font-size:20px; background-color: #EB1D36;color: white;" colspan="6">"Fornisseur non trouvé"</td>
                                </tr>
                            <?php
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

<?php
include '../php/script.php';
?>