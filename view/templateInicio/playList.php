<div id="playlistContainer" class="row playlist">
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
                            <span class="song"><?php echo $row['url_directorio']?> </span>
                            <span class="length badge badge-primary">$<?php echo $row['precio']?></span>
                            <span class="length"><?php echo $row['genero']?></span>
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
</div>