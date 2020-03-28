

        <!-- Begin Page Content -->
        <div class="container-fluid">

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

          <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">FEBATEM</a>
          </li>
          <li class="breadcrumb-item active">Cantidad de sets a jugar en partidos de zona</li>
        </ol>

         

          <div class="row">
          <div class="col-lg-6 offset-md-3">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Configure la cantidad de sets a jugar en partidos de zona</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Categoría</th>
                      <th>Cantidad de sets a jugar</th>
                                           
                    </tr>
                  </thead>
                 
                  <tbody>

                  <?php
                    if (isset($lista_cant_set_zonas)){
                     for($i=0; $i<count($lista_cant_set_zonas); $i++){ 
                  ?>

                    <tr>
                      <td><?php echo $lista_cant_set_zonas[$i]['categoria'];?></td>
                      <td><?php echo $lista_cant_set_zonas[$i]['cant_sets'] ;?></td>                  
                    </tr>
                     <?php } }?>
                  </tbody>
                </table>
              </div>
            </div>


              <?php echo form_open('Torneoscontroller/definir_cant_sets_zona', 'class= "text-center" method="GET"'); ?>
                <div class="form-row">
                      <div class="form-group col-md-4 offset-md-1">
                      <label for="inputAddress">Categoría</label>
                      <select name="categoria" class="custom-select">  
                          <option value="-1">Seleccionar</option>
                          <option value="0">SD</option>
                          <option value="1">Primera</option>
                          <option value="2">Segunda</option>
                          <option value="3">Tercera</option>
                          <option value="4">Cuarta</option>
                          <option value="5">Quinta</option>
                      </select>
                    </div>

                    <div class="form-group col-md-4">
                      <label for="inputAddress">Cantidad de sets</label>
                      <select name="cant_sets" class="custom-select">  
                          <option value="-1">Seleccionar</option>
                          <option value="3">Tres</option>
                          <option value="5">Cinco</option>
                          <option value="6">Siete</option>                     
                      </select>
                    </div>

                    <div class="form-group col-md-2">
                      <label for="inputAddress">---</label>
                      <button type="submit" class="btn btn-primary">Establecer</button>
                    </div>
              </div>
                 

              </form>



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
