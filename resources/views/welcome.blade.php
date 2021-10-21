<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


</head>

<body>
    <?php

/**
 * Include autoload
 * Library PdfParser
 */


include "../vendor/autoload.php"; 
//include "../api-google/vendor/autoload.php"; 


$parseador = new \Smalot\PdfParser\Parser();
$nombreDocumento = "C:\Users\SENA\Downloads\bbva.pdf";
$documento = $parseador->parseFile($nombreDocumento);

$texto = $documento->getText();
echo "<pre>";
echo $texto;
echo "</pre>";


/*$document = "C:\Users\juanj\Documents\prueba\storage\content\prueba.txt";
$data = file_get_contents($document);

echo $data;*/





/*
$parseador = new \Smalot\PdfParser\Parser();
$nombreDocumento = "C:\Users\SENA\Downloads\cedula.pdf";
$documento = $parseador->parseFile($nombreDocumento);

$imagenes = $documento->getObjectsByType('XObject', 'Image');
$contador = 0; # Un índice
foreach ($imagenes as $imagen) {
    printf("<img src=\"data:image/jpg;base64,%s\"/>", base64_encode($imagen->getContent()));
}
*/   


?>

</html>