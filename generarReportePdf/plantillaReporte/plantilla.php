<?php
class ClassPlantilla{
  
  public static function funcionPlantilla($filtroFechaProductos,$nombreDj,$comision){

    $nombreDueño="Ing. Jhonny Morocho";
    date_default_timezone_set('America/Guayaquil');
    $fecha_actual=date("Y-m-d");
    $empresa="WWW.PROEDITSCLUB.COM";
     //print_r($filtroFechaProductos[0]['url_directorio']);
    // echo $nombreDj;
    // echo "--------------------------------------";
    // die(json_encode($filtroFechaProductos));

    $htmlPlantilla1='<body id="content">
      <header class="clearfix">
        <div id="logo">
          <img src="../generarReportePdf/plantillaReporte/logo-png-pagina.png" width="50%">
        </div>
        <h1>'.$empresa.'</h1>
        <div id="company" class="clearfix">
          <div>'.$empresa.'</div>
          <div>Av. Eduardo Kigman <br /> Loja - Ecuador</div>
          <div><a href="jhonnymichaeldj2011@hotmail.com">jhonnymichaeldj2011@hotmail.com</a></div>
        </div>
        <div id="project">
          <div><span>Propietaio: </span>'.$nombreDueño.'</div>
          <div><span>Dj: </span>'.$nombreDj.'</div>
          <div><span>Fecha: </span>'.$fecha_actual.'</div>
        </div>
      </header>
      <main>
        <table>
          <thead>
            <tr>
              <th>#ID</th>
              <th class="service">PRODUCTO</th>
              <th class="desc">DATE</th>
              <th>PRICE</th>
              <th>METHOD PAYMET</th>
            </tr>
          </thead>
          <tbody>';
          

        $tabla="";
        $subTotal=0;
          for ($i=0; $i < count($filtroFechaProductos); $i++) { 
             $tabla.= '<tr>
                        <td class="service">'.(count($filtroFechaProductos)-$i).'</td>
                        <td class="desc">'.$filtroFechaProductos[$i]['url_directorio'].'</td>
                         <td class="unit">'.$filtroFechaProductos[$i]['fecha_compra'].'</td>
                        <td class="qty">'.$filtroFechaProductos[$i]['precio_compra'].'</td>
                        <td class="total">'.$filtroFechaProductos[$i]['metodo_compra'].'</td>
                     </tr>';
                     $subTotal+=$filtroFechaProductos[$i]['precio_compra'];
              
           }
  


$htmlSubTotal='<tr>
              <td colspan="4">SUBTOTAL</td>
              <td class="total">$'.$subTotal.'</td>
            </tr>';



$htmlPlantillaComision='<tr>
              <td colspan="4">Comision '.$comision.'%</td>
              <td class="total">$'.round((($comision/100)*$subTotal-$subTotal),2).'</td>
            </tr>
            <tr>
              <td colspan="4" class="grand total">GRAND TOTAL</td>
              <td class="grand total">$'.round((($comision/100)*$subTotal),2).'</td>
            </tr>';



 $htmlPlantilla2='</tbody>
        </table>
  
      </main>
      <footer>
      © 2020 Copyright: Proeditsclub.com.
      </footer>
    </body>';
  
    return $htmlPlantilla1.$tabla.$htmlSubTotal.$htmlPlantillaComision.$htmlPlantilla2;
  
  }
  
}
?>
