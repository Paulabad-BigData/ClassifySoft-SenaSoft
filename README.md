# ClassifySoft version 1.0 Vertical 2 SENASOFT

Presentación de la Aplicación Web y Plan de desarrollo de software fue desarrollado durante la competencia SENASOFT Octubre 2021.

ClassifySoft es una aplicación web desarrollada para automatizar la recepción de documentos ya sea texto o imagenes en formato PDF, clasificación y envío al respectivo repositorio en el servidor local; la clasificación establecida por la empresa tales como: Pólizas, Facturas, Documentos de Identidad, Ordenes de Compra, Notas Credito y Notas debito y lo que a futuro la empresa desee incluir.

### Alcance ☕

Este documento aborda principalmente lo concerniente a la codificación del sistema.

Durante el desarrollo del Plan de desarrollo de software, se encontraron factores críticos que llevaron a la suposición de procesos en la recepción y envío final del documento.

### Usuarios 🤓

La audiencia prevista para el mismo, por tanto, tiene un marcado perfil técnico.

* Responsables: como herramienta de seguimiento y para control del proceso de desa-rrollo.
* Desarrolladores: como guía de actividades.

### Resumen del proceso del sistema 🚀

Se realizó el proceso de modelado del sistema de información, a través de los Diagramas UML elaborados para el proyecto: Diagrama de Casos de Uso y Diagramas de Secuencia hacen parte de los anexos de este documento.

### Actores y casos de uso

Una descripción de las actividades que deberán realizarse para llevar a cabo el proceso.

* Actores: 
Cloud o servidor local envía y recibe los documentos.
Aplicación recibe los documentos y los procesa.

* Casos de uso:
Se expresan los casos de forma genérica.

La aplicación web mediante un proceso automatizado recepcion los documentos PDF, clasifica y envía al respectivo repositorio en el servidor local.

### Diagrama de secuencia 🚀

_Permitira una visión mas amplia del funcionamiento del sistema._

La aplicación desde la recepción de cada documento va realizando el proceso de forma secuencial: Recepción, clasificación, organización y envío. en su flujo normal.

### Diseño de la arquitectura del sistema 📋

_De acuerdo con el análisis de ingeniería de requisitos realizado a partir de las especificaciones planteadas, se concibió como un aplicación web, adherido al paradigma cliente-servidor._

Descripción General

* [PHP](https://www.php.net/) es el lenguaje de desarrollo elegido por facilidad de implementación y conexión local de la empresa.
* [Laravel](https://laravel.com/) se baso en este Framework.
* [PDFParse](https://pdfparser.org/) Libreria extración de documentos pdf.

Todo desarrollado sobre una plataforma de Windosws pero puede ser instalado en Unix/Linux.

### Interfaces del sistema 🔧

_Back-end_ 🛠️

Interface diseñada con una sola pantalla la que activa el proceso en el momento de abrir la aplicación.

* Un bloque de interface que permite el acceso al aplicativo.

* No cuenta con sistema de loguin, se puede implementar si la empresa lo requiere.

* El usuario al acceder desencadena todo el proceso del sistema.

* Al final optiene un resultado de los documentos procesados y los pendientes que deja durante la secuencia.

* El usuario finalizado el proceso revisa los diferentess repositorios.

```
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
```

_Front-end_ ⌨️

Para la elaboración HTML5 y Bootstrap 4.3.1, por la simplicidad de sus elementos, basados en un formato de bloques de color planos, sin simulación de relieve. Básicamente se agrupa en un solo bloque.

* Pantalla de presentación: Una inerface simple, no tiene un menú solo el logo sobre un lienzo blanco donde se va desplegando los documentos PDF que ingresan. A continuación se presenta mockup:

La interface de ClassifySoft:




## Ejecutando las pruebas Testeo ⚙️

_Al sistema se realizaron pruebas con carga masiva y continua de documentos PDF donde se pudo apreciar su funcionamiento en un ciclo de ingreso de 45 documentos su procesamiento del total de estos documentos fue de 6.5 segundos. Lo cual es optimo ya que de acuerdo a los requerimientos esto proceso debia durar 5 segundos por documento, permitiendo stablecer su rendimiento y el no rompimiento del ciclo durante los procesos de producción y en campo. _

## Version 📌

ClassifySoft se encuentra en su versión 1.0 y en beta.

Cada paso dado llevó a la consecución de nuevas actividades en el desarrollo del Plan de Desarrollo de Software , una vez en la etapa de diseño se desarrollaron diferentes prototipos, permitiendo realizar pruebas en el campo real viendo sus fallas y mejoras. Las fallas llevaron a rediseñar y replantear lo que se estaba realizando para mejorar el Sistema de Información.

## Visión de ClassifySoft 1.0 🔩

Como plan de mejor se esta implementando el desarrollo de redes neuronales que permitan la clasificación de texto e imagenes de una manera mas precisa y así ampliar el nivel de alcance del volumen de documentos que maneja la empresa a diario.

Tambíen se tiene proyectado la inclusión de Cloud que permita la recepción de documentos y el envío clasificado según el repostorio de la empresa. Para que se tenga acceso tanto de la aplicación como de los documentos desde cualquier parte del mundo.


## Autores ✒️

_Aprendices Quinto Trimestre SENA-ADSI CDITI Dosquebradas Competencia SENASOFT 2021_

* **Juan Jose Gomez Fernandez** - *Desarrollador Junior* - [juanj320](https://github.com/juanj320)
* **Juan Guillermo Cardona Cifuentes** - *Desarrollador Junior* - [JuanGuiCardona](#https://github.com/JuanGuiCardona)
* **Paula Andrea Abad Tejada** - *Desarrollador Junior* - [Paulabad-BigData](https://github.com/Paulabad-BigData)

## Licencia 📄

Este proyecto se desarrollo bajo la competencia SENASOFT 2021 y los derechos de propiedad son reservados.

## Expresiones de Gratitud 🎁

* Agradecemos a los instructores de la Vertical 2 y 3 SENASOFT CDITI SENA Dosquebradas (Yuely Adriana Arce Arias, Jorge Luis Raigosa Barahona, Carlos Andres Mora Agudelo y Yuly Paulin Saenz Agudelo) siempre nos acompañaron durante el proceso y nos impulsaron a seguir adelante  📢



---
⌨️ con ❤️ por [Paulabad-BigData](https://github.com/Paulabad-BigData) 😊
