<?php ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Dashboard.css">
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
                <a href="../php/Dashboard.php" class="nav-link" data-page="dashboard">
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
                <a href="../php/Commandes.php" class="nav-link">
                    <i class="bx bx-receipt icon-link" id="icons"></i>
                    <span class="name">Commandes</span>
                </a>
                <a href="../php/vente.php" class="nav-link">
                    <i class="bx bx-cart-add icon-link" id="icons"></i>
                    <span class="name">Vente</span>
                </a>
                <a href="../php/fornisseur.php" class="nav-link">
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
                <span class="dashboard">Produits</span>
            </div>
        </nav>
        <div class="home-content" id="contentall" id="form" style="overflow: hidden;">
            <div style="display: flex;align-items: center;">
                <div style="font-size: 20px;margin: -35px 20px 0 0;cursor: pointer;"><a href="../php/produits.php"><i class='bx bx-arrow-back'></i></a></div>
                <div style="font-size: 60px;margin-top: -30px;"><i class="bx bx-package icon-link" id="icons"></i></div>
            </div>
            <form method="post" action="../produits/insertDataProduit.php" style="margin-top: -40px;overflow: hidden;padding:0 15px 0 0;">
                <div class="row" style="flex-direction: column;align-items: center;">
                    <div class="col-md-7">
                        <div class="form-group" style="margin-top: 20px;">
                            <label for="formGroupExampleInput" style="margin-bottom:5px;">nom_article</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="nom" name="Nom" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group" style="margin-top: 20px;">
                            <label for="formGroupExampleInput2" style="margin-bottom:5px;">Catégorie</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="smartphone, pc" name="categorie" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group" style="margin-top: 20px;">
                            <label for="formGroupExampleInput3" style="margin-bottom:5px;">Quantité</label>
                            <input type="number" class="form-control" id="formGroupExampleInput3" placeholder="Quantité" name="quantite" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group" style="margin-top: 20px;">
                            <label for="formGroupExampleInput4" style="margin-bottom:5px;">Prix_unitaire</label>
                            <input type="number" class="form-control" id="formGroupExampleInput4" placeholder="ex: 1500DH" name="prix" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group" style="margin-top: 20px;">
                            <label for="formGroupExampleInput4" style="margin-bottom:5px;">Date_fabrication</label>
                            <input type="date" class="form-control" id="formGroupExampleInput4" placeholder="Adresse" name="date" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-primary" style="margin-top: 1px;padding: 6px 30px;background-color: #12192c;border: #394867;" name="BTNAJOUTER"> Ajouter </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>

</body>

</html>
<?php
include '../php/script.php';
?>