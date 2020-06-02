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
  <?php echo form_open('Torneoscontroller/crear_torneo', 'class= "text-center "'); ?>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Nombre</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="nombre" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Lugar</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="lugar" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Desde</label>
    <div class="col-sm-6">
      <input type="date" class="form-control" name="fecha_inicio" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Hasta</label>
    <div class="col-sm-6">
      <input type="date" class="form-control" name="fecha_fin" required>
    </div>
  </div>
   <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Cant de mesas</label>
    <div class="col-sm-6">
      <input type="number" class="form-control" name="cant_mesas" required>
    </div>
  </div>
   <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Marca de las mesas</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="marca_mesas" required>
    </div>
  </div> 
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Tipo de pelota</label>
    <div class="col-sm-6">
      <select name="categorias[]" class="custom-select" required>  
        <option value="1">1 estrella</option>
        <option value="2">2 estrellas</i></option>
        <option value="3">3 estrellas</i></option>        
    </select>
    </div>
  </div>
   <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Marca de pelota</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="marca_pelotas" required>
    </div>
  </div> 
   <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Cierre de inscripcion</label>
    <div class="col-sm-6">
      <input type="date" class="form-control" name="cierre_inscripcion" required>
    </div>
  </div> 
   <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Costo de inscripcion</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="costo_inscripcion" required>
    </div>
  </div> 
   <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Costo de afiliacion</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="costo_afiliacion" required>
    </div>
  </div> 
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Categorias habilitadas por jugador</label>
    <div class="col-sm-6">
      <select name="categorias[]" class="custom-select" required>  
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>      
    </select>
    </div>
  </div>

 <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Juega super division?</label>
    <div class="col-sm-2">
      <select name="juega_sd" class="custom-select" required>  
        <option value="1">No</option>
        <option value="2">Si</option>        
    </select>
    </div>
    <label for="inputEmail3" class="col-sm-2 col-form-label">Cierra inscripcion</label>
    <div class="col-sm-2">
      <input type="date" class="form-control" name="cierre_sd">
    </div>
  </div> 

   <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Juega Primera?</label>
    <div class="col-sm-2">
      <select name="juega_primera" class="custom-select" required>  
        <option value="1">No</option>
        <option value="2">Si</option>        
    </select>
    </div>
    <label for="inputEmail3" class="col-sm-2 col-form-label">Cierra inscripcion</label>
    <div class="col-sm-2">
      <input type="date" class="form-control" name="cierre_primera">
    </div>
  </div> 

   <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Juega segunda?</label>
    <div class="col-sm-2">
      <select name="juega_segunda" class="custom-select" required>  
        <option value="1">No</option>
        <option value="2">Si</option>        
    </select>
    </div>
    <label for="inputEmail3" class="col-sm-2 col-form-label">Cierra inscripcion</label>
    <div class="col-sm-2">
      <input type="date" class="form-control" name="cierre_segunda">
    </div>
  </div> 

   <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Juega tercera?</label>
    <div class="col-sm-2">
      <select name="juega_tercera" class="custom-select" required>  
        <option value="1">No</option>
        <option value="2">Si</option>        
    </select>
    </div>
    <label for="inputEmail3" class="col-sm-2 col-form-label">Cierra inscripcion</label>
    <div class="col-sm-2">
      <input type="date" class="form-control" name="cierre_tercera">
    </div>
  </div> 

   <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Juega cuarta?</label>
    <div class="col-sm-2">
      <select name="juega_cuarta" class="custom-select" required="">  
        <option value="1">No</option>
        <option value="2">Si</option>        
    </select>
    </div>
    <label for="inputEmail3" class="col-sm-2 col-form-label">Cierra inscripcion</label>
    <div class="col-sm-2">
      <input type="date" class="form-control" name="cierre_cuarta">
    </div>
  </div> 

   <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Juega Quinta?</label>
    <div class="col-sm-2">
      <select name="juega_quinta" class="custom-select" required="">  
        <option value="1">No</option>
        <option value="2">Si</option>        
    </select>
    </div>
    <label for="inputEmail3" class="col-sm-2 col-form-label">Cierra inscripcion</label>
    <div class="col-sm-2">
      <input type="date" class="form-control" name="cierre_quinta">
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
