<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campeonatoscontroller extends CI_Controller {



  function __construct(){
    parent::__construct();
    $this->load->model('campeonato_model');

  }


  public function eliminar_campeonato()
  {
    
    $data=array();
    $this->load->model('campeonato_model');
    $id_campeonato = $this->uri->segment(3);   

    
    $this->campeonato_model->eliminar_campeonato($id_campeonato);

    redirect('Welcome/campeonatos');
    
  }



  public function crear_campeonato()
  {       

      $data = array(        
      'nombre' => $this->input->post('nombre'),
      'fecha_inicio' => $this->input->post('fecha_inicio'),
      'fecha_fin' => $this->input->post('fecha_fin'),
      'club' => $this->input->post('club'),
      'usuario' => $this->input->post('usuario'),   
      'activo' => true,    
      );

            
      $this->campeonato_model->crear_campeonato($data);
      

      redirect('Welcome/campeonatos');
  }



}
