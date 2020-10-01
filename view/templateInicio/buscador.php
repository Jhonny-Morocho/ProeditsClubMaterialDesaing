<form class="form-inline d-flex justify-content-center md-form form-sm mt-3" method="get" action="../../">
					
    <?php if(@$_GET['busqueda']) {?>
        <input type="text" name="busqueda" class="form-control form-control-sm ml-3 w-75"  placeholder="Search" value="<?php echo $_GET['busqueda']  ?>">
    <?php }else{ ?>
        <input type="text" name="busqueda" class="form-control form-control-sm ml-3 w-75"  placeholder="Search" maxlength="100">
    <?php }?>
    <div class="row">
        <div class="col-lg-2">
        <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit">Search</button>
        </div>
    </div>
</form>

