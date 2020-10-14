<?php
 ini_set('display_errors', 'On');

 require'../../controler/controlerTemplateAdmin.php';
 require'../../model/conexion.php';
 require'../../model/mdlOferta.php';


 $respuesta=ModeloOferta::sql_lisartar_Oferta();

 //print_r($respuesta);
 date_default_timezone_set('America/Guayaquil');
 $fecha_actual=date("Y-m-d");


// //Creacion del objeto
$plantilla= new controlerPlantillaAdmin();
$plantilla->usuario_autentificado();
 $plantilla->ctr_header();
$plantilla->ctr_navegador_Izquierda();

?>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-lg-12">
              <!-- formulario -->
                  <div class="box box-primary">
                      <div class="box-header with-border">
                      <h3 class="box-title">Promocion    
                      <?php  
                          // if($respuesta[0]['fechaExpiracion']>$fecha_actual ){
                          // echo '<span class="pull-right-container " style="padding-left: 5px;">
                          //         <small class="label pull-right bg-green"> Activa</small>
                          //       </span>';
                          // }else{
                          //   echo '<span class="pull-right-container" style="padding-left: 5px;">
                          //           <small class="label pull-right bg-red"> Caducada</small>
                          //         </span>';
                          // }
                      ?>
                      </h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                      <form role="form"  method="post" id="idFormEditarOferta" name="FormEditarCupon" action="../controler/ctrOferta.php">
                          <div class="box-body">
                              <div class="form-group">
                              <label for="exampleInputCupon">Descuento %</label>
                                <input type="number" class="form-control" id="idInputNombreCupon"  required="" name="inputDescuento" value="<?php echo $respuesta[0]['descuento']  ?>">
                              </div>
                          </div>
                          <div class="box-body">
                              <div class="form-group">
                              <label for="exampleLimite">Limite de productos</label>
                                <input type="number" class="form-control" id="idInputLimite"  required="" name="inputLimite" value="<?php echo $respuesta[0]['limite_productos']  ?>">
                              </div>
                          </div>
                          <div class="box-body">
                              <div class="form-group">
                              <label for="exampleLimite">Mensaje</label>
                                <input type="text" class="form-control" id="idInputLimite"  required="" name="inputSms" value="<?php echo $respuesta[0]['sms_promocion']  ?>">
                              </div>
                          </div>
                          <!-- <div class="box-body">
                              <div class="form-group">
                              <label for="exampleDescuneto">Fecha Inicio</label>
                                <input type="date" class="form-control" id="idInputDescuento"  required="" name="inputDescuento" value="<?php echo $respuesta[0]['fecha_inicio']?>">
                              </div>
                          </div>
                          <div class="box-body">
                              <div class="form-group">
                              <label for="exampleInputFecha1">Fecha Limite</label>
                                <input type="date" class="form-control" id="idInputFechaLimite"  required="" name="inputFechaLimite" value="<?php echo $respuesta[0]['fecha_fin']  ?>" min="<?php echo $fecha_actual ?>">
                              </div>
                          </div> -->
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <input type="hidden" name="Oferta" value="editar">
                            <input type="hidden" name="idOferta" value="<?php echo $respuesta[0]['id']  ?>">
                            <button type="submit" class="btn bg-olive margin">Guardar</button>
                          </div>
                      </form>
                  </div>
          </div>
        </div> 
        <!-- /.row -->
      </section>
      <!-- /.content -->
 </div> 
  <!-- /.content-wrapper -->

<?php 

$plantilla->ctr_footer();
$plantilla->toTop();
?>