<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turnos extends CI_Controller {




  public function seleccionar_turnos()
  {    

      if (!$this->session->userdata('username'))
    {
      redirect('login');
    }
    $this->load->model('turnos_model');
    $data= array();
    $id_profesional= $this->input->post('profesional');
    $profesional = $this->turnos_model->obtener_profesional($id_profesional);
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $dia_actual=new DateTime();
    $fecha_inicio=  $dia_actual->format('Y/m/d H:i:s');    
    $turnos_disponibles = $this->turnos_model->obtener_turnos_disponibles($id_profesional, $fecha_inicio);

    if (isset($turnos_disponibles))
      $data['turnos_disponibles']= $turnos_disponibles->result_array();

    $this->load->view('menu');
    $this->load->view('header');
    $this->load->view('elegir_turno', $data);    
  }


  public function llenar_paciente()
  {    

      if (!$this->session->userdata('username'))
    {
      redirect('login');
    }
    $this->load->model('turnos_model');
    
    $id_turno= $this->uri->segment(3);  

    
      $data['id_turno']= $id_turno;

    $this->load->view('menu');
    $this->load->view('header');
    $this->load->view('llenar_paciente', $data);    
  }



   public function confirmar_turno()
  {    

      if (!$this->session->userdata('username'))
    {
      redirect('login');
    }
    $this->load->model('turnos_model');
    $this->load->model('paciente_model');
    
    $paciente = array(
      'nombre' => $this->input->post('nombre'),
      'apellido' => $this->input->post('apellido'),
      'tipo_doc' => $this->input->post('tipo_doc'),      
      'nro_doc' => $this->input->post('nro_doc'),          
      'telefono' => $this->input->post('telefono'),
      'cobertura' => $this->input->post('cobertura'),      
      );

    $id_paciente_creado= $this->paciente_model->crear_paciente($paciente);
    $turno = array (
      'id_turno' => $this->input->post('id_turno'),
      'usuario'  => $this->session->userdata('id_usuario'),
      'paciente'  => $id_paciente_creado,
    );
    
    $this->turnos_model->confirmar_turno($turno);

    redirect('welcome/ver_turnos');
  }


  public function fetch_profesional()
   {      
    $this->load->model('turnos_model');
    $id= $this->uri->segment(3);    
    $result = $this->turnos_model->fetch_profesional($id)->result();
    echo json_encode($result);  
   }






}
