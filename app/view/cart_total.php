<?php 
	session_start();
	include_once ("../../core/cartInfo.php");

	if(isset($_SESSION['userName']))
	{
		$total = getTotal($_SESSION['id']);
	}

	$_SESSION['total'] = $total;

	echo json_encode($total);
?>