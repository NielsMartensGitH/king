<?php 

ob_start();
require 'vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$localLogo = "filip.jpg";
//extract the extention for use in base64 (see: https://www.base64-image.de/)
$type = pathinfo($localLogo, PATHINFO_EXTENSION);
//get the file contents, en push the strange chars into $data
$data = file_get_contents($localLogo);
// concatentate all the pieces and rest in awe
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);


//QR code include:
$qrCode = file_get_contents('https://chart.googleapis.com/chart?cht=qr&choe=UTF-8&chs=250x250&chl=check.php?id=' );
$qr64 = 'data:image/png;base64,'. base64_encode($qrCode);



// time for some styling
$content = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <style>
    footer {
        position: fixed; 
        bottom: 20px; 
        left: 0px; 
        right: 0px;
        height: 50px; 
        background-color:#CC0000;
    
        /** Extra personal styles **/
       
    }
    
    header {
      position: fixed;
      top: -20px;
      left: 0px;
      right: 0px;
      height: 50px;
    
      /** Extra personal styles **/
    
    }
    .page_break { page-break-before: always; }
    body {
        font-family:sans-serif;
    }
    h1 {
        color:red;
    }
    </style>
</head>
<body>
    
    <img src='$base64' width=200>
    <h1>Meet & Greet Pass</h1>";

    $content.="<img src='$qr64'>
    
</body>
</html>
";

$dompdf->loadHtml($content);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
ob_end_clean();
$dompdf->stream();

// testing purposes, stream first to the screen, THEN to the PDF to finetune!
//echo $content;
// IMAGES - STYLING - FONTS - QR CODE!

?>