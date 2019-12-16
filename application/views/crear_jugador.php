 <!-- Begin Page Content -->
        <div class="container-fluid">

 <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">FEBATEM</a>
          </li>
          <li class="breadcrumb-item active">Crear jugador</li>
        </ol>

          <!-- Page Heading -->
          <!--h1 class="h3 mb-4 text-gray-800">Bienvenidos</h1-->
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Crear jugador</h6>
            </div>
  
  
  <div class="card-body">

         <!-- Default form login -->
  <div class="container">
<!--form class="text-center border border-light p-5" action="#!"-->
  <?php echo form_open('Torneoscontroller/crear_jugador', 'class= "text-center "'); ?>
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre</label>
      <input type="text" name="nombre" class="form-control" id="inputEmail4" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Apellido</label>
      <input type="text" name="apellido" class="form-control" id="inputPassword4" required>
    </div>   
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
    <label for="inputAddress">Categoría</label>
    <select name="categoria" class="custom-select" required>  
        <option value="-1">Seleccionar</option>
        <option value="0">SD</option>
        <option value="1">Primera</option>
        <option value="2">Segunda</option>
        <option value="3">Tercera</option>
        <option value="4">Cuarta</option>
        <option value="5">Quinta</option>
    </select>
  </div>

    <div class="form-group col-md-3">
      <label for="inputEmail4">DNI</label>
      <input type="text" name="dni" class="form-control" id="inputEmail4" required>
    </div>
    <div class="form-group col-md-3">
      <label for="inputEmail4">Teléfono</label>
      <input type="text" name="telefono" class="form-control" id="inputEmail4" required>
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Fecha nacimiento</label>
      <input type="date" name="fecha_nac" class="form-control" id="inputPassword4" required>
    </div>   
      
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputPassword4">Email</label>
      <input type="email" name="email" class="form-control" id="inputPassword4" required>
    </div> 
    <div class="form-group col-md-3">
      <label for="inputEmail4">Provincia</label>
      <input type="text" name="provincia" class="form-control" id="inputEmail4" required>
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Ciudad</label>
      <input type="text" name="ciudad" class="form-control" id="inputPassword4" required>
    </div>  
    <div class="form-group col-md-3">
    <label for="inputAddress">Club</label>
    <select name="club" class="custom-select" required>  
        <option value="1">ABTM</option>
        <option value="4">UNICEN</option>
        
        
    </select>
  </div>
 
  </div>
  
  
 
  
  <button type="submit" class="btn btn-primary">Aceptar</button>
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
