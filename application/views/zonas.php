
 

    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">ABTM</a>
          </li>
          <li class="breadcrumb-item active">Zonas</li>
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
  <div class="tab-pane" id="primera" role="tabpanel">
    
       <div class="panel panel-primary">

                        <?php
                                    if (isset($zonas_primera)){
                                     for($i=0; $i<sizeof($zonas_primera); $i++){ ?>
                        <div class="panel-heading">
                            Zona: <?php echo $zonas_primera[$i]->letra;?>
                            ---
                            Estado: <?php echo $zonas_primera[$i]->estado;?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>                                            
                                            <th>Jugador</th>
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>  
                                            <th>Posicion</th>
                                            <th>
                                            <a href="<?php echo base_url() ?>Welcome/editarZona/<?php echo $zonas_primera[$i]->id; ?>"> Cargar resultado</a>
                                            </th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr>
                                            <td><?php echo $zonas_primera[$i]->jugador1;?>
                                            </td>  
                                            <td>---
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td><?php echo $zonas_primera[$i]->pos1;?>
                                            </td>                                                            
                                        </tr>
                                        <tr>
                                            <td><?php echo $zonas_primera[$i]->jugador2;?>
                                            </td>
                                            <td>
                                            </td>
                                            <td>---
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td><?php echo $zonas_primera[$i]->pos2;?>
                                            </td>                                                             
                                        </tr>
                                        <tr>
                                            <td><?php echo $zonas_primera[$i]->jugador3;?>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>---
                                            </td>
                                            <td>
                                            </td>
                                            <td><?php echo $zonas_primera[$i]->pos3;?>
                                            </td>                                                             
                                        </tr>
                                        <tr>
                                            <td><?php echo $zonas_primera[$i]->jugador4;?>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>---
                                            </td>
                                            <td><?php echo $zonas_primera[$i]->pos4;?>
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
  <div class="tab-pane" id="segunda" role="tabpanel">

       <div class="panel panel-primary">

                        <?php
                                    if (isset($zonas_segunda)){
                                     for($i=0; $i<sizeof($zonas_segunda); $i++){ ?>
                        <div class="panel-heading">
                            Zona: <?php echo $zonas_segunda[$i]->letra;?>
                            ---
                            Estado: <?php echo $zonas_segunda[$i]->estado;?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>                                            
                                            <th>Jugador</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr>
                                            <td><?php echo $zonas_segunda[$i]->jugador1;?>
                                            </td>                                                             
                                        </tr>
                                        <tr>
                                            <td><?php echo $zonas_segunda[$i]->jugador2;?>
                                            </td>                                                             
                                        </tr>
                                        <tr>
                                            <td><?php echo $zonas_segunda[$i]->jugador3;?>
                                            </td>                                                             
                                        </tr>
                                        <tr>
                                            <td><?php echo $zonas_segunda[$i]->jugador4;?>
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
  <div class="tab-pane" id="tercera" role="tabpanel">

         <div class="panel panel-primary">

                        <?php
                                    if (isset($zonas_tercera)){
                                     for($i=0; $i<sizeof($zonas_tercera); $i++){ ?>
                        <div class="panel-heading">
                            Zona: <?php echo $zonas_tercera[$i]->letra;?>
                            ---
                            Estado: <?php echo $zonas_tercera[$i]->estado;?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>                                            
                                            <th>Jugador</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr>
                                            <td><?php echo $zonas_tercera[$i]->jugador1;?>
                                            </td>                                                             
                                        </tr>
                                        <tr>
                                            <td><?php echo $zonas_tercera[$i]->jugador2;?>
                                            </td>                                                             
                                        </tr>
                                        <tr>
                                            <td><?php echo $zonas_tercera[$i]->jugador3;?>
                                            </td>                                                             
                                        </tr>
                                        <tr>
                                            <td><?php echo $zonas_tercera[$i]->jugador4;?>
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
  <div class="tab-pane" id="cuarta" role="tabpanel">

               <div class="panel panel-primary">

                        <?php
                                    if (isset($zonas_cuarta)){
                                     for($i=0; $i<sizeof($zonas_cuarta); $i++){ ?>
                        <div class="panel-heading">
                            Zona: <?php echo $zonas_cuarta[$i]->letra;?>
                            ---
                            Estado: <?php echo $zonas_cuarta[$i]->estado;?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>                                            
                                            <th>Jugador</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr>
                                            <td><?php echo $zonas_cuarta[$i]->jugador1;?>
                                            </td>                                                             
                                        </tr>
                                        <tr>
                                            <td><?php echo $zonas_cuarta[$i]->jugador2;?>
                                            </td>                                                             
                                        </tr>
                                        <tr>
                                            <td><?php echo $zonas_cuarta[$i]->jugador3;?>
                                            </td>                                                             
                                        </tr>
                                        <tr>
                                            <td><?php echo $zonas_cuarta[$i]->jugador4;?>
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
