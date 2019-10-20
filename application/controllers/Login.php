<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller{

public function __construct()
{
  parent::__construct();
}


	public function index()
	{
    
    if ($this->session->userdata('username'))
    {
      redirect('welcome');
    }
    
    if (isset($_POST['password'])){
        
        $this->load->model('usuario_model');
        if ($this->usuario_model->login($_POST['username'], md5($_POST['password'])))
          {
            $usuario= $this->usuario_model->obtener_usuario($_POST['username'])->row();                                   
            $this->session->set_userdata('username', $_POST['username']);            
            $this->session->set_userdata('id_usuario', $usuario->id);
            //$this->session->set_userdata('apellido_usuario', $usuario->apellido);
            $this->session->set_userdata('rol', $usuario->rol);
            //$this->session->set_userdata('nombre_usuario', $usuario->nombre);
            //$this->session->set_userdata('apellido_usuario', $usuario->apellido);
            redirect('welcome/login');
          }
          else
          {
            $this->session->set_flashdata('error', 'Usuario o contraseña incorrectos');
            redirect('login'); 
          }       

    }
    $this->load->view('login');  
    

	}

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('login');
  }

/*
  public function change_password()
  {
    if(!$this->session->userdata('username'))
      redirect('login');

    parent::header();
    $this->load->view('cambiar_password');
    parent::footer();
    $this -> default_vars();
  }
*/




}
