 <!-- Begin Page Content -->
        <div class="container-fluid">

 <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">FEBATEM</a>
          </li>
          <li class="breadcrumb-item active">Editar partido</li>
        </ol>

          <!-- Page Heading -->
          <!--h1 class="h3 mb-4 text-gray-800">Bienvenidos</h1-->
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Editar partido (ID: <?php echo $id_partido;?>)</h6>
            </div>
  
  
  <div class="card-body">

         <!-- Default form login -->
  <div class="container">
<!--form class="text-center border border-light p-5" action="#!"-->
  <?php echo form_open('Torneoscontroller/guardar_partido', 'class= "text-center "'); ?>

   <input type="hidden" name="id" value="<?php echo $id_partido; ?>"/>
   <input type="hidden" name="tipo" value="<?php echo $tipo; ?>"/>


<div class="form-row">
  <div class="form-group col-md-5">
      <label for="inputEmail4">Jugador</label>
      <input type="text" name="jugador1" class="form-control" id="inputEmail4" placeholder="<?php echo $jugador1;?>" disabled>
    </div>
    <div class="form-group col-md-1">
      <label for="inputEmail4">Set 1</label>
      <input type="text" name="set11" class="form-control" id="inputEmail4" required>
    </div>
    <div class="form-group col-md-1">
      <label for="inputPassword4">Set 2</label>
      <input type="text" name="set12" class="form-control" id="inputPassword4" required>
    </div>   
    <div class="form-group col-md-1">
      <label for="inputPassword4">Set 3</label>
      <input type="text" name="set13" class="form-control" id="inputPassword4" required>
    </div>   
    <div class="form-group col-md-1">
      <label for="inputPassword4">Set 4</label>
      <input type="text" name="set14" class="form-control" id="inputPassword4" required>
    </div>   
    <div class="form-group col-md-1">
      <label for="inputPassword4">Set 5</label>
      <input type="text" name="set15" class="form-control" id="inputPassword4" required>
    </div>  
    <div class="form-group col-md-2">
      <label for="inputPassword4">Resultado</label>
      <input type="text" name="total1" class="form-control" id="inputPassword4" required>
    </div>    
  </div>
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputEmail4">Jugador</label>
      <input type="text" name="jugador2" class="form-control" id="inputEmail4" placeholder="<?php echo $jugador2;?>" disabled>
    </div>
    <div class="form-group col-md-1">
      <label for="inputEmail4">Set 1</label>
      <input type="text" name="set21" class="form-control" id="inputEmail4" required>
    </div>
    <div class="form-group col-md-1">
      <label for="inputPassword4">Set 2</label>
      <input type="text" name="set22" class="form-control" id="inputPassword4" required>
    </div>   
    <div class="form-group col-md-1">
      <label for="inputPassword4">Set 3</label>
      <input type="text" name="set23" class="form-control" id="inputPassword4" required>
    </div>   
    <div class="form-group col-md-1">
      <label for="inputPassword4">Set 4</label>
      <input type="text" name="set24" class="form-control" id="inputPassword4" required>
    </div>   
    <div class="form-group col-md-1">
      <label for="inputPassword4">Set 5</label>
      <input type="text" name="set25" class="form-control" id="inputPassword4" required>
    </div>   
      <div class="form-group col-md-2">
      <label for="inputPassword4">Resultado</label>
      <input type="text" name="total2" class="form-control" id="inputPassword4" required>
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
