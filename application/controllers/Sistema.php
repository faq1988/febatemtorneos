<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema extends CI_Controller {

	public function __construct()
{
  parent::__construct();  
  $this->load->model('Usuario_model');
}


 public function cambiar_password()
  {
    $username= $this->session->userdata('username');

    $contraseña_actual=$this->input->post('contraseña_actual');
    $contraseña_anterior= md5($this->input->post('contraseña_anterior'));
    $contraseña_nueva= $this->input->post('contraseña_nueva');
    $contraseña_repetir= $this->input->post('contraseña_repetir');


    if ($contraseña_actual != $contraseña_anterior)
    {
       var_dump('las nuevas contraseñas no coinciden');exit;
    }


    if ($contraseña_nueva != $contraseña_repetir)
    {
      var_dump('las nuevas contraseñas no coinciden');exit;
    }
       
      $this->Usuario_model->cambiar_password($username, md5($contraseña_nueva));

      $this->session->set_flashdata('success', 'La contraseña ha sido actualizada con éxito');
      redirect('welcome/cambiar_contrasenia');
  }



  /*


  public function nuevo_contacto()
  {
       
      $this->form_validation->set_rules('nombre', 'Nombre', 'required');
      $this->form_validation->set_rules('apellido', 'Apellido', 'required',
        array('required' => 'El campo %s es obligatorio.'));      
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      $this->form_validation->set_rules('telefono', 'Teléfono', 'numeric');
      $this->form_validation->set_rules('comentario', 'Comentario', 'required');

      if ($this->form_validation->run() == FALSE)      
      {
          $menu['rol']= $this->session->userdata('rol');         
          $this -> load -> view('header');
          $this -> load -> view('menu', $menu);
          $this -> load -> view('contacto');
      } 
      else
      {
        $data = array(        
        'nombre' => $this->input->post('nombre'),      
        'apellido' => $this->input->post('apellido'),      
        'email' => $this->input->post('email'),   
        'telefono' => $this->input->post('telefono'),
        'comentario' => $this->input->post('comentario'),      
        );

        $this->Sistema_model->crear_contacto($data);
        redirect(welcome);
      }
  }



  public function crear_usuario()
  {
       
    
      $data = array(        
      'nombre_usuario' => $this->input->post('nombre_usuario'),      
      'contraseña' => $this->input->post('contraseña'),      
      'email' => $this->input->post('email'),        
      'rol' => $this->input->post('rol'),
      'id_persona' => $this->input->post('maestro'),
      );

      
      $this->Usuario_model->crear_usuario($data);

      redirect(welcome);
  }  


    public function crear_usuario_alumno()
  {
      //$id_alumno = $this->uri->segment(3);
    
      $data = array(        
      'nombre_usuario' => $this->input->post('nombre_usuario'),      
      'contraseña' => $this->input->post('contraseña'),      
      'email' => $this->input->post('email'),        
      'rol' => $this->input->post('rol'),
      'id_persona' => $this->input->post('tutor'),
      'id_alumno' => $this->input->post('id_alumno'),
      );
            
      $this->Usuario_model->crear_usuario($data);

      redirect("Welcome/ver_usuarios_alumno/".$data['id_alumno']);
  }  




  public function eliminar_usuario()
  {
    $id_usuario = $this->uri->segment(3);
    $id_alumno = $this->uri->segment(4);

    $this->Usuario_model->eliminar_usuario($id_usuario);

    redirect("Welcome/ver_usuarios_alumno/".$id_alumno);
  }


 






  public function sendMailAdmin($data)
  {
    //cargamos la libreria email de ci
    $this->load->library("email");
 
    //configuracion para gmail
    $configGmail = array(
      'protocol' => 'smtp',
      'smtp_host' => 'mail.abtm.org.ar',
      'smtp_port' => 25,
      'smtp_user' => 'contacto@abtm.org.ar',
      'smtp_pass' => 'abtm2016',
      'mailtype' => 'html',
      'charset' => 'utf-8',
      'newline' => "\r\n"
    );    
   


    //cargamos la configuración para enviar con gmail
    $this->email->initialize($configGmail);
 
    $this->email->from('contacto@abtm.org.ar');
    $this->email->to('facu.carignano1988@gmail.com');
    //$this->email->to('contacto.abtm.web@gmail.com');    
    $this->email->subject('asunto del mail');
        
    $this->email->message('<h2>contenido del mail</h2>
            <br>[DNI] = '. $data['dni'] .'
            <br>[Nombre] = '. $data['nombre'] .'
            <br>[Apellido] = '. $data['apellido'] .'
            <br>[Correo electrónico] = '. $data['email'] .'
            <br>[Teléfono] = '. $data['telefono'] .'
            <br>[Categoría] = '. $data['categoria'] .'
            <br>[Comentario] = '. $data['comentario']
            );
    $this->email->send();
    //con esto podemos ver el resultado
    //var_dump($this->email->print_debugger());
  }

  public function sendMailUser($data)
  {
    //cargamos la libreria email de ci
    $this->load->library("email");
 
    //configuracion para gmail
    $configGmail = array(
      'protocol' => 'smtp',
      'smtp_host' => 'mail.abtm.org.ar',
      'smtp_port' => 25,
      'smtp_user' => 'contacto@abtm.org.ar',
      'smtp_pass' => 'abtm2016',
      'mailtype' => 'html',
      'charset' => 'utf-8',
      'newline' => "\r\n"
    );   
  
 
    //cargamos la configuración para enviar con gmail
    $this->email->initialize($configGmail);
 
    $this->email->from('contacto@abtm.org.ar');
    //$this->email->to('facu.carignano1988@gmail.com');
    $this->email->to($data['email']);   
    $this->email->subject('asunto del mail');
        
    $this->email->message('<h2>contenido del mail</h2>
            <br>[DNI] = '. $data['dni'] .'
            <br>[Nombre] = '. $data['nombre'] .'
            <br>[Apellido] = '. $data['apellido'] .'
            <br>[Correo electrónico] = '. $data['email'] .'
            <br>[Teléfono] = '. $data['telefono'] .'
            <br>[Categoría] = '. $data['categoria'] .'
            <br>[Comentario] = '. $data['comentario'] .'
            <hr><br> ABTM Web');
    $this->email->send();
    //con esto podemos ver el resultado
    //var_dump($this->email->print_debugger());
  }
*/


}
