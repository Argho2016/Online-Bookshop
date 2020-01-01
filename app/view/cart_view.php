<?php 
	session_start();
	include_once ("../../includes/topHomepage.php"); 
?>

	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
	  		<meta name="viewport" content="width=device-width, initial-scale=1">
	  		<link rel="stylesheet" href="zstyle.css">
	  		<script src="jquery-3.4.0.min.js"></script>
		</head>
		<body>
			<table class="cartTable" width="90%">
				<thead>
					<th></th>
					<th>Image</th>
					<th>Name</th>
					<th>Price</th>
					<th width="20%">Quantity</th>
					<th>Subtotal</th>
				</thead>
				<tbody id="tbody">
					
				</tbody> 
			</table>
			<a href="shipping.php"><input type="button" name="conShip" class="conShip" value="Continue To Shipping"></a>

		<?php include 'scripts.php'; ?>
		<script>
	
			$(function(){
				$(document).on('click', '.cart_delete', function(e){
				e.preventDefault();
				var id = $(this).data('id');
				$.ajax({
					type: 'POST',
					url: 'cart_delete.php',
					data: {id:id},
					dataType: 'json',
					success: function(response){
						if(!response.error){
							getDetails();
							getCart();
							getTotal();
						}
					}
				});
			});	

			$(document).on('click', '#minus', function(e){
				e.preventDefault();
				var id = $(this).data('id');
				var qty = $('#qty_'+id).val();
				if(qty>1){
					qty--;
				}
				$('#qty_'+id).val(qty);
				$.ajax({
					type: 'POST',
					url: 'cart_update.php',
					data: {
						id: id,
						qty: qty,
					},
					dataType: 'json',
					success: function(response){
						if(!response.error){
							getDetails();
							getCart();
							getTotal();
						}
					}
				});
			});

			$(document).on('click', '#add', function(e){
				e.preventDefault();
				var id = $(this).data('id');
				var qty = $('#qty_'+id).val();
				qty++;
				$('#qty_'+id).val(qty);
				$.ajax({
					type: 'POST',
					url: 'cart_update.php',
					data: {
						id: id,
						qty: qty,
					},
					dataType: 'json',
					success: function(response){
						if(!response.error){
							getDetails();
							getCart();
							getTotal();
						}
					}
				});
			});		
				getDetails();
				getTotal();
			});

			function getDetails(){
				$.ajax({
					type: 'POST',
					url: 'cart_details.php',
					dataType: 'json',
					success: function(response){
						$('#tbody').html(response);
						getCart();
					}
				});
			}

			function getTotal(){
				$.ajax({
					type: 'POST',
					url: 'cart_total.php',
					dataType: 'json',
					success:function(response){
						total = response;
					}
				});
			}
		</script>
	</body>
</html>
