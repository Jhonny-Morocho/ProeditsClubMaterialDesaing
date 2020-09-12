<?php 
            $numeroProducto=30;
            $respuestaValidacion=Pagination::validarCamposBuscador(@$_GET['busqueda']);

            // =====================FALTA CONFIGURAR BUSCADOR DE DJ Y DE GENERO====================
    
            $where1="WHERE 
                                productos.id_proveedor=proveedor.id 
                        and     productos.id_biblioteca=biblioteca.id 
                        and     productos.activo=1 
                        and proveedor.estado='1'  and  proveedor.id = ".@$_GET['id_proveedor']; 

            $where2=" WHERE 
                                productos.id_proveedor=proveedor.id 
                        and     productos.id_biblioteca=biblioteca.id 
                        and     productos.activo=1 
                        and proveedor.estado='1'  and proveedor.id = ".@$_GET['id_proveedor'];    
                        
           
            if(@$_GET['busqueda'] && $respuestaValidacion['respuesta_validacion']=="TRUE"){
                
                $page = (isset($_GET["page"]) && is_numeric($_GET["page"])) ? $_GET["page"] : 1;
                Pagination::config($page, $numeroProducto, " productos , proveedor , biblioteca ", $where2, null , 10); 
                $data = Pagination::data(); 
                //print_r($data);
            }else{
                
                $page = (isset($_GET["page"]) && is_numeric($_GET["id_proveedor"])) ? $_GET["page"] : 1;
                Pagination::config($page, $numeroProducto, " productos , proveedor , biblioteca ", $where1, null , 10); 
                $data = Pagination::data(); 
            }
            
        ?> 


        <!-- =============================== STOCK ===================-->
	<!-- =============================== STOCK ===================-->
	<!-- =============================== STOCK ===================-->
	<div class="">
		<div class="row mt-3 mb-5">
			<div class="col-lg-3 card">
				<?php require'view/templateInicio/listaGenero.php'; ?>
			</div>
			<div class="col-lg-6 card">
				<div class="descripcionNav card">
					<i class="fa fa-star" aria-hidden="true"></i>
                    <?php 
                        $proveedores=ModeloProveedor::sql_lisartar_proveedor();
                        foreach($proveedores as $key=>$value){ 
                                
                                if(@$_GET['id_proveedor']==$value['id']){
                                    echo $value['apodo'];
                                break;
                            }
                        }
                    ?>
				</div>

				<!-- Search form -->
				<?php require'view/templateInicio/buscador.php'; ?>
				
				<!-- list  productos  play list-->
				<?php require'view/templateInicio/playList.php'; ?>
				
				<div class="d-flex justify-content-center center-block">
					<?php if( $banderaError==false){  // si no exite resultado osea marcar erro entonces no presentra paginacion?>
						<nav aria-label="Page navigation example">
							<ul class="pagination pg-red">
								<?php if ($data["actual-section"] != 1): ?> 		  			
									<li class="page-item" ><a class="page-link" href="../../dj_productos.php?busqueda=<?php echo @$_GET['busqueda'] ?>&id_proveedor=<?php echo @$_GET['id_proveedor'] ?>&dj=<?php echo @$_GET['dj'] ?>&page=1">Inicio</a></li>
									<li class="page-item" ><a class="page-link"" href="../../dj_productos.php?busqueda=<?php echo @$_GET['busqueda'] ?>&id_proveedor=<?php echo @$_GET['id_proveedor'] ?>&dj=<?php echo @$_GET['dj'] ?>&page=<?php echo $data['previous']; ?>">&laquo;</a></li>
								<?php endif; ?>

								<?php for ($i = $data["section-start"]; $i <= $data["section-end"]; $i++): ?>					
								<?php if ($i > $data["total-pages"]): break; endif; ?>
								<?php $active = ($i == $data["this-page"]) ? "active" : ""; ?>			    
									<li class="page-item <?php echo $active; ?>">
									<a class="page-link" href="../../dj_productos.php?busqueda=<?php echo @$_GET['busqueda'] ?>&id_proveedor=<?php echo @$_GET['id_proveedor'] ?>&dj=<?php echo @$_GET['dj'] ?>&page=<?php echo $i; ?>">
										<?php echo $i; ?>			    		
									</a>
									</li>
									<?php endfor; ?>
								
								<?php if ($data["actual-section"] != $data["total-sections"]): ?>
									<li  class="page-item"  ><a class="page-link"  href="../../dj_productos.php?busqueda=<?php echo @$_GET['busqueda'] ?>&id_proveedor=<?php echo @$_GET['id_proveedor'] ?>&dj=<?php echo @$_GET['dj'] ?>&page=<?php echo $data['next']; ?>">&raquo;</a></li>
									<li  class="page-item"><a class="page-link"  href="../../dj_productos.php?busqueda=<?php echo @$_GET['busqueda'] ?>&id_proveedor=<?php echo @$_GET['id_proveedor'] ?>&dj=<?php echo @$_GET['dj'] ?>&page=<?php echo $data['total-pages']; ?>">Final</a></li>
									<?php endif; ?>
							</ul>
						</nav>
					<?php }  ?>
				</div>
			</div>

			<div class="col-lg-3 card">
				<?php require'view/templateInicio/listaTop.php'; ?>
			</div>
		</div>
	</div>