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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="<?php echo base_url(); ?>/assets/dist/img/user4-128x128.jpg"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">
                                <?php echo explode(" ", $session['nombre'])[0] . " " . explode(" ", $session['apellido'])[0] ?>
                            </h3>

                            <p class="text-muted text-center">Software Engineer</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Followers</b> <a class="float-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Following</b> <a class="float-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Friends</b> <a class="float-right">13,287</a>
                                </li>
                            </ul>

                            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                                Estudia en el Sena centro sector agropecurio
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted">Pereia - parque Bolivar</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                            <p class="text-muted">
                                <span class="badge badge-danger">UI Design</span>
                                <span class="badge badge-success">Coding</span>
                                <span class="badge badge-info">Javascript</span>
                                <span class="badge badge-warning">PHP</span>
                                <span class="badge badge-primary">Node.js</span>
                            </p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                            <p class="text-muted">Persona Dispuesta a superarse como persona cada dia</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
            <!-- /.row -->
            <div class="card">
                <div class="card-header">
                    <h2>Perfil de Usuario</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Datos Personales:</h4>
                            <p><strong>Nombre:</strong>
                                <?php echo $session["nombre"]; ?>
                            </p>
                            <p><strong>Apellido:</strong>
                                <?php echo $session["apellido"]; ?>
                            </p>
                            <p><strong>Teléfono:</strong>
                                <?php echo $session["telefono"]; ?>
                            </p>
                            <p><strong>Cédula:</strong>
                                <?php echo $session["cedula"]; ?>
                            </p>
                            <p><strong>Correo Electrónico:</strong>
                                <?php echo $session["correo"]; ?>
                            </p>
                            <p><strong>Dirección:</strong>
                                <?php echo $session["direccion"]; ?>
                            </p>
                            <p><strong>Edad:</strong>
                                <?php echo $session["edad"]; ?>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <!-- Otra información relacionada con el perfil -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>


<!-- cargamos el footer -->
<?php
$this->load->view('layouts/footer');
?>