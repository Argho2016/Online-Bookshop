<?php
	session_start();
	include_once ("../../core/cartInfo.php");

	$output = array('error'=>false);
	$id = $_POST['id'];

	if(isset($_SESSION['userName']))
	{
		try
		{
			if(deleteFromCart($id))
			{
				$output['message'] = 'Deleted';
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
				unset($_SESSION['cart'][$key]);
				$output['message'] = 'Deleted';
			}
		}
	}

	echo json_encode($output);
?>