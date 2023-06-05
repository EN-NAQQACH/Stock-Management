<?php
require_once ("../easly/connexion.php");
require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
use Dompdf\Options;
extract($_POST);
var_dump($_POST);
$idfr = $_GET['id'] ;
$connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
$sql = "SELECT DISTINCT f.ID , f.Nom, ff.date, ff.no
FROM facturefornisseur AS ff
JOIN fornisseur AS f ON ff.ID_Fornisseur = f.ID
WHERE ff.no = $idfr
GROUP BY f.ID;";
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
    <div style="
    border-radius: 10px;
    overflow: hidden;
    width: 20%;
    border: black 1px solid;
    margin: auto;
    margin:0;
  ">
    <table style="border-collapse: collapse;width: 100%;text-align: center;">
  <thead>
      <tr>
          <th style="border: 1px solid black;
          padding: 8px;border-radius: 5px;">Facture N°</th>
      </tr>
  </thead>
  <tbody>
      <tr>
          <td style="border: 1px solid black;
          padding: 8px;border-radius: 5px;">' . $data['no'].'</td>
      </tr>
  </tbody>
</table>
</div>
    <h3 style="text-align:center;border:1px solid #ddd;margin-bottom:10px;padding:9px;color:#241a2c;"><span style="margin-right:6px;text-transform: uppercase;">client:</span><span style="margin-right:1px;text-transform: uppercase;">' . $data['Nom'].'</span> <span style="text-transform: uppercase;"></span>  </h3>
    <div>
    </div>

    <table style="width:100%;border-collapse:collapse">
      <tr style="background-color: #e9eefd;">
        <th width="50%" scope="col" style="border:1px solid black;padding:9px;text-align:left;color:black;">Article</th>
        <th width="10%" scope="col" style="border:1px solid black;padding:9px;text-align:left;color:black;">Quantite</th>
        <th width="20%" scope="col" style="border:1px solid black;padding:9px;text-align:left;color:black;">price</th>
        <th width="20%" scope="col" style="border:1px solid black;padding:9px;text-align:left;color:black;">Total</th>
      </tr>
    ';
      }}
    $idfr = $_GET['id'] ;
    $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
    $sql = "SELECT p.ID , p.Nom_Article , af.Quantite, af.Price, af.Total
    FROM facturefornisseur AS fac
    JOIN fornisseur AS f ON fac.ID_Fornisseur  = f.ID
    JOIN `article de facture fournisseur` AS af ON fac.no = af.id_facture
    JOIN article AS p ON af.id_article = p.ID
    WHERE fac.no = $idfr;";
    $result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0) {
  foreach ($result as $data) {
    $html .= '
        <tr>
            <td style="border-bottom:0px solid transparent;padding:4px;">' . $data['Nom_Article'] . '</td>
            <td style="border-bottom:0px solid transparent;padding:4px;border-left:1px solid black;">' . $data['Quantite'] . '</td>
            <td style="border-bottom:0px solid transparent;padding:4px;border-left:1px solid black;">' . number_format($data['Price'], 2) . '</td>
            <td style="border-bottom:0px solid transparent;padding:4px;border-left:1px solid black;">' . number_format($data['Total'], 2) . '</td>
    ';
}
}else{
    $html .='
    <tr>
       <td colspan="5" style="border:1px solid black;padding:9px;text-align:left;">No Data</td>
    </tr>
    ';
}
$idfr = $_GET['id'] ;
    $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
    $sql = "SELECT SUM(ac.Total) AS total_sum, SUM(ac.Total)*0.2 as tva, SUM(ac.Total)*1.2 as ttc 
    FROM facturefornisseur AS fac
    JOIN fornisseur AS f ON fac.ID_Fornisseur  = f.ID
    JOIN `article de facture fournisseur` AS ac ON fac.no = ac.id_facture
    JOIN article AS p ON ac.id_article = p.ID
    WHERE fac.no = $idfr;";
    $result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0) {
  foreach ($result as $data) {
    $html .= '
    <tr>
    <td style="border-bottom:0px solid transparent;padding-bottom:300px;border-left:1px solid black;"></td>
    <td style="border-bottom:0px solid transparent;padding-bottom:300px;border-left:1px solid black;"></td>
    <td style="border-bottom:0px solid transparent;padding-bottom:300px;border-left:1px solid black;"></td>
    <td style="border-bottom:0px solid transparent;padding-bottom:300px;border-left:1px solid black;"></td>
    <td style="border-bottom:0px solid transparent;padding-bottom:300px;border-left:1px solid black;"></td>
  </tr>
        <tr>
        <td colspan="3" style="border:1px solid black;padding:9px;text-align:right;">Montant HT</td>
        <td colspan="1" style="border:1px solid black;padding:9px;text-align:left;font-weight:bold;">' . number_format($data['total_sum'], 2) . '</td>
        </tr>
        <tr>
        <td colspan="3" style="border:1px solid black;padding:9px;text-align:right;">TVA20%</td>
        <td colspan="1" style="border:1px solid black;padding:9px;text-align:left;">' . number_format($data['tva'], 2) . '</td>
        </tr>
        <tr>
        <td colspan="3" style="border:1px solid black;padding:9px;text-align:right;">Montant TTc</td>
        <td colspan="1" style="border:1px solid black;padding:9px;text-align:left;font-weight:bold;">' . number_format($data['ttc'], 2) . '</td>
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
 $dompdf->stream("facture.pdf", ["Attachment" => false]);
