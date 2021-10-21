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
            <a class="nav-item nav-link active"><b>ClassifySoft</b>  </a>
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

$aux = 0;
$listar = null;
$directorio = opendir("C:\Users\SENA\Documents/Email files");
while ($elemento = readdir($directorio)) {

    if ($elemento != '.' && $elemento != '..' && substr($elemento, -4) == ".pdf") {
        if (is_dir("C:\Users\SENA\Documents/Email files" . $elemento)) {
            $listar .= "<li><a href='C:\Users\SENA\Documents/Email files/$elemento target='_blank'>$elemento/</a></li>";
        } else {
            $listar .= "<li><a href='C:\Users\SENA\Documents/Email files/$elemento target='_blank'>$elemento</a></li>";
        }

        $parseador = new \Smalot\PdfParser\Parser();
        $nombreDocumento = "C:\Users\SENA\Documents/Email files/$elemento";
        $documento = $parseador->parseFile($nombreDocumento);

        $texto = $documento->getText();
        // echo $texto;
        
        $cont = 0;

        /*$contador = 0; # Un índice
        foreach ($imagenes as $imagen) {
        printf("<img with:400px; src=\"data:image/jpg;base64,%s\"/>", base64_encode($imagen->getContent()));*/

        if (empty($texto)) {
            
            $parseador = new \Smalot\PdfParser\Parser();
            $nombreDocumento = "C:\Users\SENA\Documents/Email files/$elemento";
            $documento = $parseador->parseFile($nombreDocumento);

            $imagenes = $documento->getObjectsByType('XObject', 'Image');

            if(empty($imagenes)){
                $aux = $aux + 1;
            }else{
                echo "es una Imagen";
                $destino = "C:\Users\SENA\Documents\Email files/Imagenes/$elemento";
                copy($nombreDocumento,$destino) or die;
                unlink($nombreDocumento);
            }

        } else {
            $findme = "cuenta de cobro";
            $pos = stripos($texto, $findme);

            if ($pos === false) {
            } else {
                echo "es una cuenta de cobro";
                echo "</br>";
                $destino = "C:\Users\SENA\Documents\Email files/Cuentas de cobro/$elemento";
                copy($nombreDocumento,$destino) or die;
                unlink($nombreDocumento);
                echo "Archivo movido a la carpeta Cuentas de cobro";
                echo "</br>";

            

                $cont = 1;
            }

            $findme = "referencia de pago";
            $pos = stripos($texto, $findme);

            if ($pos === false) {
            } else {
                echo "Es una factura";
                echo "</br>";
                $destino = "C:\Users\SENA\Documents\Email files/Facturas/$elemento";
                copy($nombreDocumento,$destino) or die;
                unlink($nombreDocumento);
                echo "Archivo movido a la carpeta Facturas";
                echo "</br>";
                $cont = 1;

            }

            $findme = "póliza";
            $pos = stripos($texto, $findme);

            if ($pos === false) {
            } else {
                echo "Es una Póliza";
                echo "</br>";
                $destino = "C:\Users\SENA\Documents\Email files/Polizas/$elemento";
                copy($nombreDocumento,$destino) or die;
                unlink($nombreDocumento);
                echo "Archivo movido a la carpeta Polizas";
                echo "</br>";
                $cont = 1;

            }


            if($cont==0){
                echo "Varios";
                $destino = "C:\Users\SENA\Documents\Email files/Varios/$elemento";
                copy($nombreDocumento,$destino) or die;
                unlink($nombreDocumento);
                echo "Archivo movido a la carpeta Varios";
                echo "</br>";
                
                echo "</br>";
            }   
        }
        
    }
}

if($aux != 0){
echo "Hay $aux archivos que estan vacios";
}


echo $listar;

?>

                        </div>
                    </div>

                </div>
            </div>
        </div> 
    </div> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>