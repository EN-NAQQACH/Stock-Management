<?php
session_start();
include '../php/connexion.php';
include '../produits/Function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../php/Dash.css" />
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
                        <p>Easly</p>
                    </span>
                </div>
                <ul>
                    <li class="active" id="link-dashboard">
                        <a href="../php/Dash.php" style="text-decoration: none">
                            <i class="bx bxs-dashboard icon-link" id="icons"></i><span style="font-weight: 500;letter-spacing: 1px;">Dashboard</span>
                        </a>
                    </li>
                    <li id="link-produits">
                        <a href="../php/produits.php" style="text-decoration: none">
                            <i class="bx bx-package icon-link" id="icons"></i><span style="font-weight: 500;letter-spacing: 1px;">Produit</span>
                        </a>
                    </li>
                    <li id="link-clients">
                        <a href="../php/clients.php" style="text-decoration: none">
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
                    <h4 style="letter-spacing:1px;">Dashboard</h4>
                </div>
            </div>
            <div class="header-action"></div>
        </header>
        <main>

            <div id="filterdiv3">
                <form style="margin-right:0;overflow: hidden;" method="post" action="../php/prod.php">
                    <div class="row" style="margin-right:-80px;">
                        <div class="col-md-3" style="margin:5px 0;">
                            <input type="text" class="form-control" placeholder="nom or id ..." name="filter_value">
                        </div>
                        <div class="col-md-3" style="margin:5px 0;">
                            <input type="text" class="form-control" placeholder="date de début" onfocus="(this.type = 'date')" onblur="(this.type = 'text')" name="Fromdate">
                        </div>
                        <div class="col-md-3" style="margin:5px 0;">
                            <input type="text" class="form-control" placeholder="date de fin" onfocus="(this.type = 'date')" onblur="(this.type = 'text')" name="todate">
                        </div>
                        <div class="col-md-3" style="margin:5px 0;">
                            <button type="submit" class="btn btn-primary" style="background-color: #0E8388;border: #394867;" name="recherchebtn"> recherche </button>
                        </div>
                    </div>
                </form>
            </div>

            <div id="filterdiv4">
                <p>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="background-color: green;border: #394867;">
                        Filter
                    </button>
                </p>
                <div class="collapse" id="collapseExample" style="max-width: 700px;margin-right: 18px;">
                    <div class="card card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-3" style="margin:5px 0;">
                                    <input type="text" class="form-control" placeholder="nom or id ..." name="filter_value">
                                </div>
                                <div class="col-md-3" style="margin:5px 0;">
                                    <input type="text" class="form-control" placeholder="date de début" onfocus="(this.type = 'date')" onblur="(this.type = 'text')" name="Fromdate">
                                </div>
                                <div class="col-md-3" style="margin:5px 0;">
                                    <input type="text" class="form-control" placeholder="date de fin" onfocus="(this.type = 'date')" onblur="(this.type = 'text')" name="todate">
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
            $sql = "SELECT * FROM article";
            $result = mysqli_query($connection, $sql);
            if (isset($_POST['filter_value'])) {
                $searchkey = $_POST['filter_value'];
                $sql = "SELECT * FROM article WHERE  Nom_Article LIKE '%$searchkey%'";
            } else {
                $sql = "SELECT * FROM article";
            }
            if (isset($_POST['Fromdate']) && isset($_POST['todate'])) {
                $from = $_POST['Fromdate'];
                $to = $_POST['todate'];
                $sql = "SELECT * FROM article WHERE  DateFabrication BETWEEN '$from' AND '$to'";
            }
            $result = mysqli_query($connection, $sql);
            ?>


            <section class="home-table">
                <h4>Liste de clients</h4>
                <a href="../produits/Formprod.php" style="text-decoration: none;color: white;"><button type="button" class="btn btn-primary" style="background-color:#2E4F4F;border: #394867;" data-toggle="modal" data-target="#fullcontent">Ajouter</button></a>
                <div class="tables">
                    <table class="table table-hover" id="tabledatta">
                        <thead style="
                  background-color: #e9eefd;
                  border-radius: 50px;
                  position: sticky;
                  top: 0;
                ">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">nom_article</th>
                                <th scope="col">Catégorie</th>
                                <th scope="col">Quantité</th>
                                <th scope="col">Prix_unitaire (DH)</th>
                                <th scope="col">Image</th>
                                <th scope="col">Date_fabrication</th>
                                <th scope="col" style="border:1px solid #ddd;background-color:white;text-align:center;">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_object($result)) { ?>
                                    <tr>
                                        <th scope="row" style="border:1px solid #ddd;"><?php echo $row->ID ?></th>
                                        <td style="border:1px solid #ddd;"><?php echo $row->Nom_Article ?></td>
                                        <td style="border:1px solid #ddd;"><?php echo $row->Categorie ?></td>
                                        <td style="border:1px solid #ddd;"><?php echo $row->Quantite ?></td>
                                        <td style="border:1px solid #ddd;"><?php echo $row->PrixUnitaire ?></td>
                                        <td style="border:1px solid #ddd;">
                                            <?php if (!empty($row->image)) { ?>
                                                <div style="display: flex;justify-content: center;">
                                                    <img src="<?php echo "../produits/upload/" . $row->image ?>" alt="Product Image" width="50px" height="50px" style="border-radius: 10%;">
                                                </div>
                                            <?php } else { ?>
                                                No image
                                            <?php } ?>

                                        </td>
                                        <td style="border:1px solid #ddd;"><?php echo $row->DateFabrication ?></td>
                                        <td style="text-align: center;">
                                            <button type="button" class="btn btn-primary" style="background-color: #697ea9;border: #697ea9;" data-toggle="modal" id="btnedit" data-target="#fullcontent"><a href="../php/prod.php" style="text-decoration: none;color: white;"><i class='bx bx-pencil'></i></a></button>
                                            <button type="button" class="btn btn-primary" style="background-color: #ff6060;border: #ED2B2A;"><a href="" style="text-decoration: none;color: white;"><i class='bx bx-x-circle'></i></a></button>
                                        </td>
                                    </tr>
                                <?php }
                            } else {
                                // No results found
                                ?>
                                <tr>
                                    <td style="font-size:20px; background-color: #EB1D36;color: white;" colspan="6">"produit non trouvé"</td>
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