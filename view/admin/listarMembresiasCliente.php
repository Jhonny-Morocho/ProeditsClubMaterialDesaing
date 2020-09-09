
<?php

ini_set('display_errors', 'On');

require'../../model/conexion.php';
require'../../model/mdlClienteMembresia.php';
include'../../controler/ctrMembresia.php';

//inicio la session
require'../../controler/controlerTemplateAdmin.php';
// $proveedor= new CtrProveedor();
// $proveedor->ctrl_session();
//=============================creacion de objetos==========================



    $plantilla= new ControladorPlantilla_Admin();
    $plantilla->seguridad_admin();
    $plantilla->usuario_autentificado();
    $plantilla->ctr_header();
    $plantilla->ctr_slider_left();
    $plantilla->ctr_slider_raigt();
    $plantilla->ctr_navegador_derecho();
    //die(json_encode($listar_membresia));
    $plantilla->ctr_tabla_compras_membresias();//tabla de clientes
    $plantilla->ctr_footer();

