

    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">ABTM</a>
          </li>
          <li class="breadcrumb-item active">Buscar torneos</li>
        </ol>

      

  <div class="panel-body">
  
                            <div class="table-responsive">
                                <table class="table table-hover table-sm">
                                    <thead class="thead-inverse">
                                        <tr>                                            
                                            <th class="col-2">Nombre</th>  
                                            <th class="col-2">Lugar</th>
                                            <th class="col-1">Superdivision</th>
                                            <th class="col-1">Primera</th>
                                            <th class="col-1">Segunda</th>
                                            <th class="col-1">Tercera</th>
                                            <th class="col-1">Cuarta</th>
                                            <th class="col-1">Activo</th>                                           
                                            <th class="col-2">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if (isset($torneos)){
                                    for($i=0; $i<sizeof($torneos); $i++){ ?>
                                        <tr>
                                            <td><?php echo $torneos[$i]->nombre;?>
                                            </td>  
                                            <td><?php echo $torneos[$i]->lugar;?>
                                            </td>  
                                            <td><center><?php echo $torneos[$i]->superdivision ? "<i class=\"fa fa-check fa-lg\" aria-hidden=\"true\"></i>": "<i class=\"fa fa-times fa-lg\" aria-hidden=\"true\"></i>";?></center>
                                            </td>                                                                           
                                            <td><center><?php echo $torneos[$i]->primera ? "<i class=\"fa fa-check fa-lg\" aria-hidden=\"true\"></i>": "<i class=\"fa fa-times fa-lg\" aria-hidden=\"true\"></i>";?></center>
                                            </td>                                                                           
                                            <td><center><?php echo $torneos[$i]->segunda ? "<i class=\"fa fa-check fa-lg\" aria-hidden=\"true\"></i>": "<i class=\"fa fa-times fa-lg\" aria-hidden=\"true\"></i>";?></center>
                                            </td>                                                                           
                                            <td><center><?php echo $torneos[$i]->tercera ? "<i class=\"fa fa-check fa-lg\" aria-hidden=\"true\"></i>": "<i class=\"fa fa-times fa-lg\" aria-hidden=\"true\"></i>";?></center>
                                            </td>                                                                           
                                            <td><center><?php echo $torneos[$i]->cuarta ? "<i class=\"fa fa-check fa-lg\" aria-hidden=\"true\"></i>": "<i class=\"fa fa-times fa-lg\" aria-hidden=\"true\"></i>";?></center>
                                            </td> 
                                            <td><center><?php echo $torneos[$i]->activo ? "<i class=\"fa fa-check fa-lg\" aria-hidden=\"true\"></i>": "<i class=\"fa fa-times fa-lg\" aria-hidden=\"true\"></i>";?></center>
                                            </td>                              
                                            <td><?php echo $torneos[$i]->estado;?>
                                            </td> 
                                            <?php if ($torneos[$i]->activo == FALSE) {?>
                                            <td>                                            
                                            <a href="<?php echo base_url() ?>Welcome/eliminar_torneo/<?php echo $torneos[$i]->id; ?>"> Eliminar</a>   
                                            </td>
                                            <?php }?>  
                                            <?php if ($torneos[$i]->activo == FALSE) {?>
                                            <td>
                                            <a href="<?php echo base_url() ?>Welcome/activar_torneo/<?php echo $torneos[$i]->id; ?>"> Activar</a>   
                                            </td>
                                            <?php }?> 
                                            <?php if ($torneos[$i]->activo == TRUE and $torneos[$i]->estado == 'SIN COMENZAR') {?>
                                            <td>
                                            <a href="<?php echo base_url() ?>Torneoscontroller/armar_zonas/"> Comenzar</a>
                                            </td>
                                            <?php }?>                                            

                                        </tr>
                                       <?php } }?> 
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->



      

     

     
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
