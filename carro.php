<div class="row">

<a class="cart-icon">
    <span id="totalItems">0</span>
    <ul class="cart"></ul>
</a>


<div class="productosWrapper large-12 columns">
    
</div>

</div>

<style>
    .store-wrapper, body {
  background: #f2f2f2;
}
#site-branding {
  margin-bottom: 1em;
}
.site-branding {
  padding-top: 20px;
}
.site-branding .site-texting {
  color: #FF875F;
  font-weight: 700;
  font-size: 40px;
  margin-top: 0.7em;
}
@media only screen and (min-width: 320px) and (max-width: 640px) {
  .site-branding .site-texting {
    font-size: 100% !important;
    margin: 0 !important;
  }
}
.gallery, .store-wrapper {
  margin-top: 1em;
}
.store-wrapper {
  -webkit-box-shadow: none;
  box-shadow: none;
  border: 1px solid #E5E5E5 !important;
  padding: 20px 30px;
  margin-bottom: 1em;
}
.store-wrapper .coin-wrapper {
  padding: 20px;
  border: 1px solid #e5e5e5;
  background-color: #fff;
  text-align: left;
}
.store-wrapper .coin-wrapper h3 {
  color: #000;
  font-weight: 700;
  font-size: 16px;
}
.store-wrapper .coin-wrapper p {
  color: #878787;
}
.btn {
  box-shadow: none !important;
}
@media only screen and (min-width: 320px) and (max-width: 768px) {
  .btn {
    width: 100% !important;
  }
}
.btn.buy, .btn.close, .btn.submit {
  border: 0;
  font-size: 14px;
  padding: 10px;
  text-shadow: 0 1px 0 #032638;
  width: 100%;
  text-align: center;
  color: #fff;
  display: block;
  text-transform: uppercase;
}
.btn.close {
  background: red;
}
.btn.submit {
  background: #25A187;
}
.btn.buy, .btn.buy:hover {
  background-repeat: repeat-x;
}
.btn.buy {
  background-image: -webkit-linear-gradient(top, #fda33a 0, #e67522 100%);
  background-image: linear-gradient(to bottom, #fda33a 0, #e67522 100%);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fffda33a', endColorstr='#ffe67522', GradientType=0);
}
.btn.buy.single {
  font-size: 25px;
  margin-top: 0.5em;
}
.btn.buy:hover {
  background-image: -webkit-linear-gradient(top, #e67522 0, #fda33a 100%);
  background-image: linear-gradient(to bottom, #e67522 0, #fda33a 100%);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e67522', endColorstr='#fda33a', GradientType=0);
}
#masthead {
  border-bottom: 3px solid #25A187;
  background: #F3F3F3;
  height: 40px;
}
#masthead .menu {
  list-style: none;
  margin: 0;
}
#masthead .menu li {
  text-align: center;
  height: 40px;
  float: left;
  padding-right: 1em;
  line-height: 20px;
}
#masthead .menu li.current_page_item a {
  background: #25A187;
  color: #fff;
}
#masthead .menu li a {
  display: block;
  color: #25A187;
  text-transform: uppercase;
  text-decoration: none;
  font-weight: 700;
  height: 40px;
  padding: 10px;
}
#masthead .menu li a:hover {
  background: #25A187;
  color: #fff;
}
.af-form #form-sing h3, .entry-title {
  color: #25A187;
  text-transform: uppercase;
  font-weight: 700;
}
.entry-title {
  text-align: left;
  margin: 0;
}
.entry-content {
  padding: 20px;
  border-bottom: 3px solid #25A187 !important;
}
.entry-content .featured-image {
  text-align: center;
  width: 80%;
  margin: 0 auto;
  padding: 20px;
}
.af-form {
  background: #e1e1e1;
  padding: 5px 5px 0;
}
.af-form #form-sing p {
  margin: 0;
}
.af-form #form-sing small {
  color: #e67522;
  font-weight: 700;
}
.image-wrapper {
  background-size: cover !important;
  background-repeat: no-repeat;
  height: 80px;
  overflow: hidden;
  border: 1px solid #c1c1c1;
  cursor: pointer;
}
.image-wrapper img {
  visibility: hidden;
  display: none;
}
.mintage-content p {
  margin: 0;
  color: #FF875F;
}
.notes p {
  color: #FF875F;
}
.overlay {
  position: fixed;
  width: 100%;
  top: 0;
  height: 100%;
  background: rgba(0, 0, 0, 0.8);
  display: none;
  z-index: 9999;
}
.overlay .overlay-content {
  top: 50%;
  left: 50%;
  position: absolute;
  width: 50%;
  background: rgba(0, 0, 0, 0.8);
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  padding: 25px;
}
@media only screen and (min-width: 320px) and (max-width: 640px) {
  #masthead .menu li a {
    font-size: 11px;
  }
  .overlay .overlay-content {
    width: 90% !important;
  }
}
.overlay .overlay-content h1 {
  color: #fff;
  font-size: 25px;
  text-align: center;
}
.overlay .overlay-content label {
  color: #fff;
  text-align: left;
}
.overlay .overlay-content textarea {
  height: 80px;
}
.single-product {
  text-align: center;
}
.single-product img {
  width: 40%;
}
.single-product span, .single-product p {
  display: block;
  color: #fff;
}
body span, body p, body h3, body small, body h4, body h5, body h1, body a, body button {
  font-family: 'Montserrat';
}
.productosWrapper {
  margin-top: 5em;
}
.cart {
  position: absolute;
  width: auto;
  left: -500%;
  list-style: none;
  background: #fff;
  border-radius: 4px;
  top: -1.5em;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
}
.cart li {
  padding: 10px;
  height: 72px;
}
.cart li button {
  background: transparent;
  margin: 0;
  width: 0;
  height: 0;
  color: #25A187;
  line-height: 0;
  padding: 0px 8px 0px 8px !important;
}
.cart img {
  width: 50px;
  border: 2px solid #25A187;
  float: left;
}
.cart .title {
  color: #25A187;
  padding-left: 15px;
  float: left;
  font-size: 14px;
}
.cart .price {
  display: block;
  float: left;
}
.cart #total {
  height: auto !important;
  background: #25A187;
  color: #fff;
  font-size: 13px;
}
.cart .pay {
  color: #fff !important;
  font-size: 13px !important;
  text-align: right;
  width: auto;
}
.cart:after, .cart:before {
  left: 100%;
  top: 50%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
}
.cart:after {
  border-color: rgba(255, 255, 255, 0);
  border-left-color: #fff;
  border-width: 15px;
  margin-top: -27px;
}
.cart:before {
  border-color: rgba(0, 0, 0, 0);
  border-left-color: #fff;
  border-width: 15px;
  margin-top: -27px;
}
.cart #submitForm {
  float: right;
}
.cart-icon {
  position: fixed;
  top: 30px;
  right: 30px;
  z-index: 2;
  top: 44px;
  right: 10px;
  height: 50px;
  width: 50px;
  background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiIHdpZHRoPSIzMnB4IiBoZWlnaHQ9IjMycHgiIHZpZXdCb3g9IjAgMCAzMiAzMiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMzIgMzIiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPjxwYXRoIGZpbGw9IiMzMTRENUQiIGQ9Ik00LDIxYzAsMC42LDAuNCwxLDEsMWgyNWMwLjYsMCwxLTAuNCwxLTFzLTAuNC0xLTEtMUg2di0yaDE5YzAuNSwwLDAuOS0wLjMsMS0wLjhsMy0xMmMwLjEtMC4zLDAtMC42LTAuMi0wLjlTMjguMyw0LDI4LDRINlYxYzAtMC42LTAuNC0xLTEtMUgxQzAuNCwwLDAsMC40LDAsMXMwLjQsMSwxLDFoM1YyMXoiLz48Y2lyY2xlIGZpbGw9IiMzMTRENUQiIGN4PSI3IiBjeT0iMjgiIHI9IjMiLz48Y2lyY2xlIGZpbGw9IiMzMTRENUQiIGN4PSIyOCIgY3k9IjI4IiByPSIzIi8+PC9nPjwvc3ZnPg==)  no-repeat center center;
}
.cart-icon #totalItems {
  position: absolute;
  top: 2px;
  right: 5px;
  height: 18px;
  width: 18px;
  line-height: 18px;
  background-color: #46b29d;
  color: #ffffff;
  font-size: 1rem;
  font-weight: bold;
  text-align: center;
  border-radius: 50%;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
  -webkit-transition: -webkit-transform 0.2s 0s;
  -moz-transition: -moz-transform 0.2s 0s;
  transition: transform 0.2s 0s;
}
.coin-wrapper {
  width: 29%;
  margin: 0 4% 4% 0;
  background-color: #ffffff;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
  border-radius: 4px;
  float: left;
}
@media only screen and (min-width: 320px) and (max-width: 480px) {
  .coin-wrapper {
    width: 100%;
  }
}
@media only screen and (min-width: 640px) and (max-width: 768px) {
  .coin-wrapper {
    width: 33.333%;
  }
}
.coin-wrapper .product-details {
  margin-bottom: 10%;
}
.coin-wrapper .product-details h3 {
  text-align: left;
  font-size: 18px;
}
.coin-wrapper .product-details .stock, .coin-wrapper .product-details .price {
  color: #25A187;
  font-weight: bold;
}
.coin-wrapper img {
  display: block;
  vertical-align: middle;
  width: 50%;
  margin: 10% auto;
  text-align: center;
}

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js?ver=1.11.2"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.10.1/lodash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/0.9.8/spin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/0.9.8/ladda.min.js"></script>

<script>
    var app = window.app || {},
business_paypal = ''; // aquí va tu correo electrónico de paypal

(function($){
	'use strict';

	//no coflict con underscores

	app.init = function(){
		//totalItems totalAmount
		var total = 0,
		items = 0
		
		var cart = (JSON.parse(localStorage.getItem('cart')) != null) ? JSON.parse(localStorage.getItem('cart')) : {items : []} ;
		
		if(undefined != cart.items && cart.items != null && cart.items != '' && cart.items.length > 0){
			_.forEach(cart.items, function(n, key) {
			   items = (items + n.cant)
			   total = total  + (n.cant * n.price)
			});

		}

		$('#totalItems').text(items)
		$('.totalAmount').text('$ '+total+ ' USD')
		
	}

	app.createProducts = function(){
		var productos = [
			{
				id : 1,
				img : 'http://libertadproof.com/wp-content/uploads/2016/02/87952_Obv.jpg',
				name : 'Libertad 5oz',
				price : 299.00,
				desc : 'Libertad 5oz BU 1998 Contains 1 Libertad 5oz BU brilliant uncirculated .999 fine Silver. In capsule The same coin as you see in this picture. We only Ship to the US, and is FREE Shipping Shipping time 5-7 business days via UPS express with tracking and insurance. Payments only via Paypal.',
				stock : 4
			},
			{
				id : 2,
				name : 'Libertad 5oz',
				img : 'http://libertadproof.com/wp-content/uploads/2016/02/87952_Obv.jpg',
				price : 199.00,
				desc : 'Libertad 5oz BU 1998 Contains 1 Libertad 5oz BU brilliant uncirculated .999 fine Silver. In capsule The same coin as you see in this picture. We only Ship to the US, and is FREE Shipping Shipping time 5-7 business days via UPS express with tracking and insurance. Payments only via Paypal.',
				stock : 2
			},
			{
				id : 3,
				name : 'Libertad 5oz',
				img : 'http://libertadproof.com/wp-content/uploads/2016/02/87952_Obv.jpg',
				price : 99.00,
				desc : 'Libertad 5oz BU 1998 Contains 1 Libertad 5oz BU brilliant uncirculated .999 fine Silver. In capsule The same coin as you see in this picture. We only Ship to the US, and is FREE Shipping Shipping time 5-7 business days via UPS express with tracking and insurance. Payments only via Paypal.',
				stock : 1
			},
			{
				id : 4,
				name : 'Libertad 5oz',
				img : 'http://libertadproof.com/wp-content/uploads/2016/02/87952_Obv.jpg',
				price : 80.00,
				desc : 'Libertad 5oz BU 1998 Contains 1 Libertad 5oz BU brilliant uncirculated .999 fine Silver. In capsule The same coin as you see in this picture. We only Ship to the US, and is FREE Shipping Shipping time 5-7 business days via UPS express with tracking and insurance. Payments only via Paypal.',
				stock : 0
			}
		],
		wrapper = $('.productosWrapper'),
		contenido = ''

		for(var i = 0; i < productos.length; i++){

			if(productos[i].stock > 0){

				contenido+= '<div class="coin-wrapper">'
				contenido+= '		<img src="'+productos[i].img+'" alt="'+productos[i].name+'">'
				contenido+= '		<span class="large-12 columns product-details">'
				contenido+= '			<h3>'+productos[i].name+' <span class="price">$ '+productos[i].price+' USD</span></h3>'
				contenido+= '			<h3>Tenemos: <span class="stock">'+productos[i].stock+'</span></h3>'
				contenido+= '		</span>'
				contenido+= '		<a class="large-12 columns btn submit ladda-button prod-'+productos[i].id+'" data-style="slide-right" onclick="app.addtoCart('+productos[i].id+');">Añadir a la canasta</a>'
				contenido+= '		<div class="clearfix"></div>'
				contenido+= '</div>'

			}

		}

		wrapper.html(contenido)

		localStorage.setItem('productos',JSON.stringify(productos))
	}

	app.addtoCart = function(id){
		var l = Ladda.create( document.querySelector( '.prod-'+id ) );

		l.start();
		var productos = JSON.parse(localStorage.getItem('productos')),
		producto = _.find(productos,{ 'id' : id }),
		cant = 1
		if(cant <= producto.stock){
			if(undefined != producto){
				if(cant > 0){
					setTimeout(function(){
						var cart = (JSON.parse(localStorage.getItem('cart')) != null) ? JSON.parse(localStorage.getItem('cart')) : {items : []} ;
						app.searchProd(cart,producto.id,parseInt(cant),producto.name,producto.price,producto.img,producto.stock)
						l.stop();
					},2000)
				}else{
					alert('Solo se permiten cantidades mayores a cero')
				}
			}else{
				alert('Oops! algo malo ocurrió, inténtalo de nuevo más tarde')
			}
		}else{
			alert('No se pueden añadir más de este producto')
		}
	}

	app.searchProd = function(cart,id,cant,name,price,img,available){
		//si le pasamos un valor negativo a la cantidad, se descuenta del carrito
		var curProd = _.find(cart.items, { 'id': id })

		if(undefined != curProd && curProd != null){
			//ya existe el producto, aÃ±adimos uno mÃ¡s a su cantidad
			if(curProd.cant < available){
				curProd.cant = parseInt(curProd.cant + cant)
			}else{
				alert('No se pueden añadir más de este producto')
			}
			
		}else{
			//sino existe lo agregamos al carrito
			var prod = {
				id : id,
				cant : cant,
				name : name,
				price : price,
				img : img,
				available : available
			}
			cart.items.push(prod)
			
		}
		localStorage.setItem('cart',JSON.stringify(cart))
		app.init()
		app.getProducts()
		app.updatePayForm()
	}

	app.getProducts = function(){
		var cart = (JSON.parse(localStorage.getItem('cart')) != null) ? JSON.parse(localStorage.getItem('cart')) : {items : []},
		msg = '',
		wrapper = $('.cart'),
		total = 0
		wrapper.html('')

		if(undefined == cart || null == cart || cart == '' || cart.items.length == 0){
			wrapper.html('<li>Tu canasta está vacía</li>');
			$('.cart').css('left','-400%')
		}else{
			var items = '';
			_.forEach(cart.items, function(n, key) {
	
			   total = total  + (n.cant * n.price)
			   items += '<li>'
			   items += '<img src="'+n.img+'" />'
			   items += '<h3 class="title">'+n.name+'<br><span class="price">'+n.cant+' x $ '+n.price+' USD</span> <button class="add" onclick="app.updateItem('+n.id+','+n.available+')"><i class="icon ion-minus-circled"></i></button> <button onclick="app.deleteProd('+n.id+')" ><i class="icon ion-close-circled"></i></button><div class="clearfix"></div></h3>'
			   items += '</li>'
			});

			//agregar el total al carrito
			items += '<li id="total">Total : $ '+total+' USD <div id="submitForm"></div></li>'
			wrapper.html(items)
			$('.cart').css('left','-500%')
		}
	}

	app.updateItem = function(id,available){
		//resta uno a la cantidad del carrito de compras
		var cart = (JSON.parse(localStorage.getItem('cart')) != null) ? JSON.parse(localStorage.getItem('cart')) : {items : []} ,
		curProd = _.find(cart.items, { 'id': id })
			//actualizar el carrito
			curProd.cant = curProd.cant - 1;
			//validar que la cantidad no sea menor a 0
			if(curProd.cant > 0){
				localStorage.setItem('cart',JSON.stringify(cart))
				app.init()
				app.getProducts()
				app.updatePayForm()
			}else{
				app.deleteProd(id,true)
			}
	}

	app.delete = function(id){
		var cart = (JSON.parse(localStorage.getItem('cart')) != null) ? JSON.parse(localStorage.getItem('cart')) : {items : []} ;
		var curProd = _.find(cart.items, { 'id': id })
		_.remove(cart.items, curProd);
		localStorage.setItem('cart',JSON.stringify(cart))
		app.init()
		app.getProducts()
		app.updatePayForm()
	}

	app.deleteProd = function(id,remove){
		if(undefined != id && id > 0){
			
			if(remove == true){
				app.delete(id)
			}else{
				var conf = confirm('¿Deseas eliminar este producto?')
				if(conf){
					app.delete(id)
				}
			}
			
		}
	}

	app.updatePayForm = function(){
		//eso va a generar un formulario dinamico para paypal
		//con los productos y sus precios
		var cart = (JSON.parse(localStorage.getItem('cart')) != null) ? JSON.parse(localStorage.getItem('cart')) : {items : []} ;
		var statics = '<form action="https://www.paypal.com/cgi-bin/webscr" method="post"><input type="hidden" name="cmd" value="_cart"><input type="hidden" name="upload" value="1"><input type="hidden" name="currency_code" value="USD" /><input type="hidden" name="business" value="'+business_paypal+'">',
		dinamic = '',
		wrapper = $('#submitForm')

		wrapper.html('')
		
		if(undefined != cart && null != cart && cart != ''){
			var i = 1;
			_.forEach(cart.items, function(prod, key) {
					dinamic += '<input type="hidden" name="item_name_'+i+'" value="'+prod.name+'">'
					dinamic += '<input type="hidden" name="amount_'+i+'" value="'+prod.price+'">'
					dinamic += '<input type="hidden" name="item_number_'+i+'" value="'+prod.id+'" />'
					dinamic += '<input type="hidden" name="quantity_'+i+'" value="'+prod.cant+'" />'
				i++;
			})

			statics += dinamic + '<button type="submit" class="pay">Pagar &nbsp;<i class="ion-chevron-right"></i></button></form>'

			wrapper.html(statics)
		}
	}

	$(document).ready(function(){
		app.init()
		app.getProducts()
		app.updatePayForm()
		app.createProducts()
	})

})(jQuery)
</script>
