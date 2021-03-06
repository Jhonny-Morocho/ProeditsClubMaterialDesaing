$(document).ready(function(){



  //====================FILTRAR PAGOS =========================//
  //====================FILTRAR PAGOS =========================//
  //====================FILTRAR PAGOS =========================//
  
  $('#idFiltrarFechaPago').on('submit',function(e){
      e.preventDefault();

      // obtnemos los datos del formulario
      var datos=$(this).serializeArray();
      var etiquetaPago="";
      var suma=0;
      animacion();
      console.log(datos);//imprimr los valores
          $.ajax({
              type:$(this).attr('method'),
              data:datos,
              url:$(this).attr('action'),
              dataType:'json',//json
              success:function(data){
                  //console.log(JSON.stringify(data));//el usuario si existe
                  
                  $('.cuerpoTabla tr').remove(); // si existe la tabla ya filtrada entonces q la borre para q no se repita
                  console.log(data.length);
                  console.log(data);
                  //console.log(data[0]['estadoPagoProveedor']);
                    for (let i = 0; i < data.length; i++) {

                          if (data[i]['estado_pago_proveedor']==0) {

                            suma=suma+Number(data[i]['precio_compra']);
                            etiquetaPago='<small class="label  bg-yellow">Pendiente</small>';
                            TD='<tr >'+
                            '<td >'+(i+1)+'</td>'+
                            '<td class="idClienteProducto">'+data[i]['id']+'</td>'+
                            '<td>'+data[i]['id_factura']+'</td>'+
                            '<td class="nombrePista">'+data[i]['url_directorio']+'</td>'+
                            '<td class="metodoCompra">'+data[i]['metodo_compra']+'</td>'+
                            '<td class="precioCompra">$'+data[i]['precio_compra']+'</td>'+
                            '<td class="fechaCompra">'+data[i]['fecha_compra']+'</td>'+
                            '<td >'+etiquetaPago+'</td>'+
                           // '<td >'+data[i]['estadoPagoProveedor']+'</td>'+
                            '/<tr>';
                            $('.cuerpoTabla').append(TD);
                          }
                    }

                    $('.sumaTotal').html(suma.toFixed(2));

              }
          });    
  });
  
  $('#idFiltrarFechaPagoRegresarEstado').on('submit',function(e){
    e.preventDefault();

    // obtnemos los datos del formulario
    var datos=$(this).serializeArray();
    var etiquetaPago="";
    var suma=0;
    animacion();
    console.log(datos);//imprimr los valores
        $.ajax({
            type:$(this).attr('method'),
            data:datos,
            url:$(this).attr('action'),
            dataType:'json',//json
            success:function(data){
                //console.log(JSON.stringify(data));//el usuario si existe
                
                $('.cuerpoTabla tr').remove(); // si existe la tabla ya filtrada entonces q la borre para q no se repita
                console.log(data.length);
                console.log(data);
                //console.log(data[0]['estadoPagoProveedor']);
                  for (let i = 0; i < data.length; i++) {

                        if (data[i]['estado_pago_proveedor']==1) {

                          suma=suma+Number(data[i]['precio_compra']);
                          etiquetaPago='<small class="label  bg-green">Pagado</small>';
                          TD='<tr >'+
                          '<td >'+(i+1)+'</td>'+
                          '<td class="idClienteProducto">'+data[i]['id']+'</td>'+
                          '<td>'+data[i]['idFactura']+'</td>'+
                          '<td class="nombrePista">'+data[i]['url_directorio']+'</td>'+
                          '<td class="metodoCompra">'+data[i]['metodo_compra']+'</td>'+
                          '<td class="precioCompra">$'+data[i]['precio_compra']+'</td>'+
                          '<td class="fechaCompra">'+data[i]['fecha_compra']+'</td>'+
                          '<td >'+etiquetaPago+'</td>'+
                         // '<td >'+data[i]['estadoPagoProveedor']+'</td>'+
                          '/<tr>';
                          $('.cuerpoTabla').append(TD);
                        }
                  }

                  $('.sumaTotal').html(suma.toFixed(2));

            }
        });    
});

  $('#idFormVerTodo').on('submit',function(e){
    e.preventDefault();
    location.reload();

  });
  //====================CAMBIAR DE ESTADO A  PAGADO =========================//
  //====================CAMBIAR DE ESTADO A  PAGADO =========================//
  //====================CAMBIAR DE ESTADO A  PAGADO =========================//
  $('#idCambiarEstado').on('submit',function(e){
      e.preventDefault();
      
      // obtnemos los datos del formulario
      var datos=$(this).serializeArray();
      //animacion();
      var nodoIdClienteProducto=$('.idClienteProducto');       
      var arrayNodosConValorId=[];
      for (let index = 0; index < nodoIdClienteProducto.length; index++) {
          arrayNodosConValorId[index]=nodoIdClienteProducto[index].innerText;
      }
      console.log(arrayNodosConValorId);
      // comprobar si existen datos para enviar caso contrario monstramos mensaje
      if (arrayNodosConValorId.length>0) {
        animacion();
        Swal.fire({
            title: 'Esta seguro  ?',
            text: "Se cambiara el estado de pendiente a pagado , Antes de cambiar el estado asegurece de generar el reporte en pdf",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, deseo cambiar el estado'
          }).then((result) => {
            if (result.value) {

              $.ajax({
                type:$(this).attr('method'),
                data:{idProductos:arrayNodosConValorId, 
                      FiltroPagoProveedor:'CambiarEstadoPagado'},
                url:$(this).attr('action'),
                dataType:'json',//json
                success:function(data){
                  console.log(data);
              // confirmacion 
                 location.reload();
                }
            });    
            }
          })
      }else{
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'No existen regitros!',
          footer: '<a href>Why do I have this issue?</a>'
        })
        
      }

  });

      //====================CAMBIAR DE ESTADO A  PAGADO =========================//
  //====================CAMBIAR DE ESTADO A  PAGADO =========================//
  //====================CAMBIAR DE ESTADO A  PAGADO =========================//
  $('#idCambiarEstadoNoPagado').on('submit',function(e){
    e.preventDefault();

    // obtnemos los datos del formulario
    var datos=$(this).serializeArray();
    //animacion();
    var nodoIdClienteProducto=$('.idClienteProducto');       
    var arrayNodosConValorId=[];
    for (let index = 0; index < nodoIdClienteProducto.length; index++) {
        arrayNodosConValorId[index]=nodoIdClienteProducto[index].innerText;
    }
    console.log(arrayNodosConValorId);
    // comprobar si existen datos para enviar caso contrario monstramos mensaje
    if (arrayNodosConValorId.length>0) {
      animacion();
      Swal.fire({
          title: 'Esta seguro  ?',
          text: "Se cambiara el estado de pendiente a pagado , Antes de cambiar el estado asegurece de generar el reporte en pdf",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, deseo cambiar el estado'
        }).then((result) => {
          if (result.value) {

            $.ajax({
              type:$(this).attr('method'),
              data:{idProductos:arrayNodosConValorId, 
                    FiltroPagoProveedor:'CambiarEstadoNoPagado'},
              url:$(this).attr('action'),
              dataType:'json',//json
              success:function(data){
                console.log(data);
          
                location.reload();
              }
          });    
          }
        })
    }else{
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'No existen regitros!',
        footer: '<a href>Why do I have this issue?</a>'
      })
      
    }

});

  $('#idGenerarPdf').on('submit',function(e){
   e.preventDefault();

    // obtnemos los datos del formulario
    var datos=$(this).serializeArray();
    var subTotal=$('.sumaTotal')[0].innerText;
    console.log(datos);

    animacion();
    var nodoIdClienteProducto=$('.idClienteProducto');
    var nodoNombrePista=$('.nombrePista');
    var nodoMetodoCompra=$('.metodoCompra');
    var nodoPrecioCompra=$('.precioCompra');
    var nodofechaCompra=$('.fechaCompra');

    var arrayNodosConValorId=[];
    var arrayNodosNombrePista=[];
    var arrayNodosMetodoCompra=[];
    var arrayNodosfechaCompra=[];
    var arrayNodosPrecioCompra=[];
   
    var arrayNodosConValorId=[];
    for (let index = 0; index < nodoIdClienteProducto.length; index++) {
        arrayNodosConValorId[index]=nodoIdClienteProducto[index].innerText;
        arrayNodosNombrePista[index]=nodoNombrePista[index].innerText;
        arrayNodosMetodoCompra[index]=nodoMetodoCompra[index].innerText;
        arrayNodosfechaCompra[index]=nodofechaCompra[index].innerText;
        arrayNodosPrecioCompra[index]=nodoPrecioCompra[index].innerText;
        
    }

    //guadar todos los datos en un solo array
    var dataPagosProveedor=new FormData();
    dataPagosProveedor.append('idProductos',arrayNodosConValorId);
    dataPagosProveedor.append('nombrePista',arrayNodosNombrePista);
    dataPagosProveedor.append('fechaCompra',arrayNodosfechaCompra);
    dataPagosProveedor.append('precioCompra',arrayNodosPrecioCompra);
    dataPagosProveedor.append('FiltroPagoProveedor','GenerarPdf');
    // window.location='../domPdf/reporte.php?idProducto='+arrayNodosConValorId;
    // comprobar si existen datos para enviar caso contrario monstramos mensaje
    var fechaInicio=$('#idFechaInicio').val();
    var fechaFin=$('#idFechaFin').val();
    console.log(fechaInicio);
    console.log(fechaFin);
    

  
    Swal.fire({
      title: 'Se realizar el reporte de ventas de ' +datos[3].value+" con el "+datos[0].value + "% de comisión",
      text: "Se tomara en cuenta la fecha de "+fechaInicio +" hasta "+fechaFin,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then((result) => {
      if (result.isConfirmed) {

        window.location=$(this).attr('action')+'?idProveedor='+datos[2].value+
                                                                            '&fechaInicio='+fechaInicio+
                                                                            '&FiltroPagoProveedor='+'GenerarPdf'+
                                                                            '&nombreProveedor='+datos[3].value+
                                                                            '&comision='+datos[0].value+
                                                                            '&FechaFin='+fechaFin;
      }
    })

    // voy enviar a un liknk los datos para imprimir desde la base datos
    //window.location='../generarReportePdf/plantillaReporte/plantilla.php?idProveedor=&fechaInicio=&FechaFin';
    
});


});

