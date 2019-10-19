

    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">ABTM</a>
          </li>
          <li class="breadcrumb-item active">Inscripciones</li>
        </ol>

      

<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Indicates a successful or positive action.
</div>
      
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
                              
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>                                            
                                            <th>ID</th>
                                            <th>Nombre</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if (isset($inscriptos_sd)){
                                    for($i=0; $i<sizeof($inscriptos_sd); $i++){ ?>
                                        <tr>
                                            <td><?php echo $inscriptos_sd[$i]->id;?>
                                            </td> 
                                            <td><?php echo $inscriptos_sd[$i]->jugador;?>
                                            </td>                                                                             
                                        </tr>
                                       <?php } }?> 
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                   




  </div>





  <div class="tab-pane" id="primera" role="tabpanel">

<button type="button" class="btn btn-success btn-lg">Agregar</button>
<button type="button" class="btn btn-info btn-lg">Eliminar</button>

                        <div class="panel-body">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th class="col-2">Id inscripción</th>                                            
                                            <th class="col-1">Id jugador</th>
                                            <th class="col-9">Nombre</th>                                             
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if (isset($inscriptos_primera)){
                                    for($i=0; $i<sizeof($inscriptos_primera); $i++){ ?>
                                        <tr>
                                           <td><?php echo $inscriptos_primera[$i]->id;?>
                                            </td>
                                            <td><?php echo $inscriptos_primera[$i]->id_jugador;?>
                                            </td> 
                                            <td><?php echo $inscriptos_primera[$i]->jugador;?>
                                            </td>                                                                                
                                        </tr>
                                       <?php } }?> 
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                   


  </div>
  <div class="tab-pane" id="segunda" role="tabpanel">

      <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>                                            
                                            <th>ID</th>
                                            <th>Nombre</th>                                             
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if (isset($inscriptos_segunda)){
                                    for($i=0; $i<sizeof($inscriptos_segunda); $i++){ ?>
                                        <tr>
                                            <td><?php echo $inscriptos_segunda[$i]->id;?>
                                            </td> 
                                            <td><?php echo $inscriptos_segunda[$i]->jugador;?>
                                            </td>                                                                               
                                        </tr>
                                       <?php } }?> 
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->

  </div>
  <div class="tab-pane" id="tercera" role="tabpanel">

      <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>                                            
                                            <th>ID</th>
                                            <th>Nombre</th>                                             
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if (isset($inscriptos_tercera)){
                                    for($i=0; $i<sizeof($inscriptos_tercera); $i++){ ?>
                                        <tr>
                                           <td><?php echo $inscriptos_tercera[$i]->id;?>
                                            </td> 
                                            <td><?php echo $inscriptos_tercera[$i]->jugador;?>
                                            </td>                                                                                
                                        </tr>
                                       <?php } }?> 
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->


  </div>
  <div class="tab-pane" id="cuarta" role="tabpanel">

      <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>                                            
                                            <th>ID</th>
                                            <th>Nombre</th>                                             
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if (isset($inscriptos_cuarta)){
                                    for($i=0; $i<sizeof($inscriptos_cuarta); $i++){ ?>
                                        <tr>
                                            <td><?php echo $inscriptos_cuarta[$i]->id;?>
                                            </td> 
                                            <td><?php echo $inscriptos_cuarta[$i]->jugador;?>
                                            </td>                                                                               
                                        </tr>
                                       <?php } }?> 
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
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
