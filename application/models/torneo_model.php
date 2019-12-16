<?php

if (! defined('BASEPATH')) exit('No direct script access allowed');

class Torneo_model extends CI_Model {
	
	function __construct(){
		parent::__construct();
		$this->load->database();

	}

	function crearTorneo($data){
		$this->db->insert('torneo', array('nombre'=>$data['nombre'], 'lugar'=>$data['lugar'],
			'superdivision'=>$data['superdivision'], 'primera'=>$data['primera'], 'segunda'=>$data['segunda'], 'tercera'=>$data['tercera'], 'cuarta'=>$data['cuarta'], 'quinta'=>$data['quinta'],'activo'=>$data['activo'], 'estado'=>$data['estado'], 'cant_mesas'=>$data['cant_mesas'], 'usuario'=>$data['usuario']
			));

	}


	function crear_jugador($data){
		$this->db->insert('jugador', array('nombre'=>$data['nombre'], 'apellido'=>$data['apellido'],
			'dni'=>$data['dni'], 'email'=>$data['email'], 'telefono'=>$data['telefono'], 'fecha_nac'=>$data['fecha_nac'], 'categoria'=>$data['categoria'], 'activo'=>$data['activo'], 'provincia'=>$data['provincia'], 'ciudad'=>$data['ciudad'], 'usuario'=>$data['usuario'], 'club'=>$data['club'],'habilitado'=>$data['habilitado']
			));

	}

	function crear_club($data){
		$this->db->insert('club', array('nombre'=>$data['nombre'],'direccion'=>$data['direccion'], 'mail'=>$data['email'], 'telefono'=>$data['telefono'], 
			'responsable'=>$data['responsable'],'provincia'=>$data['provincia'],'ciudad'=>$data['ciudad'],
			));

	}


	function obtenerTorneo(){		
		$query = $this->db->get('torneo');
		if ($query->num_rows() >0 ) return $query;
	}

	public function obtener_clubes(){
		$this->db->select('*');
		$this->db->from('club t');		
		$q = $this->db->get('');
		if ($q->num_rows() >0 ) return $q;//->result();
	}

	
	public function obtener_jugadores(){
		$this->db->select('t.id, t.dni, t.nombre, t.apellido, t.email, t.telefono, c.nombre as categoria, t.provincia, t.ciudad');
		$this->db->from('jugador t');		
		$this->db->join('categoria as c', 'c.id=t.categoria');
		$q = $this->db->get('');
		if ($q->num_rows() >0 ) return $q;//->result();
	}

	public function obtener_jugador($id)
	{	$this->db->select('j.id, j.dni, CONCAT(j.nombre,", ", j.apellido) as jugador, c.nombre as categoria, c.id as id_categoria');
	    $this->db->where('j.id =', $id);    
	    $this->db->join('categoria as c', 'c.id=j.categoria');
	    $this->db->from('jugador as j');
	    $q= $this->db->get('');
	    if ($q->num_rows() >0 ) return $q;//->result();
	}

	function crearInscripcion($data, $torneo, $categoria){		
		$this->db->insert('inscripcion', array('jugador'=>$data['jugador'], 'categoria'=>$categoria, 'torneo'=>$torneo, 'comentario'=>$data['comentario']));
	}


	function obtenerInscripcion($torneo, $categoria){
		$this->db->select('p.id, j.id as id_jugador, j.nombre as jugador');
		$this->db->where('p.torneo =', $torneo);    
		$this->db->where('p.categoria =', $categoria);    
		$this->db->join('jugador as j', 'j.id=p.jugador');    
		$this->db->from('inscripcion as p');    
		$query = $this->db->get();
		if ($query->num_rows() >0 ) return $query;//->result();
			}



	function buscar_inscriptos($torneo, $categoria){
		$this->db->select('p.id as id, j.dni as dni, CONCAT(j.nombre,", ", j.apellido) as jugador, c.nombre as categoria');
		$this->db->where('p.torneo =', $torneo);    
		$this->db->where('p.categoria =', $categoria);    
		$this->db->join('jugador as j', 'j.id=p.jugador');
		$this->db->join('categoria as c', 'c.id=j.categoria');    
		$this->db->from('inscripcion as p');    
		$query = $this->db->get();
		if ($query->num_rows() >0 ) return $query;//->result();
			}
		


	public function obtenerTorneoActual()
	{
		$usuario = $this->session->userdata('id_usuario');		
		$this->db->where('usuario = ', $usuario);
	    $this->db->where('activo =', TRUE);    
	    $q= $this->db->get('torneo');
	    if ($q->num_rows() >0 ) return $q;//->result();
	}
	

	function crearZona($data){
		
		$this->db->insert('zona', array('letra'=>$data['letra'], 'torneo'=>$data['torneo'], 'categoria'=>$data['categoria'], 
			'jugador1'=>$data['jugador1'], 'jugador2'=>$data['jugador2'], 'jugador3'=>$data['jugador3'], 
			'jugador4'=>$data['jugador4'], 'jugador5'=>$data['jugador5'], 'estado'=>$data['estado']));

	}


	function obtenerZonas($torneo, $categoria){

		$this->db->select('p.id, p.letra, p.estado, j1.id as id_jugador1, j2.id as id_jugador2, j3.id as id_jugador3, CONCAT(j1.nombre,", ", j1.apellido) as jugador1, CONCAT(j2.nombre,", ", j2.apellido) as jugador2, 
			CONCAT(j3.nombre,", ", j3.apellido) as jugador3, p.pos1, p.pos2, p.pos3');
		$this->db->where('p.torneo =', $torneo);    
		$this->db->where('p.categoria =', $categoria);    		
		$this->db->join('jugador as j1', 'j1.id = p.jugador1');
		$this->db->join('jugador as j2', 'j2.id = p.jugador2');
		$this->db->join('jugador as j3', 'j3.id = p.jugador3');
		//$this->db->join('jugador as j4', 'j4.id = p.jugador4');
		$this->db->from('zona as p'); 
		$query = $this->db->get();
		if ($query->num_rows() >0 ) return $query;//->result();

			}


	function obtener_llave($torneo, $categoria, $instancia){
		
		$this->db->select('p.id, CONCAT(j1.nombre,", ", j1.apellido) as jugador, p.resultado, p.torneo, p.instancia, c.nombre as categoria, p.orden');
		$this->db->where('p.torneo =', $torneo);    
		$this->db->where('p.categoria =', $categoria);
		$this->db->where('p.instancia =', $instancia);
		$this->db->from('llave as p'); 
		$this->db->join('jugador as j1', 'j1.id = p.jugador');   
		$this->db->join('categoria as c', 'c.id = p.categoria');   
		$this->db->order_by('p.orden', 'ASC');
		$query = $this->db->get();
		if ($query->num_rows() >0 ) return $query;//->result();

		}

	function crear_llave($data){
		
		$this->db->insert('llave', array('jugador'=>$data['jugador'], 'torneo'=>$data['torneo'],'instancia'=>$data['instancia'],'categoria'=>$data['categoria'], 'orden'=>$data['orden']
			, 'bye'=>$data['bye'])); 
	}


	function guardarPartido($data){
		$this->db->where('id', $data['id']);
		$this->db->update('partido', array('set11'=>$data['set11'], 'set12'=>$data['set12'],
		'set13'=>$data['set13'],'set14'=>$data['set14'],'set15'=>$data['set15'], 'resultado1'=>$data['resultado1'],

		'set21'=>$data['set21'],'set22'=>$data['set22'],'set23'=>$data['set23'],'set24'=>$data['set24'],
		'set25'=>$data['set25'], 'resultado2'=>$data['resultado2'], 'estado'=>$data['estado'])); 
	}


	function guardarZona($data){
		$this->db->where('id', $data['id']);
		$this->db->update('zona', array('pos1'=>$data['pos1'], 'pos2'=>$data['pos2'],
		'pos3'=>$data['pos3'],'pos4'=>$data['pos4'],'estado'=>$data['estado'])); 
	}


	function obtenerPartidos($torneo, $categoria, $tipo){
		
		if ($tipo == 'ZONA')   
			$this->db->select('p.id, CONCAT(j1.nombre,", ", j1.apellido) as jugador1,CONCAT(j2.nombre,", ", j2.apellido) as jugador2, p.set11, p.set12, p.set13, p.set14, p.set15, p.set21, p.set22, p.set23, p.set24, p.set25, p.resultado1, p.resultado2, z.letra as zona, p.estado');
		if ($tipo == 'LLAVE')   
			$this->db->select('p.id, CONCAT(j1.nombre,", ", j1.apellido) as jugador1, CONCAT(j2.nombre,", ", j2.apellido) as jugador2, p.set11, p.set12, p.set13, p.set14, p.set15, p.set21, p.set22, p.set23, p.set24, p.set25, p.resultado1, p.resultado2, p.estado');
		$this->db->from('partido as p');
		$this->db->where('p.torneo =', $torneo);    
		$this->db->where('p.categoria =', $categoria); 
		$this->db->where('p.tipo =', $tipo); 
		$this->db->join('jugador as j1', 'j1.id = p.jugador1');
		$this->db->join('jugador as j2', 'j2.id = p.jugador2');
		if ($tipo == 'ZONA')
			$this->db->join('zona as z', 'z.id = p.id_zona');
		
		$query = $this->db->get();
		if ($query->num_rows() >0 ) return $query;//->result();

			}


	function obtener_partido_por_id($id){
		$this->db->select('p.id, j1.id as id_jugador1, j2.id as id_jugador2, CONCAT(j1.nombre,", ", j1.apellido) as jugador1, CONCAT(j2.nombre,", ", j2.apellido) as jugador2, p.set11, p.set12, p.set13, p.set14, p.set15, p.set21, p.set22, p.set23, p.set24, p.set25, p.resultado1, p.resultado2, p.estado, p.tipo, p.id_llave1, p.id_llave2, p.categoria, p.torneo');
		$this->db->join('jugador as j1', 'j1.id = p.jugador1');
		$this->db->join('jugador as j2', 'j2.id = p.jugador2');
		$this->db->from('partido as p');
		$this->db->where('p.id =', $id);    		
		$query = $this->db->get();
		if ($query->num_rows() >0 ) return $query->result();

			}	

	function obtener_zona_por_id($id){

		$this->db->select('p.id, p.letra, p.estado, p.torneo, p.categoria, j1.id as id_jugador1, j2.id as id_jugador2, j3.id as id_jugador3, CONCAT(j1.nombre,", ", j1.apellido) as jugador1, CONCAT(j2.nombre,", ", j2.apellido) as jugador2, 
			CONCAT(j3.nombre,", ", j3.apellido) as jugador3');
		$this->db->where('p.id =', $id);    
		$this->db->join('jugador as j1', 'j1.id = p.jugador1');
		$this->db->join('jugador as j2', 'j2.id = p.jugador2');
		$this->db->join('jugador as j3', 'j3.id = p.jugador3');			
		$this->db->from('zona as p');
		$query = $this->db->get();
		if ($query->num_rows() >0 ) return $query->result();

			}			


	function obtener_cabezas_rating($id_inscriptos, $cant_cabezas, $categoria){
		$this->db->where_in('jugador', $id_inscriptos);
		$this->db->order_by('puntaje_posterior', 'DESC');    	
		$this->db->limit($cant_cabezas);	
		$query = $this->db->get('rating');
		if ($query->num_rows() >0 ) return $query->result();

			}


	function crear_partido($data){		
		$this->db->insert('partido', array('jugador1'=>$data['jugador1'], 'jugador2'=>$data['jugador2'],
		'cant_sets'=>$data['cant_sets'],'estado'=>$data['estado'],'torneo'=>$data['torneo'],
		'categoria'=>$data['categoria'],'tipo'=>$data['tipo'],'id_zona'=>$data['id_zona'],
		'id_llave1' => $data['id_llave1'], 'id_llave2' => $data['id_llave2'])); 
	}



	function obtener_ranking($categoria){
		   
		$this->db->select('p.posicion, j1.nombre as nombre, j1.apellido as apellido, p.puntos');
		if ($categoria == 0)
			$this->db->from('ranking_sd as p');				
		if ($categoria == 1)
			$this->db->from('ranking_primera as p');				
		if ($categoria == 2)
			$this->db->from('ranking_segunda as p');				
		if ($categoria == 3)
			$this->db->from('ranking_tercera as p');				
		if ($categoria == 4)
			$this->db->from('ranking_cuarta as p');	
		if ($categoria == 5)
			$this->db->from('ranking_quinta as p');				
		$this->db->join('jugador as j1', 'j1.id = p.jugador');		
		$this->db->order_by('p.puntos', 'DESC'); 
		
		$query = $this->db->get();
		if ($query->num_rows() >0 ) return $query;//->result();

			}
		

		function obtener_categorias_habilitadas($categoria){
		 
		$this->db->from('categoria');	
		$this->db->where('id <', $categoria);			
		
		$query = $this->db->get();
		if ($query->num_rows() >0 ) return $query;//->result();

			}
		

	function obtener_rating(){
		   
		$this->db->select('CONCAT(j1.nombre,", ", j1.apellido) as jugador, p.puntaje_anterior, p.sd, p.primera, p.segunda, p.tercera, p.cuarta, p.quinta, p.puntaje_posterior');
		$this->db->from('rating as p');				
		$this->db->join('jugador as j1', 'j1.id = p.jugador');		
		$this->db->order_by('p.puntaje_posterior', 'DESC'); 
		
		$query = $this->db->get();
		if ($query->num_rows() >0 ) return $query;//->result();

			}


	function obtener_puntaje_rating(){
				
		$this->db->from('puntaje_rating');								
		$this->db->order_by('id', 'ASC'); 
		
		$query = $this->db->get();
		if ($query->num_rows() >0 ) return $query;//->result();

			}
		

	function obtener_categorias_rating(){
				
		$this->db->from('categoria_rating');								
		$this->db->order_by('id', 'ASC'); 
		
		$query = $this->db->get();
		if ($query->num_rows() >0 ) return $query;//->result();

			}	


	function obtener_plantilla(){
				
		$this->db->from('template_llave');								
		$this->db->order_by('id', 'ASC'); 
		
		$query = $this->db->get();
		if ($query->num_rows() >0 ) return $query;//->result();

			}




	function obtener_plantilla_completa($cant_jugadores){
		$this->db->where('cantidad_jugadores =', $cant_jugadores);			
		$this->db->from('template_llave');								
		$this->db->order_by('id', 'ASC'); 
		
		$query = $this->db->get();
		if ($query->num_rows() >0 ) return $query;//->result();

			}


	function obtener_plantilla_con_byes($cant_jugadores){
		$this->db->where('cantidad_jugadores =', $cant_jugadores);	
		$this->db->where('posicion_zona =', "bye");			
		$this->db->from('template_llave');								
		$this->db->order_by('id', 'ASC'); 
		
		$query = $this->db->get();
		if ($query->num_rows() >0 ) return $query;//->result();

			}		


	function obtener_cant_inscriptos($id_torneo, $categoria)
	{
		$this->db->where('categoria =', $categoria);
		$this->db->where('torneo =', $id_torneo); 
		$this->db->from('inscripcion');
		return $this->db->count_all_results();		
	}

	function esta_inscripto($id_torneo, $categoria, $id_jugador)
	{
		$this->db->where('categoria =', $categoria);
		$this->db->where('torneo =', $id_torneo); 
		$this->db->where('jugador =', $id_jugador); 
		$this->db->from('inscripcion');
		$query = $this->db->get();
		if ($query->num_rows() >0 ) return TRUE;
		else return FALSE;
	}


	function obtener_llave_por_id($id_llave)
	{
				
		$this->db->where('id =', $id_llave);    		
		$query = $this->db->get('llave');
		if ($query->num_rows() >0 ) return $query->result();
	}

	function obtener_llave_oponente ($torneo, $categoria, $instancia, $orden)
	{
		$this->db->where('torneo =', $torneo);
		$this->db->where('categoria =', $categoria);
		$this->db->where('instancia =', $instancia);
		$this->db->where('orden =', $orden);   
		$query = $this->db->get('llave');
		if ($query->num_rows() >0 ) return $query->result();
	}




	function obtener_posicion_plantilla($cant_jugadores, $posicion_zona){
		$this->db->select('posicion');
		$this->db->where('cantidad_jugadores =', $cant_jugadores);		
		$this->db->where('posicion_zona =', $posicion_zona);			
		$this->db->from('template_llave');										
		
		$query = $this->db->get();
		if ($query->num_rows() >0 ) return $query->result();

			}



	function obtener_posicion_jugador_zona($id_zona, $puesto)
	{
		if ($puesto==1)
			$this->db->select('jugador1 as id');
		if ($puesto==2)
			$this->db->select('jugador2 as id');
		if ($puesto==3)
			$this->db->select('jugador3 as id');
		if ($puesto==4)
			$this->db->select('jugador4 as id');
		$this->db->where('id = ',$id_zona);
		$this->db->from('zona');										

		$query = $this->db->get();
		if ($query->num_rows() >0 ) return $query->result();

	}


	function eliminar_torneo($id)
	{
		$this->db->where('id =', $id);
		$this->db->delete('torneo');
	}

	function eliminar_inscripcion($id)
	{
		$this->db->where('id =', $id);
		$this->db->delete('inscripcion');
	}

	function eliminar_mesas($id)
	{
		$this->db->where('torneo =', $id);
		$this->db->delete('mesas');
	}

	function eliminar_jugador($id)
	{
		$this->db->where('id =', $id);
		$this->db->delete('jugador');
	}

	function eliminar_club($id)
	{
		$this->db->where('id =', $id);
		$this->db->delete('club');
	}


	function desactivar_torneos($usuario)
	{
		$this->db->where('usuario =', $usuario);	
		$this->db->update('torneo', array('activo'=>FALSE));
	}

	function activar_torneo($id)
	{
		$this->db->where('id =', $id);
		$this->db->update('torneo', array('activo'=>TRUE));
	}



	function crear_zona_unica($data)
	{
		$this->db->insert('zona_unica_sd', array('jugador1'=>$data['jugador1'], 'jugador2'=>$data['jugador2'], 'jugador3'=>$data['jugador3'], 'jugador4'=>$data['jugador4'],
			'jugador5'=>$data['jugador5'], 'jugador6'=>$data['jugador6'], 'cant_jugadores'=>$data['cant_jugadores'],'estado'=>$data['estado'],'torneo'=>$data['torneo'])); 
	}


	function crear_mesas($cant_mesas, $torneo)
	{
		for($i=0; $i<$cant_mesas; $i++)
		{
			$this->db->insert('mesas', array('nro_mesa'=>$i+1, 'torneo'=>$torneo, 'estado'=>"LIBRE")); 
		}
	}


	function obtener_mesas($torneo)
	{				
		$this->db->where('torneo =', $torneo);    		
		$query = $this->db->get('mesas');
		if ($query->num_rows() >0 ) return $query;
	}


	function eliminar_zonas_torneo($id_torneo)
	{
		$this->db->where('torneo =', $id_torneo);
		$this->db->delete('zona');
	}



	function eliminar_llave_torneo($id_torneo)
	{
		$this->db->where('torneo =', $id_torneo);
		$this->db->delete('llave');
	}



	function eliminar_partidos_torneo($id_torneo)
	{
		$this->db->where('torneo =', $id_torneo);
		$this->db->delete('partido');
	}


	function verificar_jugador_repetido($dni)
	{		
		$this->db->where('dni = ',$dni);
		$this->db->from('jugador');										

		$query = $this->db->get();
		if ($query->num_rows() >0 ) return TRUE;
			else
				return FALSE;
	}

}




?>