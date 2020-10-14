
<div id="demo" >
    <div class="list-group no-padding" id="playlist">
    <?php foreach (Pagination::show_rows("id") as $row): ?>
        <?php  $banderaError=false; if( $row['apodo']!== 'Error: vacío' ){ ?>
            <div class="row  filaItemProducto  pt-2 pb-2">
                <div class="col-lg-12  mt-2 mb-2 producto" >
                    <!--Section: Author Box-->
                    <section>

                        <div class="media  px-1">
                        <img class="card-img-100  d-flex z-depth-1 mr-3" src="../../img/proveedores/<?php echo $row['img']?>"
                            alt="Generic placeholder image">
                            <div class="media-body">
                                <a href="../../biblioteca/<?php echo $row['url_directorio']?>"  >
                                    <?php  
                                        date_default_timezone_set('America/Guayaquil');
                                        $fecha_actual=date("Y-m-d");
                                        $date1 = new DateTime($row['fecha_producto']);
                                        $date2 = new DateTime($fecha_actual);
                                        $diff = $date1->diff($date2);
                                            if ($diff->days<31) {
                                            echo '<span class="badge badge-primary">New</span>';
                                            }
                                    ?>
                                    <i class="fa fa-play-circle" aria-hidden="true" style="font-size: 30px !important;" ></i>
                                
                                        <?php echo $row['url_directorio']?> 
                                    </a>
                                    <h6 class="sub-title text-uppercase font-weight-bold white-text" style="border-top: 1px solid;width: 100%; color: black!important;" >
                                    <div class="row mt-1">
                                            <div class="col-4">
                                                <span class="badge badge-danger">Genero </span><span style="color: black; font-size: 15px;" class="ml-1"><?php echo $row['genero']?></span> 

                                            </div>
                                            <div class="col-4">
                                                <span class="badge badge-danger">Precio</span><span style="color: black;" class="m-1">$<?php echo $row['precio']?></span> 

                                            </div>
                                            <div class="col-4">
                                                <span class="badge badge-default">Buy</span>
                                                <span class="no-padding agregar-carrito buy mt-1" data-toggle="tooltip" data-placement="top"
                                                                        title="Add to car : <?php echo $row['url_directorio']?>" data-id="<?php echo $row['id']?>" data-nombre="<?php echo $row['url_directorio']?>" data-precio="<?php echo $row['precio']?>" >
                                                    <i class="fas fa-cart-plus ml-1" style="font-size: 20px;"></i>
                                                    
                                                </span>

                                            </div>
                                    </div>
                                    
                            </div>
                        </div>

                    </section>
                    <!--Section: Author Box-->
                </div>

            </div>
        <?php }else{
                        echo '<div class="alert alert-primary" role="alert">
                                No existe resultado para la cadena de busqueda 
                            </div>';
                        $banderaError=true;
                    } ?>	
            <?php endforeach; ?>
    </div>
</div>

