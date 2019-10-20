

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">FEBATEM</a>
          </li>
          <li class="breadcrumb-item active">Ranking</li>
        </ol>

          <!-- DataTales Example -->

          <div class="row">
          <div class="col-lg-8 offset-md-2">
         

          <div class="panel panel-primary">

                        <?php
                                    if (isset($zonas_sd)){
                                     for($i=0; $i<sizeof($zonas_sd); $i++){ ?>
                        <div class="panel-heading">
                            Zona: <?php echo $zonas_sd[$i]->letra;?>
                            ---
                            Estado: <?php echo $zonas_sd[$i]->estado;?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>                                            
                                            <th>Jugador</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr>
                                            <td><?php echo $zonas_sd[$i]->jugador1;?>
                                            </td>                                                             
                                        </tr>
                                        <tr>
                                            <td><?php echo $zonas_sd[$i]->jugador2;?>
                                            </td>                                                             
                                        </tr>
                                        <tr>
                                            <td><?php echo $zonas_sd[$i]->jugador3;?>
                                            </td>                                                             
                                        </tr>
                                        <tr>
                                            <td><?php echo $zonas_sd[$i]->jugador4;?>
                                            </td>                                                             
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <?php } }?> 
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                    
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


</body>

</html>
