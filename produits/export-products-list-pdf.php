<?php
require_once ("../php/connexion.php");
require_once ("../vendor/autoload.php");
use Dompdf\Dompdf;
use Dompdf\Options;

extract($_POST);
if(isset($_POST["submit"])){
    $connection = mysqli_connect('localhost', 'root', '', 'gestion_stock');
    $sql = "SELECT * FROM article";
    $result = mysqli_query($connection, $sql);
    $html = '';
    $html .= '
    <h1 style="margin-bottom:17px;margin-top:-20px;text-align:left;color:#5f9bce;">EASLY INFORMATIQUE</h1>
    <div style="border:1px solid #ddd;margin-bottom:15px;padding:0 9px;">
    <p style="font-size:14px;">Tél: (+212) 0528820175</p>
    <p style="font-size:14px;">Tél: (+212) 0666-068756</p>
    <p style="font-size:14px;">Email:easly@easlyinfo.com</p>
    <p style="font-size:14px;">Adresse: IMMEUBLE TIGHMERT N°:3 Boulevard Mohammed Cheikh Saadi Agadir 80000 Maroc</p>
    </div>
    <h2 style="text-align:center;border:1px solid #ddd;margin-bottom:20px;padding:9px;">Liste des produits</h2>
    <table style="width:100%;border-collapse:collapse">
      <tr>
        <th scope="col" style="border:1px solid #ddd;padding:9px;text-align:left;">ID</th>
        <th scope="col" style="border:1px solid #ddd;padding:9px;text-align:left;">Nom_Article</th>
        <th scope="col" style="border:1px solid #ddd;padding:9px;text-align:left;">Categorie</th>
        <th scope="col" style="border:1px solid #ddd;padding:9px;text-align:left;">Quantite</th>
        <th scope="col" style="border:1px solid #ddd;padding:9px;text-align:left;">Prix (dh)</th>
        <th scope="col" style="border:1px solid #ddd;padding:9px;text-align:left;">DateFabrication</th>
      </tr>
    ';
if(mysqli_num_rows($result)>0){
   /* $count=1;*/
    foreach($result as $data){
        $html .='
        <tr>
        <th style="border:1px solid #ddd;padding:9px;text-align:left;">'.$data["ID"].'</th>
        <td style="border:1px solid #ddd;padding:9px;text-align:left;">'.$data["Nom_Article"].'</td>
        <td style="border:1px solid #ddd;padding:9px;text-align:left;">'.$data["Categorie"].'</td>
        <td style="border:1px solid #ddd;padding:9px;text-align:left;">'.$data["Quantite"].'</td>
        <td style="border:1px solid #ddd;padding:9px;text-align:left;">'.$data["PrixUnitaire"].'</td>
        <td style="border:1px solid #ddd;padding:9px;text-align:left;">'.$data["DateFabrication"].'</td>
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
  $dompdf->stream("List des Produits");
}
