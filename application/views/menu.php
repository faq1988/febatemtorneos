<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content=""> 

  <title>FEBATEM</title>

  <!-- Custom fonts for this template-->
  <link href="<?=base_url()?>assets_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


  <!-- Custom styles for this template-->
  <link href="<?=base_url()?>assets_template/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets_template/css/llave.css" rel="stylesheet">
   <!-- Custom styles for this page -->
  <link href="<?=base_url()?>assets_template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">




</head>

<body id="page-top">

  <?php  $rol = $this->session->userdata('rol'); ?>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url()?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-table-tennis"></i>
        </div>
        <div class="sidebar-brand-text mx-3">FEBATEM</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard x
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Obtener un turno</span></a>
      </li>
      -->

      <!-- Divider -->
      <hr class="sidebar-divider">

       <?php          
          if ($rol == 'ROLE_CLIENT_USER') {                                    
      ?>
      <div class="sidebar-heading">
        Turnos
      </div>

      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGestionar" aria-expanded="true" aria-controls="collapseGestionar">
          <i class="fas fa-tasks"></i>
          <span>Gestionar</span>
        </a>
        <div id="collapseGestionar" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!--6 class="collapse-header">Custom Components:</h6-->
            <a class="collapse-item" href="<?=base_url()?>Welcome/obtener_turno">Obtener turno</a>
            <a class="collapse-item" href="<?=base_url()?>Welcome/ver_turnos">Ver turnos</a>
            <a class="collapse-item" href="cards.html">Cancelar turno</a>
          </div>
        </div>
      </li>
       

      <hr class="sidebar-divider">
      <?php          
          }           
      ?>


       <?php          
          if ($rol == 'ROLE_SYSTEM_ADMIN') {                                    
      ?>
      <!--div class="sidebar-heading">
        Torneos
      </div-->

      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTorneos" aria-expanded="true" aria-controls="collapseTorneos">
          <i class="fas fa-trophy"></i>
          <span>Torneos</span>
        </a>
        <div id="collapseTorneos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!--6 class="collapse-header">Custom Components:</h6-->
            <a class="collapse-item" href="<?=base_url()?>Welcome/crear_torneo">Crear torneo</a>
            <a class="collapse-item" href="<?=base_url()?>Welcome/torneos">Ver torneos</a>
            <a class="collapse-item" href="<?=base_url()?>Welcome/inscripcion">Inscripción</a>            
          </div>
        </div>
      </li>      
     
      <hr class="sidebar-divider">

      <!--div class="sidebar-heading">
        Partidos
      </div-->      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePartidos" aria-expanded="true" aria-controls="collapsePartidos">
          <i class="fas fa-table-tennis"></i>
          <span>Partidos</span>
        </a>
        <div id="collapsePartidos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!--6 class="collapse-header">Custom Components:</h6-->            
            <a class="collapse-item" href="<?=base_url()?>Welcome/zonas">Zonas</a>
            <a class="collapse-item" href="<?=base_url()?>Welcome/partidos_zona">Partidos de zona</a>
            <a class="collapse-item" href="<?=base_url()?>Welcome/llave">Llaves</a>
            <a class="collapse-item" href="<?=base_url()?>Welcome/llave">Partidos de llave</a>
          </div>
        </div>
      </li>      
     
      <hr class="sidebar-divider">


      <!--div class="sidebar-heading">
        Clubes
      </div-->      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClubes" aria-expanded="true" aria-controls="collapseClubes">
          <i class="fas fa-shield-alt"></i>
          <span>Clubes</span>
        </a>
        <div id="collapseClubes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!--6 class="collapse-header">Custom Components:</h6-->  
            <a class="collapse-item" href="<?=base_url()?>Welcome/jugadores">Jugadores</a>                      
            <a class="collapse-item" href="<?=base_url()?>Welcome/usuarios">Usuarios</a>            
          </div>
        </div>
      </li>             

      <hr class="sidebar-divider">

      <!--div class="sidebar-heading">
        Ranking
      </div-->

      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRanking" aria-expanded="true" aria-controls="collapseRanking">
          <i class="fas fa-list"></i>
          <span>Ranking</span>
        </a>
        <div id="collapseRanking" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!--6 class="collapse-header">Custom Components:</h6-->
            <a class="collapse-item" href="<?=base_url()?>Welcome/ranking/0">SD</a>
            <a class="collapse-item" href="<?=base_url()?>Welcome/ranking/1">Primera</a>
            <a class="collapse-item" href="<?=base_url()?>Welcome/ranking/2">Segunda</a>
            <a class="collapse-item" href="<?=base_url()?>Welcome/ranking/3">Tercera</a>
            <a class="collapse-item" href="<?=base_url()?>Welcome/ranking/4">Cuarta</a>
            <a class="collapse-item" href="<?=base_url()?>Welcome/ranking/5">Quinta</a>            
          </div>
        </div>
      </li>      
      <?php          
          }           
      ?>

      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Opciones
      </div>

      <?php          
          if ($rol == 'ROLE_CLIENT_USER' | $rol == 'ROLE_SYSTEM_ADMIN') {                                    
      ?>
      
     
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url()?>Welcome/plantilla_llaves">
          <i class="fas fa-key"></i>
          <span>Plantilla llaves</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url()?>Welcome/cambiar_contrasenia">
          <i class="fas fa-lock"></i>
          <span>Cambiar contraseña</span></a>
      </li>
      <?php          
          }           
      ?>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url()?>Login/logout">
          <i class="fas fa-sign-out-alt"></i>
          <span>Salir</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
