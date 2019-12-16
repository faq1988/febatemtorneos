

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Breadcrumbs
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">FEBATEM</a>
          </li>
          <li class="breadcrumb-item active">Jugadores</li>
        </ol>
 -->
           <?php if ($this->session->flashdata('error')) {?>
                    <div class="alert alert-danger">                                
                      <?php echo $this->session->flashdata('error');?>
                    </div>
                  <?php } ?>    
                  <?php if ($this->session->flashdata('success')) {?>
                    <div class="alert alert-success">                               
                      <?php echo $this->session->flashdata('success');?>
                    </div>
          <?php } ?>  

        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link active" href="<?=base_url()?>Welcome/crear_jugador"> <i class="fas fa-plus-circle"></i> Agregar Jugador</a>
          </li> 
        </ul>




          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Jugadores</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>DNI</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Email</th>
                      <th>Telefono</th>                      
                                         
                      <th>Categoria</th>                      
                      <th>Provincia</th>                      
                      <th>Ciudad</th>   
                      <th>Opciones</th>                      
                    </tr>
                  </thead>
                 
                  <tbody>

                  <?php
                    if (isset($jugadores)){
                     for($i=0; $i<count($jugadores); $i++){ 
                  ?>

                    <tr>
                      <td><?php echo $jugadores[$i]['dni'];?></td>
                      <td><?php echo $jugadores[$i]['nombre'];?></td>
                      <td><?php echo $jugadores[$i]['apellido'];?></td>
                      <td><?php echo $jugadores[$i]['email'];?></td>
                      <td><?php echo $jugadores[$i]['telefono'];?></td>
                      
                      <td><?php echo $jugadores[$i]['categoria'];?></td>
                      <td><?php echo $jugadores[$i]['provincia'];?></td>
                      <td><?php echo $jugadores[$i]['ciudad'];?></td>
                      <td><a class="btn btn-success" href="<?=base_url()?>Torneoscontroller/eliminar_jugador/<?php echo $jugadores[$i]['id']; ?>" title="Eliminar"><i class="fas fa-trash-alt"></i></a></td>
                      
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
