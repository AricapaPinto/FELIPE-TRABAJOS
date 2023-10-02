<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Crud extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PersonasModel');
        $validacion = $this->session->has_userdata('session-persona');
        if ($validacion) {
            // $session=$this->session->userdata('session-persona');
            return false;
        } else {
            redirect('Login/cerrarSesion');
        }
    }


    public function createUser()
    {
        // obtenemos los datos para validar que no esten vacios
        $nombres = $this->input->post("nombre");
        $apellidos = $this->input->post("apellido");
        $telefono = $this->input->post("telefono");
        $cedula = $this->input->post("cedula");
        $correo = $this->input->post("correo");
        $password = $this->input->post("password");
        $direccion = $this->input->post("direccion");
        $edad = $this->input->post("edad");
        // validamos que los campos no esten vacios 
        $data = array();

        if ($nombres != '' && $apellidos != '' && $telefono != '' && $cedula != '' && $correo != '' && $password != '' && $direccion != '' && $edad != '') {
            // si son diferents de vacios seguimos con la insercion de datos

            // mandamos una areglo de datos para insertarlos de una

            $data = [
                'nombre' => $nombres,
                'apellido' => $apellidos,
                'telefono' => $telefono,
                'cedula' => $cedula,
                'correo' => $correo,
                'password' => md5($password),
                'direccion' => $direccion,
                'edad' => $edad,
            ];

            $respuesta = $this->PersonasModel->newUser($data);
            // verifcamos que los datos hayan sido ingresado con exito 

            if ($respuesta) {
                $data['exitoso'] = true;
                // cargamos de nuevo la vista
            } else {
                $data['error'] = true;
            }
        } else {

            $data['campos_vacios'] = true;
        }
        // cargamos de nuevo la vista del formulario con la variable data mirando la respuesta de la base de datos 
        $data['session'] = $this->session->userdata('session-persona');
        $this->load->view('Dashboard/crearUsuario', $data);
    }
    // creamos el metodo para eliminar los usuarios 

    public function deleteUser($cedula)
    {
        $respuesta = $this->PersonasModel->deleteUser($cedula);
        // enviamos de nuevo los datos actualizados de la base de datos 
        $actualizacion = $this->PersonasModel->listenUsers();
        $data['lista'] = $actualizacion;
        if ($respuesta) {
            $data['delete_exitoso'] = true;
        } else {
            $data['error'] = true;
        }

        $data['session'] = $this->session->userdata('session-persona');
        $this->load->view('Dashboard/eliminarUsuario', $data);
    }

    public function updateUser($cedula = null)
    {
        // cargamos el modelo para obtener los datos de la persona 
        $data = array();
        $persona = $this->PersonasModel->getPersonasBycedula($cedula);
        $data['usuario'] = $persona;

        if ($this->input->server("REQUEST_METHOD") == "POST") {

            // obtenemos los datos para validar que no esten vacios
            $upNombres = $this->input->post("update_nombre");
            $upApellidos = $this->input->post("update_apellido");
            $upTelefono = $this->input->post("update_telefono");
            $upCedula = $this->input->post("update_cedula");
            $upCorreo = $this->input->post("update_correo");
            $upPassword = $this->input->post("update_password");
            $upDireccion = $this->input->post("update_direccion");
            $upEdad = $this->input->post("update_edad");

            // ahora validamos que los campos agregados sean validos
            if ($upNombres != '' && $upApellidos != '' && $upTelefono != '' && $upCedula != '' && $upCorreo != '' && $upPassword != '' && $upDireccion != '' && $upEdad != '') {

                $data = [
                    'nombre' => $upNombres,
                    'apellido' => $upApellidos,
                    'telefono' => $upTelefono,
                    'cedula' => $upCedula,
                    'correo' => $upCorreo,
                    'password' => md5($upPassword),
                    'direccion' => $upDireccion,
                    'edad' => $upEdad,
                ];
                $respuesta = $this->PersonasModel->updateUser($cedula, $data);
                if ($respuesta) {
                    $data['update_exitoso'] = true;
                } else {
                    $data['error_update'] = true;
                }
            } else {
                $data['ErrorInData'] = true;
            }
        }

        // cargamos la vista con el inicio de session
        $data['session'] = $this->session->userdata('session-persona');
        $this->load->view('Dashboard/actualizarUsuario', $data);

    }

    public function listarUsuarios()
    {
        $data = array();
        $buscador_p = $this->input->post('buscador_p'); // Obtener el término de búsqueda
        // Verificar si se envió una solicitud POST y si $buscador_p no está vacío
        if ($this->input->server("REQUEST_METHOD") == "POST" && !empty($buscador_p)) {
            $resultados = $this->PersonasModel->busquedaUser($buscador_p);
            $data['busquedas'] = $resultados;
        } else {
            $respuesta = $this->PersonasModel->listenUsers();
            $data['lista'] = $respuesta;
        }

        // Cargar la vista y pasarle los datos
        $data['session'] = $this->session->userdata('session-persona');
        $this->load->view('Dashboard/eliminarUsuario', $data);
    }

    // creamos los metodos para paginar nuestra tabla de ver usuarios



}

/* End of file Controllername.php */