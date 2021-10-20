<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


</head>

<body>


        <?php

        # Incluir autoload
        include "../vendor/autoload.php";

        $listar = null;
        $directorio = opendir("C:\Users\SENA\Downloads");
        while ($elemento = readdir($directorio)) {

            if ($elemento != '.' && $elemento != '..' && substr($elemento, -4) == ".pdf") {
                if (is_dir("C:\Users\SENA\Downloads" . $elemento)) {
                    $listar .= "<li><a href='C:\Users\SENA\Downloads\$elemento target='_blank'>$elemento/</a></li>";
                } else {
                    $listar .= "<li><a href='C:\Users\SENA\Downloads\$elemento target='_blank'>$elemento</a></li>";
                }

                $parseador = new \Smalot\PdfParser\Parser();
                $nombreDocumento = "C:\Users\SENA\Downloads/$elemento";
                $documento = $parseador->parseFile($nombreDocumento);

                $texto = $documento->getText();
                // echo $texto;

                $cont = 0;

                if (empty($texto)) {
                    echo "no hay palabras";
                    echo "</br>";
                } else {
                    $findme = "pedido";
                    $pos = stripos($texto, $findme);

                    if ($pos === false) {
                    } else {
                        echo "es una cuenta de cobro";
                        echo "</br>";
                        $cont = 1;
                    }

                    $findme = "referencia de pago";
                    $pos = stripos($texto, $findme);

                    if ($pos === false) {
                    } else {
                        echo "Es una factura";
                        echo "</br>";
                        $cont = 1;

                    }

                    $findme = "formal";
                    $pos = stripos($texto, $findme);

                    if ($pos === false) {
                    } else {
                        echo "Es una ingles";
                        echo "</br>";
                        $cont = 1;
                    }

                    if($cont==0){
                        echo "Varios";
                        echo "</br>";
                    }
                }
            }
        }

        echo $listar;








        /*$document = "C:\Users\juanj\Documents\prueba\storage\content\prueba.txt";
        $data = file_get_contents($document);

        echo $data;*/

        ?>

        <!--<nav class="navbar navbar-light" style="background-color: #3DA7F5;">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Navbar</span>
            </div>
        </nav>-->
        






</body>

</html>