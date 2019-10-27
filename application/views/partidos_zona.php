

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">FEBATEM</a>
          </li>
          <li class="breadcrumb-item active">Partidos de zona</li>
        </ol>

          <!-- DataTales Example -->

          <div class="row">
          <div class="col-lg-6 offset-lg-3">
          

                <?php
                                    if (isset($partidos_primera)){
                                     for($i=0; $i<sizeof($partidos_primera); $i++){ ?>
                        <div class="panel-heading">
                           Id de partido: <?php echo $partidos_primera[$i]->id;?>
                           ---
                           Zona: <?php echo $partidos_primera[$i]->zona;?>
                           ---
                           Estado: <?php echo $partidos_primera[$i]->estado;?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-warning table-bordered table-hover table-sm">
                                    <thead class="thead-inverse">
                                        <tr>                                            
                                            <th class="col-sm-6">Jugador</th>   
                                            <th class="col-sm-1">Set 1</th> 
                                            <th class="col-sm-1">Set 2</th>                                          
                                            <th class="col-sm-1">Set 3</th>                                          
                                            <th class="col-sm-1">Set 4</th>                                          
                                            <th class="col-sm-1">Set 5</th>                                          
                                            <th class="col-sm-1">Resultado</th>
                                            <th rowspan="3">
                                             <a href="<?php echo base_url() ?>Welcome/editarPartido/<?php echo $partidos_primera[$i]->id; ?>"> Cargar resultado</a>   
                                             </th>                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr>
                                            <td><?php echo $partidos_primera[$i]->jugador1;?>
                                            </td>
                                            <td><?php echo $partidos_primera[$i]->set11;?>
                                            </td>
                                            <td><?php echo $partidos_primera[$i]->set12;?>
                                            </td>
                                            <td><?php echo $partidos_primera[$i]->set13;?>
                                            </td>
                                            <td><?php echo $partidos_primera[$i]->set14;?>
                                            </td>
                                            <td><?php echo $partidos_primera[$i]->set15;?>
                                            </td>
                                            <td><?php echo $partidos_primera[$i]->resultado1;?>
                                            </td> 
                                          


                                        </tr>

                                        <tr>
                                            <td><?php echo $partidos_primera[$i]->jugador2;?>
                                            </td>
                                            <td><?php echo $partidos_primera[$i]->set21;?>
                                            </td>
                                            <td><?php echo $partidos_primera[$i]->set22;?>
                                            </td>
                                            <td><?php echo $partidos_primera[$i]->set23;?>
                                            </td>
                                            <td><?php echo $partidos_primera[$i]->set24;?>
                                            </td>
                                            <td><?php echo $partidos_primera[$i]->set25;?>
                                            </td>
                                            <td><?php echo $partidos_primera[$i]->resultado2;?>
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
