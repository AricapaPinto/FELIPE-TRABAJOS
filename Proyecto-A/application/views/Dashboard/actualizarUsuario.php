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
                <p class="login-box-msg">Actualizar Usuario </p>

                <!-- aqui le mostramos los mensajes de error que surgieron depediendo de que evie el usuario y la respuesta que nos de el servidor -->

                <?php if (isset($update_exitoso)): ?>
                    <script>
                        Swal.fire({
                            title: 'ACTUALIZADO CON EXITO',
                            text: 'EL usuario ha sido creado con éxito',
                            icon: 'success',
                        });
                    </script>
                    <meta http-equiv="refresh" content="1;url=<?= base_url('index.php/Dashboard/deleteUser') ?>">

                <?php endif ?>
                <?php if (isset($error_update)): ?>
                    <script>
                        Swal.fire({
                            title: 'ERROR 505',
                            text: 'Hubo un problema con las respuesta del servidor',
                            icon: 'error',
                        });
                    </script>
                <?php endif ?>
                <?php if (isset($ErrorInData)): ?>
                    <script>
                        Swal.fire({
                            title: 'CAMPOS VACIOS',
                            text: 'todos los campos son obligatorios',
                            icon: 'error',
                        });
                    </script>
                <?php endif ?>
                <!-- aqui toca enviar al controlador de actualizar -->
                <form action="<?= base_url('index.php/Crud/updateUser/' . (isset($usuario) ? $usuario->cedula : '')) ?>"
                    method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Nombres" name="update_nombre"
                                    value="<?php echo isset($usuario->nombre) ? $usuario->nombre : '' ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Apellidos" name="update_apellido"
                                    value="<?php echo isset($usuario->apellido) ? $usuario->apellido : '' ?>">
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
                                <input type="text" class="form-control" placeholder="Telefono" name="update_telefono"
                                    value="<?php echo isset($usuario->telefono) ? $usuario->telefono : '' ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Cedula" name="update_cedula"
                                    value="<?php echo isset($usuario->cedula) ? $usuario->cedula : '' ?>" readonly>
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
                                <input type="email" class="form-control" placeholder="Correo" name="update_correo"
                                    value="<?php echo isset($usuario->correo) ? $usuario->correo : '' ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Direccion" name="update_direccion"
                                    value="<?php echo isset($usuario->direccion) ? $usuario->direccion : '' ?>">
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
                                <input type="text" class="form-control" placeholder="Edad" name="update_edad"
                                    value="<?php echo isset($usuario->edad) ? $usuario->edad : '' ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-calendar"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="New Password"
                                    name="update_password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-key"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Actualizar Usuario</button>
                        </div>
                    </div>
                </form>
                <div class="col-2 mt-5">
                    <div class="col-12">
                        <a href="<?= base_url('index.php/Crud/listarUsuarios') ?>"
                            class="btn btn-danger btn-block">Cancelar Actualizacion</a>

                    </div>
                </div>
            </div>
        </div><!-- /.card -->
    </section>



</div>

<!-- cargamos el footer -->
<?php
$this->load->view('layouts/footer');
?>