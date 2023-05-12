<?php
include '../produits/Function2.php';
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/product.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>Document</title>
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
                    <h4 style="letter-spacing:1px;">Produit</h4>
                </div>
            </div>
            <div class="header-action"></div>
        </header>
        <main>
            <div style="display: flex;align-items: center;">
                <div style="font-size: 20px;margin: -35px 20px 0 0;cursor: pointer;"><a href="../php/Produits.php"><i class='bx bx-arrow-back'></i></a></div>
                <div style="font-size: 60px;margin-top: -30px;"><i class="bx bx-package icon-link" id="icons"></i></div>
            </div>
            <?php
            // Fetch the client data
            $produittData = gatProduct();

            // Check if data is available
            if (!empty($produittData)) {
                $produit = $produittData[0]; // Assuming only one client is fetched
            ?>
            <form enctype="multipart/form-data" method="post" action="../produits/UpdateData.php">
                <div class="row" style="flex-direction: column;align-items: center;">
                        <div class="col-md-7">
                            <div class="form-group" style="margin-top: 20px;">
                                <input type="hidden" class="form-control" id="formGroupExampleInput" name="id" value="<?php echo $_GET['id']; ?>">
                            </div>
                        </div>
                    <div class="col-md-7">
                        <div class="form-group" style="margin-top: 20px;">
                            <label for="formGroupExampleInput" style="margin-bottom:5px;">nom_article</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="nom" name="Nom" autocomplete="off" value="<?php echo $produit ['Nom_Article']; ?>">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group" style="margin-top: 20px;">
                            <label for="formGroupExampleInput2" style="margin-bottom:5px;">Catégorie</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="smartphone, pc" name="categorie" autocomplete="off" value="<?php echo $produit ['Categorie']; ?>">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group" style="margin-top: 20px;">
                            <label for="formGroupExampleInput3" style="margin-bottom:5px;">Quantité</label>
                            <input type="number" class="form-control" id="formGroupExampleInput3" placeholder="Quantité" name="quantite" autocomplete="off" value="<?php echo $produit ['Quantite']; ?>">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group" style="margin-top: 20px;">
                            <label for="formGroupExampleInput4" style="margin-bottom:5px;">Prix_unitaire</label>
                            <input type="number" class="form-control" id="formGroupExampleInput4" placeholder="ex: 1500DH" name="prix" autocomplete="off" value="<?php echo $produit ['PrixUnitaire']; ?>">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group" style="margin-top: 20px;">
                            <label for="" style="margin-bottom:5px;">Image de produit</label>
                            <input type="file" class="form-control"  placeholder="ex: png, jpeg" name="imageupload" autocomplete="off">
                            <input type="hidden" class="form-control"  placeholder="ex: png, jpeg" name="imageupload_old" autocomplete="off">
                            <img src="<?php echo "../upload/" .$produit ['image']; ?>" alt="" width="75px" height="75px" style="margin: 5px 0;">
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="form-group" style="margin-top: 20px;">
                            <label for="formGroupExampleInput4" style="margin-bottom:5px;">Date_fabrication</label>
                            <input type="date" class="form-control" id="formGroupExampleInput4"  name="date" autocomplete="off" value="<?php echo $produit ['DateFabrication']; ?>">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-primary" style="margin-top: 1px;padding: 6px 30px;background-color: #12192c;border: #394867;" name="btn"> éditer </button>
                        </div>
                    </div>

                </div>
            </form>
            <?php
            } else {
                // No client data found
                echo "Product not found";
            }
            ?>
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