<?php 
	session_start();
	include_once ("../../core/cartInfo.php");

	$output = array('error'=>false);

	$id = $_POST['id'];
	$qty = $_POST['qty'];

	if(isset($_SESSION['userName']))
	{
		try
		{
			$result = updateQuantity($id, $qty);

			if($result)
			{
				$output['message'] = 'Updated';
			}
		}
		catch(PDOException $e)
		{
			$output['message'] = $e->getMessage();
		}
	}
	else
	{
		foreach($_SESSION['cart'] as $key => $row)
		{
			if($row['productid'] == $id)
			{
				$_SESSION['cart'][$key]['quantity'] = $qty;
				$output['message'] = 'Updated';
			}
		}
	}

	echo json_encode($output); 
?>
