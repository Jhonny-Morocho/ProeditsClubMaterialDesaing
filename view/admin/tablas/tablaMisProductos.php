<?php 
          ini_set('display_errors', 'On');
          //validacion de campos
  
          
          $respuestaValidacionBuscador=Pagination::validarCamposBuscador(@$_GET['busqueda']);
      

          $where1="  where productos.id_proveedor=proveedor.id and
                      productos.id_genero=biblioteca.id and 
                      productos.estado=1  and proveedor.id=".intval(@$_SESSION['id_proveedor']);

          $where2=" where productos.id_proveedor=proveedor.id and
          productos.id_genero=genero.id and 
          productos.estado=1  and 
                                   productos.url_directorio LIKE '%".@$_GET['busqueda']."%'
                                 ";
                                 
          

          $whereRemixer=" where productos.id_proveedor=proveedor.id and
          productos.id_biblioteca=biblioteca.id and 
          productos.activo=1  and 
                                  proveedor.id=".intval(@$_SESSION['id_proveedor']);
        // 1.Caso solo filtros de genero y remixer sin buscador
        $whereGenero=" where productos.id_proveedor=proveedor.id and
             productos.id_biblioteca=biblioteca.id and 
             productos.activo=1  and 
                           biblioteca.id=".intval(@$_GET['genero']);// conviuerrto en numero
          
        // 2.Caso solo filtros de genero y remixer sin buscado    
        $whereRemixerGenero=" where productos.id_proveedor=proveedor.id and
        productos.id_biblioteca=biblioteca.id and 
        productos.activo=1  and 
                                proveedor.id=".intval(@$_SESSION['id_proveedor'])." and  biblioteca.id=".intval(@$_GET['genero']);

        $whereDemoGenero=" where productos.id_proveedor=proveedor.id and
        productos.id_biblioteca=biblioteca.id and 
        productos.activo=1  and 
                                biblioteca.id=".intval(@$_GET['genero'])." and   productos.url_directorio LIKE '%".@$_GET['busqueda']."%'   ";
                                
        $whereDemoGeneroRemixer=" where productos.id_proveedor=proveedor.id and
        productos.id_biblioteca=biblioteca.id and 
        productos.activo=1  and 
                                biblioteca.id=".intval(@$_GET['genero'])." and   proveedor.id=".intval(@$_SESSION['id_proveedor'])." and   productos.url_directorio LIKE '%".@$_GET['busqueda']."%'   ";
        $whereDemoRemixer=" where productos.id_proveedor=proveedor.id and
        productos.id_biblioteca=biblioteca.id and 
        productos.activo=1  and 
                             proveedor.id=".intval(@$_SESSION['id_proveedor'])." and   productos.url_directorio LIKE '%".@$_GET['busqueda']."%'   ";


        $numeroFilas=30;
        
       
        
      function validarNumeros($numero){

          if (filter_var($numero, FILTER_VALIDATE_INT)) {
              return true;
              //print "<p>Ha escrito un número entero: $numero.</p>\n";
          } else {
            return false;
              //print "<p>NO ha escrito un número entero: $numero.</p>\n";
          }

      }
     


      //echo "VALIDACION : ".(validarNumeros(@$_GET['genero']));
      $validacionIdGenero=validarNumeros(@$_GET['genero']);
      $validacionIdRemixer=validarNumeros(@$_SESSION['id_proveedor']);
      $validacionIdPaginacion=validarNumeros(@$_GET['page']);
      //echo "VALIDACIONPaginacion : ".(validarNumeros(@$_GET['page']));
      
      $page = (validarNumeros(@$_GET['page'])=="true") ? $_GET["page"] : 1;



        $data="";


        
        //1. Caso//  buscador= vacio; genero=vacio; remixer=vacio
        if(!@$_GET['busqueda'] && !@$_GET['genero'] && !@$_SESSION['id_proveedor'] ){// primer caso// no necesita validaciion x q la data es vacia
          Pagination::config($page,$numeroFilas, " productos , proveedor , biblioteca ", $where1, null , 30,'inicio');
          //echo "caso 1";
        }

        //2.Caso// buscador=data; genero=vacio; remixer=vacio
          if(@$_GET['busqueda'] && !@$_GET['genero'] && !@$_SESSION['id_proveedor'] && $respuestaValidacionBuscador['respuesta_validacion']=="TRUE"){
            //echo "caso 2";
          Pagination::config($page,$numeroFilas, " productos , proveedor , biblioteca ", $where2, null , 30,'todo');
          }

        //3.Caso// buscador=data; genero=data; remixer=vacio;
        if(@$_GET['busqueda'] && @$_GET['genero'] && !@$_SESSION['id_proveedor'] && $respuestaValidacionBuscador['respuesta_validacion']=="TRUE" && validarNumeros(@$_GET['genero'])=="TRUE" ){
          //echo "caso 3";
          Pagination::config($page,$numeroFilas, " productos , proveedor , biblioteca ", $whereDemoGenero, null , 30,'todo');
          }

        //4.Caso// buscador=data; genero=data; remixer=data;
        if(@$_GET['busqueda'] && @$_GET['genero'] && @$_SESSION['id_proveedor'] && $respuestaValidacionBuscador['respuesta_validacion']=="TRUE" && validarNumeros(@$_GET['genero'])=="TRUE" && validarNumeros(@$_SESSION['id_proveedor'])=="TRUE" ){
          //echo "caso 4";
          Pagination::config($page,$numeroFilas, " productos , proveedor , biblioteca ", $whereDemoGeneroRemixer, null , 30,'todo');
          }
        //5.Caso// buscador=data;genero=vacio; remixer=data;
        if(@$_GET['busqueda'] && !@$_GET['genero'] && @$_SESSION['id_proveedor'] && $respuestaValidacionBuscador['respuesta_validacion']=="TRUE"  && validarNumeros(@$_SESSION['id_proveedor'])=="TRUE"){
          //echo "caso 5";
          Pagination::config($page,$numeroFilas, " productos , proveedor , biblioteca ", $whereDemoRemixer, null , 30,'todo');
        }

        //6.Caso// buscador=vacio;genero=data; remixer=data;
        if(!@$_GET['busqueda'] && @$_GET['genero'] && @$_SESSION['id_proveedor'] && validarNumeros(@$_GET['genero'])=="true" && validarNumeros(@$_SESSION['id_proveedor'])=="true"){
          echo "caso 6";
          Pagination::config($page,$numeroFilas, " productos , proveedor , biblioteca ", $whereRemixerGenero, null , 30,'todo');
        }

        //7.Caso// buscador=vacio;genero=vacio; remixer=data;
          if(!@$_GET['busqueda'] && !@$_GET['genero'] && @$_SESSION['id_proveedor']  && validarNumeros(@$_SESSION['id_proveedor'])=="TRUE"){
            //echo "caso 7";
            Pagination::config($page,$numeroFilas, " productos , proveedor , biblioteca ", $whereRemixer, null , 30,'todo');
        }

        //8.Caso// buscador=vacio;genero=data; remixer=vacio;
          if(!@$_GET['busqueda'] && @$_GET['genero'] && !@$_SESSION['id_proveedor'] && validarNumeros(@$_GET['genero'])=="TRUE"){
            //echo "caso 8";
            Pagination::config($page,$numeroFilas, " productos , proveedor , biblioteca ", $whereGenero, null , 30,'todo');
        }
        
           try {
             //code...
             $data = Pagination::data();// si exite un error q reenvie al index
           } catch (\Throwable $th) {
             header('Location: ./');
           }
          
  ?> 
   
   
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-12">
         <!-- DATA TABLE GENERO -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Productos</h3>
          <div id="myElement2"></div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="text-center " style="color: #757575;" method="get" action="../view/admin/listarMisProductos.php">
            <div class="form-row">
                <div class="col-lg-4">
                    <!-- First name -->
                    <div class="md-form">
                        <!-- <i class="fas fa-search" aria-hidden="true"></i> -->
                        <?php if(@$_GET['busqueda']) {?>
                            <input class="form-control form-control-sm "  name="busqueda"  type="text" placeholder="Search"
                            aria-label="Search" value="<?php echo $_GET['busqueda']  ?>">
                        <?php }else{ ?>
                          <input class="form-control form-control-sm "  name="busqueda"  type="text" placeholder="Search"
                            aria-label="Search">
                        <?php }?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- First name -->
                    <div class="md-form">
                      <?php if(@$_GET['genero']){?>                            
                            <!-- xxx<option value="1" selected>Feedback</option> -->
                        <select class=" form-control form-control-sm ml-3 w-60 selectGeneroRemixer" name="genero" >
                            <?php 
                                $genero=ModeloGenero::sql_lisartar_genero();

                                foreach ($genero as $key => $value) {
                                  if($_GET['genero']==$value['id']){ 
                                    echo '<option value="'.$value['id'].'" >'.$value['genero'].'</option>';
                                  }
                                }
                                //print_r($genero);
                                echo '<option value="" >GENER</option>';
                                foreach($genero as $key=>$value){ ?>
                                  
                                  <?php if($_GET['genero']!=$value['id']){ ?>
                                    <option value="<?php echo$value['id'] ?>" > <?php echo$value['genero'] ?> </option>
                                    <?php }?>
                                <?php }?>
                        </select>
                      <?php }else{?>
                        <select class="form-control form-control-sm ml-3 w-60 selectGeneroRemixer" name="genero" >
                            <option value="" >GENER</option>
                            <!--777 <option value="1" selected>Feedback</option> -->
                            <?php 
                                $genero=ModeloGenero::sql_lisartar_genero();
                            
                                foreach($genero as $key=>$value){ ?>
                                    <option value="<?php echo$value['id'] ?>" > <?php echo$value['genero'] ?> </option>
                            <?php }?>
                        </select>
                        <?php }?>
                    </div>
                </div>
                </div><div class="col-lg-4">
                    <div class="form-group">
                      <button class="btn bg-olive margin" type="submit">Buscar</button>
                    </div>
                </div>
            </div>
          </form>
              <table id=""  class="table table-bordered table-striped table-responsive ">
                <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Img</th>
                    <th>Titulo</th>
                    <th>Genero</th>
                    <th>Editor</th>
                    <th>Precio</th>
                    <th>Descarga</th>
                    <th>Play</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                    <th>Compartir</th>
                  </tr>
                </thead>
                <tbody>

                <?php foreach (Pagination::show_rows("id") as $row): ?>
                    <?php  $banderaError=false; if( $row['apodo']!== 'Error: vacío' ){ ?>
                        <tr>
                          <th><?php echo $row['fecha_producto']?></th>
                          <td>
                            <div class="attachment-block ">
                              <img class="attachment-img" src="../img/caratulas/<?php echo $row['caratula']?>" alt="Image">
                                <span class="editProductoImg" aria-hidden="true" data-toggle="modal" data-target="#modalEditarCaratulaProducto" data-name="<?php echo $row['caratula']?>" data-id="<?php echo $row['id']?>">
                                  <i class="fa fa-fw fa-pencil-square-o"></i>
                                </span>
                            </div>
                          </td>
                          <td><?php echo $row['url_directorio']?></td>
                          <td ><?php echo $row['genero']?></td>
                          <td><?php echo $row['apodo']?></td>
                          <td><span>$<?php echo $row['precio']?></span></td>
                          <td><a  target="alt" href="<?php echo $row['url_descarga']?>" class="bontIconosProducto"><i class="fa fa-fw fa-cloud-download"></i></a></td>
                          <td>
                              <div class="bontIconosProducto reproducirContenedor" data-demo="../biblioteca/<?php echo $row ['url_directorio'] ?>" ><i class="fa fa-fw fa-play-circle"></i></div>
                          </td>
                          <td>
                              <div class="bontIconosProducto editProducto"  data-toggle="modal" data-target="#modalEditarProducto"  data-linkDescarga="<?php echo $row['url_descarga']?>"
                                  data-idProducto="<?php echo $row['id'] ?>"  data-idProveedor="<?php echo $row['id_proveedor'] ?>"  
                                    
                                  data-precio="<?php echo $row['precio'] ?>" data-titulo="<?php echo $row['url_directorio'] ?>"  >

                                  <i class="fa fa-fw fa-pencil">
                                  </i>
                              </div>
                          </td>
                          <td><div class="bontIconosProductos deleteProductos"  data-id="<?php echo $row['id'] ?>"   
                                                                data-demo="<?php echo $row['url_directorio']?> "   
                                                                data-remixCompleto="<?php echo  $row['url_descarga'] ?> " >
                                  <i class="fa fa-fw fa-trash"></i>
                              </div>
                          </td>
                          <td>
                                <a href="https://www.proeditsclub.com/demo.php?id_producto=<?php echo $row['id'] ?>" target="_blank""> 
                                    <i class="fa fa-fw fa-share-alt"></i>
                                </a> 
                           </td>
                    <?php }else{
                          echo '<div class="alert alert-primary" role="alert">
                                  No existe resultado para la cadena de busqueda 
                              </div>';
                          $banderaError=true;
                      } ?>	
                  <?php endforeach; ?>
                </tfoot>
              </table>
              <!-- ===================================Reproductor de Audio=================== -->
                <?php require'../../jPlayer/reproductor.php';  ?>
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="container text-cente">
                          <?php if( $banderaError==false){  // si no exite resultado osea marcar erro entonces no presentra paginacion?>
                                  <nav aria-label="Page navigation example">
                                    <ul class="pagination pg-blue">
                                        <?php if ($data["actual-section"] != 1): ?> 		  			
                                            <li class="page-item" ><a class="page-link" href="../view/admin/listarMisProductos.php?busqueda=<?php echo @$_GET['busqueda'] ?>&genero=<?php echo @$_GET['genero'] ?>&remixer=<?php echo @$_SESSION['id_proveedor'] ?>&page=1">Inicio</a></li>
                                            <li class="page-item" ><a class="page-link"" href="../view/admin/listarMisProductos.php?busqueda=<?php echo @$_GET['busqueda'] ?>&genero=<?php echo @$_GET['genero'] ?>&remixer=<?php echo @$_SESSION['id_proveedor'] ?>&page=<?php echo $data['previous']; ?>">&laquo;</a></li>
                                        <?php endif; ?>

                                        <?php for ($i = $data["section-start"]; $i <= $data["section-end"]; $i++): ?>					
                                        <?php if ($i > $data["total-pages"]): break; endif; ?>
                                        <?php $active = ($i == $data["this-page"]) ? "active" : ""; ?>			    
                                            <li class="page-item <?php echo $active; ?>">
                                            <a class="page-link" href="../view/admin/listarMisProductos.php?busqueda=<?php echo @$_GET['busqueda'] ?>&genero=<?php echo @$_GET['genero'] ?>&remixer=<?php echo @$_SESSION['id_proveedor'] ?>&page=<?php echo $i; ?>">
                                                <?php echo $i; ?>			    		
                                            </a>
                                            </li>
                                            <?php endfor; ?>
                                        
                                        <?php if ($data["actual-section"] != $data["total-sections"]): ?>
                                            <li  class="page-item"  ><a lass="page-link"  href="../view/admin/listarMisProductos.php?busqueda=<?php echo @$_GET['busqueda'] ?>&genero=<?php echo @$_GET['genero'] ?>&remixer=<?php echo @$_SESSION['id_proveedor'] ?>&page=<?php echo $data['next']; ?>">&raquo;</a></li>
                                            <li  class="page-item"><a class="page-link"  href="../view/admin/listarMisProductos.php?busqueda=<?php echo @$_GET['busqueda'] ?>&genero=<?php echo @$_GET['genero'] ?>&remixer=<?php echo @$_SESSION['id_proveedor'] ?>&page=<?php echo $data['total-pages']; ?>">Final</a></li>
                                            <?php endif; ?>
                                     </ul>
                                  </nav>
                              <?php }  ?>
                          </div> <!--  end container text center -->
                      </div><!--  end col-12 -->
                 </div> <!--  end row -->
        </div><!-- end box-body -->
      </div> <!-- end box -->
    </div> <!-- end .col-12 -->
  </div>  <!-- end .row -->
</section> <!-- end section -->


