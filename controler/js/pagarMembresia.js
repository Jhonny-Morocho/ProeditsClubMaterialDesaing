
var url_transaccion_membresia="../Pay_Pal/paypal_controlador.php";
var urlControlerPaypal="../../Pay_Pal/membresia_controlador.php";
var data_type="json";
var membresia;

$(".pricing-action").on('click',function(e){
	e.preventDefault();
	var precio=$(this).attr("data-precio");
	var tipo=$(this).attr("data-tipo");
    var numDescargas=$(this).attr("data-numDescargas");
    var idMembresia=$(this).attr("data-numDescargas");
	//envio de esta forma con la finalidad de q se adapte a la otra configurion
    membresia = {   'idMembresia':idMembresia,
                    'nombreMembresia':tipo,
                    'numDescargas':numDescargas,
                    'precio':precio
                };

    //1. Pregunta si la membresia q hizo clik es la q el desea
    
	Swal.fire({
		title:" Your choice is "+tipo ,
		text: "confirm and pay",
		type: 'warning',
		 	showCancelButton: true,
		 	confirmButtonColor: '#3085d6',
		 	cancelButtonColor: '#d33',
		 	confirmButtonText: 'Yes'
		}).then((result) => {
			if (result.value) {
				animacion();
				comprobar_membresia();//controles
		 	}
		 })
});



function comprobar_membresia(){// controlar que no compre una nueva membresia mientras no haya terminado la actual
    //alert("xxx");

    window.location=urlControlerPaypal;
	$.ajax({
		type:'post',
        data:membresia,
        //dataType:'text',//json//data_type
		url:urlControlerPaypal,
		success:function(data){
			console.log(data);
			var resultado=JSON.parse(data)

			switch (resultado.respuesta) {
				case 'true':

				//ya cuanta con una membresia activa
							Swal.fire({
								type: 'warning',
								title: 'Oops...',
								text: 'Usted ya cuenta con una membresia activa,por lo tanto no puede adquirir una nueva membresia mientras no se caduque la actual Gracias por su comprension !',
								footer: '<br>Fecha de compra : '+resultado.fecha_inicio+"<br>Fecha caducidad :"+resultado.fecha_culminacion
							})
				  break;


				case 'false':
						
				//si puede pagar_membresia_paypal
				pagar_membresia_paypal(membresia);

				  break;
				case 'no_existe_session':
						Swal.fire({
							type: 'warning',
							title: 'Oops...',
							text: 'Debe iniciar su session en la pagina para poder adquirir la membresia',
							footer: 'Si no tienes cuenta en nuestra pagina, puedes registrarte'
						})
				  break;

			  }

			 

		}
	});
}


function pagar_membresia_paypal(membresia){
	$.ajax({
		type:'post',
		data:membresia,
		url:url_transaccion_membresia,

		success:function(data){
			console.log(data);
			var resultado=JSON.parse(data)
			if(resultado.respuesta=='exito'){
				swal('Tu solicitud ha sido  procesada')
					swal({
					  position: 'center',
					  type: 'success',
					  title: 'Tu solicitud ha sido  procesada ',
					  showConfirmButton: false,
					  timer: 3000
						})

				window.location=resultado.url_paypal;
			}

		}
	});
}


