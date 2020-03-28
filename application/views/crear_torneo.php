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
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre</label>
      <input type="text" name="nombre" class="form-control" id="inputEmail4" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Lugar</label>
      <input type="text" name="lugar" class="form-control" id="inputPassword4" required>
    </div>
   
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Desde</label>
      <input type="date" name="fecha_inicio" class="form-control" id="inputEmail4" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Hasta</label>
      <input type="date" name="fecha_fin" class="form-control" id="inputPassword4" required>
    </div>
    
  </div>
  <div class="form-row">
     <div class="form-group col-md-2">
      <label for="inputZip">Cantidad de mesas</label>
      <input type="number" name="cant_mesas" class="form-control" id="inputZip" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Marca de mesas</label>
      <input type="text" name="marca_mesas" class="form-control" id="inputEmail4" required>
    </div>
    <div class="form-group col-md-2">
       <label for="inputAddress">Tipo de pelota</label>
      <select name="categorias[]" class="custom-select" required>  
        <option value="1">*</option>
        <option value="2">**</i></option>
        <option value="3">***</i></option>        
    </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputZip">Marca de pelota</label>
      <input type="text" name="marca_pelotas" class="form-control" id="inputZip" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputEmail4">Cierre de inscripción</label>
      <input type="text" name="cierre_inscripcion" class="form-control" id="inputEmail4" required>
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Costo de inscripción</label>
      <input type="text" name="costo_inscripcion" class="form-control" id="inputPassword4" required>
    </div>
    <div class="form-group col-md-3">
      <label for="inputZip">Costo de afiliación</label>
      <input type="text" name="costo_afiliacion" class="form-control" id="inputZip" required>
    </div>
    <div class="form-group col-md-3">
      <label for="inputAddress">Cat habilitadas por jugador</label>
      <select name="habilitadas[]" class="custom-select" required>  
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
    </select>
    </div>
  </div>





<div class="form-row">  
<div class="input-group col-md-8 offset-md-2">
  <div class="input-group-prepend">
    <span class="input-group-text" id="">Cierre de categoría Super división</span>
  </div>  
  <select name="desplegablesd" class="custom-select" required>          
        <option value="2">No</option>
        <option value="1">Si</option>                
    </select>
  <input type="date" class="form-control" name="cierresd">
</div>
</div>

<div class="form-row">
<div class="input-group col-md-8 offset-md-2">
  <div class="input-group-prepend">
    <span class="input-group-text" id="">Cierre de categoría Primera</span>
  </div>
  <select name="desplegablesd" class="custom-select" required>  
        <option value="2">No</option>
        <option value="1">Si</option>        
    </select>
  <input type="datetime" class="form-control" name="cierreprimera">
</div>
</div>

<div class="form-row">
<div class="input-group col-md-8 offset-md-2">
  <div class="input-group-prepend">
    <span class="input-group-text" id="">Cierre de categoría Segunda</span>
  </div>
  <select name="desplegablesd" class="custom-select" required>  
        <option value="2">No</option>
        <option value="1">Si</option>        
    </select>
  <input type="date" class="form-control" name="cierresegunda">
</div>
</div>

<div class="form-row">
<div class="input-group col-md-8 offset-md-2">
  <div class="input-group-prepend">
    <span class="input-group-text" id="">Cierre de categoría Tercera</span>
  </div>
  <select name="desplegablesd" class="custom-select" required>  
        <option value="2">No</option>
        <option value="1">Si</option>        
    </select>
  <input type="date" class="form-control" name="cierretercera">
</div>
</div>

<div class="form-row">
<div class="input-group col-md-8 offset-md-2">
  <div class="input-group-prepend">
    <span class="input-group-text" id="">Cierre de categoría Cuarta</span>
  </div>
  <select name="desplegablesd" class="custom-select" required>  
        <option value="2">No</option>
        <option value="1">Si</option>        
    </select>
  <input type="date" class="form-control" name="cierrecuarta">
</div>

</div><div class="form-row">
<div class="input-group col-md-8 offset-md-2">
  <div class="input-group-prepend">
    <span class="input-group-text" id="">Cierre de categoría Quinta</span>
  </div>
  <select name="desplegablesd" class="custom-select" required>  
        <option value="2">No</option>
        <option value="1">Si</option>        
    </select>
  <input type="date" class="form-control" name="cierrequinta">
</div>
</div>
  <!--div class="form-group">
    <label for="inputAddress">Categorías</label>
    <select name="categorias[]" class="custom-select" multiple required>  
        <option value="0">SD</option>
        <option value="1">Primera</option>
        <option value="2">Segunda</option>
        <option value="3">Tercera</option>
        <option value="4">Cuarta</option>
        <option value="5">Quinta</option>
    </select>
  </div-->
  
 
  
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
