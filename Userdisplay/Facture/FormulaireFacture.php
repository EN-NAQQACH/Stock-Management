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
    <link rel="stylesheet" href="../css/facture.css" />
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
            padding: 20px 40px;
        }

        header {
            height: 60px;
            background-color: #3da4f0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 20px;
        }

        header .text span {
            font-size: 1.3rem;
            color: white;
            font-weight: bold;
            letter-spacing: 1px;
            color: #3da4f0;
            opacity: 1;
        }

        .facture-home {
            padding: 0px 40px;
        }
    </style>
</head>

<body>
    <header>
        <div class="">
            <div style="font-size: 30px;cursor: pointer;"><a href="../php/Facture.php"><i class='bx bx-arrow-back' style="color: white;"></i></a></div>
        </div>
        <div class="text">
            <span style="color: white;">Easly Informatique</span>
        </div>
    </header>
    <main>
        <input type="hidden" class="form-control" name="id" value="<?php echo $_GET['id']; ?>">
        <div style="display: flex;justify-content: space-between;flex-wrap: wrap;">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <img style="height:150px;" src="../php/LOGO.png">
                <br>
                <div style="margin-top: -20px; color: gray;">
                    <h6 style="display: flex;align-items: center;"><i class='bx bx-envelope' style="font-size: 23px;margin-right: 5px;"></i><span>easly@easlyinfo.com</span></h6>
                    <h6 style="display: flex;align-items: center;"><i class='bx bxs-map' style="font-size: 23px;margin-right: 5px;"></i> <span> IMMEUBLE TIGHMERT N°:3, Boulevard Mohammed Cheikh Saadi Agadir 80000 Maroc</span></h6>
                    <h6></h6>
                    <h6 style="display: flex;align-items: center;"><i class='bx bx-phone' style="font-size: 23px;margin-right: 5px;"></i> <span>(+212) 0666-068756 </span></h6>
                </div>
            </div>
            <?php
            $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
            $id = $_GET['id'];
            $sql = "SELECT f.no, f.date, c.Nom, c.Prenom FROM facture AS f JOIN commandes AS cmd ON f.id_commandes = cmd.ID JOIN client AS c ON cmd.ID_Client = c.ID JOIN `article de commande` AS ac ON cmd.ID = ac.id_commandes JOIN article AS p ON ac.id_article = p.ID WHERE f.no = $id GROUP BY c.Nom;";
            $result = mysqli_query($connection, $sql);
            ?>
            <div style="margin-top: 20px;">
                <form>
                    <div class="roow">
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_object($result)) { ?>
                                <div class="col-md-8" style="margin:5px 0;">
                                    <label for="floatingTextarea">DATE:</label>
                                    <h4 style="margin-top: 5px;width:190px;"><?php echo $row->date ?></h4>
                                </div>
                </form>
            </div>
        </div>
    </main>
    <main class="facture-home">

        <h5 style="text-align:center;border:1px solid #ddd;margin-bottom:20px;padding:9px;text-transform: uppercase;"><span style="margin-right:10px;">client:</span> <?php echo $row->Nom ?> <?php echo $row->Prenom ?></h5>
        </div>

        <h6>FACTURE N°: <span style="text-decoration: underline;"><?php echo $row->no ?></span> </h6>
<?php }
                        } ?>
<div class="tables">
    <?php
    $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
    $sql = "SELECT f.id_commandes, c.Nom , p.Nom_Article ,p.ID, ac.Quantite, ac.Price, ac.Total FROM facture AS f JOIN commandes AS cmd ON f.id_commandes = cmd.ID JOIN client AS c ON cmd.ID_Client = c.ID JOIN `article de commande` AS ac ON cmd.ID = ac.id_commandes JOIN article AS p ON ac.id_article = p.ID WHERE f.no = $id;";
    $result = mysqli_query($connection, $sql);
    ?>
    <table class="table table-hover" id="tabledatta">
        <thead style="
                  background-color: #e9eefd;
                  border-radius: 50px;
                  position: sticky;
                  top: 0;
                ">
            <tr>
                <th style="border:1px solid #ddd;">no</th>
                <th style="border:1px solid #ddd;">Nom</th>
                <th style="border:1px solid #ddd;">Prix</th>
                <th style="border:1px solid #ddd;">Quantite</th>
                <th style="border:1px solid #ddd;">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_object($result)) { ?>
                    <tr>
                        <td style="border:1px solid #ddd;"><?php echo $row->ID ?></td>
                        <td style="border:1px solid #ddd;"><?php echo $row->Nom_Article ?></td>
                        <td style="border:1px solid #ddd;"><?php echo $row->Price ?></td>
                        <td style="border:1px solid #ddd;"><?php echo $row->Quantite ?></td>
                        <td style="border:1px solid #ddd;"><?php echo number_format($row->Total,2) ?></td>
                    </tr>
            <?php }
            } ?>
            <?php
            $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
            $sql = "SELECT ac.Total,SUM(ac.total) AS total_sum FROM facture AS f JOIN commandes AS cmd ON f.id_commandes = cmd.ID JOIN client AS c ON cmd.ID_Client = c.ID JOIN `article de commande` AS ac ON cmd.ID = ac.id_commandes JOIN article AS p ON ac.id_article = p.ID WHERE f.no = $id;";
            $result = mysqli_query($connection, $sql);
            ?>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_object($result)) { ?>
                    <tr>
                        <td colspan="4" style="border:1px solid #ddd;text-align:right;">Montant Ht</td>
                        <td colspan="1" style="border:1px solid #ddd;font-weight: bold;"><?php echo number_format($row->total_sum,2) ?></td>
                    </tr>
                    <?php
                    $totalSum = $row->total_sum;
                    $calculation = ($totalSum * 20) / 100;
                    ?>
            <tr>

                <td colspan="4" style="border:1px solid #ddd;text-align:right;">TVA20%</td>
                <td colspan="1" style="border:1px solid #ddd;"><?php echo number_format($calculation,2); ?></td>
            </tr>
            <tr>

                <td colspan="4" style="border:1px solid #ddd;text-align:right;">Montant ttc</td>
                <td colspan="1" style="border:1px solid #ddd;"><?php echo number_format($calculation+$totalSum,2); ?></td>
                <?php }
            } ?>
            </tr>

        </tbody>
</div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../js/getinfo.js"></script>
    <script src="../js/DeleteRow.js"></script>
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
    <script>
        flatpickr("input[type=date]", {});
    </script>
</body>

</html>
<?php
include '../php/script.php';
?>