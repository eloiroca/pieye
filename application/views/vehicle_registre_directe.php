<?php include 'templates/head.php' ?>

<!-- iCheck -->
<link href="<?php echo base_url("assets/css/timeline.css")?>" rel="stylesheet">

<?php include 'templates/body.php' ?>
                <!-- page content -->
                <div class="right_col" role="main">

                  <div class="row">
                    <!--VEHICLE TIMELINE-->
					  <div class="col-md-12 col-sm-12 ">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Añadir Registro Timeline Vehículo</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
							<form>
								<div class="form-group">
									<label for="exampleFormControlInput1">Vehículo</label>
									<select class="form-control" id="exampleFormControlSelect1" required>
										<?php for ($i=0; $i < count($dades_vehicles); $i++) {
											echo "<option value=".$dades_vehicles[$i]['id'].">".$dades_vehicles[$i]['matricula']." → ".$dades_vehicles[$i]['marca']." ".$dades_vehicles[$i]['model']."</option>";
										}
										?>
									</select>

								</div>
								<div class="form-group">
									<label for="exampleFormControlSelect1">Descripción</label>
									<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Mantenimiento, cambio de filtros y líquidos por kilometraje" required>
								</div>
								<div class="form-group">
									<label for="exampleFormControlSelect2">Tipo de Reparación</label>
									<select class="form-control" id="exampleFormControlSelect1" required>
										<?php for ($i=0; $i < count($dades_reparacions); $i++) {
											echo "<option value=".$dades_reparacions[$i]['id_reparacio']." style='color:".$dades_reparacions[$i]['color']."'>".$dades_reparacions[$i]['nom']."</option>";
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleFormControlSelect1">Fecha</label>
									<input type="date" class="form-control" id="exampleFormControlInput1" >
								</div>
								<div class="form-group">
									<label for="exampleFormControlSelect1">KM Actuals</label>
									<input type="number" class="form-control" id="exampleFormControlInput1" required placeholder="0" >
								</div>

							</form>
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
