<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>ABTM - Organizador de torneos</title>

    

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>bootstraptemplate/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?=base_url()?>bootstraptemplate/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="<?=base_url()?>bootstraptemplate/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    

    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>bootstraptemplate/css/sb-admin.css" rel="stylesheet">

    <link href="<?=base_url()?>bootstraptemplate/css/llave.css" rel="stylesheet">
    <link href="<?=base_url()?>bootstraptemplate/css/tablero.css" rel="stylesheet">


  </head>

  <body class="fixed-nav sticky-footer bg-dark" id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <a class="navbar-brand" href="<?=base_url()?>"><i class="fa fa-fw fa-user-o" aria-hidden="true"></i>
ABTM - Organizador de torneos</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Torneos">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTorneos" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-trophy"></i>
              <span class="nav-link-text">
                Torneos</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseTorneos">
              <li>
                <a href="<?=base_url()?>Welcome/crear_torneo">Nuevo torneo</a>
              </li>
              <li>
                <a href="<?=base_url()?>Welcome/buscar_torneos">Ver torneos</a>
              </li>
            </ul>
          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Inscripciones">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseInscripciones" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-arrow-right"></i>
              <span class="nav-link-text">
                Inscripciones</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseInscripciones">
              <li>
                <a href="<?=base_url()?>Welcome/inscripciones">Nueva inscripción</a>
              </li>
              <li>
                <a href="<?=base_url()?>Welcome/buscarInscripciones">Ver inscripciones</a>
              </li>
            </ul>
          </li>
         
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Llaves">
            <a class="nav-link" href="<?=base_url()?>Welcome/llaves">
              <i class="fa fa-fw fa-sitemap"></i>
              <span class="nav-link-text">
                Llaves</span>
            </a>
          </li>
             <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Partidos de llave">
            <a class="nav-link" href="<?=base_url()?>Welcome/partidos_de_llave">
              <i class="fa fa-fw fa-list-ul"></i>
              <span class="nav-link-text">
                Partidos de llave</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Zonas">
            <a class="nav-link" href="<?=base_url()?>Welcome/zonas">
              <i class="fa fa-fw fa-table"></i>
              <span class="nav-link-text">
                Zonas</span>
            </a>
          </li>
           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Partidos de zona">
            <a class="nav-link" href="<?=base_url()?>Welcome/partidos">
              <i class="fa fa-fw fa-list-ul"></i>
              <span class="nav-link-text">
                Partidos de zona</span>
            </a>
          </li>
             <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Ranking">
            <a class="nav-link" href="<?=base_url()?>Welcome/ranking">
              <i class="fa fa-fw fa-list-ul"></i>
              <span class="nav-link-text">
                Ranking</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Contabilidad">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-usd"></i>
              <span class="nav-link-text">
                Contabilidad</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseComponents">              
              <li>
                <a href="#">Balances</a>
              </li>
            </ul>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reportes">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-file"></i>
              <span class="nav-link-text">
                Reportes</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseExamplePages">
              <li>
                <a href="login.html">reporte</a>
              </li>
              
            </ul>
          </li>
           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Plantilla de llaves">
            <a class="nav-link" href="<?=base_url()?>Welcome/plantilla_llaves">
              <i class="fa fa-fw fa-list-ul"></i>
              <span class="nav-link-text">
                Plantilla de llaves</span>
            </a>
          </li>
        
        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>