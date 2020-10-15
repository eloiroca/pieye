<?php include 'templates/head.php' ?>

<?php include 'templates/body.php' ?>

                <!-- page content -->
                <div class="right_col" role="main">

                  <div class="row">
                    <!--CONFIGURACIO-->
					  <div class="col-md-4 col-sm-12 col-xs-12 ">
						  <div class="x_panel tile fixed_height_320 overflow_hidden">
							  <div class="x_title">
								  <h2>Configuració General</h2>
								  <ul class="nav navbar-right panel_toolbox">
									  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
									  </li>
									  <li class="dropdown">
										  <a href="<?php echo base_url('monitoreigpi'); ?>" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
									  </li>
									  <li><a class="close-link"><i class="fa fa-close"></i></a>
									  </li>
								  </ul>
								  <div class="clearfix"></div>
							  </div>
							  <div class="x_content">
								  <form method="post" id="formulariRegistreDirecteVehicles" action="<?php echo base_url('/vehicle/afegir_registre_directe') ?>">
									  <div class="form-group">
										  <label for="exampleFormControlInput1">Vehículo</label>
										  	<input type="date" name="data" class="form-control" id="exampleFormControlInput1" required>

									  </div>
								  </form>>
								  <div class="dades_backups">
									  <p><i>Origen Taules:<br><span class="info_dades_backups">gd_pluguin_parametres,gd_pluguin_contrasenyes,gd_pluguin_carpetesassignades</span></i></p>
									  <p><i>Desti:<br><span class="info_dades_backups">\\192.168.30.87\r\CosesEloi\BackupsImportantsEloi\Backups GD\Base de Dades</span></i></p>
									  <p><i>Última Còpia:<br><span class="info_dades_backups">13 October 2020 14:31:26</span></i></p>
									  <button type="button" class="btn btn-primary btn-lg btn-block boto_backup boto_backup_bd">Realitzar</button>

									  <div class="progress">
										  <div class="progress-bar progress-bar-striped progress-bar-animated progress_bd" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
									  </div>
								  </div>
							  </div>
						  </div>
					  </div>


					  <div class="col-md-4 col-sm-12 col-xs-12 ">
						  <div class="x_panel tile fixed_height_320 overflow_hidden">
							  <div class="x_title">
								  <h2>Base de Datos</h2>
								  <ul class="nav navbar-right panel_toolbox">
									  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
									  </li>

									  <li><a class="close-link"><i class="fa fa-close"></i></a>
									  </li>
								  </ul>
								  <div class="clearfix"></div>
							  </div>
							  <div class="x_content">
								  <form method="post" id="formulariRegistreDirecteVehicles" action="<?php echo base_url('/vehicle/afegir_registre_directe') ?>">
									  <div class="form-group">
										  <label for="exampleFormControlInput1">Destino Copia de Seguridad</label>
										  <input type="text" name="desticopia" class="form-control" id="exampleFormControlInput1" required>

									  </div>

								  </form>
								  <div class="dades_backups">
									  <p><i>Última Copia:<br><span class="info_dades_backups">13 October 2020 14:31:26</span></i></p>
									  <button type="button" class="btn btn-primary btn-lg btn-block boto_backup boto_backup_bd">Realizar</button>
								  </div>
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
