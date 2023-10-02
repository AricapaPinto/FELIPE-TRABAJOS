<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    // este es el inicio cuando se valida que los datos existen

    // validamos en el contructor que tenga el login iniciado para poder hacer la siguientes acciones 


    public function __construct()
    {
        parent::__construct();
        $this->load->model('PersonasModel');
        // validamos en el contructor que tenga la validacion de inicio de session para poder estar aqui 
        $validacion = $this->session->has_userdata('session-persona');
        if ($validacion) {
            // $session=$this->session->userdata('session-persona');
            return false;
        } else {
            redirect('Login/cerrarSesion');
        }


    }

    public function index()
    {
        $data['session'] = $this->session->userdata('session-persona');
        $this->load->view('Dashboard/plantilla', $data);
    }
    // creamos el controlador para manejar la vista de crear usuarios y le mandamos el inicio de sesion del usuario que inicio 

    // aqui vamos  a crear los constrcutores los cuales se va a  encargar de manejar las vistas
    public function createUsers()
    {
        $data['session'] = $this->session->userdata('session-persona');
        $this->load->view('Dashboard/crearUsuario', $data);
    }
    public function verUsers($pag=1)
    {
        // esto es para que la pagina siempre empie desde cero
        $pag--;
        // validamos que pag cero igual a cero
        if($pag<0){
            $pag=0;
        }
        // creamos las varibles para mirar que cantidad le mandamos para que muestre
        $cantidad_resgistros=4;
        $offset=$pag *$cantidad_resgistros;
        // $respuesta = $this->PersonasModel->listenUsers();
        $respuesta=$this->PersonasModel->paginador($cantidad_resgistros,$offset);
        // echo $this->PersonasModel->count();

        // aqui le enviamos el atras y el siguiente
        $data['curret_page']=$pag+1;
        // lo que se encarga el ceil es de redondear el numero a lo que mayor se acerque para que no nos de un valor flotante
         // tenemos que calcular el tamaño de la pagina para enviarle el siguiente
        $data['last_page']=  ceil($this->PersonasModel->count() /$cantidad_resgistros);
        $data['lista'] = $respuesta;
        $data['session'] = $this->session->userdata('session-persona');
        $this->load->view('Dashboard/verUsuarios', $data);
    }
    public function deleteUser()
    {

        $respuesta = $this->PersonasModel->listenUsers();
        $data['lista'] = $respuesta;
        $data['session'] = $this->session->userdata('session-persona');
        $this->load->view('Dashboard/eliminarUsuario', $data);
    }
    public function updateUsers()
    {
        $data['session'] = $this->session->userdata('session-persona');
        $this->load->view('Dashboard/actualizarUsuario', $data);
    }
    // abrimos la vista del usuario para mostrarle su informacion completa

    public function profileUser()
    {
        $data['session'] = $this->session->userdata('session-persona');
        $this->load->view('Dashboard/infoUser', $data);
    }
}

/* End of file Dasboard.php */