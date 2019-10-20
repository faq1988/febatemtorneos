 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!--h1 class="h3 mb-4 text-gray-800">Bienvenidos</h1-->
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Obtener un turno</h6>
            </div>
            
            <div class="card-body">

              <h3>Lunes 1 de agosto de 2019</h3>

              <div class="col-lg-12">
                <div class="d-flex flex-wrap bd-highlight">
                  <div class="p-1 bd-highlight">
                    
                     <?php
                    if (isset($turnos_disponibles)){
                     for($i=0; $i<count($turnos_disponibles); $i++){ 
                    ?>
                               
                      <a class="btn btn-outline-primary" href="<?=base_url()?>Turnos/llenar_paciente/<?php echo $turnos_disponibles[$i]['id']; ?>">
                        <?php echo substr($turnos_disponibles[$i]['fecha'], 0, 5);?></a>

                    <?php } }?>
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

 

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url()?>assets_template/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url()?>assets_template/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url()?>assets_template/js/sb-admin-2.min.js"></script>

</body>

</html>
