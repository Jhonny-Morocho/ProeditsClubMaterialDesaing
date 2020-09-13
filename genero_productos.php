
<?php

ini_set('display_errors', 'On');
session_start();
require'model/conexion.php';
require'model/mdlGenero.php';
require'model/mdlProveedor.php';
//paginacion
require'controler/ctrPaginacion.php';
include'model/mdlPaginacion.php';
require'model/mdlClienteProducto.php';
//validacion de campos
require'controler/ctrValidacionCampos.php';



//=============================creacion de objetos IMPOTATANTE SIEMPRE VA LA CABEZERA PARA QUE EL HEADER NO ME DE PROBLEMA CON DIRECCIONAMIENTO==========================
//=============================creacion de objetos IMPOTATANTE SIEMPRE VA LA CABEZERA PARA QUE EL HEADER NO ME DE PROBLEMA CON DIRECCIONAMIENTO==========================

require_once 'controler/ctrTemplateInicio.php';
$plantilla= new ControladorPlantillaInicio();
$plantilla->ctr_header();
$plantilla->ctr_slider();
$plantilla->ctr_tabla_productos_genero();
$plantilla->reproductorAudio();
$plantilla->redesSociales();
$plantilla->ctr_footer();
$plantilla->toTop();

?>

