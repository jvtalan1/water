<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Products</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'resources/css/bootstrap.min.css' ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'resources/css/index.css' ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'resources/css/heroes.css' ?>" />
	<link rel="icon" href="<?php echo base_url().'resources/img/icon.png' ?>"/>
	<script src="<?php echo base_url().'resources/js/jquery-2.1.0.min.js' ?>" /></script>
	<script src="<?php echo base_url().'resources/js/bootstrap.min.js' ?>" /></script>
	<script src="<?php echo base_url().'resources/js/index.js' ?>" /></script>
	<script type="text/javascript">
		var base_url = "<?php echo base_url(); ?>";
	</script>
</head>
<body>
	<div class="product-top">
		<h1>Welcome&nbsp;<?php echo $first_name; ?>!</h1>
	</div>

	<div class="content">
		<div class="search-bar">
			<select id="water-type" class="form-control">
				<option value="0">All</option>;
				<?php foreach ($list as $row)
					{ 
    				echo '<option value="'.$row->tid.'">'.$row->name.'</option>';
					}
				?>
			</select>
			<button type="button" class="btn btn-primary product-button" id="search"> Search </button>
			<button type="button" class="btn btn-warning product-button" id="logout-btn" onclick="location.href='<?php echo base_url("index.php/verifylogin/logout") ?>'">Logout
			</button>
		</div>
		<div class="ajax-gif"></div>
		<div class="left-container">
			<div class="left"></div>
		</div>

		<div class="right">
			<div class="content-right-one">Your Shopping Cart</div>
			<div class="counter"><span id="num-item">0</span> item(s)</div>
			<table class="purchase">
				<tr>
					<th>Qty</th>
					<th>Brand</th>
					<th>Price</th>
				</tr>
			</table>
			<div class="check-out"><button type="button" class="btn btn-primary product-button" id="check-out"> Check Out </button></div>
		</div>

	</div>

</body>

<!-- Modal -->
<div class="modal fade" id="modal-success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Success!</h4>
			</div>

			<!-- Modal Body -->
			<div class="modal-body">
			<h3 class="modal-body">Your cart has been updated.</h4>
			</div>

			<!-- Modal Footer -->
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
var uid  = <?php echo $uid; ?>;
</script>

</html>