<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turnos_model extends CI_Model{



public function __construct()
{
  parent::__construct();
}




function crear_turno($data){
		
		$this->db->insert('turnos', 
			array(	'fecha'=>$data['fecha'], 
					'usuario'=>$data['usuario'], 
					'paciente'=>$data['paciente'], 
					'profesional'=>$data['profesional'], 
					'estado'=>$data['estado']
					));
	}





public function obtener_turno($id){

$this->db->select('t.fecha as fecha, u.username as usuario, p.nombre as paciente, g.nombre as profesional, t.estado');
$this->db->from('turnos t');
$this->db->join('paciente p', 'p.id = t.paciente');
$this->db->join('profesional g', 'g.id = t.profesional');
$this->db->join('usuario u', 'u.id = t.usuario');
$this->db->where('t.id', $id);
$q = $this->db->get('');
//$q = $this->db->get('cheque_propio');
if ($q->num_rows() >0 ) return $q;//->result();

}


public function obtener_turnos(){
$this->db->select('t.fecha as fecha, u.username as usuario, p.nombre as paciente, g.nombre as profesional, t.estado');
$this->db->from('turnos t');
$this->db->join('paciente p', 'p.id = t.paciente');
$this->db->join('profesional g', 'g.id = t.profesional');
$this->db->join('usuario u', 'u.id = t.usuario');
$this->db->order_by("t.fecha", "desc");
$q = $this->db->get('');
if ($q->num_rows() >0 ) return $q;//->result();
}



public function obtener_turnos_disponibles($id_profesional, $fecha_inicio){
$this->db->select('TIME(t.fecha) as fecha, g.nombre as profesional, t.id');
$this->db->from('turnos t');
$this->db->join('profesional g', 'g.id = t.profesional');

$this->db->where('t.fecha >=', $fecha_inicio);
$this->db->where('t.estado', 'LIBRE');
$this->db->order_by("t.fecha", "asc");
$q = $this->db->get('');
if ($q->num_rows() >0 ) return $q;//->result();
}



function eliminar_turno($id)
	{
		$this->db->where('id =', $id);
		$this->db->delete('turnos');

		$errors = $this->db->error();
		//error 1451: significa que no se pudo eliminar la entidad por problemas de foreign key
		return $errors['code'];	
	}



	public function obtener_especialidades()
	{	
		$this->db->from('especialidad');		
		$q = $this->db->get('');
		if ($q->num_rows() >0 ) return $q;//->result();
	}


	public function obtener_profesionales()
	{			
		$this->db->from('profesional');		
		$q = $this->db->get('');
		if ($q->num_rows() >0 ) return $q;//->result();
	}

	public function obtener_profesional($id)
	{			
		$this->db->where('id= ', $id);
		$this->db->from('profesional');		
		$q = $this->db->get('');
		if ($q->num_rows() >0 ) return $q;//->result();
	}


	function fetch_profesional($especialidad_id)
	 {
		  $this->db->where('especialidad =', $especialidad_id);
		  $this->db->order_by('nombre', 'ASC');
		  $query = $this->db->get('profesional');		  
		  return $query;
	 }


	 public function confirmar_turno($turno)
{
	$this->db->set('usuario', $turno['usuario']);
	$this->db->set('paciente', $turno['paciente']);	
	$this->db->where('id', $turno['id_turno']);
	$this->db->update('turnos');	
}

}


?>