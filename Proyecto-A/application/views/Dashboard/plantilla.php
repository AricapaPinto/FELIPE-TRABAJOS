<!-- ahora cargamos la cabeza de pagina -->

<?php

$titulo['titulo'] = "Inicio";
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

    <h1>Esta es la vista del Inicio</h1>
  </section>



</div>

<!-- cargamos el footer -->
<?php
$this->load->view('layouts/footer');
?>