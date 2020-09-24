<?php 

ini_set('display_errors', 'On');

switch (@$_POST['FiltroPagoProveedor']) {

    case 'FiltrarFechas':
        require'../model/conexion.php';
        require'../model/mdlClienteProducto.php';
        $filtroFechaProductos=ModeloClienteProducto::sqlListarProductosVendidosProveedorFiltroFecha($_POST['idProveedor'],$_POST['fechaInicio'],$_POST['fechaFin']);
        return die(json_encode($filtroFechaProductos));
        break;
    case 'CambiarEstadoPagado':
       
        require'../model/conexion.php';
        require'../model/mdlClienteProducto.php';
    
         for ($i=0; $i < count(($_POST['idProductos'])); $i++) { 
           
             ModeloClienteProducto::editarClienteProductoEstadoPagoProveedor($_POST['idProductos'][$i],1);
         }

        return die(json_encode(($_POST)));
        break;


        case 'CambiarEstadoNoPagado':
            
            require'../model/conexion.php';
            require'../model/mdlClienteProducto.php';
 
             for ($i=0; $i < count(($_POST['idProductos'])); $i++) { 
               
                 ModeloClienteProducto::editarClienteProductoEstadoPagoProveedor($_POST['idProductos'][$i],0);
             }
    
            return die(json_encode(($_POST)));
            break;
    
    
    
    default:
        # code...
        break;
}

// ================== GENERAR REPORTE MEDIANTE USO DE MTODO GET ==================

switch (@$_GET['FiltroPagoProveedor']) {
    case 'GenerarPdf':
        require'../model/conexion.php';
        require'../model/mdlClienteProducto.php';
        require_once'../generarReportePdf/vendor/autoload.php';
        require_once'../generarReportePdf/plantillaReporte/plantilla.php';
        $css=file_get_contents('../generarReportePdf/plantillaReporte/style.css');
      
        $filtroFechaProductos=ModeloClienteProducto::sqlListarProductosVendidosProveedorFiltroFecha($_GET['idProveedor'],$_GET['fechaInicio'],$_GET['FechaFin']);
    
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML(ClassPlantilla::funcionPlantilla($filtroFechaProductos,$_GET['nombreProveedor'],$_GET['comision']),\Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->Output();


        break;
}



//  ?>

