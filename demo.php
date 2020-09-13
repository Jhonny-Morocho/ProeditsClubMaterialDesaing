
<?php

ini_set('display_errors', 'On');


session_start();
require'model/conexion.php';
require'model/mdlProveedor.php';
require'model/mdlProducto.php';
require'model/mdlGenero.php';

//=============================creacion de objetos==========================
//=============================creacion de objetos==========================

require_once 'controler/ctrTemplateInicio.php';
$plantilla= new ControladorPlantillaInicio();
$cont=1;
$plantilla->ctr_header();
$plantilla->ctr_slider();

$productos=ModeloProducto::sql_lisartar_productos();

foreach($productos as $key=>$value){

    if(@$_GET['id_producto']==$value['id']){
        
        echo '
            
                    <!--Main layout-->
                    <main class="mt-5 pt-4">
                      <div class="container dark-grey-text mt-5">
                  
                        <!--Grid row-->
                        <div class="row wow fadeIn">
                  
                          <!--Grid column-->
                          <div class="col-md-6 mb-4">
                  
                            <img src="../../img/proveedores/'.$value['img'].'" class="img-fluid" alt="">
                  
                          </div>
                          <!--Grid column-->
                  
                          <!--Grid column-->
                          <div class="col-md-6 mb-4">
                  
                            <!--Content-->
                            <div class="p-4">
                  
                              <p class="lead">
                                <span >$'.$value['precio'].'</span>
                              </p>
                  
                              <p class="lead font-weight-bold" >Track Name</p>
                  
                              <p >'.($value['url_directorio']).'</p>



                              <!-- list  productos  music-->
                              <div id="playlistContainer" class="row playlist">
                                  <div class="row center album-name">
                                      
                                      <ul class="list-group" id="playlist">
                                                  <li data-src="../../biblioteca/'.$value['url_directorio'].'" data-title="'.$value['url_directorio'].'" data-length="194" class="song-row">
                                                      <div class="left">
                                                          <i class="fa fa-play play-song button" aria-hidden="true"></i>               
                                                      </div>
                                                      <div class="middle">            
                                                          <span class="song"'.$value['url_directorio'].' </span>
                                                          <span class="length">'.$value['genero'].'</span>
                                                          <span class="length">'.$value['fecha_producto'].'</span>
                                                      </div>
                                                  </li>
                                              
                                              </ul>
                                  </div>
              
                  
                              <form class="d-flex justify-content-left">
                                <!-- Default input -->
                                <button class="btn btn-primary btn-md my-0 p" type="submit">Add to cart
                                  <i class="fas fa-shopping-cart ml-1"></i>
                                </button>
                  
                              </form>
                  
                            </div>
                            <!--Content-->
                  
                          </div>
                          <!--Grid column-->
                  
                        </div>
                        <!--Grid row-->
                  
                        <hr>
                  
                      </div>
                    </main>
                    <!--Main layout-->
                  

                ' ;
            
        $cont++;
        break;
    }else{
        //header("Location:404/404.php");//
    }
    
}


$plantilla->reproductorAudio();
$plantilla->ctr_footer();
$plantilla->toTop();


?>


