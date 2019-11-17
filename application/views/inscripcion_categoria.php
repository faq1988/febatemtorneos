 <!-- Begin Page Content -->
        <div class="container-fluid">

 <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">FEBATEM</a>
          </li>
          <li class="breadcrumb-item active">Inscripción</li>
          <li class="breadcrumb-item active">Confirmar inscripción</li>
        </ol>

          <!-- Page Heading -->
          <!--h1 class="h3 mb-4 text-gray-800">Bienvenidos</h1-->
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Confirmar inscripción</h6>
            </div>
  
  
  <div class="card-body">

         <!-- Default form login -->
  <div class="container">
<!--form class="text-center border border-light p-5" action="#!"-->
  <?php echo form_open('Torneoscontroller/crear_inscripcion', 'class= "text-center "'); ?>

  <input type="hidden" id="id_jugador" name="id_jugador" value="<?php echo $jugador[0]['id'];?>">

  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>DNI</th>
                      <th>Jugador</th>                      
                      <th>Categoría</th>                                      
                    </tr>
                  </thead>
                 
                  <tbody>

                 
                    <tr>
                      <td><?php echo $jugador[0]['dni'];?></td>
                      <td><?php echo $jugador[0]['jugador'];?></td>
                      <td><?php echo $jugador[0]['categoria'];?></td>
                      
                      
                    </tr>                   
                  </tbody>
                </table>


  <div class="form-group col-md-6 offset-md-3">
    <label for="inputAddress">Categorías</label>
    <select name="categorias[]" class="custom-select" multiple>  
        <option value="0">SD</option>
        <option value="1">Primera</option>
        <option value="2">Segunda</option>
        <option value="3">Tercera</option>
        <option value="4">Cuarta</option>
        <option value="5">Quinta</option>
    </select>
  </div>

  <div class="form-group">
            <label for="message-text" class="col-form-label">Comentario:</label>
            <textarea class="form-control" id="message-text" name="comentario"></textarea>
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
