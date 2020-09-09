<?php
    ini_set('display_errors', 'On');

    class Ctr_Oferta{
            //* listar  facturas del cliente individual
            

        public static function ctr_editar_Oferta($arrayOferta){
			
            
            $respuesta=Modelo_Oferta::sql_editar_Oferta($arrayOferta);
            //return  $respuesta =Modelo_Oferta::sql_editar_oferta($arrayOferta);//
          
           // print_r($respuesta);
            return die(json_encode($respuesta));
        }


		
    }

//$objOferta=new Ctr_Oferta();


switch (@$_POST['Oferta']) {

    case 'listar':
        require'../model/conexion.php';
        require'../model/mdlOferta.php';
        $respuesta=ModeloOferta::sql_lisartar_Oferta();//
         die(json_encode($respuesta));
        break;
    case 'editar':
        require'../Modelo/class_mdl_bd_conexion.php';
        require'../Modelo/class_mdl_Oferta.php';
        
            Ctr_Oferta::ctr_editar_Oferta($_POST);

            break;
            
        default:
            # code...
            break;
    }



?>