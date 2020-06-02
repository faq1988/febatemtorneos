<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campeonato_model extends CI_Model{



public function __construct()
{
  parent::__construct();
}



	function obtener_campeonatos(){	
		$usuario = $this->session->userdata('id_usuario');		
		$this->db->where('usuario = ', $usuario);	
		$query = $this->db->get('campeonato');
		if ($query->num_rows() >0 ) return $query;
	}


		function crear_campeonato($data){
		$this->db->insert('campeonato', array('nombre'=>$data['nombre'], 'fecha_inicio'=>$data['fecha_inicio'],
			'fecha_fin'=>$data['fecha_fin'], 'club'=>$data['club'], 'usuario'=>$data['usuario'], 'activo'=>$data['activo']
			));

	}


	function eliminar_campeonato($id)
	{
		$this->db->where('id =', $id);
		$this->db->delete('campeonato');
	}
}

?>