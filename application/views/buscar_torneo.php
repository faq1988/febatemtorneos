

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Breadcrumbs
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">FEBATEM</a>
          </li>
          <li class="breadcrumb-item active">Torneos</li>
        </ol>
 -->
         <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link active" href="<?=base_url()?>Welcome/crear_torneo"> <i class="fas fa-plus-circle"></i> Crear Torneo</a>
          </li> 
        </ul>
        </br>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Torneos</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>                      
                      <th>Nombre</th>
                      <th>Lugar</th>
                      <th>Fecha</th>
                      <th>Estado</th>                      
                      <th>Cant Mesas</th>  
                      
                      <th>Opciones</th>                      
                    </tr>
                  </thead>
                 
                  <tbody>

                  <?php
                    if (isset($torneos)){
                     for($i=0; $i<count($torneos); $i++){ 
                  ?>
                  
                    <tr>
                      <td><?php echo $torneos[$i]['nombre'];?></td>
                      <td><?php echo $torneos[$i]['lugar'];?></td>
                      <td><?php echo $torneos[$i]['fecha'];?></td>
                      <td><?php echo $torneos[$i]['estado'];?></td>
                      <td><?php echo $torneos[$i]['cant_mesas'];?></td>                      
                      
                      <td><a class="btn btn-success btn-sm" href="<?=base_url()?>Torneoscontroller/eliminar_torneo/<?php echo $torneos[$i]['id']; ?>" title="Eliminar"><i class="fas fa-trash-alt"></i></a>
                        <?php if ($torneos[$i]['activo'] == false){ ?>
                        <a class="btn btn-success btn-sm" href="<?=base_url()?>Torneoscontroller/seleccionar_torneo/<?php echo $torneos[$i]['id']; ?>" title="Seleccionar"><i class="fas fa-check-circle"></i></a>
                      <?php }?>
                         <a class="btn btn-success btn-sm" href="<?=base_url()?>Torneoscontroller/resetear_torneo/<?php echo $torneos[$i]['id']; ?>" title="Reiniciar"><i class="fas fa-redo-alt"></i></a>
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

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
