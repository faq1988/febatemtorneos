 <!-- Begin Page Content -->
        <div class="container-fluid">

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


          <!-- Page Heading -->
          <!--h1 class="h3 mb-4 text-gray-800">Bienvenidos</h1-->
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Cambiar contraseña</h6>
            </div>
            <div class="card-body">

         <!-- Default form login -->
         <div class="container">
<!--form class="text-center border border-light p-5" action="#!"-->




   <?php
    $hidden = array('contraseña_actual'=>$perfil[0]->password);
    echo form_open('Sistema/cambiar_password', 'onsubmit="return validacion()"', $hidden);
    ?>


<div class="col-lg-12">  

    <!-- Contraseña actual -->
    <div class="form-group">
      <input type="password" id="contraseña_anterior" name="contraseña_anterior" class="form-control mb-4" placeholder="Contraseña actual">
    </div>
    <!-- Contraseña nueva -->
    <input type="password" id="contraseña_nueva" name="contraseña_nueva" class="form-control mb-4" placeholder="Nueva contraseña">
    <!-- Contraseña repetir -->
    <input type="password" id="contraseña_repetir" name="contraseña_repetir" class="form-control mb-4" placeholder="Repetir contraseña">


 

    <!-- Sign in button -->
    <input type="submit" value="Aceptar" class="btn btn-primary btn-block my-4">
    <!--button class="btn btn-primary btn-block my-4" type="submit">Aceptar</button-->

    

</form>
</div>

   </div>
          </div>

</div>

<!-- Default form login -->



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


  <script>
function validacion() {
  
  indice = document.getElementById("contraseña_anterior").value;
  if( indice == null || indice == 0 ) {
    alert('[ERROR] Debe ingresar contraseña anterior');
    return false;
}

 indice = document.getElementById("contraseña_nueva").value;
  if( indice == null || indice == 0 ) {
    alert('[ERROR] Debe ingresar contraseña nueva');
    return false;
}

 indice = document.getElementById("contraseña_repetir").value;
  if( indice == null || indice == 0 ) {
    alert('[ERROR] Debe ingresar contraseña repetir');
    return false;
}


  // Si el script ha llegado a este punto, todas las condiciones
  // se han cumplido, por lo que se devuelve el valor true
  return true;
}
</script>

</body>

</html>
