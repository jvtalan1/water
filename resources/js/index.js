$(document).ready(function(){

	getBrands(0);
	$('#search').click(function () {
		var type = $('#water-type').val();
		//alert(type);
		getBrands(type);
	});

	$('#check-out').click(function() {
		checkOut();
	});

	summary();
});

window.addEventListener('selectstart', function(e) {
	e.preventDefault();
	return false;
	},false
);

var base_url = "<?php echo base_url(); ?>";

function addItemButtons(){

	$("[id^='add']").click(function () {
		var item = $(this).attr("id").substring(4);

		if ($('#item-'+item).val() == 0) {
			alert('Please input a number greater than 0.');
		}
		else {
			var totalPrice = parseFloat($('#price-' + item).html()) * parseInt($('#item-' + item).val());
			var addToCart = '<tr class="item" id="row-' + item+'"><td>' + $('#item-' + item).val() + '</td>';
			addToCart += '<td>' + $('#brand-'+item).html() + '</td>';
			addToCart += '<td>' + totalPrice + '</td></tr>';

			$('.purchase #row-' + item + ':last').remove();
			$('.purchase').append(addToCart);
			
			total();
		}
		
	});

	$("[id^='cancel']").click(function () {
		
		var item = $(this).attr("id").substring(7);
		$('#row-'+item).remove();
	});
}

function total() {
var totalItems = 0;
	$('tr.item').each(function () {
				var $tds = $(this).find('td');
				totalItems += parseInt($tds.eq(0).text());
			});
			$('#num-item').html(totalItems);
}

function summary() {

	$.get(base_url + 'index.php/water/retrievedata', function($data) {

		var $jsonObj = JSON.parse($data);

		for (var key in $jsonObj) {
			
			var pid = $jsonObj[key]['pid'];
			var qty = $jsonObj[key]['item'];
			var totalPrice = parseFloat($('#price-' + pid).html()) * parseInt(qty);
			var addToCart = '<tr class="item" id="row-' + pid +'"><td>' + qty + '</td>';
			addToCart += '<td>' + $('#brand-'+pid).html() + '</td>';
			addToCart += '<td>' + totalPrice + '</td></tr>';

			$('.purchase').append(addToCart);
		}
		total();
	});
}

function getBrands(tid){

	$('.ajax-gif').fadeIn();
	$('.ajax-gif').html('<img src="'+ base_url + 'resources/img/loader.gif">');
	$(".left-container").fadeOut("slow");
	$('.left').html('');
	
	$.ajax({
			type: "POST",
			dataType: "json",
			url: base_url + "index.php/water/brands",
			data: {"tid":tid},
			success: function(data){
				//alert(JSON.stringify(data));
				parseData(data);
			},
			error: function(e){

				alert(JSON.stringify(e));
			}
	});
}

function checkOut() {

	$('tr.item').each(function() {

		var $tds = $(this).find('td');
		var	pid = $(this).attr('id').substring(4);
		var item = $tds.eq(0).text();
		
		$.ajax({
			data: {'uid': uid,
				'pid': pid,
				'item': item
				},
			type: "POST",
			//dataType: "JSON",
			url: base_url + "index.php/water/addToCart",
			success: function() {
				$('#modal-success').modal('show');
				//parseData(data);
			},
			error: function(e){
	            	
	            alert(JSON.stringify(e));
        	}
		});

	});
}

function parseData(data){
	
	$.each(data, function( index, obj ) {
		productContainer(obj);
	});
	$('.ajax-gif').fadeOut();
	$(".left-container").fadeIn("slow");

	addItemButtons();

}

function productContainer(a){
	var content = '<div class="well well-lg"><div class="image-container">';
	content += '<img src="' + base_url + 'resources/img/' + a.src + '">';
	content += '</div><div class="item-detail"><div class="product-detail">';
	content += '<p>Brand: <b id="brand-' + a.pid + '">'+ a.brand +'</b></p>';
	content += '<p>Type: '+a.name+' </p><p>Price: PHP <span id="price-'+a.pid+'">'+ a.price+'</span></p></div>';
	content += '<div class="product-order"><div class="input-append">';
	content += '<input type="text" class="num-item form-control" id="item-'+a.pid+'" placeholder="0"><span>item(s)&nbsp;</span>';
	content += '<button type="button" class="btn btn-success" id="add-'+a.pid+'">Add</button>';
	content += '<button type="button" class="btn btn-danger" id="cancel-'+a.pid+'">Cancel</button>';
	content += '</div></div></div></div>';
	
	$('.left').append(content);

}