<?php 

ini_set('display_errors', 'On');
//require'class_mdl_bd_conexion.php';

	/**
	 * 
	 */


	class ModeloProducto {
        //satic cuando recibo algo siempre van como static
        
        

		public static  function sql__agrgar_prodcuto($arrayProductos,$demo,$caratula){
			$db=new Conexion();
				
			//========datos del formuarlio===============
			$tituloProducto=$demo;
			$estado=1;
			$idProveedor=$_POST['id_proveedor'];
			$inputLinkDescarga=$_POST['inputLinkDescarga'];
			$generoProducto=$arrayProductos['id_genero'];
			$precioProducto=$arrayProductos['inputDolares'].".".$arrayProductos['inputCentavos'];
			date_default_timezone_set('America/Guayaquil');
			$fecha_actual=date("Y-m-d");

			$stmt= $db->conectar()->prepare("INSERT INTO productos
													(
													id_proveedor,url_directorio, fecha_producto,
													id_biblioteca, precio,
													activo, url_descarga,caratula ) 

												VALUES(
													:idProveedor,:url_directorio,:fecha_actual,
													:id_biblioteca,:precio,
													:activo, :url_descarga, :caratulaTema
													) 
											");
			$stmt->bindParam(':idProveedor',$idProveedor);
			$stmt->bindParam(':url_directorio',$tituloProducto);
			$stmt->bindParam(':fecha_actual',$fecha_actual);
			$stmt->bindParam(':id_biblioteca',$generoProducto);
			$stmt->bindParam(':precio',$precioProducto);
			$stmt->bindParam(':activo',$estado);
			$stmt->bindParam(':url_descarga',$inputLinkDescarga);
			$stmt->bindParam(':caratulaTema',$caratula);

				$stmt->execute();
				$id=$db->lastInsertId();
				if ( $stmt->rowCount() > 0) {
					//Se grabo bien en la base de datos
					$respuesta=array(
						'respuesta'=>'exitoRegistroBd'
						);
				
					}else{
					$respuesta=array(
						'respuesta'=>'fallidoRegistroBd'
						);
					
					}
				
							
		

			//
			return $respuesta;//regrso la respuesta 
			$stmt->close();
		}


		 public static  function sql_lisartar_productos(){
			$db=new Conexion();
			$stmt= $db->conectar()->prepare("SELECT    
													proveedor.apodo,
													productos.fecha_producto,
													productos.url_directorio,
													productos.url_descarga,
													productos.precio, 
													productos.id_proveedor, 
													productos.id ,
													biblioteca.genero,
													productos.id_biblioteca,
													proveedor.img 

											from    proveedor,
													productos,
													biblioteca
											WHERE 
													productos.id_proveedor=proveedor.id 
											and     productos.id_biblioteca=biblioteca.id 
											and     productos.activo=1 

											and proveedor.estado='1'

											ORDER by  productos.id  desc ");

			$stmt->execute();
			return $stmt->fetchAll();

			$stmt->close();

		}


	
	

		//============================EDITAR PRODUCTO========================================//
		public static function sql_editar_Producto($arrayDatosProducto,$casoActulizar,$ubicacionDemo,$ubicacionCompleto){
			$db=new Conexion();
	
				try {	
						
						//$idProveedor=$arrayDatosProducto['id_proveedor'];
						$idProducto=$arrayDatosProducto['id_producto'];
						$urlDescarga=$arrayDatosProducto['inputLinkDescarga'];
						$generoProducto=$arrayDatosProducto['id_genero'];
						$precioProducto=$arrayDatosProducto['inputDolares'].".".$arrayDatosProducto['inputCentavos'];

						date_default_timezone_set('America/Guayaquil');
						$fecha_actual=date("Y-m-d");
						$tabla="productos";
						switch ($casoActulizar) {
							case 'soloDatos':
								$stmt= $db->conectar()->prepare("UPDATE $tabla SET 
																url_descarga=:linkDescarga,
																id_biblioteca=:idBiblioteca,
																precio=:precio
																WHERE id=:idProducto ");
								$stmt->bindParam(':linkDescarga',$urlDescarga);
								$stmt->bindParam(':idBiblioteca',$generoProducto);
								$stmt->bindParam(':precio',$precioProducto);
								$stmt->bindParam(':idProducto',$idProducto);
								break;
							case 'achivoDemo':
								echo $ubicacionDemo;
								die(json_encode($arrayDatosProducto));
								$stmt= $db->conectar()->prepare("UPDATE $tabla SET 
																	url_descarga=:linkDescarga,
																	id_biblioteca=:idBiblioteca,
																	precio=:precio,url_directorio=:archivoDemo
																	WHERE id=:idProducto ");
								$stmt->bindParam(':linkDescarga',$urlDescarga);
								$stmt->bindParam(':idBiblioteca',$generoProducto);
								$stmt->bindParam(':precio',$precioProducto);
								$stmt->bindParam(':archivoDemo',$ubicacionDemo);
								$stmt->bindParam(':idProducto',$idProducto);
						
							default:
								# code...
								break;
						}
						
				} catch (Exception $e) {
					echo "Error".$e->getMessage();
				}
			
				$stmt->execute();

				if($stmt){
					//si se realizo la inserccion
					$respuesta=array(
						'respuesta'=>'exito',
						'caso'=>$casoActulizar
						
						);
						return $respuesta;
				}else{
					$respuesta=array(
						'respuesta'=>'false',
						'error'=>$e
						);
						return $respuesta;
				}
			

				//si alguna fila se modifico entonces si se edito

				$stmt->close();
		}

	
	//============================ACTUALIZAR O EDITAR PRODUCTO IMG========================================//
	public static function sqlEditarCaratulaProducto($urlCaratulaProducto,$idProducto){
		$db=new Conexion();
	
			try {
				
					$stmt= $db->conectar()->prepare("UPDATE productos SET 
																caratula='$urlCaratulaProducto'
															WHERE id='$idProducto' ");
					
			} catch (Exception $e) {
				echo "Error".$e->getMessage();
			}
		
			$stmt->execute();

			if($stmt){
				//si se realizo la inserccion
				$respuesta=array(
					'respuesta'=>'exito',
					'img'=>$urlCaratulaProducto
					);
					return $respuesta;
			}else{
				$respuesta=array(
					'respuesta'=>'false'
					);
					return $respuesta;
			}
		

			//si alguna fila se modifico entonces si se edito

			$stmt->close();
	}
	//============================ELIMINAR LOGICAMENTE  AL PRDICTO========================================//
	public static function sqlEliminarProducto($arrayProducto){
			$db=new Conexion();
		
			try {
			$idProducto=$arrayProducto['id'];
			$stmt= $db->conectar()->prepare("UPDATE productos SET 
														activo='0'
												WHERE id='$idProducto' ");

			} catch (Exception $e) {
				echo "Error".$e->getMessage();
			}
		
			
			$stmt->execute();

			if($stmt){
				//si se realizo la inserccion
				$respuesta=array(
					'respuesta'=>'exito'
					);
					return $respuesta;
			}else{
				$respuesta=array(
					'respuesta'=>'false'
					);
					return $respuesta;
			}
		
			//si alguna fila se modifico entonces si se edito
			$stmt->close();
		}

	}



 ?>