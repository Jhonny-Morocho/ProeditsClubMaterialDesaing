<?php

ini_set('display_errors', 'On');


include'ctrProductoItem.php';// para poder filtrar los datos
require'ctrEntregarProductoCliente.php';
require'../model/mdlClienteMembresia.php';
@session_start();// simepre inicializo session par apoder hacr la compracion, si el cliente esta logado
$descripcionProducto="";

//print_r($_POST);

    //==========comprobar si exite un session o el cliente esta logiando==================//
    if( isset($_SESSION['usuario']) and $_SESSION['tipo_usuario']=='Cliente' and isset($_SESSION['id_cliente']) ){
        //========OpcionPago
        $FiltroIdProducto=ModeloProductoItem::SeperacionDatos(@$_POST['idProducto'],'idProducto');
        $FiltroNombreProducto=ModeloProductoItem::SeperacionDatos(@$_POST['nombreProducto'],'nombreProducto');
        $FiltroPrecioProducto=ModeloProductoItem::SeperacionDatos(@$_POST['precioUnitarioProducto'],'idProducto');
        $i=0;
        $sumaTotalCancelar=0;
        //$arrayMembresiaCliente=Modelo_Membresia::comprobarEstadoMembresiaCliente($_SESSION['id_cliente']);
        $membresiaCliente =Modelo_Membresia::sqlListarMembresiasCliente($_SESSION['id_cliente']);

        //recorro las membresias para ver cual de todas tiene decargas
        $idMembresia=0;
        $rangoDescargas=0;
        $fechaCompra="";
        $fechaExpira="";
        $precioUnitario=0;
        $nombreMembresia="";
        $banderaNumeroDescargas=false;

        foreach ($membresiaCliente as $key => $value) {
            #si el numero de descargas es mayor a cero etonces puede comprar
            if($value['rango']>0){
                $idMembresia=$value['id'];
                $rangoDescargas=$value['rango'];
                $fechaCompra=$value['fecha_inicio'];
                $fechaExpira=$value['fecha_culminacion'];
                $precioUnitario=$value['precio_unidad'];
                $nombreMembresia=$value['tipo'];
                $banderaNumeroDescargas=true;
            }
        }
    
        switch ($banderaNumeroDescargas) {
            case 1:
                
                //ClassEntregarProductoCliente::comproMusica($_SESSION['id_cliente'],);
                if ($rangoDescargas>=count($FiltroIdProducto)) {
                    $montoCancelar=$precioUnitario*count($FiltroIdProducto);
                    // cambiamos los precios a los productos, escojo cualqueir arya solo para iterar
                    $arrayAuxPrecio=array();
                    foreach ($FiltroPrecioProducto as $key => $value) {
                        # code...
                       $arrayAuxPrecio[$key]=$precioUnitario;
                    }
                    // actualizo el numero de descargas
                    try {
                        //code...
                        Modelo_Membresia::sqlActualizarMembresiaCliente($idMembresia,($rangoDescargas-count($FiltroIdProducto)));
                        // entrego los prodictos
                        ClassEntregarProductoCliente::comproMusica($_SESSION['id_cliente'],$montoCancelar,$arrayAuxPrecio,$FiltroIdProducto,'Membresia');
                        die(json_encode(array('respuesta'=>'exito','urlPanel'=>'../../adminCliente.php')));
                    } catch (\Throwable $th) {
                        //throw $th;
                        die(json_encode(array('respuesta'=>$th)));
                    }
                    
                }else{
                    die(json_encode(array('respuesta'=>'numInferiorDescargas','numDescagasActual'=>$rangoDescargas)));
                }
                
                break;
            case 0:
                # code...
                die(json_encode(array('respuesta'=>'fall','numDescargasActual'=>$rangoDescargas)));
            
                break;
            default:
                # code...
                break;
        }


    }else{
            $respuesta=array('respuesta'=>'noExiseLogin');
            die(json_encode($respuesta));
    }

   
   
?>