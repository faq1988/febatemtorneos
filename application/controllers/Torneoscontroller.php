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
		$categorias= $this->input->post('categorias');		
		$sd=FALSE;
		$primera=FALSE;
		$segunda=FALSE;
		$tercera=FALSE;
		$cuarta=FALSE;
		$quinta=FALSE;
		if (isset($categorias)){
             for($i=0; $i<sizeof($categorias); $i++)
             {
             	if ($categorias[$i]==0)
             		$sd=TRUE;
             	if ($categorias[$i]==1)
             		$primera=TRUE;
             	if ($categorias[$i]==2)
             		$segunda=TRUE;
             	if ($categorias[$i]==3)
             		$tercera=TRUE;
             	if ($categorias[$i]==4)
             		$cuarta=TRUE;
             	if ($categorias[$i]==5)
             		$quinta=TRUE;
             }
         }

		
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
			);

			$this->torneo_model->desactivar_torneos($this->session->userdata('id_usuario'));
			
			$this->torneo_model->crearTorneo($data);
			$torneo= $this->torneo_model->obtenerTorneoActual();
			$this->torneo_model->crear_mesas($data['cant_mesas'], $torneo->first_row()->id);

			redirect('Welcome/torneos');
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

         	$this->session->set_flashdata('success', 'La inscripción fué procesada correctamente');
			redirect('Welcome/inscripcion');
	}



	public function armar_zonas()
	{
		//obtengo el torneo activo actual
		$torneo = $this->torneo_model->obtenerTorneoActual();
		$resumen="";
		$cantPrimera=0;
		if(isset($torneo))
		{
			$row = $torneo->first_row();		

			//obtengo inscriptos al torneo actual, categoria primera
			$inscriptos=  $this->torneo_model->obtenerInscripcion($row->id, 1);
			

			if (isset($inscriptos))
				$cantPrimera = sizeof($inscriptos->result());	
/*
			if ($cantPrimera < 12)
			{
				$this->session->set_flashdata('error', 'Para cerrar inscripciones debe haber al menos 12 jugadores en Primera');
				redirect('Welcome/inscripcion');
			}
*/
			$modulo = $cantPrimera % 3;
			$cantZonas3 = 0;
			$cantZonas4 = 0;			

			if($modulo == 0)
					{
						$division = $cantPrimera / 3;
						$cantZonas3 = $division;
						$resumen= $resumen. "caso cero Para ". $cantPrimera." jugadores se armaron ". $cantZonas3." zonas de 3 y ". $cantZonas4." zonas de 4";
						$resumen= $resumen. '</br>';

					}				
					else
						if ($modulo == 1)
						{
							$division = $cantPrimera / 3;
							$cantZonas3 = floor($division);
							$cantZonas3 = $cantZonas3-1;
							$cantZonas4 = 1; 
							$resumen= $resumen. "caso uno Para ". $cantPrimera." jugadores se armaron ". $cantZonas3." zonas de 3 y ". $cantZonas4." zonas de 4";				
							$resumen= $resumen. '</br>';
						}
						else
							if ($modulo == 2)
							{
								$division = $cantPrimera / 3;
								$cantZonas3 = floor($division);
								$cantZonas3 = $cantZonas3-2;
								$cantZonas4 = 2; 
								$resumen= $resumen. "caso dos Para ". $cantPrimera." jugadores se armaron ". $cantZonas3." zonas de 3 y ". $cantZonas4." zonas de 4";	
								$resumen= $resumen. '</br>';
							}
					
		$resumen= $resumen. 'cantidad de cabezas de zona '. ($cantZonas3+$cantZonas4);
		$resumen= $resumen. '</br>';

		
		$cabezas = $this->buscarCabezasDeZona($cantZonas3*3 + $cantZonas4*4, $inscriptos, 1);	
	
		for($i=0; $i<sizeof($cabezas); $i++)
			{
				$resumen= $resumen. 'lista de cabezas '. $cabezas[$i]->jugador;
				$resumen= $resumen. '</br>';
			}				

		$inscriptos_sin_cabezas= $this->eliminar_cabezas_inscriptos($cabezas, $cantZonas3+$cantZonas4);
		


		$this->guardar_zonas($row->id, $cantZonas3, $cantZonas4, $cabezas, $inscriptos_sin_cabezas);

		$this->armar_partidos($row->id, TRUE, 1);


		$this->crear_byes_llave($row->id, $cantPrimera, 1);
	}
	else
	{
		$resumen="No se ha realizado ninguna accion";
	}

		$data['resumen']= $resumen;
		$torneo = $this->torneo_model->obtenerTorneoActual();   
	    if (isset($torneo))
	      $t['nombre_torneo'] = $torneo->first_row()->nombre;
	    else
	      $t['nombre_torneo'] = "NINGUNO";
		$this->load->view('menu');
    	$this->load->view('header', $t);
    	$this->load->view('cierre_inscripcion', $data); 

	}



	public function crear_byes_llave($torneo, $cant_inscriptos, $categoria)
	{
		$template_llave= array();
    	if ($cant_inscriptos>0)
      		$template_llave = $this->torneo_model->obtener_plantilla_con_byes($cant_inscriptos);

      if (isset($template_llave))
    {
      $llave_incompleta= $template_llave->result_array();

      if ($cant_inscriptos < 16)
      	$instancia= 16;
      else
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

/*
	$result= $segundo_nivel;						
				for($i=0; $i<sizeof($result); $i++)
					{
						echo "inscriptos".$result[$i]."------";						
					}
*/
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
			'set13' => $this->input->post('set13'),							
			'set14' => $this->input->post('set14'),							
			'set15' => $this->input->post('set15'),
			'resultado1' => $this->input->post('total1'),

			'set21' => $this->input->post('set21'),			
			'set22' => $this->input->post('set22'),							
			'set23' => $this->input->post('set23'),							
			'set24' => $this->input->post('set24'),							
			'set25' => $this->input->post('set25'),							
			'resultado2' => $this->input->post('total2'),

			'estado' => 'FINALIZADO',
			
			);

			$tipo = $this->input->post('tipo');
						
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
						'cant_sets'=> 5,
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
						'cant_sets'=> 5,
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

			if ($tipo=='ZONA')
				redirect('welcome/partidos_zona');
			if ($tipo=='LLAVE')
				redirect('welcome/partidos_llave');
	}



	//armado de partidos a jugar en un torneo
	public function armar_partidos($id_torneo, $es_zona, $categoria)
	{
		if ($es_zona) //armar partidos de zonas
		{
			$zonas = $this->torneo_model->obtenerZonas($id_torneo,$categoria)->result();

			for($i=0; $i<sizeof($zonas); $i++)
			{
				//if ($zonas[$i]->jugador4 == NULL) //es partido de zona de 3
				if (!isset($zonas[$i]->jugador4)) //es partido de zona de 3
				{
					//1 vs 2
					$data = array(		    											
					'jugador1' => $zonas[$i]->id_jugador1,			
					'jugador2' => $zonas[$i]->id_jugador2,
					'cant_sets'=> 5,
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
					'cant_sets'=> 5,
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
					'cant_sets'=> 5,
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

				else
				{
				if (!isset($zonas[$i]->jugador5)) //es partido de zona de 4
				{
					//1 vs 2
					$data = array(		    											
					'jugador1' => $zonas[$i]->id_jugador1,			
					'jugador2' => $zonas[$i]->id_jugador2,
					'cant_sets'=> 5,
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
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> $categoria,
					'tipo'     => 'ZONA',
					'id_zona'  => $zonas[$i]->id,	
					'id_llave1' => NULL,
					'id_llave2' => NULL,							
					
					);
								
					$this->torneo_model->crear_partido($data);

					//1 vs 4
					$data = array(		    											
					'jugador1' => $zonas[$i]->id_jugador1,			
					'jugador2' => $zonas[$i]->id_jugador4,
					'cant_sets'=> 5,
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
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> $categoria,
					'tipo'     => 'ZONA',
					'id_zona'  => $zonas[$i]->id,	
					'id_llave1' => NULL,
					'id_llave2' => NULL,							
					
					);
								
					$this->torneo_model->crear_partido($data);

					//2 vs 4
					$data = array(		    											
					'jugador1' => $zonas[$i]->id_jugador2,			
					'jugador2' => $zonas[$i]->id_jugador4,
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> $categoria,
					'tipo'     => 'ZONA',
					'id_zona'  => $zonas[$i]->id,	
					'id_llave1' => NULL,
					'id_llave2' => NULL,							
					
					);
								
					$this->torneo_model->crear_partido($data);

					//3 vs 4
					$data = array(		    											
					'jugador1' => $zonas[$i]->id_jugador3,			
					'jugador2' => $zonas[$i]->id_jugador4,
					'cant_sets'=> 5,
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
				else //es partido de zona de 5
				{
					//1 vs 2
					$data = array(		    											
					'jugador1' => $zonas[$i]->id_jugador1,			
					'jugador2' => $zonas[$i]->id_jugador2,
					'cant_sets'=> 5,
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
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> $categoria,
					'tipo'     => 'ZONA',
					'id_zona'  => $zonas[$i]->id,
					'id_llave1' => NULL,
					'id_llave2' => NULL,								
					
					);
								
					$this->torneo_model->crear_partido($data);

					//1 vs 4
					$data = array(		    											
					'jugador1' => $zonas[$i]->id_jugador1,			
					'jugador2' => $zonas[$i]->id_jugador4,
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> $categoria,
					'tipo'     => 'ZONA',
					'id_zona'  => $zonas[$i]->id,	
					'id_llave1' => NULL,
					'id_llave2' => NULL,							
					
					);
								
					$this->torneo_model->crear_partido($data);

					//1 vs 5
					$data = array(		    											
					'jugador1' => $zonas[$i]->id_jugador1,			
					'jugador2' => $zonas[$i]->id_jugador5,
					'cant_sets'=> 5,
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
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> $categoria,
					'tipo'     => 'ZONA',
					'id_zona'  => $zonas[$i]->id,	
					'id_llave1' => NULL,
					'id_llave2' => NULL,							
					
					);
								
					$this->torneo_model->crear_partido($data);

					//2 vs 4
					$data = array(		    											
					'jugador1' => $zonas[$i]->id_jugador2,			
					'jugador2' => $zonas[$i]->id_jugador4,
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> $categoria,
					'tipo'     => 'ZONA',
					'id_zona'  => $zonas[$i]->id,	
					'id_llave1' => NULL,
					'id_llave2' => NULL,							
					
					);
								
					$this->torneo_model->crear_partido($data);

					//2 vs 5
					$data = array(		    											
					'jugador1' => $zonas[$i]->id_jugador2,			
					'jugador2' => $zonas[$i]->id_jugador5,
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> $categoria,
					'tipo'     => 'ZONA',
					'id_zona'  => $zonas[$i]->id,
					'id_llave1' => NULL,
					'id_llave2' => NULL,								
					
					);
								
					$this->torneo_model->crear_partido($data);

					//3 vs 4
					$data = array(		    											
					'jugador1' => $zonas[$i]->id_jugador3,			
					'jugador2' => $zonas[$i]->id_jugador4,
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> $categoria,
					'tipo'     => 'ZONA',
					'id_zona'  => $zonas[$i]->id,
					'id_llave1' => NULL,
					'id_llave2' => NULL,								
					
					);
								
					$this->torneo_model->crear_partido($data);

					//3 vs 5
					$data = array(		    											
					'jugador1' => $zonas[$i]->id_jugador3,			
					'jugador2' => $zonas[$i]->id_jugador5,
					'cant_sets'=> 5,
					'estado'   => 'SIN JUGAR',
					'torneo'   => $id_torneo,
					'categoria'=> $categoria,
					'tipo'     => 'ZONA',
					'id_zona'  => $zonas[$i]->id,
					'id_llave1' => NULL,
					'id_llave2' => NULL,								
					
					);
								
					$this->torneo_model->crear_partido($data);

					//4 vs 5
					$data = array(		    											
					'jugador1' => $zonas[$i]->id_jugador4,			
					'jugador2' => $zonas[$i]->id_jugador5,
					'cant_sets'=> 5,
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
			}
		}



		else //armar partidos de llave
		{

		}
	}
	






	//guarda los campos editados de una zona
	public function guardar_zona()
	{			
		$pos4=$this->input->post('posicion4');
		if (isset($pos4))
		{
			$data = array(		    			
			'id' => $this->input->post('id'),			
			'pos1' => $this->input->post('posicion1'),			
			'pos2' => $this->input->post('posicion2'),							
			'pos3' => $this->input->post('posicion3'),							
			'pos4' => $this->input->post('posicion4'),									
			'estado' => 'FINALIZADA',
			
			);
		}
		else
		{			
			$data = array(		    			
			'id' => $this->input->post('id'),			
			'pos1' => $this->input->post('posicion1'),			
			'pos2' => $this->input->post('posicion2'),							
			'pos3' => $this->input->post('posicion3'),							
			'pos4' => null,									
			'estado' => 'FINALIZADA',			
			);	
		}
									
			$this->torneo_model->guardarZona($data);

			//obtengo la zona recientemente cargada para generar el pase de jugadores a llave
			$zona_cargada= 	$this->torneo_model->obtener_zona_por_id($data['id']);
			$cant_inscriptos= $this->torneo_model->obtener_cant_inscriptos($zona_cargada[0]->torneo, 
				$zona_cargada[0]->categoria);

			//entre 12 y 16 inscriptos la instancia de llave comienza en 16avos
			if ($cant_inscriptos > 11 and $cant_inscriptos <17)
			{				
				$orden_llave= $this->torneo_model->obtener_posicion_plantilla($cant_inscriptos, '1'.$zona_cargada[0]->letra);
				$primero= $this->torneo_model->obtener_posicion_jugador_zona($data['id'], 1);

				$data_llave = array(
					'jugador' => $primero[0]->id,
					'torneo'  => $zona_cargada[0]->torneo,
					'instancia' => 16,
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
					'instancia' => 16,
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
					'instancia' => 16,
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
					'instancia' => 16,
					'categoria' => $zona_cargada[0]->categoria,
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



			
			redirect('welcome/zonas');
	}



	public function crear_partido_llave($torneo, $categoria, $orden, $instancia)
	{
		
				//si encuentro creada la llave del rival, creo el partido entre ambos
				if ($orden %2 == 0)
				{
					//var_dump("entro por par");exit;
					$llave_oponente = $this-> torneo_model -> obtener_llave_oponente ($torneo, $categoria, 
						$instancia, $orden-1);

					$llave_rival = $this-> torneo_model -> obtener_llave_oponente ($torneo, $categoria, 
						$instancia, $orden);

					if (isset($llave_oponente))
					{
						$partido = array(		    											
						'jugador1' => $llave_oponente[0]->jugador,			
						'jugador2' => $llave_rival[0]->jugador,
						'cant_sets'=> 5,
						'estado'   => 'SIN JUGAR',
						'torneo'   => $torneo,
						'categoria'=> $categoria,
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
					$llave_oponente = $this-> torneo_model -> obtener_llave_oponente ($torneo, $categoria, 
						$instancia, $orden+1);

					$llave_rival = $this-> torneo_model -> obtener_llave_oponente ($torneo, $categoria, 
						$instancia, $orden);

					if (isset($llave_oponente))
					{
						$partido = array(		    											
						'jugador1' => $llave_rival[0]->jugador,			
						'jugador2' => $llave_oponente[0]->jugador,
						'cant_sets'=> 5,
						'estado'   => 'SIN JUGAR',
						'torneo'   => $torneo,
						'categoria'=> $categoria,
						'tipo'     => 'LLAVE',
						'id_llave1'  => $llave_rival[0]->id,					
						'id_llave2'  => $llave_oponente[0]->id,				
						);
									
						$this->torneo_model->crear_partido($partido);
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

}
