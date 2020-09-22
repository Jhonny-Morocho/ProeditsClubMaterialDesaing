<?php 
ini_set('display_errors', 'On');


require'../model/conexion.php';
require'../model/mdlProducto.php';

switch (@$_POST['Producto']) {


    case 'addProducto':

        function subirArchivoMusica($ubicacionCarpeta,$inputFile){
            //echo "La ubicacion de la carpeta es :[".$ubicacionCarpeta."]";
            $directorio=$ubicacionCarpeta;// la direecion donde quiero q se guarde
            if(move_uploaded_file($_FILES[$inputFile]['tmp_name'], $directorio.$_FILES[$inputFile]['name'])){
                // para acceder al archiv q se alamceno con el siguiente comando
                $respuesta=array(
                    'respuesta'=>'fileGuardado',
                    'urlUbicacion'=>$_FILES[$inputFile]['name']
                );
                return $respuesta;
            
            }else{
                $respuesta=array('respuesta'=>'filFallo',
                                    'error'=>error_get_last()
                    );// imprime el ultimo error que haya registrado al intentar subi este archivo
                    return $respuesta;
            }//end File
            
        }
        //Mediante subir Archivos
        $editDemo=subirArchivoMusica('../biblioteca/','filesEditDemo'); 
        $respuesta=ModeloProducto::sql__agrgar_prodcuto(@$_POST,$editDemo['urlUbicacion']);
        die(json_encode($respuesta));
        break;

        case 'editarProducto':
      
                // primero borro el archivo viejo y despues actualizo x uno nuevo
                if ($_FILES['filesEditDemo']['name'] != null) {
                    
                    $archivoAbierto = fopen('../biblioteca/'.$_POST['inputTitulo'], 'r');//encontrar el archivo
                    fclose($archivoAbierto); 
                    
                        $dir='../biblioteca/'.$_POST['inputTitulo']; //puedes usar dobles comillas si quieres 
                        
                        $bandera_borrar=false;
                        if(file_exists($dir)) 
                        { 
                            if(unlink($dir)) 
                            $bandera_borrar=true; 
                        }
                }

                function subirArchivoMusica($ubicacionCarpeta,$inputFile){
                    //echo "La ubicacion de la carpeta es :[".$ubicacionCarpeta."]";
                    $directorio=$ubicacionCarpeta;// la direecion donde quiero q se guarde

                    
                    if(move_uploaded_file($_FILES[$inputFile]['tmp_name'], $directorio.$_FILES[$inputFile]['name'])){
                        // para acceder al archiv q se alamceno con el siguiente comando
                        $respuesta=array(
                            'respuesta'=>'fileGuardado',
                            'urlUbicacion'=>$_FILES[$inputFile]['name']
                        );
                        return $respuesta;
                    
                    }else{
                        $respuesta=array('respuesta'=>'filFallo',
                                            'error'=>error_get_last()
                            );// imprime el ultimo error que haya registrado al intentar subi este archivo
                            return $respuesta;
                    }//end File
                    
                }
       
                //Mediante un boolean defino que archivos son los que se van actulizar
                $actualizarArchivoDemo=true;

                ($_FILES['filesEditDemo']['name'] != null) ? $editDemo=subirArchivoMusica('../biblioteca/','filesEditDemo') : $actualizarArchivoDemo=false; // 

                
               //Ahora veremos los diferentes casos
               //1.No actuliza ningun archivo solo los datos ambas deben ser false, solo datos 
               ($actualizarArchivoDemo==false  ) ? $respuesta=ModeloProducto::sql_editar_Producto(@$_POST,"soloDatos","","") : $smmActualizar="SoloDatos"; // 
               //2.Se actuliza solo el archivo demo 
               ($actualizarArchivoDemo==true) ? $respuesta=ModeloProducto::sql_editar_Producto(@$_POST,"achivoDemo",$editDemo['urlUbicacion'],"") : $smmActualizar="SoloDemo"; // 
           
               
                die(json_encode($respuesta));
                break;
        case 'eliminarProducto':

            //1. Debo borrar los archivos
        

           
            function EliminarArchivos($ubicacionCarpeta,$titulo_arhivo){
                $dir=$ubicacionCarpeta.$titulo_arhivo; //puedes usar dobles comillas si quieres 
                
                if(file_exists($dir)) 
                { 
                    if(unlink($dir)) 
                    return true; 
                }
            }
            //inicalizo las variables de estado
            $borrarDemo=false;
            $borrarRemixCompleto=false;

            //Actualizo las varibales boolenas con la respuesta
            $borrarDemo=EliminarArchivos('../editDemos/',@$_POST['demo']);
            $borrarRemixCompleto=EliminarArchivos('../editDemos/',@$_POST['remixCompleto']);
            //2.Borro los datos de la base de datos
            $respuesta=ModeloProducto::sqlEliminarProducto(@$_POST);
            die(json_encode($respuesta));
            break;
    
    default:
        # code...
        break;
}

//================================Buscador y paginacion =========================================//


?>