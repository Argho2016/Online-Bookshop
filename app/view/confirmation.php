<?php 
	session_start();
	include_once ("../../core/cartInfo.php");
	include_once ("../../includes/topHomepage.php"); 
	include 'scripts.php';

	$name = $phone = $aphone = $address = $method = $id = "";

	$id = $_SESSION['id'];
	$name = $_SESSION['name'];
	$phone = $_SESSION['phone'];
	$aphone = $_SESSION['aphone'];
	$address = $_SESSION['address'];
	$method = $_SESSION['method'];	
	$orderId = $id.rand(1,100);
	$date = date('Y-m-d');
	$total = $_SESSION['total'];

	updateOrder($id, $name, $phone, $aphone, $address, $method, $total, $orderId, $date);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="zstyle.css">
	</head>

	<body>
		<h1 class="csummary">Summary</h1>

		<p class="corder">Order Id:&nbsp;&nbsp;<?php echo $orderId; ?></p>
		<p class="cname">Name:&nbsp;&nbsp;<?php echo $_SESSION['name']; ?></p>
		<p class="cphone">Phone No:&nbsp;&nbsp;<?php echo $_SESSION['phone']; ?></p>
		<p class="caphone">Alternative Phone No:&nbsp;&nbsp;<?php echo $_SESSION['aphone']; ?></p>
		<p class="caddress">Address:&nbsp;&nbsp;<?php echo $_SESSION['address']; ?></p>
		<p class="cmethod">Payment Method:&nbsp;&nbsp;<?php echo $_SESSION['method']; ?></p>
		<p class="ctotal">Total:&nbsp;&nbsp;<?php echo $_SESSION['total']; ?>TK.</p>
		<h2 class="cnote">NOTE:&nbsp;&nbsp;Please wait 5-7 working days to get your order!</h2>
	</body>
</html>