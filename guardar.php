<?php
/*
Combinar documentos PDF con PHP
y libmergepdf

Método 3: Escribir en archivo

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

# Escribir salida en el nombre del archivo
# Recomiendo: https://parzibyte.me/blog/2018/07/10/trabajando-con-archivos-y-carpetas-en-php-crud/
$bytesEscritos = file_put_contents($nombreArchivo, $salida);

if ($bytesEscritos !== false) {
    echo "Correcto. Se escribieron $bytesEscritos bytes en $nombreArchivo";
} else {
    echo "Error escribiendo archivo";
}
