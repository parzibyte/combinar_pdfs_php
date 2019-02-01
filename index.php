<?php
/*
    Combinar documentos PDF con PHP
    y libmergepdf

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
