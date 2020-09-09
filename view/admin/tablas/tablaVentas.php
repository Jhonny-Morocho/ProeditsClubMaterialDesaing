
 
   <!-- Main content -->
   <section class="content">
  
  <div class="row">
    <div class="col-lg-12">
         <!-- DATA TABLE GENERO -->
         <div class="box">
        <div class="box-header">
          <h3 class="box-title">Compras</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

       <?php 
         $cliente = new ModeloCliente();// para el formulario de informacion del cliente
   
         $facturas=ModeloFacura::sqlListarFacturasTodos();
    
        $cont_2=1;
       ?>
        <?php  foreach($facturas as $key=>$value){?>
                <div class="">
                    <table id="dtBasicExample" class="table  table-striped table-bordered table-sm"  width="100%">
                    <p> <br> Fecha de compra: <?php echo $value['fecha_factura'] ?> </p>
                    <p>Total : <?php echo $value['total'] ?></p>
                    <p>Cliente : <?php echo $value['correo'] ?></p>
                    <p>Nombre : <?php echo $value['nombre'] ?></p>
                    <p>Apeliido : <?php echo $value['apellido'] ?></p>
                        <thead class="thead-light ">
                        <tr>
                            <th>#</th>
                            <th>Download</th>
                            <th>REMIXER</th>
                            <th>TITLE</th>
                            <th>PRICE</th>
                            <th>METHOD PAYMENT</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        <?php 
                            
                              $clienteProductos=ModeloClienteProducto::sqlListarProductosCliente($value['id_cliente'],$value['id']);
                              //print_r($clienteProductos);
                              foreach($clienteProductos as $key=>$value){
                                  echo'<tr>   
                                          <th scope="row">'.$cont_2.'</th>
                                          <td><a download   href="'.$value['url_descarga'].'" class="bontIconosProducto"><i class="fa fa-fw fa-cloud-download"></i></a></td>      
                                          <td>'.$value['apodo'].'</td>
                                          <td>'.$value['url_directorio'].'</td>
                                          <td>$ '.$value['precio_compra'].'</td>
                                          <td>'.$value['metodo_compra'].'</td>
                                      </tr>';
                                  $cont_2++;
                              } 
                            ?>
                        </tbody>
                    </table>
                </div><!-- /.box-->
                  
              <?php  } ?>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div> 
  <!-- /.row -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->