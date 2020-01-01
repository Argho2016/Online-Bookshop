<?php
	session_start();
	include_once ("../../includes/topHomepage.php");
	include 'scripts.php';
	include_once ("../../core/newBooksList.php");
	include_once ("../../core/cartInfo.php");

	$pname = isset($_GET['product']) ? $_GET['product'] : '';	
	//$pname = $_GET['product'];

	$productDetails = loadBook($pname);
	$now = date('Y-m-d');
	if($productDetails['date_view'] == $now)
	{
		$pid = $productDetails['id'];
		updateCounter($pid);
	}
	else
	{
		$pid = $productDetails['id'];
		$date = $now;
		updateCounterDate($pid, $date);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="zstyle.css">
		<script src="jquery-3.4.0.min.js"></script>
	</head>

	<body>
		<div class="container bookDetail">
			<div class="row">
				<div class="bimg col-md-6">
					<img class="bookImage" src="<?php echo (!empty($productDetails['imageName'])) ? '../newBooks/'.$productDetails['imageName'] : '../newBooks/noimage.jpg'; ?>">
				</div>
				<div class="bDetails col-md-6">
					<h1 class="bookTitle"><?php echo $productDetails['bookName']; ?></h1>
					<h3><b><?php echo $productDetails['price']; ?>TK.</b></h3>
					<p><b>Subject:&nbsp;&nbsp;</b><?php echo $productDetails['subject']; ?></p>
					<p><b>Writer Name:&nbsp;&nbsp;</b><?php echo $productDetails['writerName']; ?></p>
					<p><b>Publication:&nbsp;&nbsp;</b><?php echo $productDetails['publication']; ?></p>
					<p><b><?php echo $productDetails['quantity']; ?>&nbsp;&nbsp;Copy Available</b></p>
					<p><b>Description:&nbsp;&nbsp;</b><?php echo $productDetails['description']; ?></p>
				</div>		
			</div>
		</div>

		<div class="container bookQuantity">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<form id="productForm">
						<button type="button" id="minus" >-</button>
						<input type="text" name="quantity" id="quantity" value="1">
						<button type="button" id="add" >+</button>
						<input type="hidden" value="<?php echo $productDetails['id']; ?>" name="id">
						</div>
			            	<button type="submit" class="cartButton btn btn-primary btn-flat">Add to Cart</button>
			            	<span class="message"></span>
			            </div>
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>

		<script>
		$(function(){
			$('#add').click(function(e){
				e.preventDefault();
				var quantity = $('#quantity').val();
				quantity++;
				$('#quantity').val(quantity);
			});
			$('#minus').click(function(e){
				e.preventDefault();
				var quantity = $('#quantity').val();
				if(quantity > 1){
					quantity--;
				}
				$('#quantity').val(quantity);
			});

		});

		$('#productForm').submit(function(e){
		  	e.preventDefault();
		  	var product = $(this).serialize();
		  	$.ajax({
		  		type: 'POST',
		  		url: 'cart_add.php',
		  		data: product,
		  		dataType: 'json',
		  		success: function(response)
		  		{
		  			$('.message').html(response.message);
		  			getCart();
		  		}
		  	});
		  });

		function getCart(){
			$.ajax({
				type: 'POST',
				url: 'cart_fetch.php',
				dataType: 'json',
				success: function(response){
					$('.cart_count').html(response.count);
				}
			});
		}
			
		</script>
	</body>
</html>
