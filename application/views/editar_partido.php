 <!-- Begin Page Content -->
        <div class="container-fluid">

 <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">FEBATEM</a>
          </li>
          <li class="breadcrumb-item active">Editar partido</li>
        </ol>

          <!-- Page Heading -->
          <!--h1 class="h3 mb-4 text-gray-800">Bienvenidos</h1-->
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Editar partido (ID: <?php echo $id_partido;?>)</h6>
            </div>
  
  
  <div class="card-body">

         <!-- Default form login -->
  <div class="container">
<!--form class="text-center border border-light p-5" action="#!"-->
  <?php echo form_open('Torneoscontroller/guardar_partido', 'class= "text-center "'); ?>

   <input type="hidden" name="id" value="<?php echo $id_partido; ?>"/>
   <input type="hidden" name="id_zona" value="<?php echo $id_zona; ?>"/>
   <input type="hidden" name="tipo" value="<?php echo $tipo; ?>"/>
   <input type="hidden" id="cant_sets" value="<?php echo $cant_sets; ?>"/>

  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Jugador</th>
                      <th>Set 1</th>
                      <th>Set 2</th>                      
                      <th>Set 3</th>                                      
                      <th>Set 4</th>
                      <th>Set 5</th>       
                      <th>Resultado</th>                      
                      
                    </tr>
                  </thead>
                 
                  <tbody>

                 
                    <tr>
                      <td><?php echo $jugador1;?></td>
                      <td><?php echo $set11;?></td>
                      <td><?php echo $set12;?></td>
                      <td><?php echo $set13;?></td>
                      <td><?php echo $set14;?></td>
                      <td><?php echo $set15;?></td>     
                      <td><?php echo $resultado1;?></td>                     
                    </tr> 

                    <tr>
                      <td><?php echo $jugador2;?></td>
                      <td><?php echo $set21;?></td>
                      <td><?php echo $set22;?></td>
                      <td><?php echo $set23;?></td>
                      <td><?php echo $set24;?></td>
                      <td><?php echo $set25;?></td>  
                      <td><?php echo $resultado2;?></td>                        
                    </tr>                                     
                  </tbody>
                </table>

<div class="form-row">
  <div class="form-group col-md-5">
      <label for="inputEmail4">Jugador</label>
      <input type="text" name="jugador1" class="form-control" id="inputEmail4" placeholder="<?php echo $jugador1;?>" disabled>
    </div>
    <div class="form-group col-md-1">
      <label for="inputEmail4">Set 1</label>
      <input type="text" name="set11" id="set11" class="form-control" id="inputEmail4"  onfocusout="validacion()" tabindex="1">
    </div>
    <div class="form-group col-md-1">
      <label for="inputPassword4">Set 2</label>
      <input type="text" name="set12" id="set12" class="form-control" id="inputPassword4" onfocusout="validacion()" tabindex="3">
    </div>   
    <div class="form-group col-md-1">
      <label for="inputPassword4">Set 3</label>
      <input type="text" name="set13" id="set13" class="form-control" id="inputPassword4" onfocusout="validacion()" tabindex="5">
    </div>   
    <?php if ($cant_sets > 3) { ?>
    <div class="form-group col-md-1">
      <label for="inputPassword4">Set 4</label>
      <input type="text" name="set14" id="set14" class="form-control" id="inputPassword4" onfocusout="validacion()" tabindex="7">
    </div>   
    <div class="form-group col-md-1">
      <label for="inputPassword4">Set 5</label>
      <input type="text" name="set15" id="set15" class="form-control" id="inputPassword4" onfocusout="validacion()" tabindex="9">
    </div>  
  <?php } ?>
    <div class="form-group col-md-2">
      <label for="inputPassword4">Resultado</label>
      <input type="text" name="total1" id="total1" class="form-control" id="inputPassword4" required readonly>
    </div>    
  </div>
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputEmail4">Jugador</label>
      <input type="text" name="jugador2" class="form-control" id="inputEmail4" placeholder="<?php echo $jugador2;?>" disabled>
    </div>
    <div class="form-group col-md-1">
      <label for="inputEmail4">Set 1</label>
      <input type="text" name="set21" id="set21" class="form-control" id="inputEmail4" onfocusout="validacion()" tabindex="2">
    </div>
    <div class="form-group col-md-1">
      <label for="inputPassword4">Set 2</label>
      <input type="text" name="set22" id="set22" class="form-control" id="inputPassword4" onfocusout="validacion()" tabindex="4">
    </div>   
    <div class="form-group col-md-1">
      <label for="inputPassword4">Set 3</label>
      <input type="text" name="set23" id="set23" class="form-control" id="inputPassword4" onfocusout="validacion()" tabindex="6">
    </div>   
    <?php if ($cant_sets > 3) { ?>
    <div class="form-group col-md-1">
      <label for="inputPassword4">Set 4</label>
      <input type="text" name="set24" id="set24" class="form-control" id="inputPassword4" onfocusout="validacion()" tabindex="8">
    </div>   
    <div class="form-group col-md-1">
      <label for="inputPassword4">Set 5</label>
      <input type="text" name="set25" id="set25" class="form-control" id="inputPassword4" onfocusout="validacion()" tabindex="10">
    </div>   
    <?php } ?>
      <div class="form-group col-md-2">
      <label for="inputPassword4">Resultado</label>
      <input type="text" name="total2" id="total2" class="form-control" id="inputPassword4" required readonly>
    </div>    
  </div>
  
  
  
 
  
  <button type="submit" class="btn btn-primary" onclick="validacion()" tabindex="11">Aceptar</button>
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
function validacion() {
  

  var total1= 0;
  var total2= 0;

  set11 = parseInt(document.getElementById("set11").value);
  set21 = parseInt(document.getElementById("set21").value);


  if(!isNaN(set11) && !isNaN(set21))
  {
    if (set11 > set21)
    {
    // alert(set11 + ' - ' + set21 + ' - ' + 'sumo a uno');
      total1++;
    }
    else
    {
     // alert(set11 + ' - ' + set21 + ' - ' + 'sumo a dos');
      total2++;
    }
  }

  set12 = parseInt(document.getElementById("set12").value);
  set22 = parseInt(document.getElementById("set22").value);

  if( !isNaN(set12) && !isNaN(set22))
  {
    if (set12 > set22)
      total1++;
    else
      total2++;
  }

  cant_set = document.getElementById('cant_sets').value;

  if(cant_set == 3)
  {
    if (total1 == 2 || total2 ==2)
    {
      document.getElementById('set13').disabled = true;
      document.getElementById('set23').disabled = true;
    }
  }

  set13 = parseInt(document.getElementById("set13").value);
  set23 = parseInt(document.getElementById("set23").value);

  if( !isNaN(set13) && !isNaN(set23))
  {
  if (set13 > set23)
    total1++;
  else
    total2++;
}

cant_set = document.getElementById('cant_sets').value;

  if(cant_set == 5)
  {
    if (total1 == 3 || total2 ==3)
    {
      document.getElementById('set14').disabled = true;
      document.getElementById('set15').disabled = true;
      document.getElementById('set24').disabled = true;
      document.getElementById('set25').disabled = true;
    }
  }

if (document.getElementById("set14") != null && document.getElementById("set14") != null)
{
  set14 = parseInt(document.getElementById("set14").value);
  set24 = parseInt(document.getElementById("set24").value);

if( !isNaN(set14) && !isNaN(set24))
  {
  if (set14 > set24)
    total1++;
  else
    total2++;
  }
}

if (document.getElementById("set15") != null && document.getElementById("set15") != null)
{
  set15 = parseInt(document.getElementById("set15").value);
  set25 = parseInt(document.getElementById("set25").value);


if( !isNaN(set15) && !isNaN(set25))
  {
  if (set15 > set25)
    total1++;
  else
    total2++;
}
}
  
//alert('totaluno '+total1 + ' totaldos ' + total2);
    document.getElementById("total1").value = total1;
    document.getElementById("total2").value = total2;

  return true;
}
</script>

</body>

</html>
