

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">FEBATEM</a>
          </li>
          <li class="breadcrumb-item active">Llave</li>
        </ol>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Llave</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                 <?php 
              if ($cant_inscriptos_primera > 0) {

              if ($cant_inscriptos_primera < 17) {

                 ?>

              <table summary="Tournament Bracket">
                       <tr>
                        <td><p>1. <?php //echo $llave_32_primera[0]->posicion_zona;?></p></td>
                        <td rowspan="2"><p>1. <?php echo $llave_16_primera[0];?></p></td>
                        <td rowspan="4"><p>1. <?php //echo $llave_8_primera[0];?></p></td>
                        <td rowspan="8"><p>1.  <?php //echo $llave_4_primera[0];?></p></td>
                        <td rowspan="16"><p>1.  <?php //echo $llave_2_primera[0];?></p></td>                       
                       </tr>
                       <tr>
                        <td><p>2. <?php //echo $llave_32_primera[1]->posicion_zona; ?></p></td>
                       </tr>
                       <tr>
                        <td><p>3. <?php //echo $llave_32_primera[2]->posicion_zona; ?></p></td>
                        <td rowspan="2"><p>2. <?php echo $llave_16_primera[1];?></p></td>
                       </tr>
                       <tr>
                        <td><p>4. <?php //echo $llave_32_primera[3]->posicion_zona; ?></p></td>
                       </tr>
                       <tr>
                        <td><p>5. <?php //echo $llave_32_primera[4]->posicion_zona; ?></p></td>
                        <td rowspan="2"><p>3. <?php echo $llave_16_primera[2];?></p></td>
                        <td rowspan="4"><p>2. <?php //echo $llave_8_primera[1];?></p></td>
                       </tr>
                       <tr>
                        <td><p>6. <?php //echo $llave_32_primera[5]->posicion_zona; ?></p></td>
                       </tr>
                       <tr>
                        <td><p>7. <?php //echo $llave_32_primera[6]->posicion_zona; ?></p></td>
                        <td rowspan="2"><p>4. <?php echo $llave_16_primera[3];?></p></td>
                       </tr>
                       <tr>
                        <td><p>8. <?php //echo $llave_32_primera[7]->posicion_zona; ?></p></td>
                       </tr>
                       <tr>
                        <td><p>9. <?php //echo $llave_32_primera[8]->posicion_zona; ?></p></td>
                        <td rowspan="2"><p>5. <?php echo $llave_16_primera[4];?></p></td>
                        <td rowspan="4"><p>3. <?php //echo $llave_8_primera[2];?></p></td>
                        <td rowspan="8"><p>2. <?php //echo $llave_4_primera[1];?></p></td>
                       </tr>
                       <tr>
                        <td><p>10. <?php //echo $llave_32_primera[9]->posicion_zona; ?></p></td>
                       </tr>
                       <tr>
                        <td><p>11. <?php //echo $llave_32_primera[10]->posicion_zona; ?></p></td>
                        <td rowspan="2"><p>6. <?php echo $llave_16_primera[5];?></p></td>
                       </tr>
                       <tr>
                        <td><p>12. <?php //echo $llave_32_primera[11]->posicion_zona; ?></p></td>
                       </tr>
                       <tr>
                        <td><p>13. <?php //echo $llave_32_primera[12]->posicion_zona; ?></p></td>
                        <td rowspan="2"><p>7. <?php echo $llave_16_primera[6];?></p></td>
                        <td rowspan="4"><p>4. <?php //echo $llave_8_primera[3];?></p></td>
                       </tr>
                       <tr>
                        <td><p>14. <?php //echo $llave_32_primera[13]->posicion_zona; ?></p></td>
                       </tr>
                       <tr>
                        <td><p>15. <?php //echo $llave_32_primera[14]->posicion_zona; ?></p></td>
                        <td rowspan="2"><p>8. <?php echo $llave_16_primera[7];?></p></td>
                       </tr>
                       <tr>
                        <td><p>16. <?php //echo $llave_32_primera[15]->posicion_zona; ?></p></td>
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url()?>assets_template/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url()?>assets_template/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url()?>assets_template/js/sb-admin-2.min.js"></script>


</body>

</html>
