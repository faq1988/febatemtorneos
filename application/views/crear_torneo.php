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
    <div class="form-group col-md-4">
      <label for="inputEmail4">Nombre</label>
      <input type="text" name="nombre" class="form-control" id="inputEmail4">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Lugar</label>
      <input type="text" name="lugar" class="form-control" id="inputPassword4">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Cantidad de mesas</label>
      <input type="text" name="cant_mesas" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Categorías</label>
    <select name="categorias[]" class="custom-select" multiple>  
        <option value="sd">SD</option>
        <option value="primera">Primera</option>
        <option value="segunda">Segunda</option>
        <option value="tercera">Tercera</option>
        <option value="cuarta">Cuarta</option>
        <option value="quinta">Quinta</option>
    </select>
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
