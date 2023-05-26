<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/clients.css">
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
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
                    <h4 style="letter-spacing:1px;">Clients</h4>
                </div>
            </div>
            <div class="header-action"></div>
        </header>
        <main>


            <div style="display: flex;align-items: center;">
                <div style="font-size: 30px;margin: -35px 20px 0 0;cursor: pointer;"><a href="../easly/Clients.php"><i class='bx bx-arrow-back'></i></a></div>
                <div style="font-size: 60px;margin-top: -30px;"><i class='bx bxs-user-circle'></i></div>
            </div>
            
            <form style="margin-top: -30px;overflow: hidden;padding:0 15px 0 0;" method="post" action="../client/insertData.php">
                <div class="row" style="flex-direction: column;align-items: center;">
                    <div class="col-md-7">
                        <div class="form-group" style="margin-top: 20px;">
                            <label for="formGroupExampleInput" style="margin-bottom:5px;">Nom</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nom" name="Nom" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group" style="margin-top: 20px;">
                            <label for="formGroupExampleInput2" style="margin-bottom:5px;">Prénom</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Prénom" name="Prenom" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group" style="margin-top: 20px;">
                            <label for="formGroupExampleInput3" style="margin-bottom:5px;">Téléphone</label>
                            <input type="number" class="form-control" id="formGroupExampleInput3" placeholder="ex: 0630254859" name="Telephone" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group" style="margin-top: 20px;">
                            <label for="formGroupExampleInput4" style="margin-bottom:5px;">Adresse</label>
                            <input type="Adresse" class="form-control" id="formGroupExampleInput4" placeholder="Adresse" name="Adress" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-primary" style="margin-top: 1px;padding: 6px 30px;background-color: #12192c;border: #394867;" name="BTNAJOUTER"> Ajouter </button>
                        </div>
                    </div>

                </div>
            </form>
        </main>
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