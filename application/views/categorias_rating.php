

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">FEBATEM</a>
          </li>
          <li class="breadcrumb-item active">Categorías Rating</li>
        </ol>

          <div class="row">
          <div class="col-lg-8 offset-md-2">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Categorías Rating</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Jugadores de </th>                      
                      <th>Ingresa a la categoría con</th>                      
                      <th>Rango de puntos</th>                      
                    </tr>
                  </thead>
                 
                  <tbody>

                  <?php
                    if (isset($categorias_rating)){
                     for($i=0; $i<count($categorias_rating); $i++){ 
                  ?>

                    <tr>
                      <td><?php echo $categorias_rating[$i]['categoria'];?></td>
                      <td><?php echo $categorias_rating[$i]['puntaje_inicial']. ' puntos';?></td>
                      <td><?php echo 'Desde '. $categorias_rating[$i]['puntos_desde'] .' hasta '.$categorias_rating[$i]['puntos_hasta'];?></td>
                      
                    </tr>
                     <?php } }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php include 'footer.php'; ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url()?>assets_template/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url()?>assets_template/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url()?>assets_template/js/sb-admin-2.min.js"></script>


</body>

</html>
