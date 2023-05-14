<?php
session_start();
include '../php/connexion.php';

$connection = mysqli_connect('localhost', 'root', '', 'gestion_stock');
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
                    <h4 style="letter-spacing:1px;">Commandes</h4>
                </div>
            </div>
            <div class="header-action"></div>
        </header>
        <main>

            <section class="home-table">
                <form action="../Commandes/InsertData.php" method="post">
                    <button type="submit" class="btn btn-primary" name="ajoutercmd">Ajouter</button>
                    <div class="tables">
                        <h4>Commandes Info</h4>
                        <table class="table table-bordred" id="frmClient">
                            <thead style="
                  background-color: #e9eefd;
                  border-radius: 50px;">
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
                                        <input type="text" class="form-control" name="ID_clinet" id="Client" oninput="selectid()" placeholder="Enter ID">
                                    </td>
                                    <td style="border:1px solid #ddd;">
                                        <input type="text" id="nomField" name="Nom" class="form-control" disabled>
                                    </td>
                                    <td style="border:1px solid #ddd;">
                                        <input type="text" id="prenomField" name="Prenom" class="form-control" disabled>
                                    </td>
                                    <td style="border:1px solid #ddd;">
                                        <input type="date" id="prenomField" name="date" class="form-control">
                                    </td>
                                    <td style="border:1px solid #ddd;">
                                        <select class="form-select" aria-label="Default select example" name="optionvalue">
                                            <option value="1">Active</option>
                                            <option value="2">Pending</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <h4>Les Produits</h4>
                        <table class="table table-bordred" id="frmProduct">
                            <thead style="
                  background-color: #e9eefd;
                  border-radius: 50px;">
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
                                        <input type="text" class="form-control" name="idproduct" id="Product" oninput="selectidproduct()" placeholder="Enter ID">
                                    </td>
                                    <td style="border:1px solid #ddd;">
                                        <input type="text" id="NomField" name="Nom" class="form-control" disabled>
                                    </td>
                                    <td style="border:1px solid #ddd;">
                                        <input type="text" id="PrixField" name="prix" class="form-control" disabled>
                                    </td>
                                    <td style="border:1px solid #ddd;">
                                        <input type="number" id="QuantiteField" name="Quantite" class="form-control" oninput="calculateTotal()" min="1">
                                    </td>
                                    <td style="border:1px solid #ddd;">
                                        <input type="text" id="TotalField" name="total" class="form-control" disabled>
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

    <script src="../js/getinfo.js"></script>
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