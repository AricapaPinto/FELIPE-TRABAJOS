<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    // esta deveria ser la plantilla principal para poder de que el usuario se loguee
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PersonasModel');

    }
    
    public function index()
    {

        $this->load->view('Login');
    }
    // ahora validamos el ingreso del usuario 

    public function validarIngreso()
    {

        // obtenemo la variables del formulario el cual hacemos el recibo de informacon 

        $email = $this->input->post('correo');
        $password = $this->input->post('password');

        // validamos que los campo no esten vacios 

        if ($email != '' && $password != '') {
            // los datos no viene vacios 
           
            

            // Ahora utilizamos el metodo de validar los datos 

            $respuesta = $this->PersonasModel->validarIngreso($email, $password);

            // aqui validamso si la respuesta fue true o false

            // validamos el ingreso
            if ($respuesta) {
                // cargamos los datos de ssesion para poder que se pueda mostrar 
                $datosPersona = $this->PersonasModel->getPersonasByEmail($email);

                //    creamso el areglo para guardar los datos de la persona iniciada
                $datosSesion = [
                    // estos son los datos de sesion de la persona que se logueo
                    "nombre" => $datosPersona->nombre,
                    "apellido" => $datosPersona->apellido,
                    "telefono" => $datosPersona->telefono,
                    "cedula" => $datosPersona->cedula,
                    "correo" => $datosPersona->correo,
                    "password" => $datosPersona->password,
                    "direccion" => $datosPersona->direccion,
                    "edad" => $datosPersona->edad,
                ];
                // ahora cargamos los datos en la variable session 
                // ya podemos usar los datos de session en las paginas que nosotros queramos 
                $this->session->set_userdata('session-persona',$datosSesion);
                // lo redirigimos a la vista del dashborad
                // 
                // y le mandamos la variable de sessioo
                redirect('Dashboard', 'refresh');
            } else {
                // sino lo redirgimos a la vista del login diciendole que los datos son incorectos
                $data['error'] = true;
                $this->load->view('Login', $data);

            }


        } else {
            // caso contraio mandamos una varable que le notifique que los datos son necesarios
            $data['vacios'] = true;
            // cargamos las vista y le mandamos el mensaje de error
            $this->load->view('Login', $data);
        }
    }
    public function cerrarSesion()
    {
        $this->session->sess_destroy();
        redirect('Login', 'refresh');
    }

}

/* End of file Login.php */