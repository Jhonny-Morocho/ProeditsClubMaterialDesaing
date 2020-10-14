 <!-- <div id="playlistContainer" class="row playlist">
    <div class="row center album-name">
        <ul class="list-group" id="playlist">
        <?php foreach (Pagination::show_rows("id") as $row): ?>
                <?php  $banderaError=false; if( $row['apodo']!== 'Error: vacío' ){ ?>
                    <div class="row" title="Add to car : <?php echo $row['url_directorio']?>" >
                        <div class="col-lg-1 ">
                            <i class="fas fa-cart-plus agregar-carrito buy "  data-id="<?php echo $row['id']?>" data-nombre="<?php echo $row['url_directorio']?>" data-precio="<?php echo $row['precio']?>" ></i>
                        </div>
                    </div>
                    <li data-src="../../biblioteca/<?php echo $row['url_directorio']?> " data-title="<?php echo $row['url_directorio']?>" data-length="194" class="song-row">
                        <div class="left">
                            <i class="fa fa-play play-song button" aria-hidden="true"></i>               
                        </div>
                        <div class="middle">            
                            <span class="song"  title="<?php echo $row['url_directorio']?>"><?php echo $row['url_directorio']?> </span>
                            <span class=" badge badge-primary">$<?php echo $row['precio']?></span>
                            <span class="song "><?php echo $row['genero']?></span>
                            <span class="song ">/</span>
                            <span class="song "><?php echo $row['fecha_producto']?></span>
                        </div>
                        <div class="right">
                            <div class="dropdown">
                                <i class="fa fa-lg fa-ellipsis-v button song-menu" aria-hidden="true" data-toggle="dropdown"></i>
                                <ul class="dropdown-menu pull-right">
                                    <li><a  target="alt" href="../<?php echo ControladorPlantillaInicio::url_demo().$row['id'] ?>"><i class="fa fa-fw fa-share" aria-hidden="true"></i> Share</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <?php }else{
                        echo '<div class="alert alert-primary" role="alert">
                                No existe resultado para la cadena de busqueda 
                            </div>';
                        $banderaError=true;
                    } ?>	
            <?php endforeach; ?>
                </ul>
    </div>
</div>  -->



<div id="demo" >
    <div class="list-group no-padding" id="playlist">
    <?php foreach (Pagination::show_rows("id") as $row): ?>
        <?php  $banderaError=false; if( $row['apodo']!== 'Error: vacío' ){ ?>
            <div class="row  filaItemProducto black pt-2 pb-2">
                <div class="col-lg-2 mt-2 mb-2 no-padding agregar-carrito buy " data-toggle="tooltip" data-placement="top"
                                                                        title="Add to car : <?php echo $row['url_directorio']?>" data-id="<?php echo $row['id']?>" data-nombre="<?php echo $row['url_directorio']?>" data-precio="<?php echo $row['precio']?>" >
                    <i class="fas fa-cart-plus ml-1"></i>
                    <span >$<?php echo $row['precio']?></span>
                </div>
                
                <div class="col-lg-9  mt-2 mb-2 producto" >
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
                    <i class="fa fa-play-circle" aria-hidden="true" style="font-size: 18px !important;" ></i>
                        <?php echo $row['url_directorio']?> 
                        
                    </a>
                    
                </div>

                <div class="col-lg-1 mt-2 mb-2 genero" data-toggle="tooltip" data-placement="top" title="<?php echo $row['genero']?>">
                    <span >
                        <?php echo $row['genero']?>
                    </span>
                </div>
                <!-- <div  class="col-lg-2 mt-2 mb-2 fecha">
                    <span class="">
                       <?php echo $row['apodo']?>
                    </span>
                </div> -->
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

