 <?php include 'templates/head.php' ?>

<?php include 'templates/body.php' ?>

		<!-- page content -->
		<div class="right_col" role="main">

			<div class="row">
			<!--CONFIGURACIO-->
			<div class="col-md-4 col-sm-12 col-xs-12 ">
			  <div class="x_panel tile overflow_hidden">
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
							  <?php
							  $ruta_backup = '';
								for ($i = 0; $i < count($dades_configuracio); $i++) {
									if ($dades_configuracio[$i]['nom_parametre'] == 'ruta_backup'){
										$ruta_backup = $dades_configuracio[$i]['valor'];
									}
								}
							  ?>
							  <input type="text" name="desticopia" class="form-control input_backupBd" id="exampleFormControlInput1" required value="<?php echo $ruta_backup; ?>">
							  <div class="progress">
								  <div class="progress-bar progress-bar-striped progress_bd active" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
							  </div>
						  </div>

					  </form>
					  <div class="dades_backups">
						  <p><i>Última Copia:<br><span class="info_dades_backups"><?php echo $data_ultima_copia; ?></span></i></p>
						  <button type="button" class="btn btn-primary btn-lg btn-block boto_backup boto_backup_bd">Realizar</button>
					  </div>
				  </div>
			  </div>
			</div>
			<!--CRON-->
			<div class="col-md-4 col-sm-12 col-xs-12 ">
			  <div class="x_panel tile overflow_hidden">
				  <div class="x_title">
					  <h2>Cron</h2>
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
						  <label for="exampleFormControlInput1">Executar el cron</label>
						  <div class="form-group">
							  <div class="progress">
								  <div class="progress-bar progress-bar-striped progress_cron active" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
							  </div>
						  </div>

					  </form>
					  <div class="dades_backups">
						  <button type="button" class="btn btn-primary btn-lg btn-block boto_execute_cron">Realizar</button>
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

            <script src="<?php echo base_url("assets/js/codi_configuracio.js")?>"></script>
      </div>
    </div>
