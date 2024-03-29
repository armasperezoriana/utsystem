<!DOCTYPE html>
<html lang="en">
<!--fororo-->
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
<body class="bg-gradient-primary">

    <div class="container" style="margin-top:auto;margin-bottom:auto">

        <!-- Outer Row -->
        <div class="row justify-content-center" >

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-"> <img src="assets/img/logo.png" style="width: 300px;display: flex;margin-top: 73px;margin-left: auto;margin-bottom: auto;margin-right: auto;" class="img"> </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido al sistema UT</h1>
                                    </div>
                                    <form class="user" id="formLogin" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="username" aria-describedby="emailHelp" placeholder="Ingresa tu Usuario..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="pass" placeholder="Contraseña" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Recuerdame</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">
                                            Iniciar Sesión
                                        </button>
                                        <hr>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" value="1" href="<?=_ROUTE_ ?>Recuperar">¿Datos olvidados?</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="view/vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <script src="https://www.google.com/recaptcha/api.js?render=6Lenol0aAAAAAL58P1eQFRe6yfLmR8EEDBnXe4P_"></script>
<script>
        
            grecaptcha.ready(function() {
                grecaptcha.execute('6Lenol0aAAAAAL58P1eQFRe6yfLmR8EEDBnXe4P_', {action: 'homepage'})
                .then(function(token) {
                    // Add your logic to submit to your backend server here.
                 //   console.log(token);
                    $('#token').val(token);
                });
            });
    </script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="view/vendor/plugins/sweetalert/sweet-alert.js"></script>
    <script type="text/javascript" src="'../../assets/js/login/login.js"></script>
</body>

</html>