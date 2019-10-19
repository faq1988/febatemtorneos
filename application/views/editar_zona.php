

    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">ABTM</a>
          </li>
          <li class="breadcrumb-item active">Editar zona</li>
        </ol>

      




<form action="<?=base_url()?>Torneoscontroller/guardar_zona" method="post">

<input type="hidden" name="id" value="<?php echo $id_zona; ?>"/>

<div>

<p><strong>ID de zona:</strong> <?php echo $id_zona; ?></p>

<p><strong>Jugador 1:</strong> <?php echo $jugador1; ?></p>
<strong>Partido 2: *</strong> <input type="text" name="partido12" value=""/><br/>
<strong>Partido 3: *</strong> <input type="text" name="partido13" value=""/><br/>
<strong>Partido 4: *</strong> <input type="text" name="partido14" value=""/><br/>
<strong>Posición: *</strong> <input type="text" name="posicion1" value=""/><br/>

</br>

<p><strong>Jugador 2:</strong> <?php echo $jugador2; ?></p>
<strong>Partido 1: *</strong> <input type="text" name="partido21" value=""/><br/>
<strong>Partido 3: *</strong> <input type="text" name="partido23" value=""/><br/>
<strong>Partido 4: *</strong> <input type="text" name="partido24" value=""/><br/>
<strong>Posición: *</strong> <input type="text" name="posicion2" value=""/><br/>

</br>

<p><strong>Jugador 3:</strong> <?php echo $jugador3; ?></p>
<strong>Partido 1: *</strong> <input type="text" name="partido31" value=""/><br/>
<strong>Partido 2: *</strong> <input type="text" name="partido32" value=""/><br/>
<strong>Partido 4: *</strong> <input type="text" name="partido34" value=""/><br/>
<strong>Posición: *</strong> <input type="text" name="posicion3" value=""/><br/>

</br>

<p><strong>Jugador 4:</strong> <?php echo $jugador4; ?></p>
<strong>Partido 1: *</strong> <input type="text" name="partido41" value=""/><br/>
<strong>Partido 2: *</strong> <input type="text" name="partido42" value=""/><br/>
<strong>Partido 3: *</strong> <input type="text" name="partido43" value=""/><br/>
<strong>Posición: *</strong> <input type="text" name="posicion4" value=""/><br/>

<p>* Required</p>

<input type="submit" name="submit" value="Submit">

</div>

</form>

</body>

</html>





      

     

     
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
