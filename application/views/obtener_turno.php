 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!--h1 class="h3 mb-4 text-gray-800">Bienvenidos</h1-->
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Obtener un turno</h6>
            </div>
            <div class="card-body">

         <!-- Default form login -->
         <div class="container">
<!--form class="text-center border border-light p-5" action="#!"-->
  <?php echo form_open('Turnos/seleccionar_turnos', 'class= "text-center border border-light p-5" onsubmit="return validacion()"'); ?>
<div class="col-lg-12">
   

    <div class="form-group">    
    <select class="form-control" name="especialidad" id="especialidad">
      <option value="0">Seleccione especialidad</option>
              <?php
              if (isset($especialidades)){
               for($i=0; $i<sizeof($especialidades); $i++){ ?>

              <option value="<?php echo $especialidades[$i]['id'];?>">
                <?php echo $especialidades[$i]['descripcion'];?>                                  
              </option>
              
              <?php } }?>   
    </select>
    </div>

    
    <div class="form-group">    
    <select class="form-control" id="profesional" name="profesional">
      <option>Seleccione profesional</option>
             
    </select>
    </div>
    
    

    <!-- Sign in button -->
    <button class="btn btn-primary btn-block my-4" type="submit">Buscar</button>

    

</div>
</form>

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
    $(document).ready(function() {
        $('select[name="especialidad"]').on('change', function() {
            var especialidadID = $(this).val();
            if(especialidadID != "") {
                $.ajax({
                    url: "<?php echo base_url(); ?>Turnos/fetch_profesional/"+especialidadID,
                    type: "GET",
                    
                    dataType: "json",
                    success:function(data) {
                        $('select[name="profesional"]').empty();
                        $('select[name="profesional"]').append('<option value="0"> Seleccione profesional </option>');
                        $.each(data, function(key, value) {
                            $('select[name="profesional"]').append('<option value="'+ value.id +'">'+ value.nombre +', '+value.apellido +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="profesional"]').empty();
                $('select[name="profesional"]').append('<option value="0"> Seleccione profesional </option>');
            }
        });
    });
</script>


<script>
function validacion() {
  
  indice = document.getElementById("especialidad").value;
  if( indice == null || indice == 0 ) {
    alert('[ERROR] Debe seleccionar una especialidad');
    return false;
}



  indice = document.getElementById("profesional").value;
  if( indice == null || indice == 0 ) {
    alert('[ERROR] Debe seleccionar un profesional');
    return false;
}

  // Si el script ha llegado a este punto, todas las condiciones
  // se han cumplido, por lo que se devuelve el valor true
  return true;
}
</script>
 

</body>

</html>
