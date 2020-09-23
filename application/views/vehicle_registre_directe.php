<?php include 'templates/head.php' ?>

<!-- iCheck -->
<link href="<?php echo base_url("assets/css/timeline.css")?>" rel="stylesheet">

<?php include 'templates/body.php' ?>

                <!-- page content -->
                <div class="right_col" role="main">

                  <div class="row">
                    <!--VEHICLE TIMELINE-->
                    <div class="col-md-8 col-sm-8  ">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Datos Vehículo</h2>
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
                          <div id="div_foto">
                              <?php echo "<img src='data:".$dades_vehicle[0]['tipus_mime_foto'].";base64,".base64_encode($dades_vehicle[0]['foto'])."' class='img-circle profile_img imatge_perfil_vehicle'>"; ?>
                          </div>
                          <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="centrat"><b>Matrícula</b><p><?php echo $dades_vehicle[0]['matricula'];  ?></p></div>
                              <div class="centrat"><b>Marca</b><p><?php echo $dades_vehicle[0]['marca'];  ?></p></div>
                              <div class="centrat"><b>Modelo</b><p><?php echo $dades_vehicle[0]['model'];  ?></p></div>
                              <div class="centrat"><b>Motor</b><p><?php echo $dades_vehicle[0]['motor'];  ?></p></div>
                              <div class="centrat"><b>Cavallos</b><p><?php echo $dades_vehicle[0]['cavalls'];  ?> CV</p></div>
                              <div class="centrat"><b>Nº Bastidor</b><p><?php echo $dades_vehicle[0]['bastidor'];  ?></p></div>
                              <div class="centrat"><b>Color</b><p><?php echo $dades_vehicle[0]['color'];  ?></p></div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="centrat"><b>Seguro</b><p><?php echo $dades_vehicle[0]['seguro'];  ?></p></div>
                              <div class="centrat"><b>Peso</b><p><?php echo $dades_vehicle[0]['pes'];  ?> KG</p></div>
                              <div class="centrat"><b>Plazas</b><p><?php echo $dades_vehicle[0]['places'];  ?></p></div>

                              <div class="centrat"><b>Código Llave Centraleta</b><p><?php echo $dades_vehicle[0]['codi_llave_centraleta'];  ?></p></div>
                              <div class="centrat"><b>Código Inmovilizador Centraleta</b><p><?php echo $dades_vehicle[0]['codi_inmovilizador_centraleta'];  ?></p></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-4  ">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Datos Timeline</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="#">Settings 1</a>
                                  <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <div class="page">
                            <div class="timeline">
                              <?php $mesos_any = array('Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'); ?>
                              <?php foreach($vehicle_timeline as $key_any => $vehicle_any){ ?>

                              <div class="timeline__group">
                                <span class="timeline__year"><?php echo $key_any; ?></span>
                                <?php foreach($vehicle_any as $key_mes => $vehicle_mes){ ?>
                                <div class="timeline__box">
                                  <div class="timeline__date">
                                    <span class="timeline__month"><?php echo $mesos_any[$key_mes-1]; ?></span>
                                  </div>
                                  <?php foreach($vehicle_mes as $key_dia => $vehicle_dia){ ?>
                                  <div class="timeline__post">
                                    <div class="timeline__content">
                                      <p class="timeline_no_important"><?php echo $vehicle_dia['descripcio']; ?></p>
                                      <p class="timeline_important">KM: <?php echo $vehicle_dia['km_actuals']; ?></p>
                                      <p class="timeline_important"><?php echo $vehicle_dia['data_timeline']; ?></p>
                                      <p class="timeline_important" style="color:<?php echo $vehicle_dia['TipusReparacioColor'];?>"> <?php echo $vehicle_dia['TipusReparacio']; ?></p>
                                    </div>
                                  </div>
                                  <?php } ?>
                                </div>
                                <?php } ?>
                              </div>
                              <?php } ?>


                            </div>

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
