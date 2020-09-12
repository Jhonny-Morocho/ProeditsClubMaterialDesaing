<?php

ini_set('display_errors', 'On');


include'ctrProductoItem.php';// para poder filtrar los datos
require'ctrEntregarProductoCliente.php';
@session_start();// simepre inicializo session par apoder hacr la compracion, si el cliente esta logado
$descripcionProducto="";

print_r($_POST);

    //==========comprobar si exite un session o el cliente esta logiando==================//
    if( isset($_SESSION['usuario']) and $_SESSION['tipo_usuario']=='Cliente' and isset($_SESSION['id_cliente']) ){
        //========OpcionPago
        $FiltroIdProducto=ModeloProductoItem::SeperacionDatos(@$_POST['idProducto'],'idProducto');
        $FiltroNombreProducto=ModeloProductoItem::SeperacionDatos(@$_POST['nombreProducto'],'nombreProducto');
        $FiltroPrecioProducto=ModeloProductoItem::SeperacionDatos(@$_POST['precioUnitarioProducto'],'idProducto');
        $i=0;
        $sumaTotalCancelar=0;
        $arrayMembresiaCliente=ClassEntregarProductoCliente::comprobarEstadoMembresiaCliente($_SESSION['id_cliente']);
        echo "xxx";
        print_r($arrayMembresiaCliente);
        $redireccionar="pagoFinalizadoProductoCarMembresia.php";

        $respuesta=array('urlPaypal'=>$aprobado,
                        'respuesta'=>'exito',
                        'tipoRespuesta'=>'paypal',
                        'total_cancelar'=>@$_POST['totalCancelar']);
        die(json_encode($respuesta));
        

    }else{
            $respuesta=array('respuesta'=>'noExiseLogin');
            die(json_encode($respuesta));
    }

   
   
?>