

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


  <?php echo form_open('Welcome/llave', 'class= "text-center "'); ?>
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


  <?php echo form_open('Torneoscontroller/procesar_llave', 'class= "text-center "'); ?>

    <input type="hidden" name="id_categoria" value="<?php echo $id_categoria; ?>"/>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Llave</h6>
            </div>
            <div class="card-body">
             



  <div class="tournament-bracket tournament-bracket--rounded">                                                     
    
     <?php 
         if ($cant_inscriptos > 5 and $cant_inscriptos < 9 and isset($llave_8[0]) and isset($llave_8[1]))
         {
     ?>

    <div class="tournament-bracket__round tournament-bracket__round--quarterfinals">
      <h3 class="tournament-bracket__round-title">CUARTOS DE FINAL</h3>
      <ul class="tournament-bracket__list">
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
             
              <thead class="sr-only">
                <tr>
                  <th>Country</th>
                  <th>Score</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content" onclick="location.href='<?php echo base_url() ?>Welcome/editar_partido_llave/<?php echo $llave_8[0]->id; ?>/<?php echo $llave_8[1]->id; ?>';">
                <tr class="tournament-bracket__team tournament-bracket__team--winner">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="Canada"><?php if (isset($llave_8[0]->jugador)) echo $llave_8[0]->jugador; else echo '';?></abbr>
                    <span class="tournament-bracket__flag flag-icon flag-icon-ca" aria-label="Flag"></span>
                  </td>
                  <!--td class="tournament-bracket__score">
                    <span class="tournament-bracket__number">4</span>
                  </td-->
                </tr>
                <tr class="tournament-bracket__team">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="Kazakhstan"><?php if (isset($llave_8[1]->jugador)) echo $llave_8[1]->jugador; else echo '';?></abbr>
                    <span class="tournament-bracket__flag flag-icon flag-icon-kz" aria-label="Flag"></span>
                  </td>
                  <!--td class="tournament-bracket__score">
                    <span class="tournament-bracket__number">1</span>
                  </td-->
                </tr>
              </tbody>
            </table>
          </div>
        </li>

        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
             
              <thead class="sr-only">
                <tr>
                  <th>Country</th>
                  <th>Score</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content" onclick="location.href='<?php echo base_url() ?>Welcome/editar_partido_llave/<?php echo $llave_8[2]->id; ?>/<?php echo $llave_8[3]->id; ?>';">
                <tr class="tournament-bracket__team tournament-bracket__team--winner">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="Czech Republic"><?php if (isset($llave_8[2]->jugador)) echo $llave_8[2]->jugador; else echo '';?></abbr>
                    <span class="tournament-bracket__flag flag-icon flag-icon-cz" aria-label="Flag"></span>
                  </td>
                  <!--td class="tournament-bracket__score">
                    <span class="tournament-bracket__number">4</span>
                  </td-->
                </tr>
                <tr class="tournament-bracket__team">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="Unitede states of America"><?php if (isset($llave_8[3]->jugador)) echo $llave_8[3]->jugador; else echo '';?></abbr>
                    <span class="tournament-bracket__flag flag-icon flag-icon-us" aria-label="Flag"></span>
                  </td>
                  <!--td class="tournament-bracket__score">
                    <span class="tournament-bracket__number">1</span>
                  </td-->
                </tr>
              </tbody>
            </table>
          </div>
        </li>
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
            
              <thead class="sr-only">
                <tr>
                  <th>Country</th>
                  <th>Score</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content" onclick="location.href='<?php echo base_url() ?>Welcome/editar_partido_llave/<?php echo $llave_8[4]->id; ?>/<?php echo $llave_8[5]->id; ?>';">
                <tr class="tournament-bracket__team tournament-bracket__team--winner">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="Finland"><?php if (isset($llave_8[4]->jugador)) echo $llave_8[4]->jugador; else echo '';?></abbr>
                    <span class="tournament-bracket__flag flag-icon flag-icon-fi" aria-label="Flag"></span>
                  </td>
                  <!--td class="tournament-bracket__score">
                    <span class="tournament-bracket__number">2</span>
                  </td-->
                </tr>
                <tr class="tournament-bracket__team">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="Sweden"><?php if (isset($llave_8[5]->jugador)) echo $llave_8[5]->jugador; else echo '';?></abbr>
                    <span class="tournament-bracket__flag flag-icon flag-icon-se" aria-label="Flag"></span>
                  </td>
                  <!--td class="tournament-bracket__score">
                    <span class="tournament-bracket__number">1</span>
                  </td-->
                </tr>
              </tbody>
            </table>
          </div>
        </li>

        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
             
              <thead class="sr-only">
                <tr>
                  <th>Country</th>
                  <th>Score</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content" onclick="location.href='<?php echo base_url() ?>Welcome/editar_partido_llave/<?php echo $llave_8[6]->id; ?>/<?php echo $llave_8[7]->id; ?>';">
                <tr class="tournament-bracket__team tournament-bracket__team--winner">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="Russia"><?php if (isset($llave_8[6]->jugador)) echo $llave_8[6]->jugador; else echo '';?></abbr>
                    <span class="tournament-bracket__flag flag-icon flag-icon-ru" aria-label="Flag"></span>
                  </td>
                  <!--td class="tournament-bracket__score">
                    <span class="tournament-bracket__number">4</span>
                  </td-->
                </tr>
                <tr class="tournament-bracket__team">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="Belarus"><?php if (isset($llave_8[7]->jugador)) echo $llave_8[7]->jugador; else echo '';?></abbr>
                    <span class="tournament-bracket__flag flag-icon flag-icon-by" aria-label="Flag"></span>
                  </td>
                  <!--td class="tournament-bracket__score">
                    <span class="tournament-bracket__number">1</span>
                  </td-->
                </tr>
              </tbody>
            </table>
          </div>
        </li>
      </ul>
    </div>






    <div class="tournament-bracket__round tournament-bracket__round--semifinals">
      <h3 class="tournament-bracket__round-title">SEMIFINAL</h3>
      <ul class="tournament-bracket__list">

        <?php if (isset($llave_4[0]->jugador) and isset($llave_4[1]->jugador)) {?>
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
             
              <thead class="sr-only">
                <tr>
                  <th>Country</th>
                  <th>Score</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content" onclick="location.href='<?php echo base_url() ?>Welcome/editar_partido_llave/<?php echo $llave_4[0]->id; ?>/<?php echo $llave_4[1]->id; ?>';">
                <tr class="tournament-bracket__team">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="Canada"><?php if (isset($llave_4[0]->jugador)) echo $llave_4[0]->jugador; else echo '';?></abbr>
                    <span class="tournament-bracket__flag flag-icon flag-icon-ca" aria-label="Flag"></span>
                  </td>
                  <!--td class="tournament-bracket__score">
                    <span class="tournament-bracket__number">1</span>
                  </td-->
                </tr>
                <tr class="tournament-bracket__team tournament-bracket__team--winner">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="Czech Republic"><?php if (isset($llave_4[1]->jugador)) echo $llave_4[1]->jugador; else echo '';?></abbr>
                    <span class="tournament-bracket__flag flag-icon flag-icon-cz" aria-label="Flag"></span>
                  </td>
                  <!--td class="tournament-bracket__score">
                    <span class="tournament-bracket__number">2</span>
                  </td-->
                </tr>
              </tbody>
            </table>
          </div>
        </li>
      <?php }?>

      <?php if (isset($llave_4[2]->jugador) and isset($llave_4[3]->jugador)) {?>
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
             
              <thead class="sr-only">
                <tr>
                  <th>Country</th>
                  <th>Score</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content" onclick="location.href='<?php echo base_url() ?>Welcome/editar_partido_llave/<?php echo $llave_4[2]->id; ?>/<?php echo $llave_4[3]->id; ?>';">
                <tr class="tournament-bracket__team">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="Finland"><?php if (isset($llave_4[2]->jugador)) echo $llave_4[2]->jugador; else echo '';?></abbr>
                    <span class="tournament-bracket__flag flag-icon flag-icon-fi" aria-label="Flag"></span>
                  </td>
                  <!--td class="tournament-bracket__score">
                    <span class="tournament-bracket__number">4</span>
                  </td-->
                </tr>
                <tr class="tournament-bracket__team tournament-bracket__team--winner">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="Russia"><?php if (isset($llave_4[3]->jugador)) echo $llave_4[3]->jugador; else echo '';?></abbr>
                    <span class="tournament-bracket__flag flag-icon flag-icon-ru" aria-label="Flag"></span>
                  </td>
                  <!--td class="tournament-bracket__score">
                    <span class="tournament-bracket__number">7</span>
                  </td-->
                </tr>
              </tbody>
            </table>
          </div>
        </li>
         <?php }?>
      </ul>
    </div>






    <div class="tournament-bracket__round tournament-bracket__round--bronze">
      <h3 class="tournament-bracket__round-title">FINAL</h3>
      <ul class="tournament-bracket__list">
         <?php if (isset($llave_2[0]->jugador) and isset($llave_2[1]->jugador)) {?>
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
            
              <thead class="sr-only">
                <tr>
                  <th>Country</th>
                  <th>Score</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content" onclick="location.href='<?php echo base_url() ?>Welcome/editar_partido_llave/<?php echo $llave_2[0]->id; ?>/<?php echo $llave_2[1]->id; ?>';">
                <tr class="tournament-bracket__team tournament-bracket__team--winner">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="Finland"><?php if (isset($llave_2[0]->jugador)) echo $llave_2[0]->jugador; else echo '';?></abbr>
                    <span class="tournament-bracket__flag flag-icon flag-icon-fi" aria-label="Flag"></span>
                  </td>
                  <!--td class="tournament-bracket__score">
                    <span class="tournament-bracket__number">3</span>
                    <span class="tournament-bracket__medal tournament-bracket__medal--bronze fa fa-trophy" aria-label="Bronze medal"></span>
                  </td-->
                </tr>
                <tr class="tournament-bracket__team">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="Canada"><?php if (isset($llave_2[1]->jugador)) echo $llave_2[1]->jugador; else echo '';?></abbr>
                    <span class="tournament-bracket__flag flag-icon flag-icon-ca" aria-label="Flag"></span>
                  </td>
                  <!--td class="tournament-bracket__score">
                    <span class="tournament-bracket__number">2</span>
                  </td-->
                </tr>
              </tbody>
            </table>
          </div>
        </li>
         <?php }?>
      </ul>
    </div>


<?php } ?>


    <div class="tournament-bracket__round tournament-bracket__round--gold">
      <!--h3 class="tournament-bracket__round-title">Gold medal game</h3>
      <ul class="tournament-bracket__list">
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="1998-02-22">22 February 1998</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Country</th>
                  <th>Score</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team tournament-bracket__team--winner">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="Czech Republic">CZE</abbr>
                    <span class="tournament-bracket__flag flag-icon flag-icon-cz" aria-label="Flag"></span>
                  </td>
                  <td class="tournament-bracket__score">
                    <span class="tournament-bracket__number">1</span>
                    <span class="tournament-bracket__medal tournament-bracket__medal--gold fa fa-trophy" aria-label="Gold medal"></span>
                  </td>
                </tr>
                <tr class="tournament-bracket__team">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="Russia">RUS</abbr>
                    <span class="tournament-bracket__flag flag-icon flag-icon-ru" aria-label="Flag"></span>
                  </td>
                  <td class="tournament-bracket__score">
                    <span class="tournament-bracket__number">0</span>
                    <span class="tournament-bracket__medal tournament-bracket__medal--silver fa fa-trophy" aria-label="Silver medal"></span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
      </ul-->
    </div>




  </div>



         




 <?php 
         if ($cant_inscriptos > 5 and $cant_inscriptos < 9 and isset($llave_8[0]) and isset($llave_8[1]))
         {
     ?>
          </br>
              <button type="submit" class="btn btn-primary">Procesar Llave</button>
            </div>
 <?php 
         }
     ?>

          </div>

      </form>
          

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
