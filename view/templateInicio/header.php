<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">




   
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="Plataforma de Remixes y Edits para Djs">
	<meta property="og:title" content="Proeditsclub"/>
	<meta property="og:description" content="Plataforma de Remixes y Edits para Djs" /> 
   <meta property="og:image" content="../../img/2683.jpg" />      
   <meta property="og:url" content="https://www.proeditsclub.com/" />

	<title>Proeditsclub</title>
	<!-- MDB icon -->
	<base href="appMTD/AppMaterial/">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css?v=1.0.0">
	<!-- Google Fonts Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
	<link rel="stylesheet" href="css/mdb.min.css">
	<!-- Your custom styles (optional) -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" type="image/png" href="../../img/ICONO.jpg" />
	<!-- =================== APP==================== -->
	<!-- =================== APP==================== -->
	<!-- =================== APP==================== -->
	<link rel="stylesheet" href="../css/appIndex.css">
	<link rel="stylesheet" href="../../socialNav/social.css">



	<script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.js"></script>

	

</head>

<body class="">


<header class="">
	<div class=" ">
		<div class="row ">
		  <div class="col-lg-6 ">
			  <a href="../../"><img src="../../img/logo-red-black.png" class="img-fluid animated bounce slower" alt="Responsive image" width="60%"></a>
			
		  </div>
		  <div class="col-lg-6  pt-3">
			<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v5.0"></script>
			<div class="fb-like" data-href="https://www.facebook.com/Proeditsclub-702404853464740/" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
		  </div>
		</div>
	</div>

	<div class="">
	<!-- Navbar -->
		<div class="main-header ">
			
			<nav class="navbar navbar-expand-lg navbar-dark special-color-red navMenu">
	
				<!-- Navbar brand -->
				<a class="navbar-brand  text-uppercase border-right" href="../../"><i class="fa fa-home " aria-hidden="true"></i> HOME</a>
	
			
				<!-- Collapse button -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2"
				aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
			
				<!-- Collapsible content -->
				<div class="collapse navbar-collapse" id="navbarSupportedContent2">
			
				<!-- Links -->
				<ul class="navbar-nav mr-auto ">
			
					<a class="navbar-brand text-uppercase border-right" href="../../membresia.php"><i class="fas fa-suitcase"></i> Membresias</a>
						<!-- Navbar membresiass -->
                    <!-- <a class="navbar-brand text-uppercase" href="#"><i class="fas fa-user-plus"></i> Mi cuenta</a> -->
                    
                	<!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase border-right" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-plus"></i>Mi cuenta</a>
                        <div class="dropdown-menu dropdown-primary black" aria-labelledby="navbarDropdownMenuLink">
							<?php 
								if(isset($_SESSION['usuario'])){// si no existe session presentar esto admin_cliente
									switch (@$_SESSION['tipo_usuario']) {
										case 'Cliente':

												echo '<a class="dropdown-item" href="../../adminCliente.php"">Hola: '.$_SESSION['usuario'].'</a>';
											break;
										case 'Proveedor':  
												echo ' <a class="dropdown-item " href="../../view/admin/index_admin.php"> Bienvenido : '.$_SESSION['usuario'].'</a>';
											break;
										case 'Admin':
												echo ' <div class="dropdown header-top-dropdown">
															<a class="dropdown-item " href="../../view/admin/index_admin.php"> Hi  : '.$_SESSION['usuario'].'</a>
															
														</div> ';
											break;
									}
								}else{
									echo '<a class="dropdown-item" href="../../login.php">Login</a>
									<a class="dropdown-item" href="../../registro.php">Registrarme</a>
									<a class="dropdown-item" href="../../loginAdmin.php">Administrador</a>';
								}
							?>
                        </div>
					</li>

					<!-- Features -->
					<li class="nav-item dropdown mega-dropdown  active">
						<a class="nav-link dropdown-toggle text-uppercase border-right" id="navbarDropdownMenuLink2" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false"><i class="fa fa-headphones" aria-hidden="true"></i> Editores
							<span class="sr-only">(current)</span>
						</a>
							<div class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-5 px-3 "
								aria-labelledby="navbarDropdownMenuLink2">
								<div class="row">
								<?php 
									$proveedores=ModeloProveedor::sql_lisartar_proveedor();
									$numTotalProveedor=count($proveedores);
									$numColumaImprimirProveedor=$numTotalProveedor/4;
									$contProveedor=0;
									for($i=0; $i <4; $i++){
										echo'<div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4 ">
												<h6 class="sub-title text-uppercase font-weight-bold white-text"></h6>
													<ul class="list-unstyled">';
										for ($j=0; $j <=round($numColumaImprimirProveedor) ; $j++) { 
											if($contProveedor<$numTotalProveedor){
												
												echo'<li>
															<a class="menu-item pl-0" href="'.(ControladorPlantillaInicio::url_dj_productos()).$proveedores[$contProveedor]['id'].'">
																<i class="fas fa-caret-right pl-1 pr-3"></i>'.$proveedores[$contProveedor]['apodo'].'
															</a>
													</li>';
												}
												$contProveedor++;
										}
												echo '	</ul>
												</div>';
									}
									?>
								</div>
							</div>
					</li>
	
						
	
						<!-- Features -->
						<li class="nav-item dropdown mega-dropdown  active">
						<a class="nav-link dropdown-toggle text-uppercase border-right" id="navbarDropdownMenuLink2" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false"><i class="fas fa-music"></i> Genero
							<span class="sr-only">(current)</span>
						</a>
							<div class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-5 px-3 "
								aria-labelledby="navbarDropdownMenuLink2">
								<div class="row">
									<?php 
										$biblioteca=ModeloGenero::sql_lisartar_genero();
										$numTotalGenero=count($biblioteca);
										$numColumaImprimir=$numTotalGenero/4;
										$contGenero=0;
										for($i=0; $i <4; $i++){
											echo'<div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4 ">
													<h6 class="sub-title text-uppercase font-weight-bold white-text"></h6>
														<ul class="list-unstyled">';
											for ($j=0; $j <=round($numColumaImprimir) ; $j++) { 
												if($contGenero<$numTotalGenero){
													
													echo'<li>
																<a class="menu-item pl-0" href="'.(ControladorPlantillaInicio::url_biblioteca_productos()).$biblioteca[$contGenero]['id'].'">
																	<i class="fas fa-caret-right pl-1 pr-3"></i>'.$biblioteca[$contGenero]['genero'].'
																</a>
														</li>';
													}
													$contGenero++;
											}
													echo '	</ul>
													</div>';
										}
									?>
										
								</div>
							</div>
					</li>
			
				</ul>
	
				<!-- Navbar carrito -->
				<a class="nav-link waves-effect navbar-brand text-uppercase border-left"  href="../../car.php">
					<span class="badge red z-depth-1 mr-1 cart-notification">0</span>
					<i class="fas fa-shopping-cart"></i>
					<span class="clearfix d-none d-sm-inline-block"> Car </span>
				</a>

				</div>
				<!-- Collapsible content -->

			</nav>
		</div>
		<!-- Navbar -->
	</div>


</header>