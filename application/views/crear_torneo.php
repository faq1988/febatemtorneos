 <!-- Begin Page Content -->
        <div class="container-fluid">

 <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">FEBATEM</a>
          </li>
          <li class="breadcrumb-item active">Crear torneo</li>
        </ol>

          <!-- Page Heading -->
          <!--h1 class="h3 mb-4 text-gray-800">Bienvenidos</h1-->
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Crear torneo</h6>
            </div>
            <div class="card-body">

         <!-- Default form login -->
         <div class="container">
<!--form class="text-center border border-light p-5" action="#!"-->
  <?php echo form_open('Turnos/confirmar_turno', 'class= "text-center border border-light p-5"'); ?>
<div class="col-lg-12">
   
    
    <div class="form-group">    
    <input type="text" name="nombre" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nombre">
    </div>

    <div class="form-group">    
    <input type="text" name="apellido" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Apellido">
    </div>  

    <div class="form-group">    
    <select class="form-control" name="tipo_doc" id="tipo_doc">
      <option value="0">Tipo de documento</option>           

              <option value="DNI">DNI</option>
              <option value="CEDULA">Cédula de identidad</option>
              <option value="PASAPORTE">Pasaporte</option>
              <option value="ENROLAMIENTO">Libreta enrolamiento</option>
              <option value="CIVICA">Libreta cívica</option>              
    </select>
    </div>

    <div class="form-group">    
    <input type="text" name="nro_doc" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Número de documento">
    </div>

    <div class="form-group">    
    <input type="text" name="telefono" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Número de teléfono">
    </div>

    <div class="form-group">    
    <select class="form-control" name="cobertura" id="cobertura">
      <option value="0">Cobertura</option>           

              <option value="1">OSDE</option>
              <option value="2">Galeno</option>
              <option value="3">Privado</option>              
    </select>
    </div>
    
    

    <!-- Sign in button -->
    <button class="btn btn-primary btn-block my-4" type="submit">Crear Torneo</button>

    

</div>
</form>

   </div>
          </div>

</div>

<!-- Default form login -->



        </div>        
        <!-- /.container-fluid -->

       

      </div>
      <!-- End of Main Content -->

      <?php include 'footer.php'; ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

 
 

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url()?>assets_template/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url()?>assets_template/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url()?>assets_template/js/sb-admin-2.min.js"></script>

 

</body>

</html>
