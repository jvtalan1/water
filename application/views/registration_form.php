<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'resources/css/bootstrap.min.css' ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'resources/css/registration_form.css' ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'resources/css/heroes.css' ?>" />
	<link rel="icon" href="<?php echo base_url().'resources/img/icon.png' ?>"/>
	<script src="<?php echo base_url().'resources/js/jquery-2.1.0.min.js' ?>" /></script>
	<script src="<?php echo base_url().'resources/js/bootstrap.min.js' ?>" /></script>

	<script type="text/javascript">
		var base_url = "<?php echo base_url(); ?>";
	</script>
</head>
<body>
	<div class="register-top">
		<h1>Registration</h1>

	</div>

	<?php echo form_open('user/register'); ?>

	<div class="form-container">
		<form class="form-group">
			
			
			<div class="form-group">
				<label for="email">First Name:</label>
				<input type="text" class="form-control" id="input-fname" placeholder="First Name" name="first_name" value="<?php echo set_value('first_name'); ?>"/>
			</div>
			<div class="form-group">
				<label for="email">Last Name:</label>
				<input type="text" class="form-control" id="input-lname" placeholder="Last Name" name="last_name" value="<?php echo set_value('last_name'); ?>"/>
			</div>
			<div class="form-group">
				<label for="email">Email address:</label>
				<input type="email" class="form-control" id="input-email" placeholder="Email Address" name="email" value="<?php echo set_value('email'); ?>"/>
			</div>
			<div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" id="input-password" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>"/>
			</div>
			<div class="form-group">
				<label for="pwd">Confirm Password:</label>
				<input type="password" class="form-control" id="input-cpassword" placeholder="Confirm Password" name="cpassword" value="<?php echo set_value('cpassword'); ?>"/>
			</div>
				<button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.href='<?php echo site_url("login") ?>'">Cancel</button>
				<button name="submit" type="submit" class="btn btn-primary" value="submit">Sign Up</button>
		</form>

	</div>
	<?php echo validation_errors(); ?>
	<?php echo form_close(); ?>

</body>

</html>