

    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">ABTM</a>
          </li>
          <li class="breadcrumb-item active">Editar partido</li>
        </ol>

      




<form action="<?=base_url()?>Torneoscontroller/guardar_partido" method="post">

<input type="hidden" name="id" value="<?php echo $id_partido; ?>"/>
<input type="hidden" name="tipo" value="<?php echo $tipo; ?>"/>

<div>

<p><strong>ID de partido:</strong> <?php echo $id_partido; ?></p>

<p><strong>Jugador 1:</strong> <?php echo $jugador1; ?></p>
<strong>Set 1: *</strong> <input type="text" name="set11" value=""/><br/>
<strong>Set 2: *</strong> <input type="text" name="set12" value=""/><br/>
<strong>Set 3: *</strong> <input type="text" name="set13" value=""/><br/>
<strong>Set 4: *</strong> <input type="text" name="set14" value=""/><br/>
<strong>Set 5: *</strong> <input type="text" name="set15" value=""/><br/>
<strong>Total: *</strong> <input type="text" name="total1" value=""/><br/>

<p><strong>Jugador 2:</strong> <?php echo $jugador2; ?></p>
<strong>Set 1: *</strong> <input type="text" name="set21" value=""/><br/>
<strong>Set 2: *</strong> <input type="text" name="set22" value=""/><br/>
<strong>Set 3: *</strong> <input type="text" name="set23" value=""/><br/>
<strong>Set 4: *</strong> <input type="text" name="set24" value=""/><br/>
<strong>Set 5: *</strong> <input type="text" name="set25" value=""/><br/>
<strong>Total: *</strong> <input type="text" name="total2" value=""/><br/>

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
