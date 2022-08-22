
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SUT - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo _ROUTE_ ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body class="bg-gradient-primary" style="display:flex;background-image: url(<?php echo _ROUTE_ ?>/assets/img/fondoUT.jpg);background-size: cover;">
    <div class="container" style="margin-top:auto;margin-bottom:auto">

        <!-- Outer Row -->
        <div class="row justify-content-center" >

<!-- MODAL DE RECUPERAR-->

<div class="modal-dialog"  id="recuperar" role="document" style="position: relative;top: 100%; width:400%; height:800%; right:8%;"> 
    <div class="modal-content">
      <div class="modal-header">
        <center><h5>Recuperar Cuenta</h5></center>
        <button type="button"  data-dismiss="modal"  >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div style="width:100%">
                                
                                </div>
                                <br>
                            <div class="contenedor" id="pasouno">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">
                                        Seguridad de Usuarios</h1>
                                          <p class="mb-4">Verifique Su correo e ingrese el correo enviado </p>
                                    </div>
                                    <form class="recuperarClave" id="recuperarClave">
                                                <label for="clave"><b>Introduzca su nueva clave</b></label>
                                                 
                                                                    <br>
                                                <input type="text" class="form-control form-control-user"
                                                id="pass" aria-describedby="emailHelp" required
                                                placeholder="Ingrese una contrasena nueva..">
                                        
                                         <br>
                                         <button class="btn btn-secondary btn-user btn-block" type="submit">
                                           Guardar
                                        </button>
                                        </div>
                                    </form>
                                    <hr>
                                    <br>  <br> 
                                    <div class="text-center">
                                        <a class="small" href="<?= _ROUTE_ ?>Login">¿Ya tienes una? Inicia Sesion!</a>
                            </div>
                            </div>
                        </div>
                        </div>





 <!-- Bootstrap core JavaScript-->
    <script src="view/vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="https://www.google.com/recaptcha/api.js?render=6Lenol0aAAAAAL58P1eQFRe6yfLmR8EEDBnXe4P_"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="view/vendor/plugins/sweetalert/sweet-alert.js"></script>
    <script type="text/javascript" src="'../../assets/js/login/olvido.js"></script>
    <script >

function Mostrar(){
                                        document.getElementById("recuperar").style.display="block";
                                        document.getElementById("login").style.display="none";
                                      }
                                       function Ocultar(){
                                        document.getElementById("recuperar").style.display="none";
                                          document.getElementById("login").style.display="block";
                                      }
                                      


    </script>



</body>



</html>


