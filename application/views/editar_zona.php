

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">FEBATEM</a>
          </li>
          <li class="breadcrumb-item active">Editar Zona</li>
        </ol>

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

          <!-- DataTales Example -->

  <?php echo form_open('Torneoscontroller/guardar_zona', 'class= "text-center "'); ?>
  

          <div class="row">
          <div class="col-lg-8 offset-md-2">
         

          <div class="panel panel-primary">

                        
                        <div class="panel-heading">
                          <input type="hidden" name="id" value="<?php echo $id_zona; ?>"/>
                            ID: <?php echo $id_zona;?>
                            ---
                            Zona: <?php echo $letra;?>
                            ---
                            Estado: <?php echo $estado;?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>                                            
                                            <th class="col-sm-6">Jugador</th>
                                            <th class="col-sm-1">vs</th>
                                            <th class="col-sm-1">vs</th>
                                            <th class="col-sm-1">vs</th>
                                            <th class="col-sm-1">vs</th>
                                            <th class="col-sm-1">Posición</th>
                                                                       
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr>
                                            <td><?php echo $jugador1;?>
                                            </td> 
                                            <td style="background-color:black;">-
                                            </td>
                                            <td>-
                                            </td>
                                            <td>-
                                            </td> 
                                            <td>-
                                            </td>   
                                            <td>
                                            -                                                            
                                            </td>                                                        
                                        </tr>
                                        <tr>
                                            <td><?php echo $jugador2;?>
                                            </td> 
                                            </td> 
                                            <td>-
                                            </td>
                                            <td style="background-color:black;">-
                                            </td>
                                            <td>-
                                            </td> 
                                            <td>-
                                            </td>    
                                            <td>
                                            -                                                            
                                            </td>                                                           
                                        </tr>
                                        <tr>
                                            <td><?php echo $jugador3;?>
                                            </td>
                                            </td> 
                                            <td>-
                                            </td>
                                            <td>-
                                            </td>
                                            <td style="background-color:black;">-
                                            </td> 
                                            <td>-
                                            </td>   
                                            <td>
                                            -                                                            
                                            </td>                                                             
                                        </tr>
                                        <?php if (isset($jugador4)){ ?>
                                        <tr>
                                            <td><?php echo $jugador4;?>
                                            </td> 
                                            </td> 
                                            <td>-
                                            </td>
                                            <td>-
                                            </td>
                                            <td>-
                                            </td>
                                            <td style="background-color:black;">-
                                            </td>    
                                            <td>
                                            -                                                            
                                            </td>
                                        </tr>
                                      <?php } ?>
                                       
                                    </tbody>
                                </table>

                                
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                    
        </div>
      </div>








          <div class="row">
          <div class="col-lg-8 offset-lg-2">
          

                <?php
                         if (isset($partidos)){
                                     for($i=0; $i<sizeof($partidos); $i++){ ?>
                        <div class="panel-heading">
                           Id de partido: <?php echo $partidos[$i]->id;?>
                           ---
                           Zona: <?php echo $partidos[$i]->zona;?>
                           ---
                           Estado: <?php echo $partidos[$i]->estado;?>
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
                                             <a href="<?php echo base_url() ?>Welcome/editar_partido/<?php echo $partidos[$i]->id; ?>"> Cargar resultado</a>   
                                             </th>                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr>
                                            <td><?php echo $partidos[$i]->jugador1;?>
                                            </td>
                                            <td><?php echo $partidos[$i]->set11;?>
                                            </td>
                                            <td><?php echo $partidos[$i]->set12;?>
                                            </td>
                                            <td><?php echo $partidos[$i]->set13;?>
                                            </td>
                                            <td><?php echo $partidos[$i]->set14;?>
                                            </td>
                                            <td><?php echo $partidos[$i]->set15;?>
                                            </td>
                                            <td><?php echo $partidos[$i]->resultado1;?>
                                            </td> 
                                          


                                        </tr>

                                        <tr>
                                            <td><?php echo $partidos[$i]->jugador2;?>
                                            </td>
                                            <td><?php echo $partidos[$i]->set21;?>
                                            </td>
                                            <td><?php echo $partidos[$i]->set22;?>
                                            </td>
                                            <td><?php echo $partidos[$i]->set23;?>
                                            </td>
                                            <td><?php echo $partidos[$i]->set24;?>
                                            </td>
                                            <td><?php echo $partidos[$i]->set25;?>
                                            </td>
                                            <td><?php echo $partidos[$i]->resultado2;?>
                                            </td>                                                             
                                        </tr>
                                        
                                       
                                    </tbody>
                                </table>                                  
                                 
                                
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <?php } }?> 
                        <!-- /.panel-body -->
                        <button type="submit" class="btn btn-primary">Procesar Zona</button>

        </div>
      </div>

      </form>

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
