<?php include 'templates/head.php' ?>

<?php include 'templates/body.php' ?>

                <!-- page content -->
                <div class="right_col" role="main">

                  <div class="row">
                    <!--CONTRASENYES-->
                    <div class="col-md-12 col-sm-12 ">
                      <div class="x_panel tile">
                        <div class="x_title">
                          <h2>Passwords</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                              <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modalcategories">+ Categoria</button>
                              </div>
                              <div class="col-sm-6 div_afegir_contra">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modalcontrasenyes">+ Password</button>
                              </div>


                              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th>Categoria</th>
                                    <th>Descripción</th>
                                    <th>Usuario</th>
                                    <th>Contrasenya</th>
                                    <th>URL</th>
                                    <th>Comentario</th>
                                    <th>Editar</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php for ($i=0; $i < count($passwords); $i++) {
                                      echo "<tr>";
                                      echo "<td>".$passwords[$i]['categoria']."</td>";
                                      echo "<td><p class='camp_important'>".$passwords[$i]['descripcio']."</p></td>";
                                      echo "<td>".$passwords[$i]['usuari']."</td>";
                                      echo "<td>".$passwords[$i]['password']."</td>";
                                      echo "<td><a target='_blank' href=".$passwords[$i]['link']."><i class='fa fa-external-link'></i></a></td>";
                                      echo "<td>".$passwords[$i]['comentari']."</td>";
                                      echo "<td>
                                              <button type='button' name='button' class='btn btn-warning btn_fitxers btn_editarRegistre btn_editarContrasenya' data_id='".$passwords[$i]['id']."'>
                                                  <i class='fa fa-edit'></i>
                                              </button>

                                              <button type='button' name='button' class='btn btn-danger btn_fitxers btn_eliminarRegistre btn_eliminarContrasenya' data_id='".$passwords[$i]['id']."'>
                                                  <i class='fa fa-remove'></i>
                                              </button>

                                            </td>";
                                      echo "</tr>";
                                  }?>

                                </tbody>
                              </table>


                              <div class="modal fade modalcategories" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">

                                    <div class="modal-header">
                                      <h4 class="modal-title" id="myModalLabel">Gestión de categorias</h4>
                                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="post" action="<?php echo base_url('/password/afegir_categoria') ?>" class="form-inline">
                                        <div class="form-group">
                                          <label for="ex3" class="col-form-label">Nombre</label>
                                          <input type="text" id="nomcategoria" name="nomcategoria" class="form-control" minlength="2" placeholder=" " required>
                                        </div>
                                        <div class="form-group">
                                          <label for="ex4" class="col-form-label">Descripción</label>
                                          <input type="text" id="descricategoria" name="descricategoria" class="form-control" placeholder=" " minlength="2" required>
                                        </div>
                                        <button type="submit" class="btn btn-secondary boto-enviar">Añadir</button>
                                      </form>
                                      <div class="separador"></div>
                                      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                          <tr>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Editar</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php for ($i=0; $i < count($categories); $i++) {
                                            echo "<tr>";
                                            echo "<td>".$categories[$i]['nom']."</td>";
                                            echo "<td>".$categories[$i]['descripcio']."</td>";
                                            echo "<td><a href='".base_url('/password/eliminar_categoria/'.$categories[$i]['id'])."'<button type='button' name='button' class='btn btn-danger btn_fitxers btn_eliminarRegistre' data_id='".$categories[$i]['id']."'><i class='fa fa-remove'></i></button></a></td>";
                                            echo "</tr>";
                                          }?>
                                        </tbody>
                                      </table>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary boto-tancar" data-dismiss="modal">Cerrar</button>
                                    </div>

                                  </div>
                                </div>
                              </div>


                              <div class="modal fade modalcontrasenyes" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">

                                    <div class="modal-header">
                                      <h4 class="modal-title" id="myModalLabel">Gestión de passwords</h4>
                                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form class="form-label-left input_mask" method="post" id="formulariContrasenyes" action="<?php echo base_url('/password/modificar_password') ?>">

                                      <input id="idcontra" name="idcontra" type="hidden" value="<?php echo rand()*99987;?>">

                                      <div class="col-md-6 col-sm-12 col-xs-12  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" id="usuari_contra" name="usuari" class="usuari" placeholder="Usuario" required>
                                        <span class="fa fa-user form-control-feedback left icona_formulari" aria-hidden="true"></span>
                                      </div>

                                      <div class="col-md-6 col-sm-12 col-xs-12  form-group has-feedback">
                                        <input type="text" class="form-control" id="password" name="contra" placeholder="Password" required>
                                        <span class="fa fa-key form-control-feedback right icona_formulari" aria-hidden="true"></span>
                                      </div>

                                      <div class="col-md-6 col-sm-12 col-xs-12  form-group has-feedback">
                                        <input list="brow" class="form-control has-feedback-left" id="categoria" name="categoria" placeholder="Categoría" required>

                                        <datalist id="brow"  >
                                          <?php for ($i=0; $i < count($categories); $i++) {
                                                  echo "<option value=".$categories[$i]['id'].">".$categories[$i]['nom'];
                                                }
                                          ?>
                                        </datalist>

                                        <span class="fa fa-braille form-control-feedback left icona_formulari" aria-hidden="true"></span>
                                      </div>

                                      <div class="col-md-6 col-sm-12 col-xs-12  form-group has-feedback">
                                        <input type="text" class="form-control" id="descri" name="descripcio" placeholder="Descripción" required>
                                        <span class="fa fa-edit form-control-feedback right icona_formulari" aria-hidden="true"></span>
                                      </div>

                                      <div class="col-md-6 col-sm-12 col-xs-12  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" id="link" name="link" placeholder="Link">
                                        <span class="fa fa-external-link form-control-feedback left icona_formulari" aria-hidden="true"></span>
                                      </div>



                                      <div class="col-md-6 col-sm-12 col-xs-12  form-group has-feedback">
                                        <input type="text" class="form-control" id="comentari" name="comentari" placeholder="Comentario">
                                        <span class="fa fa-comments form-control-feedback right icona_formulari" aria-hidden="true"></span>
                                      </div>




                                    </div>
                                    <div class="modal-footer">

                                      <button type="button" class="btn btn-secondary boto-tancar" data-dismiss="modal">Cerrar</button>
                                      <button type="submit" class="btn btn-secondary boto-enviar">Enviar</button>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
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
