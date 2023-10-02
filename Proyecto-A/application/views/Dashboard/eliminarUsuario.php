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
            <div class="card-header">
                <h3 class="card-title">Tabla con lista de personas:</h3>
            </div>
            <!-- /.card-header -->
            <?php if (isset($delete_exitoso)): ?>
                <script>
                    Swal.fire({
                        title: 'ELIMINACION EXITOSO',
                        text: 'EL usuario ha sido eliminado con éxito',
                        icon: 'success',
                    });
                </script>
            <?php endif ?>
            <?php if (isset($error)): ?>
                <script>
                    Swal.fire({
                        title: 'ERROR DE SERVIDOR',
                        text: 'Hubo un problema al eliminar el usuario',
                        icon: 'error',
                    });
                </script>
            <?php endif ?>
            <div class="card-body">
                <div>
                    <form action="<?= base_url('index.php/Crud/listarUsuarios'); ?>" method="post">
                        <input type="search" name="buscador_p" id="">
                        <button class="btn_buscar submit" type="submit">
                            <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>

                </div>
                <table id="example1" class="table  table-bordered table-striped ">
                    <thead>
                        <tr class="text-center">
                            <th>Nombres</th>
                            <th>Apellitos</th>
                            <th>Telefono</th>
                            <th>Cedula</th>
                            <th>Correo</th>
                            <th>Direccion</th>
                            <th>Edad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // esta es la busqueda individual
                        if (isset($busquedas)) {
                            // aqui solo entrara cuando se haga una peticion post y el input no este vacio 
                            foreach ($busquedas as $persona) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $persona['nombre']; ?>
                                    </td>
                                    <td>
                                        <?php echo $persona['apellido']; ?>
                                    </td>
                                    <td>
                                        <?php echo $persona['telefono']; ?>
                                    </td>
                                    <td>
                                        <?php echo $persona['cedula']; ?>
                                    </td>
                                    <td>
                                        <?php echo $persona['correo']; ?>
                                    </td>
                                    <td>
                                        <?php echo $persona['direccion']; ?>
                                    </td>
                                    <td>
                                        <?php echo $persona['edad']; ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('index.php/Crud/deleteUser/' . $persona['cedula']); ?>"
                                            class="btn btn-danger">Eliminar</a>

                                        <a href="<?= base_url('index.php/Crud/updateUser/' . $persona['cedula']); ?>"
                                            class="btn btn-primary">Actualizar</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            // aqui entra para mostrar la lista en general
                            if (isset($lista)) {

                                foreach ($lista as $persona) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $persona->nombre; ?>

                                        </td>
                                        <td>
                                            <?php echo $persona->apellido; ?>
                                        </td>
                                        <td>
                                            <?php echo $persona->telefono; ?>
                                        </td>
                                        <td>
                                            <?php echo $persona->cedula; ?>
                                        </td>
                                        <td>
                                            <?php echo $persona->correo; ?>
                                        </td>
                                        <td>
                                            <?php echo $persona->direccion; ?>
                                        </td>
                                        <td>
                                            <?php echo $persona->edad; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('index.php/Crud/deleteUser/' . $persona->cedula); ?>"
                                                class="btn btn-danger">Eliminar</a>

                                            <a href="<?= base_url('index.php/Crud/updateUser/' . $persona->cedula); ?>"
                                                class="btn btn-primary">Actualizar</a>
                                        </td>
                                    </tr>
                                    <?php
                                }

                            } else {
                                ?>
                                <div class="alert alert-dark" role="alert">
                                    NO HAY DATOS PARA MOSTRAR
                                </div>
                                <?php
                            }
                            if (!empty($busquedas)) {
                                ?>
                                <div class="alert alert-dark" role="alert">
                                    NO HAY DATOS PARA MOSTRAR BUSCADOR
                                </div>
                                <?php
                            }

                        }
                        ?>
                       
                    </tbody>

                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>


</div>

<!-- cargamos el footer -->
<?php
$this->load->view('layouts/footer');
?>