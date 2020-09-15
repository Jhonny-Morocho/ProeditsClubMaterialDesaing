<?php
ini_set('display_errors', 'On');


class ControladorPlantillaInicio{

        public  function ctr_header(){
            require"view/templateInicio/header.php";
            require"animacionEspera/animacion_espera.php";
           
        }

         public  function ctr_slider(){
             require"view/templateInicio/carrusel.php";
          
        
         }


        public  function ctr_footer(){
            
            require"view/templateInicio/footer.php";

 
        }



         public function panelCliente(){
             //require"Vista/template/panel_admin.php";
             require'view/cliente/panelCliente.php';
         }

         public function reproductorAudio(){
            //require"Vista/template/panel_admin.php";
            require'view/templateInicio/reproductor.php';
        }


        public function ctr_tabla_productos(){
            require'view/templateInicio/tablaProductos.php';
        }

        public function ctr_tabla_carritoCompras(){
            require'view/templateInicio/tablaCarrito.php';
        }

        public function formLoginCliente(){
            require'view/cliente/formularioLoginCliente.php';
        }
        public function formLoginProveedor(){
            require'view/templateInicio/formularioLoginAdmin.php';
        }


        // ==================Funciones para session==================
        // ==================Funciones para session==================
        public function usuario_autentificado(){

            @session_start();
            function revisar_usuario_session(){

                if($_SESSION['tipo_usuario']=='Cliente'){

                    return isset($_SESSION['usuario']);
                }else{
                    return 0;
                }
            }

            if(!revisar_usuario_session()){
                header('location: ./');
                exit();
            }


        }


        public function cerrar_session($cerrar_session){
            $cerrar_session=@$_GET['cerrar_session'];
            if($cerrar_session){// si se emvio la session entonces destruir
            session_destroy();
            header('location: ./');
            }
        }

        public static function url_biblioteca_productos(){
   
            return "../../genero_productos.php?id_genero=";
            
        }
        public static function ctr_tabla_productos_genero(){
   
            require 'view/templateInicio/tablaProductosGenero.php';
            
        }
        public static function url_producto(){
            
            return "../../demo.php?id_producto=";
       
        }
        public static function redesSociales(){
   
            
            require_once 'socialNav/socialNetWork.php';
            
        }
        public static function url_dj_productos(){
          
            return "../../dj_productos.php?id_proveedor=";
           
        }
        public static function tablProductosDj(){
          
            require "view/templateInicio/tablaProductoDj.php";
           
        }

        public static function listaMembresia(){
          
            require "view/templateInicio/listaMembresia.php";
           
        }

        public static function formRegistroCliente(){
            require "view/cliente/formularioRegistro.php";
        }

        public static function toTop(){
            require "blackTotop/toTop.php";
        }
        public static function url_demo(){
            
            return "../demo.php?id_producto=";
       
        }


        
}


?>

