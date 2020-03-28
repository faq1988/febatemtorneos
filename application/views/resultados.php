

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">FEBATEM</a>
          </li>
          <li class="breadcrumb-item active">Resultados</li>
        </ol>

          <?php echo form_open('Welcome/resultados', 'class= "text-center "'); ?>
            <div class="form-row">
              <div class="form-group col-md-6 offset-md-3">
              <label for="inputAddress">Categoría</label>
              <select onchange="this.form.submit();" name="categoria" class="custom-select">  
                  <option value="-1">Seleccionar</option>
                  <option value="0">SD</option>
                  <option value="1">Primera</option>
                  <option value="2">Segunda</option>
                  <option value="3">Tercera</option>
                  <option value="4">Cuarta</option>
                  <option value="5">Quinta</option>
              </select>
            </div>
          </div>
          </form>


          <div class="row">
          <div class="col-lg-8 offset-md-2">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ranking (Categoria: <?php echo $categoria;?>)</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Posición</th>
                      <th>Jugador</th>
                                           
                    </tr>
                  </thead>
                 
                  <tbody>

                  <?php
                    if (isset($ranking)){
                     for($i=0; $i<count($ranking); $i++){ 
                  ?>

                    <tr>
                      <td><?php echo $ranking[$i]['posicion'];?></td>
                      <td><?php echo $ranking[$i]['jugador'] ;?></td>                  
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
