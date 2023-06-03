<?php
session_start();
include '../easly/connexion.php';

$connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
$sql = "SELECT ID FROM client";
$result = mysqli_query($connection, $sql);
$sql = "SELECT ID FROM article";
$result = mysqli_query($connection, $sql);

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

        main {
            padding-top: 10px;
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
                        <p>Easly<!--<span style="font-size: 20px;color: white;border: 1px #396aff solid;background-color: #396aff;border-radius: 5px;padding: 2px 5px;margin-left: 5px;letter-spacing: 1px;">Stock</span></p>-->
                    </span>

                </div>
                <div class="navlist">
                    <div class="nav-items">
                        <a href="../easly/Accueil.php" style="text-decoration: none" class="nav-link">
                            <i class="bx bxs-dashboard icon-link" id="icons"></i><span style="font-weight: 500;letter-spacing: 1px;">Dashboard</span>
                        </a>
                        <a href="../easly/Produits.php" style="text-decoration: none" class="nav-link">
                            <i class="bx bx-package icon-link" id="icons"></i><span style="font-weight: 500;letter-spacing: 1px;">Produit</span>
                        </a>
                        <a href="../easly/Clients.php" style="text-decoration: none" class="nav-link">
                            <i class="bx bx-user icon-link" id="icons"></i><span style="font-weight: 500;letter-spacing: 1px;">Clients</span>
                        </a>
                        <div class="nav-dropdown">
                            <a href="../easly/Commandes.php" style="text-decoration: none" class="nav-link">
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
                            <a href="../easly/Facture.php" style="text-decoration: none" class="nav-link">
                                <i class="bx bx-cart-add icon-link" id="icons"></i>
                                <span style="font-weight: 500;letter-spacing: 1px;">Facture</span>
                                <i class='bx bx-down-arrow-alt arrow-down'></i>
                            </a>
                            <div class="nav-dropdown-collapse">
                                <div class="dropdown-content">
                                    <a href="../easly/Facture.php" style="text-decoration: none;letter-spacing: 1px;color: #58555E;">Facture Clients</a>
                                    <a href="../easly/FactureFornisseur.php" style="text-decoration: none;letter-spacing: 1px;color: #58555E;">Facture Fornisseurs</a>
                                </div>
                            </div>
                        </div>

                        <a href="../easly/fornisseur.php" style="text-decoration: none" class="nav-link">
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
                    <h4 style="letter-spacing:1px;">Commandes</h4>
                </div>
            </div>
            <div class="header-action"></div>
        </header>
        <main>
            <?php
            $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
            $id = $_GET['id'];
            $sql = "SELECT DISTINCT f.ID , f.Nom, f.Prenom , cmd.date, cmd.etat
            FROM commandesfornissuer AS cmd
            JOIN fornisseur AS f ON cmd.ID_Fornisseur = f.ID
           WHERE cmd.No = $id
            GROUP BY f.ID;
            ";
            $result = mysqli_query($connection, $sql);
            ?>
            <section class="home-table">
                <form action="../CommandeFornisseur/Updatedata.php" method="post">
                    <button type="submit" class="btn btn-primary" name="ajoutercmd">edit</button>
                    <div class="tables">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $_GET['id']; ?>">
                        <h4>Commandes Info</h4>
                        <table class="table table-bordred" id="frmClient">
                            <thead style="
                  background-color: #e9eefd;
                  border-radius: 50px;">
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_object($result)) { ?>
                                        <tr>
                                            <th style="border:1px solid #ddd;">ID Client</th>
                                            <th style="border:1px solid #ddd;">Nom</th>
                                            <th style="border:1px solid #ddd;">Prenom</th>
                                            <th style="border:1px solid #ddd;">Date</th>
                                            <th style="border:1px solid #ddd;">Status</th>
                                        </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="border:1px solid #ddd;">
                                        <input type="text" id="nomField" name="ID_clinet" class="form-control" disabled value="<?php echo $row->ID ?>">
                                    </td>
                                    <td style="border:1px solid #ddd;">
                                        <input type="text" id="prenomField" name="Nom" class="form-control" disabled value="<?php echo $row->Nom ?>">
                                    </td>
                                    <td style="border:1px solid #ddd;">
                                        <input type="text" id="prenomField" name="Prenom" class="form-control" value="<?php echo $row->Prenom ?>">
                                    </td>
                                    <td style="border:1px solid #ddd;">
                                        <input type="date" id="prenomField" name="date" class="form-control" value="<?php echo $row->date ?>">
                                    </td>
                                    <td style="border:1px solid #ddd;">
                                        <select class="form-select" aria-label="Default select example" name="optionvalue">
                                            <option value="1" <?php if ($row->etat == 1) echo 'selected'; ?>>Terminée</option>
                                            <option value="2" <?php if ($row->etat == 2) echo 'selected'; ?>>En attente</option>
                                        </select>
                                    </td>
                                </tr>
                        <?php }
                                } ?>
                            </tbody>
                        </table>

                        <?php
                        $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
                        $id = $_GET['id'];
                        $sql = "SELECT p.ID , p.Nom_Article , ac.Quantite, ac.price, ac.Total
            FROM commandesfornissuer AS cmd
            JOIN fornisseur AS c ON cmd.ID_Fornisseur = c.ID
            JOIN `article de commande fornisseur` AS ac ON cmd.No = ac.id_commandes
            JOIN article AS p ON ac.id_article = p.ID
            WHERE cmd.No = $id;
            ";
                        $result = mysqli_query($connection, $sql);
                        ?>

                        <table class="table table-bordred">
                            <thead>


                                <tr>
                                    <th style="border:1px solid #ddd;">ID Produit</th>
                                    <th style="border:1px solid #ddd;">Nom</th>
                                    <th style="border:1px solid #ddd;">Prix</th>
                                    <th style="border:1px solid #ddd;">Quantite</th>
                                    <th style="border:1px solid #ddd;">Total</th>
                                    <th style="border:1px solid #ddd;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div class="form-group" style="margin-top: 20px; display: none;">
                                </div>
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_object($result)) { ?>
                                        <tr id="<?php echo $row->ID ?>">
                                            <td style="border:1px solid #ddd;"><?php echo $row->ID ?></td>
                                            <td style="border:1px solid #ddd;"><?php echo $row->Nom_Article ?></td>
                                            <td style="border:1px solid #ddd;"><?php echo $row->price ?></td>
                                            <td style="border:1px solid #ddd;"><?php echo $row->Quantite ?></td>
                                            <td style="border:1px solid #ddd;"><?php echo $row->Total ?></td>
                                            <td style="border-right:1px solid #ddd;display: flex;justify-content: center;align-items: center;">
                                                <button type="button" name="calcul" class="btn btn-outline-danger" onclick="deleterow(<?php echo $row->ID; ?>)"><i class='bx bx-x-circle'></i></button>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>


                        <h4>Les Produits</h4>
                        <table class="table table-bordred" id="frmProduct">
                            <thead style="background-color: #e9eefd;border-radius: 50px;">
                                <tr>
                                    <th style="border:1px solid #ddd;">ID Produit</th>
                                    <th style="border:1px solid #ddd;">Nom</th>
                                    <th style="border:1px solid #ddd;">Prix</th>
                                    <th style="border:1px solid #ddd;">Quantite</th>
                                    <th style="border:1px solid #ddd;">Total</th>
                                    <th style="border:1px solid #ddd;">Option</th>
                                </tr>
                            </thead>

                            <tbody id="myTable">
                                <tr>
                                    <td style="border:1px solid #ddd;">
                                        <input type="text" class="form-control" name="idarticl" id="Product" oninput="selectidproduct()" placeholder="Enter ID">
                                    </td>
                                    <td style="border:1px solid #ddd;">
                                        <input type="text" id="NomField" name="Nomartic" class="form-control">
                                    </td>
                                    <td style="border:1px solid #ddd;">
                                        <input type="text" id="PrixField" name="PRI" class="form-control" disabled>
                                    </td>
                                    <td style="border:1px solid #ddd;">
                                        <input type="number" id="QuantiteField" name="Quantitearticl" class="form-control" oninput="calculateTotal()" min="1">
                                    </td>
                                    <td style="border:1px solid #ddd;">
                                        <input type="text" id="TotalField" name="tota" class="form-control" disabled>
                                    </td>
                                    <td style="border:1px solid #ddd;">
                                        <button type="button" name="calcul" class="btn btn-outline-success" id="addButton" onclick="addRow()">Add</button>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </form>


            </section>
        </main>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        var je = jQuery.noConflict();

        function deleterow(id) {
            je.ajax({
                url: '../Commandes/functionn.php',
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
    </script>
    </script>
    <!-- script for add rows with properties-->
    <script src="../js/getinfo.js"></script>
    <!-- script for remove rows from database-->


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