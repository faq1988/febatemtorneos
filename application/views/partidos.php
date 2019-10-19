

    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">ABTM</a>
          </li>
          <li class="breadcrumb-item active">Partidos de zona</li>
        </ol>

      
<!-- Nav tabs -->
<ul class="nav nav-tabs nav-justified" role="tablist">
 <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#sd" role="tab">Super división</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#primera" role="tab">Primera</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#segunda" role="tab">Segunda</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#tercera" role="tab">Tercera</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#cuarta" role="tab">Cuarta</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">

    <div class="tab-pane active" id="sd" role="tabpanel">

                        <?php
                                    if (isset($partidos_sd)){
                                     for($i=0; $i<sizeof($partidos_sd); $i++){ ?>
                        <div class="panel-heading">
                           Id de partido: <?php echo $partidos_sd[$i]->id;?>
                           ---
                           Zona: <?php echo $partidos_sd[$i]->zona;?>
                           ---
                           Estado: <?php echo $partidos_sd[$i]->estado;?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-sm">
                                    <thead class="thead-inverse">
                                        <tr>                                            
                                            <th>Jugador</th>   
                                            <th>Set 1</th> 
                                            <th>Set 2</th>                                          
                                            <th>Set 3</th>                                          
                                            <th>Set 4</th>                                          
                                            <th>Set 5</th>                                          
                                            <th>Resultado</th>
                                            <th rowspan="3">
                                             <a href="<?php echo base_url() ?>Welcome/editarPartido/<?php echo $partidos_sd[$i]->id; ?>"> Cargar resultado</a>   
                                             </th>                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr>
                                            <td><?php echo $partidos_sd[$i]->jugador1;?>
                                            </td>
                                            <td><?php echo $partidos_sd[$i]->set11;?>
                                            </td>
                                            <td><?php echo $partidos_sd[$i]->set12;?>
                                            </td>
                                            <td><?php echo $partidos_sd[$i]->set13;?>
                                            </td>
                                            <td><?php echo $partidos_sd[$i]->set14;?>
                                            </td>
                                            <td><?php echo $partidos_sd[$i]->set15;?>
                                            </td>
                                            <td><?php echo $partidos_sd[$i]->resultado1;?>
                                            </td> 
                                          


                                        </tr>

                                        <tr>
                                            <td><?php echo $partidos_sd[$i]->jugador2;?>
                                            </td>
                                            <td><?php echo $partidos_sd[$i]->set21;?>
                                            </td>
                                            <td><?php echo $partidos_sd[$i]->set22;?>
                                            </td>
                                            <td><?php echo $partidos_sd[$i]->set23;?>
                                            </td>
                                            <td><?php echo $partidos_sd[$i]->set24;?>
                                            </td>
                                            <td><?php echo $partidos_sd[$i]->set25;?>
                                            </td>
                                            <td><?php echo $partidos_sd[$i]->resultado2;?>
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





  <div class="tab-pane active" id="primera" role="tabpanel">

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
                                <table class="table table-striped table-bordered table-hover table-sm">
                                    <thead>
                                        <tr>                                            
                                            <th>Jugador</th>   
                                            <th>Set 1</th> 
                                            <th>Set 2</th>                                          
                                            <th>Set 3</th>                                          
                                            <th>Set 4</th>                                          
                                            <th>Set 5</th>                                          
                                            <th>Resultado</th>
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
    <!-- /.content-wrapper -->

    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright &copy; ABTM Organizador de torneos 2017</small>
        </div>
      </div>
    </footer>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="<?=base_url()?>bootstraptemplate/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>bootstraptemplate/vendor/popper/popper.min.js"></script>
    <script src="<?=base_url()?>bootstraptemplate/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?=base_url()?>bootstraptemplate/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?=base_url()?>bootstraptemplate/vendor/chart.js/Chart.min.js"></script>
    <script src="<?=base_url()?>bootstraptemplate/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?=base_url()?>bootstraptemplate/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?=base_url()?>bootstraptemplate/js/sb-admin.min.js"></script>

  </body>

</html>
