<!-- ahora cargamos la cabeza de pagina -->

<?php

$titulo['titulo'] = "Crear Usuario";
$this->load->view('layouts/header', $titulo);
?>
<!-- cargamos el sidebar -->


<?php
$dataSidebar['session'] = $session;
$this->load->view('layouts/sidebar', $dataSidebar);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Registra un nuevo usuario.</p>

                <!-- aqui le mostramos los mensajes de error que surgieron depediendo de que evie el usuario y la respuesta que nos de el servidor -->

                <?php if (isset($exitoso)): ?>
                    <script>
                        Swal.fire({
                            title: 'CREADO CON EXITO',
                            text: 'EL usuario ha sido creado con éxito',
                            icon: 'success',
                        });
                    </script>
                <?php endif ?>
                <?php if (isset($error)): ?>
                    <script>
                        Swal.fire({
                            title: 'ERROR 505',
                            text: 'Hubo un problema con las respuesta del servidor',
                            icon: 'error',
                        });
                    </script>
                <?php endif ?>
                <?php if (isset($campos_vacios)): ?>
                    <script>
                        Swal.fire({
                            title: 'CAMPOS VACIOS',
                            text: 'todos los campos son obligatorios',
                            icon: 'error',
                        });
                    </script>
                <?php endif ?>
                <form action="<?= base_url('index.php/Crud/createUser') ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Nombres" name="nombre">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Apellidos" name="apellido">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Telefono" name="telefono">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Cedula" name="cedula">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-id-card"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Correo" name="correo">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Direccion" name="direccion">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-map-marker"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Edad" name="edad">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-calendar"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-key"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Registrar Usuario</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.card -->
    </section>



</div>

<!-- cargamos el footer -->
<?php
$this->load->view('layouts/footer');
?>