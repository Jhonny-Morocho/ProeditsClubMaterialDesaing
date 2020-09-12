

<!--Main Layout-->

<div class="container card mb-5">
        <form action="../../Paypal/ctrPasarelaPago.php" id="idFormCarrito" method="post">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10 ml-auto animated fadeInLeftBig">
                    <div class="cart-table ">
                        <table id="dtBasicExample" class="table  table-hover table-bordered table-sm " cellspacing="0" width="100%">
                            <thead class="black white-text">
                                <tr>
                                    <th >#</th>
                                    <th >Item Name</th>
                                    <th >Item Price</th>
                                    <th >Discount</th>
                                    <th >Action</th>
                                </tr>
                            </thead>
                            <tbody class="dataProductos">
                            </tbody >
                        </table>
                    </div>  
                </div>
            </div>
      
            <div class="row d-flex justify-content-center">
                <div class="opciones_pago">
                    <!-- Group of material radios - option 1 -->
                        <div class="form-check ">
                            <input type="radio" class="form-check-input" id="materialGroupExample1" name="r1" checked value="paypal">
                            <label class="form-check-label" for="materialGroupExample1"></label>
                            <img src="../../img/payment.png" alt="">
                        </div>
    
                        <!-- Group of material radios - option 2 -->
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="materialGroupExample2" name="r1" name="membresia" >
                            <label class="form-check-label " for="materialGroupExample2">Membresia</label>
                            <button type="button" class="btn btn-danger btn-sm btn-rounded" data-toggle="modal" data-target="#modalPushMembresias"><i class="fas fa-info"></i></button>
                        </div>
    
                        <!-- Group of material radios - option 3 -->
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="materialGroupExample3" name="r1" name="monedero">
                            <label class="form-check-label" for="materialGroupExample3">Monedero</label>
                            <button type="button" class="btn btn-danger btn-sm btn-rounded" data-toggle="modal" data-target="#modalPushMonedero"><i class="fas fa-info"></i></button>

                        </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-lg-4 ml-auto">
                    <div class="cart-calculator-wrapper">
                        <div class="cart-calculate-items">
                            <h4>Cart Total</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr class="trTotalPagar">
                                            <td>Total </td>
                                            <h4>
                                                <td class="total-amount"> <strong>$ <span class="SpanTotalPagar">0</span></strong></td>
                                            </h4>
                                    </tr>
                                </table>
                            </div>
                            
                        </div>
                        <input type="submit" name="btnPagar" value="pagar" class="btn btn-success">
                    </div>
                </div>
            </div>
        </form>
</div> <!-- end container fluid -->

