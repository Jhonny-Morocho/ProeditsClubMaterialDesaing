<?php 

ini_set('display_errors', 'On');

	class ModeloOferta {
	
        public static  function sql_lisartar_Oferta(){

			$db=new Conexion();
			$stmt= $db->conectar()->prepare("SELECT  *FROM oferta ORDER by id Desc  ");

			$stmt->execute();
            return $stmt->fetchAll();
            
            //var_dump( $stmt->fetchAll());

			$stmt->close();

		}

		
        public static  function sql_editar_Oferta($arrayOferta){
	
			$db=new Conexion();

			//die(json_encode($arrayOferta));

			 $descuento=$arrayOferta['descuento'];
			 $limite_productos=$arrayOferta['limiteProductos'];
			 $sms_promocion=$arrayOferta['smsPromocion'];
			 $idOferta=$arrayOferta['idOferta'];
			 $fecha_inicio=$arrayOferta['inicioOferta'];
			 $fecha_fin=$arrayOferta['finOferta'];
			// $arrayOferta
			try {
				//code...
				$stmt= $db->conectar()->prepare("UPDATE  oferta SET
															descuento='$descuento',
															limite_productos='$limite_productos',
															sms_promocion='$sms_promocion',
															fecha_inicio=' $fecha_inicio',
															fecha_fin='$fecha_fin'
														WHERE id='$idOferta'
														
														");
				
				$stmt->execute();
			} catch (Exception $e) {
				echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			}

		   
		
		   

		   //si se afecto alguna columna entonces si se realizo actulizo los datos
		   if($stmt->rowCount()>0){
			   //si se realizo la inserccion
			   $respuesta=array(
				   'respuesta'=>'exito'
				
				   );
				  
		   }else{
			   $respuesta=array(
				   'respuesta'=>'false'
				   );
				 
		   }

		   return $respuesta;
		   $stmt->close();

		}
	}


    //Modelo_Update::sql_lisartar_informacion();
 ?>