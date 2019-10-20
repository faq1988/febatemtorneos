<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Liquidaciones_model extends CI_Model{



public function __construct()
{
  parent::__construct();
}




function crear_liquidacion($data){
		
		$this->db->insert('liquidacion', 
			array(	'transportista'=>$data['transportista'], 
					'fecha'=>$data['fecha'], 
					));
	}


function crear_adelanto($data){
		
		$this->db->insert('adelanto', 
			array(	'concepto'=>$data['concepto'], 
					'monto'=>$data['monto'], 
					));
	}



public function obtener_liquidacion($id){


$this->db->select('l.id as id, p.nombre_apellido as transportista, l.fecha');
$this->db->from('liquidacion l');
$this->db->join('proveedor p', 'p.id = l.transportista');
$this->db->where('l.id', $id);
$q = $this->db->get('');
if ($q->num_rows() >0 ) return $q;//->result();

}


public function obtener_liquidaciones(){
$this->db->select('l.id as id, p.nombre_apellido as transportista, l.fecha');
$this->db->from('liquidacion l');
$this->db->join('proveedor p', 'p.id = l.transportista');
$q = $this->db->get('');
if ($q->num_rows() >0 ) return $q;//->result();
}



function eliminar_liquidacion($id)
	{
		$this->db->where('id =', $id);
		$this->db->delete('liquidacion');

		$errors = $this->db->error();
		//error 1451: significa que no se pudo eliminar la entidad por problemas de foreign key
		return $errors['code'];	
	}



public function editar_liquidacion($id, $data)
{
	$this->db->set('nombre', $data['nombre']);
	$this->db->set('tipo_cuenta', $data['tipo_cuenta']);
	$this->db->set('banco', $data['banco']);
	$this->db->set('titular', $data['titular']);
	$this->db->where('id', $id);
	$this->db->update('cuenta');	
}


}


?>