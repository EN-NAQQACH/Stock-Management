<?php
include '../Fornisseur/Function.php';
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
                <a href="../html/Dashboard.html" class="nav-link" data-page="dashboard">
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
                <a href="order.html" class="nav-link">
                    <i class="bx bx-receipt icon-link" id="icons"></i>
                    <span class="name">Commandes</span>
                </a>
                <a href="vente.html" class="nav-link">
                    <i class="bx bx-cart-add icon-link" id="icons"></i>
                    <span class="name">Vente</span>
                </a>
                <a href="fornisseur.html" class="nav-link">
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
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
                <span class="dashboard">Fornisseur</span>
            </div>
        </nav>
        <div class="home-content" id="contentall" id="form" style="overflow: hidden;">
            <div style="display: flex;align-items: center;">
                <div style="font-size: 30px;margin: -35px 20px 0 0;cursor: pointer;"><a href="../php/fornisseur.php"><i class='bx bx-arrow-back'></i></a></div>
                <div style="font-size: 60px;margin-top: -30px;"><i class='bx bxs-user-circle'></i></div>
            </div>
            <?php
            // Fetch the client data
            $fornisseurData = gatFornisseur();

            // Check if data is available
            if (!empty($fornisseurData)) {
                $fornisseur = $fornisseurData[0]; // Assuming only one client is fetched
            ?>
                <form style="margin-top: -30px;overflow: hidden;padding:0 15px 0 0;" method="post" action="../Fornisseur/UpdateData.php">
                    <div class="row" style="flex-direction: column;align-items: center;">
                        <div class="col-md-7">
                            <div class="form-group" style="margin-top: 20px;">
                                <input type="hidden" class="form-control" id="formGroupExampleInput" name="id" value="<?php echo $_GET['id']; ?>">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group" style="margin-top: 20px;">
                                <label for="formGroupExampleInput" style="margin-bottom:5px;">Nom</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nom" name="Nom" autocomplete="off" value="<?php echo $fornisseur['Nom']; ?>">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group" style="margin-top: 20px;">
                                <label for="formGroupExampleInput2" style="margin-bottom:5px;">Prénom</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Prénom" name="Prenom" autocomplete="off" value="<?php echo $fornisseur['Prenom']; ?>">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group" style="margin-top: 20px;">
                                <label for="formGroupExampleInput3" style="margin-bottom:5px;">Téléphone</label>
                                <input type="number" class="form-control" id="formGroupExampleInput3" placeholder="ex: 0630254859" name="Telephone" autocomplete="off" value="<?php echo $fornisseur['Telephone']; ?>">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group" style="margin-top: 20px;">
                                <label for="formGroupExampleInput4" style="margin-bottom:5px;">Adresse</label>
                                <input type="Adresse" class="form-control" id="formGroupExampleInput4" placeholder="Adresse" name="Adress" autocomplete="off" value="<?php echo $fornisseur['Address']; ?>">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group" style="margin-top: 20px;">
                                <button type="submit" class="btn btn-primary" style="margin-top: 1px;padding: 6px 30px;background-color: #12192c;border: #394867;" name="BTNEDITER"> éditer </button>
                            </div>
                        </div>

                    </div>
                </form>
            <?php
            } else {
                // No client data found
                echo "Client not found";
            }
            ?>
        </div>

</body>

</html>

<?php
include '../php/script.php';
?>