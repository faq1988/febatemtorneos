

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">FEBATEM</a>
          </li>
          <li class="breadcrumb-item active">Llave</li>
        </ol>


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


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Llave</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                 <?php 
              if ($cant_inscriptos > 0) {

              if ($cant_inscriptos < 17 and isset($llave_16)) {

                 ?>

              <table summary="Tournament Bracket">
                       <tr>
                        <td><p>1. <?php echo $llave_16[0]->jugador;?></p></td>
                        <td rowspan="2"><p>1. <?php if (isset($llave_8[0]->jugador)) echo $llave_8[0]->jugador;?></p></td>
                        <td rowspan="4"><p>1. <?php if (isset($llave_4[0]->jugador)) echo $llave_4[0]->jugador;?></p></td>
                        <td rowspan="8"><p>1.  <?php if (isset($llave_2[0]->jugador)) echo $llave_2[0]->jugador;?></p></td>
                        <td rowspan="16"><p>1.  <?php //echo $llave_2_primera[0];?></p></td>                       
                       </tr>
                       <tr>
                        <td><p>2. <?php echo $llave_16[1]->jugador; ?></p></td>
                       </tr>
                       <tr>
                        <td><p>3. <?php echo $llave_16[2]->jugador; ?></p></td>
                        <td rowspan="2"><p>2. <?php if (isset($llave_8[1]->jugador)) echo $llave_8[1]->jugador;?></p></td>
                       </tr>
                       <tr>
                        <td><p>4. <?php echo $llave_16[3]->jugador; ?></p></td>
                       </tr>
                       <tr>
                        <td><p>5. <?php echo $llave_16[4]->jugador; ?></p></td>
                        <td rowspan="2"><p>3. <?php if (isset($llave_8[2]->jugador)) echo $llave_8[2]->jugador;?></p></td>
                        <td rowspan="4"><p>2. <?php if (isset($llave_4[1]->jugador)) echo $llave_4[1]->jugador;?></p></td>
                       </tr>
                       <tr>
                        <td><p>6. <?php echo $llave_16[5]->jugador; ?></p></td>
                       </tr>
                       <tr>
                        <td><p>7. <?php echo $llave_16[6]->jugador; ?></p></td>
                        <td rowspan="2"><p>4. <?php if (isset($llave_8[3]->jugador)) echo $llave_8[3]->jugador;?></p></td>
                       </tr>
                       <tr>
                        <td><p>8. <?php echo $llave_16[7]->jugador; ?></p></td>
                       </tr>
                       <tr>
                        <td><p>9. <?php echo $llave_16[8]->jugador; ?></p></td>
                        <td rowspan="2"><p>5. <?php if (isset($llave_8[4]->jugador)) echo $llave_8[4]->jugador;?></p></td>
                        <td rowspan="4"><p>3. <?php if (isset($llave_4[2]->jugador)) echo $llave_4[2]->jugador;?></p></td>
                        <td rowspan="8"><p>2. <?php if (isset($llave_2[1]->jugador)) echo $llave_2[1]->jugador;?></p></td>
                       </tr>
                       <tr>
                        <td><p>10. <?php echo $llave_16[9]->jugador; ?></p></td>
                       </tr>
                       <tr>
                        <td><p>11. <?php echo $llave_16[10]->jugador; ?></p></td>
                        <td rowspan="2"><p>6. <?php if (isset($llave_8[5]->jugador)) echo $llave_8[5]->jugador;?></p></td>
                       </tr>
                       <tr>
                        <td><p>12. <?php echo $llave_16[11]->jugador; ?></p></td>
                       </tr>
                       <tr>
                        <td><p>13. <?php echo $llave_16[12]->jugador; ?></p></td>
                        <td rowspan="2"><p>7. <?php if (isset($llave_8[6]->jugador)) echo $llave_8[6]->jugador;?></p></td>
                        <td rowspan="4"><p>4. <?php if (isset($llave_4[3]->jugador)) echo $llave_4[3]->jugador;?></p></td>
                       </tr>
                       <tr>
                        <td><p>14. <?php echo $llave_16[13]->jugador; ?></p></td>
                       </tr>
                       <tr>
                        <td><p>15. <?php echo $llave_16[14]->jugador; ?></p></td>
                        <td rowspan="2"><p>8. <?php if (isset($llave_8[7]->jugador)) echo $llave_8[7]->jugador;?></p></td>
                       </tr>
                       <tr>
                        <td><p>16. <?php echo $llave_16[15]->jugador; ?></p></td>
                       </tr>
                       </table>

              <?php  }


                    else {?>

                  <table summary="Tournament Bracket">
                       <tr>
                        <td><p>1. team name</p></td>
                        <td rowspan="2"><p>2 team name</p></td>
                        <td rowspan="4"><p>3 team name</p></td>
                        <td rowspan="8"><p>4 team name</p></td>
                        <td rowspan="16"><p>5 team name</p></td>
                        <td rowspan="32"><p>ganador</p></td>
                       </tr>
                       <tr>
                        <td><p>2. team name</p></td>
                       </tr>
                       <tr>
                        <td><p>3. team name</p></td>
                        <td rowspan="2"><p>team name</p></td>
                       </tr>
                       <tr>
                        <td><p>4. team name</p></td>
                       </tr>
                       <tr>
                        <td><p>5. team name</p></td>
                        <td rowspan="2"><p>team name</p></td>
                        <td rowspan="4"><p>team name</p></td>
                       </tr>
                       <tr>
                        <td><p>6. team name</p></td>
                       </tr>
                       <tr>
                        <td><p>7. team name</p></td>
                        <td rowspan="2"><p>team name</p></td>
                       </tr>
                       <tr>
                        <td><p>8. team name</p></td>
                       </tr>
                       <tr>
                        <td><p>9. team name</p></td>
                        <td rowspan="2"><p>team name</p></td>
                        <td rowspan="4"><p>team name</p></td>
                        <td rowspan="8"><p>team name</p></td>
                       </tr>
                       <tr>
                        <td><p>10. team name</p></td>
                       </tr>
                       <tr>
                        <td><p>11. team name</p></td>
                        <td rowspan="2"><p>team name</p></td>
                       </tr>
                       <tr>
                        <td><p>12. team name</p></td>
                       </tr>
                       <tr>
                        <td><p>13. team name</p></td>
                        <td rowspan="2"><p>team name</p></td>
                        <td rowspan="4"><p>team name</p></td>
                       </tr>
                       <tr>
                        <td><p>14. team name</p></td>
                       </tr>
                       <tr>
                        <td><p>15. team name</p></td>
                        <td rowspan="2"><p>team name</p></td>
                       </tr>
                       <tr>
                        <td><p>16. team name</p></td>
                       </tr>
                       <tr>
                        <td><p>17. team name</p></td>
                        <td rowspan="2"><p>team name</p></td>
                        <td rowspan="4"><p>team name</p></td>
                        <td rowspan="8"><p>team name</p></td>
                        <td rowspan="16"><p>team name</p></td>
                       </tr>
                       <tr>
                        <td><p>18. team name</p></td>
                       </tr>
                       <tr>
                        <td><p>19. team name</p></td>
                        <td rowspan="2"><p>team name</p></td>
                       </tr>
                       <tr>
                        <td><p>20. team name</p></td>
                       </tr>
                       <tr>
                        <td><p>21. team name</p></td>
                        <td rowspan="2"><p>team name</p></td>
                        <td rowspan="4"><p>team name</p></td>
                       </tr>
                       <tr>
                        <td><p>22. team name</p></td>
                       </tr>
                       <tr>
                        <td><p>23. team name</p></td>
                        <td rowspan="2"><p>team name</p></td>
                       </tr>
                       <tr>
                        <td><p>24. team name</p></td>
                       </tr>
                       <tr>
                        <td><p>25. team name</p></td>
                        <td rowspan="2"><p>team name</p></td>
                        <td rowspan="4"><p>team name</p></td>
                        <td rowspan="8"><p>team name</p></td>
                       </tr>
                       <tr>
                        <td><p>26. team name</p></td>
                       </tr>
                       <tr>
                        <td><p>27. team name</p></td>
                        <td rowspan="2"><p>team name</p></td>
                       </tr>
                       <tr>
                        <td><p>28. team name</p></td>
                       </tr>
                       <tr>
                        <td><p>29. team name</p></td>
                        <td rowspan="2"><p>team name</p></td>
                        <td rowspan="4"><p>team name</p></td>
                       </tr>
                       <tr>
                        <td><p>30. team name</p></td>
                       </tr>
                       <tr>
                        <td><p>31. team name</p></td>
                        <td rowspan="2"><p>team name</p></td>
                       </tr>
                       <tr>
                        <td><p>32. team name</p></td>
                       </tr>
                      </table>



                  <?php } }?>


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


</body>

</html>
