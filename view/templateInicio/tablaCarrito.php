

<!--Main Layout-->

<div class="container card mb-5">
  
        <form action="" id="idFormCarrito ">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10 ml-auto animated fadeInLeftBig">
                    <div class="cart-table ">
                        <table id="dtBasicExample" class="table  table-striped table-bordered table-sm " cellspacing="0" width="100%">
                            <thead class="black white-text">
                                <tr>
                                <th >#</th>
                                <th >Item Name</th>
                                <th >Item Price</th>
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
                <div class="opcionPago">
                    <h4>Option Payment</h4>
                    <div class="col-lg-4 form-group">
                        <label for="">
                            <input type="radio" name="r1" class="minimal" checked value="paypal">
                            <img src="../../img/payment.png" alt="">
                        </label>
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

