<!-- Button trigger modal-->

<?php

ini_set('display_errors', 'On');
session_start();
require'model/conexion.php';
require'model/mdlProveedor.php';
require'model/mdlGenero.php';





//=============================creacion de objetos IMPOTATANTE SIEMPRE VA LA CABEZERA PARA QUE EL HEADER NO ME DE PROBLEMA CON DIRECCIONAMIENTO==========================
//=============================creacion de objetos IMPOTATANTE SIEMPRE VA LA CABEZERA PARA QUE EL HEADER NO ME DE PROBLEMA CON DIRECCIONAMIENTO==========================

require_once 'controler/ctrTemplateInicio.php';
$plantilla= new ControladorPlantillaInicio();
$plantilla->ctr_header();
$plantilla->listaMembresia();
$plantilla->redesSociales();
$plantilla->ctr_footer();


?>