
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
                  
             



                              <!-- list  productos  music-->
                              <div id="demo" class="row ">
                                  <div class="row center album-name" id="playlist">
                                      <ul class="list-group filaItemProducto red mb-2" >
                                        <a href="../../biblioteca/'.$value['url_directorio'].' " class="list-group-item">'.
                                        $value['url_directorio'].'
                                          <div class="left"  id="playPause">
                                              <span id="play" style="font-size:25px">
                                                  <i class="fa fa-play-circle glyphicon glyphicon-play" style="font-size:35px" aria-hidden="true"></i>
                                              </span>
                                              <span id="pause" style="display: none;font-size:25px" >
                                                    <i class="far fa-pause-circle  glyphicon glyphicon-pause" style="font-size:35px" ></i>
                                              </span>
                            
                                          </div>
                                        </a>
                                          
                                      </ul>
                                  </div>
              
                  
                              <form class="d-flex justify-content-left ">
                                <!-- Default input -->
                                <button data-id="'.$value['id'].'" data-nombre="'.$value['url_directorio'].'" data-precio="'.$value['precio'].'"  class="buy btn btn-primary btn-md my-0 p" type="submit">Add to cart
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
$plantilla->redesSociales();
$plantilla->ctr_footer();
$plantilla->toTop();


?>


