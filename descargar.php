<?php
/*
Combinar documentos PDF con PHP
y libmergepdf

Método 2: Forzar descarga de PDF

@author parzibyte
 */
# Cargar librerías
require_once "vendor/autoload.php";
use iio\libmergepdf\Merger;

# Ruta de los documentos
$documentos = ["cotizacion.pdf", "parzibyte.pdf", "documento.pdf"];

# Crear el "combinador"
$combinador = new Merger;

# Agregar archivo en cada iteración
foreach ($documentos as $documento) {
    $combinador->addFile($documento);
}

# Y combinar o unir
$salida = $combinador->merge();

/*
Ahora la salida la mostramos directamente en la petición,
y enviamos unos encabezados para que el navegador
lo interprete
 */
# Este nombre se pondrá como título o nombre del documento
$nombreArchivo = "combinado.pdf";

# Encabezados para forzar descarga y especificar tipo de documento
header("Content-type:application/pdf");
header("Content-Disposition:attachment;filename=$nombreArchivo");
# Imprimir salida luego de los encabezados
echo $salida;

/*
Aquí puedes hacer más cosas pero asegúrate
de no imprimir absolutamente nada; en este caso
pongo exit para terminar el script inmediatamente
 */
exit;
