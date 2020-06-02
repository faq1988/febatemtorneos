

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">FEBATEM</a>
          </li>
          <li class="breadcrumb-item active">Zonas</li>
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
           <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-cog"></i>
              Opciones
            </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">                
                <a class="dropdown-item" href="<?=base_url()?>Welcome/deshacer_zonas">Deshacer zonas</a>                                
              </div>
        </div>

  <?php echo form_open('Welcome/zonas', 'class= "text-center" method="GET"'); ?>
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
         

          <div class="panel panel-primary">

                        <?php
                                    if (isset($zonas)){
                                     for($i=0; $i<sizeof($zonas); $i++){ ?>
                        <div class="panel-heading">
                            Zona: <?php echo $zonas[$i]->letra;?>
                            ---
                            Categoría: <?php echo $zonas[$i]->categoria;?>
                            ---
                            Estado: <?php echo $zonas[$i]->estado;?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-primary">
                                    <thead>
                                        <tr>                                            
                                            <th class="col-sm-6">Jugador</th>
                                            <th class="col-sm-1">vs</th>
                                            <th class="col-sm-1">vs</th>
                                            <th class="col-sm-1">vs</th>                                                                                                                             
                                            <th class="col-sm-1">Puntos</th>
                                            <th class="col-sm-1">Posición</th>
                                            <?php //if ($zonas[$i]->estado!='FINALIZADA') {?>
                                            <th>                                            
                                            <a href="<?php echo base_url() ?>Welcome/editar_zona/<?php echo $zonas[$i]->id; ?>"> DETALLE</a> 
                                            </th>                            
                                          <?php //}?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr>
                                            <td><?php echo $zonas[$i]->jugador1;?>
                                            </td> 
                                            <td style="background-color:black;">-
                                            </td>
                                            <td>-
                                            </td>
                                            <td>-
                                            </td>                                              
                                            <td><?php echo $zonas[$i]->puntos1;?>
                                            </td> 
                                            <td><?php echo $zonas[$i]->pos1;?>
                                            </td>                                                          
                                        </tr>
                                        <tr>
                                            <td><?php echo $zonas[$i]->jugador2;?>
                                            </td> 
                                            </td> 
                                            <td>-
                                            </td>
                                            <td style="background-color:black;">-
                                            </td>
                                            <td>-
                                            </td>                                             
                                            <td><?php echo $zonas[$i]->puntos2;?>
                                            </td> 
                                            <td><?php echo $zonas[$i]->pos2;?>
                                            </td>                                                              
                                        </tr>
                                        <tr>
                                            <td><?php echo $zonas[$i]->jugador3;?>
                                            </td>
                                            </td> 
                                            <td>-
                                            </td>
                                            <td>-
                                            </td>
                                            <td style="background-color:black;">-                                            
                                            <td><?php echo $zonas[$i]->puntos3;?>
                                            </td>           
                                            <td><?php echo $zonas[$i]->pos3;?>
                                            </td>                                                  
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <?php } }?> 
                        <!-- /.panel-body -->






                            <?php
                                    if (isset($zonas_de_4)){
                                     for($i=0; $i<sizeof($zonas_de_4); $i++){ ?>
                        <div class="panel-heading">
                            Zona: <?php echo $zonas_de_4[$i]->letra;?>
                            ---
                            Categoría: <?php echo $zonas_de_4[$i]->categoria;?>
                            ---
                            Estado: <?php echo $zonas_de_4[$i]->estado;?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-primary">
                                    <thead>
                                        <tr>                                            
                                            <th class="col-sm-6">Jugador</th>
                                            <th class="col-sm-1">vs</th>
                                            <th class="col-sm-1">vs</th>
                                            <th class="col-sm-1">vs</th>                                            
                                            <th class="col-sm-1">vs</th>                                            
                                            <th class="col-sm-1">Puntos</th>
                                            <th class="col-sm-1">Posición</th>
                                            <?php //if ($zonas[$i]->estado!='FINALIZADA') {?>
                                            <th>                                            
                                            <a href="<?php echo base_url() ?>Welcome/editar_zona/<?php echo $zonas_de_4[$i]->id; ?>"> DETALLE</a> 
                                            </th>                            
                                          <?php //}?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr>
                                            <td><?php echo $zonas_de_4[$i]->jugador1;?>
                                            </td> 
                                            <td style="background-color:black;">-
                                            </td>
                                            <td>-
                                            </td>
                                            <td>-
                                            </td> 
                                            <td>-
                                            </td>  
                                            <td><?php echo $zonas_de_4[$i]->puntos1;?>
                                            </td> 
                                            <td><?php echo $zonas_de_4[$i]->pos1;?>
                                            </td>                                                          
                                        </tr>
                                        <tr>
                                            <td><?php echo $zonas_de_4[$i]->jugador2;?>
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
                                            <td><?php echo $zonas_de_4[$i]->puntos2;?>
                                            </td> 
                                            <td><?php echo $zonas_de_4[$i]->pos2;?>
                                            </td>                                                              
                                        </tr>
                                        <tr>
                                            <td><?php echo $zonas_de_4[$i]->jugador3;?>
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
                                            <td><?php echo $zonas_de_4[$i]->puntos3;?>
                                            </td>           
                                            <td><?php echo $zonas_de_4[$i]->pos3;?>
                                            </td>                                                  
                                        </tr>
                                        <?php if (isset($zonas_de_4[$i]->jugador4)){ ?>
                                        <tr>
                                            <td><?php echo $zonas_de_4[$i]->jugador4;?>
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
                                            <td><?php echo $zonas_de_4[$i]->puntos4;?>
                                            </td>  
                                            <td><?php echo $zonas_de_4[$i]->pos4;?>
                                            </td>                                                            
                                        </tr>
                                      <?php } ?>
                                       
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
