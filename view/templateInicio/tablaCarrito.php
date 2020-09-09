<form method="post" action="../Pay_Pal/paypal_controlador.php" id="id_carrito_pagar">
     <!-- cart main wrapper start -->
        <div class="cart-main-wrapper ">
                    <div class="container product-item fix mb-30 demo_producto">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Cart Table Area -->
                                <h1>Carrito de compras</h1>
                                <div class="cart-table table-responsive">
                                    <table class="table table-bordered table-dark table-hover">
                                        <thead>
                                        <tr>
                                            <th class="">#</th>
                                            <th class="pro-title">Product</th>
                                            <th class="pro-price">Price $ </th>
                                            <th class="pro-price">Descuento</th>
                                            <th class="pro-remove">Remove</th>
                                        </tr>
                                        </thead>
                                        <tbody class="tablita">
                                            <!-- //aqui van los productos desde el carrito_compras.js -->

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>




                        <div class="opciones_pago">
                                <h2 style="text-aligen:center">Seleccione Metodo de Pago</h2>
                            <div class="row ">


                                    <div class="col-lg-4 form-group ">
                                        <h2 class="sqr-btn d-block">Tarjeta</h2>
                                            <label>
                                            <input type="radio" name="r1" class="minimal" checked value="paypal">
                                                <img src="assets/img/payment.png" alt="payment">

                                            </label>
                                    </div>

                                    <div class="col-lg-4 pull-right ">
                                        <h2 class="sqr-btn d-block">Monedero</h2>
                                            <label style="color: red">

                                            <input type="radio" name="r1" class="minimal" value="saldo">
                                                Pagar con mi monedero
                                            <a class="btn btn-success btn-flat " data-toggle="modal"  href="" data-target="#quick_view_info" ><i class="fa fa-info-circle" aria-hidden="true"></i> Informacion</a>
                                            </label>
                                    </div>

                                    <div class="col-lg-4 pull-right ">
                                        <h2 class="sqr-btn d-block">Membresia</h2>
                                            <label style="color: red">

                                            <input type="radio" name="r1" class="minimal" value="membresia">
                                                Pagar con mi membresia
                                            <a class="btn btn-info btn-flat " data-toggle="modal"  href="" data-target="#quick_view_info" ><i class="fa fa-info-circle" aria-hidden="true"></i> Informacion</a>
                                            </label>
                                    </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-5 ml-auto" style="padding-bottom:100px;">
                                <!-- Cart Calculation Area -->
                                <div class="cart-calculator-wrapper">
                                    <div class="cart-calculate-items">
                                        <h3>Cart Totals</h3>
                                        <div class="table-responsive">
                                            <table class="table">

                                                <tr class="total">
                                                    <td>Total $ </td>

                                                </h4>
                                                <td class="total-amount"><strong> <span class="total_span"></span></strong></td>

                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <input type="submit" name="btn_pagar" value="Pagar" class="btn btn-success col-md-12">
                                    <input type="hidden" id="descuentoId" name="descuento" value="50">
                                    <input type="hidden" id="limiteId" name="limite" value="5">
                                    <!-- <a href="checkout.html" class="sqr-btn d-block">Proceed To Checkout</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- cart main wrapper end -->
</form>
