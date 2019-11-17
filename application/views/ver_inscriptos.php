

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">FEBATEM</a>
          </li>
          <li class="breadcrumb-item active">Inscriptos al torneo</li>
        </ol>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <?php if ($categoria==0 ){?>
              <h6 class="m-0 font-weight-bold text-primary">Jugadores inscriptos en Super división</h6>
              <?php } ?>
              <?php if ($categoria==1 ){?>
              <h6 class="m-0 font-weight-bold text-primary">Jugadores inscriptos en Primera</h6>
              <?php } ?>
              <?php if ($categoria==2 ){?>
              <h6 class="m-0 font-weight-bold text-primary">Jugadores inscriptos en Segunda</h6>
              <?php } ?>
              <?php if ($categoria==3 ){?>
              <h6 class="m-0 font-weight-bold text-primary">Jugadores inscriptos en Tercera</h6>
              <?php } ?>
              <?php if ($categoria==4 ){?>
              <h6 class="m-0 font-weight-bold text-primary">Jugadores inscriptos en Cuarta</h6>
              <?php } ?>
              <?php if ($categoria==5 ){?>
              <h6 class="m-0 font-weight-bold text-primary">Jugadores inscriptos en Quinta</h6>
              <?php } ?>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>DNI</th>
                      <th>Jugador</th>
                      <th>Categoria actual</th>                                           
                      <th>Opciones</th>                      
                    </tr>
                  </thead>
                 
                  <tbody>

                  <?php
                    if (isset($inscriptos)){
                     for($i=0; $i<count($inscriptos); $i++){ 
                  ?>

                    <tr>
                      <td><?php echo $inscriptos[$i]['dni'];?></td>
                      <td><?php echo $inscriptos[$i]['jugador'];?></td>
                      <td><?php echo $inscriptos[$i]['categoria'];?></td>                
                                        
                      <td><a class="btn btn-success" href="<?=base_url()?>Torneoscontroller/eliminar_inscripcion/<?php echo $inscriptos[$i]['id']; ?>" title="Eliminar"><i class="fas fa-trash-alt"></i></a></td>
                      
                    </tr>
                     <?php } }?>
                  </tbody>
                </table>
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

 

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url()?>assets_template/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url()?>assets_template/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url()?>assets_template/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?=base_url()?>assets_template/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>assets_template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?=base_url()?>assets_template/js/demo/datatables-demo.js"></script>

</body>

</html>
