



<div class="contentTop card" >
    <div class="descripcionNav card">
     Top 15 
    </div>
    <nav class="nav flex-column  lighten-5 py-4 ">
        <!-- Rotating card -->
            <!-- Rotating card -->
            <?php 
                $top=ModeloClienteProducto::sqlListarTop();
                $cont_2=0;
                foreach($top as $key=>$value){
                    if($cont_2<15){
                        if ($value['caratula']=="") {
                            # code...
                            echo'
                            
                            <!--Section: Author Box-->
                            <a href="'.(ControladorPlantillaInicio::url_producto()).$value['id_producto'].'"><div class="media mt-4 px-1 itemTop15">
                                    <img class="card-img-100 d-flex z-depth-1 mr-3" src="../../img/proveedores/'.$value['img'].'"
                                    alt="Generic placeholder image">
                                    <div class="media-body">
                                    <h5 class="font-weight-bold mt-0">
                                        <span style="color:black; wi">$'.($value['precio']).'</span>
                                    </h5>
                                        <span style="color:black;" class="topSonf article__content">'.($value['url_directorio']).'</span>
                                    </div>
                                </div></a>
                            <!--Section: Author Box-->';
                        }else{
                            echo'
                            
                            <!--Section: Author Box-->
                            <a href="'.(ControladorPlantillaInicio::url_producto()).$value['id_producto'].'"><div class="media mt-4 px-1 itemTop15">
                                    <img class="card-img-100 d-flex z-depth-1 mr-3" src="../../img/caratulas/'.$value['caratula'].'"
                                    alt="Generic placeholder image">
                                    <div class="media-body">
                                    <h5 class="font-weight-bold mt-0">
                                        <span style="color:black; wi">$'.($value['precio']).'</span>
                                    </h5>
                                        <span style="color:black;" class="topSonf article__content">'.($value['url_directorio']).'</span>
                                    </div>
                                </div></a>
                            <!--Section: Author Box-->';
                        }
                    }
                    $cont_2++; 
                }
            ?>
    </nav>

</div>