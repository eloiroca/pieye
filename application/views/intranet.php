<?php include 'templates/head.php' ?>

<?php include 'templates/body.php' ?>

                <!-- page content -->
                <div class="right_col" role="main">

                  <!--ESTATS RASPBERRY PI-->
                  <div class="row">
                    <!--MONITOREIG RASPBERRY PI-->
                    <div class="col-md-12 col-sm-12 ">
                      <div class="x_panel tile">
                        <div class="x_title">
                          <h2>Monitoreo del sistema</h2>
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
                          <div id="estatCPUTEMP" class="col-md-2 col-sm-12  tile_stats_count">

                          </div>

                          <div id="estatCPU" class="col-md-3 col-sm-6  tile_stats_count">

                          </div>

                          <div id="estatRAM" class="col-md-3 col-sm-6  tile_stats_count">

                          </div>

                          <div id="estatESPAI" class="col-md-3 col-sm-6  tile_stats_count">

                          </div>

                        </div>
                      </div>
                    </div>

                    <!--SERVEIS RASPBERRY PI-->
                    <div class="col-md-4 col-sm-12 col-xs-12 ">
                      <div class="x_panel tile fixed_height_320 overflow_hidden">
                        <div class="x_title">
                          <h2>Servicios</h2>
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

                            <tr>

                              <td>
                                <table class="tile_info ">
                                  <tr>
                                    <td class="taula_serveis">
                                        <p class="th_titular">Nombre</p>
                                    </td>
                                    <td class="taula_serveis" class="taula_serveis">
                                        <p class="th_titular">Estado</p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="taula_serveis">
                                      <p>Apache2 </p>
                                    </td>
                                    <td class="taula_serveis"><i class="fa fa-square <?php if ($estatserveis[1]==true){echo "green";}else{echo "red";}?>"></i><?php if ($estatserveis[1]==true){echo "<span class='servei_nom_obert'>Encendido<span>";}else{echo "<span class='servei_nom_apagat'>Apagado</span>";}?></td>
                                  </tr>
                                  <tr>
                                    <td class="taula_serveis">
                                      <p>MYSQL </p>
                                    </td>
                                    <td class="taula_serveis"><i class="fa fa-square <?php if ($estatserveis[1]==true){echo "green";}else{echo "red";}?>"></i><?php if ($estatserveis[3]==true){echo "<span class='servei_nom_obert'>Encendido<span>";}else{echo "<span class='servei_nom_apagat'>Apagado</span>";}?></td>
                                  </tr>
                                  <tr>
                                    <td class="taula_serveis">
                                      <p>SSH </p>
                                    </td>
                                    <td class="taula_serveis"><i class="fa fa-square <?php if ($estatserveis[1]==true){echo "green";}else{echo "red";}?>"></i><?php if ($estatserveis[4]==true){echo "<span class='servei_nom_obert'>Encendido<span>";}else{echo "<span class='servei_nom_apagat'>Apagado</span>";}?></td>
                                  </tr>
                                  <tr>
                                    <td class="taula_serveis">
                                      <p>FTP</p>
                                    </td>
                                    <td class="taula_serveis"><i class="fa fa-square <?php if ($estatserveis[1]==true){echo "green";}else{echo "red";}?>"></i><?php if ($estatserveis[0]==true){echo "<span class='servei_nom_obert'>Encendido<span>";}else{echo "<span class='servei_nom_apagat'>Apagado</span>";}?></td>
                                  </tr>
                                  <tr>
                                    <td class="taula_serveis">
                                      <p>NO IP </p>
                                    </td>
                                    <td class="taula_serveis"><i class="fa fa-square <?php if ($estatserveis[1]==true){echo "green";}else{echo "red";}?>"></i><?php if ($estatserveis[2]==true){echo "<span class='servei_nom_obert'>Encendido<span>";}else{echo "<span class='servei_nom_apagat'>Apagado</span>";}?></td>
                                  </tr>
                              </td>
                          </table>
                        </div>
                      </div>
                    </div>

                    <!--USUARIS WEB RASPBERRY PI-->
                    <div class="col-md-4 col-sm-4 ">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Usuarios</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                              <a href="<?php echo base_url('auth'); ?>" ><i class="fa fa-wrench"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table class="table table-hover usuaris_inici">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Usuari</th>
                                <th>Grupo</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php for ($i=0; $i < count($usuaris); $i++) {
                                $grups_usuari = '';
                                echo "<tr>";
                                echo "<th scope='row'>".$usuaris[$i]['id']."</th>";
                                echo "<td>".$usuaris[$i]['first_name']."</td>";
                                echo "<td>".$usuaris[$i]['last_name']."</td>";
                                echo "<td>".$usuaris[$i]['username']."</td>";

                                  for ($u=0; $u < count($grups_usuaris); $u++){
                                      if ($grups_usuaris[$u]['username'] == $usuaris[$i]['username']){
                                          $grups_usuari .= $grups_usuaris[$u]['name'].' ';
                                      }
                                }

                                echo "<td>".$grups_usuari."</td>";
                                echo "</tr>";
                              } ?>
                            </tbody>
                          </table>

                        </div>
                      </div>
                    </div>

                    <!--ALTRES DADES WEB RASPBERRY PI-->
                    <div class="col-md-4 col-sm-12 col-xs-12 ">
                      <div class="x_panel tile fixed_height_320 overflow_hidden">
                        <div class="x_title">
                          <h2>Sistema</h2>
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
							<?php if (count($estatserveis)<1){ ?>
                            <tr>

                              <td>
                                <table class="tile_info ">
                                  <tr>
                                    <td class="taula_serveis">
                                        <p class="th_titular">Apartado</p>
                                    </td>
                                    <td class="taula_serveis" class="taula_serveis">
                                        <p class="th_titular">Valor</p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="taula_serveis">
                                      <p>Dispositivo </p>
                                    </td>
                                    <td class="taula_serveis"><?php echo $estatserveis[6][5]; ?></td>
                                  </tr>
                                  <tr>
                                    <td class="taula_serveis">
                                      <p>Procesador </p>
                                    </td>
                                    <td class="taula_serveis"><?php echo $estatserveis[6][4]; ?></td>
                                  </tr>
                                  <tr>
                                    <td class="taula_serveis">
                                      <p>S.O. </p>
                                    </td>
                                    <td class="taula_serveis"><?php echo $estatserveis[7][1]; ?></td>
                                  </tr>
                                  <tr>
                                    <td class="taula_serveis">
                                      <p>IP </p>
                                    </td>
                                    <td class="taula_serveis"><?php echo $estatserveis[5][9]; ?></td>
                                  </tr>
                              </td>
                          </table>
                        </div>
						  <?php }else{
								echo "Tu sistema no es Raspberry!";
						  } ?>
                      </div>
                    </div>
          <br />
        </div>
        <?php include 'templates/body_footer.php'; ?>

        <!-- /page content -->
        <?php include 'templates/footer.php' ?>
        <script src="<?php echo base_url('assets/js/codi_intranet.js')?>"></script>
      </div>
    </div>
