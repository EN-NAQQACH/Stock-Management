<?php
require_once ("../php/connexion.php");
require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
use Dompdf\Options;

extract($_POST);
if(isset($_POST["submit"])){
    $connection = mysqli_connect('localhost', 'root', '', 'gestion_stock');
    $sql = "SELECT * FROM client";
    $result = mysqli_query($connection, $sql);
    $html = '';
    $html .= '
    
    <img src="../php/LOGO.png"style="width:190px;height:190px">
    <div style="border-top:1px solid #ddd;margin-bottom:25px;padding:0 7px;margin-top:-80px">
    <p style="font-size:14px;">Tél: (+212) 0528820175</p>
    <p style="font-size:14px;">Tél: (+212) 0666-068756</p>
    <p style="font-size:14px;">Email:easly@easlyinfo.com</p>
    <p style="font-size:14px;">Adresse: IMMEUBLE TIGHMERT N°:3 Boulevard Mohammed Cheikh Saadi Agadir 80000 Maroc</p>
    </div>
    <h2 style="text-align:center;border:1px solid #ddd;margin-bottom:20px;padding:9px;">Liste des clients</h2>
    <table style="width:100%;border-collapse:collapse">
      <tr style="background-color:#3da4f0;">
        <th scope="col" style="border:1px solid #ddd;padding:9px;text-align:left;color:white;">ID</th>
        <th scope="col" style="border:1px solid #ddd;padding:9px;text-align:left;color:white;">Nom</th>
        <th scope="col" style="border:1px solid #ddd;padding:9px;text-align:left;color:white;">Prénom</th>
        <th scope="col" style="border:1px solid #ddd;padding:9px;text-align:left;color:white;">Téléphone</th>
        <th scope="col" style="border:1px solid #ddd;padding:9px;text-align:left;color:white;">Adresse</th>
      </tr>
    ';
if(mysqli_num_rows($result)>0){
   /* $count=1;*/
    foreach($result as $data){
        $html .='
        <tr>
        <th style="border:1px solid #ddd;padding:9px;text-align:left;">'.$data["ID"].'</th>
        <td style="border:1px solid #ddd;padding:9px;text-align:left;">'.$data["Nom"].'</td>
        <td style="border:1px solid #ddd;padding:9px;text-align:left;">'.$data["Prenom"].'</td>
        <td style="border:1px solid #ddd;padding:9px;text-align:left;">'.$data["Telephone"].'</td>
        <td style="border:1px solid #ddd;padding:9px;text-align:left;">'.$data["Address"].'</td>
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
  $dompdf->stream("List de Client");
}
