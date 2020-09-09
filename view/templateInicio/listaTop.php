<nav class="nav flex-column blue lighten-5 py-4 ">
    <!-- Rotating card -->

    

        <!-- Rotating card -->
<a class="nav-link" href="../../"><i class="fa fa-music" aria-hidden="true"></i> Todos los generos</a>
    <?php 
        $top=ModeloClienteProducto::sqlListarTop();
        $cont_2=0;
        foreach($top as $key=>$value){
            if($cont_2<15){
                echo'

                <div class="card-wrapper ">
                    <div id="card-2" class="card card-rotating text-center ">
                        <!--Front Side-->
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="face front">
                                    <!-- Image-->
                                    <div class="view overlay">
                                        <img class="card-img-top" src="../../img/proveedores/'.$value['img'].'" alt="Example photo" >
                                        <a>
                                        <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                    
                                </div>
                                <!--Front Side-->
                            </div>
                            
                            <div class="col-lg-7">
                                <!--Content-->
                                <div class="card-body topDescripcionProducto">
                                    <a class="rotate-btn float-right" data-card="card-2" href="'.(ControladorPlantillaInicio::url_producto()).$value['id_producto'].'"><i class="fas fa-share-alt fa-lg"></i></a>
                                    <p class="card-text text topNombreTema" >'.($value['url_directorio']).'</p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>';
            }
            $cont_2++;
        }
    ?>
</nav>