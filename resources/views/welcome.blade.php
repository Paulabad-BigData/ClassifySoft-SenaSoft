<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
    <body>

    
    <nav class="navbar navbar-expand navbar-light" style= "background-color:#FF7913;" >
        <div class="nav navbar-nav">
        <a class="nav-item nav-link active"><img src="{{asset('logo.png')}}" style="width:80px;height: 55px;"> </a>  
            <!--<a class="nav-item nav-link" href="#">Home</a>-->
        </div>
    </nav>

    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header" >
                        <div class="card-body">

    <?php

# Import Library PDFParser
include "../vendor/autoload.php";
$cont2 = 0;
$aux = 0;
$listar = null;
$directorio = opendir("C:\Users\PERSONAL\Documents/Email files");
while ($elemento = readdir($directorio)) {

    if ($elemento != '.' && $elemento != '..' && substr($elemento, -4) == ".pdf") {
        if (is_dir("C:\Users\SENA\Documents/Email files" . $elemento)) {
            $listar .= "<li><a href='C:\Users\PERSONAL\Documents/Email files/$elemento target='_blank'>$elemento/</a></li>";
        } else {
            $listar .= "<li><a href='C:\Users\PERSONAL\Documents/Email files/$elemento target='_blank'>$elemento</a></li>";
        }

        $parseador = new \Smalot\PdfParser\Parser();
        $nombreDocumento = "C:\Users\PERSONAL\Documents/Email files/$elemento";
        $documento = $parseador->parseFile($nombreDocumento);

        $texto = $documento->getText();
        // echo $texto;

        $cont = 0;
        

        /*$contador = 0; # Un índice
        foreach ($imagenes as $imagen) {
        printf("<img with:400px; src=\"data:image/jpg;base64,%s\"/>", base64_encode($imagen->getContent()));*/

        if (empty($texto)) {

            $parseador = new \Smalot\PdfParser\Parser();
            $nombreDocumento = "C:\Users\PERSONAL\Documents/Email files/$elemento";
            $documento = $parseador->parseFile($nombreDocumento);

            $imagenes = $documento->getObjectsByType('XObject', 'Image');

            if (empty($imagenes)) {
                $aux = $aux + 1;
            } else {
                $destino = "C:\Users\PERSONAL\Documents\Email files/Imagenes/$elemento";
                copy($nombreDocumento, $destino) or die;
                unlink($nombreDocumento);
                $cont2 = 1;
            }

        } else {
            $findme = "cuenta de cobro";
            $pos = stripos($texto, $findme);

            if ($pos === false) {
            } else {

                $destino = "C:\Users\PERSONAL\Documents\Email files/Cuentas de cobro/$elemento";
                copy($nombreDocumento, $destino) or die;
                unlink($nombreDocumento);

                $cont = 1;
                $cont2 = 1;
            }

            $findme = "referencia de pago";
            $pos = stripos($texto, $findme);

            if ($pos === false) {
            } else {
                $destino = "C:\Users\PERSONAL\Documents\Email files/Facturas/$elemento";
                copy($nombreDocumento, $destino) or die;
                unlink($nombreDocumento);
                $cont = 1;
                $cont2 = 1;

            }

            $findme = "póliza";
            $pos = stripos($texto, $findme);

            if ($pos === false) {
            } else {

                $destino = "C:\Users\PERSONAL\Documents\Email files/Polizas/$elemento";
                copy($nombreDocumento, $destino) or die;
                unlink($nombreDocumento);
                $cont = 1;
                $cont2 = 1;

            }

            if ($cont == 0) {

                $destino = "C:\Users\PERSONAL\Documents\Email files/Varios/$elemento";
                copy($nombreDocumento, $destino) or die;
                unlink($nombreDocumento);
                $cont2 = 1;

            }
        }

    }
}

echo $listar;

$palabra = "Archivos Organizados Con Exito";

?>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php if($cont2 == 1){?>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
      </symbol>
      <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
      </symbol>
      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
      </symbol>
    </svg>


      <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
          <use xlink:href="#check-circle-fill" />
        </svg>
        <?php echo $palabra; ?>
      </div>


      <?php
}
?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>