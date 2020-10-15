</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div id="barra_lateral" class="col-md-3 left_col menu_fixed">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo base_url(); ?>" class="site_title"><img src="<?php echo base_url("assets/img/logo_pieye.png")?>" height="50px"> <span>Pieye</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url($foto_url)?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>BIENVENIDO</span>
                <h2><?php echo $nom->first_name.' '.$nom->last_name; ?></h2>
              </div>
            </div>

            <!-- /menu profile quick info -->
            <br />
            <?php include 'sidebar.php' ?>

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top"  href="<?php echo base_url('auth') ?>">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" href="#" onclick="launchFullScreen(document.documentElement);">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" >
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top"  href="<?php echo base_url().'auth/logout'?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
        <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
                <div class="top_nav">
                  <div class="nav_menu">
                    <div class="nav toggle">
                      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                      <ul class=" navbar-right">
                        <li class="nav-item dropdown" style="padding-left: 15px;">
                          <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                            <img src="<?php echo base_url($foto_url)?>" alt=""><?php echo $correu; ?>
                          </a>
                          <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
							<div class="row contendor_perfil">
								<a class="" href="<?php echo base_url().'auth'?>"><div class="col-md-4 col-sm-6 apartat_perfil"><i class="fa fa-user pull-right"></i> Perfil</div></a>
								<a class="" href="<?php echo base_url().'configuracion';?>"><div class="col-md-4 col-sm-6 apartat_perfil"><i class="fa fa-cog pull-right"></i> Conf</div></a>
							    <a class="" href="<?php echo base_url().'auth/logout'?>"><div class="col-md-4 col-sm-6 apartat_perfil"><i class="fa fa-sign-out pull-right"></i> Salir</div></a>
							</div>
                          </div>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
                <!-- /top navigation -->
