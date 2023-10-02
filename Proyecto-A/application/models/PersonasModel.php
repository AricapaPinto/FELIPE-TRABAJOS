<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersonasModel extends CI_Model
{

    // metodo para validar los datos del login

    public function validarIngreso($email, $password)
    {
        // la contraseña toca encriptarla para poder que coincida con la que esta en la base de  datos que tambien se encuentra encriptada
        // seleccionamos los datos que queremos traer para hacer la validacion 
        $this->db->select('correo', 'password');
        // ahora verificamos que los dartos recibidos coincidan con los datos dela base de datos 

        $this->db->where('correo', $email);
        $this->db->where('password', md5($password));

        $respuesta = $this->db->get('persona')->result();
        if (sizeof($respuesta) != 0) {
            return true;
        } else {
            return false;
        }

    }
    // creamos el metodo para obtner los datos de la persona que ingreso 

    public function getPersonasByEmail($correo)
    {
        $this->db->select('*');
        $this->db->where('correo', $correo);

        $datosPersona = $this->db->get('persona')->result();
        // ahora validamos que la respuesta del servidor venga con datos 

        if (sizeof($datosPersona) != 0) {
            return $datosPersona[0];
        } else {
            // retornamos un null
            return null;
        }
    }
    public function getPersonasBycedula($cedula)
    {
        $this->db->where('cedula', $cedula);
        $persona = $this->db->get('persona')->result();

        if (sizeof($persona) != 0) {
            return $persona[0];
        } else {
            // retornamos un null
            return null;
        }
    }
    // creamos el metodo para insertar un nuevo usuario 

    public function newUser($data)
    {
        return $this->db->insert('persona', $data);
    }
    // creamos un metodo para mostrar todos los datos del usuario
    public function listenUsers()
    {

        $lista_usuarios = $this->db->get('persona')->result();
        // validamos que la respuesta venga con datos 
        if (!empty($lista_usuarios)) {
            return $lista_usuarios;
        } else {
            return array();
        }
    }
    // este es para hacer uso del paginador 

    // 1. Metodo creado
    public function count()
    {

        $lista_usuarios = $this->db->get('persona')->num_rows();
        // validamos que la respuesta venga con datos 
        if (!empty($lista_usuarios)) {
            return $lista_usuarios;
        } 
    }
    // 2.encargado de paginar
    public function paginador($cant_registros,$offset)
    {

        $this->db->limit($cant_registros,$offset);
        $lista_usuarios = $this->db->get('persona');
        // validamos que la respuesta venga con datos 
        if (!empty($lista_usuarios)) {
            return $lista_usuarios->result();
        } 
    }

    public function deleteUser($cedula)
    {
        $this->db->where('cedula', $cedula);
        $respuesta = $this->db->delete('persona');
        if ($respuesta) {
            return true;
        } else {
            return false;
        }
    }
    public function updateUser($cedula, $date)
    {
        $this->db->where('cedula', $cedula);
        $this->db->update('persona', $date);

        if ($this->db->affected_rows() > 0) {
            return true; // actulizacion exitosa 
        } else {
            return false; // no se actualizo los datos por alguna razons
        }
    }
    public function busquedaUser($buscador_p)
    {


        $this->db->select('*');
        $this->db->from('persona');
        $this->db->where("nombre LIKE '%$buscador_p%' OR cedula='$buscador_p'");
        $this->db->order_by('cedula');
        $consulta_p = $this->db->get();
        if ($consulta_p->num_rows() > 0) {
            return $consulta_p->result_array();
           
        } else {
            return [];
        }
    }
}

/* End of file Personas_Model.php */