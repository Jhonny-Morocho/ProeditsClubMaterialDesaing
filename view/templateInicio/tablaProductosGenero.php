

<?php 

       
        $numeroProducto=30;
        
        $respuestaValidacion=Pagination::validarCamposBuscador(@$_GET['busqueda']);

        //print_r($respuestaValidacion);
        //echo is_int ($_GET['id_proveedor']);
        
        // =====================FALTA CONFIGURAR BUSCADOR DE DJ Y DE GENERO====================

        $where1="WHERE 
                            productos.id_proveedor=proveedor.id 
                    and     productos.id_biblioteca=biblioteca.id 
                    and     productos.activo=1 

                    and proveedor.estado='1'  and  biblioteca.id = ".@$_GET['id_genero']; 

        $where2=" WHERE 
                            productos.id_proveedor=proveedor.id 
                    and     productos.id_biblioteca=biblioteca.id 
                    and     productos.activo=1  
                    and proveedor.estado='1'  and biblioteca.id = ".@$_GET['id_genero'];    
                    
       
        if(@$_GET['busqueda'] && $respuestaValidacion['respuesta_validacion']=="TRUE"){
            
            $page = (isset($_GET["page"]) && is_numeric($_GET["page"])) ? $_GET["page"] : 1;
            Pagination::config($page, $numeroProducto, " productos , proveedor , biblioteca ", $where2, null , 10); 
            $data = Pagination::data(); 
            //print_r($data);
        }else{
            
            //cuando la pagina inicia solo presenta los datos normales

            //echo  is_int(@$_GET['id_proveedor'])==TRUE ? 'TRUE' : 'FALSE'; // get TRUE
            
            $page = (isset($_GET["page"]) && is_numeric($_GET["id_genero"])) ? $_GET["page"] : 1;
            Pagination::config($page, $numeroProducto, " productos , proveedor , biblioteca ", $where1, null , 10); 
            $data = Pagination::data(); 
        }
        
    ?> 
<!-- =============================== STOCK ===================-->
<!-- =============================== STOCK ===================-->
<!-- =============================== STOCK ===================-->
<div class="">
    <div class="row  mt-3 mb-5">
        <div class="col-lg-3">
            <?php require'view/templateInicio/listaGenero.php'; ?>
        </div>
        <div class="col-lg-6">
                <div class="descripcionNav">
					<i class="fa fa-star" aria-hidden="true"></i>
                    <?php 
                        foreach($biblioteca as $key=>$value){ 

                            if(@$_GET['id_genero']==$value['id']){
                                echo $value['genero'];
                                
                            }
                        }
                    ?>
				</div>

            <!-- Search form BUSADOR -->
			<?php require'view/templateInicio/buscador.php'; ?>
		

            <!-- list  productos  music-->
            <div id="playlistContainer" class="row playlist">
                <div class="row center album-name">
                    <ul class="list-group" id="playlist">
                        <?php foreach (Pagination::show_rows("id") as $row): ?>
                            <?php  $banderaError=false; if( $row['apodo']!== 'Error: vacío' ){ ?>
                            <div class="row" title="Add to car : <?php echo $row['url_directorio']?>">
                                <div class="col-lg-1">
                                    <i class="fas fa-cart-plus"></i>
                                </div>
                            </div>
                            <li data-src="../../biblioteca/<?php echo $row['url_directorio']?> " data-title="<?php echo $row['url_directorio']?>" data-length="194" class="song-row">
                                <div class="left">
                                    <i class="fa fa-play play-song button" aria-hidden="true"></i>               
                                </div>
                                <div class="middle">            
                                    <span class="song"><?php echo $row['url_directorio']?> </span>
                                    <span class="length">$<?php echo $row['precio']?></span>
                                    <span class="length"><?php echo $row['genero']?></span>
                                    <span class="length"><?php echo $row['fecha_producto']?></span>
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

                <div class="d-flex justify-content-center ">
                    <?php if( $banderaError==false){  // si no exite resultado osea marcar erro entonces no presentra paginacion?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pg-red">
                                <?php if ($data["actual-section"] != 1): ?> 		  			
                                    <li class="page-item" ><a class="page-link" href="../../genero_productos.php?busqueda=<?php echo @$_GET['busqueda'] ?>&id_genero=<?php echo $_GET['id_genero'] ?>&page=1">Inicio</a></li>
                                    <li class="page-item" ><a class="page-link"" href="../../genero_productos.php?busqueda=<?php echo @$_GET['busqueda'] ?>&id_genero=<?php echo $_GET['id_genero'] ?>&page=<?php echo $data['previous']; ?>">&laquo;</a></li>
                                <?php endif; ?>

                                <?php for ($i = $data["section-start"]; $i <= $data["section-end"]; $i++): ?>					
                                <?php if ($i > $data["total-pages"]): break; endif; ?>
                                <?php $active = ($i == $data["this-page"]) ? "active" : ""; ?>			    
                                    <li class="page-item <?php echo $active; ?>">
                                    <a class="page-link" href="../../genero_productos.php?busqueda=<?php echo @$_GET['busqueda'] ?>&id_genero=<?php echo $_GET['id_genero'] ?>&page=<?php echo $i; ?>">
                                        <?php echo $i; ?>			    		
                                    </a>
                                    </li>
                                    <?php endfor; ?>
                                
                                <?php if ($data["actual-section"] != $data["total-sections"]): ?>
                                    <li  class="page-item"  ><a lass="page-link"  href="../../genero_productos.php?busqueda=<?php echo @$_GET['busqueda'] ?>&id_genero=<?php echo $_GET['id_genero'] ?>&page=<?php echo $data['next']; ?>">&raquo;</a></li>
                                    <li  class="page-item"><a class="page-link"  href="../../genero_productos.php?busqueda=<?php echo @$_GET['busqueda'] ?>&id_genero=<?php echo $_GET['id_genero'] ?>&page=<?php echo $data['total-pages']; ?>">Final</a></li>
                                    <?php endif; ?>
                            </ul>
                        </nav>
                    <?php }  ?>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <?php require'view/templateInicio/listaTop.php'; ?>
        </div>
    </div>
</div>

