<?php
session_start();
include '../php/connexion.php';


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

            <input type="hidden" class="form-control" id="formGroupExampleInput" name="id" value="<?php echo $_GET['id']; ?>">
            <?php
            $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
            if (!$connection) {
                die('Database connection failed: ' . mysqli_connect_error());
            }
            ?>
            <?php
            $idc = $_GET['id'];
            $query = "SELECT p.ID, p.Nom_Article, ac.Quantite, ac.Price, ac.Total
          FROM commandes AS cmd
          JOIN client AS c ON cmd.ID_Client = c.ID
          JOIN `article de commande` AS ac ON cmd.ID = ac.id_commandes
          JOIN article AS p ON ac.id_article = p.ID
          WHERE cmd.ID = $idc";

            $result = mysqli_query($connection, $query);
            if (!$result) {
                die('Query failed: ' . mysqli_error($connection));
            }
            ?>
            <?php
            $rows = '';
            while ($row = mysqli_fetch_assoc($result)) {
                $rows .= '<tr>';
                $rows .= '<td style="border:1px solid #ddd;padding:9px;text-align:left;">' . $row['Nom_Article'] . '</td>';
                $rows .= '<td style="border:1px solid #ddd;padding:9px;text-align:left;">' . $row['Price'] . '</td>';
                $rows .= '<td style="border:1px solid #ddd;padding:9px;text-align:left;">' . $row['Quantite'] . '</td>';
                $rows .= '<td style="border:1px solid #ddd;padding:9px;text-align:left;">' . $row['Total'] . '</td>';
                $rows .= '</tr>';
            }
            ?>


            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Smart Invoice Print</h4>
                    </div>
                    <div class="modal-body" id="print_content">

                        <title>Smart Invoice</title>

                        <div class="page">
                            <table style="width: 100%; margin-bottom: 20px">
                                <tbody>
                                    <tr>
                                        <td style="text-align: left;">
                                            <span style="font-size: 22px; font-weight: bold;"><img src="../php/LOGO.png" height="150px" width="150px" style="margin-bottom: -20px;"> </span><br>
                                            Email:easly@easlyinfo.com<br>
                                            Adresse: IMMEUBLE TIGHMERT N°:3,
                                            Boulevard Mohammed Cheikh Saadi<br>
                                            Agadir 80000 Maroc<br>
                                            Tél: (+212) 0666-068756<br>
                                        </td>
                                        <td style="text-align: right;">
                                            commande # 6481<br>
                                            May 04, 2023<br>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                            <table style="width: 100%; margin-top: 40px;">
                                <tbody>
                                    <tr>
                                        <td style="text-align:left;">
                                            <h5 style="line-height:10px;background-color: #3da4f0;display:inline-block;padding:10px 20px 10px 10px;">Commander par,</h5><br>
                                            Gsuehhs,<br>
                                            Gsgsusvsgs
                                        </td>

                                        <td style="text-align: right;">

                                        </td>

                                    </tr>
                                </tbody>
                            </table>

                            <hr class="divider">

                            <table class="table table-hover">
                                <thead>
                                    <tr style="border-bottom: 1px solid #ccc; line-height: 30px; font-weight: bold;background-color: #3da4f0;">
                                        <th style="border:1px solid #ddd;padding:9px;text-align:left;">Produit</th>
                                        <th style="border:1px solid #ddd;padding:9px;text-align:left;">Price</th>
                                        <th style="border:1px solid #ddd;padding:9px;text-align:left;">Quantity</th>
                                        <th style="border:1px solid #ddd;padding:9px;text-align:left;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo $rows; ?>
                                </tbody>
                            </table>
                            <div style="width:100%;">
                                <div style="width:50%;padding:0px;margin:0px 20px;float:right;">
                                    <div style="text-align:right">
                                        <span style="width:150px;display: inline-block;">Total:&nbsp;</span> <span style="width:150px;display: inline-block;font-weight: bold;"> 5567.38 DH</span><br>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
            </di>

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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>

<?php
include '../php/script.php';
?>