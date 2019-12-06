

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">FEBATEM</a>
          </li>
          <li class="breadcrumb-item active">Campeonatos</li>
        </ol>

         <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link active" href="<?=base_url()?>Welcome/crear_campeonato"> <i class="fas fa-plus-circle"></i> Crear Campeonato</a>
          </li> 
        </ul>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Campeonatos</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>                      
                      <th>Nombre</th>
                      <th>Fecha inicio</th>
                      <th>Fecha fin</th>
                      <th>Club</th>                      
                      <th>Usuario</th>  
                      
                      <th>Opciones</th>                      
                    </tr>
                  </thead>
                 
                  <tbody>

                  <?php
                    if (isset($campeonatos)){
                     for($i=0; $i<count($campeonatos); $i++){ 
                  ?>
                  
                    <tr>
                      <td><?php echo $campeonatos[$i]['nombre'];?></td>
                      <td><?php echo $campeonatos[$i]['fecha_inicio'];?></td>
                      <td><?php echo $campeonatos[$i]['fecha_fin'];?></td>
                      <td><?php echo $campeonatos[$i]['club'];?></td>
                      <td><?php echo $campeonatos[$i]['usuario'];?></td>                      
                      
                      <td><a class="btn btn-success btn-sm" href="<?=base_url()?>Campeonatoscontroller/eliminar_campeonato/<?php echo $campeonatos[$i]['id']; ?>" title="Eliminar"><i class="fas fa-trash-alt"></i></a>
                        
                      </td>
                      
                    </tr>
                     <?php } }?>
                  </tbody>
                </table>
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

  <!-- Page level plugins -->
  <script src="<?=base_url()?>assets_template/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>assets_template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?=base_url()?>assets_template/js/demo/datatables-demo.js"></script>

</body>

</html>
