<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <!-- este es el link de sween alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html">! Bienvenido de nuevo !</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Ingresa tus datos para iniciar sesion</p>
                <!-- enviamos mensaje de que los datos son incorrectos -->
                <?php
                // validamos que la variabl error exista 
                if (isset($error)) {
                    ?>
                    <script>
                        Swal.fire(
                            'Correo o Password Incorrectos',
                            'error'
                        )
                    </script>
                    <?php
                }
                if (isset($vacios)) {
                    ?>
                    <script>
                        Swal.fire(
                            'Todos los campos son obligatorios',
                            'Intenta Nuevamente :)',
                            'error'
                        )
                    </script>
                    <?php
                }
                ?>
                <!-- aqui mandamos la url en el controlador que se va a encarga de validar el ingreso del usuario -->

                <form action="<?= base_url('index.php/Login/validarIngreso') ?>" method="post">
                    <div class="input-group mb-3">
                        <!-- aqui es donde validamos que los datos existan -->
                        <input type="email" class="form-control" placeholder="Email" name="correo">
                        <!-- esto es lo que mandamos al controlador  -->
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <!-- aqui es donde validamos que los datos existan -->
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <!-- esto se lo mandamos al controlador -->
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Recordarme
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Iniciar</button>
                        </div>

                    </div>
                </form>

                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Iniciar sesion con Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Iniciar sesion con Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="forgot-password.html">Olvidaste tu contraseña?</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Eres nuevo registrate aqui!</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
</body>

</html>