//enviamos los datos al controlador de pagos para coprobar si existe una session 
// $.ajax({
// 	method: "POST",
// 	url: "../../Controlador/class_ctr_Oferta.php",
// 	dataType: "json",

// });7
//==== submit en pagar , traemos los datos de la tabla productos
var arrayNombreProducto=[];
var arrayPrecioProducto=[];
var arrayIdProducto=[];
var datos=new FormData();
var data_type="json";
var urlPasarelaPago="../../Paypal/ctrPasarelaPago.php";
var urlPasarelaPagoMonedero="../../Paypal/ctrPasarelaPagoMonedero.php";
var urlPasarelaPagoCarMembresia="../../Paypal/ctrPasarelaPagoMembresiaCar.php";

$("#idFormCarrito").on('submit',function(e){
    
    e.preventDefault();
    //debo borrar el formulario del cupon para que me deje ejecutar el pago
  
    
    var inputOptionPago=$(this).serializeArray();//obtengo valores de radios
    //console.log(inputOptionPago);
    //selecionodo todos los datos de la tabla
    var classNombreProducto=$(".classNomProducto");
    var classPrecioUnitarioProducto=$(".classPrecioCancion span");
    var classIdProducto=$(".btnCarrito");
    var classTotalCancelar=$(".total-amount span").text();//total q sale en la pagina de carrito color verde


    // filtrando datos de los nodos para guardos los valores en cada array
    for(var i=0;i< classNombreProducto.length;i++){
        arrayNombreProducto[i]=$(classNombreProducto[i]).text();
        arrayPrecioProducto[i]=$(classPrecioUnitarioProducto[i]).text();
        arrayIdProducto[i]=$(classIdProducto[i]).attr("data-id-Producto");
    }

    // creamos y  guardamos en un array data , todos los datos de los 3 array
    datos.append("idProducto",arrayIdProducto);//adicionamo cada valor por q es un objeto
    datos.append("nombreProducto",arrayNombreProducto);
    datos.append("precioUnitarioProducto",arrayPrecioProducto);
    datos.append("optionPago",inputOptionPago);
    datos.append("nameRadio",inputOptionPago[0].name);
    datos.append("valueRadio",inputOptionPago[0].value);
    datos.append("totalCancelar",classTotalCancelar);
   
  
  
        // for (var pair of datos.entries()) {
        //     console.log(pair[0]+ ', ' + pair[1]); 
        // }

       switch (inputOptionPago[0].value) {

        //aqui compran todo con paypal, productps y tambin el paquete de membresias
           case 'paypal':
               enviarDatosPasarelaPago(datos);//enviaar Data a la pasarela de pagos
           break;

           case 'productoCompradoMembresia':
            enviarDatosPasarelaPagoCarMembresia(datos);//enviaar Data a la pasarela de pagos
               break;
            case 'monedero':
            enviarDatosPasarelaPagoMonedero(datos);//enviaar Data a la pasarela de pagos
                break;

           default:
               break;
       }

});

// ==================== ENVIAR DATOS A PASARELA DE PAGO COMPRA CON MEMBRESIAS PRODUCTOS CAR ===========
// ==================== ENVIAR DATOS A PASARELA DE PAGO COMPRA CON MEMBRESIAS PRODUCTOS CAR ===========
// ==================== ENVIAR DATOS A PASARELA DE PAGO COMPRA CON MEMBRESIAS PRODUCTOS CAR ===========
function enviarDatosPasarelaPago(datos){
    console.log(datos);
    animacion();
    $.ajax({

        url:urlPasarelaPago,
        method:'post',
        data:datos,
        cache:false,
        contentType:false,
        processData:false,
        dataType:'text',//json//data_type
        success:function(data){
            console.log(data);

            switch (data.respuesta) {
                case 'noExiseLogin':
                    //no exites session
                    toastr.warning('Debe iniciar session en la pagina');
                    break;
                    
                    case 'exito':
                        
                        toastr.success('Solicitud Procesada con éxito');
                    setTimeout(function(){
                        window.location.href=data.urlPaypal;
                    },2000);//tiempo de espera
                    break;
                    default:
                        toastr.error('No se puede realizar su petición');
                    break;
            }
        }
    });
}

// ==================== ENVIAR DATOS A PASARELA DE PAGO PARA PAYPAL COMPRA MEMBRESIA Y PRODUCTOS POR UNIDAD ===========
// ==================== ENVIAR DATOS A PASARELA DE PAGO PARA PAYPAL COMPRA MEMBRESIA Y PRODUCTOS POR UNIDAD ===========
// ==================== ENVIAR DATOS A PASARELA DE PAGO PARA PAYPAL COMPRA MEMBRESIA Y PRODUCTOS POR UNIDAD ===========
function enviarDatosPasarelaPagoCarMembresia(datos){
    console.log(datos);
    animacion();
    $.ajax({

        url:urlPasarelaPagoCarMembresia,
        method:'post',
        data:datos,
        cache:false,
        contentType:false,
        processData:false,
        dataType:'json',//json//data_type
        success:function(data){
            console.log(data);

            switch (data.respuesta) {
                case 'noExiseLogin':
                    //no exites session
                    toastr.warning('Debe iniciar session en la pagina');
                    break;
                case 'numInferiorDescargas':
                    //no exites session
                    toastr.info('El numero de productos selecionados es inferior al numero de descargas disponibles');
                    break;
                case 'fall':
                    //no exites session
                    toastr.warning('Su limite de descargas es '+data.numDescargasActual);
                    break;
                    
                case 'exito':
                    
                toastr.success('Solicitud Procesada con éxito');
                $('.btnPagar').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');
                setTimeout(function(){
                      
                    localStorage.clear();
                    window.location.href=data.urlPanel;
                },2000);//tiempo de espera
                break;

                default:
                    toastr.error('No se puede realizar su petición');
                break;
            }
        }
    });
}


// ==================== ENVIAR DATOS A PASARELA DE PAGO PARA PAYPAL COMPRA MEDIANTE MONEDERO ===========
// ==================== ENVIAR DATOS A PASARELA DE PAGO PARA PAYPAL COMPRA MEDIANTE MONEDERO ===========
// ==================== ENVIAR DATOS A PASARELA DE PAGO PARA PAYPAL COMPRA MEDIANTE MONEDERO ===========
function enviarDatosPasarelaPagoMonedero(datos){
    console.log(datos);
    animacion();
    $.ajax({

        url:urlPasarelaPagoMonedero,
        method:'post',
        data:datos,
        cache:false,
        contentType:false,
        processData:false,
        dataType:'json',//json//data_type
        success:function(data){
            console.log(data);

            switch (data.respuesta) {
                case 'noExiseLogin':
                    //no exites session
                    toastr.warning('Debe iniciar session en la pagina');
                    break;
                case 'saldoInsuficiente':
                    //no exites session
                    toastr.info('Saldo Insuficiente , su saldo actual es $ '+data.saldoModenero);
                    break;
                case 'fall':
                    //no exites session
                    toastr.warning('Su limite de descargas es '+data.numDescargasActual);
                    break;
                    
                case 'exito':
                    
                toastr.success('Solicitud Procesada con éxito');
                $('.btnPagar').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');
                setTimeout(function(){
                      
                    localStorage.clear();
                    window.location.href=data.urlPanel;
                },2000);//tiempo de espera
                break;

                default:
                    toastr.error('No se puede realizar su petición');
                break;
            }
        }
    });
}

