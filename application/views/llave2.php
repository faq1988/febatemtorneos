

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">FEBATEM</a>
          </li>
          <li class="breadcrumb-item active">Llave</li>
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



          <p>
             <a class="btn btn-primary" href="<?=base_url()?>Torneoscontroller/procesar_llave/<?php echo $id_categoria; ?>"> <i class="fas fa-check"></i> Procesar llave</a>             
          </p>



  <?php echo form_open('Welcome/llave', 'class= "text-center"  method="GET"'); ?>
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



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>CSS Tournament Bracket</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

<div class="bracket">
  <section class="round trentifinals">
     <div class="winners">
      <div class="matchups">
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_32[0]->jugador)) echo $llave_32[0]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_32[1]->jugador)) echo $llave_32[1]->jugador; else echo '';?></span></div>
          </div>
        </div>
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_32[2]->jugador)) echo $llave_32[2]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_32[3]->jugador)) echo $llave_32[3]->jugador; else echo '';?></span></div>
          </div>
        </div>
      </div>
      <div class="connector">
        <div class="merger"></div>
        <div class="line"></div>
      </div>
    </div>
     <div class="winners">
      <div class="matchups">
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_32[4]->jugador)) echo $llave_32[4]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_32[5]->jugador)) echo $llave_32[5]->jugador; else echo '';?></span></div>
          </div>
        </div>
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_32[6]->jugador)) echo $llave_32[6]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_32[7]->jugador)) echo $llave_32[7]->jugador; else echo '';?></span></div>
          </div>
        </div>
      </div>
      <div class="connector">
        <div class="merger"></div>
        <div class="line"></div>
      </div>
    </div>
     <div class="winners">
      <div class="matchups">
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_32[8]->jugador)) echo $llave_32[8]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_32[9]->jugador)) echo $llave_32[9]->jugador; else echo '';?></span></div>
          </div>
        </div>
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_32[10]->jugador)) echo $llave_32[10]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_32[11]->jugador)) echo $llave_32[11]->jugador; else echo '';?></span></div>
          </div>
        </div>
      </div>
      <div class="connector">
        <div class="merger"></div>
        <div class="line"></div>
      </div>
    </div>
     <div class="winners">
      <div class="matchups">
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_32[12]->jugador)) echo $llave_32[12]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_32[13]->jugador)) echo $llave_32[13]->jugador; else echo '';?></span></div>
          </div>
        </div>
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_32[14]->jugador)) echo $llave_32[14]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_32[15]->jugador)) echo $llave_32[15]->jugador; else echo '';?></span></div>
          </div>
        </div>
      </div>
      <div class="connector">
        <div class="merger"></div>
        <div class="line"></div>
      </div>
    </div>
     <div class="winners">
      <div class="matchups">
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_32[16]->jugador)) echo $llave_32[16]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_32[17]->jugador)) echo $llave_32[17]->jugador; else echo '';?></span></div>
          </div>
        </div>
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_32[18]->jugador)) echo $llave_32[18]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_32[19]->jugador)) echo $llave_32[19]->jugador; else echo '';?></span></div>
          </div>
        </div>
      </div>
      <div class="connector">
        <div class="merger"></div>
        <div class="line"></div>
      </div>
    </div>
    <div class="winners">
      <div class="matchups">
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_32[20]->jugador)) echo $llave_32[20]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_32[21]->jugador)) echo $llave_32[21]->jugador; else echo '';?></span></div>
          </div>
        </div>
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_32[22]->jugador)) echo $llave_32[22]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_32[23]->jugador)) echo $llave_32[23]->jugador; else echo '';?></span></div>
          </div>
        </div>
      </div>
      <div class="connector">
        <div class="merger"></div>
        <div class="line"></div>
      </div>
    </div>
    <div class="winners">
      <div class="matchups">
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_32[24]->jugador)) echo $llave_32[24]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_32[25]->jugador)) echo $llave_32[25]->jugador; else echo '';?></span></div>
          </div>
        </div>
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_32[26]->jugador)) echo $llave_32[26]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_32[27]->jugador)) echo $llave_32[27]->jugador; else echo '';?></span></div>
          </div>
        </div>
      </div>
      <div class="connector">
        <div class="merger"></div>
        <div class="line"></div>
      </div>
    </div>
    <div class="winners">
      <div class="matchups">
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_32[28]->jugador)) echo $llave_32[28]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_32[29]->jugador)) echo $llave_32[29]->jugador; else echo '';?></span></div>
          </div>
        </div>
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_32[30]->jugador)) echo $llave_32[30]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_32[31]->jugador)) echo $llave_32[31]->jugador; else echo '';?></span></div>
          </div>
        </div>
      </div>
      <div class="connector">
        <div class="merger"></div>
        <div class="line"></div>
      </div>
    </div>
  </section>
  <section class="round octofinals">
    <div class="winners">
      <div class="matchups">
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_16[0]->jugador)) echo $llave_16[0]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_16[1]->jugador)) echo $llave_16[1]->jugador; else echo '';?></span></div>
          </div>
        </div>
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_16[2]->jugador)) echo $llave_16[2]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_16[3]->jugador)) echo $llave_16[3]->jugador; else echo '';?></span></div>
          </div>
        </div>
      </div>
      <div class="connector">
        <div class="merger"></div>
        <div class="line"></div>
      </div>
    </div>
    <div class="winners">
      <div class="matchups">
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_16[4]->jugador)) echo $llave_16[4]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_16[5]->jugador)) echo $llave_16[5]->jugador; else echo '';?></span></div>
          </div>
        </div>
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_16[6]->jugador)) echo $llave_16[6]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_16[7]->jugador)) echo $llave_16[7]->jugador; else echo '';?></span></div>
          </div>
        </div>
      </div>
      <div class="connector">
        <div class="merger"></div>
        <div class="line"></div>
      </div>
    </div>
    <div class="winners">
      <div class="matchups">
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_16[8]->jugador)) echo $llave_16[8]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_16[9]->jugador)) echo $llave_16[9]->jugador; else echo '';?></span></div>
          </div>
        </div>
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_16[10]->jugador)) echo $llave_16[10]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_16[11]->jugador)) echo $llave_16[11]->jugador; else echo '';?></span></div>
          </div>
        </div>
      </div>
      <div class="connector">
        <div class="merger"></div>
        <div class="line"></div>
      </div>
    </div>
    <div class="winners">
      <div class="matchups">
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_16[12]->jugador)) echo $llave_16[12]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_16[13]->jugador)) echo $llave_16[13]->jugador; else echo '';?></span></div>
          </div>
        </div>
        <div class="matchup">
          <div class="participants">
            <div class="participant"><span><?php if (isset($llave_16[14]->jugador)) echo $llave_16[14]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_16[15]->jugador)) echo $llave_16[15]->jugador; else echo '';?></span></div>
          </div>
        </div>
      </div>
      <div class="connector">
        <div class="merger"></div>
        <div class="line"></div>
      </div>
    </div>
  </section>
  <section class="round quarterfinals">
    <div class="winners">
      <div class="matchups">
        <div class="matchup">
          <div class="participants" 
          onclick="location.href='<?php echo base_url() ?>Welcome/editar_partido_llave/<?php  if (isset($llave_8[0]->jugador)) echo $llave_8[0]->id; ?>/<?php  if (isset($llave_8[1]->jugador)) echo $llave_8[1]->id; ?>';">
            <div class="participant"><span><?php if (isset($llave_8[0]->jugador)) echo $llave_8[0]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_8[1]->jugador)) echo $llave_8[1]->jugador; else echo '';?></span></div>
          </div>
        </div>
        <div class="matchup">
          <div class="participants" 
          onclick="location.href='<?php echo base_url() ?>Welcome/editar_partido_llave/<?php  if (isset($llave_8[2]->jugador)) echo $llave_8[2]->id; ?>/<?php  if (isset($llave_8[3]->jugador)) echo $llave_8[3]->id; ?>';">
            <div class="participant"><span><?php if (isset($llave_8[2]->jugador)) echo $llave_8[2]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_8[3]->jugador)) echo $llave_8[3]->jugador; else echo '';?></span></div>
          </div>
        </div>
      </div>
      <div class="connector">
        <div class="merger"></div>
        <div class="line"></div>
      </div>
    </div>
    <div class="winners">
      <div class="matchups">
        <div class="matchup">
          <div class="participants"  
          onclick="location.href='<?php echo base_url() ?>Welcome/editar_partido_llave/<?php  if (isset($llave_8[4]->jugador)) echo $llave_8[4]->id; ?>/<?php  if (isset($llave_8[5]->jugador)) echo $llave_8[5]->id; ?>';">
            <div class="participant"><span><?php if (isset($llave_8[4]->jugador)) echo $llave_8[4]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_8[5]->jugador)) echo $llave_8[5]->jugador; else echo '';?></span></div>
          </div>
        </div>
        <div class="matchup">
          <div class="participants"  
          onclick="location.href='<?php echo base_url() ?>Welcome/editar_partido_llave/<?php  if (isset($llave_8[6]->jugador)) echo $llave_8[6]->id; ?>/<?php  if (isset($llave_8[7]->jugador)) echo $llave_8[7]->id; ?>';">
            <div class="participant"><span><?php if (isset($llave_8[6]->jugador)) echo $llave_8[6]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_8[7]->jugador)) echo $llave_8[7]->jugador; else echo '';?></span></div>
          </div>
        </div>
      </div>
      <div class="connector">
        <div class="merger"></div>
        <div class="line"></div>
      </div>
    </div>
  </section>
  <section class="round semifinals">
    <div class="winners">
      <div class="matchups">
        <div class="matchup">
          <div class="participants"  
          onclick="location.href='<?php echo base_url() ?>Welcome/editar_partido_llave/<?php  if (isset($llave_4[0]->jugador)) echo $llave_4[0]->id; ?>/<?php  if (isset($llave_4[1]->jugador)) echo $llave_4[1]->id; ?>';">
            <div class="participant"><span><?php if (isset($llave_4[0]->jugador)) echo $llave_4[0]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_4[1]->jugador)) echo $llave_4[1]->jugador; else echo '';?></span></div>
          </div>
        </div>
        <div class="matchup">
          <div class="participants"  
          onclick="location.href='<?php echo base_url() ?>Welcome/editar_partido_llave/<?php  if (isset($llave_4[2]->jugador)) echo $llave_4[2]->id; ?>/<?php  if (isset($llave_4[3]->jugador)) echo $llave_4[3]->id; ?>';">
            <div class="participant"><span><?php if (isset($llave_4[2]->jugador)) echo $llave_4[2]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_4[3]->jugador)) echo $llave_4[3]->jugador; else echo '';?></span></div>
          </div>
        </div>
      </div>
      <div class="connector">
        <div class="merger"></div>
        <div class="line"></div>
      </div>
    </div>
  </section>
  <section class="round finals">
    <div class="winners">
      <div class="matchups">
        <div class="matchup">
          <div class="participants" 
          onclick="location.href='<?php echo base_url() ?>Welcome/editar_partido_llave/<?php  if (isset($llave_2[0]->jugador)) echo $llave_2[0]->id; ?>/<?php  if (isset($llave_2[1]->jugador)) echo $llave_2[1]->id; ?>';">
            <div class="participant"><span><?php if (isset($llave_2[0]->jugador)) echo $llave_2[0]->jugador; else echo '';?></span></div>
            <div class="participant"><span><?php if (isset($llave_2[1]->jugador)) echo $llave_2[1]->jugador; else echo '';?></span></div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

  
  

</body>

</html>






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


</body>

</html>
