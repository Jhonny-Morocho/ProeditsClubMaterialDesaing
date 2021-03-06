


  <!-- Full Page Intro -->
  <div class="view" style="background-image: url('../../img/fondo.png'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <!-- Mask & flexbox options-->
    <div class="mask rgba-gradient d-flex justify-content-center align-items-center">
      <!-- Content -->
      <div class="container">
        <!--Grid row-->
        <div class="row mt-5">
          <!--Grid column-->
          <div class="col-md-6 mb-5 mt-md-0 mt-5 white-text text-center text-md-left">
            <h1 class="h1-responsive font-weight-bold wow fadeInLeft" data-wow-delay="0.3s">LOGIN </h1>
            <hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s">
            <h6 class="mb-3 wow fadeInLeft" data-wow-delay="0.3s">www.PROEDITSCLUB.com EDITS & REMIXES FOR DJ'S</h6>
            <a class="btn btn-outline-white btn-rounded wow fadeInLeft" data-wow-delay="0.3s" href="../../registro.php">CREATE ACCOUNT</a>
          </div>
          <!--Grid column-->
          <!--Grid column-->
          <div class="col-md-6 col-xl-5 mb-4">
            <!--Form-->
            <div class="card wow fadeInRight cardClienteLogin" data-wow-delay="0.3s">
              <div class="card-body">
                <!--Header-->
                <div class="text-center">
                  <h3 class="white-text font-weight-bold">
                    <i class="fa fa-user white-text"></i> Login:</h3>
                  <hr class="hr-light">
                </div>

                <form action="../../controler/ctrCliente.php" method="post" id="login-cliente">
                  <div class="md-form">
                    <i class="fa fa-envelope prefix white-text active"></i>
                    <input type="email" id="form2" class="white-text form-control" name="inputEmailCliente" required>
                    <label for="form2" class="active">Your email</label>
                  </div>
                  <div class="md-form">
                    <i class="fa fa-lock prefix white-text active"></i>
                    <input type="password" id="form4" class="white-text form-control" name="inputPasswordCliente" maxlength="20" required>
                    <label for="form4">Your password</label>
                  </div>

                  <div class="md-form">
                    <center>
                      <a href="" style="color: white;" data-toggle="modal" data-target="#modalLoginAvatar">
                        <p  style="color: white;">Not a member?
                        </p>
                      
                      </a>
                    </center>
                  </div>
                  <div class="text-center mt-4">
                  <input type="hidden" name="Cliente" value="loginCliente">
                    <button class="btn btn-indigo btn-rounded">Submit</button>
                    <hr class="hr-light mb-3 mt-4">
                    <div class="inline-ul text-center d-flex justify-content-center">
                      <div class="smsEsperaLogin">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!--/.Form-->
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Content -->
    </div>
    <!-- Mask & flexbox options-->
  </div>
  <!-- Full Page Intro -->

    <!--======================= RECUPERAR MI CONTRASEÑA MODAL ================================= -->

  <!--Modal: Login with Avatar Form-->
<div class="modal fade" id="modalLoginAvatar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 9999;"
  aria-hidden="true">
  <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
    <!--Content-->
    <div class="modal-content">


      <!--Body-->
      <form action="../../controler/ctrCliente.php" method="post" id="idFormularioRecuperarPassword">
        <div class="modal-body text-center mb-1">
  
          <h5 class="mt-1 mb-4">Recover my password</h5>
  
          <div class="md-form ml-0 mr-0">
            <input type="email" type="text"  class="form-control form-control-sm validate ml-0" style="color: black !important;"  name="inputEmailCliente" value="jhonnymichaeldj2011@hotmail.com">
            <label data-error="wrong" data-success="right"  class="ml-0" style="color: black;">Enter email</label>
          </div>
          <div class="col-lg-12">
            <div class="smsRecuperacionContraseña">

            </div>
          </div>
          <input type="hidden" name="Cliente" value="recuperarContraseña">
          <div class="text-center mt-4">
            <button class="btn btn-cyan mt-1 btnEnviar">Enviar <i class="fas fa-sign-in ml-1"></i></button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </form>

    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: Login with Avatar Form-->

