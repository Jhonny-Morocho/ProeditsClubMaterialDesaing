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
			$limiteProductos=$arrayOferta["inputLimite"];
			$mensaje=$arrayOferta["inputSms"];
			$id=$arrayOferta["idOferta"];
			$descuento=$arrayOferta['inputDescuento'];
			try {
				//code...
				$stmt= $db->conectar()->prepare("UPDATE  oferta SET
															descuento=:bindDecuento,
															limite_productos=:bindLimite,
															sms_promocion=:bindSms
												
														WHERE id=:binId
														
														");
				
				$stmt->bindParam(':bindDecuento',$descuento);
				$stmt->bindParam(':bindLimite',$limiteProductos);
				$stmt->bindParam(':bindSms',$mensaje);
				$stmt->bindParam(':binId',$id);
				$stmt->execute();
			} catch (Exception $e) {
				//echo 'Excepción capturada: ',  $e->getMessage(), "\n";
				$respuesta=array(
					'respuesta'=>'error'
					);
			}

		   //si se afecto alguna columna entonces si se realizo actulizo los datos
		   if($stmt->rowCount()>0){
			   //si se realizo la inserccion
			   $respuesta=array(
				   'respuesta'=>'exito'
				
				   );
				  
		   }else{
			   $respuesta=array(
				   'respuesta'=>'noExisteCambios'
				   );
				 
		   }

		   return $respuesta;
		   $stmt->close();

		}
	}


    //Modelo_Update::sql_lisartar_informacion();
 ?>