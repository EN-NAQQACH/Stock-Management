<?php
require_once ("../easly/connexion.php");
require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
use Dompdf\Options;
extract($_POST);
var_dump($_POST);
$idfr = $_GET['id'] ;
$connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
$sql = "SELECT f.no, f.date, c.Nom, c.Prenom FROM facture AS f JOIN commandes AS cmd ON f.id_commandes = cmd.ID JOIN client AS c ON cmd.ID_Client = c.ID JOIN `article de commande` AS ac ON cmd.ID = ac.id_commandes JOIN article AS p ON ac.id_article = p.ID WHERE f.no = $idfr GROUP BY c.Nom;";
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
    <pre style="color:#241a2c;font-weight:500;"> Facture N°: #' . $data['no'].'</pre>
    <pre style="color:#241a2c;font-weight:500;">  Date:  ' . $data['date'].'</pre>
</div>
    <h3 style="text-align:center;border:1px solid #ddd;margin-bottom:10px;padding:9px;color:#241a2c;"><span style="margin-right:6px;text-transform: uppercase;">client:</span><span style="margin-right:1px;text-transform: uppercase;">' . $data['Nom'].'</span> <span style="text-transform: uppercase;">' .$data['Prenom']. '</span>  </h3>
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
    $idfr = $_GET['id'] ;
    $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
    $sql = "SELECT f.no, f.date, f.id_commandes, c.Nom , p.Nom_Article ,p.ID, ac.Quantite, ac.Price, ac.Total FROM facture AS f JOIN commandes AS cmd ON f.id_commandes = cmd.ID JOIN client AS c ON cmd.ID_Client = c.ID JOIN `article de commande` AS ac ON cmd.ID = ac.id_commandes JOIN article AS p ON ac.id_article = p.ID WHERE f.no = $idfr ;";
    $result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0) {
  foreach ($result as $data) {
    $html .= '
        <tr>
            <td style="border:1px solid #ddd;padding:9px;text-align:left;">' . $data['Nom_Article'] . '</td>
            <td style="border:1px solid #ddd;padding:9px;text-align:left;">' . $data['Quantite'] . '</td>
            <td style="border:1px solid #ddd;padding:9px;text-align:left;">' . $data['Price'] . '</td>
            <td style="border:1px solid #ddd;padding:9px;text-align:left;">' . $data['Total'] . '</td>
        </tr>
    ';
}
}else{
    $html .='
    <tr>
       <td colspan="5" style="border:1px solid #ddd;padding:9px;text-align:left;">No Data</td>
    </tr>
    ';
}
$options = new Options();
$options->set('defaultFont', 'Courier');
$dompdf = new Dompdf($options);
  $html .= '</table>';
  $dompdf = new Dompdf();
  $dompdf->loadHtml($html);
  $dompdf->setPaper("A4", "portrait");
  $dompdf->render();
  $dompdf->stream("List des factures");
