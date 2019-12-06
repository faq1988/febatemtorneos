<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('fpdf/fpdf.php');

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
    if (isset($torneo))
      $data['nombre_torneo'] = $torneo->first_row()->nombre;
    else
      $data['nombre_torneo'] = "NINGUNO";
  
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
    if (isset($torneo))
      $t['nombre_torneo'] = $torneo->first_row()->nombre;
    else
      $t['nombre_torneo'] = "NINGUNO";
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('cambiar_contrasenia', $data);
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
    if (isset($torneo))
      $t['nombre_torneo'] = $torneo->first_row()->nombre;
    else
      $t['nombre_torneo'] = "NINGUNO";
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
    $data=array();  

    $categoria = $this->input->post('categoria');

    $ranking=  $this->torneo_model->obtener_ranking($categoria);
    
    if (isset($ranking))
      $data['ranking']= $ranking->result_array();

    if ($categoria == 0)
        $data['categoria']= "Super división";      
      if ($categoria == 1)
        $data['categoria']= "Primera";      
      if ($categoria == 2)
        $data['categoria']= "Segunda";      
      if ($categoria == 3)
        $data['categoria']= "Tercera";      
      if ($categoria == 4)
        $data['categoria']= "Cuarta";      
      if ($categoria == 5)
        $data['categoria']= "Quinta";      

    $torneo = $this->torneo_model->obtenerTorneoActual();   
    if (isset($torneo))
      $t['nombre_torneo'] = $torneo->first_row()->nombre;
    else
      $t['nombre_torneo'] = "NINGUNO";
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('ranking', $data);
  }



  public function rating()
  {
       if (!$this->session->userdata('username'))
    {
      redirect('login');
    }  

    $this->load->model('torneo_model');
    $data=array();      

    $rating=  $this->torneo_model->obtener_rating();
    
    if (isset($rating))
      $data['rating']= $rating->result_array();

    $torneo = $this->torneo_model->obtenerTorneoActual();   
    if (isset($torneo))
      $t['nombre_torneo'] = $torneo->first_row()->nombre;
    else
      $t['nombre_torneo'] = "NINGUNO";
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('rating', $data);
  }



  public function puntaje_rating()
  {
       if (!$this->session->userdata('username'))
    {
      redirect('login');
    }  

    $this->load->model('torneo_model');
    $data=array();      

    $puntaje_rating=  $this->torneo_model->obtener_puntaje_rating();
    
    if (isset($puntaje_rating))
      $data['puntaje_rating']= $puntaje_rating->result_array();

    $torneo = $this->torneo_model->obtenerTorneoActual();   
    if (isset($torneo))
      $t['nombre_torneo'] = $torneo->first_row()->nombre;
    else
      $t['nombre_torneo'] = "NINGUNO";
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('puntaje_rating', $data);
  }

  public function categorias_rating()
  {
       if (!$this->session->userdata('username'))
    {
      redirect('login');
    }  

    $this->load->model('torneo_model');
    $data=array();      

    $categorias_rating=  $this->torneo_model->obtener_categorias_rating();
    
    if (isset($categorias_rating))
      $data['categorias_rating']= $categorias_rating->result_array();

    $torneo = $this->torneo_model->obtenerTorneoActual();   
    if (isset($torneo))
      $t['nombre_torneo'] = $torneo->first_row()->nombre;
    else
      $t['nombre_torneo'] = "NINGUNO";
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('categorias_rating', $data);
  }

  public function crear_torneo()
  {
    if (!$this->session->userdata('username'))
    {
      redirect('login');
    }
    $this->load->model('torneo_model');
    $torneo = $this->torneo_model->obtenerTorneoActual();   
    if (isset($torneo))
      $t['nombre_torneo'] = $torneo->first_row()->nombre;
    else
      $t['nombre_torneo'] = "NINGUNO";

    $this->load->view('menu');
    $this->load->view('header',$t);
    $this->load->view('crear_torneo');
  }

    public function crear_campeonato()
  {
    if (!$this->session->userdata('username'))
    {
      redirect('login');
    }
    $this->load->model('torneo_model');
    $torneo = $this->torneo_model->obtenerTorneoActual();   
    if (isset($torneo))
      $t['nombre_torneo'] = $torneo->first_row()->nombre;
    else
      $t['nombre_torneo'] = "NINGUNO";

    $this->load->view('menu');
    $this->load->view('header',$t);
    $this->load->view('crear_campeonato');
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
    if (isset($torneo))
      $t['nombre_torneo'] = $torneo->first_row()->nombre;
    else
      $t['nombre_torneo'] = "NINGUNO";
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('jugadores', $data);
  }


public function clubes()
  {
    if (!$this->session->userdata('username'))
    {
      redirect('login');
    }  
    $data=array();
    $this->load->model('torneo_model');
    
    $clubes=  $this->torneo_model->obtener_clubes();

    if (isset($clubes))
    $data['clubes']= $clubes->result_array();

    $torneo = $this->torneo_model->obtenerTorneoActual();   
    if (isset($torneo))
      $t['nombre_torneo'] = $torneo->first_row()->nombre;
    else
      $t['nombre_torneo'] = "NINGUNO";
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('clubes', $data);
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

    if(isset($torneo))
    {
        $row = $torneo->first_row();  

        //$llave_32_primera=  $this->torneo_model->obtener_llave($row->id, "Primera", 32);
        $llave_16_primera=  $this->torneo_model->obtener_llave($row->id, 1, 16);
        //$llave_8_primera=  $this->torneo_model->obtener_llave($row->id, "Primera", 8);
        //$llave_4_primera=  $this->torneo_model->obtener_llave($row->id, "Primera", 4);
        //$llave_2_primera=  $this->torneo_model->obtener_llave($row->id, "Primera", 2);

        $cant_inscriptos_sd= $this->torneo_model->obtener_cant_inscriptos($row->id, 0);
        $cant_inscriptos_primera= $this->torneo_model->obtener_cant_inscriptos($row->id, 1);
        $cant_inscriptos_segunda= $this->torneo_model->obtener_cant_inscriptos($row->id, 2);
        $cant_inscriptos_tercera= $this->torneo_model->obtener_cant_inscriptos($row->id, 3);
        $cant_inscriptos_cuarta= $this->torneo_model->obtener_cant_inscriptos($row->id, 4);
        $cant_inscriptos_quinta= $this->torneo_model->obtener_cant_inscriptos($row->id, 5);
        
        $data['cant_inscriptos_sd']= $cant_inscriptos_sd;
        $data['cant_inscriptos_primera']= $cant_inscriptos_primera;
        $data['cant_inscriptos_segunda']= $cant_inscriptos_segunda;
        $data['cant_inscriptos_tercera']= $cant_inscriptos_tercera;
        $data['cant_inscriptos_cuarta']= $cant_inscriptos_cuarta;
        $data['cant_inscriptos_quinta']= $cant_inscriptos_quinta;

        if (isset($llave_16_primera))
          $data['llave_16_primera']=$llave_16_primera-> result_array();


        //$data['llave_32_primera']= $this->completar_llave($cant_inscriptos_primera, $llave_32_primera);
        //$data['llave_16_primera']= $this->completar_fase(16, $llave_16_primera);
        //$data['llave_16_primera']= $this->completar_fase(8, $llave_16_primera);
        //$data['llave_8_primera']= $this->completar_fase(4, $llave_8_primera);
        //$data['llave_4_primera']= $this->completar_fase(2, $llave_4_primera);
        //$data['llave_2_primera']= $this->completar_fase(1, $llave_2_primera);

        $t['nombre_torneo']=$row->nombre;
      }
      else
      {
       $t['nombre_torneo']="NINGUNO";
       $data['cant_inscriptos_sd']= 0;
        $data['cant_inscriptos_primera']= 0;
        $data['cant_inscriptos_segunda']= 0;
        $data['cant_inscriptos_tercera']= 0;
        $data['cant_inscriptos_cuarta']= 0;
      }
        
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

    $categoria = $this->input->post('categoria');

    if (isset($torneo) & $categoria != -1)
    {
        $row = $torneo->first_row();  

        $zonas=  $this->torneo_model->obtenerZonas($row->id, $categoria);
          
        if (isset($zonas))
        $data['zonas']= $zonas->result();

        $t['nombre_torneo']=$row->nombre;
    }
    else
        $t['nombre_torneo']="NINGUNO"; 

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
    $categoria = $this->input->post('categoria');
    $data=array();
    if(isset($torneo))
    {
        $row = $torneo->first_row();  

        $partidos=  $this->torneo_model->obtenerPartidos($row->id, $categoria, 'ZONA');
        //$partidos_primera=  $this->torneo_model->obtenerPartidos($row->id, 1, 'ZONA');
        //$partidos_segunda=  $this->torneo_model->obtenerPartidos($row->id, 2, 'ZONA');
        //$partidos_tercera=  $this->torneo_model->obtenerPartidos($row->id, 3, 'ZONA');
        //$partidos_cuarta=  $this->torneo_model->obtenerPartidos($row->id, 4, 'ZONA');


        if (isset($partidos))
          $data['partidos']= $partidos->result();
/*
        if (isset($partidos_primera))
          $data['partidos_primera']= $partidos_primera->result();

        if (isset($partidos_segunda))
          $data['partidos_segunda']= $partidos_segunda->result();

        if (isset($partidos_tercera))
          $data['partidos_tercera']= $partidos_tercera->result();

        if (isset($partidos_cuarta))
          $data['partidos_cuarta']= $partidos_cuarta->result();
          */
        $t['nombre_torneo']= $row->nombre;
  }
  else
   $t['nombre_torneo']= "NINGUNO"; 

    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('partidos_zona', $data);
  }




  public function partidos_llave()
  {
     if (!$this->session->userdata('username'))
    {
      redirect('login');
    }
    $data=array();
    $this->load->model('torneo_model');

    $torneo = $this->torneo_model->obtenerTorneoActual();
    $categoria = $this->input->post('categoria');
    $data=array();
    if(isset($torneo))
    {
        $row = $torneo->first_row();  

        $partidos=  $this->torneo_model->obtenerPartidos($row->id, $categoria, 'LLAVE');
        //$partidos_primera=  $this->torneo_model->obtenerPartidos($row->id, 1, 'LLAVE');
        //$partidos_segunda=  $this->torneo_model->obtenerPartidos($row->id, 2, 'LLAVE');
        //$partidos_tercera=  $this->torneo_model->obtenerPartidos($row->id, 3, 'LLAVE');
        //$partidos_cuarta=  $this->torneo_model->obtenerPartidos($row->id, 4, 'LLAVE');
        
        if (isset($partidos))
          $data['partidos']= $partidos->result();
/*
        if (isset($partidos_primera))
          $data['partidos_primera']= $partidos_primera->result();

        if (isset($partidos_segunda))
          $data['partidos_segunda']= $partidos_segunda->result();

        if (isset($partidos_tercera))
          $data['partidos_tercera']= $partidos_tercera->result();

        if (isset($partidos_cuarta))
          $data['partidos_cuarta']= $partidos_cuarta->result();
          */
        $t['nombre_torneo']= $row->nombre;
  }
  else
   $t['nombre_torneo']= "NINGUNO"; 

    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('partidos_llave', $data);
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
    if (isset($torneo))
      $t['nombre_torneo'] = $torneo->first_row()->nombre;
    else
      $t['nombre_torneo'] = "NINGUNO";
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
    $torneo = $this->torneo_model->obtenerTorneoActual(); 
    $jugadores=  $this->torneo_model->obtener_jugadores();

    $cant_sd=0;
    $cant_primera=0;
    $cant_segunda=0;
    $cant_tercera=0;
    $cant_cuarta=0;
    $cant_quinta=0;

    if (isset($torneo))
    {
      if ($torneo->first_row()->superdivision)
        $cant_sd= $this->torneo_model->obtener_cant_inscriptos($torneo->first_row()->id, 0);
      if ($torneo->first_row()->primera)
        $cant_primera= $this->torneo_model->obtener_cant_inscriptos($torneo->first_row()->id, 1);
      if ($torneo->first_row()->segunda)
        $cant_segunda= $this->torneo_model->obtener_cant_inscriptos($torneo->first_row()->id, 2);
      if ($torneo->first_row()->tercera)
        $cant_tercera= $this->torneo_model->obtener_cant_inscriptos($torneo->first_row()->id, 3);
      if ($torneo->first_row()->cuarta)
        $cant_cuarta= $this->torneo_model->obtener_cant_inscriptos($torneo->first_row()->id, 4);
      if ($torneo->first_row()->quinta)
        $cant_quinta= $this->torneo_model->obtener_cant_inscriptos($torneo->first_row()->id, 5);
    }

    $data['cant_sd']= $cant_sd;
    $data['cant_primera']= $cant_primera;
    $data['cant_segunda']= $cant_segunda;
    $data['cant_tercera']= $cant_tercera;
    $data['cant_cuarta']= $cant_cuarta;
    $data['cant_quinta']= $cant_quinta;

    $data['juega_sd']= $torneo->first_row()->superdivision;
    $data['juega_primera']= $torneo->first_row()->primera;
    $data['juega_segunda']= $torneo->first_row()->segunda;
    $data['juega_tercera']= $torneo->first_row()->tercera;
    $data['juega_cuarta']= $torneo->first_row()->cuarta;
    $data['juega_quinta']= $torneo->first_row()->quinta;


    if (isset($jugadores))
    $data['jugadores']= $jugadores->result_array();
      
    if (isset($torneo))
      $t['nombre_torneo'] = $torneo->first_row()->nombre;
    else
      $t['nombre_torneo'] = "NINGUNO";
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
    $torneo = $this->torneo_model->obtenerTorneoActual();

    if (!isset($torneo))
    {
      $this->session->set_flashdata('error', 'Ha ocurrido un error, no existe un torneo seleccionado');
      redirect('Welcome/inscripcion');
    }


    $id_jugador = $this->uri->segment(3);   

    $jugador= $this->torneo_model->obtener_jugador($id_jugador);

    $categorias= $this->torneo_model->obtener_categorias_habilitadas($jugador->first_row()->id_categoria);

    if(isset($categorias))
      $data['categorias_habilitadas'] = $categorias->result_array();
    if (isset($jugador))
      $data['jugador']= $jugador->result_array();

       
    if (isset($torneo))
      $t['nombre_torneo'] = $torneo->first_row()->nombre;
    else
      $t['nombre_torneo'] = "NINGUNO";
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
    if (isset($torneo))
      $t['nombre_torneo'] = $torneo->first_row()->nombre;
    else
      $t['nombre_torneo'] = "NINGUNO";
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('buscar_torneo', $data);
  }



public function campeonatos()
  {
    if (!$this->session->userdata('username'))
    {
      redirect('login');
    }  
    $data=array();
    $this->load->model('torneo_model');
    $this->load->model('campeonato_model');
    
    $campeonatos=  $this->campeonato_model->obtener_campeonatos();

    if (isset($campeonatos))
    $data['campeonatos']= $campeonatos->result_array();

    $torneo = $this->torneo_model->obtenerTorneoActual();   
    if (isset($torneo))
      $t['nombre_torneo'] = $torneo->first_row()->nombre;
    else
      $t['nombre_torneo'] = "NINGUNO";
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('buscar_campeonatos', $data);
  }



public function perfil()
  {
    if (!$this->session->userdata('username'))
    {
      redirect('login');
    }  
    $data=array();
    $this->load->model('torneo_model');
    
    $torneo = $this->torneo_model->obtenerTorneoActual();   
    if (isset($torneo))
      $t['nombre_torneo'] = $torneo->first_row()->nombre;
    else
      $t['nombre_torneo'] = "NINGUNO";
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('perfil');
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
    if (isset($torneo))
      $t['nombre_torneo'] = $torneo->first_row()->nombre;
    else
      $t['nombre_torneo'] = "NINGUNO";
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('crear_jugador');
  }



public function crear_club()
  {
    if (!$this->session->userdata('username'))
    {
      redirect('login');
    }  
    $data=array();
    $this->load->model('torneo_model');
    
    $torneo = $this->torneo_model->obtenerTorneoActual();   
    if (isset($torneo))
      $t['nombre_torneo'] = $torneo->first_row()->nombre;
    else
      $t['nombre_torneo'] = "NINGUNO";
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('crear_club');
  }


  public function mesas()
  {
     if (!$this->session->userdata('username'))
    {
      redirect('login');
    }   
    $data=array();
    $this->load->model('torneo_model');
    $torneo = $this->torneo_model->obtenerTorneoActual();   
    if (isset($torneo))
      $t['nombre_torneo'] = $torneo->first_row()->nombre;
    else
      $t['nombre_torneo'] = "NINGUNO";

    if (isset($torneo))
      $mesas= $this->torneo_model->obtener_mesas($torneo->first_row()->id);    

    if (isset($mesas))
      $data['mesas']= $mesas->result_array();    
  
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('mesas', $data); 
  }


  public function editar_zona()
  {
    
    $id_zona = $this->uri->segment(3);
    $this->load->model('torneo_model');
    $zona_en_cuestion=  $this->torneo_model->obtener_zona_por_id($id_zona);    
    $data['id_zona']=$id_zona;
    $data['letra']=$zona_en_cuestion[0]->letra;
    $data['estado']=$zona_en_cuestion[0]->estado;
    $data['jugador1']= $zona_en_cuestion[0]->jugador1;
    $data['jugador2']= $zona_en_cuestion[0]->jugador2;
    $data['jugador3']= $zona_en_cuestion[0]->jugador3;
    
    //$data['jugador4']= $zona_en_cuestion[0]->jugador4;
    
    //var_dump($data_id);exit;
    $torneo = $this->torneo_model->obtenerTorneoActual();   
    if (isset($torneo))
      $t['nombre_torneo'] = $torneo->first_row()->nombre;
    else
      $t['nombre_torneo'] = "NINGUNO";
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('editar_zona', $data);
  }


  public function testpdf()
  {
    $pdf = new FPDF();
    $header = array('Jugador', '1', '2', '3', 'Resultado', 'Posicion');
 
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',9);
    $w = array(70, 20, 20, 20, 20, 20);
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C',0);
    $pdf->Ln();
    
  
    $pdf->Cell(70,5,'Jugador 1',1,0,'L',0);
   $pdf->SetFillColor(0,0,0);
    $pdf->Cell(20,5,'',1,0,'L',true);
    $pdf->Cell(20,5,'',1,0,'L',0);
    $pdf->Cell(20,5,'',1,0,'L',0);
    $pdf->Cell(20,5,'',1,0,'L',0);
    $pdf->Cell(20,5,'',1,0,'L',0);
      
    $pdf->Ln();
    $pdf->Cell(70,5,'Jugador 2',1,0,'L',0);
    $pdf->Cell(20,5,'',1,0,'L',0);
    $pdf->Cell(20,5,'',1,0,'L',true);
    $pdf->Cell(20,5,'',1,0,'L',0);
    $pdf->Cell(20,5,'',1,0,'L',0);
    $pdf->Cell(20,5,'',1,0,'L',0);
     
    $pdf->Ln();
        
    $pdf->Cell(70,5,'Jugador 3',1,0,'L',0);
    $pdf->Cell(20,5,'',1,0,'L',0);
    $pdf->Cell(20,5,'',1,0,'L',0);
    $pdf->Cell(20,5,'',1,0,'L',true);
    $pdf->Cell(20,5,'',1,0,'L',0);
    $pdf->Cell(20,5,'',1,0,'L',0);
   
    $pdf->Ln();
    

    $pdf->Output();

  }




public function ver_inscriptos()
  {
    if (!$this->session->userdata('username'))
    {
      redirect('login');
    }  
    $data=array();
    $this->load->model('torneo_model');
    $categoria = $this->uri->segment(3); 
    $torneo = $this->torneo_model->obtenerTorneoActual();   
    
    $inscriptos=  $this->torneo_model->buscar_inscriptos($torneo->first_row()->id, $categoria);

    if (isset($inscriptos))
    $data['inscriptos']= $inscriptos->result_array();

    $data['categoria']= $categoria;
    
    if (isset($torneo))
      $t['nombre_torneo'] = $torneo->first_row()->nombre;
    else
      $t['nombre_torneo'] = "NINGUNO";
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('ver_inscriptos', $data);
  }



public function editar_partido()
  {
     if (!$this->session->userdata('username'))
    {
      redirect('login');
    }  
     $data=array();
    $this->load->model('torneo_model');
    $id_partido = $this->uri->segment(3);

    
    $partido_en_cuestion=  $this->torneo_model->obtener_partido_por_id($id_partido);
    $data['id_partido']=$id_partido;
    $data['jugador1']= $partido_en_cuestion[0]->jugador1;
    $data['jugador2']= $partido_en_cuestion[0]->jugador2;
    $data['tipo']= $partido_en_cuestion[0]->tipo;
    //var_dump($data_id);exit;

    $torneo = $this->torneo_model->obtenerTorneoActual();  
    if (isset($torneo))
      $t['nombre_torneo'] = $torneo->first_row()->nombre;
    else
      $t['nombre_torneo'] = "NINGUNO"; 
    
    $this->load->view('menu');
    $this->load->view('header', $t);
    $this->load->view('editar_partido', $data);
  }


}
