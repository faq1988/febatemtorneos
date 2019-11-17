

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">FEBATEM</a>
          </li>
          <li class="breadcrumb-item active">Rating</li>
        </ol>

          <!-- DataTales Example -->

          <div class="row">
          <div class="col-lg-10 offset-md-1">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Rating</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Posicion</th>
                      <th>Jugador</th>
                      <th>Puntaje anterior</th>
                      <th>SD</th>                      
                      <th>1ra</th>                      
                      <th>2da</th>                      
                      <th>3ra</th>                      
                      <th>4ta</th>                      
                      <th>5ta</th>
                      <th>Puntaje posterior</th>                      
                    </tr>
                  </thead>
                 
                  <tbody>

                  <?php
                    if (isset($rating)){
                     for($i=0; $i<count($rating); $i++){ 
                  ?>

                    <tr>
                      <td><?php echo $i+1;?></td>
                      <td><?php echo $rating[$i]['jugador'];?></td>
                      <td><?php echo $rating[$i]['puntaje_anterior'];?></td>
                      <td><?php echo $rating[$i]['sd'];?></td>
                      <td><?php echo $rating[$i]['primera'];?></td>
                      <td><?php echo $rating[$i]['segunda'];?></td>
                      <td><?php echo $rating[$i]['tercera'];?></td>
                      <td><?php echo $rating[$i]['cuarta'];?></td>
                      <td><?php echo $rating[$i]['quinta'];?></td>
                      <td><?php echo $rating[$i]['puntaje_posterior'];?></td>                      
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
