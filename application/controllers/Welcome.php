<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */



	function __construct(){
		parent::__construct();
		$this->load->model('torneo_model');

	}

	public function index()
	{
		$torneo = $this->torneo_model->obtenerTorneoActual();		
		$data['nombre_torneo'] = $torneo->first_row()->nombre;
		
		$this->load->view('menu');
		$this->load->view('header', $data);
		$this->load->view('welcome_message');
	}



	public function llaves()
	{
		//obtengo el torneo activo actual
		$torneo = $this->torneo_model->obtenerTorneoActual();

		$row = $torneo->first_row();	

		$llave_32_primera=  $this->torneo_model->obtener_llave($row->id, 1, 32);
		$llave_16_primera=  $this->torneo_model->obtener_llave($row->id, 1, 16);
		$llave_8_primera=  $this->torneo_model->obtener_llave($row->id, 1, 8);
		$llave_4_primera=  $this->torneo_model->obtener_llave($row->id, 1, 4);
		$llave_2_primera=  $this->torneo_model->obtener_llave($row->id, 1, 2);


		$cant_inscriptos_sd= $this->torneo_model->obtener_cant_inscriptos($row->id, 0);
		$cant_inscriptos_primera= $this->torneo_model->obtener_cant_inscriptos($row->id, 1);
		$cant_inscriptos_segunda= $this->torneo_model->obtener_cant_inscriptos($row->id, 2);
		$cant_inscriptos_tercera= $this->torneo_model->obtener_cant_inscriptos($row->id, 3);
		$cant_inscriptos_cuarta= $this->torneo_model->obtener_cant_inscriptos($row->id, 4);
		
		$data['cant_inscriptos_sd']= $cant_inscriptos_sd;
		$data['cant_inscriptos_primera']= $cant_inscriptos_primera;
		$data['cant_inscriptos_segunda']= $cant_inscriptos_segunda;
		$data['cant_inscriptos_tercera']= $cant_inscriptos_tercera;
		$data['cant_inscriptos_cuarta']= $cant_inscriptos_cuarta;


		$data['llave_32_primera']= $this->completar_llave($cant_inscriptos_primera, $llave_32_primera);
		$data['llave_16_primera']= $this->completar_fase(8, $llave_16_primera);
		$data['llave_8_primera']= $this->completar_fase(4, $llave_8_primera);
		$data['llave_4_primera']= $this->completar_fase(2, $llave_4_primera);
		$data['llave_2_primera']= $this->completar_fase(1, $llave_2_primera);

		$t['nombre_torneo']=$row->nombre;
		$this->load->view('menu');		
		$this->load->view('header', $t);
		$this->load->view('llave', $data);
	}


	//completa los lugares de la llave que ya fueron definidos
	private function completar_llave($cant_inscriptos, $llave_incompleta)
	{		

		$template_llave= array();
		if ($cant_inscriptos>0)
			$template_llave = $this->torneo_model->obtener_plantilla_completa($cant_inscriptos)->result();

		if (isset($llave_incompleta))
		{
			$llave_incompleta= $llave_incompleta->result();
			for ($i=0; $i<sizeof($llave_incompleta); $i++)
			{
				$template_llave[$llave_incompleta[$i] -> orden -1] -> posicion_zona = $llave_incompleta[$i] -> jugador;
			}
		}
			
		return $template_llave;
	}


	private function completar_fase($fase, $llave)
	{
		$completa=array();
		$contador=0;

		if (isset($llave))
			$llave_incompleta=$llave->result();
		else
			$llave_incompleta=array();

		for ($i=0; $i<$fase; $i++)
		{		
				
				if ($contador < sizeof($llave_incompleta) and $llave_incompleta[$contador]-> orden == $i+1)
				{	
					array_push($completa, $llave_incompleta[$contador]->jugador);				
					$contador++;							
				}
				else
				{					
					array_push($completa, "vacio");											
				}
			
		}

		//var_dump($completa);exit;

		return $completa;
	}


	public function crear_torneo()
	{
		$torneo = $this->torneo_model->obtenerTorneoActual();		
		$data['nombre_torneo'] = $torneo->first_row()->nombre;

		$this->load->view('menu');
		$this->load->view('header',$data);
		$this->load->view('crear_torneo');
	}


	public function inscripciones()
	{
		$torneo = $this->torneo_model->obtenerTorneoActual();		
		$data['nombre_torneo'] = $torneo->first_row()->nombre;

		$this->load->view('menu');
		$this->load->view('header', $data);
		$this->load->view('inscripciones');
	}

	public function zonas()
	{
		$torneo = $this->torneo_model->obtenerTorneoActual();

		$row = $torneo->first_row();	

		$zonas_sd=  $this->torneo_model->obtenerZonas($row->id, 0);
		$zonas_primera=  $this->torneo_model->obtenerZonas($row->id, 1);
		$zonas_segunda=  $this->torneo_model->obtenerZonas($row->id, 2);
		$zonas_tercera=  $this->torneo_model->obtenerZonas($row->id, 3);
		$zonas_cuarta=  $this->torneo_model->obtenerZonas($row->id, 4);
		
		$data= array();
		if (isset($zonas_sd))
		$data['zonas_sd']= $zonas_sd->result();

		if (isset($zonas_primera))
		$data['zonas_primera']= $zonas_primera->result();

		if (isset($zonas_segunda))
		$data['zonas_segunda']= $zonas_segunda->result();

		if (isset($zonas_tercera))
		$data['zonas_tercera']= $zonas_tercera->result();

		if (isset($zonas_cuarta))
		$data['zonas_cuarta']= $zonas_cuarta->result();
		
		$t['nombre_torneo']=$row->nombre;
		$this->load->view('menu');
		$this->load->view('header', $t);
		$this->load->view('zonas', $data);
	}


	public function partidos()
	{
		
		$torneo = $this->torneo_model->obtenerTorneoActual();
		$data=array();
		$row = $torneo->first_row();	

		$partidos_sd=  $this->torneo_model->obtenerPartidos($row->id, 0, 'ZONA');
		$partidos_primera=  $this->torneo_model->obtenerPartidos($row->id, 1, 'ZONA');
		$partidos_segunda=  $this->torneo_model->obtenerPartidos($row->id, 2, 'ZONA');
		$partidos_tercera=  $this->torneo_model->obtenerPartidos($row->id, 3, 'ZONA');
		$partidos_cuarta=  $this->torneo_model->obtenerPartidos($row->id, 4, 'ZONA');
		
		if (isset($partidos_sd))
		$data['partidos_sd']= $partidos_sd->result();

		if (isset($partidos_primera))
		$data['partidos_primera']= $partidos_primera->result();

		if (isset($partidos_segunda))
		$data['partidos_segunda']= $partidos_segunda->result();

		if (isset($partidos_tercera))
		$data['partidos_tercera']= $partidos_tercera->result();

		if (isset($partidos_cuarta))
		$data['partidos_cuarta']= $partidos_cuarta->result();

//var_dump($data);exit;

		$t['nombre_torneo']= $row->nombre;
		$this->load->view('menu');
		$this->load->view('header', $t);
		$this->load->view('partidos', $data);
	}


	public function buscarInscripciones()
	{
		$torneo = $this->torneo_model->obtenerTorneoActual();

		$row = $torneo->first_row();	

		$inscriptos_sd=  $this->torneo_model->obtenerInscripcion($row->id, 0);
		$inscriptos_primera=  $this->torneo_model->obtenerInscripcion($row->id, 1);
		$inscriptos_segunda=  $this->torneo_model->obtenerInscripcion($row->id, 2);
		$inscriptos_tercera=  $this->torneo_model->obtenerInscripcion($row->id, 3);
		$inscriptos_cuarta=  $this->torneo_model->obtenerInscripcion($row->id, 4);

		$data=array();
		if (isset($inscriptos_sd))
		$data['inscriptos_sd']= $inscriptos_sd->result();
		if (isset($inscriptos_primera))
		$data['inscriptos_primera']= $inscriptos_primera->result();
		if (isset($inscriptos_segunda))
		$data['inscriptos_segunda']= $inscriptos_segunda->result();
		if (isset($inscriptos_tercera))
		$data['inscriptos_tercera']= $inscriptos_tercera->result();
		if (isset($inscriptos_cuarta))
		$data['inscriptos_cuarta']= $inscriptos_cuarta->result();

		$t['nombre_torneo']= $row->nombre;
		$this->load->view('menu');
		$this->load->view('header', $t);
		$this->load->view('inscriptos', $data);
	}


	public function buscar_torneos()
	{
		$torneos = $this->torneo_model->obtenerTorneo();
		if (isset($torneos))
		$data['torneos']=$torneos->result();


		$torneo = $this->torneo_model->obtenerTorneoActual();
		$row = $torneo->first_row();
		$t['nombre_torneo']= $row->nombre;
		$this->load->view('menu');
		$this->load->view('header', $t);
		$this->load->view('buscar_torneos', $data);
	}


	public function editarPartido()
	{
		
		$id_partido = $this->uri->segment(3);
		
		$partido_en_cuestion=  $this->torneo_model->obtener_partido_por_id($id_partido);
		$data['id_partido']=$id_partido;
		$data['jugador1']= $partido_en_cuestion[0]->jugador1;
		$data['jugador2']= $partido_en_cuestion[0]->jugador2;
		$data['tipo']= $partido_en_cuestion[0]->tipo;
		//var_dump($data_id);exit;

		$torneo = $this->torneo_model->obtenerTorneoActual();		
		$t['nombre_torneo'] = $torneo->first_row()->nombre;
		$this->load->view('menu');
		$this->load->view('header', $t);
		$this->load->view('editar_partido', $data);
	}

	public function editarZona()
	{
		
		$id_zona = $this->uri->segment(3);
		
		$zona_en_cuestion=  $this->torneo_model->obtener_zona_por_id($id_zona);
		$data['id_zona']=$id_zona;
		$data['jugador1']= $zona_en_cuestion[0]->jugador1;
		$data['jugador2']= $zona_en_cuestion[0]->jugador2;
		$data['jugador3']= $zona_en_cuestion[0]->jugador3;
		$data['jugador4']= $zona_en_cuestion[0]->jugador4;
		
		//var_dump($data_id);exit;
		$torneo = $this->torneo_model->obtenerTorneoActual();		
		$t['nombre_torneo'] = $torneo->first_row()->nombre;
		$this->load->view('menu');
		$this->load->view('header', $t);
		$this->load->view('editar_zona', $data);
	}


	public function ranking()
	{
		
		//$torneo = $this->torneo_model->obtenerTorneoActual();

		//$row = $torneo->first_row();	

		$ranking_sd=  $this->torneo_model->obtener_ranking(0);
		$ranking_primera=  $this->torneo_model->obtener_ranking(1);
		$ranking_segunda=  $this->torneo_model->obtener_ranking(2);
		$ranking_tercera=  $this->torneo_model->obtener_ranking(3);
		$ranking_cuarta=  $this->torneo_model->obtener_ranking(4);
		
		if (isset($ranking_sd))
		$data['ranking_sd']= $ranking_sd->result();

		if (isset($ranking_primera))
		$data['ranking_primera']= $ranking_primera->result();

		if (isset($ranking_segunda))
		$data['ranking_segunda']= $ranking_segunda->result();

		if (isset($ranking_tercera))
		$data['ranking_tercera']= $ranking_tercera->result();

		if (isset($ranking_cuarta))
		$data['ranking_cuarta']= $ranking_cuarta->result();

//var_dump($data);exit;
		$torneo = $this->torneo_model->obtenerTorneoActual();		
		$t['nombre_torneo'] = $torneo->first_row()->nombre;
		$this->load->view('menu');
		$this->load->view('header', $t);
		$this->load->view('ranking', $data);
	}



	public function plantilla_llaves()
	{
		
		$plantilla=  $this->torneo_model->obtener_plantilla();

		if (isset($plantilla))
		$data['plantilla']= $plantilla->result();

		$torneo = $this->torneo_model->obtenerTorneoActual();		
		$t['nombre_torneo'] = $torneo->first_row()->nombre;
		$this->load->view('menu');
		$this->load->view('header', $t);
		$this->load->view('plantilla_llaves', $data);
	}





	public function partidos_de_llave()
	{
		
		$torneo = $this->torneo_model->obtenerTorneoActual();
		$data=array();
		$row = $torneo->first_row();	

		$partidos_sd=  $this->torneo_model->obtenerPartidos($row->id, 0, 'LLAVE');
		$partidos_primera=  $this->torneo_model->obtenerPartidos($row->id, 1, 'LLAVE');
		$partidos_segunda=  $this->torneo_model->obtenerPartidos($row->id, 2, 'LLAVE');
		$partidos_tercera=  $this->torneo_model->obtenerPartidos($row->id, 3, 'LLAVE');
		$partidos_cuarta=  $this->torneo_model->obtenerPartidos($row->id, 4, 'LLAVE');
		
		if (isset($partidos_sd))
		$data['partidos_sd']= $partidos_sd->result();

		if (isset($partidos_primera))
		$data['partidos_primera']= $partidos_primera->result();

		if (isset($partidos_segunda))
		$data['partidos_segunda']= $partidos_segunda->result();

		if (isset($partidos_tercera))
		$data['partidos_tercera']= $partidos_tercera->result();

		if (isset($partidos_cuarta))
		$data['partidos_cuarta']= $partidos_cuarta->result();

//var_dump($data);exit;
		$t['nombre_torneo']= $row->nombre;
		$this->load->view('menu');
		$this->load->view('header', $t);
		$this->load->view('partidos_de_llave', $data);
	}


	public function eliminar_torneo()
	{
		$id_torneo = $this->uri->segment(3);

		$this->torneo_model->eliminar_torneo($id_torneo);

		redirect('Welcome/buscar_torneos');
	}

	public function activar_torneo()
	{
		$id_torneo = $this->uri->segment(3);
		$this->torneo_model->desactivar_torneos();
		$this->torneo_model->activar_torneo($id_torneo);

		redirect('Welcome/buscar_torneos');
	}

}
