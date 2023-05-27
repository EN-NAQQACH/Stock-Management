<?php
require_once("../easly/connexion.php");
require_once("../dompdf/autoload.inc.php");

use Dompdf\Dompdf;
use Dompdf\Options;

extract($_POST);

    $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
    $sql = "SELECT f.no, c.Nom, c.Prenom, f.date FROM facture AS f JOIN client AS c ON f.no_client = c.ID;";
    $result = mysqli_query($connection, $sql);
    $html = '';
    $html .= '
    
    <img src="../easly/LOGO.png"style="width:190px;height:190px">
    <div style="border-top:1px solid #ddd;margin-bottom:25px;padding:0 7px;margin-top:-80px">
    <p style="font-size:14px;">Tél: (+212) 0528820175</p>
    <p style="font-size:14px;">Tél: (+212) 0666-068756</p>
    <p style="font-size:14px;">Email:easly@easlyinfo.com</p>
    <p style="font-size:14px;">Adresse: IMMEUBLE TIGHMERT N°:3 Boulevard Mohammed Cheikh Saadi Agadir 80000 Maroc</p>
    </div>
    <h2 style="text-align:center;border:1px solid #ddd;margin-bottom:20px;padding:9px;">Liste des Commandes</h2>
    <table style="width:100%;border-collapse:collapse">
      <tr style="background-color:#3da4f0;">
        <th scope="col" style="border:1px solid #ddd;padding:9px;text-align:left;color:white;">N° Facture</th>
        <th scope="col" style="border:1px solid #ddd;padding:9px;text-align:left;color:white;">Nom</th>
        <th scope="col" style="border:1px solid #ddd;padding:9px;text-align:left;color:white;">Prénom</th>
        <th scope="col" style="border:1px solid #ddd;padding:9px;text-align:left;color:white;">Date</th>
      </tr>
    ';
    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $data) {
            $html .= '
                <tr>
                    <th scope="row" style="border:1px solid #ddd;padding:9px;text-align:center;">' . $data['no'] . '</th>
                    <td style="border:1px solid #ddd;padding:9px;text-align:left;">' . $data['Nom'] . '</td>
                    <td style="border:1px solid #ddd;padding:9px;text-align:left;">' . $data['Prenom'] . '</td>
                    <td style="border:1px solid #ddd;padding:15px;text-align:left;width:120px">' . $data['date'] . '</td>
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
    $dompdf->stream("List des Commandes");
