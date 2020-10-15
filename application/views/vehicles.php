<?php include 'templates/head.php' ?>

<?php include 'templates/body.php' ?>

                <!-- page content -->
                <div class="right_col" role="main">

                  <div class="row">
                    <!--CONTRASENYES-->
                    <div class="col-md-12 col-sm-12 ">
                      <div class="x_panel tile" style="zoom: 100%;">
                        <div class="x_title">
                          <h2>Vehicles</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                              <a href="#" role="button" aria-expanded="false" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-wrench"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                              <li class="nav-item active">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Coches</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Motos</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Otros</a>
                              </li>
                            </ul>
                            <?php for ($i=0; $i < count($vehicles); $i++) { ?>
                            <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="col-md-3   widget widget_tally_box">
                                  <div class="x_panel fixed_height_390">
                                    <div class="x_content">

                                      <div class="flex">
                                        <ul class="list-inline widget_profile_box">

                                          <li class="apartat_imatge_vehicle">

                                            <img src="<?php echo base_url('assets/img/20200208_141523.jpg')?>" alt="..." class="img-circle profile_img imatge_vehicles ">
                                          </li>

                                        </ul>
                                      </div>

                                      <h3 class="name titol_caracteristica"><?php echo $vehicles[$i]['marca']." ".$vehicles[$i]['model']; ?></h3>

                                      <div class="flex">
                                        <ul class="list-inline count2">
                                          <li>
                                            <h3 class="titol_caracteristica"><?php echo $vehicles[$i]['data_matriculacio']; ?></h3>
                                            <span>Matriculació</span>
                                          </li>
                                          <li>
                                            <h3 class="titol_caracteristica"><?php echo $vehicles[$i]['km_actuals']; ?></h3>
                                            <span>KMS</span>
                                          </li>
                                        </ul>
                                      </div>
                                      <p class="titol_caracteristica">
                                        <?php echo $vehicles[$i]['matricula']; ?>
                                      </p>
                                      <div class="contenedor_veure_vehicle">
                                        <a href="<?php echo site_url("vehiculos/vehiculo_timeline/".$vehicles[$i]['id']); ?>">
                                          <img src="<?php echo base_url("assets/img/icono-veure.png")?>"  height="50px">
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                    booth letterpress, commodo enim craft beer mlkshk aliquip
                              </div>
                              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                    booth letterpress, commodo enim craft beer mlkshk
                              </div>
                            </div>
                          <?php } ?>
                          </div>



                        </div>
                      </div>
                    </div>

                  <!-- modals -->
                  <!-- Large modal -->
                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Gestión vehículos</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <?php echo "<iframe src='".site_url("gestio_vehicles")."' width='100%' height='500px' style='border:none;'></iframe>"; ?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>

                      </div>
                    </div>
                  </div>


          <br />
        </div>
        <?php include 'templates/body_footer.php' ?>
        <!-- /page content -->
        <?php include 'templates/footer.php' ?>
        <!-- /jss pagina en concret -->
        <!-- Datatables -->
            <script src="<?php echo base_url("assets/vendors/datatables.net/js/jquery.dataTables.min.js")?>"></script>
            <script src="<?php echo base_url("assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js")?>"></script>
            <script src="<?php echo base_url("assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js")?>"></script>
            <script src="<?php echo base_url("assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js")?>"></script>
            <script src="<?php echo base_url("assets/vendors/datatables.net-buttons/js/buttons.flash.min.js")?>"></script>
            <script src="<?php echo base_url("assets/vendors/datatables.net-buttons/js/buttons.html5.min.js")?>"></script>
            <script src="<?php echo base_url("assets/vendors/datatables.net-buttons/js/buttons.print.min.js")?>"></script>
            <script src="<?php echo base_url("assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js")?>"></script>
            <script src="<?php echo base_url("assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js")?>"></script>
            <script src="<?php echo base_url("assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js")?>"></script>
            <script src="<?php echo base_url("assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js")?>"></script>
            <script src="<?php echo base_url("assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js")?>"></script>

            <script src="<?php echo base_url("assets/js/codi_passwords.js")?>"></script>
      </div>
    </div>
