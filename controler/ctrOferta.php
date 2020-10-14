<?php
    ini_set('display_errors', 'On');


//$objOferta=new Ctr_Oferta();


switch (@$_POST['Oferta']) {

    case 'listar':
        require'../model/conexion.php';
        require'../model/mdlOferta.php';
        $respuesta=ModeloOferta::sql_lisartar_Oferta();//
         die(json_encode($respuesta));
        break;
    case 'editar':
        require'../model/conexion.php';
        require'../model/mdlOferta.php';
        $respuesta=ModeloOferta::sql_editar_Oferta(@$_POST);
        die(json_encode($respuesta));
        break;
            
        default:
            # code...
            break;
    }



?>