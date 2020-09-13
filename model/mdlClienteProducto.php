<?php
//require'class_mdl_bd_conexion.php';
ini_set('display_errors', 'On');

/**
 *
 */
class ModeloClienteProducto {


    //satic cuando recibo algo siempre van como static
     public static  function sqlListarTop(){// los productos recien adquieridos el top 15
        $db=new Conexion();
        $stmt= $db->conectar()->prepare("SELECT  DISTINCT 
                        cliente_producto.id_producto,
						cliente_producto.fecha_compra,
						productos.url_directorio,
						proveedor.apodo,
						proveedor.img,
						biblioteca.id,
						biblioteca.genero,
						proveedor.apodo,
						productos.id_proveedor,
						productos.id,
						productos.fecha_producto,
						productos.precio
						
						FROM 			cliente_producto,proveedor,productos,biblioteca

						WHERE 			cliente_producto.id_producto=productos.id 
									AND productos.id_biblioteca=biblioteca.id
									AND productos.id_proveedor=proveedor.id
									AND proveedor.id=productos.id_proveedor
									AND proveedor.estado=1 ORDER by  cliente_producto.fecha_compra desc");

        $stmt->execute();
        return $stmt->fetchAll();

        $stmt->close();

    }

    //este metodo es para saeber los productos q a comprado el cliente las facturas
    public static  function sqlListarProductosCliente($idCliente,$idFactura){//los productos del cliente adquirido
        $db=new Conexion();
        try {
            $stmt= $db->conectar()->prepare("SELECT
                                                        cliente_producto.id_cliente,
                                                        cliente_producto.id_producto,
                                                        cliente_producto.metodo_compra,
                                                        cliente_producto.precio_compra,
                                                        
                                                        productos.url_directorio,
                                                        productos.url_descarga,
                                                        proveedor.apodo
                                                    from
                                                        cliente_producto,
                                                        detalle_factura,
                                                        proveedor,
                                                        productos
                                                    WHERE
                                                            detalle_factura.id_cliente='$idCliente'
                                                    and     cliente_producto.id_factura=detalle_factura.id
                                                    and     detalle_factura.id='$idFactura'
                                                    and     proveedor.id=productos.id_proveedor
                                                    and     productos.id=cliente_producto.id_producto ORDER by cliente_producto.id_cliente ");

            $stmt->execute();
        } catch (Exception $e) {
                $error=$e->getMessage();
                echo $error;

            }
        return $stmt->fetchAll();

        $stmt->close();

    }

    

    //saber los productos vendidos por el proveedor
    public static function sqlListarProductosVendidosProveedor($idProveedor){
        $db=new Conexion();
        try {
            $stmt= $db->conectar()->prepare("SELECT
                                                        cliente_producto.id_producto,
                                                        cliente_producto.id_factura,
                                                        productos.url_directorio,
                                                        productos.id_proveedor,
                                                        cliente_producto.precio_compra,
                                                        cliente_producto.estado_pago_proveedor,
                                                        cliente_producto.id,
                                                        cliente_producto.fecha_compra,
                                                        cliente_producto.metodo_compra,	
                                                        cliente_producto.id_cliente
                                                from
                                                        cliente_producto,
                                                        productos

                                                WHERE
                                                        productos.id_proveedor='$idProveedor'

                                                and     cliente_producto.id_producto=productos.id


                                                ORDER by  cliente_producto.fecha_compra desc
                ");


                $stmt->execute();

            } catch (Exception $e) {
                $error=$e->getMessage();
                echo $error;

              }

        return $stmt->fetchAll();

        $stmt->close();


    }

    //============================FILTRO PARA PAGAR  A LOS DJS O PROVEEDORES =====================//
    //============================FILTRO PARA PAGAR  A LOS DJS O PROVEEDORES =====================//
    //============================FILTRO PARA PAGAR  A LOS DJS O PROVEEDORES =====================//
    //============================FILTRO PARA PAGAR  A LOS DJS O PROVEEDORES =====================//
     //saber los productos vendidos por el proveedor fitlro
     public static function sqlListarProductosVendidosProveedorFiltroFecha($idProveedor,$fechaInicio,$fechaFin){
        $db=new Conexion();
        try {
            $stmt= $db->conectar()->prepare("SELECT
                                                        cliente_producto.id_producto,
                                                        cliente_producto.id_factura,
                                                        productos.url_directorio,
                                                        cliente_producto.precio_compra,
                                                        cliente_producto.estado_pago_proveedor,
                                                        productos.id_proveedor,
                                                        cliente_producto.id,

                                                        cliente_producto.fecha_compra,
                                                        cliente_producto.metodo_compra,	
                                                        cliente_producto.id_cliente
                                                from
                                                        cliente_producto,
                                                        productos

                                                WHERE
                                                        productos.id_proveedor='$idProveedor'

                                                and     cliente_producto.id_producto=productos.id

                                                and     cliente_producto.fecha_compra between  '$fechaInicio' and '$fechaFin'


                                                ORDER by  cliente_producto.fecha_compra desc
                ");


                $stmt->execute();

            } catch (Exception $e) {
                $error=$e->getMessage();
                echo $error;

              }

        return $stmt->fetchAll();

        $stmt->close();


    }


    public static  function editarClienteProductoEstadoPagoProveedor($idRegistrosClienteProducto,$estado){

            
        $db=new Conexion();
        
        try {
            //code...
            $stmt= $db->conectar()->prepare("UPDATE cliente_producto SET
                                                    estado_pago_proveedor='$estado'
                                                    WHERE id='$idRegistrosClienteProducto' ");

            $stmt->execute();

            if ( $stmt->rowCount() > 0) {
                //Se grabo bien
                    $respuesta=array(
                        'respuesta'=>'exito'
                        );
                }else{
                    $respuesta=array(
                        'respuesta'=>'noExisteCambios'
                        );
                }
                   
             

        } catch (Exception $e) {
            $respuesta=array(
                'try'=>$e->getMessage(),
                'respuesta'=>'error'
                );
        }
    return $respuesta;
    $stmt->close();

    }


     //asiganr los productos al cliente
     public static function sqlAsignarProductoCliente($arrayInfoFactura,$idProducto,$precioUnidadProducto){
        $db=new Conexion();
        date_default_timezone_set('America/Guayaquil');
        $fecha_actual=date("Y-m-d H:i:s");
        $idFactura=$arrayInfoFactura['idFactura'];
        $idCliente=$arrayInfoFactura['idCliente'];
        $metodoPago=$arrayInfoFactura['metodoPago'];
        try {
            $stmt= $db->conectar()->prepare("INSERT INTO cliente_producto
                                                        (id_cliente,id_producto,fecha_compra,
                                                        metodo_compra,	precio_compra,id_factura,estado_pago_proveedor
                                                        )
                                                VALUES('$idCliente','$idProducto','$fecha_actual',
                                                        '$metodoPago','$precioUnidadProducto','$idFactura',0) 
                                            ");


                $stmt->execute();
                $id=$db->lastInsertId();

                if ( $stmt->rowCount() > 0) {
                    //Se grabo bien en la base de datos
                    $respuesta=array(
                        'respuesta'=>'exito',
                        'idProducto'=>$idProducto,
                        'idClienteProducto'=>$id,
                        'precioUnidadProducto'=>$precioUnidadProducto,
                        'idFactura'=>$idFactura
                        );

                 }else{
                    $respuesta=array(
                        'respuesta'=>'fallido'
                        );

                 }


            } catch (Exception $e) {
                $error=$e->getMessage();
                // echo $error;
                $respuesta=array(
                    'respuesta'=>'erro_try_cacth',
                    'error'=>$error
                    );

              }

        return $respuesta;


    }


    public static function sql_agregar_productos_cliente_adquiridos($tabla,$id_factura,$id_cliente,
                                                                $id_producto,$metodo_compra,
                                                                $cliente_pay,
                                                                $precio_compra){
        $db=new Conexion();
        date_default_timezone_set('America/Guayaquil');
        $fecha_actual=date("Y-m-d H:i:s");
        try {
            $stmt= $db->conectar()->prepare("INSERT INTO $tabla
                                                        (id_cliente,
                                                        id_producto,
                                                        metodo_compra,
                                                        cliente_pay,
                                                        id_factura,
                                                        precio_compra,
                                                        fecha_compra
                                                        )
                                                VALUES('$id_cliente',
                                                        '$id_producto',
                                                        '$metodo_compra',
                                                        '$cliente_pay',
                                                        '$id_factura',
                                                        '$precio_compra',
                                                        '$fecha_actual'

                                                    )          ");


                $stmt->execute();
                $id=$db->lastInsertId();

                if ( $stmt->rowCount() > 0) {
                    //Se grabo bien en la base de datos
                    $respuesta=array(
                        'respuesta'=>'exito',
                        'id_tabla_cliente_producto'=>$id
                        );

                 }else{
                    $respuesta=array(
                        'respuesta'=>'fallido'
                        );

                 }


            } catch (Exception $e) {
                $error=$e->getMessage();
                // echo $error;
                $respuesta=array(
                    'respuesta'=>'erro_try_cacth',
                    'error'=>$error
                    );

              }

        return $respuesta;


    }




}
