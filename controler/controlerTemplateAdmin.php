<?php 
ini_set('display_errors', 'On');


 class controlerPlantillaAdmin{

    public  function ctr_header(){
        require"../../view/admin/templateAdmin/header.php";
        require"../../animacionEspera/animacionEsperaAdmin.php";
       
    }
    public  function ctr_footer(){
        require"../../view/admin/templateAdmin/footer.php";
      
    }

    public  function ctr_navegador_Izquierda(){
            
        require"../../view/admin/templateAdmin/navegadorIzquierda.php";
        
    }

    public  function ctr_tabla_genero(){
            
        require"../../view/admin/tablas/tablaGenero.php";
        
    }

    public function ctr_tabla_proveedor(){
        require"../../view/admin/tablas/tablaProveedor.php";
    }

    public function ctr_tabla_productos(){
        require"../../view/admin/tablas/tablaProductos.php";
    }

    public function ctr_tabla_clientes(){
        require"../../view/admin/tablas/tablaClientes.php";
    }

    public function ctr_tabla_mis_productos(){
        require"../../view/admin/tablas/tablaMisProductos.php";
    }

    public function ctr_tabla_productos_cliente(){
        require"../../view/admin/tablas/tablaComprasProductoClientes.php";
    }

    public function ctr_tabla_ventas(){
        require"../../view/admin/tablas/tablaVentas.php";
    }
    
    public function ctr_tabla_mis_ventas(){
        require"../../view/admin/tablas/tablaMisProductosVendidos.php";
    }

    public function ctrTablaMisVentasPagadas(){
       require'../../view/admin/tablas/tablaProductosPagadosProveedor.php';
    }
    public function ctrTablaMisVentasNoPagadas(){
        require'../../view/admin/tablas/tablaProductosNoPagadosProveedor.php';
     }

     public function ctr_tabla_ventas_proveedor(){
         require"../../view/admin/tablas/tablaVentasCadaProveedor.php";
     }

    public function ctrTablaProveedoresInformePagos(){
        require'../../view/admin/tablas/tablaProveedoresInformePagos.php';
    }

    public function ctr_tabla_reporteVentas(){
        require"../../view/admin/tablas/tablaPagoPendienteProveedor.php";
    }

    // ==================Funciones para session==================
    // ==================Funciones para session==================
    public function usuario_autentificado(){
           

            @session_start();
             function revisar_usuario_session(){

                 if($_SESSION['tipo_usuario']=='Admin' or $_SESSION['tipo_usuario']=='Proveedor'){

                     return isset($_SESSION['usuario']);
                 }else{
                     return 0;
                 }
             }

             if(!revisar_usuario_session()){
                 header('location:../../');
                 exit();
             }


    }

    
    public function cerrar_session($cerrar_session){
        $cerrar_session=@$_GET['cerrar_session'];
        if($cerrar_session){// si se emvio la session entonces destruir
          session_destroy();
          header('location:../../');
        }
    }

    public function tablaMembresias(){
        require"../../view/admin/tablas/tablaMembresia.php";
    }


}

?>