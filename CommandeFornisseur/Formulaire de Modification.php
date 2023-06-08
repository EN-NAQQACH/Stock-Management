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

        main {
            padding-top: 10px;
        }

        #clicked-two:hover {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="modal fade" id="productdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 900px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="row" style="margin: 20px 5px 0px 5px;">
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Nom or Id, Prenom ..." name="filter" id="getproduct">
                    </div>
                </div>

                <div class="modal-body">
                    <?php
                    $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
                    $sql = "SELECT * FROM article";
                    $result = mysqli_query($connection, $sql);
                    ?>
                    <div class="tables">
                        <table class="table table-hover" id="tabledatta">
                            <thead style=" background-color: #e9eefd;border-radius: 50px;position: sticky;top: 0;">
                                <tr>
                                    <th scope="col" style="border:1px solid #ddd;">ID</th>
                                    <th scope="col" style="border:1px solid #ddd;">article</th>
                                    <th scope="col" style="border:1px solid #ddd;">Catégorie</th>
                                    <th scope="col" style="border:1px solid #ddd;">Quantité</th>
                                    <th scope="col" style="border:1px solid #ddd;">Prix dh</th>
                                    <th scope="col" style="border:1px solid #ddd;">Image</th>
                                </tr>
                            </thead>
                            <tbody id="showdata2">
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_object($result)) { ?>
                                        <tr onclick="displayProductValues(this)" id="clicked-two">
                                            <td scope="row" style="border:1px solid #ddd;"><?php echo $row->ID ?></td>
                                            <td style="border:1px solid #ddd;"><?php echo $row->Nom_Article ?></td>
                                            <td style="border:1px solid #ddd;"><?php echo $row->Categorie ?></td>
                                            <td style="border:1px solid #ddd;">
                                                <?php
                                                if ($row->Quantite == 0) {
                                                ?> <span style="display: flex;justify-content: center;">
                                                        <h6 style="color:red">Alerts stock</h6>
                                                    </span> <?php
                                                        } elseif ($row->Quantite < 0) {
                                                            echo $row->Quantite = '<span style="display: flex;justify-content: center;"><h6 style="color:red">Alerts stock/h6></span>';
                                                        } else {
                                                            echo $row->Quantite;
                                                        }
                                                            ?>

                                            </td>
                                            <td style="border:1px solid #ddd;"><?php echo number_format($row->PrixUnitaire, 2)  ?></td>
                                            <td style="border:1px solid #ddd;">
                                                <?php if (!empty($row->image)) { ?>
                                                    <div style="display: flex;justify-content: center;">
                                                        <img src="<?php echo "../upload/" . $row->image ?>" alt="Product Image" width="50px" height="50px" style="border-radius: 10%;">
                                                    </div>
                                                <?php } else { ?>
                                                    No image
                                                <?php } ?>

                                            </td>

                                        </tr>
                                    <?php }
                                } else {
                                    $resetQuery = "ALTER TABLE article AUTO_INCREMENT = 1";
                                    mysqli_query($connection, $resetQuery); ?>

                                    <td style="text-align: center;border:1px solid #ddd;" colspan="7">Liste Vide</td>
                                <?php } ?>
                            </tbody>
                        </table>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                <span style="font-weight: 500;letter-spacing: 1px;">Fournisseurs</span>
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
                    <h4 style="letter-spacing:1px;">Commandes</h4>
                </div>
            </div>
            <div class="header-action"></div>
        </header>
        <main>
            <?php
            $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
            $id = $_GET['id'];
            $sql = "SELECT DISTINCT f.ID , f.Nom, cmd.date
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
                        <h4>Commande</h4>
                        <table class="table table-bordred" id="frmClient">
                            <thead style="
                  background-color: #e9eefd;
                  border-radius: 50px;">
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_object($result)) { ?>
                                        <tr>
                                            <th style="border:1px solid #ddd;">N° Fournisseur</th>
                                            <th style="border:1px solid #ddd;">Nom</th>
                                            <th style="border:1px solid #ddd;">Date</th>
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
                                        <input type="date" id="prenomField" name="date" class="form-control" value="<?php echo $row->date ?>">
                                    </td>
                                </tr>
                        <?php }
                                } ?>
                            </tbody>
                        </table>

                        <?php
                        $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
                        $id = $_GET['id'];
                        $sql = "SELECT p.ID , p.Nom_Article , ac.Quantite, ac.Price, ac.Total
            FROM commandesfornissuer AS cmd
            JOIN fornisseur AS f ON cmd.ID_Fornisseur = f.ID
            JOIN `article de commande fornisseur` AS ac ON cmd.No = ac.id_commandes
            JOIN article AS p ON ac.id_article = p.ID
            WHERE cmd.No = $id;
            ";
                        $result = mysqli_query($connection, $sql);
                        ?>

                        <table class="table table-bordred">
                            <thead>


                                <tr>
                                    <th style="border:1px solid #ddd;">N° Article</th>
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
                                            <td style="border:1px solid #ddd;"><?php echo $row->Price ?></td>
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
                                    <th style="border:1px solid #ddd;">N° Article</th>
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
                                        <input type="text" class="form-control" name="idarticl" id="Product" oninput="selectidproduct()" placeholder="Enter ID" data-toggle="modal" data-target="#productdata">
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
        var jqq = jQuery.noConflict();
        jqq(document).ready(function() {
            $('#getproduct').keyup(function() {
                var getproduct = $(this).val();
                jqq.ajax({
                    method: 'post',
                    url: '../easly/searchpr.php',
                    data: {
                        name: getproduct
                    },
                    success: function(response) {
                        $("#showdata2").html(response);
                    }
                })
            });


        });
    </script>
    <script>
        $(document).ready(function() {

            var html = '<tr><td style="border:1px solid #ddd;"><input type="text" class="form-control" name="idarticle[]" id="Product" oninput="selectidproduct()" placeholder="Enter ID"></td><td style="border:1px solid #ddd;"><input type="text" id="NomField" name="Nomarticle[]" class="form-control" disabled></td><td style="border:1px solid #ddd;"><input type="text" id="PrixField" name="PRIX[]" class="form-control" disabled></td><td style="border:1px solid #ddd;"><input type="number" id="QuantiteField" name="Quantitearticle[]" class="form-control" oninput="calculateTotal()" min="1"></td><td style="border:1px solid #ddd;"><input type="text" id="TotalField" name="total[]" class="form-control" disabled></td><td style="border-right:1px solid #ddd;display: flex;justify-content: center;align-items: center;"><button type="button" name="calcul" class="btn btn-outline-danger""><i class="bx bx-x-circle"></i></button></td>';

            $("#addButton").click(function() {
                var productId = $("#Product").val();
                var productName = $("#NomField").val();
                var price = $("#PrixField").val();
                var quantity = $("#QuantiteField").val();
                var total = $("#TotalField").val();
                if (productId === '' || productName === '' || price === '' || quantity === '' || total === '') {
                    // Check if any of the fields are empty before adding the row
                    return;
                }

                var newRow = $(html); // Create a new row using the html string
                newRow.find('#Product').val(productId); // Set the value of the "Product" input
                newRow.find('#NomField').val(productName); // Set the value of the "NomField" input
                newRow.find('#PrixField').val(price); // Set the value of the "PrixField" input
                newRow.find('#QuantiteField').val(quantity); // Set the value of the "QuantiteField" input
                newRow.find('#TotalField').val(total); // Set the value of the "TotalField" input

                newRow.find('button.btn-outline-danger').click(function() {
                    $(this).closest('tr').remove(); // Remove the row when the button is clicked
                });

                $("#frmProduct").append(newRow); // Append the new row to the table

                document.getElementById("Product").value = "";
                document.getElementById("NomField").value = "";
                document.getElementById("PrixField").value = "";
                document.getElementById("QuantiteField").value = "";
                document.getElementById("TotalField").value = "";
            })
        })
    </script>
    <!-- script for add rows with properties-->
    <script src="../js/getinfo.js"></script>
    <!-- script for remove rows from database-->
    <script src="../js/Deleterow2.js"></script>

    <script>
        $(document).ready(function() {
            $("#myForm").submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "../php/connexion.php",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        console.log(response);
                    },
                });
            });
        });
    </script>

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