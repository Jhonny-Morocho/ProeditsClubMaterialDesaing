<?php

ini_set('display_errors', 'On');

//============Conexion a la base datos=============//
require'../model/conexion.php';



class ClassEntregarProductoCliente {
    
    public static function comproMusica($idCliente,$montoCancelar,$arrayPrecio,$arrayIdProductos){
        //============Traer  del producto de cliente producto para poder realizar la facturacion=============//
        require'../model/mdlFactura.php';
        //============Entregar los producots al cliente=============//
        require'../model/mdlClienteProducto.php';

        //1. Generar la factura , para ellos guardo el id de cliente,monto que canelo , en la tabla factura
        $respustaFactura=ModeloFacura::sqlGerarFactura($idCliente,$montoCancelar);

        //2. de la respuesta obtengo el idFactura para poder entregar los productos

        $arrayInfoFactura=array('idFactura'=>$respustaFactura['idFactura'],
                                            'idCliente'=>$idCliente,
                                            'metodoPago'=>'Paypal');
        // guardar los datos o los productos para darle al cliente

        //print_r($arrayPrecio);
        foreach ($arrayPrecio as $key => $value) {
            //echo "[".$arrayIdProductos[$key]."]";
            //echo "[".$arrayPrecio[$key]."]";
            $respuestaClienteProducto=ModeloClienteProducto::sqlAsignarProductoCliente($arrayInfoFactura,
                                                                                        $arrayIdProductos[$key],
                                                                                        $arrayPrecio[$key] );

        }
        //============BORRO LA CESTA=================//
        echo '<script>localStorage.clear();</script>';
        echo '<script>window.location = "../adminCliente.php"; </script>';//direcciono al penel de administracion del cliente
    }

    public static function comproMembresia($arrayData){
        //=================Entregar membresia al cliente====
        require'../model/mdlClienteMembresia.php';
        $precioTotal=floatval($arrayData['totalCancelado']);
        $numeroDescargas=floatval($arrayData['get']['numDescargas']);
        $comisionPaypal=floatval($arrayData['totalCancelado']*0.19);
        $precioUnidad=floatval(($precioTotal-$comisionPaypal)/$numeroDescargas);
        $respuesta=Modelo_Membresia::sqlAgregarMembresiaCliente($arrayData,'Paypal',$precioUnidad);
        echo '<script>window.location = "../adminCliente.php"; </script>';//direcciono al penel de administracion del cliente
        
    }

    // aqui verifico si la membresia del cliente ahun esta activa o si cuenta con descargas disponibles
    public static function comprobarEstadoMembresiaCliente($idCliente){
        //listar todas las membresias y comparamos el id del cliente con el idCliente_Membresia
        require'../model/mdlClienteMembresia.php';
        $membresiaCliente =Modelo_Membresia::sqlListarMembresiasCliente($idCliente);

        //recorro las membresias para ver cual de todas tiene decargas
        $idMembresia=0;
        $rangoDescargas=0;
        $fechaCompra="";
        $fechaExpira="";
        $precioUnitario="";
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
            }else{

            }
        }
        return array('idMembresia'=>$idMembresia,'rangoDescargas'=>$rangoDescargas,
                    'fechaCompra'=>$fechaCompra,'fechaExpira'=>$fechaExpira,'banderaNumDescargas'=>$banderaNumeroDescargas,
                    'precioUnitario'=>$precioUnitario,'nombreMembresia'=>$nombreMembresia);
        
    }
    
}



?>