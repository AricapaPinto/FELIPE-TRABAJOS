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
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Apellitos</th>
                            <th>Telefono</th>
                            <th>Cedula</th>
                            <th>Correo</th>
                            <th>Direccion</th>
                            <th>Edad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- verificamos que la variable exista -->
                        <?php
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
                        ?>
                    </tbody>
                    <!-- este es el que se encarga de paginar nuestras listas -->

                </table>
            </div>

            <!-- /.card-body -->
        </div>
        <nav >
            <ul class="pagination">
                <?php
                $prev=$curret_page-1;
                $next=$curret_page+1;

                if($prev<=0){
                    $prev=1;
                }
                if($next<=0){
                    $next=1;
                }
                ?>
                <li class="page-item"><a class="page-link" href="<?php echo base_url()."index.php/Dashboard/verUsers/". $prev ?>">Anterior</a></li>
                <?php for ($i=1; $i <=$last_page ; $i++) {?>

                <li class="page-item"><a class="page-link" href="<?php echo base_url()."index.php/Dashboard/verUsers/". $i ?>"><?php echo $i?></a></li>
                <?php }?>
                <li class="page-item"><a class="page-link" href="<?php echo base_url()."index.php/Dashboard/verUsers/". $next ?>">Siguiente</a></li>
            </ul>
        </nav>
    </section>



</div>

<!-- cargamos el footer -->
<?php
$this->load->view('layouts/footer');
?>