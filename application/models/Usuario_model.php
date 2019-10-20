<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{



public function __construct()
{
  parent::__construct();
}


public function login($username, $password){

$this->db->where('username', $username);
$this->db->where('password', $password);
$q = $this->db->get('usuario');
if ($q->num_rows()>0)
	return true;
else
	return false;
}



function crear_usuario($data){
		
		$this->db->insert('usuario', array('username'=>$data['nombre_usuario'], 'password'=>md5($data['contraseña']), 'email'=>$data['email'], 'rol'=>$data['rol']
			, 'id_establecimiento'=>$data['id_establecimiento'], 'id_persona'=>$data['id_persona']));
	}



public function obtener_usuario($username){

$this->db->where('username', $username);
$q = $this->db->get('usuario');
if ($q->num_rows() >0 ) return $q;//->result();
}


public function obtener_usuario_por_id($id){

$this->db->where('id', $id);
$q = $this->db->get('usuario');
if ($q->num_rows() >0 ) return $q;//->result();
}


/*
public function obtener_perfil($username)
{		
		$this->db->from('usuario u');
		$this->db->join('persona p', 'u.tipo_doc = p.tipo_doc and u.doc = p.doc', 'left');
		//$this->db->join('persona p', 'u.doc = p.doc', 'left');		
		$this->db->where('u.username =', $username);		
		$query = $this->db->get();
  		if ($query->num_rows() >0 ) return $query;//->result();
}
*/


function eliminar_usuario($id)
	{
		$this->db->where('id =', $id);
		$this->db->delete('usuario');
	}


function cambiar_password($username, $password)
{
	$this->db->set('password', $password);    
    $this->db->where('username', $username);
    $this->db->update('usuario');
}


public function obtener_usuarios(){
		$this->db->select('t.username, t.rol, c.nombre as club');
		$this->db->from('usuario t');	
		$this->db->join('club as c', 'c.id=t.club'); 	
		$q = $this->db->get('');
		if ($q->num_rows() >0 ) return $q;//->result();
	}

}


?>