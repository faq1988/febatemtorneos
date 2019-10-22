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
	public function index()
	{
		redirect('Login');
	}


  public function ver_turnos()
  {    

      if (!$this->session->userdata('username'))
    {
      redirect('login');
    }
    $data=array();
    $this->load->model('turnos_model');
    $lista_turnos=  $this->turnos_model->obtener_turnos();

    if (isset($lista_turnos))
      $data['turnos']= $lista_turnos->result_array();

    $this->load->view('menu');
    $this->load->view('header');
    $this->load->view('ver_turnos', $data);    
  }



	 public function login()
  {
    if (!$this->session->userdata('username'))
    {
      redirect('login');
    }
    $data=array();
    $this->load->model('usuario_model');
    $this->load->model('torneo_model');
    $usuario= $this->usuario_model->obtener_usuario($this->session->userdata('username')) ->result();
    
    $torneo = $this->torneo_model->obtenerTorneoActual();   
    $data['nombre_torneo'] = $torneo->first_row()->nombre;
  
    $this->load->view('menu');
    $this->load->view('header', $data);
    $this->load->view('welcome_message');
  }



  public function cambiar_contrasenia()
  {
     if (!$this->session->userdata('username'))
    {
      redirect('login');
    }
       
    $data=array();
    $this->load->model('usuario_model');
    $this->load->model('torneo_model');
    $perfil=  $this->usuario_model->obtener_usuario_por_id($this->session->userdata('id_usuario'));

    
    if (isset($perfil))
    $data['perfil']= $perfil->result();
  
    $torneo = $this->torneo_model->obtenerTorneoActual();   
    $t['nombre_torneo'] = $torneo->first_row()->nombre;
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('cambiar_contrasenia', $data);
  }




  public function obtener_turno()
  {
     if (!$this->session->userdata('username'))
    {
      redirect('login');
    }   
    $data=array();
    $this->load->model('turnos_model');
    $lista_especialidades= $this->turnos_model->obtener_especialidades();
    $lista_profesionales= $this->turnos_model->obtener_profesionales();

    if (isset($lista_especialidades))
      $data['especialidades']= $lista_especialidades->result_array();
    if (isset($lista_profesionales))
      $data['profesionales']= $lista_profesionales->result_array();

  
    $this->load->view('menu');
    $this->load->view('header');
    $this->load->view('obtener_turno', $data);
    
 
  }




  public function plantilla_llaves()
  {
       if (!$this->session->userdata('username'))
    {
      redirect('login');
    }  

    $this->load->model('torneo_model');
    $data=array();
    $plantilla=  $this->torneo_model->obtener_plantilla();

    if (isset($plantilla))
      $data['plantilla']= $plantilla->result();

    $torneo = $this->torneo_model->obtenerTorneoActual();   
    $t['nombre_torneo'] = $torneo->first_row()->nombre;
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('plantilla_llaves', $data);
  }


public function ranking()
  {
       if (!$this->session->userdata('username'))
    {
      redirect('login');
    }  

    $this->load->model('torneo_model');
    //$torneo = $this->torneo_model->obtenerTorneoActual();
    $data=array();
    //$row = $torneo->first_row();  
    $categoria = $this->uri->segment(3); 

    $ranking=  $this->torneo_model->obtener_ranking($categoria);
    
    if (isset($ranking))
      $data['ranking']= $ranking->result_array();

//var_dump($data);exit;
    $torneo = $this->torneo_model->obtenerTorneoActual();   
    $t['nombre_torneo'] = $torneo->first_row()->nombre;
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('ranking', $data);
  }


  public function crear_torneo()
  {
    if (!$this->session->userdata('username'))
    {
      redirect('login');
    }  
    $data=array();
    $this->load->model('torneo_model');
    $torneo = $this->torneo_model->obtenerTorneoActual();   
    $data['nombre_torneo'] = $torneo->first_row()->nombre;

    $this->load->view('menu');
    $this->load->view('header',$data);
    $this->load->view('crear_torneo');
  }



public function jugadores()
  {
    if (!$this->session->userdata('username'))
    {
      redirect('login');
    }  
    $data=array();
    $this->load->model('torneo_model');
    
    $jugadores=  $this->torneo_model->obtener_jugadores();

    if (isset($jugadores))
    $data['jugadores']= $jugadores->result_array();

    $torneo = $this->torneo_model->obtenerTorneoActual();   
    $t['nombre_torneo'] = $torneo->first_row()->nombre;
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('jugadores', $data);
  }


    public function llave()
  {
    if (!$this->session->userdata('username'))
    {
      redirect('login');
    }
    $data=array();
    $this->load->model('torneo_model');
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




public function zonas()
  {
     if (!$this->session->userdata('username'))
    {
      redirect('login');
    }
    $data=array();
    $this->load->model('torneo_model');

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



  public function partidos_zona()
  {
     if (!$this->session->userdata('username'))
    {
      redirect('login');
    }
    $data=array();
    $this->load->model('torneo_model');

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
    $this->load->view('partidos_zona', $data);
  }





public function usuarios()
  {
    if (!$this->session->userdata('username'))
    {
      redirect('login');
    }  
    $data=array();
    $this->load->model('usuario_model');
    $this->load->model('torneo_model');
    
    $usuarios=  $this->usuario_model->obtener_usuarios();

    if (isset($usuarios))
    $data['usuarios']= $usuarios->result_array();

    $torneo = $this->torneo_model->obtenerTorneoActual();   
    $t['nombre_torneo'] = $torneo->first_row()->nombre;
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('usuarios', $data);
  }



public function inscripcion()
  {
    if (!$this->session->userdata('username'))
    {
      redirect('login');
    }  
    $data=array();
    $this->load->model('torneo_model');
    
    $jugadores=  $this->torneo_model->obtener_jugadores();

    if (isset($jugadores))
    $data['jugadores']= $jugadores->result_array();

    $torneo = $this->torneo_model->obtenerTorneoActual();   
    $t['nombre_torneo'] = $torneo->first_row()->nombre;
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('inscripcion', $data);
  }



public function inscribir_categoria()
  {
    if (!$this->session->userdata('username'))
    {
      redirect('login');
    }  
    $data=array();
    $this->load->model('torneo_model');
    $id_jugador = $this->uri->segment(3);   

    $jugador= $this->torneo_model->obtener_jugador($id_jugador);

    if (isset($jugador))
      $data['jugador']= $jugador->result_array();

    $torneo = $this->torneo_model->obtenerTorneoActual();   
    $t['nombre_torneo'] = $torneo->first_row()->nombre;
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('inscripcion_categoria', $data);
  }



public function torneos()
  {
    if (!$this->session->userdata('username'))
    {
      redirect('login');
    }  
    $data=array();
    $this->load->model('torneo_model');
    
    $torneos=  $this->torneo_model->obtenerTorneo();

    if (isset($torneos))
    $data['torneos']= $torneos->result_array();

    $torneo = $this->torneo_model->obtenerTorneoActual();   
    $t['nombre_torneo'] = $torneo->first_row()->nombre;
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('buscar_torneo', $data);
  }


public function crear_jugador()
  {
    if (!$this->session->userdata('username'))
    {
      redirect('login');
    }  
    $data=array();
    $this->load->model('torneo_model');
    
    $torneo = $this->torneo_model->obtenerTorneoActual();   
    $t['nombre_torneo'] = $torneo->first_row()->nombre;
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('crear_jugador');
  }

}
