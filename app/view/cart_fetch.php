<?php
	session_start();
	include_once ("../../core/cartInfo.php");

	$output = array('count'=>0); 
	$uid = $_SESSION['id'];

	if(isset($_SESSION['userName']))
	{
		try
		{
			$result = productCount($uid);

			foreach($result as $row)
			{
				$output['count']++;
			}
		}
		catch(PDOException $e)
		{
			$output['message'] = $e->getMessage();
		}
	}

	echo json_encode($output);
?>