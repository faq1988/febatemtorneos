<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Torneoscontroller extends CI_Controller {

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


	public function crear_torneo()
	{
		$juega_sd= $this->input->post('juega_sd');		
		$juega_primera= $this->input->post('juega_primera');		
		$juega_segunda= $this->input->post('juega_segunda');		
		$juega_tercera= $this->input->post('juega_tercera');		
		$juega_cuarta= $this->input->post('juega_cuarta');		
		$juega_quinta= $this->input->post('juega_quinta');		
		
		$sd=FALSE;
		$primera=FALSE;
		$segunda=FALSE;
		$tercera=FALSE;
		$cuarta=FALSE;
		$quinta=FALSE;

    	if ($juega_sd==2)
     		$sd=TRUE;
     	if ($juega_primera==2)
     		$primera=TRUE;
     	if ($juega_segunda==2)
     		$segunda=TRUE;
     	if ($juega_tercera==2)
     		$tercera=TRUE;
     	if ($juega_cuarta==2)
     		$cuarta=TRUE;
     	if ($juega_quinta==2)
     		$quinta=TRUE;

		
			$data = array(		    
			'nombre' => $this->input->post('nombre'),
			'lugar' => $this->input->post('lugar'),
			'usuario' => $this->session->userdata('id_usuario'), 
			'cant_mesas' => $this->input->post('cant_mesas'),
			'superdivision' => $sd,
			'primera' => $primera,
			'segunda' => $segunda,
			'tercera' => $tercera,
			'cuarta' => $cuarta,
			'quinta' => $quinta,
			'activo' => TRUE,		
			'estado' => "CREADO",	
			'habilitadas' => $this->input->post('habilitadas'),
			'costo_inscripcion' => $this->input->post('costo_inscripcion'),
			'costo_afiliacion' => $this->input->post('costo_afiliacion'),
			'cant_set_zona' => 3,
			'cant_set_llave' => 3,
			);

			$this->torneo_model->desactivar_torneos($this->session->userdata('id_usuario'));
			
			$this->torneo_model->crearTorneo($data);
			$torneo= $this->torneo_model->obtenerTorneoActual();
			$this->torneo_model->crear_mesas($data['cant_mesas'], $torneo->first_row()->id);

			$this->definir_cant_set($torneo);
			
			redirect('Welcome/torneos');
	}


	private function definir_cant_set($torneo){
		
		$data = array(
				'torneo' => $torneo->first_row()->id,
				'zona' => -1,
				'trentidosavos' => -1,
				'dieciseisavos' => -1,
				'octavos' => -1,
				'cuartos' => -1,
				'semi' => -1,
				'final' => -1,
			);

		if ($torneo->first_row()->superdivision)
		{
			$data['categoria'] = 0;
			$this->torneo_model->crear_cant_set($data);
		}
		if ($torneo->first_row()->primera)
		{
			$data['categoria'] = 1;
			$this->torneo_model->crear_cant_set($data);
		}
		if ($torneo->first_row()->segunda)
		{
			$data['categoria'] = 2;
			$this->torneo_model->crear_cant_set($data);
		}
		if ($torneo->first_row()->tercera)
		{
			$data['categoria'] = 3;
			$this->torneo_model->crear_cant_set($data);
		}
		if ($torneo->first_row()->cuarta)
		{
			$data['categoria'] = 4;
			$this->torneo_model->crear_cant_set($data);
		}
		if ($torneo->first_row()->quinta)
		{
			$data['categoria'] = 5;
			$this->torneo_model->crear_cant_set($data);
		}	

	}



	public function crear_inscripcion()
	{
		//obtengo el torneo activo actual
		$torneo = $this->torneo_model->obtenerTorneoActual();		
		$row = $torneo->first_row();	

		$categorias= $this->input->post('categorias');		
		
		$data = array(		    			
			'categoria' => $this->input->post('categoria'),	
			'comentario' => $this->input->post('comentario'),
			'jugador' => $this->input->post('id_jugador'),			
			);


		if($this->torneo_model->figura_en_rating($data['jugador'])==FALSE)
		{
			$this->session->set_flashdata('error', 'Ha ocurrido un error, el jugador aun no figura en el rating');
			redirect('Welcome/inscripcion');
		}

		if (isset($categorias)){
             for($i=0; $i<sizeof($categorias); $i++)
             {
             	if ($categorias[$i]==0)
             	{             		
             		if ($this->torneo_model->esta_inscripto($row->id, 0, $data['jugador'])==FALSE)
             			$this->torneo_model->crearInscripcion($data, $row->id, 0);
             		else
             		{
             			$this->session->set_flashdata('error', 'Ha ocurrido un error, el jugador ya se encontraba inscripto en categoría SD');
						redirect('Welcome/inscripcion');
             		}
             	}
             	if ($categorias[$i]==1)
             	{
             		if ($this->torneo_model->esta_inscripto($row->id, 1, $data['jugador'])==FALSE)
             			$this->torneo_model->crearInscripcion($data, $row->id, 1);
             		else
             		{
             			$this->session->set_flashdata('error', 'Ha ocurrido un error, el jugador ya se encontraba inscripto en categoría Primera');
						redirect('Welcome/inscripcion');
             		}
             	}
             	if ($categorias[$i]==2)
             	{
             		if ($this->torneo_model->esta_inscripto($row->id, 2, $data['jugador'])==FALSE)
             			$this->torneo_model->crearInscripcion($data, $row->id, 2);
             		else
             		{
             			$this->session->set_flashdata('error', 'Ha ocurrido un error, el jugador ya se encontraba inscripto en categoría Segunda');
						redirect('Welcome/inscripcion');
             		}
             	}
             	if ($categorias[$i]==3)
             	{
             		if ($this->torneo_model->esta_inscripto($row->id, 3, $data['jugador'])==FALSE)
             			$this->torneo_model->crearInscripcion($data, $row->id, 3);
             		else
             		{
             			$this->session->set_flashdata('error', 'Ha ocurrido un error, el jugador ya se encontraba inscripto en categoría Tercera');
						redirect('Welcome/inscripcion');
             		}
             	}
             	if ($categorias[$i]==4)
             	{
             		if ($this->torneo_model->esta_inscripto($row->id, 4, $data['jugador'])==FALSE)
             			$this->torneo_model->crearInscripcion($data, $row->id, 4);
             		else
             		{
             			$this->session->set_flashdata('error', 'Ha ocurrido un error, el jugador ya se encontraba inscripto en categoría Cuarta');
						redirect('Welcome/inscripcion');
             		}
             	}
             	if ($categorias[$i]==5)
             	{
             		if ($this->torneo_model->esta_inscripto($row->id, 5, $data['jugador'])==FALSE)
             			$this->torneo_model->crearInscripcion($data, $row->id, 5);
             		else
             		{
             			$this->session->set_flashdata('error', 'Ha ocurrido un error, el jugador ya se encontraba inscripto en categoría Quinta');
						redirect('Welcome/inscripcion');
             		}
             	}
             }
         }		
         else{
         	$this->session->set_flashdata('error', 'La inscripcion no fue aceptada, no ha indicado en que categoria inscribir al jugador');
			redirect('Welcome/inscripcion');
         }	

         	$this->session->set_flashdata('success', 'La inscripción fué procesada correctamente');
			redirect('Welcome/inscripcion');
	}



	public function armar_zonas()
	{
		//obtengo el torneo activo actual
		$torneo = $this->torneo_model->obtenerTorneoActual();
		$resumen="";
		$cantPrimera=0;
		
		$id_categoria = $this->uri->segment(3);
		$row = $torneo->first_row();

		if ($this->torneo_model->existen_zonas_sembradas($row->id, $id_categoria))
		{
			$this->session->set_flashdata('error', 'Ya existen zonas sembradas para la categoría elegida');
				redirect('Welcome/inscripcion');
		}


		if(isset($torneo))
		{
			//obtengo inscriptos al torneo actual
			$inscriptos=  $this->torneo_model->obtenerInscripcion($row->id, $id_categoria);
			

			if (isset($inscriptos))
				$cantPrimera = sizeof($inscriptos->result());	

			if ($cantPrimera < 6)
			{
				$this->session->set_flashdata('error', 'Para cerrar inscripciones debe haber al menos 6 jugadores');
				redirect('Welcome/inscripcion');
			}

			$modulo = $cantPrimera % 3;
			$cantZonas3 = 0;
			$cantZonas4 = 0;			

			if($modulo == 0)
					{
						$division = $cantPrimera / 3;
						$cantZonas3 = $division;
						//$resumen= $resumen. "Para ". $cantPrimera." jugadores se armaron ". $cantZonas3." zonas de 3 y ". $cantZonas4." zonas de 4";
						//$resumen= $resumen. '</br>';

					}				
					else
						if ($modulo == 1)
						{
							$division = $cantPrimera / 3;
							$cantZonas3 = floor($division);
							$cantZonas3 = $cantZonas3-1;
							$cantZonas4 = 1; 
							//$resumen= $resumen. "Para ". $cantPrimera." jugadores se armaron ". $cantZonas3." zonas de 3 y ". $cantZonas4." zonas de 4";				
							//$resumen= $resumen. '</br>';
						}
						else
							if ($modulo == 2)
							{
								$division = $cantPrimera / 3;
								$cantZonas3 = floor($division);
								$cantZonas3 = $cantZonas3-2;
								$cantZonas4 = 2; 
								//$resumen= $resumen. "Para ". $cantPrimera." jugadores se armaron ". $cantZonas3." zonas de 3 y ". $cantZonas4." zonas de 4";	
								//$resumen= $resumen. '</br>';
							}
					
		//$resumen= $resumen. 'cantidad de cabezas de zona '. ($cantZonas3+$cantZonas4);
		//$resumen= $resumen. '</br>';

		
		$cabezas = $this->buscarCabezasDeZona($cantZonas3*3 + $cantZonas4*4, $inscriptos, $id_categoria);	
	/*
		for($i=0; $i<sizeof($cabezas); $i++)
			{
				$resumen= $resumen. 'lista de cabezas '. $cabezas[$i]->jugador;
				$resumen= $resumen. '</br>';
			}				
*/
		$inscriptos_sin_cabezas= $this->eliminar_cabezas_inscriptos($cabezas, $cantZonas3+$cantZonas4);
		


		$this->guardar_zonas($row->id, $cantZonas3, $cantZonas4, $cabezas, $inscriptos_sin_cabezas);

		$this->armar_partidos($row->id, TRUE, $id_categoria);


		$this->crear_byes_llave($row->id, $cantPrimera, $id_categoria);
	}
	else
	{
		//$resumen="No se ha realizado ninguna accion";
		$this->session->set_flashdata('error', 'Algo ha salido mal, no se ha realizado ninguna accion');
		redirect('Welcome/inscripcion');
	}

		//$data['resumen']= $resumen;
		/*$torneo = $this->torneo_model->obtenerTorneoActual();   
	    if (isset($torneo))
	      $t['nombre_torneo'] = $torneo->first_row()->nombre;
	    else
	      $t['nombre_torneo'] = "NINGUNO";
		$this->load->view('menu');
    	$this->load->view('header', $t);
    	$this->load->view('cierre_inscripcion', $data); 
		*/
		$this->session->set_flashdata('success', 'Las zonas han sido creadas correctamente');
		redirect('Welcome/zonas?categoria='. $id_categoria);
	}



	public function crear_byes_llave($torneo, $cant_inscriptos, $categoria)
	{
		$template_llave= array();
    	if ($cant_inscriptos>5)
      		$template_llave = $this->torneo_model->obtener_plantilla_con_byes($cant_inscriptos);

      if (isset($template_llave))
    {
      $llave_incompleta= $template_llave->result_array();

      if ($cant_inscriptos > 5 and $cant_inscriptos < 9)
      	$instancia= 8;
      if ($cant_inscriptos > 8 and $cant_inscriptos < 17)
      	$instancia = 16;
      if ($cant_inscriptos > 16 and $cant_inscriptos < 33)
      	 $instancia=32;
            
      for($i=0; $i<count($llave_incompleta); $i++)
      {
      	$llave = array(		    											
					'jugador' => 0,			
					'resultado' => '',					
					'torneo'   => $torneo,
					'instancia'=> $instancia,
					'categoria'     => $categoria,
					'orden'  => ($llave_incompleta[$i]['posicion']),	
					'bye' => 1,												
					);
							
		$this->torneo_model->crear_llave($llave);

        
      }
    }
      

	}


	//elimina de los inscriptos los jugadores que son cabezas de zona
	public function eliminar_cabezas_inscriptos($cabezas, $cantidad_cabezas)
	{

		$inscriptos_sin_cabezas= array();
		$arreglo_inscriptos= $cabezas;
		
			for($j=0; $j<$cantidad_cabezas; $j++)
			{
			
					array_push($inscriptos_sin_cabezas, $arreglo_inscriptos[$j]);
			
				
			}
		
		/*
		for($i=0; $i<sizeof($inscriptos_sin_cabezas); $i++)
		{
			echo 'inscriptos sin cabezas '. $inscriptos_sin_cabezas[$i]->id_jugador;
			echo '</br>';
		}
		*/



		return $inscriptos_sin_cabezas;
	}


	//determina si jugador esta entre las cabezas de zona
	public function es_cabeza($cabezas, $jugador)
	{
		for($j=0; $j<sizeof($cabezas); $j++)
		{
			if ($cabezas[$j]->jugador == $jugador)
				return true;
		}
		return false;
	}

	//dados los inscriptos, obtiene las cabezas del rating
	public function buscarCabezasDeZona($cantCabezas, $inscriptos, $categoria)
		{
			$cabezas= array();
			
			$result= $inscriptos->result();
				/*		
				for($i=0; $i<$cantCabezas; $i++)
					{
						echo "cabezas".$result[$i]->nombre."------";
						array_push($cabezas,$result[$i]);		
					}
				*/

			$id_inscriptos= array();

			for($i=0; $i<sizeof($result); $i++)
					{						
						array_push($id_inscriptos,$result[$i]->id_jugador);		
					}

			$cabezas= $this->torneo_model->obtener_cabezas_rating($id_inscriptos, $cantCabezas, $categoria);

			return $cabezas;
		}
	

		//armado de zonas
		public function guardar_zonas($torneo, $cantZonas3,$cantZonas4,$inscriptos_ordenados, $cabezas)
		{
			$letra= 'A';
			$zonas;
			
			//obtengo el primer nivel de jugadores
			$tope1= ($cantZonas3+$cantZonas4);
			$primer_nivel= array();
			for ($j=0 ; $j < $cantZonas3+$cantZonas4; $j++)
				array_push($primer_nivel,$inscriptos_ordenados[$j+$tope1]->jugador);	

			$tope2= ($cantZonas3+$cantZonas4)*2;
			$segundo_nivel= array();
			for ($j=0 ; $j < $cantZonas3+$cantZonas4; $j++)
				array_push($segundo_nivel,$inscriptos_ordenados[$j+$tope2]->jugador);	


			//si hay zonas de 4, seteo el tercer nivel con el resto de jugadores		
			if ($cantZonas4 > 0)
			{
				$tope3 = ($cantZonas3+$cantZonas4)*3;
				$tercer_nivel = array();
				for ($j=0 ; $j < $cantZonas4; $j++)
					array_push($tercer_nivel,$inscriptos_ordenados[$j+$tope3]->jugador);
			}		


			//mezclamos el arreglo para hacer random
			//shuffle($inscriptos_sin_cabezas);

			for($i=0; $i<$cantZonas3; $i++)
					{						
						$cabeza= array_shift($cabezas)->jugador;

						//echo "zona de 3 ".$letra."------";
						shuffle($primer_nivel);
						shuffle($segundo_nivel);

						$jugador2= array_pop($primer_nivel);															
						$jugador3= array_pop($segundo_nivel);						
						
						$array = array(
						    "letra" => $letra,
						    "torneo" => $torneo,
						    "categoria" => 1,
						    "cant_jugadores" => 3,
						    "jugador1" => $cabeza,
						    "jugador2" => $jugador2,
						    "jugador3" => $jugador3,
						    "jugador4" => NULL,
						    "jugador5" => NULL,
						    "estado" => 'SIN JUGAR',
						);

					$this->torneo_model->crearZona($array);	

					$letra=++$letra;
					}
			

			for($i=0; $i<$cantZonas4; $i++)
					{
						$cabeza= array_shift($cabezas)->jugador;
						//echo "zona de 4".$letra."------";
						shuffle($primer_nivel);															
						shuffle($segundo_nivel);
						shuffle($tercer_nivel);

						$jugador2= array_pop($primer_nivel);											
						$jugador3= array_pop($segundo_nivel);						
						$jugador4= array_pop($tercer_nivel);

						$array = array(
						    "letra" => $letra,
						    "torneo" => $torneo,
						    "categoria" => 1,
						    "cant_jugadores" => 4,
						    "jugador1" => $cabeza,
						    "jugador2" => $jugador2,
						    "jugador3" => $jugador3,
						    "jugador4" => $jugador4,
						    "jugador5" => NULL,
						    "estado" => 'SIN JUGAR',
						);

					$this->torneo_model->crearZona($array);	

					$letra=++$letra;
					}		
		}





	//guarda los campos editados de un partido
	public function guardar_partido()
	{			
			$data = array(		    			
			'id' => $this->input->post('id'),			
			'set11' => $this->input->post('set11'),			
			'set12' => $this->input->post('set12'),							
			'set13' => $this->input->post('set13') != NULL ? $this->input->post('set13') : 0,							
			'set14' => $this->input->post('set14') != NULL ? $this->input->post('set14') : 0,							
			'set15' => $this->input->post('set15') != NULL ? $this->input->post('set15') : 0,
			'resultado1' => $this->input->post('total1'),

			'set21' => $this->input->post('set21'),			
			'set22' => $this->input->post('set22'),							
			'set23' => $this->input->post('set23') != NULL ? $this->input->post('set23') : 0,							
			'set24' => $this->input->post('set24') != NULL ? $this->input->post('set24') : 0,							
			'set25' => $this->input->post('set25') != NULL ? $this->input->post('set25') : 0,							
			'resultado2' => $this->input->post('total2'),

			'estado' => 'FINALIZADO',
			
			);

			$tipo = $this->input->post('tipo');
			$id_zona = $this->input->post('id_zona');
						
			$this->torneo_model->guardarPartido($data);


			//si es un partido de llave, se genera la llave siguiente
			if ($tipo=='LLAVE')
			{
				$partido= $this->torneo_model->obtener_partido_por_id($this->input->post('id'));
				$llave1 =$this -> torneo_model -> obtener_llave_por_id($partido[0]->id_llave1);
				$llave2 =$this -> torneo_model -> obtener_llave_por_id($partido[0]->id_llave2);


				if ($partido[0]->resultado1 > $partido[0]->resultado2) //si gano el 1
				{
					$llave = array(		    											
					'jugador' => $partido[0]->id_jugador1,			
					'resultado' => '11-11-11-11-11',					
					'torneo'   => $partido[0]->torneo,
					'instancia'=> ($llave2[0]->instancia) /2,
					'categoria'     => $partido[0]->categoria,
					'orden'  => ($llave2[0]->orden) /2,													
					);
							
					$this->torneo_model->crear_llave($llave);
				}
				else //si gano el 2
				{
					$llave = array(		    											
					'jugador' => $partido[0]->id_jugador2,			
					'resultado' => '11-11-11-11-11',					
					'torneo'   => $partido[0]->torneo,
					'instancia'=> ($llave2[0]->instancia) /2,
					'categoria'     => $partido[0]->categoria,
					'orden'  => ($llave2[0]->orden) /2,													
					);
							
					$this->torneo_model->crear_llave($llave);
				}



				//si encuentro creada la llave del rival, creo el partido entre ambos
				if ($llave['orden'] %2 == 0)
				{
					//var_dump("entro por par");exit;
					$llave_oponente = $this-> torneo_model -> obtener_llave_oponente ($llave['torneo'], $llave['categoria'], 
						$llave['instancia'], $llave['orden']-1);

					$llave_rival = $this-> torneo_model -> obtener_llave_oponente ($llave['torneo'], $llave['categoria'], 
						$llave['instancia'], $llave['orden']);

					if (isset($llave_oponente))
					{
						$partido = array(		    											
						'jugador1' => $llave_oponente[0]->jugador,			
						'jugador2' => $llave_rival[0]->jugador,
						'cant_sets'=> $this->torneo_model->obtener_cant_set_instancia($llave['torneo'], $llave['categoria'], 'LLAVE', $llave['instancia'])->first_row()->cant_set,
						'estado'   => 'SIN JUGAR',
						'torneo'   => $llave['torneo'],
						'categoria'=> $llave['categoria'],
						'tipo'     => 'LLAVE',
						'id_llave1'  => $llave_oponente[0]->id,								
						'id_llave2'  => $llave_rival[0]->id,								
						
						);
									
						$this->torneo_model->crear_partido($partido);
					}
				}
				else
				{
					//var_dump("entro por impar");exit;
					$llave_oponente = $this-> torneo_model -> obtener_llave_oponente ($llave['torneo'], $llave['categoria'], 
						$llave['instancia'], $llave['orden']+1);

					$llave_rival = $this-> torneo_model -> obtener_llave_oponente ($llave['torneo'], $llave['categoria'], 
						$llave['instancia'], $llave['orden']);

					if (isset($llave_oponente))
					{
						$partido = array(		    											
						'jugador1' => $llave_rival[0]->jugador,			
						'jugador2' => $llave_oponente[0]->jugador,
						'cant_sets'=> $this->torneo_model->obtener_cant_set_instancia($llave['torneo'], $llave['categoria'], 'LLAVE', $llave['instancia'])->first_row()->cant_set,
						'estado'   => 'SIN JUGAR',
						'torneo'   => $llave['torneo'],
						'categoria'=> $llave['categoria'],
						'tipo'     => 'LLAVE',
						'id_llave1'  => $llave_rival[0]->id,					
						'id_llave2'  => $llave_oponente[0]->id,				
						);
									
						$this->torneo_model->crear_partido($partido);
					}
				}

				redirect('welcome/llave/'.$llave['categoria']);

			}

			if ($tipo=='ZONA')
			{
				redirect('welcome/editar_zona/'.$id_zona);
			}
			
				
	}



	//armado de partidos a jugar en un torneo
	public function armar_partidos($id_torneo, $es_zona, $categoria)
	{
		if ($es_zona) //armar partidos de zonas
		{
			$zonas = $this->torneo_model->obtenerZonas($id_torneo,$categoria)->result();

			$zonas_de_4 = $this->torneo_model->obtener_zonas_4($id_torneo,$categoria)->result();			

			for($i=0; $i<sizeof($zonas); $i++)
			{
				//if ($zonas[$i]->jugador4 == NULL) //es partido de zona de 3
				if (!isset($zonas[$i]->jugador4)) //es partido de zona de 3
				{
					//1 vs 2
					$data = array(		    											
					'jugador1' => $zonas[$i]->id_jugador1,			
					'jugador2' => $zonas[$i]->id_jugador2,
					'arbitro' => $zonas[$i]->id_jugador3,
					'cant_sets'=> $this->torneo_model->obtener_cant_set_instancia($id_torneo, $categoria, 'ZONA', NULL)->first_row()->cant_set,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> $categoria,
					'tipo'     => 'ZONA',
					'id_zona'  => $zonas[$i]->id,	
					'id_llave1' => NULL,
					'id_llave2' => NULL,				
					);
								
					$this->torneo_model->crear_partido($data);

					//1 vs 3
					$data = array(		    											
					'jugador1' => $zonas[$i]->id_jugador1,			
					'jugador2' => $zonas[$i]->id_jugador3,
					'arbitro' => $zonas[$i]->id_jugador2,
					'cant_sets'=> $this->torneo_model->obtener_cant_set_instancia($id_torneo, $categoria, 'ZONA', NULL)->first_row()->cant_set,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> $categoria,
					'tipo'     => 'ZONA',
					'id_zona'  => $zonas[$i]->id,
					'id_llave1' => NULL,
					'id_llave2' => NULL,								
					
					);
								
					$this->torneo_model->crear_partido($data);

					//2 vs 3
					$data = array(		    											
					'jugador1' => $zonas[$i]->id_jugador2,			
					'jugador2' => $zonas[$i]->id_jugador3,
					'arbitro' => $zonas[$i]->id_jugador1,
					'cant_sets'=> $this->torneo_model->obtener_cant_set_instancia($id_torneo, $categoria, 'ZONA', NULL)->first_row()->cant_set,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> $categoria,
					'tipo'     => 'ZONA',
					'id_zona'  => $zonas[$i]->id,
					'id_llave1' => NULL,
					'id_llave2' => NULL,								
					
					);
								
					$this->torneo_model->crear_partido($data);
				}
			}

			for($i=0; $i<sizeof($zonas_de_4); $i++)
			{
				if (isset($zonas_de_4)) //es partido de zona de 4
				{
					//1 vs 3
					$data = array(		    											
					'jugador1' => $zonas_de_4[$i]->id_jugador1,			
					'jugador2' => $zonas_de_4[$i]->id_jugador3,
					'arbitro' => $zonas_de_4[$i]->id_jugador4,
					'cant_sets'=> $this->torneo_model->obtener_cant_set_instancia($id_torneo, $categoria, 'ZONA', NULL)->first_row()->cant_set,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> $categoria,
					'tipo'     => 'ZONA',
					'id_zona'  => $zonas_de_4[$i]->id,	
					'id_llave1' => NULL,
					'id_llave2' => NULL,							
					
					);
								
					$this->torneo_model->crear_partido($data);

					//2 vs 4
					$data = array(		    											
					'jugador1' => $zonas_de_4[$i]->id_jugador2,			
					'jugador2' => $zonas_de_4[$i]->id_jugador4,
					'arbitro' => $zonas_de_4[$i]->id_jugador1,
					'cant_sets'=> $this->torneo_model->obtener_cant_set_instancia($id_torneo, $categoria, 'ZONA', NULL)->first_row()->cant_set,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> $categoria,
					'tipo'     => 'ZONA',
					'id_zona'  => $zonas_de_4[$i]->id,	
					'id_llave1' => NULL,
					'id_llave2' => NULL,							
					
					);
								
					$this->torneo_model->crear_partido($data);

					//1 vs 2
					$data = array(		    											
					'jugador1' => $zonas_de_4[$i]->id_jugador1,			
					'jugador2' => $zonas_de_4[$i]->id_jugador2,
					'arbitro' => $zonas_de_4[$i]->id_jugador3,
					'cant_sets'=> $this->torneo_model->obtener_cant_set_instancia($id_torneo, $categoria, 'ZONA', NULL)->first_row()->cant_set,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> $categoria,
					'tipo'     => 'ZONA',
					'id_zona'  => $zonas_de_4[$i]->id,	
					'id_llave1' => NULL,
					'id_llave2' => NULL,							
					
					);
								
					$this->torneo_model->crear_partido($data);

					//3 vs 4
					$data = array(		    											
					'jugador1' => $zonas_de_4[$i]->id_jugador3,			
					'jugador2' => $zonas_de_4[$i]->id_jugador4,
					'arbitro' => $zonas_de_4[$i]->id_jugador2,
					'cant_sets'=> $this->torneo_model->obtener_cant_set_instancia($id_torneo, $categoria, 'ZONA', NULL)->first_row()->cant_set,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> $categoria,
					'tipo'     => 'ZONA',
					'id_zona'  => $zonas_de_4[$i]->id,	
					'id_llave1' => NULL,
					'id_llave2' => NULL,							
					
					);
								
					$this->torneo_model->crear_partido($data);

					//1 vs 4
					$data = array(		    											
					'jugador1' => $zonas_de_4[$i]->id_jugador1,			
					'jugador2' => $zonas_de_4[$i]->id_jugador4,
					'arbitro' => $zonas_de_4[$i]->id_jugador3,
					'cant_sets'=> $this->torneo_model->obtener_cant_set_instancia($id_torneo, $categoria, 'ZONA', NULL)->first_row()->cant_set,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> $categoria,
					'tipo'     => 'ZONA',
					'id_zona'  => $zonas_de_4[$i]->id,	
					'id_llave1' => NULL,
					'id_llave2' => NULL,							
					
					);
								
					$this->torneo_model->crear_partido($data);

					//2 vs 3
					$data = array(		    											
					'jugador1' => $zonas_de_4[$i]->id_jugador2,			
					'jugador2' => $zonas_de_4[$i]->id_jugador3,
					'arbitro' => $zonas_de_4[$i]->id_jugador4,
					'cant_sets'=> $this->torneo_model->obtener_cant_set_instancia($id_torneo, $categoria, 'ZONA', NULL)->first_row()->cant_set,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> $categoria,
					'tipo'     => 'ZONA',
					'id_zona'  => $zonas_de_4[$i]->id,	
					'id_llave1' => NULL,
					'id_llave2' => NULL,							
					
					);
								
					$this->torneo_model->crear_partido($data);
				}
			
			}
		}
	}


	
	


	//guarda los campos editados de una zona
	public function guardar_zona()
	{			
		$id_zona=$this->input->post('id');

		$zona_ya_procesada = $this->torneo_model->zona_ya_procesada($id_zona);

		if ($zona_ya_procesada)
		{
			$this->session->set_flashdata('error', 'No es posible procesar la zona, ya tiene posiciones establecidas');
			redirect('welcome/editar_zona/'.$id_zona);	
		}

		//controlo que todos los partidos tengan resultado
		$partidos_inconclusos= $this->torneo_model->hay_partidos_sin_finalizar($id_zona);
		
		//si hay partidos sin definir no se permite procesar la zona
		if ($partidos_inconclusos)
		{
			$this->session->set_flashdata('error', 'No es posible procesar la zona, existen partidos sin finalizar');
			redirect('welcome/editar_zona/'.$id_zona);
		}

		//obtengo la zona a procesar
		$zona_a_procesar= 	$this->torneo_model->obtener_zona_por_id($id_zona);

		if (isset($zona_a_procesar))
			$zona_a_procesar= $zona_a_procesar->result_array();
		else
			$zona_a_procesar= $this->torneo_model->obtener_zona_de_4_por_id($id_zona)->result_array();

		//obtengo los partidos de la zona
		$partidos_de_la_zona = $this->torneo_model->obtener_partidos_zona($id_zona)->result_array();

		 if (isset($partidos_de_la_zona)){
               for($i=0; $i<sizeof($partidos_de_la_zona); $i++){
               	//calculo quien fue el ganador del partido
               	 $ganador = $this->obtener_ganador_partido($partidos_de_la_zona[$i]);

               	 //sumo 2 puntos al ganador
               	 if ($ganador == $zona_a_procesar[0]['id_jugador1'])
               	 	$zona_a_procesar[0]['puntos1']= $zona_a_procesar[0]['puntos1']+2;
               	 if ($ganador == $zona_a_procesar[0]['id_jugador2'])
               	 	$zona_a_procesar[0]['puntos2']= $zona_a_procesar[0]['puntos2']+2;
               	 if ($ganador == $zona_a_procesar[0]['id_jugador3'])
               	 	$zona_a_procesar[0]['puntos3']= $zona_a_procesar[0]['puntos3']+2;
               	 if (isset($zona_a_procesar[0]['id_jugador4']) and $ganador == $zona_a_procesar[0]['id_jugador4'])
               	 	$zona_a_procesar[0]['puntos4']= $zona_a_procesar[0]['puntos4']+2;

               	 if ($ganador == $partidos_de_la_zona[$i]['id_jugador1'])
               	 	$perdedor= $partidos_de_la_zona[$i]['id_jugador2'];
               	 else
               	 	$perdedor= $partidos_de_la_zona[$i]['id_jugador1'];

               	 //sumo 1 punto al perdedor
               	 if ($perdedor == $zona_a_procesar[0]['id_jugador1'])
               	 	$zona_a_procesar[0]['puntos1']= $zona_a_procesar[0]['puntos1']+1;
               	 if ($perdedor == $zona_a_procesar[0]['id_jugador2'])
               	 	$zona_a_procesar[0]['puntos2']= $zona_a_procesar[0]['puntos2']+1;
               	 if ($perdedor == $zona_a_procesar[0]['id_jugador3'])
               	 	$zona_a_procesar[0]['puntos3']= $zona_a_procesar[0]['puntos3']+1;
               	 if (isset($zona_a_procesar[0]['id_jugador4']) and $perdedor == $zona_a_procesar[0]['id_jugador4'])
               	 	$zona_a_procesar[0]['puntos4']= $zona_a_procesar[0]['puntos4']+1;

               }

           }

//var_dump($zona_a_procesar[0]['puntos1'] .'--'. $zona_a_procesar[0]['puntos2'] .'--'. $zona_a_procesar[0]['puntos3']);exit;

        //calculo las posiciones finales de zona
        //zona de 3   
        if ($zona_a_procesar[0]['cant_jugadores'] == 3)
        {       	
        	$posicion_final = $this->calcular_posiciones_zona_3($zona_a_procesar[0]['puntos1'], $zona_a_procesar[0]['puntos2'], $zona_a_procesar[0]['puntos3'], $zona_a_procesar[0]['id_jugador1'], 
        		$zona_a_procesar[0]['id_jugador2'], $zona_a_procesar[0]['id_jugador3'], $zona_a_procesar[0]['id']);
        }

        //zona de 4
        if ($zona_a_procesar[0]['cant_jugadores'] == 4)
        {        
			//$posicion_final = array(1,2,3,4);

        	$posicion_final = $this -> calcular_posiciones_zona_4($zona_a_procesar[0]['puntos1'], $zona_a_procesar[0]['puntos2'], $zona_a_procesar[0]['puntos3'], $zona_a_procesar[0]['puntos4'], 
        		$zona_a_procesar[0]['id_jugador1'], $zona_a_procesar[0]['id_jugador2'], $zona_a_procesar[0]['id_jugador3'], $zona_a_procesar[0]['id_jugador4'], $zona_a_procesar[0]['id']);
        }


        if ($posicion_final[0] == 0 or $posicion_final[1] == 0 or $posicion_final[2] == 0)
        {
        	$this->session->set_flashdata('error', 'Ha ocurrido un error al procesar las posiciones de la zona');
			redirect('welcome/editar_zona/'.$id_zona);
        }



        //armo la zona para actualizar posiciones y puntajes
		$data = array(		    			
			'id' => $zona_a_procesar[0]['id'],			
			'pos1' => $posicion_final[0],
			'pos2' => $posicion_final[1],
			'pos3' => $posicion_final[2],
			'pos4' => ($zona_a_procesar[0]['cant_jugadores'] == 4) ? $posicion_final[3] : NULL,
			'puntos1' => $zona_a_procesar[0]['puntos1'],
			'puntos2' => $zona_a_procesar[0]['puntos2'],							
			'puntos3' => $zona_a_procesar[0]['puntos3'],							
			'puntos4' => isset($zona_a_procesar[0]['id_jugador4']) ? $zona_a_procesar[0]['puntos4'] : NULL,									
			'estado' => 'FINALIZADA',
			
			);

			//actualizo los puntajes de la zona
			$this->torneo_model->guardarZona($data);

			//obtengo la zona recientemente cargada para generar el pase de jugadores a llave
			$zona_cargada= 	$this->torneo_model->obtener_zona_por_id($data['id']);

			if (isset($zona_cargada))
				$zona_cargada= 	$zona_cargada->result_array();				
			else
				$zona_cargada= $this->torneo_model->obtener_zona_de_4_por_id($id_zona)->result_array();


			$cant_inscriptos= $this->torneo_model->obtener_cant_inscriptos($zona_cargada[0]['torneo'], $zona_cargada[0]['categoria']);

			//entre 6 y 8 inscriptos la instancia de llave comienza en 8vos
			if ($cant_inscriptos > 5 and $cant_inscriptos < 9)
			{
				$orden_llave= $this->torneo_model->obtener_posicion_plantilla($cant_inscriptos, '1'.$zona_cargada[0]['letra']);
				$primero= $this->torneo_model->obtener_posicion_jugador_zona($data['id'], 1);

				$data_llave = array(
					'jugador' => $primero[0]->id,
					'torneo'  => $zona_cargada[0]['torneo'],
					'instancia' => 8,
					'categoria' => $zona_cargada[0]['categoria'],
					'orden' => $orden_llave[0]->posicion,
					'bye' => 0,
					);

				$this->torneo_model->crear_llave($data_llave);
				$this->crear_partido_llave($data_llave['torneo'], $data_llave['categoria'], $data_llave['orden'], $data_llave['instancia']);

				$orden_llave= $this->torneo_model->obtener_posicion_plantilla($cant_inscriptos, '2'.$zona_cargada[0]
					['letra']);
				$segundo= $this->torneo_model->obtener_posicion_jugador_zona($data['id'], 2);

				$data_llave = array(
					'jugador' => $segundo[0]->id,
					'torneo'  => $zona_cargada[0]['torneo'],
					'instancia' => 8,
					'categoria' => $zona_cargada[0]['categoria'],
					'orden' => $orden_llave[0]->posicion,
					'bye' => 0,
					);

				$this->torneo_model->crear_llave($data_llave);
				$this->crear_partido_llave($data_llave['torneo'], $data_llave['categoria'], $data_llave['orden'], $data_llave['instancia']);

				
				$orden_llave= $this->torneo_model->obtener_posicion_plantilla($cant_inscriptos, '3'.$zona_cargada[0]
					['letra']);
				$tercero= $this->torneo_model->obtener_posicion_jugador_zona($data['id'], 3);

				$data_llave = array(
					'jugador' => $tercero[0]->id,
					'torneo'  => $zona_cargada[0]['torneo'],
					'instancia' => 8,
					'categoria' => $zona_cargada[0]['categoria'],
					'orden' => $orden_llave[0]->posicion,
					'bye' => 0,
					);

				$this->torneo_model->crear_llave($data_llave);
				$this->crear_partido_llave($data_llave['torneo'], $data_llave['categoria'], $data_llave['orden'], $data_llave['instancia']);		


				if (isset($zona_cargada[0]['id_jugador4']))
				{
				$orden_llave= $this->torneo_model->obtener_posicion_plantilla($cant_inscriptos, '4'.$zona_cargada[0]
					['letra']);
				$cuarto= $this->torneo_model->obtener_posicion_jugador_zona($data['id'], 4);

				$data_llave = array(
					'jugador' => $cuarto[0]->id,
					'torneo'  => $zona_cargada[0]['torneo'],
					'instancia' => 8,
					'categoria' => $zona_cargada[0]['categoria'],
					'orden' => $orden_llave[0]->posicion,
					'bye' => 0,
					);

				$this->torneo_model->crear_llave($data_llave);	
				$this->crear_partido_llave($data_llave['torneo'], $data_llave['categoria'], $data_llave['orden'], $data_llave['instancia']);
				}		
			}




			//entre 8 y 16 inscriptos la instancia de llave comienza en 16avos
			if ($cant_inscriptos > 8 and $cant_inscriptos <17)
			{				
				$orden_llave= $this->torneo_model->obtener_posicion_plantilla($cant_inscriptos, '1'.$zona_cargada[0]
					['letra']);
				$primero= $this->torneo_model->obtener_posicion_jugador_zona($data['id'], 1);

				$data_llave = array(
					'jugador' => $primero[0]->id,
					'torneo'  => $zona_cargada[0]['torneo'],
					'instancia' => 16,
					'categoria' => $zona_cargada[0]['categoria'],
					'orden' => $orden_llave[0]->posicion,
					'bye' => 0,
					);

				$this->torneo_model->crear_llave($data_llave);
				$this->crear_partido_llave($data_llave['torneo'], $data_llave['categoria'], $data_llave['orden'], $data_llave['instancia']);


				$orden_llave= $this->torneo_model->obtener_posicion_plantilla($cant_inscriptos, '2'.$zona_cargada[0]
					['letra']);
				$segundo= $this->torneo_model->obtener_posicion_jugador_zona($data['id'], 2);

				$data_llave = array(
					'jugador' => $segundo[0]->id,
					'torneo'  => $zona_cargada[0]['torneo'],
					'instancia' => 16,
					'categoria' => $zona_cargada[0]['categoria'],
					'orden' => $orden_llave[0]->posicion,
					'bye' => 0,
					);

				$this->torneo_model->crear_llave($data_llave);
				$this->crear_partido_llave($data_llave['torneo'], $data_llave['categoria'], $data_llave['orden'], $data_llave['instancia']);

				
				$orden_llave= $this->torneo_model->obtener_posicion_plantilla($cant_inscriptos, '3'.$zona_cargada[0]
					['letra']);
				$tercero= $this->torneo_model->obtener_posicion_jugador_zona($data['id'], 3);

				$data_llave = array(
					'jugador' => $tercero[0]->id,
					'torneo'  => $zona_cargada[0]['torneo'],
					'instancia' => 16,
					'categoria' => $zona_cargada[0]['categoria'],
					'orden' => $orden_llave[0]->posicion,
					'bye' => 0,
					);

				$this->torneo_model->crear_llave($data_llave);
				$this->crear_partido_llave($data_llave['torneo'], $data_llave['categoria'], $data_llave['orden'], $data_llave['instancia']);		


				if (isset($pos4))
				{
				$orden_llave= $this->torneo_model->obtener_posicion_plantilla($cant_inscriptos, '4'.$zona_cargada[0]
					['letra']);
				$cuarto= $this->torneo_model->obtener_posicion_jugador_zona($data['id'], 4);

				$data_llave = array(
					'jugador' => $cuarto[0]->id,
					'torneo'  => $zona_cargada[0]['torneo'],
					'instancia' => 16,
					'categoria' => $zona_cargada[0]['categoria'],
					'orden' => $orden_llave[0]->posicion,
					'bye' => 0,
					);

				$this->torneo_model->crear_llave($data_llave);	
				$this->crear_partido_llave($data_llave['torneo'], $data_llave['categoria'], $data_llave['orden'], $data_llave['instancia']);
				}		
			}



			//si hay mas de 16 inscriptos, la instancia comienza en 32avos
			if ($cant_inscriptos > 16 and $cant_inscriptos <33)
			{
				$orden_llave= $this->torneo_model->obtener_posicion_plantilla($cant_inscriptos, '1'.$zona_cargada[0]->letra);
				$primero= $this->torneo_model->obtener_posicion_jugador_zona($data['id'], 1);

				$data_llave = array(
					'jugador' => $primero[0]->id,
					'torneo'  => $zona_cargada[0]->torneo,
					'instancia' => 32,
					'categoria' => $zona_cargada[0]->categoria,
					'orden' => $orden_llave[0]->posicion,
					'bye' => 0,
					);

				$this->torneo_model->crear_llave($data_llave);
				$this->crear_partido_llave($data_llave['torneo'], $data_llave['categoria'], $data_llave['orden'], $data_llave['instancia']);


				$orden_llave= $this->torneo_model->obtener_posicion_plantilla($cant_inscriptos, '2'.$zona_cargada[0]->letra);
				$segundo= $this->torneo_model->obtener_posicion_jugador_zona($data['id'], 2);

				$data_llave = array(
					'jugador' => $segundo[0]->id,
					'torneo'  => $zona_cargada[0]->torneo,
					'instancia' => 32,
					'categoria' => $zona_cargada[0]->categoria,
					'orden' => $orden_llave[0]->posicion,
					'bye' => 0,
					);

				$this->torneo_model->crear_llave($data_llave);
				$this->crear_partido_llave($data_llave['torneo'], $data_llave['categoria'], $data_llave['orden'], $data_llave['instancia']);

				
				$orden_llave= $this->torneo_model->obtener_posicion_plantilla($cant_inscriptos, '3'.$zona_cargada[0]->letra);
				$tercero= $this->torneo_model->obtener_posicion_jugador_zona($data['id'], 3);

				$data_llave = array(
					'jugador' => $tercero[0]->id,
					'torneo'  => $zona_cargada[0]->torneo,
					'instancia' => 32,
					'categoria' => $zona_cargada[0]->categoria,
					'orden' => $orden_llave[0]->posicion,
					'bye' => 0,
					);

				$this->torneo_model->crear_llave($data_llave);	
				$this->crear_partido_llave($data_llave['torneo'], $data_llave['categoria'], $data_llave['orden'], $data_llave['instancia']);	


				if (isset($pos4))
				{
				$orden_llave= $this->torneo_model->obtener_posicion_plantilla($cant_inscriptos, '4'.$zona_cargada[0]->letra);
				$cuarto= $this->torneo_model->obtener_posicion_jugador_zona($data['id'], 4);

				$data_llave = array(
					'jugador' => $cuarto[0]->id,
					'torneo'  => $zona_cargada[0]->torneo,
					'instancia' => 32,
					'categoria' => $zona_cargada[0]->categoria,
					'orden' => $orden_llave[0]->posicion,
					'bye' => 0,
					);

				$this->torneo_model->crear_llave($data_llave);	
				$this->crear_partido_llave($data_llave['torneo'], $data_llave['categoria'], $data_llave['orden'], $data_llave['instancia']);
				}		
			}



			$this->session->set_flashdata('success', 'La zona ha sido procesada con exito');
			redirect('welcome/editar_zona/'.$id_zona);
	}




	



	//calcula las posiciones finales de una zona de 3	
	//zona de 3 se resuelve directamente por puntos o puede haber triple empate, resolviendo por coeficiente de set o de puntos
	//zona de 4 se resuelve directamente 
	private function calcular_posiciones_zona_3($puntos1, $puntos2, $puntos3, $jugador1, $jugador2, $jugador3, $zona)
	{
		$posicion1=0;
		$posicion2=0;
		$posicion3=0;
		$torneo = $this->torneo_model->obtenerTorneoActual();
		$row = $torneo->first_row();
		//caso mas simple, todos los jugadores tienen puntaje diferente
		//todos obtuvieron puntaje distinto --> zona definida
        	if ($puntos1 <> $puntos2 and $puntos2 <> $puntos3)
        	{
        		//el jugador que saca mayor puntaje tiene el primer puesto
        		if ($puntos1 > $puntos2 and $puntos1 > $puntos3)
        			{
        				$posiciones = $this->obtener_posicion_puntaje_diferente($puntos1, $puntos2, $puntos3);
        				$posicion1 = $posiciones[0];
        				$posicion2 = $posiciones[1];
        				$posicion3 = $posiciones[2];
        			}
        		if ($puntos2 > $puntos1 and $puntos2 > $puntos3)
        		{
        			$posiciones = $this->obtener_posicion_puntaje_diferente($puntos2, $puntos1, $puntos3);
        			$posicion2 = $posiciones[0];
        			$posicion1 = $posiciones[1];
        			$posicion3 = $posiciones[2];
        		}
        		if ($puntos3 > $puntos1 and $puntos3 > $puntos2)
        			{
        				$posiciones = $this->obtener_posicion_puntaje_diferente($puntos3, $puntos1, $puntos2);
	        			$posicion3 = $posiciones[0];
	        			$posicion1 = $posiciones[1];
	        			$posicion2 = $posiciones[2];
        			}	 
        	}



        	//Caso de triple empate, coeficiente de set
        	if ($puntos1 == $puntos2 and $puntos2 == $puntos3)
        	{      		

        		$set_a_favor1 =  $this->torneo_model->obtener_set_a_favor($row->id, $zona, $jugador1, NULL);
        		$set_en_contra1 =  $this->torneo_model->obtener_set_en_contra($row->id, $zona, $jugador1, NULL);
        		$set_a_favor2 =  $this->torneo_model->obtener_set_a_favor($row->id, $zona, $jugador2, NULL);
        		$set_en_contra2 =  $this->torneo_model->obtener_set_en_contra($row->id, $zona, $jugador2, NULL);
        		$set_a_favor3 =  $this->torneo_model->obtener_set_a_favor($row->id, $zona, $jugador3, NULL);
        		$set_en_contra3 =  $this->torneo_model->obtener_set_en_contra($row->id, $zona, $jugador3, NULL);        			
        	
				//var_dump(a favor ' . $set_a_favor3 . 'en contra ' . $set_en_contra3 . 'jugador '. $jugador3);exit;			


	        	$coeficiente1 = $set_a_favor1 / $set_en_contra1;
	        	$coeficiente2 = $set_a_favor2 / $set_en_contra2;
	        	$coeficiente3 = $set_a_favor3 / $set_en_contra3;

	        	log_message('error', 'coef1 ' . $coeficiente1 . 'coef2 ' . $coeficiente2 . 'coef3 '. $coeficiente3);			

	        	//si todos los coeficientes son distintos, se resuelve el triple empate
	        	if ($coeficiente1 <> $coeficiente2 and $coeficiente2 <> $coeficiente3)
	        	{
	        		if ($coeficiente1 > $coeficiente2 and $coeficiente1 > $coeficiente3)
	        			{
	        				$posiciones = $this->obtener_posicion_puntaje_diferente($coeficiente1, $coeficiente2, $coeficiente3);
	        				$posicion1 = $posiciones[0];
	        				$posicion2 = $posiciones[1];
	        				$posicion3 = $posiciones[2];
	        			}
	        		if ($coeficiente2 > $coeficiente1 and $coeficiente2 > $coeficiente3)
		        		{
		        			$posiciones = $this->obtener_posicion_puntaje_diferente($coeficiente2, $coeficiente1, $coeficiente3);
		        			$posicion2 = $posiciones[0];
		        			$posicion1 = $posiciones[1];
		        			$posicion3 = $posiciones[2];
		        		}
	        		if ($coeficiente3 > $coeficiente1 and $coeficiente3 > $coeficiente2)
		        		{
		        			$posiciones = $this->obtener_posicion_puntaje_diferente($coeficiente3, $coeficiente1, $coeficiente2);
		        			$posicion3 = $posiciones[0];
		        			$posicion1 = $posiciones[1];
		        			$posicion2 = $posiciones[2];
		        		}
		        }

	        	//si los coeficientes de set son iguales, defino por coeficiente de puntos
	        	if ($coeficiente1 == $coeficiente2 and $coeficiente2 == $coeficiente3)
	        	{

	        		$puntos_a_favor1 =  $this->torneo_model->obtener_puntos_a_favor($row->id, $zona, $jugador1, 3, NULL);
	        		$puntos_en_contra1 =  $this->torneo_model->obtener_puntos_en_contra($row->id, $zona, $jugador1, 3, NULL);
	        		$puntos_a_favor2 =  $this->torneo_model->obtener_puntos_a_favor($row->id, $zona, $jugador2, 3, NULL);
	        		$puntos_en_contra2 =  $this->torneo_model->obtener_puntos_en_contra($row->id, $zona, $jugador2, 3, NULL);
	        		$puntos_a_favor3 =  $this->torneo_model->obtener_puntos_a_favor($row->id, $zona, $jugador3, 3, NULL);
	        		$puntos_en_contra3 =  $this->torneo_model->obtener_puntos_en_contra($row->id, $zona, $jugador3, 3, NULL);        			
	        	
					log_message('error', 'puntos a favor ' . $puntos_a_favor1 . 'puntos en contra ' . $puntos_en_contra1 . 'jugador '. $jugador1);			


		        	$coef_puntos1 = $puntos_a_favor1 / $puntos_en_contra1;
		        	$coef_puntos2 = $puntos_a_favor2 / $puntos_en_contra2;
		        	$coef_puntos3 = $puntos_a_favor3 / $puntos_en_contra3;


		        	if ($coef_puntos1 <> $coef_puntos2 and $coef_puntos2 <> $coef_puntos3)
		        	{
		        		if ($coef_puntos1 > $coef_puntos2 and $coef_puntos1 > $coef_puntos3)
		        			{
		        				$posiciones = $this->obtener_posicion_puntaje_diferente($coef_puntos1, $coef_puntos2, $coef_puntos3);
	        					$posicion1 = $posiciones[0];
	        					$posicion2 = $posiciones[1];
	        					$posicion3 = $posiciones[2];
		        			}
		        		if ($coef_puntos2 > $coef_puntos1 and $coef_puntos2 > $coef_puntos3)
			        		{
			        			$posiciones = $this->obtener_posicion_puntaje_diferente($coef_puntos2, $coef_puntos1, $coef_puntos3);
			        			$posicion2 = $posiciones[0];
			        			$posicion1 = $posiciones[1];
			        			$posicion3 = $posiciones[2];
			        		}
		        		if ($coef_puntos3 > $coef_puntos1 and $coef_puntos3 > $coef_puntos2)
		        			{
		        				$posiciones = $this->obtener_posicion_puntaje_diferente($coef_puntos3, $coef_puntos1, $coef_puntos2);
			        			$posicion3 = $posiciones[0];
			        			$posicion1 = $posiciones[1];
			        			$posicion2 = $posiciones[2];
		        			}	 
		        	}

			        	//log_message('error', 'coefpuntos1 ' . $coef_puntos1 . 'coefpuntos2 ' . $coef_puntos2 . 'coefpuntos3 '. $coef_puntos3);	
			    }

		     }

		//si no se pudo definir por coeficiente de set, ni coeficiente de puntos, procedo a definir random
		if ($posicion1 == 0 and $posicion2 == 0 and $posicion3 == 0)
		{
			//defino posiciones de forma random
			$sorteo = array(1,2,3);
			shuffle($sorteo);
			$posicion1 = $sorteo[0];
			$posicion2 = $sorteo[1];
			$posicion3 = $sorteo[2];
		}

        
		return array($posicion1, $posicion2, $posicion3);

	}


	private function obtener_posicion_puntaje_diferente($puntos1, $puntos2, $puntos3)
	{
			//el jugador que saca mayor puntaje tiene el primer puesto
    		if ($puntos1 > $puntos2 and $puntos1 > $puntos3)
    			{
    				$posicion1 = 1;
    				
    				if ($puntos2 > $puntos3)
    				{
    					$posicion2=2;
    					$posicion3=3;
    				}
    				else
    				{
    					$posicion2=3;
    					$posicion3=2;	
    				}
    			}
    			return array($posicion1, $posicion2, $posicion3);
	}



	private function calcular_posiciones_zona_4($puntos1, $puntos2, $puntos3, $puntos4, $jugador1, $jugador2, $jugador3, $jugador4, $zona)
	{

		$posicion1=0;
		$posicion2=0;
		$posicion3=0;
		$posicion4=0;
		$torneo = $this->torneo_model->obtenerTorneoActual();
		$row = $torneo->first_row();

		//var_dump($puntos1 .' -- '. $puntos2 .' -- '. $puntos3 .' -- '. $puntos4);exit;

		//caso mas simple, todos los jugadores tienen puntaje diferente
		//todos obtuvieron puntaje distinto --> zona definida
        	if ($puntos1 <> $puntos2 and $puntos2 <> $puntos3 and $puntos3 <> $puntos4)
        	{        	
        		$posiciones = $this->obtener_posicion_puntaje_diferente_4($puntos1, $puntos2, $puntos3, $puntos4);
				$posicion1 = $posiciones[0];
				$posicion2 = $posiciones[1];
				$posicion3 = $posiciones[2];
				$posicion4 = $posiciones[3];

				//var_dump($posicion1 .' -- '. $posicion2 .' -- '. $posicion3 .' -- '. $posicion4);exit;
        	}
		//////////////////////////////////////////////////////////////////////INICIO CONTROL DOBLE EMPATE //////////////////////////////////////////////////////////////////////////////
        	//Caso de doble empate
        	//empate entre 1/2 y 3/4
        	if($puntos1 == $puntos2 and $puntos1 <> $puntos3 and $puntos3 == $puntos4)
        	{
        		if ($puntos1 > $puntos3)
        		{
        			$posiciones = $this->obtener_posicion_doble_empate($jugador1, $jugador2, $jugador3, $jugador4, $zona);
        			$posicion1 = $posiciones[0];
					$posicion2 = $posiciones[1];
					$posicion3 = $posiciones[2];
					$posicion4 = $posiciones[3];
        		}
        		else
        		{
        			$posiciones = $this->obtener_posicion_doble_empate($jugador3, $jugador4, $jugador1, $jugador2, $zona);
	        		$posicion3 = $posiciones[0];
					$posicion4 = $posiciones[1];
					$posicion1 = $posiciones[2];
					$posicion2 = $posiciones[3];
				}
        	}

        	//empate entre 1/4 y 2/3
        	if($puntos1 == $puntos4 and $puntos2 <> $puntos4 and $puntos2 == $puntos3)
        	{
        		if ($puntos1 > $puntos2)
        		{
        			$posiciones = $this->obtener_posicion_doble_empate($jugador1, $jugador4, $jugador2, $jugador3, $zona);
        			$posicion1 = $posiciones[0];
					$posicion4 = $posiciones[1];
					$posicion2 = $posiciones[2];
					$posicion3 = $posiciones[3];
        		}
        		else
        		{
        			$posiciones = $this->obtener_posicion_doble_empate($jugador2, $jugador3, $jugador1, $jugador4, $zona);
	        		$posicion2 = $posiciones[0];
					$posicion3 = $posiciones[1];
					$posicion1 = $posiciones[2];
					$posicion4 = $posiciones[3];
				}
        	}

        	//empate entre 1/3 y 2/4
        	if($puntos1 == $puntos3 and $puntos1 <> $puntos2 and $puntos2 == $puntos4)
        	{
        		if ($puntos1 > $puntos2)
        		{
        			$posiciones = $this->obtener_posicion_doble_empate($jugador1, $jugador3, $jugador2, $jugador4, $zona);
        			$posicion1 = $posiciones[0];
					$posicion3 = $posiciones[1];
					$posicion2 = $posiciones[2];
					$posicion4 = $posiciones[3];
        		}
        		else
        		{
        			$posiciones = $this->obtener_posicion_doble_empate($jugador2, $jugador4, $jugador1, $jugador3, $zona);        		
	        		$posicion2 = $posiciones[0];
					$posicion3 = $posiciones[1];
					$posicion1 = $posiciones[2];
					$posicion3 = $posiciones[3];
				}
        	}
///////////////////////////////////////////////////////////////FIN CONTROL DOBLE EMPATE ///////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////INICIO CONTROL TRIPLE EMPATE/////////////////////////////////////////////////////////////////////////////
        	$triple_empate = $this->existe_triple_empate($puntos1, $puntos2, $puntos3, $puntos4);

        	if ( $triple_empate != NULL )
        	{
        		//reviso quien es el jugador con distinto puntaje y analizo si queda primero o ultimo
        		if ($triple_empate[0] == 1 && $triple_empate[1] == 2 && $triple_empate[2] == 3)
        		{
        			$posiciones_finales = $this->triple_empate_coeficiente_sets($row->id, $zona, $jugador1, $jugador2, $jugador3, $jugador4);
        			
        			//si se pudo resolver por ceoficiente de sets ya esta
        			if ($posiciones_finales != NULL)
        			{
	        			if ($puntos4 > $puntos1)
	        				{$posicion4 = 1; $posicion1 = $posiciones_finales[0]+1; $posicion2 = $posiciones_finales[1]+1; $posicion3 = $posiciones_finales[2]+1;}
	        			else
	        				{$posicion4 = 4; $posicion1 = $posiciones_finales[0]; $posicion2 = $posiciones_finales[1]; $posicion3 = $posiciones_finales[2];}
        			}        			
        			else //sino voy por coeficiente de puntos
        			{
        				$posiciones_finales = $this->triple_empate_coeficiente_puntos($row->id, $zona, $jugador1, $jugador2, $jugador3, $jugador4);
        				if ($posiciones_finales != NULL)
	        			{
		        			if ($puntos4 > $puntos1)
		        				{$posicion4 = 1; $posicion1 = $posiciones_finales[0]+1; $posicion2 = $posiciones_finales[1]+1; $posicion3 = $posiciones_finales[2]+1;}
		        			else
		        				{$posicion4 = 4; $posicion1 = $posiciones_finales[0]; $posicion2 = $posiciones_finales[1]; $posicion3 = $posiciones_finales[2];}
	        			}        	
        			}
        		}
        		if ($triple_empate[0] == 1 && $triple_empate[1] == 2 && $triple_empate[2] == 4)
        		{
        			$posiciones_finales = $this->triple_empate_coeficiente_sets($row->id, $zona, $jugador1, $jugador2, $jugador4, $jugador3);
        			if ($posiciones_finales != NULL)
        			{
	        			if ($puntos3 > $puntos1)
	        				{$posicion3 = 1; $posicion1 = $posiciones_finales[0]+1; $posicion2 = $posiciones_finales[1]+1; $posicion4 = $posiciones_finales[2]+1;}
	        			else
	        				{$posicion3 = 4; $posicion1 = $posiciones_finales[0]; $posicion2 = $posiciones_finales[1]; $posicion4 = $posiciones_finales[2];}
        			}
        			else //sino voy por coeficiente de puntos
        			{
        				$posiciones_finales = $this->triple_empate_coeficiente_puntos($row->id, $jugador1, $jugador2, $jugador4, $jugador3);
        				if ($posiciones_finales != NULL)
	        			{
		        			if ($puntos3 > $puntos1)
		        				{$posicion3 = 1; $posicion1 = $posiciones_finales[0]+1; $posicion2 = $posiciones_finales[1]+1; $posicion4 = $posiciones_finales[2]+1;}
		        			else
		        				{$posicion3 = 4; $posicion1 = $posiciones_finales[0]; $posicion2 = $posiciones_finales[1]; $posicion4 = $posiciones_finales[2];}
	        			}        
        			}
        		}
        		if ($triple_empate[0] == 1 && $triple_empate[1] == 3 && $triple_empate[2] == 4)
        		{
        			$posiciones_finales = $this->triple_empate_coeficiente_sets($row->id, $zona, $jugador1, $jugador3, $jugador4, $jugador2);
        			if ($posiciones_finales != NULL)
        			{
	        			if ($puntos2 > $puntos1)
	        				{$posicion2 = 1; $posicion1 = $posiciones_finales[0]+1; $posicion3 = $posiciones_finales[1]+1; $posicion4 = $posiciones_finales[2]+1;}
	        			else
	        				{$posicion2 = 4; $posicion1 = $posiciones_finales[0]; $posicion3 = $posiciones_finales[1]; $posicion4 = $posiciones_finales[2];}
	        		}
	        		else //sino voy por coeficiente de puntos
        			{
        				$posiciones_finales = $this->triple_empate_coeficiente_puntos($row->id, $jugador1, $jugador3, $jugador4, $jugador2);
        				if ($posiciones_finales != NULL)
	        			{
		        			if ($puntos2 > $puntos1)
		        				{$posicion2 = 1; $posicion1 = $posiciones_finales[0]+1; $posicion3 = $posiciones_finales[1]+1; $posicion4 = $posiciones_finales[2]+1;}
		        			else
		        				{$posicion2 = 4; $posicion1 = $posiciones_finales[0]; $posicion3 = $posiciones_finales[1]; $posicion4 = $posiciones_finales[2];}
	        			}     	
        			}
        		}
        		if ($triple_empate[0] == 2 && $triple_empate[1] == 3 && $triple_empate[2] == 4)
        		{
        			$posiciones_finales = $this->triple_empate_coeficiente_sets($row->id, $zona, $jugador2, $jugador3, $jugador4, $jugador1);
        			if ($posiciones_finales != NULL)
        			{
	        			if ($puntos1 > $puntos2)
	        				{$posicion1 = 1; $posicion2 = $posiciones_finales[0]+1; $posicion3 = $posiciones_finales[1]+1; $posicion4 = $posiciones_finales[2]+1;}
	        			else
	        				{$posicion1 = 4; $posicion2 = $posiciones_finales[0]; $posicion3 = $posiciones_finales[1]; $posicion4 = $posiciones_finales[2];}
	        		}
	        		else //sino voy por coeficiente de puntos
        			{
        				$posiciones_finales = $this->triple_empate_coeficiente_puntos($row->id, $jugador2, $jugador3, $jugador4, $jugador1);
        				if ($posiciones_finales != NULL)
	        			{
		        			if ($puntos1 > $puntos2)
		        				{$posicion1 = 1; $posicion2 = $posiciones_finales[0]+1; $posicion3 = $posiciones_finales[1]+1; $posicion4 = $posiciones_finales[2]+1;}
		        			else
		        				{$posicion1 = 4; $posicion2 = $posiciones_finales[0]; $posicion3 = $posiciones_finales[1]; $posicion4 = $posiciones_finales[2];}
	        			}     
        			}
        		}
        	}




//////////////////////////////////////////////////////////////FIN CONTROL TRIPLE EMPATE/////////////////////////////////////////////////////////////////////////////

		//si no se pudo definir por coeficiente de set, ni coeficiente de puntos, procedo a definir random
		if ($posicion1 == 0 and $posicion2 == 0 and $posicion3 == 0 and $posicion4 = 0)
		{
			//defino posiciones de forma random
			$sorteo = array(1,2,3,4);
			shuffle($sorteo);
			$posicion1 = $sorteo[0];
			$posicion2 = $sorteo[1];
			$posicion3 = $sorteo[2];
			$posicion4 = $sorteo[3];
		}

        	return array($posicion1, $posicion2, $posicion3, $posicion4);
	
	}


	//analiza si existe triple empate en la zona
	private function existe_triple_empate($puntos1, $puntos2, $puntos3, $puntos4)
	{
		if ($puntos1 == $puntos2 and $puntos2 == $puntos3)
		{
			return array(1,2,3);
		}
		if ($puntos1 == $puntos2 and $puntos2 == $puntos4)
		{
			return array(1,2,4);
		}
		if ($puntos1 == $puntos3 and $puntos3 == $puntos4)
		{
			return array(1,3,4);
		}
		if ($puntos2 == $puntos3 and $puntos3 == $puntos4)
		{
			return array(2,3,4);
		}

		return NULL;
	}


	private function triple_empate_coeficiente_sets($torneo, $zona, $jugador1, $jugador2, $jugador3, $distinto)
	{
				$set_a_favor1 =  $this->torneo_model->obtener_set_a_favor($torneo, $zona, $jugador1, $distinto);
        		$set_en_contra1 =  $this->torneo_model->obtener_set_en_contra($torneo, $zona, $jugador1, $distinto);
        		$set_a_favor2 =  $this->torneo_model->obtener_set_a_favor($torneo, $zona, $jugador2, $distinto);
        		$set_en_contra2 =  $this->torneo_model->obtener_set_en_contra($torneo, $zona, $jugador2, $distinto);
        		$set_a_favor3 =  $this->torneo_model->obtener_set_a_favor($torneo, $zona, $jugador3, $distinto);
        		$set_en_contra3 =  $this->torneo_model->obtener_set_en_contra($torneo, $zona, $jugador3, $distinto);        			
	        	log_message('error', 'SET A FAVOR/SET EN CONTRA//// set1 ' . $set_a_favor1 . '/' . $set_en_contra1 . 'set2 '. $set_a_favor2 .'/'. $set_en_contra2 .'set3 '. $set_a_favor3 .'/'. $set_en_contra3);			
        					
	        	$coeficiente1 = $set_a_favor1 / $set_en_contra1;
	        	$coeficiente2 = $set_a_favor2 / $set_en_contra2;
	        	$coeficiente3 = $set_a_favor3 / $set_en_contra3;

	        	log_message('error', 'CALCULO DE COEFICIENTE DE SET//// coef1 ' . $coeficiente1 . 'coef2 ' . $coeficiente2 . 'coef3 '. $coeficiente3);			

	        	//si todos los coeficientes son distintos, se resuelve el triple empate
	        	if ($coeficiente1 <> $coeficiente2 and $coeficiente2 <> $coeficiente3)
	        	{
	        		if ($coeficiente1 > $coeficiente2 and $coeficiente1 > $coeficiente3)
	        			{
	        				$posiciones = $this->obtener_posicion_puntaje_diferente($coeficiente1, $coeficiente2, $coeficiente3);
	        				$posicion1 = $posiciones[0];
	        				$posicion2 = $posiciones[1];
	        				$posicion3 = $posiciones[2];
	        				return array($posicion1, $posicion2, $posicion3);
	        			}
	        		if ($coeficiente2 > $coeficiente1 and $coeficiente2 > $coeficiente3)
		        		{
		        			$posiciones = $this->obtener_posicion_puntaje_diferente($coeficiente2, $coeficiente1, $coeficiente3);
		        			$posicion2 = $posiciones[0];
		        			$posicion1 = $posiciones[1];
		        			$posicion3 = $posiciones[2];
		        			return array($posicion1, $posicion2, $posicion3);
		        		}
	        		if ($coeficiente3 > $coeficiente1 and $coeficiente3 > $coeficiente2)
		        		{
		        			$posiciones = $this->obtener_posicion_puntaje_diferente($coeficiente3, $coeficiente1, $coeficiente2);
		        			$posicion3 = $posiciones[0];
		        			$posicion1 = $posiciones[1];
		        			$posicion2 = $posiciones[2];
		        			return array($posicion1, $posicion2, $posicion3);
		        		}
		        }
		        return NULL;
	}


	private function triple_empate_coeficiente_puntos($torneo, $zona, $jugador1, $jugador2, $jugador3, $distinto)
	{
		$puntos_a_favor1 =  $this->torneo_model->obtener_puntos_a_favor($torneo, $zona, $jugador1, 3, $distinto);
		$puntos_en_contra1 =  $this->torneo_model->obtener_puntos_en_contra($torneo, $zona, $jugador1, 3, $distinto);
		$puntos_a_favor2 =  $this->torneo_model->obtener_puntos_a_favor($torneo, $zona, $jugador2, 3, $distinto);
		$puntos_en_contra2 =  $this->torneo_model->obtener_puntos_en_contra($torneo, $zona, $jugador2, 3, $distinto);
		$puntos_a_favor3 =  $this->torneo_model->obtener_puntos_a_favor($torneo, $zona, $jugador3, 3, $distinto);
		$puntos_en_contra3 =  $this->torneo_model->obtener_puntos_en_contra($torneo, $zona, $jugador3, 3, $distinto);        			
	 	
	 	log_message('error', 'PUNTOS A FAVOR/PUNTOS EN CONTRA//// Puntos1 ' . $puntos_a_favor1 . '/' . $puntos_en_contra1 . 'Puntos2 '. $puntos_a_favor2 .'/'. $puntos_en_contra2 .'Puntos3 '. $puntos_a_favor3 .'/'. $puntos_en_contra3);			
        					
	 	$coef_puntos1 = $puntos_a_favor1 / $puntos_en_contra1;
        $coef_puntos2 = $puntos_a_favor2 / $puntos_en_contra2;
        $coef_puntos3 = $puntos_a_favor3 / $puntos_en_contra3;

        log_message('error', 'CALCULO DE COEFICIENTE DE PUNTOS//// coef1 ' . $coef_puntos1 . 'coef2 ' . $coef_puntos2 . 'coef3 '. $coef_puntos3);	

           	//si todos los coeficientes son distintos, se resuelve el triple empate
        	if ($coef_puntos1 <> $coef_puntos2 and $coef_puntos2 <> $coef_puntos3)
	        	{
	        		if ($coef_puntos1 > $coef_puntos2 and $coef_puntos1 > $coef_puntos3)
	        			{
	        				$posiciones = $this->obtener_posicion_puntaje_diferente($coef_puntos1, $coef_puntos2, $coef_puntos3);
        					$posicion1 = $posiciones[0];
        					$posicion2 = $posiciones[1];
        					$posicion3 = $posiciones[2];
        				return array($posicion1, $posicion2, $posicion3);
        			}
        		if ($coef_puntos2 > $coef_puntos1 and $coef_puntos2 > $coef_puntos3)
		        		{
		        			$posiciones = $this->obtener_posicion_puntaje_diferente($coef_puntos2, $coef_puntos1, $coef_puntos3);
		        			$posicion2 = $posiciones[0];
		        			$posicion1 = $posiciones[1];
		        			$posicion3 = $posiciones[2];
	        			return array($posicion1, $posicion2, $posicion3);
	        		}
        		if ($coef_puntos3 > $coef_puntos1 and $coef_puntos3 > $coef_puntos2)
	        			{
	        				$posiciones = $this->obtener_posicion_puntaje_diferente($coef_puntos3, $coef_puntos1, $coef_puntos2);
		        			$posicion3 = $posiciones[0];
		        			$posicion1 = $posiciones[1];
		        			$posicion2 = $posiciones[2];
	        			return array($posicion1, $posicion2, $posicion3);
	        		}
	        }
	        return NULL;

	}




	private function obtener_posicion_doble_empate($jugador1, $jugador2, $jugador3, $jugador4, $zona)
	{
		//observo el enfrentamiento entre ambos empates
		$partido_empate_1 = $this->torneo_model->obtener_partido_empatado_zona($jugador1, $jugador2, $zona)->result_array();
		$partido_empate_2 = $this->torneo_model->obtener_partido_empatado_zona($jugador3, $jugador4, $zona)->result_array();

		$ganador1 = $this->obtener_ganador_partido($partido_empate_1[0]);
		$ganador2 = $this->obtener_ganador_partido($partido_empate_2[0]);

		if ($ganador1 == $jugador1)
		{
			$posicion1 = 1;
			$posicion2 = 2;
		}
		else
		{
			$posicion1 = 2;
			$posicion2 = 1;
		}


		if ($ganador2 == $jugador3)
		{
			$posicion3 = 3;
			$posicion4 = 4;
		}
		else
		{
			$posicion3 = 4;
			$posicion4 = 3;
		}

		return array($posicion1, $posicion2, $posicion3, $posicion4);

	}






		private function obtener_posicion_puntaje_diferente_4($puntos1, $puntos2, $puntos3, $puntos4)
	{
			//el jugador que saca mayor puntaje tiene el primer puesto
    		
    				$posiciones = array($puntos1, $puntos2, $puntos3, $puntos4);
					rsort($posiciones);

					for ($i = 0; $i<4 ; $i++)
					{
						if ($posiciones[$i] == $puntos1)
							$posicion1 = $i+1;
						if ($posiciones[$i] == $puntos2)
							$posicion2 = $i+1;
						if ($posiciones[$i] == $puntos3)
							$posicion3 = $i+1;
						if ($posiciones[$i] == $puntos4)
							$posicion4 = $i+1;							
					}
    			
    			return array($posicion1, $posicion2, $posicion3, $posicion4);
	}


	public function obtener_ganador_partido($partido)
	{		
		if ($partido['resultado1'] > $partido['resultado2'])
			return $partido['id_jugador1'];
		else
			return $partido['id_jugador2'];
	}

	public function crear_partido_llave($torneo, $categoria, $orden, $instancia)
	{
				//si encuentro creada la llave del rival, creo el partido entre ambos
				if ($orden %2 == 0)
				{
					//var_dump("entro por par");exit;
					$llave_oponente = $this-> torneo_model -> obtener_llave_oponente ($torneo, $categoria, $instancia, $orden-1);

					$llave_rival = $this-> torneo_model -> obtener_llave_oponente ($torneo, $categoria, $instancia, $orden);

					if (isset($llave_oponente))
					{
						$partido = array(		    											
						'jugador1' => $llave_oponente[0]->jugador,			
						'jugador2' => $llave_rival[0]->jugador,
						'arbitro' => NULL,
						'cant_sets'=> $this->torneo_model->obtener_cant_set_instancia($torneo, $categoria, 'LLAVE', $instancia)->first_row()->cant_set,
						'estado'   => 'SIN JUGAR',
						'torneo'   => $torneo,
						'categoria'=> $categoria,
						'tipo'     => 'LLAVE',
						'id_llave1'  => $llave_oponente[0]->id,								
						'id_llave2'  => $llave_rival[0]->id,	
						'id_zona' => NULL,							
						
						);
									
						$id_partido = $this->torneo_model->crear_partido($partido);
					}
				}
				else
				{
					//var_dump("entro por impar");exit;
					$llave_oponente = $this-> torneo_model -> obtener_llave_oponente ($torneo, $categoria, $instancia, $orden+1);

					$llave_rival = $this-> torneo_model -> obtener_llave_oponente ($torneo, $categoria, $instancia, $orden);

					if (isset($llave_oponente))
					{
						$partido = array(		    											
						'jugador1' => $llave_rival[0]->jugador,			
						'jugador2' => $llave_oponente[0]->jugador,
						'arbitro' => NULL,
						'cant_sets'=> $this->torneo_model->obtener_cant_set_instancia($torneo, $categoria, 'LLAVE', $instancia)->first_row()->cant_set,
						'estado'   => 'SIN JUGAR',
						'torneo'   => $torneo,
						'categoria'=> $categoria,
						'tipo'     => 'LLAVE',
						'id_llave1'  => $llave_rival[0]->id,					
						'id_llave2'  => $llave_oponente[0]->id,		
						'id_zona' => NULL,		
						);
									
						$id_partido = $this->torneo_model->crear_partido($partido);
					}
				}

				if (isset($llave_oponente))
				{
					//si alguno jugador pasa BYE resuelvo este partido automaticamente
					if ($llave_oponente[0]->jugador == 0 or $llave_rival[0]->jugador == 0)
					{
						$this->computar_bye_automaticamente($id_partido, $llave_oponente[0]->jugador, $llave_rival[0]->jugador, $this->torneo_model->obtener_cant_set_instancia($torneo, $categoria,
						 'LLAVE', $instancia)->first_row()->cant_set);
					}
				}
				
	}



		public function computar_bye_automaticamente($id_partido, $jugador1, $jugador2, $cant_set)
	{	

		if ($jugador1 == 0)
		{
			$data = array(		    			
			'id' => $this->input->post('id'),			
			'set11' => 0,			
			'set12' => 0,							
			'set13' => 0,							
			'set14' => 0,
			'set15' => 0,
			'resultado1' => 0,

			'set21' => 11,
			'set22' => 11,
			'set23' => 11,
			'set24' => 11,
			'set25' => 11,
			'resultado2' => $cant_set,

			'estado' => 'FINALIZADO',
			
			);
		}


		if ($jugador1 == 0)
		{
			$data = array(		    			
			'id' => $this->input->post('id'),			
			'set11' => 11,			
			'set12' => 11,							
			'set13' => 11,							
			'set14' => 11,
			'set15' => 11,
			'resultado1' => $cant_set,

			'set21' => 0,
			'set22' => 0,
			'set23' => 0,
			'set24' => 0,
			'set25' => 0,
			'resultado2' => 0,

			'estado' => 'FINALIZADO',
			
			);
		}

			$tipo = "LLAVE";
									
			$this->torneo_model->guardarPartido($data);

			//si es un partido de llave, se genera la llave siguiente
			if ($tipo=='LLAVE')
			{
				$partido= $this->torneo_model->obtener_partido_por_id($id_partido);
				$llave1 =$this -> torneo_model -> obtener_llave_por_id($partido[0]->id_llave1);
				$llave2 =$this -> torneo_model -> obtener_llave_por_id($partido[0]->id_llave2);


				if ($partido[0]->resultado1 > $partido[0]->resultado2) //si gano el 1
				{
					$llave = array(		    											
					'jugador' => $partido[0]->id_jugador1,			
					'resultado' => '11-11-11-11-11',					
					'torneo'   => $partido[0]->torneo,
					'instancia'=> ($llave2[0]->instancia) /2,
					'categoria'     => $partido[0]->categoria,
					'orden'  => ($llave2[0]->orden) /2,													
					);
							
					$this->torneo_model->crear_llave($llave);
				}
				else //si gano el 2
				{
					$llave = array(		    											
					'jugador' => $partido[0]->id_jugador2,			
					'resultado' => '11-11-11-11-11',					
					'torneo'   => $partido[0]->torneo,
					'instancia'=> ($llave2[0]->instancia) /2,
					'categoria'     => $partido[0]->categoria,
					'orden'  => ($llave2[0]->orden) /2,													
					);
							
					$this->torneo_model->crear_llave($llave);
				}



				//si encuentro creada la llave del rival, creo el partido entre ambos
				if ($llave['orden'] %2 == 0)
				{
					//var_dump("entro por par");exit;
					$llave_oponente = $this-> torneo_model -> obtener_llave_oponente ($llave['torneo'], $llave['categoria'], 
						$llave['instancia'], $llave['orden']-1);

					$llave_rival = $this-> torneo_model -> obtener_llave_oponente ($llave['torneo'], $llave['categoria'], 
						$llave['instancia'], $llave['orden']);

					if (isset($llave_oponente))
					{
						$partido = array(		    											
						'jugador1' => $llave_oponente[0]->jugador,			
						'jugador2' => $llave_rival[0]->jugador,
						'cant_sets'=> $this->torneo_model->obtener_cant_set_instancia($llave['torneo'], $llave['categoria'], 'LLAVE', $llave['instancia'])->first_row()->cant_set,
						'estado'   => 'SIN JUGAR',
						'torneo'   => $llave['torneo'],
						'categoria'=> $llave['categoria'],
						'tipo'     => 'LLAVE',
						'id_llave1'  => $llave_oponente[0]->id,								
						'id_llave2'  => $llave_rival[0]->id,								
						
						);
									
						$this->torneo_model->crear_partido($partido);
					}
				}
				else
				{
					//var_dump("entro por impar");exit;
					$llave_oponente = $this-> torneo_model -> obtener_llave_oponente ($llave['torneo'], $llave['categoria'], 
						$llave['instancia'], $llave['orden']+1);

					$llave_rival = $this-> torneo_model -> obtener_llave_oponente ($llave['torneo'], $llave['categoria'], 
						$llave['instancia'], $llave['orden']);

					if (isset($llave_oponente))
					{
						$partido = array(		    											
						'jugador1' => $llave_rival[0]->jugador,			
						'jugador2' => $llave_oponente[0]->jugador,
						'cant_sets'=> $this->torneo_model->obtener_cant_set_instancia($llave['torneo'], $llave['categoria'], 'LLAVE', $llave['instancia'])->first_row()->cant_set,
						'estado'   => 'SIN JUGAR',
						'torneo'   => $llave['torneo'],
						'categoria'=> $llave['categoria'],
						'tipo'     => 'LLAVE',
						'id_llave1'  => $llave_rival[0]->id,					
						'id_llave2'  => $llave_oponente[0]->id,				
						);
									
						$this->torneo_model->crear_partido($partido);
					}
				}
			
			}

					
				
	}




	public function organizar_superdivision()
	{
		//obtengo el torneo activo actual
		$torneo = $this->torneo_model->obtenerTorneoActual();

		$row = $torneo->first_row();		

		//obtengo inscriptos al torneo actual, categoria superdivision
		$inscriptos_sd=  $this->torneo_model->obtenerInscripcion($row->id, 0);
		$inscriptos= $inscriptos_sd->result();

		$cant_sd = sizeof($inscriptos);		

		//echo "cantidad de jugadores en SD ".$cant_sd;

		//zona unica todos contra todos
		if ($cant_sd > 1 and $cant_sd < 7)
		{
			$this->armar_zona_unica_sd($inscriptos, $cant_sd, $row->id);			
		}

		//1 zona de 4 j. y otra de 3, a llave A pasan los 2 primeros de cada zona a una llave de simple eliminación, Llave B de 3 j. (zona única)
		if ($cant_sd == 7)
		{
						$letra= 'A';
						//echo "zona de 4".$letra."------";
						$sorteo = array();

						$cabezas = $this->buscarCabezasDeZona($cant_sd, $inscriptos_sd, 0);						
						
						//extraigo las cabezas de zona
						$cabeza1 = array_shift($cabezas)->jugador;
						$cabeza2 = array_shift($cabezas)->jugador;

						//sorteo del nivel 2
						array_push($sorteo, array_shift($cabezas));
						array_push($sorteo, array_shift($cabezas));						
						shuffle($sorteo);						
						$jugador2a= array_shift($sorteo)->jugador;
						$jugador2b= array_shift($sorteo)->jugador;
						
						//sorteo del nivel 3
						array_push($sorteo, array_shift($cabezas));
						array_push($sorteo, array_shift($cabezas));						
						shuffle($sorteo);							
						$jugador3a= array_shift($sorteo)->jugador;
						$jugador3b= array_shift($sorteo)->jugador;
												
						$jugador4a= array_shift($cabezas)->jugador;

						$array = array(
						    "letra" => $letra,
						    "torneo" => $row->id,
						    "categoria" => 0,
						    "jugador1" => $cabeza1,
						    "jugador2" => $jugador2a,
						    "jugador3" => $jugador3a,
						    "jugador4" => $jugador4a,
						    "jugador5" => NULL,
						    "estado"   => 'SIN JUGAR',
						);

					$this->torneo_model->crearZona($array);	

					$letra=++$letra;


					//echo "zona de 3".$letra."------";
						
						$array = array(
						    "letra" => $letra,
						    "torneo" => $row->id,
						    "categoria" => 0,
						    "jugador1" => $cabeza2,
						    "jugador2" => $jugador2b,
						    "jugador3" => $jugador3b,
						    "jugador4" => NULL,
						    "jugador5" => NULL,
						    "estado"   => 'SIN JUGAR',
						);

					$this->torneo_model->crearZona($array);	
		}

		// 2 zonas de 4 j, a llave A pasan los 2 primeros a una llave de simple eliminación, Llave B de 4J (llave simple eliminación)
		if ($cant_sd == 8)
		{
						$letra= 'A';
						//echo "zona de 4".$letra."------";
						$sorteo = array();

						$cabezas = $this->buscarCabezasDeZona($cant_sd, $inscriptos_sd, 0);						
						
						//extraigo las cabezas de zona
						$cabeza1 = array_shift($cabezas)->jugador;
						$cabeza2 = array_shift($cabezas)->jugador;

						//sorteo del nivel 2
						array_push($sorteo, array_shift($cabezas));
						array_push($sorteo, array_shift($cabezas));						
						shuffle($sorteo);						
						$jugador2a= array_shift($sorteo)->jugador;
						$jugador2b= array_shift($sorteo)->jugador;
						
						//sorteo del nivel 3
						array_push($sorteo, array_shift($cabezas));
						array_push($sorteo, array_shift($cabezas));						
						shuffle($sorteo);							
						$jugador3a= array_shift($sorteo)->jugador;
						$jugador3b= array_shift($sorteo)->jugador;
												
						//sorteo del nivel 4
						array_push($sorteo, array_shift($cabezas));
						array_push($sorteo, array_shift($cabezas));						
						shuffle($sorteo);												
						$jugador4a= array_shift($sorteo)->jugador;
						$jugador4b= array_shift($sorteo)->jugador;

						$array = array(
						    "letra" => $letra,
						    "torneo" => $row->id,
						    "categoria" => 0,
						    "jugador1" => $cabeza1,
						    "jugador2" => $jugador2a,
						    "jugador3" => $jugador3a,
						    "jugador4" => $jugador4a,
						    "jugador5" => NULL,
						    "estado"   => 'SIN JUGAR',
						);

					$this->torneo_model->crearZona($array);	

					$letra=++$letra;


					//echo "zona de 4".$letra."------";
						
						$array = array(
						    "letra" => $letra,
						    "torneo" => $row->id,
						    "categoria" => 0,
						    "jugador1" => $cabeza2,
						    "jugador2" => $jugador2b,
						    "jugador3" => $jugador3b,
						    "jugador4" => $jugador4b,
						    "jugador5" => NULL,
						    "estado"   => 'SIN JUGAR',
						);

					$this->torneo_model->crearZona($array);	
		}

		//1 zona de 4J y una zona de 5j (clasifican 3) Llave A de 6 jugadores Los 2 primeros de C/Z esperan en semis 2do vs 3ro / 2do vs 3ro.- Llave B de 3J (zona única)
		if ($cant_sd == 9)
		{
						$letra= 'A';
						//echo "zona de 4".$letra."------";
						$sorteo = array();

						$cabezas = $this->buscarCabezasDeZona($cant_sd, $inscriptos_sd, 0);						
						
						//extraigo las cabezas de zona
						$cabeza1 = array_shift($cabezas)->jugador;
						$cabeza2 = array_shift($cabezas)->jugador;

						//sorteo del nivel 2
						array_push($sorteo, array_shift($cabezas));
						array_push($sorteo, array_shift($cabezas));						
						shuffle($sorteo);						
						$jugador2a= array_shift($sorteo)->jugador;
						$jugador2b= array_shift($sorteo)->jugador;
						
						//sorteo del nivel 3
						array_push($sorteo, array_shift($cabezas));
						array_push($sorteo, array_shift($cabezas));						
						shuffle($sorteo);							
						$jugador3a= array_shift($sorteo)->jugador;
						$jugador3b= array_shift($sorteo)->jugador;
												
						//sorteo del nivel 4
						array_push($sorteo, array_shift($cabezas));
						array_push($sorteo, array_shift($cabezas));						
						shuffle($sorteo);												
						$jugador4a= array_shift($sorteo)->jugador;
						$jugador4b= array_shift($sorteo)->jugador;

						$jugador5b= array_shift($cabezas)->jugador;

						$array = array(
						    "letra" => $letra,
						    "torneo" => $row->id,
						    "categoria" => 0,
						    "jugador1" => $cabeza1,
						    "jugador2" => $jugador2a,
						    "jugador3" => $jugador3a,
						    "jugador4" => $jugador4a,
						    "jugador5" => NULL,
						    "estado"   => 'SIN JUGAR',
						);

					$this->torneo_model->crearZona($array);	

					$letra=++$letra;
					
						//echo "zona de 5".$letra."------";
						

						$array = array(
						    "letra" => $letra,
						    "torneo" => $row->id,
						    "categoria" => 0,
						    "jugador1" => $cabeza2,
						    "jugador2" => $jugador2b,
						    "jugador3" => $jugador3b,
						    "jugador4" => $jugador4b,
						    "jugador5" => $jugador5b,
						    "estado"   => 'SIN JUGAR',
						);

					$this->torneo_model->crearZona($array);	
					
		}

		//2 zonas de 5J cada una (clasifican 3) Llave A de 6 jugadores Los 2 primeros de c/z esperan en semis y juegan 2do vs 3ro / 2do vs 3ro.- Llave B de 4J (llave simple eliminación)
		if ($cant_sd == 10)
		{
						$letra= 'A';
						//echo "zona de 5".$letra."------";
						$sorteo = array();

						$cabezas = $this->buscarCabezasDeZona($cant_sd, $inscriptos_sd, 0);						
						
						//extraigo las cabezas de zona
						$cabeza1 = array_shift($cabezas)->jugador;
						$cabeza2 = array_shift($cabezas)->jugador;

						//sorteo del nivel 2
						array_push($sorteo, array_shift($cabezas));
						array_push($sorteo, array_shift($cabezas));						
						shuffle($sorteo);						
						$jugador2a= array_shift($sorteo)->jugador;
						$jugador2b= array_shift($sorteo)->jugador;
						
						//sorteo del nivel 3
						array_push($sorteo, array_shift($cabezas));
						array_push($sorteo, array_shift($cabezas));						
						shuffle($sorteo);							
						$jugador3a= array_shift($sorteo)->jugador;
						$jugador3b= array_shift($sorteo)->jugador;
												
						//sorteo del nivel 4
						array_push($sorteo, array_shift($cabezas));
						array_push($sorteo, array_shift($cabezas));						
						shuffle($sorteo);												
						$jugador4a= array_shift($sorteo)->jugador;
						$jugador4b= array_shift($sorteo)->jugador;

						//sorteo del nivel 5
						array_push($sorteo, array_shift($cabezas));
						array_push($sorteo, array_shift($cabezas));						
						shuffle($sorteo);												
						$jugador5a= array_shift($sorteo)->jugador;
						$jugador5b= array_shift($sorteo)->jugador;

						$array = array(
						    "letra" => $letra,
						    "torneo" => $row->id,
						    "categoria" => 0,
						    "jugador1" => $cabeza1,
						    "jugador2" => $jugador2a,
						    "jugador3" => $jugador3a,
						    "jugador4" => $jugador4a,
						    "jugador5" => $jugador5a,
						    "estado"   => 'SIN JUGAR',
						);

					$this->torneo_model->crearZona($array);	

					$letra=++$letra;

					//echo "zona de 5".$letra."------";
						
						$array = array(
						    "letra" => $letra,
						    "torneo" => $row->id,
						    "categoria" => 0,
						    "jugador1" => $cabeza2,
						    "jugador2" => $jugador2b,
						    "jugador3" => $jugador3b,
						    "jugador4" => $jugador4b,
						    "jugador5" => $jugador5b,
						    "estado"   => 'SIN JUGAR',
						);

					$this->torneo_model->crearZona($array);	
		}

		//1 zona de 3J y 2 zonas 4J.- (clasifican 2) Llave A de 6J, 1ros de zona A y B esperan en semis, y en 4tos juegan 1ro C vs 2do B y 2do A vs. 2do C, Llave B de 5J (llave simple eliminación, 4to B y 
		//4to C juegan 4tos el resto espera en semis)
		if ($cant_sd == 11)
		{
			$letra= 'A';
						//echo "zona de 3".$letra."------";
						$sorteo = array();

						$cabezas = $this->buscarCabezasDeZona($cant_sd, $inscriptos_sd, 0);						
						
						//extraigo las cabezas de zona
						$cabeza1 = array_shift($cabezas)->jugador;
						$cabeza2 = array_shift($cabezas)->jugador;
						$cabeza3 = array_shift($cabezas)->jugador;

						//sorteo del nivel 2
						array_push($sorteo, array_shift($cabezas));
						array_push($sorteo, array_shift($cabezas));						
						array_push($sorteo, array_shift($cabezas));						
						shuffle($sorteo);						
						$jugador2a= array_shift($sorteo)->jugador;
						$jugador2b= array_shift($sorteo)->jugador;
						$jugador2c= array_shift($sorteo)->jugador;
						
						//sorteo del nivel 3
						array_push($sorteo, array_shift($cabezas));
						array_push($sorteo, array_shift($cabezas));		
						array_push($sorteo, array_shift($cabezas));						
						shuffle($sorteo);							
						$jugador3a= array_shift($sorteo)->jugador;
						$jugador3b= array_shift($sorteo)->jugador;
						$jugador3c= array_shift($sorteo)->jugador;
												
						//sorteo del nivel 4
						array_push($sorteo, array_shift($cabezas));
						array_push($sorteo, array_shift($cabezas));						
						shuffle($sorteo);												
						$jugador4b= array_shift($sorteo)->jugador;
						$jugador4c= array_shift($sorteo)->jugador;

						
						$array = array(
						    "letra" => $letra,
						    "torneo" => $row->id,
						    "categoria" => 0,
						    "jugador1" => $cabeza1,
						    "jugador2" => $jugador2a,
						    "jugador3" => $jugador3a,
						    "jugador4" => NULL,
						    "jugador5" => NULL,
						    "estado"   => 'SIN JUGAR',
						);

					$this->torneo_model->crearZona($array);	

					$letra=++$letra;


					//echo "zona de 4".$letra."------";
											
						$array = array(
						    "letra" => $letra,
						    "torneo" => $row->id,
						    "categoria" => 0,
						    "jugador1" => $cabeza2,
						    "jugador2" => $jugador2b,
						    "jugador3" => $jugador3b,
						    "jugador4" => $jugador4b,
						    "jugador5" => NULL,
						    "estado"   => 'SIN JUGAR',
						);

					$this->torneo_model->crearZona($array);	

					$letra=++$letra;


					//echo "zona de 4".$letra."------";
						
						$array = array(
						    "letra" => $letra,
						    "torneo" => $row->id,
						    "categoria" => 0,
						    "jugador1" => $cabeza3,
						    "jugador2" => $jugador2c,
						    "jugador3" => $jugador3c,
						    "jugador4" => $jugador4c,
						    "jugador5" => NULL,
						    "estado"   => 'SIN JUGAR',
						);

					$this->torneo_model->crearZona($array);	
		}

		//3 zona de 4J (clasifican 2) llave A Idem 11 jugadores Llave B de 6J, 3ros de la zona A y B esperan en semis)
		if ($cant_sd == 12)
		{
						$letra= 'A';
						//echo "zona de 4".$letra."------";
						$sorteo = array();

						$cabezas = $this->buscarCabezasDeZona($cant_sd, $inscriptos_sd, 0);						
						
						//extraigo las cabezas de zona
						$cabeza1 = array_shift($cabezas)->jugador;
						$cabeza2 = array_shift($cabezas)->jugador;
						$cabeza3 = array_shift($cabezas)->jugador;

						//sorteo del nivel 2
						array_push($sorteo, array_shift($cabezas));
						array_push($sorteo, array_shift($cabezas));						
						array_push($sorteo, array_shift($cabezas));						
						shuffle($sorteo);						
						$jugador2a= array_shift($sorteo)->jugador;
						$jugador2b= array_shift($sorteo)->jugador;
						$jugador2c= array_shift($sorteo)->jugador;
						
						//sorteo del nivel 3
						array_push($sorteo, array_shift($cabezas));
						array_push($sorteo, array_shift($cabezas));		
						array_push($sorteo, array_shift($cabezas));						
						shuffle($sorteo);							
						$jugador3a= array_shift($sorteo)->jugador;
						$jugador3b= array_shift($sorteo)->jugador;
						$jugador3c= array_shift($sorteo)->jugador;
												
						//sorteo del nivel 4
						array_push($sorteo, array_shift($cabezas));
						array_push($sorteo, array_shift($cabezas));						
						array_push($sorteo, array_shift($cabezas));						
						shuffle($sorteo);												
						$jugador4a= array_shift($sorteo)->jugador;
						$jugador4b= array_shift($sorteo)->jugador;
						$jugador4c= array_shift($sorteo)->jugador;

						$array = array(
						    "letra" => $letra,
						    "torneo" => $row->id,
						    "categoria" => 0,
						    "jugador1" => $cabeza1,
						    "jugador2" => $jugador2a,
						    "jugador3" => $jugador3a,
						    "jugador4" => $jugador4a,
						    "jugador5" => NULL,
						    "estado"   => 'SIN JUGAR',
						);

					$this->torneo_model->crearZona($array);	

					$letra=++$letra;


					//echo "zona de 4".$letra."------";
										

						$array = array(
						    "letra" => $letra,
						    "torneo" => $row->id,
						    "categoria" => 0,
						    "jugador1" => $cabeza2,
						    "jugador2" => $jugador2b,
						    "jugador3" => $jugador3b,
						    "jugador4" => $jugador4b,
						    "jugador5" => NULL,
						    "estado"   => 'SIN JUGAR',
						);

					$this->torneo_model->crearZona($array);	

					$letra=++$letra;

					//echo "zona de 4".$letra."------";
						
						$array = array(
						    "letra" => $letra,
						    "torneo" => $row->id,
						    "categoria" => 0,
						    "jugador1" => $cabeza3,
						    "jugador2" => $jugador2c,
						    "jugador3" => $jugador3c,
						    "jugador4" => $jugador4c,
						    "jugador5" => NULL,
						    "estado"   => 'SIN JUGAR',
						);

					$this->torneo_model->crearZona($array);	
		}


		$this->armar_partidos($row->id, TRUE, 0);



	}


		public function armar_zona_unica_sd($inscriptos, $cant_sd, $id_torneo)
		{

			if ($cant_sd == 2)
			{
				$array = array(						    
							    "torneo" => $id_torneo,						    
							    "jugador1" => $inscriptos[0]->id_jugador,
							    "jugador2" => $inscriptos[1]->id_jugador,
							    "jugador3" => NULL,
							    "jugador4" => NULL,
							    "jugador5" => NULL,
							    "jugador6" => NULL,
							    "estado" => 'SIN JUGAR',
							    "cant_jugadores" => $cant_sd,
							);


				$partido = array(		    											
					'jugador1' => $array['jugador1'],			
					'jugador2' => $array['jugador2'],
					'cant_sets'=> 3,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,													
					);
								
					$this->torneo_model->crear_partido($partido);

			}

			if ($cant_sd == 3)
			{
				$array = array(						    
							    "torneo" => $id_torneo,						    
							    "jugador1" => $inscriptos[0]->id_jugador,
							    "jugador2" => $inscriptos[1]->id_jugador,
							    "jugador3" => $inscriptos[2]->id_jugador,
							    "jugador4" => NULL,
							    "jugador5" => NULL,
							    "jugador6" => NULL,
							    "estado" => 'SIN JUGAR',
							    "cant_jugadores" => $cant_sd,
							);

				$partido = array(		    											
					'jugador1' => $array['jugador1'],			
					'jugador2' => $array['jugador2'],
					'cant_sets'=> 3,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);

				$partido = array(		    											
					'jugador1' => $array['jugador1'],			
					'jugador2' => $array['jugador3'],
					'cant_sets'=> 3,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);

				$partido = array(		    											
					'jugador1' => $array['jugador2'],			
					'jugador2' => $array['jugador3'],
					'cant_sets'=> 3,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
			}

			if ($cant_sd == 4)
			{
				$array = array(						    
							    "torneo" => $id_torneo,						    
							    "jugador1" => $inscriptos[0]->id_jugador,
							    "jugador2" => $inscriptos[1]->id_jugador,
							    "jugador3" => $inscriptos[2]->id_jugador,
							    "jugador4" => $inscriptos[3]->id_jugador,
							    "jugador5" => NULL,
							    "jugador6" => NULL,
							    "estado" => 'SIN JUGAR',
							    "cant_jugadores" => $cant_sd,
							);
				$partido = array(		    											
					'jugador1' => $array['jugador1'],			
					'jugador2' => $array['jugador2'],
					'cant_sets'=> 3,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
				$partido = array(		    											
					'jugador1' => $array['jugador1'],			
					'jugador2' => $array['jugador3'],
					'cant_sets'=> 3,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
				$partido = array(		    											
					'jugador1' => $array['jugador1'],			
					'jugador2' => $array['jugador4'],
					'cant_sets'=> 3,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
				$partido = array(		    											
					'jugador1' => $array['jugador2'],			
					'jugador2' => $array['jugador3'],
					'cant_sets'=> 3,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
				$partido = array(		    											
					'jugador1' => $array['jugador2'],			
					'jugador2' => $array['jugador4'],
					'cant_sets'=> 3,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
				$partido = array(		    											
					'jugador1' => $array['jugador3'],			
					'jugador2' => $array['jugador4'],
					'cant_sets'=> 3,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
			}

			if ($cant_sd == 5)
			{
				$array = array(						    
							    "torneo" => $id_torneo,						    
							    "jugador1" => $inscriptos[0]->id_jugador,
							    "jugador2" => $inscriptos[1]->id_jugador,
							    "jugador3" => $inscriptos[2]->id_jugador,
							    "jugador4" => $inscriptos[3]->id_jugador,
							    "jugador5" => $inscriptos[4]->id_jugador,
							    "jugador6" => NULL,
							    "estado" => 'SIN JUGAR',
							    "cant_jugadores" => $cant_sd,
							);
				$partido = array(		    											
					'jugador1' => $array['jugador1'],			
					'jugador2' => $array['jugador2'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
				$partido = array(		    											
					'jugador1' => $array['jugador1'],			
					'jugador2' => $array['jugador3'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
				$partido = array(		    											
					'jugador1' => $array['jugador1'],			
					'jugador2' => $array['jugador4'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
				$partido = array(		    											
					'jugador1' => $array['jugador1'],			
					'jugador2' => $array['jugador5'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
				$partido = array(		    											
					'jugador1' => $array['jugador2'],			
					'jugador2' => $array['jugador3'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
				$partido = array(		    											
					'jugador1' => $array['jugador2'],			
					'jugador2' => $array['jugador4'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
				$partido = array(		    											
					'jugador1' => $array['jugador2'],			
					'jugador2' => $array['jugador5'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
				$partido = array(		    											
					'jugador1' => $array['jugador3'],			
					'jugador2' => $array['jugador4'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
				$partido = array(		    											
					'jugador1' => $array['jugador3'],			
					'jugador2' => $array['jugador5'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
				$partido = array(		    											
					'jugador1' => $array['jugador4'],			
					'jugador2' => $array['jugador5'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
				
			}

			if ($cant_sd == 6)
			{
				$array = array(						    
							    "torneo" => $id_torneo,						    
							    "jugador1" => $inscriptos[0]->id_jugador,
							    "jugador2" => $inscriptos[1]->id_jugador,
							    "jugador3" => $inscriptos[2]->id_jugador,
							    "jugador4" => $inscriptos[3]->id_jugador,
							    "jugador5" => $inscriptos[4]->id_jugador,
							    "jugador6" => $inscriptos[5]->id_jugador,
							    "estado" => 'SIN JUGAR',
							    "cant_jugadores" => $cant_sd,
							);
				$partido = array(		    											
					'jugador1' => $array['jugador1'],			
					'jugador2' => $array['jugador2'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
					$partido = array(		    											
					'jugador1' => $array['jugador1'],			
					'jugador2' => $array['jugador3'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
					$partido = array(		    											
					'jugador1' => $array['jugador1'],			
					'jugador2' => $array['jugador4'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
					$partido = array(		    											
					'jugador1' => $array['jugador1'],			
					'jugador2' => $array['jugador5'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
					$partido = array(		    											
					'jugador1' => $array['jugador1'],			
					'jugador2' => $array['jugador6'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
					$partido = array(		    											
					'jugador1' => $array['jugador2'],			
					'jugador2' => $array['jugador3'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
					$partido = array(		    											
					'jugador1' => $array['jugador2'],			
					'jugador2' => $array['jugador4'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
					$partido = array(		    											
					'jugador1' => $array['jugador2'],			
					'jugador2' => $array['jugador5'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
					$partido = array(		    											
					'jugador1' => $array['jugador2'],			
					'jugador2' => $array['jugador6'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
					$partido = array(		    											
					'jugador1' => $array['jugador3'],			
					'jugador2' => $array['jugador4'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
					$partido = array(		    											
					'jugador1' => $array['jugador3'],			
					'jugador2' => $array['jugador5'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
					$partido = array(		    											
					'jugador1' => $array['jugador3'],			
					'jugador2' => $array['jugador6'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
					$partido = array(		    											
					'jugador1' => $array['jugador4'],			
					'jugador2' => $array['jugador5'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
					$partido = array(		    											
					'jugador1' => $array['jugador4'],			
					'jugador2' => $array['jugador6'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
					$partido = array(		    											
					'jugador1' => $array['jugador5'],			
					'jugador2' => $array['jugador6'],
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> 0,
					'tipo'     => 'ZONA_UNICA',
					'id_zona'  => NULL,								
					'id_llave1'  => NULL,
					'id_llave2'  => NULL,
					);
								
					$this->torneo_model->crear_partido($partido);		
			}



			$this->torneo_model->crear_zona_unica($array);	
		}



		public function crear_jugador()
	{			

		$dni = $this->input->post('dni');
		$this->load->model('torneo_model');
		$repetido = $this->torneo_model->verificar_jugador_repetido($dni);
		if ($repetido)
		{
			$this->session->set_flashdata('error', 'Ya existe un jugador con el mismo DNI');
			redirect('Welcome/jugadores');
		}


		//controlo la categoria seteada al jugador, si es inferior lo habilita, si es superior requiere aprobacion
		$categoria= $this->input->post('categoria');
		if ($categoria == 3 or $categoria == 4 or $categoria == 5)
			$habilitado= TRUE;
		else
			$habilitado= FALSE;

			$data = array(		    
			'nombre' => $this->input->post('nombre'),
			'apellido' => $this->input->post('apellido'),
			'categoria' => $this->input->post('categoria'),
			'dni' => $this->input->post('dni'),
			'email' => $this->input->post('email'),
			'telefono' => $this->input->post('telefono'),
			'fecha_nac' => $this->input->post('fecha_nac'),
			'provincia' => $this->input->post('provincia'),
			'ciudad' => $this->input->post('ciudad'),
			'club' => $this->input->post('club'),
			'usuario' => $this->session->userdata('id_usuario'), 			
			'activo' => TRUE,						
			'habilitado' => $habilitado,
			);
			
			if ($habilitado)
				$this->session->set_flashdata('success', 'El jugador ha sido creado con éxito');
			else
				$this->session->set_flashdata('success', 'El jugador ha sido creado con éxito, pero requiere aprobación de categoría por parte de FEBATEM');


			$this->torneo_model->crear_jugador($data);
			redirect('Welcome/jugadores');
	}


	public function crear_club()
	{			
			$data = array(		    
			'nombre' => $this->input->post('nombre'),
			'direccion' => $this->input->post('direccion'),
			'telefono' => $this->input->post('telefono'),			
			'email' => $this->input->post('email'),
			'responsable' => $this->input->post('responsable'),	
			'provincia' => $this->input->post('provincia'),	
			'ciudad' => $this->input->post('ciudad'),		
			);
			
			$this->torneo_model->crear_club($data);
			redirect('Welcome/clubes');
	}



	public function eliminar_jugador()
  {
    
    $data=array();
    $this->load->model('torneo_model');
    $id_jugador = $this->uri->segment(3);   

    $this->torneo_model->eliminar_jugador($id_jugador);

    redirect('Welcome/jugadores');
    
  }

  public function eliminar_club()
  {
    
    $data=array();
    $this->load->model('torneo_model');
    $id_club = $this->uri->segment(3);   

    $this->torneo_model->eliminar_club($id_club);

    redirect('Welcome/clubes');
    
  }



  public function eliminar_torneo()
  {
    
    $data=array();
    $this->load->model('torneo_model');
    $id_torneo = $this->uri->segment(3);   

    $this->torneo_model->eliminar_mesas($id_torneo);
    $this->torneo_model->eliminar_torneo($id_torneo);

    redirect('Welcome/torneos');
    
  }




public function eliminar_inscripcion()
  {
    
    $data=array();
    $this->load->model('torneo_model');
    $id_inscripcion = $this->uri->segment(3);   

    $this->torneo_model->eliminar_inscripcion($id_inscripcion);

    $this->session->set_flashdata('success', 'La inscripción fué eliminada con éxito');

    redirect('Welcome/inscripcion');
    
  }


  public function seleccionar_torneo()
  {
    
    $data=array();
    $this->load->model('torneo_model');
    $id_torneo = $this->uri->segment(3);   
    $usuario = $this->session->userdata('id_usuario');

    $this->torneo_model->desactivar_torneos($usuario);
    $this->torneo_model->activar_torneo($id_torneo);

    redirect('Welcome/torneos');
    
  }



  public function resetear_torneo()
  {
  	$this->load->model('torneo_model');
  	$id_torneo = $this->uri->segment(3);

	$this->torneo_model->eliminar_partidos_torneo($id_torneo);
  	$this->torneo_model->eliminar_zonas_torneo($id_torneo);  	
  	$this->torneo_model->eliminar_llave_torneo($id_torneo);

  	redirect('Welcome/torneos');
  }



  public function procesar_llave()
  {  	

  	  //$categoria = $this->input->post('id_categoria');
  		$categoria = $this->uri->segment(3);
  	  $torneo = $this->torneo_model->obtenerTorneoActual();



		if ($this->torneo_model->existen_resultados_llave($torneo->first_row()->id, $categoria))
		  	{
		  		$this->session->set_flashdata('error', 'La llave ya ha sido procesada');
				redirect('Welcome/llave');
		  	}	

  	  $ganador_llave = $this->torneo_model->obtener_llave($torneo->first_row()->id, $categoria, 1);

  	  if ($ganador_llave != NULL and isset($ganador_llave[0]))
  	  		{
  	  			//registro el ganador del torneo en la primera posicion
  	  			$this->torneo_model->guardar_resultado_torneo($ganador_llave[0]->id_jugador, $torneo->first_row()->id, $categoria, 1);
  	  			$partidos_llave = $this->torneo_model->obtenerPartidos($torneo->first_row()->id,$categoria,'LLAVE')->result();
  	  			 if (isset($partidos_llave)){
                           for($i=0; $i<sizeof($partidos_llave); $i++){
                           		//si el jugador 1 perdio le calculo la posicion correspondiente sabiendo la del ganador
                           		if ($partidos_llave[$i]->resultado1 < $partidos_llave[$i]->resultado2)
                           		{                           			
                           			$posicion_obtenida = $this->obtener_posicion_torneo($partidos_llave[$i]->id_jugador2, $torneo->first_row()->id, $categoria, $partidos_llave[$i]->instancia);
                           			$this->torneo_model->guardar_resultado_torneo($partidos_llave[$i]->id_jugador1, $torneo->first_row()->id, $categoria, $posicion_obtenida);
                           		}
                           		else
                           		{                           			
                           			$posicion_obtenida = $this->obtener_posicion_torneo($partidos_llave[$i]->id_jugador1, $torneo->first_row()->id, $categoria, $partidos_llave[$i]->instancia);
                           			$this->torneo_model->guardar_resultado_torneo($partidos_llave[$i]->id_jugador2, $torneo->first_row()->id, $categoria, $posicion_obtenida);
                           		}

                           }
  	  			}
  	  			else
  	  			{
					$this->session->set_flashdata('error', 'No existen partidos a procesar');
					redirect('Welcome/llave');
  	  			}


  	  			//elimino los byes de los resultados
  	  			$posiciones = $this->torneo_model->obtener_resultados_torneo($torneo->first_row()->id, $categoria)->result();
  	  			$cant_byes = 0;
  	  			$consecutivos = 0;
  	  			if (isset($posiciones))
  	  			{
  	  				for($i=0; $i<sizeof($posiciones); $i++){
  	  					if ($posiciones[$i]->id_jugador == 0)
  	  						{
  	  							$this->torneo_model->eliminar_posicion($posiciones[$i]->id);
  	  							$cant_byes++;
  	  							  	  							
  	  						}
  	  						else
  	  						{  	  	
  	  							
  	  							//log_message('error', 'id ' . $posiciones[$i]->id . 'pos ' . $posiciones[$i]->posicion . 'cant_byes ' . $cant_byes . 'consecutivos ' . $consecutivos);			

  	  								
  	  							if ($cant_byes != 0)
  	  							{  	  								
  	  								$this->torneo_model->actualizar_posicion($posiciones[$i]->id, $posiciones[$i]->posicion - $cant_byes);
  	  							}
  	  							
  	  						}
  	  				}

  	  			}

  	  			
				$this->session->set_flashdata('success', 'La llave ha sido procesada con éxito');
				redirect('Welcome/llave/');
			}
			else
				{					
					$this->session->set_flashdata('error', 'No es posible procesar la llave en este momento, parece que no ha finalizado');
					redirect('Welcome/llave/');
				}


  }



  private function obtener_posicion_torneo($jugador, $torneo, $categoria, $instancia)
  {  	
  	$posicion = $this->torneo_model->obtener_posicion_torneo($jugador, $torneo, $categoria);

	//lo normal es que el 3 pierde con el 1, el 4-2, 5-1, 6-2, 7-3, 8-4, 9-1, 10-2, 11-3, 12-4, 13-5, 14-6, 15-7, 16-8.

  	//FINAL
  	if ($instancia == 2)
  		if ($posicion == 1) return 2;
  	//SEMIFINAL
  	if ($instancia == 4)
  	{
  		if ($posicion == 1) return 3;
  		if ($posicion == 2) return 4;
  	}
  	//CUARTOS DE FINAL
  	if ($instancia == 8)
  	{
  		if ($posicion == 1) return 5;
  		if ($posicion == 2) return 6;
  		if ($posicion == 3) return 7;
  		if ($posicion == 4) return 8;
  	}
  	//OCTAVOS DE FINAL
  	if ($instancia == 16)
  	{
  		if ($posicion == 1) return 9;
	  	if ($posicion == 2) return 10;
	  	if ($posicion == 3) return 11;
	  	if ($posicion == 4) return 12;
	  	if ($posicion == 5) return 13;
	  	if ($posicion == 6) return 14;
	  	if ($posicion == 7) return 15;
	  	if ($posicion == 8) return 16;
	 }
  	//16VOS DE FINAL  	
  	if ($instancia == 32)
  	{
  		if ($posicion == 1) return 17;
	  	if ($posicion == 2) return 18;
	  	if ($posicion == 3) return 19;
	  	if ($posicion == 4) return 20;
	  	if ($posicion == 5) return 21;
	  	if ($posicion == 6) return 22;
	  	if ($posicion == 7) return 23;
	  	if ($posicion == 8) return 24;
	  	if ($posicion == 9) return 25;
	  	if ($posicion == 10) return 26;
	  	if ($posicion == 11) return 27;
	  	if ($posicion == 12) return 28;
	  	if ($posicion == 13) return 29;
	  	if ($posicion == 14) return 30;
	  	if ($posicion == 15) return 31;
	  	if ($posicion == 16) return 32;  	  	
	  }

  }




public function definir_cant_sets_zona()
{
	$categoria= $this->input->get('categoria');
	$zonas= $this->input->get('zonas');	
	$trentidosavos= $this->input->get('trentidosavos');	
	$dieciseisavos= $this->input->get('dieciseisavos');	
	$octavos= $this->input->get('octavos');	
	$cuartos= $this->input->get('cuartos');	
	$semi= $this->input->get('semis');	
	$final= $this->input->get('final');	

	$torneo = $this->torneo_model->obtenerTorneoActual();

	if ($categoria == -1)
		  	{
		  		$this->session->set_flashdata('error', 'Debe seleccionar una categoría');
				redirect('Welcome/definir_cant_set_zonas');
		  	}	


	$this->torneo_model->definir_cant_set($torneo->first_row()->id, $categoria, $zonas, $trentidosavos, $dieciseisavos, $octavos, $cuartos, $semi, $final);	  	

	//seteo cant set a los partidos ya creados
	$this->torneo_model->definir_cant_set_zonas($torneo->first_row()->id, $categoria, $zonas);
	$this->torneo_model->definir_cant_set_llaves($torneo->first_row()->id, $categoria, 32, $trentidosavos);
	$this->torneo_model->definir_cant_set_llaves($torneo->first_row()->id, $categoria, 16, $dieciseisavos);
	$this->torneo_model->definir_cant_set_llaves($torneo->first_row()->id, $categoria, 8, $octavos);
	$this->torneo_model->definir_cant_set_llaves($torneo->first_row()->id, $categoria, 4, $cuartos);
	$this->torneo_model->definir_cant_set_llaves($torneo->first_row()->id, $categoria, 2, $semi);
	$this->torneo_model->definir_cant_set_llaves($torneo->first_row()->id, $categoria, 1, $final);

	$this->session->set_flashdata('success', 'La cantidad de sets se ha configurado correctamente');
	redirect('Welcome/definir_cant_set_zonas');

}





public function deshacer_zonas()
{
	$categoria= $this->input->get('categoria');
	$torneo = $this->torneo_model->obtenerTorneoActual();

/*
	if ($this->torneo_model->existen_partidos_llave($torneo, $categoria))
	{
		$this->session->set_flashdata('error', 'No es posible deshacer las zonas, ya existen partidos a jugar en instancia de llave');
		redirect('Welcome/deshacer_zonas');
	}
*/

	$this->torneo_model->eliminar_zonas($torneo->first_row()->id, $categoria);
	$this->torneo_model->eliminar_partidos($torneo->first_row()->id, $categoria);
	$this->torneo_model->eliminar_llaves($torneo->first_row()->id, $categoria);

	$this->session->set_flashdata('success', 'Las zonas de la categoría elegida se han eliminado con éxito');
	redirect('Welcome/deshacer_zonas');

}


}
