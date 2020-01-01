<?php
	session_start();
?>


<?php

		if (!$_SESSION) {
			header('location:homepageD.php');
		} else {
				if ($_SESSION['userType'] === "3") {
					header('location:homepageD.php');
				} elseif ($_SESSION['userType'] === "2") {
					header('location:employeeD.php');
				} else{
					include_once '../../includes/topAdminD.php';
					include_once '../../includes/addEmployee.php';
					include_once '../../includes/bottomadminD.php';
				}
		}

?>
