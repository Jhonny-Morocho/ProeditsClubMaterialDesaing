<?php

ini_set('display_errors', 'On');

//require'class_mdl_bd_conexion.php';
	/**
	 *
	 */
	class Modelo_Membresia {


		//satic cuando recibo algo siempre van como static
		 public static  function sql_agregar_membresia($tabla,$tipo_membresia,$rango,$id_cliente,$precio,$tipo_pago){
            $db=new Conexion();

            //aplico los dias de promosion
            $fecha = date('Y-m-j');
            $nuevafecha = strtotime ( '+30 day' , strtotime ( $fecha ) ) ;
            $nuevafecha = date ( 'Y-m-j' , $nuevafecha );

            try {
                    $stmt= $db->conectar()->prepare("INSERT INTO $tabla

                                                    (tipo,
                                                    fecha_inicio,
                                                    fecha_culminacion,
                                                    rango,
                                                    id_cliente,
                                                    precio,
                                                    tipo_pago
                                                    )

                                                    VALUES('$tipo_membresia',
                                                            '$fecha',
                                                            '$nuevafecha',
                                                            '$rango',
                                                            '$id_cliente',
                                                            '$precio',
                                                            '$tipo_pago'
                                                            )

                                                    ");
            } catch (Exception $e) {
                //echo "Error".$e->getMessage();
                $respuesta=array(
                    'respuesta'=>$e->getMessage()
                    );
            }

            $stmt->execute();
            $id=$db->lastInsertId();

            if($stmt){
				//si se realizo la inserccion
				$respuesta=array(
					'respuesta'=>'exito',
					'id_insertado_tabla_membresia'=>$id,
                    'tipo_membresia'=>$tipo_membresia,
                    'id_cliente'=>$id_cliente,
                    'precio'=>$precio,
                    'tipo_pago'=>$tipo_pago
					);

			}else{
				$respuesta=array(
					'respuesta'=>'no se inserto'
					);

            }




            return $respuesta;
			$stmt->close();

        }

        public static  function sql_listar_membresia($tabla){
            $db=new Conexion();


            try {
                    $stmt= $db->conectar()->prepare("SELECT * FROM  $tabla order by  id desc");
            } catch (Exception $e) {
                //echo "Error".$e->getMessage();
                $respuesta=array(
                    'respuesta'=>$e->getMessage()
                    );
            }

            $stmt->execute();

            return $stmt->fetchAll();
			$stmt->close();

        }
        
        public static  function sql_actualizar_membresia($tabla,$id_membresia,$actualizar_descarga){// cuando adquiere productos se descuenta el numero de descargas
            $db=new Conexion();

            try {
                    $stmt= $db->conectar()->prepare("UPDATE $tabla SET
                    rango='$actualizar_descarga'
                WHERE id='$id_membresia' ");

            } catch (Exception $e) {
                //echo "Error".$e->getMessage();
                $respuesta=array(
                    'respuesta'=>$e->getMessage()
                    );
            }

            $stmt->execute();
            $id=$db->lastInsertId();
            if($stmt){
				//si se realizo la inserccion
				$respuesta=array(
					'respuesta'=>'exito',
                    'id_cliente'=>$id,
                    'cantidad_descargas'=>$actualizar_descarga
				
					);

			}else{
				$respuesta=array(
					'respuesta'=>'no se inserto'
					);

            }
            return $respuesta;
			$stmt->close();

		}
	}



 ?>