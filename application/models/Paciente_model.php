<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paciente_model extends CI_Model{



public function __construct()
{
  parent::__construct();
}




function crear_paciente($data){
		
		$this->db->insert('paciente', 
			array(	'nombre'=>$data['nombre'], 
					'apellido'=>$data['apellido'], 
					'tipo_doc'=>$data['tipo_doc'], 
					'nro_doc'=>$data['nro_doc'], 
					'telefono'=>$data['telefono']
					//'fecha_nac'=>$data['fecha_nac']
					));

		$last_id = $this->db->insert_id();
		return $last_id;
	}





public function obtener_pacientes(){

$this->db->from('paciente');
$q = $this->db->get('');
if ($q->num_rows() >0 ) return $q;//->result();

}


}


?>