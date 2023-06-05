<?php
require_once ("../easly/connexion.php");
require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
use Dompdf\Options;
extract($_POST);
var_dump($_POST);
$id_comd = $_GET['id'] ;
$connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
$sql = "SELECT cmd.ID,cmd.date, c.Nom
FROM commandes AS cmd
JOIN client AS c ON cmd.ID_Client = c.ID
WHERE cmd.ID = $id_comd";
$result = mysqli_query($connection, $sql);
    $html = '';
    if (mysqli_num_rows($result) > 0) {
      foreach ($result as $data) {
    $html .= '
    <img src="../easly/LOGO.png"style="width:190px;height:190px">

    <div style="border-top:1px solid #ddd;margin-bottom:25px;padding:0 7px;margin-top:-60px">
    <p style="font-size:14px;">Tél: (+212) 0528820175</p>
    <p style="font-size:14px;">Tél: (+212) 0666-068756</p>
    <p style="font-size:14px;">Email:easly@easlyinfo.com</p>
    <p style="font-size:14px;">Adresse: IMMEUBLE TIGHMERT N°:3 Boulevard Mohammed Cheikh Saadi Agadir 80000 Maroc</p>
    </div>
    <div >
    <pre style="color:#241a2c;font-weight:500;"> Commandes N°: #' . $data['ID'].'</pre>
    <pre style="color:#241a2c;font-weight:500;">  Date:  ' . $data['date'].'</pre>
</div>
    <h3 style="text-align:center;border:1px solid #ddd;margin-bottom:10px;padding:9px;color:#241a2c;"><span style="margin-right:6px;text-transform: uppercase;">client:</span><span style="margin-right:1px;text-transform: uppercase;">' . $data['Nom'].'</span> <span style="text-transform: uppercase;"></span>  </h3>
    <div>
    </div>

    <table style="width:100%;border-collapse:collapse">
      <tr style="background-color:#3da4f0;">
        <th scope="col" style="border:1px solid #ddd;padding:9px;text-align:left;color:white;">Article</th>
        <th scope="col" style="border:1px solid #ddd;padding:9px;text-align:left;color:white;">Quantite</th>
        <th scope="col" style="border:1px solid #ddd;padding:9px;text-align:left;color:white;">price</th>
        <th scope="col" style="border:1px solid #ddd;padding:9px;text-align:left;color:white;">Total</th>
      </tr>
    ';
      }}
    $id_comd = $_GET['id'] ;
    $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
    $sql = "SELECT p.ID , p.Nom_Article , ac.Quantite, ac.Price, ac.Total
    FROM commandes AS cmd
    JOIN client AS c ON cmd.ID_Client = c.ID
    JOIN `article de commande` AS ac ON cmd.ID = ac.id_commandes
    JOIN article AS p ON ac.id_article = p.ID
    WHERE cmd.ID = $id_comd;
    ";
    $result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0) {
  foreach ($result as $data) {
    $html .= '
        <tr>
            <td style="border:1px solid #ddd;padding:9px;text-align:left;">' . $data['Nom_Article'] . '</td>
            <td style="border:1px solid #ddd;padding:9px;text-align:left;">' . $data['Quantite'] . '</td>
            <td style="border:1px solid #ddd;padding:9px;text-align:left;">' . number_format($data['Price'], 2) . '</td>
            <td style="border:1px solid #ddd;padding:9px;text-align:left;">' . number_format($data['Total'], 2) . '</td>
        </tr>
    ';
}
}else{
    $html .='
    <tr>
       <td colspan="5" style="border:1px solid #ddd;padding:9px;text-align:left;">liste vide</td>
    </tr>
    ';
}

$id_comd = $_GET['id'] ;
    $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
    $sql = "SELECT SUM(ac.Total) AS total_sum, SUM(ac.Total)*0.2 as tva, SUM(ac.Total)*1.2 as ttc
            FROM commandes AS cmd
    JOIN client AS c ON cmd.ID_Client = c.ID
    JOIN `article de commande` AS ac ON cmd.ID = ac.id_commandes
    JOIN article AS p ON ac.id_article = p.ID
    WHERE cmd.ID = $id_comd;";
    $result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0) {
  foreach ($result as $data) {
    $html .= '
        <tr>
        <td colspan="3" style="border:1px solid #ddd;padding:9px;text-align:right;">Montant HT</td>
        <td colspan="1" style="border:1px solid #ddd;padding:9px;text-align:left;font-weight:bold;">' . number_format($data['total_sum'], 2) . '</td>
        </tr>
        <tr>
        <td colspan="3" style="border:1px solid #ddd;padding:9px;text-align:right;">TVA20%</td>
        <td colspan="1" style="border:1px solid #ddd;padding:9px;text-align:left;">' . number_format($data['tva'], 2) . '</td>
        </tr>
        <tr>
        <td colspan="3" style="border:1px solid #ddd;padding:9px;text-align:right;">Montant TTc</td>
        <td colspan="1" style="border:1px solid #ddd;padding:9px;text-align:left;font-weight:bold;">' . number_format($data['ttc'], 2) . '</td>
        </tr>
        ';
      }
      }

$options = new Options();
$options->set('defaultFont', 'Courier');
$dompdf = new Dompdf($options);
  $html .= '</table>';
  $dompdf = new Dompdf();
  $dompdf->loadHtml($html);
  $dompdf->setPaper("A4", "portrait");
  $dompdf->render();
  $dompdf->stream("List de Commandes");
