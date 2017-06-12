<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Log In</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'resources/css/bootstrap.min.css' ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'resources/css/login_form.css' ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'resources/css/heroes.css' ?>" />
	<link rel="icon" href="<?php echo base_url().'resources/img/icon.png' ?>"/>
	<script src="<?php echo base_url().'resources/js/jquery-2.1.0.min.js' ?>" /></script>
	<script src="<?php echo base_url().'resources/js/bootstrap.min.js' ?>" /></script>
	<script type="text/javascript">
		var base_url = "<?php echo base_url(); ?>";
	</script>
</head>
<body>
	<div class="login-top">
		<h1>Log In</h1>

	</div>

	<?php echo form_open('verifylogin'); ?>

	<div class="form-container">
		<form class="form-group">
			<div class="form-group">
				<label for="email">Email address:</label>
				<input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" size="50">
			</div>
			<div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" id="pwd" name="password" size="32">
			</div>
			<div class="checkbox">
				<label><input type="checkbox">Remember me</label>
			</div>
				<button type="submit" class="btn btn-default" id="btn-login" value="login">Log In</button>
		</form>

		<div class="sign-up" id="register">
			<button type="button" class="btn btn-primary signup-btn" data-toggle="modal" onclick="location.href='<?php echo site_url("login/signup") ?>'">Sign Up Here
			</button>
			<div class="signup-btn" id="signup-text">Not yet registered?&nbsp;</div>
		</div>
	</div>
	<?php echo validation_errors(); ?>
	<?php echo $this->session->flashdata('msg'); ?>

</body>

</html>