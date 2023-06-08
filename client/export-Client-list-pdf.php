<?php
require_once ("../easly/connexion.php");
require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
use Dompdf\Options;

extract($_POST);
if(isset($_POST["submit"])){
    $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
    $sql = "SELECT * FROM client";
    $result = mysqli_query($connection, $sql);
    $html = '';
    $html .= '
    <head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    </head>
    <body>
      
    
    <img src="../easly/easlylogo.png" style="margin-left:-37px;margin-top:-10px;" width="150" height="60">
    <div style="margin-left:110px;margin-top:-100px;margin-right:-37px;font-family: Poppins, sans-serif;">
    <ul> <span style="margin-left:-25px;font-weight:bold;">Vente, Réparation, Fourniture des Matériels & Consommables :</span>
    <li style="font-size:13.5px";>Informatique, Logiciel, Sécurité & Sauvegarde.</li>
    <li style="font-size:13.5px";>Bureautique, Papeterie, Imprimerie & Mobilier de Bureau.</li>
    <li style="font-size:13.5px";>Réseau Informatique, Téléphonie Sonorisation.</li>
    <li style="font-size:13.5px";>Vidéo Surveillance, Contrôle d accès, Alarme & Incendie.</li>
    </ul>
    </div>
    <h3 style="text-align:center;border:1px solid #ddd;margin-bottom:20px;padding:9px;margin-left:-37px;margin-right:-37px;">Liste des clients</h3>
    <table style="width:100%;border-collapse:collapse;margin-left:-37px;margin-right:-37px;">
      <tr style="background-color:#3da4f0;">
        <th scope="col" style="border:1px solid #ddd;padding:9px;text-align:left;color:white;">ID</th>
        <th scope="col" style="border:1px solid #ddd;padding:9px;text-align:left;color:white;">Nom</th>
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
$html.='
<footer style="min-width:100%;margin-left:-37px;font-family: Poppins, sans-serif;margin-right:-37px;font-size:12px;font-weight:600;position:absolute;top:97%;line-height:1.3px;">
<p style="text-align:center;">SARL au capital de 1 200.000 Dhs - Patente N° 48355035-IF 06927043 RC N° 8669-CNSS Nº 6439766-ICE N°:001543892000084</p>
<p style="text-align:center;">CB N°007 01 0000 1845 00000 1911 91 /Attijariwafabank Centre d affaire Agadir Hassan -Tél: 0528 820175-0528843303 Fax: 0528 827857-E-mail:</p>
<p style="text-align:center;">easly@easlyinfo.com,SIEGE m. TIGHMERT, N° 3, Av. CHEIKH SAADI Talborjt - Agadir,</p>
</footer></body>';
$options = new Options();
$options->set('defaultFont', 'Courier');
$dompdf = new Dompdf($options);
  $dompdf = new Dompdf();
  $dompdf->loadHtml($html);
  $dompdf->setPaper("A4", "portrait");
  $dompdf->render();
  $dompdf->stream("List des Clients", ["Attachment" => false]);
}
