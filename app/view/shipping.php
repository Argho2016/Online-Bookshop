<?php 
	session_start();
	try
	{
		if(isset($_POST['bshipping']))
		{
			$_SESSION['name'] = $_POST['name'];
			$_SESSION['phone'] = $_POST['phone'];
			$_SESSION['aphone'] = $_POST['aphone'];
			$_SESSION['address'] = $_POST['address'];
			$_SESSION['method'] = $_POST['radio'];

			header("Location:confirmation.php");
		}
	}
	catch(PDOException $e)
	{
		$output .= $e->getMessage();
	}

	include_once ("../../includes/topHomepage.php"); 
	include 'scripts.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<link rel="stylesheet" href="zstyle.css">
	</head>
	<body>
		<h1 class="shippingAddress">Shipping Address</h1>
		<form class="shippingForm" method="POST">
			<input type="text" name="name" class="sname" placeholder="Full Name"><br>
			<input type="text" name="phone" class="sphone" placeholder="Phone No"><br>
			<input type="text" name="aphone" class="saphone" placeholder="Alternative Phone No"><br>
			<textarea rows="4" cols="50" placeholder="Address" class="address" name="address"></textarea><br>
			<label class="payment">Choose a Payment Method</label><br>
			<label class="radioButton">Bkash
			  <input type="radio" name="radio" value="Bkash">
			  <span class="checkmark"></span>
			</label>
			<label class="radioButton">Rocket
			  <input type="radio" name="radio" value="Bkash">
			  <span class="checkmark"></span>
			</label>
			<label class="radioButton">Cash on Delivery
			  <input type="radio" name="radio" value="Cash on Delivery">
			  <span class="checkmark"></span>
			</label>
            <input type="submit" name="bshipping" class="bshipping" value="Confirm">
		</form>
	</body>
</html>

