<nav class="nav flex-column blue lighten-5 py-4 navGenero">
        <a class="nav-link" href="../../"><i class="fa fa-music" aria-hidden="true"></i> Todos los generos</a>
    <?php 
        $biblioteca=ModeloGenero::sql_lisartar_genero();
        foreach($biblioteca as $key=>$value){
            echo'<a class="nav-link" href="'.(ControladorPlantillaInicio::url_biblioteca_productos()).$value['id'].'">  <i class="fa fa-music" aria-hidden="true"></i> '.$value['genero'].'</a>';
        }
    ?>
</nav>