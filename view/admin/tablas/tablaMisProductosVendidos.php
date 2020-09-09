
   <!-- Main content -->
   <section class="content">
  
  <div class="row">
    <div class="col-lg-12">
         <!-- DATA TABLE GENERO -->
         <div class="box">
        <div class="box-header">
          <h3 class="box-title">Mis ventas Pendiente cobrar</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <table id="example2" class="table table-striped table-bordered dt-responsive nowrap table-hover"  width="100%"  >
            <thead>
                <tr>
                    <th># </th>
                    <th>Producto</th>
                    <th>Id Factura</th>
                    <th>Tipo Pago</th>
                    <th>Precio de Venta</th>
                    <th>Fecha de venta</th>
                    <th>Estado Pago</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $cont=1;
                    $suma_total=0;
                    $productos_vendidos=ModeloClienteProducto::sqlListarProductosVendidosProveedor(@$_SESSION['id_proveedor']);
                        foreach($productos_vendidos as $key=>$value){

                            if($_SESSION['id_proveedor']==$value['id_proveedor'] && $value['estado_pago_proveedor']==0 ){

                                echo'<tr>
                                            <td>'.( $value['id_producto'] ).'</td>
                        
                                            <td>'.( $value['url_directorio'] ).'</td>
                                            <td>'.( $value['id_factura'] ).'</td>
                                            <td>'.( $value['metodo_compra'] ).'</td>
                                            <td>$'.( $value['precio_compra'] ).'</td>
                                            <td>'.( $value['fecha_compra'] ).'</td>';
                                            echo'<td><small class="label  bg-yellow">Pendiente</small> </td>';
                                    
                                    echo"</tr>";
                                    $suma_total=$value['precio_compra']+$suma_total;

                            }
                        }

                ?>

            </tbody>
        </table>
        <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo "Suma total: $ ".$suma_total;?></h3>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
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