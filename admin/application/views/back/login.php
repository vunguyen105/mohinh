<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>Login Admin</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo base_url(); ?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2_metro.css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="<?php echo base_url(); ?>assets/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
	<!-- BEGIN LOGO -->
	<div class="logo">
		
	</div>
	<!-- END LOGO -->
	<!-- BEGIN LOGIN -->
	<div class="content">
		<!-- BEGIN LOGIN FORM -->
		<form class="form-vertical login-form" action="<?php echo base_url()?>backend/login" method="post">
			<h3 class="form-title">Đăng nhập vào hệ thống</h3>
			<?php if(is_error_flashdata($this->session->flashdata('error'))) { ;?>
			<div class="alert alert-error">
				<span><?php echo $this->session->flashdata('error');?></span>
			</div>
			<?php }?>
			<div class="control-group">
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<label class="control-label visible-ie8 visible-ie9">Tài khoản</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-user"></i>
						<input value="<?php echo set_value('username'); ?>" class="m-wrap placeholder-no-fix" type="text" autocomplete="off" placeholder="Tài khoản" name="username"/>
					</div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label visible-ie8 visible-ie9">Mật khẩu</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-lock"></i>
						<input value="<?php echo set_value('password'); ?>" class="m-wrap placeholder-no-fix" type="password" autocomplete="off" placeholder="Mật khẩu" name="password"/>
					</div>
				</div>
			</div>
			<?php echo validation_errors('<div class="alert alert-error"><sup>','</sup></div>'); ?>
			<div class="form-actions">
				<label class="checkbox">
				<input type="checkbox" name="remember" value="1"/> Nhớ
				</label>
				<button type="submit" class="btn blue pull-right">
				Đăng nhập<i class="m-icon-swapright m-icon-white"></i>
				</button>            
			</div>
			<div class="forget-password">
				<h4>Bạn quên mật khẩu ?</h4>
				<p>
					nếu quên mật khẩu, click <a href="javascript:;"  id="forget-password">vào đây</a>
					để lấy lại mật khẩu.
				</p>
			</div>
		</form>
	</div>
	<!-- END LOGIN -->
</body>
<!-- END BODY -->
</html>
