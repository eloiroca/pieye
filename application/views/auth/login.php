<?php include 'application/views/templates/head_lleuger.php' ?>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

          <?php $attributes = array('class' => 'login100-form validate-form', 'id' => 'formulari_login'); ?>
          <?php echo form_open("auth/login", $attributes);?>
					<span class="login100-form-title p-b-26">
  						PiEye
					</span>
          <div class="logo_aplicacio">
            <img src="<?php echo base_url("assets/img/logo_pieye.png")?>" height="100px">
          </div>

          <div id="infoMessage"><?php echo $message;?></div>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: exemple@gmail.com">
            <?php
            $data = array(
                  'name'        => 'identity',
                  'value'          => $this->input->post('identity'),
                  'class'       => 'input100'
                );

            echo form_input($data);?>

						<span class="focus-input100" data-placeholder="<?php echo lang('login_identity_label');?>"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
            <?php
            $data = array(
                  'name'        => 'password',
                  'value'          => $this->input->post('password'),
                  'class'       => 'input100',
									'type'				=> 'password'
                );

            echo form_input($data);?>
						<span class="focus-input100" data-placeholder="<?php echo lang('login_password_label');?>"></span>
					</div>
          <?php echo lang('login_remember_label', 'remember');?>
          <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
              <?php echo form_submit('loginSubmit', 'Acceder',"class='login100-form-btn'");?>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							<p><a href="forgot_password">No recuerdo la contrasenya!</a></p>
						</span>
					</div>
          <?php echo form_close();?>
				</form>
			</div>
		</div>
	</div>
  <?php include 'application/views/templates/footer_lleuger.php' ?>
</body>
</html>
