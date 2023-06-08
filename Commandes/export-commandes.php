<?php
require_once ("../easly/connexion.php");
require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
use Dompdf\Options;
extract($_POST);
var_dump($_POST);
$id_comd = $_GET['id'] ;
$connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
$sql = "SELECT cmd.ID,cmd.date, c.Nom,c.Telephone
FROM commandes AS cmd
JOIN client AS c ON cmd.ID_Client = c.ID
WHERE cmd.ID = $id_comd";
$result = mysqli_query($connection, $sql);
    $html = '';
    if (mysqli_num_rows($result) > 0) {
      foreach ($result as $data) {
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

    <!---------<div >
    <p style="font-size:14px;">Tél: (+212) 0528820175</p>
    <p style="font-size:14px;">Tél: (+212) 0666-068756</p>
    <p style="font-size:14px;">Email:easly@easlyinfo.com</p>
    <p style="font-size:14px;">Adresse: IMMEUBLE TIGHMERT N°:3 Boulevard Mohammed Cheikh Saadi Agadir 80000 Maroc</p>
    </div>------->

    <section style="margin-bottom:10px;padding:0;margin-left:-37px;">
    <div style="
    border-radius: 10px;
    overflow: hidden;
    width: 20%;
    height:60px;
    border: black 1px solid;
    margin: auto;
    margin:0;font-family: Poppins, sans-serif;
  ">
    <table style="border-collapse: collapse;width: 100%;text-align: center;">
  <thead>
      <tr>
          <th style="border-bottom: 1px solid black;
          padding: 5px;border-radius: 5px;font-size:14px;">Commande N°</th>
      </tr>
  </thead>
  <tbody>
      <tr>
          <td style="border-top: 1px solid black;
          padding: 8px;border-radius: 5px;font-size:14px;">' . $data['ID'] . '</td>
      </tr>
  </tbody>
</table>
</div>
</div>
<div style="
border-radius: 10px;
overflow: hidden;
width: 20%;
height:60px;
border: black 1px solid;
margin: auto;
margin-left:155px;margin-top:-150px;font-family: Poppins, sans-serif;
">
<table style="border-collapse: collapse;width: 100%;text-align: center;">
<thead>
  <tr>
      <th style="border-bottom: 1px solid black;
      padding: 5px;border-radius: 5px;font-size:14px;">Client</th>
  </tr>
</thead>
<tbody>
  <tr>
      <td style="border-top: 1px solid black;
      padding: 8px;border-radius: 5px;font-size:14px;">' . $data['ID'] . '</td>
  </tr>
</tbody>
</table>
</div>
</div>
<div style="
border-radius: 10px;
overflow: hidden;
width: 20%;
border: black 1px solid;
margin: auto;
height:60px;
margin-left:310px;margin-top:-150px;font-family: Poppins, sans-serif;
">
<table style="border-collapse: collapse;width: 100%;text-align: center;">
<thead>
  <tr>
      <th style="border-bottom: 1px solid black;
      padding: 5px;border-radius: 5px;font-size:14px;">Date</th>
  </tr>
</thead>
<tbody>
  <tr>
      <td style="border-top: 1px solid black;
      padding: 8px;border-radius: 5px;font-size:14px;">' . $data['date'] . '</td>
  </tr>
</tbody>
</table>
</div>
<div style="
    border-radius: 10px;
    overflow: hidden;
    width:42%;
    height:100px;
    border: black 1px solid;
    margin: auto;
    margin:0;
    margin-left:465px;margin-top:-150px;
    
  ">
   <p style="margin:6px 0 20px 6px;">' . $data['Nom'] . '</p>
   <p style="margin:0px 0 0 50px;">Tel:' . $data['Telephone'] . '</p>
</div>
</section>
<p style="margin-left:-32px;margin-top:-18px;margin-bottom:7px;font-family: Poppins, sans-serif;font-size:13px;">BON DE COMMANDE N°:</p>
<div style="border-radius: 11px;
overflow: hidden;
border: black 1px solid;min-width:100%;margin-left:-37px;margin-right:-37px;font-family: Poppins, sans-serif;font-size:13px;height:68%;overflow:hidden;">
    <table style="width:100%;border-collapse:collapse;margin-right:-5px;margin-right:-2px;overflow:hidden;max-height:100%;">
      <tr >
        <th width="60%" scope="col" style="border-top:1px solid transparent;border-bottom:1px solid black;border-right:1px solid black;padding:9px;text-align:left;color:black;text-align:center;">Article</th>
        <th width="5%" scope="col" style="border-top:1px solid transparent;border-bottom:1px solid black;border-right:1px solid black;padding:9px;text-align:left;color:black;text-align:center;">Quantite</th>
        <th width="10%" scope="col" style="border-top:1px solid transparent;border-bottom:1px solid black;border-right:1px solid black;padding:9px;text-align:left;color:black;text-align:center;">Price</th>
        <th width="25%" scope="col" style="border-top:1px solid transparent;border-bottom:1px solid black;border-right:1px solid black;padding:9px;text-align:left;color:black;text-align:center;">Total</th>
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
    <td style="border-bottom:0px solid transparent;padding:4px;">' . $data['Nom_Article'] . '</td>
    <td style="border-bottom:0px solid transparent;padding:4px;border-left:1px solid black;text-align:right;">' . $data['Quantite'] . '</td>
    <td style="border-bottom:0px solid transparent;padding:4px;border-left:1px solid black;text-align:right;">' . number_format($data['Price']) . '</td>
    <td style="border-bottom:0px solid transparent;padding:4px;border-left:1px solid black;text-align:right;">' . number_format($data['Total']) . '</td>
    </tr>
    ';
}

if (mysqli_num_rows($result) <= 5) {
  $html .= '
  <tr >
  <td style="border-bottom:0px solid transparent;border-left:1px solid transparent;height:80%;overflow:hidden;"></td>
  <td style="border-bottom:0px solid transparent;border-left:1px solid black;"></td>
  <td style="border-bottom:0px solid transparent;border-left:1px solid black;"></td>
  <td style="border-bottom:0px solid transparent;border-left:1px solid black;"></td>
  </tr>
  ';
}else{
  $html .= '
  <tr >
  <td style="border-bottom:0px solid transparent;border-left:1px solid transparent;height:63%;overflow:hidden;"></td>
  <td style="border-bottom:0px solid transparent;border-left:1px solid black;"></td>
  <td style="border-bottom:0px solid transparent;border-left:1px solid black;"></td>
  <td style="border-bottom:0px solid transparent;border-left:1px solid black;"></td>
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
    <!----------<tr>
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
    </tr>----------------------->
    </table></div>
    <div style="
border-radius: 14px;
overflow: hidden;
width: 40%;
border: black 1px solid;
margin: auto;
height:80px;
margin-right:-37px;
font-family: Poppins, sans-serif;
font-size:13.5px;
margin-top:10px;
">
<table style="border-collapse: collapse;width: 100%;">
<thead>
<tr>
  <th style="border-bottom: 1px solid black;border-right:1px solid black;
  padding: 2px;border-radius: 5px;font-size:12px;font-weight:bold;text-align:left;padding-left: 7px;width:40%;">Total HT</th>
  <td colspan="3" style="border-bottom:1px solid black;padding:4.5px;text-align:right;">' . number_format($data['total_sum']) . '</td>
</tr>
<tr>
<th style="border-bottom: 1px solid black;border-right:1px solid black;
padding: 2px;padding-left: 7px;border-radius: 5px;font-size:12px;font-weight:bold;text-align:left;width:40%;">Total TVA20%</th>
<td colspan="3" style="border:1px solid black;padding:5px;text-align:right;border-right:1px solid transparent;">' . number_format($data['tva']) . '</td>
</tr>
<tr>
<th style="border-right: 1px solid black;
padding: 2px;border-radius: 5px;font-size:12px;font-weight:bold;text-align:left;padding-left: 7px;width:40%;">Total TTc</th>
<td colspan="3" style="border-left: 1px solid black;padding:5.5px;text-align:right;">' . number_format($data['ttc']) . '</td>
</tr>
</thead>
</table>
</div>
    <footer style="min-width:100%;margin-left:-37px;font-family: Poppins, sans-serif;margin-right:-37px;font-size:12px;font-weight:600;position:absolute;top:97%;line-height:1.3px;">
<p style="text-align:center;">SARL au capital de 1 200.000 Dhs - Patente N° 48355035-IF 06927043 RC N° 8669-CNSS Nº 6439766-ICE N°:001543892000084</p>
<p style="text-align:center;">CB N°007 01 0000 1845 00000 1911 91 /Attijariwafabank Centre d affaire Agadir Hassan -Tél: 0528 820175-0528843303 Fax: 0528 827857-E-mail:</p>
<p style="text-align:center;">easly@easlyinfo.com,SIEGE m. TIGHMERT, N° 3, Av. CHEIKH SAADI Talborjt - Agadir,</p>
</footer></body>
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
  $dompdf->stream("List des Commandes", ["Attachment" => false]);
